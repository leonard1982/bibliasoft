<?php

class grid_compras_new_040422_xls
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
   var $sum_a_pagar;
   var $sum_val_ica;
   var $sum_val_ret;
   var $sum_val_retiva;
   var $idprov_Old;
   var $arg_sum_idprov;
   var $Label_idprov;
   var $sc_proc_quebra_idprov;
   var $count_idprov;
   var $sum_idprov_total;
   var $sum_idprov_subtotal;
   var $sum_idprov_valoriva;
   var $sum_idprov_a_pagar;
   var $sum_idprov_val_ica;
   var $sum_idprov_val_ret;
   var $sum_idprov_val_retiva;
   var $total_Old;
   var $arg_sum_total;
   var $Label_total;
   var $sc_proc_quebra_total;
   var $count_total;
   var $sum_total_total;
   var $sum_total_subtotal;
   var $sum_total_valoriva;
   var $sum_total_a_pagar;
   var $sum_total_val_ica;
   var $sum_total_val_ret;
   var $sum_total_val_retiva;
   var $fechacom_Old;
   var $arg_sum_fechacom;
   var $Label_fechacom;
   var $sc_proc_quebra_fechacom;
   var $count_fechacom;
   var $sum_fechacom_total;
   var $sum_fechacom_subtotal;
   var $sum_fechacom_valoriva;
   var $sum_fechacom_a_pagar;
   var $sum_fechacom_val_ica;
   var $sum_fechacom_val_ret;
   var $sum_fechacom_val_retiva;
   var $pagada_Old;
   var $arg_sum_pagada;
   var $Label_pagada;
   var $sc_proc_quebra_pagada;
   var $count_pagada;
   var $sum_pagada_total;
   var $sum_pagada_subtotal;
   var $sum_pagada_valoriva;
   var $sum_pagada_a_pagar;
   var $sum_pagada_val_ica;
   var $sum_pagada_val_ret;
   var $sum_pagada_val_retiva;
   var $asentada_Old;
   var $arg_sum_asentada;
   var $Label_asentada;
   var $sc_proc_quebra_asentada;
   var $count_asentada;
   var $sum_asentada_total;
   var $sum_asentada_subtotal;
   var $sum_asentada_valoriva;
   var $sum_asentada_a_pagar;
   var $sum_asentada_val_ica;
   var $sum_asentada_val_ret;
   var $sum_asentada_val_retiva;
   var $tipo_com_Old;
   var $arg_sum_tipo_com;
   var $Label_tipo_com;
   var $sc_proc_quebra_tipo_com;
   var $count_tipo_com;
   var $sum_tipo_com_total;
   var $sum_tipo_com_subtotal;
   var $sum_tipo_com_valoriva;
   var $sum_tipo_com_a_pagar;
   var $sum_tipo_com_val_ica;
   var $sum_tipo_com_val_ret;
   var $sum_tipo_com_val_retiva;
   var $prefijo_com_Old;
   var $arg_sum_prefijo_com;
   var $Label_prefijo_com;
   var $sc_proc_quebra_prefijo_com;
   var $count_prefijo_com;
   var $sum_prefijo_com_total;
   var $sum_prefijo_com_subtotal;
   var $sum_prefijo_com_valoriva;
   var $sum_prefijo_com_a_pagar;
   var $sum_prefijo_com_val_ica;
   var $sum_prefijo_com_val_ret;
   var $sum_prefijo_com_val_retiva;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['opcao'] = "";
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
                   nm_limpa_str_grid_compras_new_040422($cadapar[1]);
                   nm_protect_num_grid_compras_new_040422($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_compras_new_040422']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $this->New_Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
      $this->Xls_tp = ".xls";
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_compras_new_040422/grid_compras_new_040422_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_compras_new_040422_res_xls.class.php");
              $this->Res_xls = new grid_compras_new_040422_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_compras_new_040422.zip";
          $this->Arquivo   .= "_grid_compras_new_040422" . $this->Xls_tp;
          $this->Tit_doc    = "grid_compras_new_040422" . $this->Xls_tp;
          $this->Tit_zip    = "grid_compras_new_040422.zip";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "proveedor")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "total")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "pagada")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "asentada")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_compras_new_040422_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('proveedor','total','fecha','pagada','asentada','_NM_SC_');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "grid_compras_new_040422_total.class.php"); 
          $this->Tot = new grid_compras_new_040422_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "proveedor")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "total")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "pagada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "asentada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_compras_new_040422']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_return']);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "proveedor")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "total")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "pagada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "asentada")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
          $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
          $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
          $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
          $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
          $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
          $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040422']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040422']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040422']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechacom = $Busca_temp['fechacom']; 
          $tmp_pos = strpos($this->fechacom, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechacom))
          {
              $this->fechacom = substr($this->fechacom, 0, $tmp_pos);
          }
          $this->fechacom_2 = $Busca_temp['fechacom_input_2']; 
          $this->numfacom = $Busca_temp['numfacom']; 
          $tmp_pos = strpos($this->numfacom, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacom))
          {
              $this->numfacom = substr($this->numfacom, 0, $tmp_pos);
          }
          $this->idprov = $Busca_temp['idprov']; 
          $tmp_pos = strpos($this->idprov, "##@@");
          if ($tmp_pos !== false && !is_array($this->idprov))
          {
              $this->idprov = substr($this->idprov, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->NM_cmp_hidden['detalle'] = "off";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida_label'])
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
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'];
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
      $this->New_Xls_row = $this->Xls_row;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         if ($this->New_Xls_row > $this->Xls_row) {
             $this->Xls_row = $this->New_Xls_row;
         }
         $this->Xls_row++;
         $this->tipo_com = $rs->fields[0] ;  
         $this->prefijo_com = $rs->fields[1] ;  
         $this->numero_com = $rs->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;
         $this->numfacom = $rs->fields[3] ;  
         $this->formapago = $rs->fields[4] ;  
         $this->fechacom = $rs->fields[5] ;  
         $this->fechavenc = $rs->fields[6] ;  
         $this->pagada = $rs->fields[7] ;  
         $this->idprov = $rs->fields[8] ;  
         $this->idprov = (string)$this->idprov;
         $this->total = $rs->fields[9] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->asentada = $rs->fields[10] ;  
         $this->asentada = (string)$this->asentada;
         $this->idfaccom = $rs->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;
         $this->subtotal = $rs->fields[12] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[13] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
         $this->observaciones = $rs->fields[14] ;  
         $this->saldo = $rs->fields[15] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->id_pedidocom = $rs->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;
         $this->retencion = $rs->fields[17] ;  
         $this->retencion = (string)$this->retencion;
         $this->reteica = $rs->fields[18] ;  
         $this->reteica = (string)$this->reteica;
         $this->reteiva = $rs->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;
         $this->cod_cuenta = $rs->fields[20] ;  
         $this->Orig_tipo_com = $this->tipo_com;
         $this->Orig_prefijo_com = $this->prefijo_com;
         $this->Orig_numero_com = $this->numero_com;
         $this->Orig_numfacom = $this->numfacom;
         $this->Orig_formapago = $this->formapago;
         $this->Orig_fechacom = $this->fechacom;
         $this->Orig_fechavenc = $this->fechavenc;
         $this->Orig_pagada = $this->pagada;
         $this->Orig_idprov = $this->idprov;
         $this->Orig_total = $this->total;
         $this->Orig_asentada = $this->asentada;
         $this->Orig_idfaccom = $this->idfaccom;
         $this->Orig_subtotal = $this->subtotal;
         $this->Orig_valoriva = $this->valoriva;
         $this->Orig_observaciones = $this->observaciones;
         $this->Orig_saldo = $this->saldo;
         $this->Orig_id_pedidocom = $this->id_pedidocom;
         $this->Orig_retencion = $this->retencion;
         $this->Orig_reteica = $this->reteica;
         $this->Orig_reteiva = $this->reteiva;
         $this->Orig_cod_cuenta = $this->cod_cuenta;
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
             $TP_Time     = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_fechacom = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechacom, $Format_tst, "fechacom");
             if (empty($this->fechacom))
             {
                 $this->Tot->Sc_groupby_fechacom = "fechacom";
             }
             else
             {
                 $this->Tot->Sc_groupby_fechacom = $this->Ini->Get_sql_date_groupby("fechacom", $Format_tst);
             }
         }
         if ($this->fechacom == "")
         {
             $this->arg_sum_fechacom = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "_NM_SC_")
         {
             $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         }
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = ($this->idprov == "") ? " is null " : " = " . $this->idprov;
         $this->arg_sum_total = ($this->total == "") ? " is null " : " = " . $this->total;
         $this->arg_sum_asentada = ($this->asentada == "") ? " is null " : " = " . $this->asentada;
          if ($this->idprov !== $this->idprov_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "proveedor") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->idprov_Old = $this->idprov ; 
              $this->quebra_idprov_proveedor($this->idprov) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->total !== $this->total_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "total") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->total_Old = $this->total ; 
              $this->quebra_total_total($this->total) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
          $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fechacom, $Format_tst);
          if ($Cmp_tst != $this->fechacom_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
              $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fechacom_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechacom, $Format_tst);
              $this->quebra_fechacom_fecha($this->fechacom) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->pagada !== $this->pagada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "pagada") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
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
              $nm_houve_quebra = "S";
          } 
          if ($this->asentada !== $this->asentada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "asentada") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->asentada_Old = $this->asentada ; 
              $this->quebra_asentada_asentada($this->asentada) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
          if (($this->tipo_com !== $this->tipo_com_Old || $NM_prim_qb) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "tipo_com") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->tipo_com_Old = $this->tipo_com ; 
              $this->quebra_tipo_com_tipo_com($this->tipo_com) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
          if (($this->prefijo_com !== $this->prefijo_com_Old || $NM_prim_qb) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "prefijo_com") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->prefijo_com_Old = $this->prefijo_com ; 
              $this->quebra_prefijo_com_prefijo_com($this->prefijo_com) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
         //----- lookup - idprov
         $this->look_idprov = $this->idprov; 
         $this->Lookup->lookup_idprov($this->look_idprov) ; 
         $this->look_idprov = ($this->look_idprov == "&nbsp;") ? "" : $this->look_idprov; 
         //----- lookup - asentada
         $this->look_asentada = $this->asentada; 
         $this->Lookup->lookup_asentada($this->look_asentada); 
         $this->look_asentada = ($this->look_asentada == "&nbsp;") ? "" : $this->look_asentada; 
         //----- lookup - id_pedidocom
         $this->look_id_pedidocom = $this->id_pedidocom; 
         $this->Lookup->lookup_id_pedidocom($this->look_id_pedidocom) ; 
         $this->look_id_pedidocom = ($this->look_id_pedidocom == "&nbsp;") ? "" : $this->look_id_pedidocom; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tipo_com'])) ? $this->New_label['tipo_com'] : "Tipo"; 
          if ($Cada_col == "tipo_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['prefijo_com'])) ? $this->New_label['prefijo_com'] : "Prefijo"; 
          if ($Cada_col == "prefijo_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['numero_com'])) ? $this->New_label['numero_com'] : "Consecutivo"; 
          if ($Cada_col == "numero_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['numfacom'])) ? $this->New_label['numfacom'] : "Ref. Compra"; 
          if ($Cada_col == "numfacom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['formapago'])) ? $this->New_label['formapago'] : "F.Pago"; 
          if ($Cada_col == "formapago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['fechacom'])) ? $this->New_label['fechacom'] : "Fecha"; 
          if ($Cada_col == "fechacom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['pagos'])) ? $this->New_label['pagos'] : "Abonos"; 
          if ($Cada_col == "pagos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['idprov'])) ? $this->New_label['idprov'] : "Proveedor"; 
          if ($Cada_col == "idprov" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "detalle"; 
          if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
          {
              $this->arr_span['detalle'] = $this->count_span;
              $this->Emb_label_cols_detalle = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida_label'] = true;
              $GLOBALS["script_case_init"] = $this->Ini->sc_page;
              $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?";
              if (method_exists($this->grid_detallecompra_new, "controle"))
              {
                  $this->grid_detallecompra_new->controle();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida'] = false;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida_label'] = false;
          }
          $SC_Label = (isset($this->New_label['idfaccom'])) ? $this->New_label['idfaccom'] : "#"; 
          if ($Cada_col == "idfaccom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['id_pedidocom'])) ? $this->New_label['id_pedidocom'] : "Pedido"; 
          if ($Cada_col == "id_pedidocom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['retencion'])) ? $this->New_label['retencion'] : "Retención %"; 
          if ($Cada_col == "retencion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['reteica'])) ? $this->New_label['reteica'] : "Reteica"; 
          if ($Cada_col == "reteica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['reteiva'])) ? $this->New_label['reteiva'] : "Reteiva"; 
          if ($Cada_col == "reteiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['a_pagar'])) ? $this->New_label['a_pagar'] : "Val a Pagar"; 
          if ($Cada_col == "a_pagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['base0'])) ? $this->New_label['base0'] : "Base 0%"; 
          if ($Cada_col == "base0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['base19'])) ? $this->New_label['base19'] : "Base 19%"; 
          if ($Cada_col == "base19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['base5'])) ? $this->New_label['base5'] : "Base 5%"; 
          if ($Cada_col == "base5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['devolucion'])) ? $this->New_label['devolucion'] : "Devolución"; 
          if ($Cada_col == "devolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['iva_0'])) ? $this->New_label['iva_0'] : "IVA 0%"; 
          if ($Cada_col == "iva_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['iva_19'])) ? $this->New_label['iva_19'] : "IVA 19%"; 
          if ($Cada_col == "iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['iva_5'])) ? $this->New_label['iva_5'] : "IVA 5%"; 
          if ($Cada_col == "iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['val_ica'])) ? $this->New_label['val_ica'] : "$ ReteICA"; 
          if ($Cada_col == "val_ica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['val_ret'])) ? $this->New_label['val_ret'] : "$ Retención"; 
          if ($Cada_col == "val_ret" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
          $SC_Label = (isset($this->New_label['val_retiva'])) ? $this->New_label['val_retiva'] : "$ ReteIVA"; 
          if ($Cada_col == "val_retiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida'])
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
   //----- tipo_com
   function NM_export_tipo_com()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->tipo_com = html_entity_decode($this->tipo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_com = strip_tags($this->tipo_com);
         $this->tipo_com = NM_charset_to_utf8($this->tipo_com);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo_com, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo_com, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- prefijo_com
   function NM_export_prefijo_com()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->prefijo_com = html_entity_decode($this->prefijo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo_com = strip_tags($this->prefijo_com);
         $this->prefijo_com = NM_charset_to_utf8($this->prefijo_com);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->prefijo_com, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->prefijo_com, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- numero_com
   function NM_export_numero_com()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numero_com = NM_charset_to_utf8($this->numero_com);
         if (is_numeric($this->numero_com))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->numero_com);
         $this->Xls_col++;
   }
   //----- numfacom
   function NM_export_numfacom()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numfacom = html_entity_decode($this->numfacom, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numfacom = strip_tags($this->numfacom);
         $this->numfacom = NM_charset_to_utf8($this->numfacom);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numfacom, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numfacom, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- formapago
   function NM_export_formapago()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->formapago = html_entity_decode($this->formapago, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->formapago = strip_tags($this->formapago);
         $this->formapago = NM_charset_to_utf8($this->formapago);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->formapago, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->formapago, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fechacom
   function NM_export_fechacom()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fechacom = substr($this->fechacom, 0, 10);
         if (empty($this->fechacom) || $this->fechacom == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechacom, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fechacom, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->fechacom);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
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
   //----- pagada
   function NM_export_pagada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
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
   //----- pagos
   function NM_export_pagos()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->pagos = NM_charset_to_utf8($this->pagos);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pagos, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->pagos, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- idprov
   function NM_export_idprov()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_idprov = html_entity_decode($this->look_idprov, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idprov = strip_tags($this->look_idprov);
         $this->look_idprov = NM_charset_to_utf8($this->look_idprov);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_idprov, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_idprov, PHPExcel_Cell_DataType::TYPE_STRING);
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
   //----- asentada
   function NM_export_asentada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
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
   //----- idfaccom
   function NM_export_idfaccom()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->idfaccom = NM_charset_to_utf8($this->idfaccom);
         if (is_numeric($this->idfaccom))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->idfaccom);
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->valoriva);
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->saldo);
         $this->Xls_col++;
   }
   //----- id_pedidocom
   function NM_export_id_pedidocom()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_id_pedidocom = NM_charset_to_utf8($this->look_id_pedidocom);
         if (is_numeric($this->look_id_pedidocom))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_id_pedidocom);
         $this->Xls_col++;
   }
   //----- retencion
   function NM_export_retencion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->retencion = NM_charset_to_utf8($this->retencion);
         if (is_numeric($this->retencion))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->retencion);
         $this->Xls_col++;
   }
   //----- reteica
   function NM_export_reteica()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->reteica = NM_charset_to_utf8($this->reteica);
         if (is_numeric($this->reteica))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.000';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->reteica);
         $this->Xls_col++;
   }
   //----- reteiva
   function NM_export_reteiva()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->reteiva = NM_charset_to_utf8($this->reteiva);
         if (is_numeric($this->reteiva))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.000';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->reteiva);
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
   //----- a_pagar
   function NM_export_a_pagar()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->a_pagar = NM_charset_to_utf8($this->a_pagar);
         if (is_numeric($this->a_pagar))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->a_pagar);
         $this->Xls_col++;
   }
   //----- base0
   function NM_export_base0()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->base0 = NM_charset_to_utf8($this->base0);
         if (is_numeric($this->base0))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->base0);
         $this->Xls_col++;
   }
   //----- base19
   function NM_export_base19()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->base19 = NM_charset_to_utf8($this->base19);
         if (is_numeric($this->base19))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->base19);
         $this->Xls_col++;
   }
   //----- base5
   function NM_export_base5()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->base5 = NM_charset_to_utf8($this->base5);
         if (is_numeric($this->base5))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->base5);
         $this->Xls_col++;
   }
   //----- devolucion
   function NM_export_devolucion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->devolucion = NM_charset_to_utf8($this->devolucion);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->devolucion, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->devolucion, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- iva_0
   function NM_export_iva_0()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->iva_0 = NM_charset_to_utf8($this->iva_0);
         if (is_numeric($this->iva_0))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->iva_0);
         $this->Xls_col++;
   }
   //----- iva_19
   function NM_export_iva_19()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->iva_19 = NM_charset_to_utf8($this->iva_19);
         if (is_numeric($this->iva_19))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->iva_19);
         $this->Xls_col++;
   }
   //----- iva_5
   function NM_export_iva_5()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->iva_5 = NM_charset_to_utf8($this->iva_5);
         if (is_numeric($this->iva_5))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->iva_5);
         $this->Xls_col++;
   }
   //----- val_ica
   function NM_export_val_ica()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->val_ica = NM_charset_to_utf8($this->val_ica);
         if (is_numeric($this->val_ica))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->val_ica);
         $this->Xls_col++;
   }
   //----- val_ret
   function NM_export_val_ret()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->val_ret = NM_charset_to_utf8($this->val_ret);
         if (is_numeric($this->val_ret))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->val_ret);
         $this->Xls_col++;
   }
   //----- val_retiva
   function NM_export_val_retiva()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->val_retiva = NM_charset_to_utf8($this->val_retiva);
         if (is_numeric($this->val_retiva))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->val_retiva);
         $this->Xls_col++;
   }
   //----- tipo_com
   function NM_sub_cons_tipo_com()
   {
         $this->tipo_com = html_entity_decode($this->tipo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_com = strip_tags($this->tipo_com);
         $this->tipo_com = NM_charset_to_utf8($this->tipo_com);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tipo_com;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- prefijo_com
   function NM_sub_cons_prefijo_com()
   {
         $this->prefijo_com = html_entity_decode($this->prefijo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo_com = strip_tags($this->prefijo_com);
         $this->prefijo_com = NM_charset_to_utf8($this->prefijo_com);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->prefijo_com;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- numero_com
   function NM_sub_cons_numero_com()
   {
         $this->numero_com = NM_charset_to_utf8($this->numero_com);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numero_com;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- numfacom
   function NM_sub_cons_numfacom()
   {
         $this->numfacom = html_entity_decode($this->numfacom, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numfacom = strip_tags($this->numfacom);
         $this->numfacom = NM_charset_to_utf8($this->numfacom);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numfacom;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- formapago
   function NM_sub_cons_formapago()
   {
         $this->formapago = html_entity_decode($this->formapago, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->formapago = strip_tags($this->formapago);
         $this->formapago = NM_charset_to_utf8($this->formapago);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->formapago;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- fechacom
   function NM_sub_cons_fechacom()
   {
         $this->fechacom = substr($this->fechacom, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fechacom;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
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
   //----- pagada
   function NM_sub_cons_pagada()
   {
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->pagada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- pagos
   function NM_sub_cons_pagos()
   {
         $this->pagos = NM_charset_to_utf8($this->pagos);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->pagos;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- idprov
   function NM_sub_cons_idprov()
   {
         $this->look_idprov = html_entity_decode($this->look_idprov, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idprov = strip_tags($this->look_idprov);
         $this->look_idprov = NM_charset_to_utf8($this->look_idprov);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_idprov;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
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
   //----- detalle
   function NM_sub_cons_detalle()
   {
         $this->Rows_sub_detalle = array();
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?par_idfaccom?#?" . str_replace("'", "@aspass@", $this->Orig_idfaccom) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida'] = true;
         if (method_exists($this->grid_detallecompra_new, "controle"))
         {
             $this->grid_detallecompra_new->controle();
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
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_new']['embutida'] = false;
         $this->Xls_col++;
   }
   //----- idfaccom
   function NM_sub_cons_idfaccom()
   {
         $this->idfaccom = NM_charset_to_utf8($this->idfaccom);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->idfaccom;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- subtotal
   function NM_sub_cons_subtotal()
   {
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->subtotal;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- valoriva
   function NM_sub_cons_valoriva()
   {
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->valoriva;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
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
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- id_pedidocom
   function NM_sub_cons_id_pedidocom()
   {
         $this->look_id_pedidocom = NM_charset_to_utf8($this->look_id_pedidocom);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_id_pedidocom;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- retencion
   function NM_sub_cons_retencion()
   {
         $this->retencion = NM_charset_to_utf8($this->retencion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->retencion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- reteica
   function NM_sub_cons_reteica()
   {
         $this->reteica = NM_charset_to_utf8($this->reteica);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->reteica;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.000";
         $this->Xls_col++;
   }
   //----- reteiva
   function NM_sub_cons_reteiva()
   {
         $this->reteiva = NM_charset_to_utf8($this->reteiva);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->reteiva;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.000";
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
   //----- a_pagar
   function NM_sub_cons_a_pagar()
   {
         $this->a_pagar = NM_charset_to_utf8($this->a_pagar);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->a_pagar;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- base0
   function NM_sub_cons_base0()
   {
         $this->base0 = NM_charset_to_utf8($this->base0);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->base0;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- base19
   function NM_sub_cons_base19()
   {
         $this->base19 = NM_charset_to_utf8($this->base19);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->base19;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- base5
   function NM_sub_cons_base5()
   {
         $this->base5 = NM_charset_to_utf8($this->base5);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->base5;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- devolucion
   function NM_sub_cons_devolucion()
   {
         $this->devolucion = NM_charset_to_utf8($this->devolucion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->devolucion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- iva_0
   function NM_sub_cons_iva_0()
   {
         $this->iva_0 = NM_charset_to_utf8($this->iva_0);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->iva_0;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- iva_19
   function NM_sub_cons_iva_19()
   {
         $this->iva_19 = NM_charset_to_utf8($this->iva_19);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->iva_19;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- iva_5
   function NM_sub_cons_iva_5()
   {
         $this->iva_5 = NM_charset_to_utf8($this->iva_5);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->iva_5;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- val_ica
   function NM_sub_cons_val_ica()
   {
         $this->val_ica = NM_charset_to_utf8($this->val_ica);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->val_ica;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- val_ret
   function NM_sub_cons_val_ret()
   {
         $this->val_ret = NM_charset_to_utf8($this->val_ret);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->val_ret;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- val_retiva
   function NM_sub_cons_val_retiva()
   {
         $this->val_retiva = NM_charset_to_utf8($this->val_retiva);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->val_retiva;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['nolabel'])
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
 function quebra_idprov_proveedor($idprov) 
 {
   global $tot_idprov;
   $this->sc_proc_quebra_idprov = true; 
   $conteudo = $idprov;
   $this->Lookup->lookup_proveedor_idprov($conteudo) ; 
   $tot_idprov[0] = $idprov;
   $tot_idprov[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][0];
   $tot_idprov[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][1];
   $tot_idprov[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][2];
   $tot_idprov[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][3];
   $tot_idprov[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][4];
   $tot_idprov[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][5];
   $tot_idprov[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][6];
   $tot_idprov[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'][$idprov][7];
   $conteudo = $tot_idprov[0] ;  
   $this->count_idprov = $tot_idprov[1];
   $this->sum_idprov_total = $tot_idprov[2];
   $this->sum_idprov_subtotal = $tot_idprov[3];
   $this->sum_idprov_valoriva = $tot_idprov[4];
   $this->sum_idprov_a_pagar = $tot_idprov[5];
   $this->sum_idprov_val_ica = $tot_idprov[6];
   $this->sum_idprov_val_ret = $tot_idprov[7];
   $this->sum_idprov_val_retiva = $tot_idprov[8];
   $this->campos_quebra_idprov = array(); 
   $conteudo = sc_strip_script($this->idprov); 
   $this->Lookup->lookup_proveedor_idprov($conteudo) ; 
   $this->campos_quebra_idprov[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idprov']))
   {
       $this->campos_quebra_idprov[0]['lab'] = $this->nmgp_label_quebras['idprov']; 
   }
   else
   {
   $this->campos_quebra_idprov[0]['lab'] = "Proveedor"; 
   }
   $this->sc_proc_quebra_idprov = false; 
 } 
 function quebra_total_total($total) 
 {
   global $tot_total;
   $this->sc_proc_quebra_total = true; 
   $tot_total[0] = $total;
   $tot_total[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][0];
   $tot_total[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][1];
   $tot_total[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][2];
   $tot_total[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][3];
   $tot_total[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][4];
   $tot_total[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][5];
   $tot_total[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][6];
   $tot_total[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'][$total][7];
   $conteudo = $tot_total[0] ;  
   $this->count_total = $tot_total[1];
   $this->sum_total_total = $tot_total[2];
   $this->sum_total_subtotal = $tot_total[3];
   $this->sum_total_valoriva = $tot_total[4];
   $this->sum_total_a_pagar = $tot_total[5];
   $this->sum_total_val_ica = $tot_total[6];
   $this->sum_total_val_ret = $tot_total[7];
   $this->sum_total_val_retiva = $tot_total[8];
   $this->campos_quebra_total = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->total)); 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $this->campos_quebra_total[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['total']))
   {
       $this->campos_quebra_total[0]['lab'] = $this->nmgp_label_quebras['total']; 
   }
   else
   {
   $this->campos_quebra_total[0]['lab'] = "Total"; 
   }
   $this->sc_proc_quebra_total = false; 
 } 
 function quebra_fechacom_fecha($fechacom) 
 {
   global $tot_fechacom;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fechacom = true; 
   $tot_fechacom[0] = $fechacom;
   $tot_fechacom[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][0];
   $tot_fechacom[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][1];
   $tot_fechacom[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][2];
   $tot_fechacom[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][3];
   $tot_fechacom[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][4];
   $tot_fechacom[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][5];
   $tot_fechacom[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][6];
   $tot_fechacom[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'][$fechacom][7];
   $conteudo = $tot_fechacom[0] ;  
   $this->count_fechacom = $tot_fechacom[1];
   $this->sum_fechacom_total = $tot_fechacom[2];
   $this->sum_fechacom_subtotal = $tot_fechacom[3];
   $this->sum_fechacom_valoriva = $tot_fechacom[4];
   $this->sum_fechacom_a_pagar = $tot_fechacom[5];
   $this->sum_fechacom_val_ica = $tot_fechacom[6];
   $this->sum_fechacom_val_ret = $tot_fechacom[7];
   $this->sum_fechacom_val_retiva = $tot_fechacom[8];
   $this->campos_quebra_fechacom = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechacom)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fechacom');
   $TP_Time    = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fechacom[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechacom']))
   {
       $this->campos_quebra_fechacom[0]['lab'] = $this->nmgp_label_quebras['fechacom']; 
   }
   else
   {
   $this->campos_quebra_fechacom[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_fechacom = false; 
 } 
 function quebra_pagada_pagada($pagada) 
 {
   global $tot_pagada;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_pagada = true; 
   $tot_pagada[0] = $pagada;
   $tot_pagada[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][0];
   $tot_pagada[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][1];
   $tot_pagada[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][2];
   $tot_pagada[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][3];
   $tot_pagada[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][4];
   $tot_pagada[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][5];
   $tot_pagada[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][6];
   $tot_pagada[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'][$pagada][7];
   $conteudo = $tot_pagada[0] ;  
   $this->count_pagada = $tot_pagada[1];
   $this->sum_pagada_total = $tot_pagada[2];
   $this->sum_pagada_subtotal = $tot_pagada[3];
   $this->sum_pagada_valoriva = $tot_pagada[4];
   $this->sum_pagada_a_pagar = $tot_pagada[5];
   $this->sum_pagada_val_ica = $tot_pagada[6];
   $this->sum_pagada_val_ret = $tot_pagada[7];
   $this->sum_pagada_val_retiva = $tot_pagada[8];
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
 function quebra_asentada_asentada($asentada) 
 {
   global $tot_asentada;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_asentada = true; 
   $conteudo = $asentada;
   $this->Lookup->lookup_asentada_asentada($conteudo) ; 
   $tot_asentada[0] = $asentada;
   $tot_asentada[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][0];
   $tot_asentada[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][1];
   $tot_asentada[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][2];
   $tot_asentada[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][3];
   $tot_asentada[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][4];
   $tot_asentada[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][5];
   $tot_asentada[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][6];
   $tot_asentada[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'][$asentada][7];
   $conteudo = $tot_asentada[0] ;  
   $this->count_asentada = $tot_asentada[1];
   $this->sum_asentada_total = $tot_asentada[2];
   $this->sum_asentada_subtotal = $tot_asentada[3];
   $this->sum_asentada_valoriva = $tot_asentada[4];
   $this->sum_asentada_a_pagar = $tot_asentada[5];
   $this->sum_asentada_val_ica = $tot_asentada[6];
   $this->sum_asentada_val_ret = $tot_asentada[7];
   $this->sum_asentada_val_retiva = $tot_asentada[8];
   $this->campos_quebra_asentada = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->asentada)); 
   $this->Lookup->lookup_asentada_asentada($conteudo) ; 
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
 function quebra_tipo_com_tipo_com($tipo_com) 
 {
   global $tot_tipo_com;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_tipo_com = true; 
   $this->Tot->quebra_tipo_com_tipo_com($tipo_com, $this->arg_sum_tipo_com);
   $conteudo = $tot_tipo_com[0] ;  
   $this->count_tipo_com = $tot_tipo_com[1];
   $this->campos_quebra_tipo_com = array(); 
   $conteudo = sc_strip_script($this->tipo_com); 
   $this->campos_quebra_tipo_com[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tipo_com']))
   {
       $this->campos_quebra_tipo_com[0]['lab'] = $this->nmgp_label_quebras['tipo_com']; 
   }
   else
   {
   $this->campos_quebra_tipo_com[0]['lab'] = "Tipo"; 
   }
   $this->sc_proc_quebra_tipo_com = false; 
 } 
 function quebra_prefijo_com_prefijo_com($prefijo_com) 
 {
   global $tot_prefijo_com;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_prefijo_com = true; 
   $this->Tot->quebra_prefijo_com_prefijo_com($prefijo_com, $this->arg_sum_prefijo_com);
   $conteudo = $tot_prefijo_com[0] ;  
   $this->count_prefijo_com = $tot_prefijo_com[1];
   $this->campos_quebra_prefijo_com = array(); 
   $conteudo = sc_strip_script($this->prefijo_com); 
   $this->campos_quebra_prefijo_com[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['prefijo_com']))
   {
       $this->campos_quebra_prefijo_com[0]['lab'] = $this->nmgp_label_quebras['prefijo_com']; 
   }
   else
   {
   $this->campos_quebra_prefijo_com[0]['lab'] = "Prefijo"; 
   }
   $this->sc_proc_quebra_prefijo_com = false; 
 } 
   function quebra_idprov_proveedor_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_idprov as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_idprov_proveedor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "Al proveedor";
       $mens_tot = "Al proveedor";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_idprov_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_a_pagar;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_val_ica;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_val_ret;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_idprov_val_retiva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_total_total_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_total as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_total_total_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_total_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_a_pagar;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_val_ica;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_val_ret;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_total_val_retiva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_fechacom_fecha_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fechacom as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_fechacom_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fechacom_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_a_pagar;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_val_ica;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_val_ret;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_fechacom_val_retiva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_pagada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_a_pagar;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_val_ica;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_val_ret;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_pagada_val_retiva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_asentada_asentada_top()
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_asentada_asentada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_asentada_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_subtotal;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_valoriva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_a_pagar;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_val_ica;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_val_ret;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_asentada_val_retiva;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_tipo_com_tipo_com_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_tipo_com as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_tipo_com_tipo_com_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_prefijo_com_prefijo_com_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_prefijo_com as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_prefijo_com_prefijo_com_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
   function quebra_geral_proveedor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_total_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_asentada_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_tipo_com_bot() 
   {
   }
   function quebra_geral_prefijo_com_bot() 
   {
   }
   function quebra_geral__NM_SC__bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "a_pagar" && (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ica" && (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_ret" && (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
           elseif ($Cada_cmp == "val_retiva" && (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['embutida']) {
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

   function totaliza_php_proveedor()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_idprov = $this->idprov;
         $this->Lookup->lookup_proveedor_idprov($this->GB_idprov); 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), sc_strip_script($this->GB_idprov), sc_strip_script($idprov_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "proveedor")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['idprov'] = $this->Res->array_total_idprov;
      }
   }


   function totaliza_php_total()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->GB_total)), NM_encode_input(sc_strip_script($total_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "total")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['total'] = $this->Res->array_total_total;
      }
   }


   function totaliza_php_fecha()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
         $fechacom_SV = $this->fechacom;
         $this->fechacom = $this->Ini->Get_arg_groupby($this->fechacom, $Format_tst);
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
     $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
     $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fechacom');
     $TP_Time    = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
     $this->fechacom = $this->Ini->GB_date_format($TP_Time . $fechacom_SV, $Format_tst, $Prefix_dat); 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->fechacom)), NM_encode_input(sc_strip_script($fechacom_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "fecha")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['fechacom'] = $this->Res->array_total_fechacom;
      }
   }


   function totaliza_php_pagada()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), sc_strip_script($this->pagada), sc_strip_script($pagada_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "pagada")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['pagada'] = $this->Res->array_total_pagada;
      }
   }


   function totaliza_php_asentada()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         $this->Lookup->lookup_asentada_asentada($this->GB_asentada); 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->GB_asentada)), NM_encode_input(sc_strip_script($asentada_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'] == "asentada")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['arr_total']['asentada'] = $this->Res->array_total_asentada;
      }
   }


   function totaliza_php__NM_SC_()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['order_grid'] = $nmgp_order_by;
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
         $this->tipo_com = $this->rs_grid->fields[0] ;  
         $this->prefijo_com = $this->rs_grid->fields[1] ;  
         $this->numero_com = $this->rs_grid->fields[2] ;  
         $this->numero_com = (string)$this->numero_com;  
         $this->numfacom = $this->rs_grid->fields[3] ;  
         $this->formapago = $this->rs_grid->fields[4] ;  
         $this->fechacom = $this->rs_grid->fields[5] ;  
         $this->fechavenc = $this->rs_grid->fields[6] ;  
         $this->pagada = $this->rs_grid->fields[7] ;  
         $this->idprov = $this->rs_grid->fields[8] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->total = $this->rs_grid->fields[9] ;  
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[10] ;  
         $this->asentada = (string)$this->asentada;  
         $this->idfaccom = $this->rs_grid->fields[11] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->subtotal = $this->rs_grid->fields[12] ;  
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[13] =  str_replace(",", ".", $this->rs_grid->fields[13]);  
         $this->valoriva = $this->rs_grid->fields[13] ;  
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[14] ;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->saldo = $this->rs_grid->fields[15] ;  
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[16] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[17] ;  
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[18] ;  
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[19] ;  
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[20] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $tipo_com_orig = $this->tipo_com;
         $prefijo_com_orig = $this->prefijo_com;
         $_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
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
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras_new_040422']['contr_erro'] = 'off';
         $this->arg_sum_tipo_com = " = " . $this->Db->qstr($this->tipo_com);
         $this->arg_sum_prefijo_com = " = " . $this->Db->qstr($this->prefijo_com);
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['contr_total_geral'] = "OK";
   }

   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>DOCUMENTOS COMPRAS :: Excel</TITLE>
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
<form name="Fdown" method="get" action="grid_compras_new_040422_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_compras_new_040422"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040422']['xls_return']); ?>"> 
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
