<?php

class grid_facturaven_pos_xls
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
   var $sum_total;
   var $sum_subtotal;
   var $sum_valoriva;
   var $sum_adicional;
   var $fechaven_Old;
   var $arg_sum_fechaven;
   var $Label_fechaven;
   var $sc_proc_quebra_fechaven;
   var $count_fechaven;
   var $sum_fechaven_total;
   var $sum_fechaven_subtotal;
   var $sum_fechaven_valoriva;
   var $sum_fechaven_adicional;
   var $credito_Old;
   var $arg_sum_credito;
   var $Label_credito;
   var $sc_proc_quebra_credito;
   var $count_credito;
   var $sum_credito_total;
   var $sum_credito_subtotal;
   var $sum_credito_valoriva;
   var $sum_credito_adicional;
   var $fechavenc_Old;
   var $arg_sum_fechavenc;
   var $Label_fechavenc;
   var $sc_proc_quebra_fechavenc;
   var $count_fechavenc;
   var $sum_fechavenc_total;
   var $sum_fechavenc_subtotal;
   var $sum_fechavenc_valoriva;
   var $sum_fechavenc_adicional;
   var $idcli_Old;
   var $arg_sum_idcli;
   var $Label_idcli;
   var $sc_proc_quebra_idcli;
   var $count_idcli;
   var $sum_idcli_total;
   var $sum_idcli_subtotal;
   var $sum_idcli_valoriva;
   var $sum_idcli_adicional;
   var $pagada_Old;
   var $arg_sum_pagada;
   var $Label_pagada;
   var $sc_proc_quebra_pagada;
   var $count_pagada;
   var $sum_pagada_total;
   var $sum_pagada_subtotal;
   var $sum_pagada_valoriva;
   var $sum_pagada_adicional;
   var $asentada_Old;
   var $arg_sum_asentada;
   var $Label_asentada;
   var $sc_proc_quebra_asentada;
   var $count_asentada;
   var $sum_asentada_total;
   var $sum_asentada_subtotal;
   var $sum_asentada_valoriva;
   var $sum_asentada_adicional;
   var $resolucion_Old;
   var $arg_sum_resolucion;
   var $Label_resolucion;
   var $sc_proc_quebra_resolucion;
   var $count_resolucion;
   var $sum_resolucion_total;
   var $sum_resolucion_subtotal;
   var $sum_resolucion_valoriva;
   var $sum_resolucion_adicional;
   var $vendedor_Old;
   var $arg_sum_vendedor;
   var $Label_vendedor;
   var $sc_proc_quebra_vendedor;
   var $count_vendedor;
   var $sum_vendedor_total;
   var $sum_vendedor_subtotal;
   var $sum_vendedor_valoriva;
   var $sum_vendedor_adicional;
   var $tipo_Old;
   var $arg_sum_tipo;
   var $Label_tipo;
   var $sc_proc_quebra_tipo;
   var $count_tipo;
   var $sum_tipo_total;
   var $sum_tipo_subtotal;
   var $sum_tipo_valoriva;
   var $sum_tipo_adicional;
   var $banco_Old;
   var $arg_sum_banco;
   var $Label_banco;
   var $sc_proc_quebra_banco;
   var $count_banco;
   var $sum_banco_total;
   var $sum_banco_subtotal;
   var $sum_banco_valoriva;
   var $sum_banco_adicional;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
              $this->progress_bar_end();
          }
      }
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['opcao'] = "";
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
                   nm_limpa_str_grid_facturaven_pos($cadapar[1]);
                   nm_protect_num_grid_facturaven_pos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gproveedor)) 
      {
          $_SESSION['gproveedor'] = $gproveedor;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gproveedor"]);
      }
      if (isset($gtipo_negocio)) 
      {
          $_SESSION['gtipo_negocio'] = $gtipo_negocio;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gtipo_negocio"]);
      }
      if (isset($gcontador_grid_fe)) 
      {
          $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gcontador_grid_fe"]);
      }
      if (isset($gidtercero)) 
      {
          $_SESSION['gidtercero'] = $gidtercero;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gidtercero"]);
      }
      if (isset($gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gbd_seleccionada"]);
      }
      if (!isset($gIdfac) && isset($gidfac)) 
      {
         $gIdfac = $gidfac;
      }
      if (isset($gIdfac)) 
      {
          $_SESSION['gIdfac'] = $gIdfac;
          nm_limpa_str_grid_facturaven_pos($_SESSION["gIdfac"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->SC_top = array();
      $this->SC_bot = array();
      $this->SC_bot[] = "credito";
      $this->SC_top[] = "credito";
      $this->SC_bot[] = "fechaven";
      $this->SC_top[] = "fechaven";
      $this->SC_bot[] = "fechavenc";
      $this->SC_top[] = "fechavenc";
      $this->SC_bot[] = "idcli";
      $this->SC_top[] = "idcli";
      $this->SC_bot[] = "pagada";
      $this->SC_top[] = "pagada";
      $this->SC_bot[] = "asentada";
      $this->SC_top[] = "asentada";
      $this->SC_bot[] = "resolucion";
      $this->SC_top[] = "resolucion";
      $this->SC_bot[] = "vendedor";
      $this->SC_top[] = "vendedor";
      $this->SC_bot[] = "tipo";
      $this->SC_top[] = "tipo";
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $this->New_Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_facturaven_pos/grid_facturaven_pos_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_res_xls.class.php");
              $this->Res_xls = new grid_facturaven_pos_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_facturaven_pos.zip";
          $this->Arquivo   .= "_grid_facturaven_pos" . $this->Xls_tp;
          $this->Tit_doc    = "grid_facturaven_pos" . $this->Xls_tp;
          $this->Tit_zip    = "grid_facturaven_pos.zip";
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
      require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_total.class.php"); 
      $this->Tot = new grid_facturaven_pos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "formapago")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porcliente")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porpj")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "portipo")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porvendedor")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porasentada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "pagada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porbanco")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_pos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_return']);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "formapago")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porcliente")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porpj")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "portipo")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porvendedor")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porasentada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "pagada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porbanco")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
          $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
if (!isset($_SESSION['gproveedor'])) {$_SESSION['gproveedor'] = "";}
if (!isset($this->sc_temp_gproveedor)) {$this->sc_temp_gproveedor = (isset($_SESSION['gproveedor'])) ? $_SESSION['gproveedor'] : "";}
if (!isset($_SESSION['gcontador_grid_fe'])) {$_SESSION['gcontador_grid_fe'] = "";}
if (!isset($this->sc_temp_gcontador_grid_fe)) {$this->sc_temp_gcontador_grid_fe = (isset($_SESSION['gcontador_grid_fe'])) ? $_SESSION['gcontador_grid_fe'] : "";}
if (!isset($_SESSION['gtipo_negocio'])) {$_SESSION['gtipo_negocio'] = "";}
if (!isset($this->sc_temp_gtipo_negocio)) {$this->sc_temp_gtipo_negocio = (isset($_SESSION['gtipo_negocio'])) ? $_SESSION['gtipo_negocio'] : "";}
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery.blockUI.js'); ?>"></script>
<?php

$this->NM_cmp_hidden["ver_xml_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["ver_xml_propio"] = "off"; }
$this->NM_cmp_hidden["whatsapp_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["whatsapp_propio"] = "off"; }
$this->NM_cmp_hidden["pedido"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pedido"] = "off"; }

$vsql = "select ver_xml_fe,(SELECT proveedor FROM webservicefe limit 1) as proveedor, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_agregar_nota from configuraciones where idconfiguraciones=1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiXml = array();
      $this->vsixml = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiXml[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsixml[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiXml = false;
          $this->vSiXml_erro = $this->Db->ErrorMsg();
          $this->vsixml = false;
          $this->vsixml_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsixml[0][0]))
{
	if($this->vsixml[0][1]=="FACILWEB")
	{
		if($this->vsixml[0][0]=="SI")
		{
			$this->NM_cmp_hidden["ver_xml_propio"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["ver_xml_propio"] = "on"; }
		}
		
		if($this->vsixml[0][4]=="SI")
		{
			$this->NM_cmp_hidden["whatsapp_propio"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["whatsapp_propio"] = "on"; }
		}
	}
	
	if($this->vsixml[0][3]=="SI")
	{
		$this->NM_cmp_hidden["a4"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["a4"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["a4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["a4"] = "off"; }
	}
	
	if($this->vsixml[0][2]=="SI")
	{
		$this->NM_cmp_hidden["imprimircopia"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["imprimircopia"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["imprimircopia"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["imprimircopia"] = "off"; }
	}
	
	if($this->vsixml[0][5]=="SI")
	{
		$this->NM_cmp_hidden["pedido"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pedido"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["pedido"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pedido"] = "off"; }
	}
	
	if($this->vsixml[0][6]=="SI")
	{
		$this->NM_cmp_hidden["regenerar_pdf_propio"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["regenerar_pdf_propio"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["regenerar_pdf_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["regenerar_pdf_propio"] = "off"; }
	}
	
	if($this->vsixml[0][7]=="SI")
	{
		echo "<script>$(document).ready(function(){ $('#TB_Interativ_Search').css('display','block'); });</script>";
	}
	else
	{
		echo "<script>$(document).ready(function(){ $('#TB_Interativ_Search').css('display','none'); });</script>";
	}
}

if($this->sc_temp_gtipo_negocio=="RESTAURANTE")
{
	$this->nmgp_botoes["btn_calculadora"] = "on";;
	$this->NM_cmp_hidden["restaurante"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["restaurante"] = "on"; }
}
else
{
	$this->nmgp_botoes["btn_calculadora"] = "off";;
	$this->NM_cmp_hidden["restaurante"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["restaurante"] = "off"; }
}

$this->sc_temp_gcontador_grid_fe=1;
;

;
;
;
;
;
;
;
;
;
;
;
;
;


     $nm_select = "delete from facturaven where espos='SI' and (total='0' or total is null) and vendedor='".$this->sc_temp_gidtercero."' and (select d.iddet from detalleventa d where d.numfac=idfacven limit 1) is null and observaciones='TEMPORAL' and (select c.noborrar_tmp_enpos from configuraciones c order by c.idconfiguraciones desc limit 1)='NO'"; 
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


     $nm_select = "delete from recibocaja where obser='TEMPORAL' and usuario='".$this->sc_temp_gidtercero."' and asentado='NO' and (select d.iddetall from detallepagos d where d.idrc=idrecibo limit 1) is null"; 
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

switch($this->sc_temp_gproveedor)
{
	case 'THE FACTORY HKA':
		$this->nmgp_botoes["btn_enviar_fe"] = "off";;
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "on";;
		$this->nmgp_botoes["btn_pdf"] = "on";;
	    $this->nmgp_botoes["btn_reenviar"] = "off";;
	 	$this->NM_cmp_hidden["pdf"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pdf"] = "off"; }
		$this->NM_cmp_hidden["reenviar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["reenviar"] = "on"; }
		$this->NM_cmp_hidden["enviar_tech"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_tech"] = "off"; }
		
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_propio"] = "off"; }
		$this->NM_cmp_hidden["envio_dataico"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["envio_dataico"] = "off"; }
	break;
	
	case 'CADENA S. A.':
		$this->nmgp_botoes["btn_enviar_fe"] = "off";;
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "on";;
		$this->nmgp_botoes["btn_pdf"] = "on";;
	    $this->nmgp_botoes["btn_reenviar"] = "off";;
	    $this->NM_cmp_hidden["pdf"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pdf"] = "off"; }
		$this->NM_cmp_hidden["reenviar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["reenviar"] = "off"; }
		$this->NM_cmp_hidden["enviar_tech"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_tech"] = "on"; }
		
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_propio"] = "off"; }
		$this->NM_cmp_hidden["envio_dataico"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["envio_dataico"] = "off"; }
	break;
	case 'DATAICO':
		$this->nmgp_botoes["btn_enviar_fe"] = "on";;
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "off";;
	    $this->nmgp_botoes["btn_reenviar"] = "on";;
	    $this->NM_cmp_hidden["pdf"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pdf"] = "off"; }
		$this->NM_cmp_hidden["reenviar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["reenviar"] = "off"; }
		$this->NM_cmp_hidden["enviar_tech"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_tech"] = "off"; }
		
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_propio"] = "off"; }
		$this->NM_cmp_hidden["envio_dataico"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["envio_dataico"] = "on"; }
	break;
	
	case 'FACILWEB':
		$this->nmgp_botoes["btn_enviar_fe"] = "off";;
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "off";;
	    $this->nmgp_botoes["btn_reenviar"] = "on";;
	    $this->NM_cmp_hidden["pdf"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["pdf"] = "off"; }
		$this->NM_cmp_hidden["reenviar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["reenviar"] = "off"; }
		$this->NM_cmp_hidden["enviar_tech"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_tech"] = "off"; }
		
		$this->NM_cmp_hidden["enviar_propio"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["enviar_propio"] = "on"; }
		$this->NM_cmp_hidden["envio_dataico"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['php_cmp_sel']["envio_dataico"] = "off"; }
	break;
}

?>
<script>

function fEnviarTech(idfacven)
{
	if(confirm('¿Desea firmar el documento electrónico?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
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
		
		$.post("../blank_fe_factura_tech_ajax/index.php",{idfacven:idfacven},function(r){

			$.unblockUI();
			console.log(r);
			if(confirm(r))
			{
			   nm_gp_submit_ajax ('igual', 'breload');
			}
			else
			{
			   nm_gp_submit_ajax ('igual', 'breload');
			}
		});
	}
}
	
function fEnviarPropio(idfacven,bd)
{
	if(confirm('¿Desea Enviar el documento?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
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
		
		$.post("../blank_enviar_fes_propio/index.php",{
			
			idfacven:idfacven,
			bd:bd
			   
			},function(r){

			$.unblockUI();
			console.log(r);
			
			if(r=="Documento enviado con éxito!!!")
			{
			    nm_gp_submit_ajax ('igual', 'breload');
			}
			else
			{
				if(confirm(r))
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}
				else
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}
			}
		});
	}
}
	
function fRegenerarPDFPropio(idfacven,bd,cufe)
{
	if(!$.isEmptyObject(cufe))
	{
		if(confirm('¿Desea regenerar el PDF del documento?'))
		{
			$.blockUI({ 
				message: 'Espere por favor...', 
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

			$.post("../blank_envio_propio_regenerar/index.php",{

				idfacven:idfacven,
				bd:bd

				},function(r){

				$.unblockUI();
				console.log(r);

				if(confirm('PDF regenerado con éxito.'))
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}
				else
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}

			});
		}
	}
	else
	{
		alert('El documento no ha sido enviado electrónicamente.');
	}
}
	
function fJSONPropio(idfacven,bd)
{

	$.blockUI({ 
		message: 'Espere por favor...', 
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

	$.post("../blank_envio_propio_xml/index.php",{

		idfacven:idfacven,
		bd:bd

		},function(r){

		$.unblockUI();
		console.log(r);

		var obj = JSON.parse(r);
		if(obj.existe=="SI")
		{
		   window.open(obj.archivo, "XML",)
		}
		else
		{
			alert("Hubo un problema al generar el archivo.");
		}
	});
}
	
function fReenviarPropio(idfacven)
{

	$.post("../blank_correo_reenvio/index.php",{

		idfacven:idfacven

	},function(r){

		console.log(r);
		var correo = "";
		
		if(correo = prompt("Correo Electrónico",r))
		{
			if(correo == null || correo == "")
			{
			   alert("Debe digitar un correo.");
			}
			else
			{
				$.blockUI({ 
					message: 'Espere por favor...', 
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
				
				$.post("../blank_correo_reenvio2/index.php",{

					idfacven:idfacven,
					correo:correo

				},function(r2){

					$.unblockUI();
					
					console.log(r2);
					alert(r2);
				});
			}
		}

	});
}
	
function fReenviarDataico(idfacven)
{
	$.post("../blank_correo_reenvio/index.php",{

		idfacven:idfacven

	},function(r){

		console.log(r);
		var correo = "";
		
		if(correo = prompt("Correo Electrónico",r))
		{
			if(correo == null || correo == "")
			{
			   alert("Debe digitar un correo.");
			}
			else
			{
				$.blockUI({ 
					message: 'Espere por favor...', 
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
				
				$.post("../blank_reenvio_dataico/index.php",{

					idfacven:idfacven,
					correo:correo

				},function(r2){

					$.unblockUI();
					
					console.log(r2);
					alert(r2);
				});
			}
		}

	});
}
	
function fAsentarDoc(idfacven)
{
	if(confirm('¿Desea asentar el documento?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
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
		
		$.post("../blank_asentar/index.php",{
			
			idfacven:idfacven
			   
			},function(r){

			$.unblockUI();
			console.log(r);
			
			nm_gp_submit_ajax ('igual', 'breload');
			
			
		});
	}
}
	
	
function fReversarDoc(idfacven)
{
	if(confirm('¿Desea reversar el documento?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
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
		
		$.post("../blank_reversar/index.php",{
			
			idfacven:idfacven
			   
			},function(r){

			$.unblockUI();
			console.log(r);
			
			nm_gp_submit_ajax ('igual', 'breload');
			
			
		});
	}
}
	
function fConsultarEstadoTech(empresa,id)
{
	if(confirm('¿Desea enviar el documento a la electrónico?'))
	{
		if($("#a_"+id).css("display")=="none")
		{
			$("#a_"+id).css("display","block");
			$("#i_"+id).css("display","none");
			$("#p_"+id).css("display","none");

			var url = "../scripts/tech/?empresa="+empresa+"&id="+id;
			$.get(url,{empresa:empresa,id:id},function(r){
				
				console.log(r);
				
				if(r=="0")
				{
					$("#p_"+id).css("display","none");
					$("#a_"+id).css("display","none");
					$("#i_"+id).css("display","block");
					alert("Hay problemas de conexión con la DIAN.");
				}
				
				if(r=="1")
				{
					$("#p_"+id).css("display","block");
					$("#a_"+id).css("display","none");
					$("#i_"+id).css("display","none");
					alert("Documento enviado con éxito.");
				}
				
				if(r=="2")
				{
					$("#p_"+id).css("display","none");
					$("#a_"+id).css("display","none");
					$("#i_"+id).css("display","block");
					alert("El documento no ha sido enviado electrónicamente.");
				}
				
			});
		}
	}
}
	
function fEnvioDataico(idfacven)
{
	if(confirm('¿Desea Enviar el documento?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
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
		
		$.post("../blank_envio_dataico/index.php",{
			
			idfacven:idfacven
			   
			},function(r){

			$.unblockUI();
			console.log(r);
			
			if(r=="ok")
			{
			    nm_gp_submit_ajax ('igual', 'breload');
			}
			else
			{
				if(confirm(r))
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}
				else
				{
				   nm_gp_submit_ajax ('igual', 'breload');
				}
			}
		});
	}
}
	
$(document).ajaxStart(function(){
	
    
    
}).ajaxStop(function(){
    
    
    
});
</script>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #8089ff;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
<?php
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gtipo_negocio)) {$_SESSION['gtipo_negocio'] = $this->sc_temp_gtipo_negocio;}
if (isset($this->sc_temp_gcontador_grid_fe)) {$_SESSION['gcontador_grid_fe'] = $this->sc_temp_gcontador_grid_fe;}
if (isset($this->sc_temp_gproveedor)) {$_SESSION['gproveedor'] = $this->sc_temp_gproveedor;}
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->NM_cmp_hidden['detalle'] = "off";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),editado,102), '.', '-') + ' ' + convert(char(8),editado,20), usuario_crea, str_replace (convert(char(10),inicio,102), '.', '-') + ' ' + convert(char(8),inicio,20), str_replace (convert(char(10),fin,102), '.', '-') + ' ' + convert(char(8),fin,20), banco, dias_decredito, cod_cuenta, qr_base64, str_replace (convert(char(10),fecha_validacion,102), '.', '-') + ' ' + convert(char(8),fecha_validacion,20), cufe, estado, enviada_a_tns, factura_tns, enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fechaven, tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, fechavenc, subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, creado, editado, usuario_crea, inicio, fin, banco, dias_decredito, cod_cuenta, qr_base64, fecha_validacion, cufe, estado, enviada_a_tns, factura_tns, enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),fechaven,121), tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, convert(char(23),fechavenc,121), subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, convert(char(23),creado,121), convert(char(23),editado,121), usuario_crea, convert(char(23),inicio,121), convert(char(23),fin,121), banco, dias_decredito, cod_cuenta, qr_base64, convert(char(23),fecha_validacion,121), cufe, estado, enviada_a_tns, factura_tns, enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fechaven, tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, fechavenc, subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, creado, editado, usuario_crea, inicio, fin, banco, dias_decredito, cod_cuenta, qr_base64, fecha_validacion, cufe, estado, enviada_a_tns, factura_tns, enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fechaven, YEAR TO DAY), tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, EXTEND(fechavenc, YEAR TO DAY), subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, EXTEND(creado, YEAR TO FRACTION), EXTEND(editado, YEAR TO FRACTION), usuario_crea, EXTEND(inicio, YEAR TO FRACTION), EXTEND(fin, YEAR TO FRACTION), banco, dias_decredito, cod_cuenta, LOTOFILE(qr_base64, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as qr_base64, EXTEND(fecha_validacion, YEAR TO FRACTION), cufe, estado, enviada_a_tns, factura_tns, LOTOFILE(enlacepdf, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT fechaven, tipo, credito, numero2, idcli, direccion2, total, pedido, idfacven, numfacven, fechavenc, subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, creado, editado, usuario_crea, inicio, fin, banco, dias_decredito, cod_cuenta, qr_base64, fecha_validacion, cufe, estado, enviada_a_tns, factura_tns, enlacepdf, id_trans_fe, nomcli, si_electronica, numfe, nombre_cliente, celular_ws, dircliente from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      if((select dr.direc from direccion dr where f.dircliente=dr.iddireccion) is not null,(select dr.direc from direccion dr where f.dircliente=dr.iddireccion),(select t.direccion from terceros t where t.idtercero=f.idcli)) as direccion2,      enlacepdf,      id_trans_fe,      estado,      (select t.tel_cel from terceros t where t.idtercero=f.idcli) as cel,       (select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,      concat((select r.prefijo from resdian r where r.Idres=f.resolucion),numfacven) as numfe,     (select r.prefijo_fe from resdian r where r.Idres=f.resolucion) as si_electronica,     (select dr.correo from direccion dr  where dr.iddireccion=f.dircliente limit 1) as correosuc,     f.pedido,     (select t.nombres from terceros t where t.idtercero=f.idcli limit 1) as nombre_cliente,     (select t.tel_cel from terceros t where t.idtercero=f.idcli limit 1) as tel_cliente,     (select if(t.celular_notificafe is not null or t.celular_notificafe>0,t.celular_notificafe,t.tel_cel) from terceros t where t.idtercero=f.idcli limit 1) as celular_ws,     f.dircliente FROM      facturaven f WHERE           espos = 'SI' ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
              $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
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
      $this->New_Xls_row = $this->Xls_row;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         if ($this->New_Xls_row > $this->Xls_row) {
             $this->Xls_row = $this->New_Xls_row;
         }
         $this->Xls_row++;
         $this->fechaven = $rs->fields[0] ;  
         $this->tipo = $rs->fields[1] ;  
         $this->credito = $rs->fields[2] ;  
         $this->credito = (string)$this->credito;
         $this->numero2 = $rs->fields[3] ;  
         $this->idcli = $rs->fields[4] ;  
         $this->idcli = (string)$this->idcli;
         $this->direccion2 = $rs->fields[5] ;  
         $this->total = $rs->fields[6] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->pedido = $rs->fields[7] ;  
         $this->pedido = (string)$this->pedido;
         $this->idfacven = $rs->fields[8] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->numfacven = $rs->fields[9] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->fechavenc = $rs->fields[10] ;  
         $this->subtotal = $rs->fields[11] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[12] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
         $this->pagada = $rs->fields[13] ;  
         $this->asentada = $rs->fields[14] ;  
         $this->asentada = (string)$this->asentada;
         $this->observaciones = $rs->fields[15] ;  
         $this->saldo = $rs->fields[16] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[17] ;  
         $this->adicional =  str_replace(",", ".", $this->adicional);
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[18] ;  
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[19] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->resolucion = $rs->fields[20] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->vendedor = $rs->fields[21] ;  
         $this->vendedor = (string)$this->vendedor;
         $this->creado = $rs->fields[22] ;  
         $this->editado = $rs->fields[23] ;  
         $this->usuario_crea = $rs->fields[24] ;  
         $this->usuario_crea = (string)$this->usuario_crea;
         $this->inicio = $rs->fields[25] ;  
         $this->fin = $rs->fields[26] ;  
         $this->banco = $rs->fields[27] ;  
         $this->banco = (string)$this->banco;
         $this->dias_decredito = $rs->fields[28] ;  
         $this->dias_decredito = (string)$this->dias_decredito;
         $this->cod_cuenta = $rs->fields[29] ;  
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->qr_base64 = "";  
              if (is_file($rs_grid->fields[30])) 
              { 
                  $this->qr_base64 = file_get_contents($rs_grid->fields[30]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->qr_base64 = $this->Db->BlobDecode($rs->fields[30]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->qr_base64 = $this->Db->BlobDecode($rs->fields[30]) ;  
         } 
         else
         { 
             $this->qr_base64 = $rs->fields[30] ;  
         } 
         $this->fecha_validacion = $rs->fields[31] ;  
         $this->cufe = $rs->fields[32] ;  
         $this->estado = $rs->fields[33] ;  
         $this->enviada_a_tns = $rs->fields[34] ;  
         $this->factura_tns = $rs->fields[35] ;  
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->enlacepdf = "";  
              if (is_file($rs_grid->fields[36])) 
              { 
                  $this->enlacepdf = file_get_contents($rs_grid->fields[36]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->enlacepdf = $this->Db->BlobDecode($rs->fields[36]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->enlacepdf = $this->Db->BlobDecode($rs->fields[36]) ;  
         } 
         else
         { 
             $this->enlacepdf = $rs->fields[36] ;  
         } 
         $this->id_trans_fe = $rs->fields[37] ;  
         $this->nomcli = $rs->fields[38] ;  
         $this->si_electronica = $rs->fields[39] ;  
         $this->numfe = $rs->fields[40] ;  
         $this->nombre_cliente = $rs->fields[41] ;  
         $this->celular_ws = $rs->fields[42] ;  
         $this->dircliente = $rs->fields[43] ;  
         $this->dircliente = (string)$this->dircliente;
         $this->Orig_fechaven = $this->fechaven;
         $this->Orig_tipo = $this->tipo;
         $this->Orig_credito = $this->credito;
         $this->Orig_numero2 = $this->numero2;
         $this->Orig_idcli = $this->idcli;
         $this->Orig_direccion2 = $this->direccion2;
         $this->Orig_total = $this->total;
         $this->Orig_pedido = $this->pedido;
         $this->Orig_idfacven = $this->idfacven;
         $this->Orig_numfacven = $this->numfacven;
         $this->Orig_fechavenc = $this->fechavenc;
         $this->Orig_subtotal = $this->subtotal;
         $this->Orig_valoriva = $this->valoriva;
         $this->Orig_pagada = $this->pagada;
         $this->Orig_asentada = $this->asentada;
         $this->Orig_observaciones = $this->observaciones;
         $this->Orig_saldo = $this->saldo;
         $this->Orig_adicional = $this->adicional;
         $this->Orig_adicional2 = $this->adicional2;
         $this->Orig_adicional3 = $this->adicional3;
         $this->Orig_resolucion = $this->resolucion;
         $this->Orig_vendedor = $this->vendedor;
         $this->Orig_creado = $this->creado;
         $this->Orig_editado = $this->editado;
         $this->Orig_usuario_crea = $this->usuario_crea;
         $this->Orig_inicio = $this->inicio;
         $this->Orig_fin = $this->fin;
         $this->Orig_banco = $this->banco;
         $this->Orig_dias_decredito = $this->dias_decredito;
         $this->Orig_cod_cuenta = $this->cod_cuenta;
         $this->Orig_qr_base64 = $this->qr_base64;
         $this->Orig_fecha_validacion = $this->fecha_validacion;
         $this->Orig_cufe = $this->cufe;
         $this->Orig_estado = $this->estado;
         $this->Orig_enviada_a_tns = $this->enviada_a_tns;
         $this->Orig_factura_tns = $this->factura_tns;
         $this->Orig_enlacepdf = $this->enlacepdf;
         $this->Orig_id_trans_fe = $this->id_trans_fe;
         $this->Orig_nomcli = $this->nomcli;
         $this->Orig_si_electronica = $this->si_electronica;
         $this->Orig_numfe = $this->numfe;
         $this->Orig_nombre_cliente = $this->nombre_cliente;
         $this->Orig_celular_ws = $this->celular_ws;
         $this->Orig_dircliente = $this->dircliente;
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "fecha")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechaven');
             $TP_Time     = (in_array('fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_fechaven = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechaven, $Format_tst, "fechaven");
             if (empty($this->fechaven))
             {
                 $this->Tot->Sc_groupby_fechaven = "fechaven";
             }
             else
             {
                 $this->Tot->Sc_groupby_fechaven = $this->Ini->Get_sql_date_groupby("fechaven", $Format_tst);
             }
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by")
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
             {
                 $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                 if ($Cmp_orig == "fechaven")
                 {
                     $Str_arg_sum = "arg_sum_" . $cmp_gb;
                     $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                     $TP_Time     = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                     $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechaven, $Format_tst, "fechaven");
                 }
             }
         }
         if ($this->fechaven == "")
         {
             $this->arg_sum_fechaven = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "_NM_SC_")
         {
             $this->arg_sum_fechaven = " = " . $this->Db->qstr($this->fechaven);
         }
         $this->arg_sum_tipo = " = " . $this->Db->qstr($this->tipo);
         $this->arg_sum_credito = ($this->credito == "") ? " is null " : " = " . $this->credito;
         $this->arg_sum_idcli = ($this->idcli == "") ? " is null " : " = " . $this->idcli;
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by")
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
             {
                 $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                 if ($Cmp_orig == "fechavenc")
                 {
                     $Str_arg_sum = "arg_sum_" . $cmp_gb;
                     $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                     $TP_Time     = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                     $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechavenc, $Format_tst, "fechavenc");
                 }
             }
         }
         if ($this->fechavenc == "")
         {
             $this->arg_sum_fechavenc = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "_NM_SC_")
         {
             $this->arg_sum_fechavenc = " = " . $this->Db->qstr($this->fechavenc);
         }
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_asentada = ($this->asentada == "") ? " is null " : " = " . $this->asentada;
         $this->arg_sum_resolucion = ($this->resolucion == "") ? " is null " : " = " . $this->resolucion;
         $this->arg_sum_vendedor = ($this->vendedor == "") ? " is null " : " = " . $this->vendedor;
         $this->arg_sum_banco = ($this->banco == "") ? " is null " : " = " . $this->banco;
          $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechaven');
          $TP_Time = (in_array('fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaven, $Format_tst);
          if ($Cmp_tst != $this->fechaven_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "fecha") 
          {  
              if (isset($this->fechaven_Old) && !$prim_gb)
              {
                 $this->quebra_fechaven_fecha_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechaven');
              $TP_Time = (in_array('fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fechaven_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechaven, $Format_tst);
              $this->quebra_fechaven_fecha($this->fechaven) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->fechaven_Old))
              {
                 $this->quebra_fechaven_fecha_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp] : $cmp;
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
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp']);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
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
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp']);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          if ($this->credito !== $this->credito_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "formapago") 
          {  
              if (isset($this->credito_Old) && !$prim_gb)
              {
                 $this->quebra_credito_formapago_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->credito_Old = $this->credito ; 
              $this->quebra_credito_formapago($this->credito) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->credito_Old))
              {
                 $this->quebra_credito_formapago_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->idcli !== $this->idcli_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porcliente") 
          {  
              if (isset($this->idcli_Old) && !$prim_gb)
              {
                 $this->quebra_idcli_porcliente_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->idcli_Old = $this->idcli ; 
              $this->quebra_idcli_porcliente($this->idcli) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->idcli_Old))
              {
                 $this->quebra_idcli_porcliente_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->resolucion !== $this->resolucion_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porpj") 
          {  
              if (isset($this->resolucion_Old) && !$prim_gb)
              {
                 $this->quebra_resolucion_porpj_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->resolucion_Old = $this->resolucion ; 
              $this->quebra_resolucion_porpj($this->resolucion) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->resolucion_Old))
              {
                 $this->quebra_resolucion_porpj_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->tipo !== $this->tipo_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "portipo") 
          {  
              if (isset($this->tipo_Old) && !$prim_gb)
              {
                 $this->quebra_tipo_portipo_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->tipo_Old = $this->tipo ; 
              $this->quebra_tipo_portipo($this->tipo) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->tipo_Old))
              {
                 $this->quebra_tipo_portipo_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->vendedor !== $this->vendedor_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porvendedor") 
          {  
              if (isset($this->vendedor_Old) && !$prim_gb)
              {
                 $this->quebra_vendedor_porvendedor_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->vendedor_Old = $this->vendedor ; 
              $this->quebra_vendedor_porvendedor($this->vendedor) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->vendedor_Old))
              {
                 $this->quebra_vendedor_porvendedor_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->asentada !== $this->asentada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porasentada") 
          {  
              if (isset($this->asentada_Old) && !$prim_gb)
              {
                 $this->quebra_asentada_porasentada_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->asentada_Old = $this->asentada ; 
              $this->quebra_asentada_porasentada($this->asentada) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->asentada_Old))
              {
                 $this->quebra_asentada_porasentada_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->pagada !== $this->pagada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "pagada") 
          {  
              if (isset($this->pagada_Old) && !$prim_gb)
              {
                 $this->quebra_pagada_pagada_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->pagada_Old = $this->pagada ; 
              $this->quebra_pagada_pagada($this->pagada) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->pagada_Old))
              {
                 $this->quebra_pagada_pagada_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->banco !== $this->banco_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porbanco") 
          {  
              if (isset($this->banco_Old) && !$prim_gb)
              {
                 $this->quebra_banco_porbanco_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->banco_Old = $this->banco ; 
              $this->quebra_banco_porbanco($this->banco) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->banco_Old))
              {
                 $this->quebra_banco_porbanco_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         //----- lookup - pedido
         $this->look_pedido = $this->pedido; 
         $this->Lookup->lookup_pedido($this->look_pedido, $this->pedido) ; 
         $this->look_pedido = ($this->look_pedido == "&nbsp;") ? "" : $this->look_pedido; 
         //----- lookup - asentada
         $this->look_asentada = $this->asentada; 
         $this->Lookup->lookup_asentada($this->look_asentada); 
         $this->look_asentada = ($this->look_asentada == "&nbsp;") ? "" : $this->look_asentada; 
         //----- lookup - resolucion
         $this->look_resolucion = $this->resolucion; 
         $this->Lookup->lookup_resolucion($this->look_resolucion, $this->resolucion) ; 
         $this->look_resolucion = ($this->look_resolucion == "&nbsp;") ? "" : $this->look_resolucion; 
         //----- lookup - vendedor
         $this->look_vendedor = $this->vendedor; 
         $this->Lookup->lookup_vendedor($this->look_vendedor, $this->vendedor) ; 
         $this->look_vendedor = ($this->look_vendedor == "&nbsp;") ? "" : $this->look_vendedor; 
         //----- lookup - banco
         $this->look_banco = $this->banco; 
         $this->Lookup->lookup_banco($this->look_banco, $this->banco) ; 
         $this->look_banco = ($this->look_banco == "&nbsp;") ? "" : $this->look_banco; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($_SESSION['gproveedor'])) {$_SESSION['gproveedor'] = "";}
if (!isset($this->sc_temp_gproveedor)) {$this->sc_temp_gproveedor = (isset($_SESSION['gproveedor'])) ? $_SESSION['gproveedor'] : "";}
if (!isset($_SESSION['gtipo_negocio'])) {$_SESSION['gtipo_negocio'] = "";}
if (!isset($this->sc_temp_gtipo_negocio)) {$this->sc_temp_gtipo_negocio = (isset($_SESSION['gtipo_negocio'])) ? $_SESSION['gtipo_negocio'] : "";}
  if($this->sc_temp_gtipo_negocio=="RESTAURANTE")
{
	if($this->asentada =="1")
	{
		$this->restaurante  = "";
	}
	else
	{
		$this->restaurante  = "<a href='../blank_grupos_calculadora/index.php?idfacven=".$this->idfacven ."' ><img src='../_lib/img/scriptcase__NM__ico__NM__plasma_tv_32.png' /></a>";
	}
}


if($this->tipo =="FV")
{
$this->NM_field_style["tipo"] = "background-color:#cad9e9;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->tipo =="RS")
{
$this->NM_field_style["tipo"] = "background-color:#f0ad4e;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}


	
if($this->asentada =="1")
{
	$this->NM_field_style["fechaven"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	
	
	$this->editarpos  = "<a href='#'></a>";
	
	
	
	?>
	<script>
	function fImprimir(idfactura,idresolucion)
	{
		$.post("../frm_pos_impresion/index.php",{

			idfactura: idfactura,
			pj:idresolucion

		},function(r3){

			console.log("Log impresion: ");
			console.log(r3);
		
			var obj = JSON.parse(r3);
		
			if($.isEmptyObject(obj.rutaimpresora))
			{
				alert("No hay impresora configurada.");
			}

		});
	}
	</script>
	<?php

	
	$this->imprimircopia  = "<a href='../frm_pos_impresion_html/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
	
	$this->imprimir  = "<a href='../frm_pos_impresion_html_cmd/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/scriptcase__NM__ico__NM__sc_menu_pdf2_e.png' /></a>";
	
	if($this->si_electronica =="FE")
	{
		switch($this->sc_temp_gproveedor)
		{
			case 'CADENA S. A.':
				$this->enviar_tech  = "<a onclick='fEnviarTech(\"".$this->idfacven ."\");' rel='Firmar el documento electrónico'><img style='cursor:pointer;width:32px;' src='../_lib/img/grp__NM__ico__NM__ico_firmar.png' /></a>";
			break;

			case 'FACILWEB':
				$this->enviar_propio  = "<a onclick='fEnviarPropio(\"".$this->idfacven ."\",\"".$this->sc_temp_gbd_seleccionada."\",parent.id);' rel='Enviar el documento electrónico'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' /><span class='tooltiptext'>Enviar documento</span></div></a>";
				
				$this->regenerar_pdf_propio  = "<a onclick='fRegenerarPDFPropio(\"".$this->idfacven ."\",\"".$this->sc_temp_gbd_seleccionada."\",\"".$this->cufe ."\");' rel='Regenerar PDF'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__document_refresh_32.png' /><span class='tooltiptext'>Regenerar PDF</span></div></a>";
			break;
				
			case 'DATAICO':
				$this->envio_dataico  = "<a onclick='fEnvioDataico(\"".$this->idfacven ."\");' rel='Enviar el documento electrónico'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' /><span class='tooltiptext'>Enviar documento</span></div></a>";
			break;
		}
	}
	else
	{
		$this->enviar_propio  = "";
		$this->enviar_tech    = "";
		$this->envio_dataico  = "";
	}
	
	if(!empty($this->cufe ))
	{
		if($this->sc_temp_gproveedor=="CADENA S. A.")
		{
			if(!empty($this->id_trans_fe ))
			{
				
				$this->enviar_tech  = "<a href='../blank_pdf_facturatech/index.php?idfacven=".$this->idfacven ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png'   id=pdf_".$this->idfacven ."' name='pdf_".$this->idfacven ."' /></a>";
				
				$vnombre_cliente = $this->nomcli ;
				$vm     = $this->fechaven ;
				$vm     = date_create($vm);
				$vanio  = date_format($vm,"Y");
				$vm     = date_format($vm,"m");
				$vmes   = "ENERO";
				switch($vm)
				{
					case 2:
					$vmes = "FEBRERO";
					break;

					case 3:
					$vmes = "MARZO";
					break;

					case 4:
					$vmes = "ABRIL";
					break;

					case 5:
					$vmes = "MAYO";
					break;

					case 6:
					$vmes = "JUNIO";
					break;

					case 7:
					$vmes = "JULIO";
					break;

					case 8:
					$vmes = "AGOSTO";
					break;

					case 9:
					$vmes = "SEPTIEMBRE";
					break;

					case 10:
					$vmes = "OCTUBRE";
					break;

					case 11:
					$vmes = "NOVIEMBRE";
					break;

					case 12:
					$vmes = "DICIEMBRE";
					break;
				}

				$vnombre_cliente = str_replace(" ","_",$vnombre_cliente);
				$vnombre_cliente = str_replace("Ñ","N",$vnombre_cliente);
				$vnombre_cliente = str_replace("Ó","O",$vnombre_cliente);
				$vnombre_cliente = str_replace("Í","I",$vnombre_cliente);
				$vnombre_cliente = str_replace("Á","A",$vnombre_cliente);
				$vnombre_cliente = str_replace("É","E",$vnombre_cliente);
				$vnombre_cliente = str_replace("Ú","U",$vnombre_cliente);

				$vnum = $this->numero2 ;
				$vnum = str_replace("/","",$vnum);
				$vfile = $vnum.'__'.$vmes.$vanio.'__'.$vnombre_cliente.'.pdf';
				$vrut = "../blank_pdf_facturatech/".$vfile;
				$vrut = realpath($vrut);
				$vrut = urlencode($vrut);
				
				
				$this->editarpos  = "<a href='whatsapp://send?file=".$vrut."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_whatsapp.png' style='width:32px;'  data-action='share/whatsapp/share'/></a>";
				
			}
		}
		
		if($this->si_electronica =="FE")
		{
			if($this->sc_temp_gproveedor=="FACILWEB")
			{
				if(!empty($this->enlacepdf ))
				{
					$this->editarpos  = "<a href='".$this->enlacepdf ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png'   id=pdf_".$this->idfacven ."' name='pdf_".$this->idfacven ."' /></a>";

					$this->enviar_propio  = "<a style='cursor:pointer;' onclick='fReenviarPropio(\"".$this->idfacven ."\");'><div class='tooltip'><img src='../_lib/img/scriptcase__NM__ico__NM__mail_forward_all_32.png' /><span class='tooltiptext'>Reenviar correo</span></div></a>";
				}
				else
				{
					$this->enviar_propio  = "";
				}
			}
			
			if($this->sc_temp_gproveedor=="DATAICO")
			{
				if(!empty($this->enlacepdf ))
				{
					$this->editarpos  = "<a href='".$this->enlacepdf ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png'   id=pdf_".$this->idfacven ."' name='pdf_".$this->idfacven ."' /></a>";

					$this->envio_dataico  = "<a style='cursor:pointer;' onclick='fReenviarDataico(\"".$this->idfacven ."\");'><div class='tooltip'><img src='../_lib/img/scriptcase__NM__ico__NM__mail_forward_all_32.png' /><span class='tooltiptext'>Reenviar correo</span></div></a>";
				}
				else
				{
					$this->envio_dataico  = "";
				}
			}
		}
	}
	else
	{
		
		if($this->si_electronica =="FE")
		{
			if($this->sc_temp_gproveedor=="CADENA S. A.")
			{
				if(!empty($this->id_trans_fe ))
				{

					$this->enviar_tech  = "<img src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' onclick='fConsultarEstadoTech(\"".$this->sc_temp_gbd_seleccionada."\",\"".$this->idfacven ."\");'  id='i_".$this->idfacven ."' name='i_".$this->idfacven ."' style='cursor:pointer;'/><img src='../_lib/img/grp__NM__ico__NM__cargando.gif' id='a_".$this->idfacven ."' name='a_".$this->idfacven ."' style='display:none;width:32px;'/><a href='../blank_pdf_facturatech/index.php?idfacven=".$this->idfacven ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png' id='p_".$this->idfacven ."' name='p_".$this->idfacven ."' style='display:none;'/></a>";
				}
			}
		}
		
		if($this->sc_temp_gproveedor=="FACILWEB")
		{
			if($this->si_electronica =="FE")
			{
				$this->editarpos  = "";
			}
			else
			{
				$this->editarpos  = "<a onclick='fReversarDoc(\"".$this->idfacven ."\");' rel='Reversar documento'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__data_out_32.png' /><span class='tooltiptext'>Revesar documento</span></div></a>";
			}
		}
		
		if($this->sc_temp_gproveedor=="DATAICO")
		{
			if($this->si_electronica =="FE")
			{
				$this->editarpos  = "";
			}
			else
			{
				$this->editarpos  = "<a onclick='fReversarDoc(\"".$this->idfacven ."\");' rel='Reversar documento'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__data_out_32.png' /><span class='tooltiptext'>Revesar documento</span></div></a>";
			}
		}
	}
}
else
{
	$this->editarpos  = "<a href='../frm_pos/index.php?gidfactura=".$this->idfacven ."' ><img src='../_lib/img/scriptcase__NM__ico__NM__address_book_edit_32.png' /></a>";
	
	$this->imprimircopia  = "<a href='../frm_pos_impresion_html/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
	
	$this->enviar_tech  = "";
	$this->enviar_propio  = "<a onclick='fAsentarDoc(\"".$this->idfacven ."\");' rel='Asentar documento'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__data_into_32.png' /><span class='tooltiptext'>Asentar</span></div></a>";
	
	$this->envio_dataico  = "<a onclick='fAsentarDoc(\"".$this->idfacven ."\");' rel='Asentar documento'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__data_into_32.png' /><span class='tooltiptext'>Asentar</span></div></a>";
}

$vurl = sc_url_library("prj", "factura", "index.php");
$this->a4  = "<a href='".$vurl."?idempresa=".$this->sc_temp_gbd_seleccionada."&id=".$this->idfacven ."' target='_blank'><img src='../_lib/img/scriptcase__NM__ico__NM__printer3_32.png'  style='width:32px;'/></a>";



if($this->estado =='200' or $this->estado =='201')
{
	$this->NM_field_style["numero2"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$this->ver_xml_propio  = "<a onclick='fJSONPropio(\"".$this->idfacven ."\",\"".$this->sc_temp_gbd_seleccionada."\",parent.id);' rel='Consultar JSON'><div class='tooltip'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__data_into_32.png' /><span class='tooltiptext'>Consutar JSON</span></div></a>";
if (isset($this->sc_temp_gtipo_negocio)) {$_SESSION['gtipo_negocio'] = $this->sc_temp_gtipo_negocio;}
if (isset($this->sc_temp_gproveedor)) {$_SESSION['gproveedor'] = $this->sc_temp_gproveedor;}
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          if ($this->New_Xls_row > $this->Xls_row) {
              $this->Xls_row = $this->New_Xls_row;
          }
          $this->Xls_col = 0;
          $this->Xls_row++;
       if (isset($this->fechaven_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "fecha")
       {
           $this->quebra_fechaven_fecha_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Gb_Free_cmp']);
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
       if (isset($this->credito_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "formapago")
       {
           $this->quebra_credito_formapago_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->idcli_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porcliente")
       {
           $this->quebra_idcli_porcliente_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->resolucion_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porpj")
       {
           $this->quebra_resolucion_porpj_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->tipo_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "portipo")
       {
           $this->quebra_tipo_portipo_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->vendedor_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porvendedor")
       {
           $this->quebra_vendedor_porvendedor_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->asentada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porasentada")
       {
           $this->quebra_asentada_porasentada_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->pagada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "pagada")
       {
           $this->quebra_pagada_pagada_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->banco_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] == "porbanco")
       {
           $this->quebra_banco_porbanco_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "F.Pago"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['numero2'])) ? $this->New_label['numero2'] : "#"; 
          if ($Cada_col == "numero2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
          if ($Cada_col == "idcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['direccion2'])) ? $this->New_label['direccion2'] : "Dirección"; 
          if ($Cada_col == "direccion2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['editarpos'])) ? $this->New_label['editarpos'] : "Editar"; 
          if ($Cada_col == "editarpos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['copiar'])) ? $this->New_label['copiar'] : "Duplicar"; 
          if ($Cada_col == "copiar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['imprimircopia'])) ? $this->New_label['imprimircopia'] : "Ticket"; 
          if ($Cada_col == "imprimircopia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['a4'])) ? $this->New_label['a4'] : "A4"; 
          if ($Cada_col == "a4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['pdf'])) ? $this->New_label['pdf'] : "PDF"; 
          if ($Cada_col == "pdf" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : ""; 
          if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
          {
              $this->arr_span['detalle'] = $this->count_span;
              $this->Emb_label_cols_detalle = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida_label'] = true;
              $GLOBALS["script_case_init"] = $this->Ini->sc_page;
              $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?";
              if (method_exists($this->grid_facturaven_pos_detalle, "controle"))
              {
                  $this->grid_facturaven_pos_detalle->controle();
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                  {
                      $this->Ini->conectDB();
                      $this->Db = $this->Ini->Db;
                      if ($this->Tot) {
                          $this->Tot->Db = $this->Db;
                      }
                  }
                  if (isset($_SESSION['scriptcase']['export_return']))
                  {
                     foreach ($_SESSION['scriptcase']['export_return']['label'] as $col => $dados)
                     {
                         if (isset($dados['col_span_i'])) {
                             $this->Emb_label_cols_detalle += $dados['col_span_i'];
                         }
                         elseif (isset($dados['col_span_f'])) {
                             $this->Emb_label_cols_detalle += $dados['col_span_f'];
                         }
                         else {
                             $this->Emb_label_cols_detalle++;
                         }
                     }
                  }
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida'] = false;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida_label'] = false;
          }
          $SC_Label = (isset($this->New_label['enviar_tech'])) ? $this->New_label['enviar_tech'] : "Envío"; 
          if ($Cada_col == "enviar_tech" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['enviar_propio'])) ? $this->New_label['enviar_propio'] : "Acción"; 
          if ($Cada_col == "enviar_propio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['reenviar'])) ? $this->New_label['reenviar'] : "Reenviar"; 
          if ($Cada_col == "reenviar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['restaurante'])) ? $this->New_label['restaurante'] : "Terminal"; 
          if ($Cada_col == "restaurante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['pedido'])) ? $this->New_label['pedido'] : "Pedido"; 
          if ($Cada_col == "pedido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['whatsapp_propio'])) ? $this->New_label['whatsapp_propio'] : "WhatsApp"; 
          if ($Cada_col == "whatsapp_propio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['ver_xml_propio'])) ? $this->New_label['ver_xml_propio'] : "JSON"; 
          if ($Cada_col == "ver_xml_propio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['envio_dataico'])) ? $this->New_label['envio_dataico'] : "Acción"; 
          if ($Cada_col == "envio_dataico" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['regenerar_pdf_propio'])) ? $this->New_label['regenerar_pdf_propio'] : "Regenerar"; 
          if ($Cada_col == "regenerar_pdf_propio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
          if ($Cada_col == "idfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "No"; 
          if ($Cada_col == "numfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Fechavenc"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "IVA"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
          if ($Cada_col == "pagada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
          if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Desc."; 
          if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
          if ($Cada_col == "adicional2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
          if ($Cada_col == "adicional3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : " Vendedor"; 
          if ($Cada_col == "vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['editado'])) ? $this->New_label['editado'] : ""; 
          if ($Cada_col == "editado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['usuario_crea'])) ? $this->New_label['usuario_crea'] : "Usuario Crea"; 
          if ($Cada_col == "usuario_crea" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['inicio'])) ? $this->New_label['inicio'] : "Inicio"; 
          if ($Cada_col == "inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['fin'])) ? $this->New_label['fin'] : "Fin"; 
          if ($Cada_col == "fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['banco'])) ? $this->New_label['banco'] : "Caja"; 
          if ($Cada_col == "banco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['dias_decredito'])) ? $this->New_label['dias_decredito'] : "Dias Decredito"; 
          if ($Cada_col == "dias_decredito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cod Cuenta"; 
          if ($Cada_col == "cod_cuenta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['qr_base64'])) ? $this->New_label['qr_base64'] : "QR"; 
          if ($Cada_col == "qr_base64" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['fecha_validacion'])) ? $this->New_label['fecha_validacion'] : "Fecha Validacion"; 
          if ($Cada_col == "fecha_validacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['cufe'])) ? $this->New_label['cufe'] : "Cufe"; 
          if ($Cada_col == "cufe" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['existeentns'])) ? $this->New_label['existeentns'] : "TNS"; 
          if ($Cada_col == "existeentns" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "PDF"; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida'])
      { 
          if (!isset($this->NM_cmp_hidden[$detalle]) || $this->NM_cmp_hidden[$detalle] != "off")
          {
              while ($this->count_span < $this->Emb_label_cols_detalle)
              {
                  $this->arr_export['label'][$this->Xls_col]['data']     = " ";
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->count_span++;
                  $this->Xls_col++;
              }
          }
      }
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- fechaven
   function NM_export_fechaven()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fechaven = substr($this->fechaven, 0, 10);
         if (empty($this->fechaven) || $this->fechaven == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechaven, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechaven, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->fechaven);
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
   //----- credito
   function NM_export_credito()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_credito, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_credito, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- numero2
   function NM_export_numero2()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numero2 = html_entity_decode($this->numero2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero2 = strip_tags($this->numero2);
         $this->numero2 = NM_charset_to_utf8($this->numero2);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numero2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numero2, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- idcli
   function NM_export_idcli()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_idcli = html_entity_decode($this->look_idcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idcli = strip_tags($this->look_idcli);
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_idcli, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_idcli, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- direccion2
   function NM_export_direccion2()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->direccion2 = html_entity_decode($this->direccion2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion2 = strip_tags($this->direccion2);
         $this->direccion2 = NM_charset_to_utf8($this->direccion2);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->direccion2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->direccion2, PHPExcel_Cell_DataType::TYPE_STRING);
         }
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
   }
   //----- editarpos
   function NM_export_editarpos()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->editarpos = html_entity_decode($this->editarpos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->editarpos = strip_tags($this->editarpos);
         $this->editarpos = NM_charset_to_utf8($this->editarpos);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->editarpos, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->editarpos, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- copiar
   function NM_export_copiar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->copiar = NM_charset_to_utf8($this->copiar);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->copiar, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->copiar, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- imprimircopia
   function NM_export_imprimircopia()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->imprimircopia = html_entity_decode($this->imprimircopia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimircopia = strip_tags($this->imprimircopia);
         $this->imprimircopia = NM_charset_to_utf8($this->imprimircopia);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->imprimircopia, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->imprimircopia, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- a4
   function NM_export_a4()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->a4 = html_entity_decode($this->a4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->a4 = strip_tags($this->a4);
         $this->a4 = NM_charset_to_utf8($this->a4);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->a4, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->a4, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- pdf
   function NM_export_pdf()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->pdf = html_entity_decode($this->pdf, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pdf = strip_tags($this->pdf);
         $this->pdf = NM_charset_to_utf8($this->pdf);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pdf, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pdf, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- enviar_tech
   function NM_export_enviar_tech()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->enviar_tech = html_entity_decode($this->enviar_tech, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->enviar_tech = strip_tags($this->enviar_tech);
         $this->enviar_tech = NM_charset_to_utf8($this->enviar_tech);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->enviar_tech, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->enviar_tech, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- enviar_propio
   function NM_export_enviar_propio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->enviar_propio = html_entity_decode($this->enviar_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->enviar_propio = strip_tags($this->enviar_propio);
         $this->enviar_propio = NM_charset_to_utf8($this->enviar_propio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->enviar_propio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->enviar_propio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- reenviar
   function NM_export_reenviar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->reenviar = NM_charset_to_utf8($this->reenviar);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->reenviar, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->reenviar, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- restaurante
   function NM_export_restaurante()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->restaurante = html_entity_decode($this->restaurante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->restaurante = strip_tags($this->restaurante);
         $this->restaurante = NM_charset_to_utf8($this->restaurante);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->restaurante, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->restaurante, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- pedido
   function NM_export_pedido()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_pedido = NM_charset_to_utf8($this->look_pedido);
         if (is_numeric($this->look_pedido))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_pedido);
         $this->Xls_col++;
   }
   //----- whatsapp_propio
   function NM_export_whatsapp_propio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->whatsapp_propio = NM_charset_to_utf8($this->whatsapp_propio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->whatsapp_propio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->whatsapp_propio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- ver_xml_propio
   function NM_export_ver_xml_propio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->ver_xml_propio = html_entity_decode($this->ver_xml_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ver_xml_propio = strip_tags($this->ver_xml_propio);
         $this->ver_xml_propio = NM_charset_to_utf8($this->ver_xml_propio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->ver_xml_propio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->ver_xml_propio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- envio_dataico
   function NM_export_envio_dataico()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->envio_dataico = html_entity_decode($this->envio_dataico, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->envio_dataico = strip_tags($this->envio_dataico);
         $this->envio_dataico = NM_charset_to_utf8($this->envio_dataico);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->envio_dataico, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->envio_dataico, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- regenerar_pdf_propio
   function NM_export_regenerar_pdf_propio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->regenerar_pdf_propio = html_entity_decode($this->regenerar_pdf_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->regenerar_pdf_propio = strip_tags($this->regenerar_pdf_propio);
         $this->regenerar_pdf_propio = NM_charset_to_utf8($this->regenerar_pdf_propio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->regenerar_pdf_propio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->regenerar_pdf_propio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- idfacven
   function NM_export_idfacven()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->idfacven = NM_charset_to_utf8($this->idfacven);
         if (is_numeric($this->idfacven))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->idfacven);
         $this->Xls_col++;
   }
   //----- numfacven
   function NM_export_numfacven()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numfacven = NM_charset_to_utf8($this->numfacven);
         if (is_numeric($this->numfacven))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->numfacven);
         $this->Xls_col++;
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fechavenc = substr($this->fechavenc, 0, 10);
         if (empty($this->fechavenc) || $this->fechavenc == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechavenc, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechavenc, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->fechavenc);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
         $this->Xls_col++;
   }
   //----- subtotal
   function NM_export_subtotal()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         if (is_numeric($this->subtotal))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->subtotal);
         $this->Xls_col++;
   }
   //----- valoriva
   function NM_export_valoriva()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         if (is_numeric($this->valoriva))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->valoriva);
         $this->Xls_col++;
   }
   //----- pagada
   function NM_export_pagada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pagada, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pagada, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- asentada
   function NM_export_asentada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_asentada = NM_charset_to_utf8($this->look_asentada);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_asentada, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_asentada, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->observaciones, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->observaciones, PHPExcel_Cell_DataType::TYPE_STRING);
         }
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
   //----- adicional
   function NM_export_adicional()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->adicional = NM_charset_to_utf8($this->adicional);
         if (is_numeric($this->adicional))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->adicional);
         $this->Xls_col++;
   }
   //----- adicional2
   function NM_export_adicional2()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->adicional2 = NM_charset_to_utf8($this->adicional2);
         if (is_numeric($this->adicional2))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->adicional2);
         $this->Xls_col++;
   }
   //----- adicional3
   function NM_export_adicional3()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->adicional3 = NM_charset_to_utf8($this->adicional3);
         if (is_numeric($this->adicional3))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->adicional3);
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
   //----- vendedor
   function NM_export_vendedor()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         if (is_numeric($this->look_vendedor))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_vendedor);
         $this->Xls_col++;
   }
   //----- creado
   function NM_export_creado()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
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
                 $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
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
   //----- editado
   function NM_export_editado()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->editado = NM_charset_to_utf8($this->editado);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->editado, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->editado, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- usuario_crea
   function NM_export_usuario_crea()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->usuario_crea = NM_charset_to_utf8($this->usuario_crea);
         if (is_numeric($this->usuario_crea))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->usuario_crea);
         $this->Xls_col++;
   }
   //----- inicio
   function NM_export_inicio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->inicio))
      {
             if (substr($this->inicio, 10, 1) == "-") 
             { 
                 $this->inicio = substr($this->inicio, 0, 10) . " " . substr($this->inicio, 11);
             } 
             if (substr($this->inicio, 13, 1) == ".") 
             { 
                $this->inicio = substr($this->inicio, 0, 13) . ":" . substr($this->inicio, 14, 2) . ":" . substr($this->inicio, 17);
             } 
             $conteudo_x =  $this->inicio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->inicio, "YYYY-MM-DD HH:II:SS  ");
                 $this->inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         $this->inicio = NM_charset_to_utf8($this->inicio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->inicio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->inicio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fin
   function NM_export_fin()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->fin))
      {
             if (substr($this->fin, 10, 1) == "-") 
             { 
                 $this->fin = substr($this->fin, 0, 10) . " " . substr($this->fin, 11);
             } 
             if (substr($this->fin, 13, 1) == ".") 
             { 
                $this->fin = substr($this->fin, 0, 13) . ":" . substr($this->fin, 14, 2) . ":" . substr($this->fin, 17);
             } 
             $conteudo_x =  $this->fin;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fin, "YYYY-MM-DD HH:II:SS  ");
                 $this->fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         $this->fin = NM_charset_to_utf8($this->fin);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fin, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fin, PHPExcel_Cell_DataType::TYPE_STRING);
         }
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
   //----- dias_decredito
   function NM_export_dias_decredito()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->dias_decredito = NM_charset_to_utf8($this->dias_decredito);
         if (is_numeric($this->dias_decredito))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->dias_decredito);
         $this->Xls_col++;
   }
   //----- cod_cuenta
   function NM_export_cod_cuenta()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cod_cuenta = html_entity_decode($this->cod_cuenta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_cuenta = strip_tags($this->cod_cuenta);
         $this->cod_cuenta = NM_charset_to_utf8($this->cod_cuenta);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cod_cuenta, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cod_cuenta, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- qr_base64
   function NM_export_qr_base64()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->qr_base64 = NM_charset_to_utf8($this->qr_base64);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->qr_base64, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->qr_base64, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fecha_validacion
   function NM_export_fecha_validacion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->fecha_validacion))
      {
             if (substr($this->fecha_validacion, 10, 1) == "-") 
             { 
                 $this->fecha_validacion = substr($this->fecha_validacion, 0, 10) . " " . substr($this->fecha_validacion, 11);
             } 
             if (substr($this->fecha_validacion, 13, 1) == ".") 
             { 
                $this->fecha_validacion = substr($this->fecha_validacion, 0, 13) . ":" . substr($this->fecha_validacion, 14, 2) . ":" . substr($this->fecha_validacion, 17);
             } 
             $conteudo_x =  $this->fecha_validacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_validacion, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_validacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         $this->fecha_validacion = NM_charset_to_utf8($this->fecha_validacion);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha_validacion, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha_validacion, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- cufe
   function NM_export_cufe()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cufe = html_entity_decode($this->cufe, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cufe = strip_tags($this->cufe);
         $this->cufe = NM_charset_to_utf8($this->cufe);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cufe, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cufe, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- estado
   function NM_export_estado()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         $this->estado = NM_charset_to_utf8($this->estado);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->estado, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->estado, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- existeentns
   function NM_export_existeentns()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->existeentns = html_entity_decode($this->existeentns, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->existeentns = strip_tags($this->existeentns);
         $this->existeentns = NM_charset_to_utf8($this->existeentns);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->existeentns, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->existeentns, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->imprimir = html_entity_decode($this->imprimir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimir = strip_tags($this->imprimir);
         $this->imprimir = NM_charset_to_utf8($this->imprimir);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->imprimir, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->imprimir, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fechaven
   function NM_sub_cons_fechaven()
   {
         $this->fechaven = substr($this->fechaven, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fechaven;
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
   //----- credito
   function NM_sub_cons_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_credito;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- numero2
   function NM_sub_cons_numero2()
   {
         $this->numero2 = html_entity_decode($this->numero2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero2 = strip_tags($this->numero2);
         $this->numero2 = NM_charset_to_utf8($this->numero2);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numero2;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- idcli
   function NM_sub_cons_idcli()
   {
         $this->look_idcli = html_entity_decode($this->look_idcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idcli = strip_tags($this->look_idcli);
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_idcli;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- direccion2
   function NM_sub_cons_direccion2()
   {
         $this->direccion2 = html_entity_decode($this->direccion2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion2 = strip_tags($this->direccion2);
         $this->direccion2 = NM_charset_to_utf8($this->direccion2);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->direccion2;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- total
   function NM_sub_cons_total()
   {
         $this->total = NM_charset_to_utf8($this->total);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->total;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- editarpos
   function NM_sub_cons_editarpos()
   {
         $this->editarpos = html_entity_decode($this->editarpos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->editarpos = strip_tags($this->editarpos);
         $this->editarpos = NM_charset_to_utf8($this->editarpos);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->editarpos;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- copiar
   function NM_sub_cons_copiar()
   {
         $this->copiar = NM_charset_to_utf8($this->copiar);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->copiar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- imprimircopia
   function NM_sub_cons_imprimircopia()
   {
         $this->imprimircopia = html_entity_decode($this->imprimircopia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimircopia = strip_tags($this->imprimircopia);
         $this->imprimircopia = NM_charset_to_utf8($this->imprimircopia);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->imprimircopia;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- a4
   function NM_sub_cons_a4()
   {
         $this->a4 = html_entity_decode($this->a4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->a4 = strip_tags($this->a4);
         $this->a4 = NM_charset_to_utf8($this->a4);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->a4;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- pdf
   function NM_sub_cons_pdf()
   {
         $this->pdf = html_entity_decode($this->pdf, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pdf = strip_tags($this->pdf);
         $this->pdf = NM_charset_to_utf8($this->pdf);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->pdf;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- detalle
   function NM_sub_cons_detalle()
   {
         $this->Rows_sub_detalle = array();
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?par_numfacventa?#?" . str_replace("'", "@aspass@", $this->Orig_idfacven) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida'] = true;
         if (method_exists($this->grid_facturaven_pos_detalle, "controle"))
         {
             $this->grid_facturaven_pos_detalle->controle();
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
             {
                 $this->Ini->conectDB();
                 $this->Db = $this->Ini->Db;
                 if ($this->Tot) {
                     $this->Tot->Db = $this->Db;
                 }
             }
             if (isset($_SESSION['scriptcase']['export_return']))
             {
                 $this->row_sub = 1;
             $this->Rows_sub_detalle = $_SESSION['scriptcase']['export_return'];
             return;
             }
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_detalle']['embutida'] = false;
         $this->Xls_col++;
   }
   //----- enviar_tech
   function NM_sub_cons_enviar_tech()
   {
         $this->enviar_tech = html_entity_decode($this->enviar_tech, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->enviar_tech = strip_tags($this->enviar_tech);
         $this->enviar_tech = NM_charset_to_utf8($this->enviar_tech);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->enviar_tech;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- enviar_propio
   function NM_sub_cons_enviar_propio()
   {
         $this->enviar_propio = html_entity_decode($this->enviar_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->enviar_propio = strip_tags($this->enviar_propio);
         $this->enviar_propio = NM_charset_to_utf8($this->enviar_propio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->enviar_propio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- reenviar
   function NM_sub_cons_reenviar()
   {
         $this->reenviar = NM_charset_to_utf8($this->reenviar);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->reenviar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- restaurante
   function NM_sub_cons_restaurante()
   {
         $this->restaurante = html_entity_decode($this->restaurante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->restaurante = strip_tags($this->restaurante);
         $this->restaurante = NM_charset_to_utf8($this->restaurante);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->restaurante;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- pedido
   function NM_sub_cons_pedido()
   {
         $this->look_pedido = NM_charset_to_utf8($this->look_pedido);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_pedido;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- whatsapp_propio
   function NM_sub_cons_whatsapp_propio()
   {
         $this->whatsapp_propio = NM_charset_to_utf8($this->whatsapp_propio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->whatsapp_propio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- ver_xml_propio
   function NM_sub_cons_ver_xml_propio()
   {
         $this->ver_xml_propio = html_entity_decode($this->ver_xml_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ver_xml_propio = strip_tags($this->ver_xml_propio);
         $this->ver_xml_propio = NM_charset_to_utf8($this->ver_xml_propio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->ver_xml_propio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- envio_dataico
   function NM_sub_cons_envio_dataico()
   {
         $this->envio_dataico = html_entity_decode($this->envio_dataico, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->envio_dataico = strip_tags($this->envio_dataico);
         $this->envio_dataico = NM_charset_to_utf8($this->envio_dataico);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->envio_dataico;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- regenerar_pdf_propio
   function NM_sub_cons_regenerar_pdf_propio()
   {
         $this->regenerar_pdf_propio = html_entity_decode($this->regenerar_pdf_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->regenerar_pdf_propio = strip_tags($this->regenerar_pdf_propio);
         $this->regenerar_pdf_propio = NM_charset_to_utf8($this->regenerar_pdf_propio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->regenerar_pdf_propio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- idfacven
   function NM_sub_cons_idfacven()
   {
         $this->idfacven = NM_charset_to_utf8($this->idfacven);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->idfacven;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- numfacven
   function NM_sub_cons_numfacven()
   {
         $this->numfacven = NM_charset_to_utf8($this->numfacven);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numfacven;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- fechavenc
   function NM_sub_cons_fechavenc()
   {
         $this->fechavenc = substr($this->fechavenc, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fechavenc;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- subtotal
   function NM_sub_cons_subtotal()
   {
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->subtotal;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- valoriva
   function NM_sub_cons_valoriva()
   {
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->valoriva;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- pagada
   function NM_sub_cons_pagada()
   {
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->pagada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- asentada
   function NM_sub_cons_asentada()
   {
         $this->look_asentada = NM_charset_to_utf8($this->look_asentada);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_asentada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- observaciones
   function NM_sub_cons_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->observaciones;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
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
   //----- adicional
   function NM_sub_cons_adicional()
   {
         $this->adicional = NM_charset_to_utf8($this->adicional);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->adicional;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- adicional2
   function NM_sub_cons_adicional2()
   {
         $this->adicional2 = NM_charset_to_utf8($this->adicional2);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->adicional2;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- adicional3
   function NM_sub_cons_adicional3()
   {
         $this->adicional3 = NM_charset_to_utf8($this->adicional3);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->adicional3;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
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
   //----- vendedor
   function NM_sub_cons_vendedor()
   {
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_vendedor;
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
             $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->creado = NM_charset_to_utf8($this->creado);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->creado;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- editado
   function NM_sub_cons_editado()
   {
         $this->editado = NM_charset_to_utf8($this->editado);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->editado;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- usuario_crea
   function NM_sub_cons_usuario_crea()
   {
         $this->usuario_crea = NM_charset_to_utf8($this->usuario_crea);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->usuario_crea;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- inicio
   function NM_sub_cons_inicio()
   {
      if (!empty($this->inicio))
      {
         if (substr($this->inicio, 10, 1) == "-") 
         { 
             $this->inicio = substr($this->inicio, 0, 10) . " " . substr($this->inicio, 11);
         } 
         if (substr($this->inicio, 13, 1) == ".") 
         { 
            $this->inicio = substr($this->inicio, 0, 13) . ":" . substr($this->inicio, 14, 2) . ":" . substr($this->inicio, 17);
         } 
         $conteudo_x =  $this->inicio;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->inicio, "YYYY-MM-DD HH:II:SS  ");
             $this->inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->inicio = NM_charset_to_utf8($this->inicio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->inicio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- fin
   function NM_sub_cons_fin()
   {
      if (!empty($this->fin))
      {
         if (substr($this->fin, 10, 1) == "-") 
         { 
             $this->fin = substr($this->fin, 0, 10) . " " . substr($this->fin, 11);
         } 
         if (substr($this->fin, 13, 1) == ".") 
         { 
            $this->fin = substr($this->fin, 0, 13) . ":" . substr($this->fin, 14, 2) . ":" . substr($this->fin, 17);
         } 
         $conteudo_x =  $this->fin;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fin, "YYYY-MM-DD HH:II:SS  ");
             $this->fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->fin = NM_charset_to_utf8($this->fin);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fin;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
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
   //----- dias_decredito
   function NM_sub_cons_dias_decredito()
   {
         $this->dias_decredito = NM_charset_to_utf8($this->dias_decredito);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->dias_decredito;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- cod_cuenta
   function NM_sub_cons_cod_cuenta()
   {
         $this->cod_cuenta = html_entity_decode($this->cod_cuenta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_cuenta = strip_tags($this->cod_cuenta);
         $this->cod_cuenta = NM_charset_to_utf8($this->cod_cuenta);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cod_cuenta;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- qr_base64
   function NM_sub_cons_qr_base64()
   {
         $this->qr_base64 = NM_charset_to_utf8($this->qr_base64);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->qr_base64;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- fecha_validacion
   function NM_sub_cons_fecha_validacion()
   {
      if (!empty($this->fecha_validacion))
      {
         if (substr($this->fecha_validacion, 10, 1) == "-") 
         { 
             $this->fecha_validacion = substr($this->fecha_validacion, 0, 10) . " " . substr($this->fecha_validacion, 11);
         } 
         if (substr($this->fecha_validacion, 13, 1) == ".") 
         { 
            $this->fecha_validacion = substr($this->fecha_validacion, 0, 13) . ":" . substr($this->fecha_validacion, 14, 2) . ":" . substr($this->fecha_validacion, 17);
         } 
         $conteudo_x =  $this->fecha_validacion;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha_validacion, "YYYY-MM-DD HH:II:SS  ");
             $this->fecha_validacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->fecha_validacion = NM_charset_to_utf8($this->fecha_validacion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fecha_validacion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- cufe
   function NM_sub_cons_cufe()
   {
         $this->cufe = html_entity_decode($this->cufe, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cufe = strip_tags($this->cufe);
         $this->cufe = NM_charset_to_utf8($this->cufe);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cufe;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- estado
   function NM_sub_cons_estado()
   {
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         $this->estado = NM_charset_to_utf8($this->estado);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->estado;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- existeentns
   function NM_sub_cons_existeentns()
   {
         $this->existeentns = html_entity_decode($this->existeentns, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->existeentns = strip_tags($this->existeentns);
         $this->existeentns = NM_charset_to_utf8($this->existeentns);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->existeentns;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- imprimir
   function NM_sub_cons_imprimir()
   {
         $this->imprimir = html_entity_decode($this->imprimir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimir = strip_tags($this->imprimir);
         $this->imprimir = NM_charset_to_utf8($this->imprimir);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->imprimir;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['nolabel'])
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
 function quebra_fechaven_fecha($fechaven) 
 {
   global $tot_fechaven;
   $TP_Time = (in_array('fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechaven = $this->Ini->Get_arg_groupby($TP_Time . $fechaven, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fechaven = true; 
   $this->Tot->quebra_fechaven_fecha($fechaven, $this->arg_sum_fechaven);
   $conteudo = $tot_fechaven[0] ;  
   $this->count_fechaven = $tot_fechaven[1];
   $this->sum_fechaven_total = $tot_fechaven[2];
   $this->sum_fechaven_subtotal = $tot_fechaven[3];
   $this->sum_fechaven_valoriva = $tot_fechaven[4];
   $this->sum_fechaven_adicional = $tot_fechaven[5];
   $this->campos_quebra_fechaven = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechaven)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechaven');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fechaven');
   $TP_Time    = (in_array('fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fechaven[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechaven']))
   {
       $this->campos_quebra_fechaven[0]['lab'] = $this->nmgp_label_quebras['fechaven']; 
   }
   else
   {
   $this->campos_quebra_fechaven[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_fechaven = false; 
 } 
 function quebra_credito_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_credito = true; 
   $this->Tot->quebra_credito_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_credito = $$Var_name_gb;
   $conteudo = $tot_credito[0] ;  
   $this->count_credito = $tot_credito[1];
   $this->sum_credito_total = $tot_credito[2];
   $this->sum_credito_subtotal = $tot_credito[3];
   $this->sum_credito_valoriva = $tot_credito[4];
   $this->sum_credito_adicional = $tot_credito[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->credito)); 
   $this->Lookup->lookup_sc_free_group_by_credito($conteudo) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['credito']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['credito']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "F.Pago"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_credito = false; 
 } 
 function quebra_fechaven_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_fechaven = true; 
   $this->Tot->quebra_fechaven_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_fechaven = $$Var_name_gb;
   $conteudo = $tot_fechaven[0] ;  
   $this->count_fechaven = $tot_fechaven[1];
   $this->sum_fechaven_total = $tot_fechaven[2];
   $this->sum_fechaven_subtotal = $tot_fechaven[3];
   $this->sum_fechaven_valoriva = $tot_fechaven[4];
   $this->sum_fechaven_adicional = $tot_fechaven[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechaven)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechaven']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['fechaven']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Fecha"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_fechaven = false; 
 } 
 function quebra_fechavenc_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_fechavenc = true; 
   $this->Tot->quebra_fechavenc_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_fechavenc = $$Var_name_gb;
   $conteudo = $tot_fechavenc[0] ;  
   $this->count_fechavenc = $tot_fechavenc[1];
   $this->sum_fechavenc_total = $tot_fechavenc[2];
   $this->sum_fechavenc_subtotal = $tot_fechavenc[3];
   $this->sum_fechavenc_valoriva = $tot_fechavenc[4];
   $this->sum_fechavenc_adicional = $tot_fechavenc[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechavenc)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechavenc']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['fechavenc']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Fechavenc"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_fechavenc = false; 
 } 
 function quebra_idcli_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_idcli = true; 
   $this->Tot->quebra_idcli_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_idcli = $$Var_name_gb;
   $conteudo = $tot_idcli[0] ;  
   $this->count_idcli = $tot_idcli[1];
   $this->sum_idcli_total = $tot_idcli[2];
   $this->sum_idcli_subtotal = $tot_idcli[3];
   $this->sum_idcli_valoriva = $tot_idcli[4];
   $this->sum_idcli_adicional = $tot_idcli[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->idcli); 
   $this->Lookup->lookup_sc_free_group_by_idcli($conteudo , $this->idcli) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idcli']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['idcli']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Cliente"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_idcli = false; 
 } 
 function quebra_pagada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_pagada = true; 
   $this->Tot->quebra_pagada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_pagada = $$Var_name_gb;
   $conteudo = $tot_pagada[0] ;  
   $this->count_pagada = $tot_pagada[1];
   $this->sum_pagada_total = $tot_pagada[2];
   $this->sum_pagada_subtotal = $tot_pagada[3];
   $this->sum_pagada_valoriva = $tot_pagada[4];
   $this->sum_pagada_adicional = $tot_pagada[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->pagada); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['pagada']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['pagada']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Pagada"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_pagada = false; 
 } 
 function quebra_asentada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_asentada = true; 
   $this->Tot->quebra_asentada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_asentada = $$Var_name_gb;
   $conteudo = $tot_asentada[0] ;  
   $this->count_asentada = $tot_asentada[1];
   $this->sum_asentada_total = $tot_asentada[2];
   $this->sum_asentada_subtotal = $tot_asentada[3];
   $this->sum_asentada_valoriva = $tot_asentada[4];
   $this->sum_asentada_adicional = $tot_asentada[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->asentada)); 
   $this->Lookup->lookup_sc_free_group_by_asentada($conteudo) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['asentada']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['asentada']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Asentada"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_asentada = false; 
 } 
 function quebra_resolucion_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_resolucion = true; 
   $this->Tot->quebra_resolucion_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_resolucion = $$Var_name_gb;
   $conteudo = $tot_resolucion[0] ;  
   $this->count_resolucion = $tot_resolucion[1];
   $this->sum_resolucion_total = $tot_resolucion[2];
   $this->sum_resolucion_subtotal = $tot_resolucion[3];
   $this->sum_resolucion_valoriva = $tot_resolucion[4];
   $this->sum_resolucion_adicional = $tot_resolucion[5];
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
       $Temp_cmp_quebra[0]['lab'] = "PJ"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_resolucion = false; 
 } 
 function quebra_vendedor_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_vendedor = true; 
   $this->Tot->quebra_vendedor_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_vendedor = $$Var_name_gb;
   $conteudo = $tot_vendedor[0] ;  
   $this->count_vendedor = $tot_vendedor[1];
   $this->sum_vendedor_total = $tot_vendedor[2];
   $this->sum_vendedor_subtotal = $tot_vendedor[3];
   $this->sum_vendedor_valoriva = $tot_vendedor[4];
   $this->sum_vendedor_adicional = $tot_vendedor[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->vendedor)); 
   $this->Lookup->lookup_sc_free_group_by_vendedor($conteudo , $this->vendedor) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['vendedor']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['vendedor']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = " Vendedor"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_vendedor = false; 
 } 
 function quebra_tipo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_credito = false;
   $this->sc_proc_quebra_fechaven = false;
   $this->sc_proc_quebra_fechavenc = false;
   $this->sc_proc_quebra_idcli = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->sc_proc_quebra_tipo = true; 
   $this->Tot->quebra_tipo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_tipo = $$Var_name_gb;
   $conteudo = $tot_tipo[0] ;  
   $this->count_tipo = $tot_tipo[1];
   $this->sum_tipo_total = $tot_tipo[2];
   $this->sum_tipo_subtotal = $tot_tipo[3];
   $this->sum_tipo_valoriva = $tot_tipo[4];
   $this->sum_tipo_adicional = $tot_tipo[5];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->tipo); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tipo']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['tipo']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Tipo"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_tipo = false; 
 } 
 function quebra_credito_formapago($credito) 
 {
   global $tot_credito;
   $this->sc_proc_quebra_credito = true; 
   $this->Tot->quebra_credito_formapago($credito, $this->arg_sum_credito);
   $conteudo = $tot_credito[0] ;  
   $this->count_credito = $tot_credito[1];
   $this->sum_credito_total = $tot_credito[2];
   $this->sum_credito_subtotal = $tot_credito[3];
   $this->sum_credito_valoriva = $tot_credito[4];
   $this->sum_credito_adicional = $tot_credito[5];
   $this->campos_quebra_credito = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->credito)); 
   $this->Lookup->lookup_formapago_credito($conteudo) ; 
   $this->campos_quebra_credito[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['credito']))
   {
       $this->campos_quebra_credito[0]['lab'] = $this->nmgp_label_quebras['credito']; 
   }
   else
   {
   $this->campos_quebra_credito[0]['lab'] = "F.Pago"; 
   }
   $this->sc_proc_quebra_credito = false; 
 } 
 function quebra_idcli_porcliente($idcli) 
 {
   global $tot_idcli;
   $this->sc_proc_quebra_idcli = true; 
   $this->Tot->quebra_idcli_porcliente($idcli, $this->arg_sum_idcli);
   $conteudo = $tot_idcli[0] ;  
   $this->count_idcli = $tot_idcli[1];
   $this->sum_idcli_total = $tot_idcli[2];
   $this->sum_idcli_subtotal = $tot_idcli[3];
   $this->sum_idcli_valoriva = $tot_idcli[4];
   $this->sum_idcli_adicional = $tot_idcli[5];
   $this->campos_quebra_idcli = array(); 
   $conteudo = sc_strip_script($this->idcli); 
   $this->Lookup->lookup_porcliente_idcli($conteudo , $this->idcli) ; 
   $this->campos_quebra_idcli[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idcli']))
   {
       $this->campos_quebra_idcli[0]['lab'] = $this->nmgp_label_quebras['idcli']; 
   }
   else
   {
   $this->campos_quebra_idcli[0]['lab'] = "Cliente"; 
   }
   $this->sc_proc_quebra_idcli = false; 
 } 
 function quebra_resolucion_porpj($resolucion) 
 {
   global $tot_resolucion;
   $this->sc_proc_quebra_resolucion = true; 
   $this->Tot->quebra_resolucion_porpj($resolucion, $this->arg_sum_resolucion);
   $conteudo = $tot_resolucion[0] ;  
   $this->count_resolucion = $tot_resolucion[1];
   $this->sum_resolucion_total = $tot_resolucion[2];
   $this->sum_resolucion_subtotal = $tot_resolucion[3];
   $this->sum_resolucion_valoriva = $tot_resolucion[4];
   $this->sum_resolucion_adicional = $tot_resolucion[5];
   $this->campos_quebra_resolucion = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->resolucion)); 
   $this->Lookup->lookup_porpj_resolucion($conteudo , $this->resolucion) ; 
   $this->campos_quebra_resolucion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['resolucion']))
   {
       $this->campos_quebra_resolucion[0]['lab'] = $this->nmgp_label_quebras['resolucion']; 
   }
   else
   {
   $this->campos_quebra_resolucion[0]['lab'] = "PJ"; 
   }
   $this->sc_proc_quebra_resolucion = false; 
 } 
 function quebra_tipo_portipo($tipo) 
 {
   global $tot_tipo;
   $this->sc_proc_quebra_tipo = true; 
   $this->Tot->quebra_tipo_portipo($tipo, $this->arg_sum_tipo);
   $conteudo = $tot_tipo[0] ;  
   $this->count_tipo = $tot_tipo[1];
   $this->sum_tipo_total = $tot_tipo[2];
   $this->sum_tipo_subtotal = $tot_tipo[3];
   $this->sum_tipo_valoriva = $tot_tipo[4];
   $this->sum_tipo_adicional = $tot_tipo[5];
   $this->campos_quebra_tipo = array(); 
   $conteudo = sc_strip_script($this->tipo); 
   $this->campos_quebra_tipo[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tipo']))
   {
       $this->campos_quebra_tipo[0]['lab'] = $this->nmgp_label_quebras['tipo']; 
   }
   else
   {
   $this->campos_quebra_tipo[0]['lab'] = "Tipo"; 
   }
   $this->sc_proc_quebra_tipo = false; 
 } 
 function quebra_vendedor_porvendedor($vendedor) 
 {
   global $tot_vendedor;
   $this->sc_proc_quebra_vendedor = true; 
   $this->Tot->quebra_vendedor_porvendedor($vendedor, $this->arg_sum_vendedor);
   $conteudo = $tot_vendedor[0] ;  
   $this->count_vendedor = $tot_vendedor[1];
   $this->sum_vendedor_total = $tot_vendedor[2];
   $this->sum_vendedor_subtotal = $tot_vendedor[3];
   $this->sum_vendedor_valoriva = $tot_vendedor[4];
   $this->sum_vendedor_adicional = $tot_vendedor[5];
   $this->campos_quebra_vendedor = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->vendedor)); 
   $this->Lookup->lookup_porvendedor_vendedor($conteudo , $this->vendedor) ; 
   $this->campos_quebra_vendedor[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['vendedor']))
   {
       $this->campos_quebra_vendedor[0]['lab'] = $this->nmgp_label_quebras['vendedor']; 
   }
   else
   {
   $this->campos_quebra_vendedor[0]['lab'] = " Vendedor"; 
   }
   $this->sc_proc_quebra_vendedor = false; 
 } 
 function quebra_asentada_porasentada($asentada) 
 {
   global $tot_asentada;
   $this->sc_proc_quebra_asentada = true; 
   $this->Tot->quebra_asentada_porasentada($asentada, $this->arg_sum_asentada);
   $conteudo = $tot_asentada[0] ;  
   $this->count_asentada = $tot_asentada[1];
   $this->sum_asentada_total = $tot_asentada[2];
   $this->sum_asentada_subtotal = $tot_asentada[3];
   $this->sum_asentada_valoriva = $tot_asentada[4];
   $this->sum_asentada_adicional = $tot_asentada[5];
   $this->campos_quebra_asentada = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->asentada)); 
   $this->Lookup->lookup_porasentada_asentada($conteudo) ; 
   $this->campos_quebra_asentada[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['asentada']))
   {
       $this->campos_quebra_asentada[0]['lab'] = $this->nmgp_label_quebras['asentada']; 
   }
   else
   {
   $this->campos_quebra_asentada[0]['lab'] = "Asentada"; 
   }
   $this->sc_proc_quebra_asentada = false; 
 } 
 function quebra_pagada_pagada($pagada) 
 {
   global $tot_pagada;
   $this->sc_proc_quebra_pagada = true; 
   $this->Tot->quebra_pagada_pagada($pagada, $this->arg_sum_pagada);
   $conteudo = $tot_pagada[0] ;  
   $this->count_pagada = $tot_pagada[1];
   $this->sum_pagada_total = $tot_pagada[2];
   $this->sum_pagada_subtotal = $tot_pagada[3];
   $this->sum_pagada_valoriva = $tot_pagada[4];
   $this->sum_pagada_adicional = $tot_pagada[5];
   $this->campos_quebra_pagada = array(); 
   $conteudo = sc_strip_script($this->pagada); 
   $this->campos_quebra_pagada[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['pagada']))
   {
       $this->campos_quebra_pagada[0]['lab'] = $this->nmgp_label_quebras['pagada']; 
   }
   else
   {
   $this->campos_quebra_pagada[0]['lab'] = "Pagada"; 
   }
   $this->sc_proc_quebra_pagada = false; 
 } 
 function quebra_banco_porbanco($banco) 
 {
   global $tot_banco;
   $this->sc_proc_quebra_banco = true; 
   $this->Tot->quebra_banco_porbanco($banco, $this->arg_sum_banco);
   $conteudo = $tot_banco[0] ;  
   $this->count_banco = $tot_banco[1];
   $this->sum_banco_total = $tot_banco[2];
   $this->sum_banco_subtotal = $tot_banco[3];
   $this->sum_banco_valoriva = $tot_banco[4];
   $this->sum_banco_adicional = $tot_banco[5];
   $this->campos_quebra_banco = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->banco)); 
   $this->Lookup->lookup_porbanco_banco($conteudo , $this->banco) ; 
   $this->campos_quebra_banco[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['banco']))
   {
       $this->campos_quebra_banco[0]['lab'] = $this->nmgp_label_quebras['banco']; 
   }
   else
   {
   $this->campos_quebra_banco[0]['lab'] = "Caja"; 
   }
   $this->sc_proc_quebra_banco = false; 
 } 
   function quebra_fechaven_fecha_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechaven as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_fechaven_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechaven_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_credito_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_credito as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_credito_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_credito_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_fechaven_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechaven as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_fechaven_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechaven_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechaven_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_fechavenc_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechavenc as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_fechavenc_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechavenc_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechavenc_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechavenc_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechavenc_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_idcli_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_idcli as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_idcli_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idcli_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_pagada_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_pagada as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_pagada_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_asentada_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_asentada as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_asentada_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_resolucion_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_vendedor_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_vendedor as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_vendedor_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_vendedor_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_tipo_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_tipo as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_tipo_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_tipo_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_credito_formapago_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_credito as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_credito_formapago_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_credito_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_credito_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_idcli_porcliente_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_idcli as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_idcli_porcliente_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idcli_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idcli_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_resolucion_porpj_top()
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_resolucion_porpj_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_resolucion_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_tipo_portipo_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_tipo as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_tipo_portipo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_tipo_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_tipo_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_vendedor_porvendedor_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_vendedor as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_vendedor_porvendedor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_vendedor_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_vendedor_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_asentada_porasentada_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_asentada as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_asentada_porasentada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_pagada_pagada_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_pagada as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_pagada_pagada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_banco_porbanco_top()
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
   function quebra_banco_porbanco_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_banco_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_banco_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_banco_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_banco_adicional;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
       $this->Tot->quebra_geral_fecha();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_formapago_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_formapago();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_porcliente_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_porcliente();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_porpj_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_porpj();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_portipo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_portipo();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_porvendedor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_porvendedor();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_porasentada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_porasentada();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_pagada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_pagada();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_porbanco_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_porbanco();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][0];
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "subtotal" && (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "valoriva" && (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
           elseif ($Cada_cmp == "adicional" && (!isset($this->NM_cmp_hidden['adicional']) || $this->NM_cmp_hidden['adicional'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['embutida']) {
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Venta Rápida :: Excel</TITLE>
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
<form name="Fdown" method="get" action="grid_facturaven_pos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_facturaven_pos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos']['xls_return']); ?>"> 
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
function fActualizarTotalFactura($idfac)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fAlinearTexto($texto, $titulo, $retorno, $distancia, $alineacion='izquierda')
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
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


$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
if(!empty($iddet))
{	
	$idgrupo = "";
	$vsicb   = "";
	$vsqldetalle = "select 
					v.cantidad,
					v.idpro,
					v.costop,
					v.valorpar,
					v.idbod,
					v.numfac,
					v.unidadmayor,
					v.factor,
					v.vencimiento,
					v.lote,
					v.serial_codbarra,
					(select f.fechaven from facturaven f where f.idfacven=v.numfac) as fechaven,
					p.idgrup,
					p.escombo
					from 
					detalleventa v
					inner join productos p on v.idpro=p.idprod 
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
		$vunidadmayor = $this->vdatosdetalle[0][6];
		$vfactor   = $this->vdatosdetalle[0][7];
		$vvence    = $this->vdatosdetalle[0][8];
		$vlote     = $this->vdatosdetalle[0][9];
		$vserial   = $this->vdatosdetalle[0][10];
		$vfecha    = $this->vdatosdetalle[0][11];
		$idgrupo   = $this->vdatosdetalle[0][12];
		$vsicb     = $this->vdatosdetalle[0][13];
		
		if($vvence>0)
			{
				$vvence = " ,fechavenc='".$vvence."' ";
			}
			else
			{
				$vvence = " ,fechavenc=null ";
			}
			
			if(!empty($vlote))
			{
				$vlote = " ,lote2='".$vlote."' ";
			}
			else
			{
				$vlote = " ,lote2=null ";
			}
			
			if(!empty($vserial))
			{
				$vserial = " ,codigobar='".$vserial."' ";
			}
			else
			{
				$vserial = " ,codigobar=null ";
		}
		
		if($vunidadmayor!="SI" and $vfactor > 0)
		{
			$vcantidad = $vcantidad/$vfactor;
		}
	}
	
	
	if($tipo==2)
	{
		if($idgrupo != 1)
		{
			if($vsicb=="SI")
			{
				$vsqlinv = "INSERT 
					  inventario 
					  SET 
					  fecha		   ='".$vfecha."', 
					  cantidad	   =(".$vcantidad."*-1), 
					  idpro		   ='".$vidpro."', 
					  costo		   ='0',
					  valorparcial ='0', 
					  idbod        ='".$vidbod."', 
					  tipo		   ='".$vtipo."', 
					  detalle	   ='".$vdetalle."', 
					  idmov		   ='".$vidmov."',
					  nufacvta	   ='".$vnumfac."', 
					  valorpar_combo='".$vvalorpar."',
					  iddetalle	   ='".$iddet."'
					  ".$vvence."
					  ".$vlote."
					  ".$vserial."
					  ";
			}
			else
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
					  valorpar_combo='0',
					  iddetalle	   ='".$iddet."'
					  ".$vvence."
					  ".$vlote."
					  ".$vserial."
					  ";
			}

			if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

			
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
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


			$vsqlstock="UPDATE 
				   productos 
				   SET 
				   stockmen = stockmen-$vcantidad
				   WHERE 
				   idprod='".$vidpro."'
				   ";

			if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

			
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
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		}

		 
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
				 
      $nm_select = "select idproducto,cantidad,precio,(select p.idgrup from productos p where p.idprod=dc.idproducto limit 1) as idgrup from detallecombos dc where idcombo='".$vidpro."'"; 
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
						if($this->vitemscombo[$i][3]!= 1)
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
								  costo		   =($vprecio2/$vcantidad2),
								  valorparcial =($vprecio2*$vcantidad), 
								  idbod        ='".$vidbod."', 
								  tipo		   ='".$vtipo."', 
								  detalle	   ='".$vdetalle."', 
								  idmov		   ='".$vidmov."',
								  nufacvta	   ='".$vnumfac."', 
								  iddetalle	   ='".$iddet."',
								  idcombo      ='".$vidpro."'
								  ";

							if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

							
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
							if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


							$vsqlstock2="UPDATE 
								   productos 
								   SET 
								   stockmen = stockmen-($vcantidad2*$vcantidad)
								   WHERE 
								   idprod='".$vidpro2."'
								   ";

							if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

							
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
							if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


						}
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
				 
      $nm_select = "select idproducto,cantidad,precio,(select p.idgrup from productos p where p.idprod=dc.idproducto limit 1) as idgrup from detallecombos dc where idcombo='".$vidpro."'"; 
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
						if($this->vitemscombo[$i][3]!= 1)
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

							if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

							
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
							if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


							$vsqlstock2="UPDATE 
								   productos 
								   SET 
								   stockmen = stockmen+($vcantidad*$vcantidad2) 
								   WHERE 
								   idprod='".$vidpro2."'
								   ";

							if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

							
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
							if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

						}
					}
				}
			}
		}

		
		if($idgrupo != 1)
		{
			$vsqlinv="delete 
					  from 
					  inventario 
					  where 
						  idpro='".$vidpro."' 
					  and nufacvta='".$vnumfac."' 
					  and detalle like '%Venta%' 
					  and iddetalle='".$iddet."'
					  ";

			if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

			
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
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


			$vsqlstock="UPDATE 
				   productos 
				   SET 
				   stockmen = stockmen+$vcantidad 
				   WHERE 
				   idprod='".$vidpro."'
				   ";

			if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

			
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
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		}
	}
}
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fPagarFacVen($idfactura,$formapago=1,$retorno=true,$vidrecibo=0,$sipropina="NO")
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
	$this->estado     = 1;
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
				
					$this->estado = 2; 
						
				break;

				case 1:
				
					$this->estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarFacVen",
				"estado"=>$this->estado,
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fAsentar($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$this->estado     = 1;
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

						$this->estado = 2;
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
					$this->estado = 2;
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

				$this->estado = 2;
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

				$this->estado = 2;
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
				"estado"=>$this->estado,
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
				"estado"=>$this->estado,
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fAsentarContratos($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$this->estado     = 1;
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

						$this->estado = 2;
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
					$this->estado = 2;
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

				$this->estado = 2;
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

				$this->estado = 2;
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
				"estado"=>$this->estado,
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
				"estado"=>$this->estado,
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fPagarPedido($id,$formapago=1,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
	$this->estado     = 1;
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
				
					$this->estado = 2; 
						
				break;

				case 1:
				
					$this->estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarPedido",
				"estado"=>$this->estado,
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fAsentarPedido($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
	
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$this->estado     = 1;
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

			$this->estado = 2;

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

			$this->estado = 2;
		}
	}
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$this->estado,
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
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
function fEnviarDataico($vparametros, $vcliente, $vencabezado, $vdetalle,$vretenciones)
								{
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'on';
  
									$documento = array();
									$items = array();
									$numbering = array();
									$notes = array();
									$retentions = array();

									$documento['actions']['send_dian']  = $vparametros["send_dian"];
									$documento['actions']['send_email'] = $vparametros["send_email"];
									$documento['invoice']['invoice_type_code'] = $vparametros["invoice_type_code"];

									if($vparametros["modo"] == 1)
									{	
									  $documento['invoice']['env'] = 'PRUEBAS';
									}
									else
									{
									  $documento['invoice']['env'] = 'PRODUCCION';
									}	

									$documento['invoice']['dataico_account_id'] = $vparametros["dataico_account_id"];



									$documento['invoice']['issue_date']   = $vencabezado["fecha"];   
									$documento['invoice']['payment_date'] = $vencabezado["fecha_pago"];   
									$documento['invoice']['number']       = $vencabezado["numero"];  

									$documento['invoice']['payment_means_type'] = $vencabezado["forma_pago"];

									$documento['invoice']['payment_means'] = $vencabezado["medio_pago"];

									if(!empty($vencabezado["observacion"]))
									{
										$documento['invoice']['notes'] = array($vencabezado["observacion"]);
									}

									$numbering['resolution_number'] = $vencabezado["resolucion"];  
									$numbering['prefix'] = $vencabezado["prefijo"];	
									$numbering['flexible'] = true;

									for($i=0;$i<count($vdetalle);$i++)
									{
										if(isset($vdetalle[$i]["tax_amount"]))
										{
											$impuestos = array( 
												"tax_amount" =>  $vdetalle[$i]["tax_amount"],
												"tax_category" =>  $vdetalle[$i]["tax_category"],
											);
										}
										else
										{
											$impuestos = array( 
												"tax_rate" =>  $vdetalle[$i]["tax_rate"],
												"tax_category" =>  $vdetalle[$i]["tax_category"],
											);
										}
										
										if(isset($vdetalle[$i]["mandante_identification"]))
										{
											$item = array(
												'sku' =>  $vdetalle[$i]["codigo"],
												'quantity' => $vdetalle[$i]["cantidad"] ,
												'description' => $vdetalle[$i]["descripcion"],
												'price' => $vdetalle[$i]["precio"],
												'original_price' => $vdetalle[$i]["precio"],
												'mandante_identification' => $vdetalle[$i]["mandante_identification"],
												'mandante_identification_type' => $vdetalle[$i]["mandante_identification_type"],
 												'taxes' => array($impuestos)
												);
										}
										else
										{
											$item = array(
												'sku' =>  $vdetalle[$i]["codigo"],
												'quantity' => $vdetalle[$i]["cantidad"] ,
												'description' => $vdetalle[$i]["descripcion"],
												'price' => $vdetalle[$i]["precio"],
												'original_price' => $vdetalle[$i]["precio"],
												'taxes' => array($impuestos)
												);
										}
										
										$items[$i] = $item;
									}

									if(count($vretenciones)>0)
									{
										$documento['invoice']['retentions'] = $vretenciones; 
									}

									$documento['invoice']['numbering'] = $numbering;
									$documento['invoice']['customer']  = $vcliente;
									$documento['invoice']['items']     = $items;
									

									$documento = json_encode($documento, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
									
									$vnomarchivo = "dataico_factura.json";
									$varchivo = fopen($vnomarchivo,"w+");
									fwrite($varchivo,$documento);

									$vcufe = "";
									$venlace_pdf = "";
									$venlace_xml = "";
									$vqr_code = "";
									$vfechavalidacion = date("Y-m-d H:i:s");
									$vuuid = "";
									
									$opciones = array(
									  'http'=>array(
										'method'=>"GET",
										'header'=>"auth-token:".$vparametros["dataico_auth"]
									  )
									);

									$contexto = stream_context_create($opciones);
									$vurl_consulta = $vparametros["url"];
									$vurl_consulta .= "?number=".$vencabezado["prefijo"].$vencabezado["numero"];
									

									
									$vvalidacion = false;
									$vretorno    = "";
									$headers = array('auth-token:'.$vparametros["dataico_auth"],'Content-Type: application/json');

									$ch = curl_init($vurl_consulta);
									curl_setopt($ch, CURLOPT_POST, false);
									curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									$json = curl_exec($ch);
									if($json === false)
									{
										   echo 'Hubo un error al enviar la petición, inténtelo nuevamente.<br>' . curl_error($ch);
									}
									else
									{
										$vretorno = json_decode($json);
										if(isset($vretorno->errors))
										{
											$vvalidacion = true;
										}
									}
									curl_close($ch);
									
									$vnomarchivo2 = "dataico_respuesta.json";
									$varchivo2 = fopen($vnomarchivo2,"w+");
									fwrite($varchivo2,$json);
									
									if(isset($vretorno->invoice->dian_status))
									{

										if($vretorno->invoice->dian_status=="DIAN_ACEPTADO")
										{

										}

										if($vretorno->invoice->dian_status=="DIAN_NO_ENVIADO")
										{

										}

										if(isset($vretorno->invoice->cufe))
										{
											if(!empty($vretorno->invoice->cufe))
											{
												$vcufe   = $vretorno->invoice->cufe;
											}
										}

										if(isset($vretorno->invoice->pdf_url))
										{
											if(!empty($vretorno->invoice->pdf_url))
											{
												$venlace_pdf = stripslashes($vretorno->invoice->pdf_url);
											}
										}

										if(isset($vretorno->invoice->xml_url))
										{
											if(!empty($vretorno->invoice->xml_url))
											{
												$venlace_xml = stripslashes($vretorno->invoice->xml_url);
											}
										}

										if(isset($vretorno->invoice->qrcode))
										{
											if(!empty($vretorno->invoice->qrcode))
											{
												$vqr_code = "data:image/png;base64,".base64_encode($vretorno->invoice->qrcode);
											}
										}

										if(isset($vretorno->invoice->issue_date))
										{
											if(!empty($vretorno->invoice->issue_date))
											{
												$vfechavalidacion  = $vencabezado["fecha_pago"];
											}
										}

										if(isset($vretorno->invoice->uuid))
										{
											if(!empty($vretorno->invoice->uuid))
											{
												$vuuid = $vretorno->invoice->uuid;
											}
										}
									}
									else
									{

										$parms = array('data'  => $documento);
										$parms = http_build_query($parms);

										$response = sc_webservice("curl", $vparametros["url"] , 80, "POST", $documento, array(CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER=>false, CURLOPT_HTTPHEADER => array(
												'Content-Type: application/json', 'auth-token: ' . $vparametros["dataico_auth"]  ),), 30);

										$vrespuesta = json_decode($response);

										if(isset($vrespuesta->uuid))
										{
											if(!empty($vrespuesta->uuid))
											{
												$vuuid = $vrespuesta->uuid;
											}
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

										}
										else
										{

											if(isset($vrespuesta->errors) or isset($vrespuesta->error))
											{
												print_r($vrespuesta);
											}
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
								
$_SESSION['scriptcase']['grid_facturaven_pos']['contr_erro'] = 'off';
}
}

?>
