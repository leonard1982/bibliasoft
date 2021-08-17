<?php

class grid_reporte_impuestos_ing_terceros_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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
                   nm_limpa_str_grid_reporte_impuestos_ing_terceros($cadapar[1]);
                   nm_protect_num_grid_reporte_impuestos_ing_terceros($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_reporte_impuestos_ing_terceros']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($ganio)) 
      {
          $_SESSION['ganio'] = $ganio;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["ganio"]);
      }
      if (isset($gperiodo)) 
      {
          $_SESSION['gperiodo'] = $gperiodo;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gperiodo"]);
      }
      if (isset($gcodzona)) 
      {
          $_SESSION['gcodzona'] = $gcodzona;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gcodzona"]);
      }
      if (isset($gresolucion)) 
      {
          $_SESSION['gresolucion'] = $gresolucion;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gresolucion"]);
      }
      if (isset($ganio2)) 
      {
          $_SESSION['ganio2'] = $ganio2;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["ganio2"]);
      }
      if (isset($gperiodo2)) 
      {
          $_SESSION['gperiodo2'] = $gperiodo2;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gperiodo2"]);
      }
      if (isset($gcodzona2)) 
      {
          $_SESSION['gcodzona2'] = $gcodzona2;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gcodzona2"]);
      }
      if (isset($gcontador_grid_fe)) 
      {
          $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gcontador_grid_fe"]);
      }
      if (isset($gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gbd_seleccionada"]);
      }
      if (isset($gidtercero)) 
      {
          $_SESSION['gidtercero'] = $gidtercero;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gidtercero"]);
      }
      if (!isset($gIdfac) && isset($gidfac)) 
      {
         $gIdfac = $gidfac;
      }
      if (isset($gIdfac)) 
      {
          $_SESSION['gIdfac'] = $gIdfac;
          nm_limpa_str_grid_reporte_impuestos_ing_terceros($_SESSION["gIdfac"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_reporte_impuestos_ing_terceros_total.class.php"); 
      $this->Tot      = new grid_reporte_impuestos_ing_terceros_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "formapago")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "porcliente")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "porpj")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "portipo")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "porvendedor")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "porasentada")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "pagada")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "porbanco")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][2];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][3];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][4];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][5];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][6];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][7];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][8];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][9];
              $this->sum_adicional = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['tot_geral'][10];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_reporte_impuestos_ing_terceros";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_reporte_impuestos_ing_terceros.rtf";
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
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos_ing_terceros']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos_ing_terceros']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos_ing_terceros']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->anio = $Busca_temp['anio']; 
          $tmp_pos = strpos($this->anio, "##@@");
          if ($tmp_pos !== false && !is_array($this->anio))
          {
              $this->anio = substr($this->anio, 0, $tmp_pos);
          }
          $this->periodo = $Busca_temp['periodo']; 
          $tmp_pos = strpos($this->periodo, "##@@");
          if ($tmp_pos !== false && !is_array($this->periodo))
          {
              $this->periodo = substr($this->periodo, 0, $tmp_pos);
          }
          $this->zona = $Busca_temp['zona']; 
          $tmp_pos = strpos($this->zona, "##@@");
          if ($tmp_pos !== false && !is_array($this->zona))
          {
              $this->zona = substr($this->zona, 0, $tmp_pos);
          }
          $this->barrio = $Busca_temp['barrio']; 
          $tmp_pos = strpos($this->barrio, "##@@");
          if ($tmp_pos !== false && !is_array($this->barrio))
          {
              $this->barrio = substr($this->barrio, 0, $tmp_pos);
          }
          $this->numcontrato = $Busca_temp['numcontrato']; 
          $tmp_pos = strpos($this->numcontrato, "##@@");
          if ($tmp_pos !== false && !is_array($this->numcontrato))
          {
              $this->numcontrato = substr($this->numcontrato, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
if (!isset($_SESSION['gcontador_grid_fe'])) {$_SESSION['gcontador_grid_fe'] = "";}
if (!isset($this->sc_temp_gcontador_grid_fe)) {$this->sc_temp_gcontador_grid_fe = (isset($_SESSION['gcontador_grid_fe'])) ? $_SESSION['gcontador_grid_fe'] : "";}
  $this->sc_temp_gcontador_grid_fe=1;

;
;
;
;
;
if (isset($this->sc_temp_gcontador_grid_fe)) {$_SESSION['gcontador_grid_fe'] = $this->sc_temp_gcontador_grid_fe;}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['anio'])) ? $this->New_label['anio'] : "Año"; 
          if ($Cada_col == "anio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['periodo'])) ? $this->New_label['periodo'] : "Periodo"; 
          if ($Cada_col == "periodo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona'])) ? $this->New_label['zona'] : "Zona"; 
          if ($Cada_col == "zona" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero2'])) ? $this->New_label['numero2'] : "Número"; 
          if ($Cada_col == "numero2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
          if ($Cada_col == "idcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numcontrato'])) ? $this->New_label['numcontrato'] : "Código"; 
          if ($Cada_col == "numcontrato" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base19%"; 
          if ($Cada_col == "base_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "IVA19%"; 
          if ($Cada_col == "valor_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base5%"; 
          if ($Cada_col == "base_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "IVA5%"; 
          if ($Cada_col == "valor_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Excento"; 
          if ($Cada_col == "excento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ing_terceros'])) ? $this->New_label['ing_terceros'] : "Ing Terceros"; 
          if ($Cada_col == "ing_terceros" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['a4'])) ? $this->New_label['a4'] : "Ver"; 
          if ($Cada_col == "a4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
          if ($Cada_col == "idfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "No"; 
          if ($Cada_col == "numfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "F.Pago"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Fechavenc"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "IVA"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
          if ($Cada_col == "pagada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
          if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Desc."; 
          if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
          if ($Cada_col == "adicional2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
          if ($Cada_col == "adicional3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "PJ"; 
          if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : " Vendedor"; 
          if ($Cada_col == "vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
          if ($Cada_col == "creado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['editado'])) ? $this->New_label['editado'] : ""; 
          if ($Cada_col == "editado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['usuario_crea'])) ? $this->New_label['usuario_crea'] : "Usuario Crea"; 
          if ($Cada_col == "usuario_crea" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inicio'])) ? $this->New_label['inicio'] : "Inicio"; 
          if ($Cada_col == "inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fin'])) ? $this->New_label['fin'] : "Fin"; 
          if ($Cada_col == "fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['banco'])) ? $this->New_label['banco'] : "Caja"; 
          if ($Cada_col == "banco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dias_decredito'])) ? $this->New_label['dias_decredito'] : "Dias Decredito"; 
          if ($Cada_col == "dias_decredito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cod Cuenta"; 
          if ($Cada_col == "cod_cuenta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['editarpos'])) ? $this->New_label['editarpos'] : "Editar"; 
          if ($Cada_col == "editarpos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['existeentns'])) ? $this->New_label['existeentns'] : "TNS"; 
          if ($Cada_col == "existeentns" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "PDF"; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprimircopia'])) ? $this->New_label['imprimircopia'] : "Ticket"; 
          if ($Cada_col == "imprimircopia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      direccion as direccion2,     (MONTH(fechaven)) as periodo,     (YEAR(fechaven)) as anio,     (select b.descripcion from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join barrios b on tc.barrio=b.codigo where tcf.factura = f.idfacven limit 1) as barrio,     (select zc.nombre from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join zona_clientes zc on tc.zona=zc.codigo where tcf.factura = f.idfacven limit 1) as zona, numcontrato,     enviada,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros FROM      facturaven_contratos f WHERE           espos = 'SI' and enviada='SI' and asentada='1' ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT anio, periodo, zona, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), numero2, idcli, total, numcontrato, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros, idfacven, numfacven, credito, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),editado,102), '.', '-') + ' ' + convert(char(8),editado,20), usuario_crea, str_replace (convert(char(10),inicio,102), '.', '-') + ' ' + convert(char(8),inicio,20), str_replace (convert(char(10),fin,102), '.', '-') + ' ' + convert(char(8),fin,20), banco, dias_decredito, tipo, cod_cuenta, enviada_a_tns, factura_tns, cufe, enviada from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      direccion as direccion2,     (MONTH(fechaven)) as periodo,     (YEAR(fechaven)) as anio,     (select b.descripcion from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join barrios b on tc.barrio=b.codigo where tcf.factura = f.idfacven limit 1) as barrio,     (select zc.nombre from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join zona_clientes zc on tc.zona=zc.codigo where tcf.factura = f.idfacven limit 1) as zona, numcontrato,     enviada,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros FROM      facturaven_contratos f WHERE           espos = 'SI' and enviada='SI' and asentada='1' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT anio, periodo, zona, fechaven, numero2, idcli, total, numcontrato, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros, idfacven, numfacven, credito, fechavenc, subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, creado, editado, usuario_crea, inicio, fin, banco, dias_decredito, tipo, cod_cuenta, enviada_a_tns, factura_tns, cufe, enviada from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      direccion as direccion2,     (MONTH(fechaven)) as periodo,     (YEAR(fechaven)) as anio,     (select b.descripcion from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join barrios b on tc.barrio=b.codigo where tcf.factura = f.idfacven limit 1) as barrio,     (select zc.nombre from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join zona_clientes zc on tc.zona=zc.codigo where tcf.factura = f.idfacven limit 1) as zona, numcontrato,     enviada,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros FROM      facturaven_contratos f WHERE           espos = 'SI' and enviada='SI' and asentada='1' ) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT anio, periodo, zona, fechaven, numero2, idcli, total, numcontrato, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros, idfacven, numfacven, credito, fechavenc, subtotal, valoriva, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, vendedor, creado, editado, usuario_crea, inicio, fin, banco, dias_decredito, tipo, cod_cuenta, enviada_a_tns, factura_tns, cufe, enviada from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,     resolucion,     vendedor,     creado,     editado,     usuario_crea,     creado as inicio,     creado as fin,     banco,     dias_decredito,     enviada_a_tns,     fecha_a_tns,     factura_tns,     tipo,     cod_cuenta,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',numfacven) as numero2,     qr_base64,     fecha_validacion,     cufe,      direccion as direccion2,     (MONTH(fechaven)) as periodo,     (YEAR(fechaven)) as anio,     (select b.descripcion from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join barrios b on tc.barrio=b.codigo where tcf.factura = f.idfacven limit 1) as barrio,     (select zc.nombre from terceros_contratos tc inner join terceros_contratos_factura tcf on tc.id_ter_cont=tcf.id_contrato inner join zona_clientes zc on tc.zona=zc.codigo where tcf.factura = f.idfacven limit 1) as zona, numcontrato,     enviada,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros FROM      facturaven_contratos f WHERE           espos = 'SI' and enviada='SI' and asentada='1' ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
              $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->anio = $rs->fields[0] ;  
         $this->anio = (string)$this->anio;
         $this->periodo = $rs->fields[1] ;  
         $this->periodo = (string)$this->periodo;
         $this->zona = $rs->fields[2] ;  
         $this->fechaven = $rs->fields[3] ;  
         $this->numero2 = $rs->fields[4] ;  
         $this->idcli = $rs->fields[5] ;  
         $this->idcli = (string)$this->idcli;
         $this->total = $rs->fields[6] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->numcontrato = $rs->fields[7] ;  
         $this->numcontrato = (string)$this->numcontrato;
         $this->base_iva_19 = $rs->fields[8] ;  
         $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
         $this->base_iva_19 = (string)$this->base_iva_19;
         $this->valor_iva_19 = $rs->fields[9] ;  
         $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
         $this->valor_iva_19 = (string)$this->valor_iva_19;
         $this->base_iva_5 = $rs->fields[10] ;  
         $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
         $this->base_iva_5 = (string)$this->base_iva_5;
         $this->valor_iva_5 = $rs->fields[11] ;  
         $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
         $this->valor_iva_5 = (string)$this->valor_iva_5;
         $this->excento = $rs->fields[12] ;  
         $this->excento =  str_replace(",", ".", $this->excento);
         $this->excento = (string)$this->excento;
         $this->ing_terceros = $rs->fields[13] ;  
         $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
         $this->ing_terceros = (string)$this->ing_terceros;
         $this->idfacven = $rs->fields[14] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->numfacven = $rs->fields[15] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->credito = $rs->fields[16] ;  
         $this->credito = (string)$this->credito;
         $this->fechavenc = $rs->fields[17] ;  
         $this->subtotal = $rs->fields[18] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[19] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
         $this->pagada = $rs->fields[20] ;  
         $this->asentada = $rs->fields[21] ;  
         $this->asentada = (string)$this->asentada;
         $this->observaciones = $rs->fields[22] ;  
         $this->saldo = $rs->fields[23] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[24] ;  
         $this->adicional =  str_replace(",", ".", $this->adicional);
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[25] ;  
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[26] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->resolucion = $rs->fields[27] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->vendedor = $rs->fields[28] ;  
         $this->vendedor = (string)$this->vendedor;
         $this->creado = $rs->fields[29] ;  
         $this->editado = $rs->fields[30] ;  
         $this->usuario_crea = $rs->fields[31] ;  
         $this->usuario_crea = (string)$this->usuario_crea;
         $this->inicio = $rs->fields[32] ;  
         $this->fin = $rs->fields[33] ;  
         $this->banco = $rs->fields[34] ;  
         $this->banco = (string)$this->banco;
         $this->dias_decredito = $rs->fields[35] ;  
         $this->dias_decredito = (string)$this->dias_decredito;
         $this->tipo = $rs->fields[36] ;  
         $this->cod_cuenta = $rs->fields[37] ;  
         $this->enviada_a_tns = $rs->fields[38] ;  
         $this->factura_tns = $rs->fields[39] ;  
         $this->cufe = $rs->fields[40] ;  
         $this->enviada = $rs->fields[41] ;  
         $this->Orig_anio = $this->anio;
         $this->Orig_periodo = $this->periodo;
         $this->Orig_zona = $this->zona;
         $this->Orig_fechaven = $this->fechaven;
         $this->Orig_numero2 = $this->numero2;
         $this->Orig_idcli = $this->idcli;
         $this->Orig_total = $this->total;
         $this->Orig_numcontrato = $this->numcontrato;
         $this->Orig_base_iva_19 = $this->base_iva_19;
         $this->Orig_valor_iva_19 = $this->valor_iva_19;
         $this->Orig_base_iva_5 = $this->base_iva_5;
         $this->Orig_valor_iva_5 = $this->valor_iva_5;
         $this->Orig_excento = $this->excento;
         $this->Orig_ing_terceros = $this->ing_terceros;
         $this->Orig_idfacven = $this->idfacven;
         $this->Orig_numfacven = $this->numfacven;
         $this->Orig_credito = $this->credito;
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
         $this->Orig_tipo = $this->tipo;
         $this->Orig_cod_cuenta = $this->cod_cuenta;
         $this->Orig_enviada_a_tns = $this->enviada_a_tns;
         $this->Orig_factura_tns = $this->factura_tns;
         $this->Orig_cufe = $this->cufe;
         $this->Orig_enviada = $this->enviada;
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
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
         $_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
  $vTnota = 'NO';
$sql = "SELECT numero_nota FROM facturaven_contratos WHERE idfacven='".$this->idfacven ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if($this->ds[0][0]>0)
	{
	$vTnota = 'SI';
	}
else
	{
	$vTnota = 'NO';
	}

if($this->tipo =="FV")
{
$this->NM_field_style["tipo"] = "background-color:#cad9e9;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->tipo =="RS")
{
$this->NM_field_style["tipo"] = "background-color:#f0ad4e;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->credito =="2")
{
$this->NM_field_style["credito"] = "background-color:#29abe2;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
else
{
$this->NM_field_style["credito"] = "background-color:#ffa0a3;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
	
if($this->asentada =="1")
{
	if(!empty($this->cufe ))
	{
		$this->NM_field_style["fechaven"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	}
	else
	{
		$this->NM_field_style["fechaven"] = "background-color:#ffb93c;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	}
	
	$this->editarpos  = "<a href='#'></a>";
	
	if($vTnota == 'NO')
		{
		$this->NM_field_style["numero2"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
	else
		{
		$this->NM_field_style["numero2"] = "background-color:#ff0000;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
		$this->NM_field_style["total"] = "background-color:#ff0000;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
		$this->NM_field_style["nc"] = "background-color:#ff0000;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
	
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
	
}
else
{
	$this->editarpos  = "<a href='../frm_pos/index.php?gidfactura=".$this->idfacven ."' ><img src='../_lib/img/scriptcase__NM__ico__NM__address_book_edit_32.png' /></a>";
	
	$this->imprimircopia  = "<a href='../frm_pos_impresion_html/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
}

$this->a4  = "<a href='../factura_contratotv/?idempresa=".$this->sc_temp_gbd_seleccionada."&id=".$this->idfacven ."' target='_blank'><img src='../_lib/img/scriptcase__NM__ico__NM__find_32.png' /></a>";


switch($this->enviada )
{
	case 'SI':
		$this->NM_field_style["anio"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	break;
	
	case 'PT':
		$this->NM_field_style["anio"] = "background-color:#fa685e;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	break;
	
	case 'PR':
		$this->NM_field_style["anio"] = "background-color:#89a0d1;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	break;
}
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- anio
   function NM_export_anio()
   {
         $this->anio = html_entity_decode($this->anio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anio = strip_tags($this->anio);
         $this->anio = NM_charset_to_utf8($this->anio);
         $this->anio = str_replace('<', '&lt;', $this->anio);
         $this->anio = str_replace('>', '&gt;', $this->anio);
         $this->Texto_tag .= "<td>" . $this->anio . "</td>\r\n";
   }
   //----- periodo
   function NM_export_periodo()
   {
             nmgp_Form_Num_Val($this->periodo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->periodo = NM_charset_to_utf8($this->periodo);
         $this->periodo = str_replace('<', '&lt;', $this->periodo);
         $this->periodo = str_replace('>', '&gt;', $this->periodo);
         $this->Texto_tag .= "<td>" . $this->periodo . "</td>\r\n";
   }
   //----- zona
   function NM_export_zona()
   {
         $this->zona = html_entity_decode($this->zona, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zona = strip_tags($this->zona);
         $this->zona = NM_charset_to_utf8($this->zona);
         $this->zona = str_replace('<', '&lt;', $this->zona);
         $this->zona = str_replace('>', '&gt;', $this->zona);
         $this->Texto_tag .= "<td>" . $this->zona . "</td>\r\n";
   }
   //----- fechaven
   function NM_export_fechaven()
   {
             $conteudo_x =  $this->fechaven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaven, "YYYY-MM-DD  ");
                 $this->fechaven = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechaven = NM_charset_to_utf8($this->fechaven);
         $this->fechaven = str_replace('<', '&lt;', $this->fechaven);
         $this->fechaven = str_replace('>', '&gt;', $this->fechaven);
         $this->Texto_tag .= "<td>" . $this->fechaven . "</td>\r\n";
   }
   //----- numero2
   function NM_export_numero2()
   {
         $this->numero2 = html_entity_decode($this->numero2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero2 = strip_tags($this->numero2);
         $this->numero2 = NM_charset_to_utf8($this->numero2);
         $this->numero2 = str_replace('<', '&lt;', $this->numero2);
         $this->numero2 = str_replace('>', '&gt;', $this->numero2);
         $this->Texto_tag .= "<td>" . $this->numero2 . "</td>\r\n";
   }
   //----- idcli
   function NM_export_idcli()
   {
         $this->look_idcli = html_entity_decode($this->look_idcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idcli = strip_tags($this->look_idcli);
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         $this->look_idcli = str_replace('<', '&lt;', $this->look_idcli);
         $this->look_idcli = str_replace('>', '&gt;', $this->look_idcli);
         $this->Texto_tag .= "<td>" . $this->look_idcli . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, ",", ",", "0", "S", "2", "", "V:3:3", "-") ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- numcontrato
   function NM_export_numcontrato()
   {
             nmgp_Form_Num_Val($this->numcontrato, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numcontrato = NM_charset_to_utf8($this->numcontrato);
         $this->numcontrato = str_replace('<', '&lt;', $this->numcontrato);
         $this->numcontrato = str_replace('>', '&gt;', $this->numcontrato);
         $this->Texto_tag .= "<td>" . $this->numcontrato . "</td>\r\n";
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->base_iva_19 = NM_charset_to_utf8($this->base_iva_19);
         $this->base_iva_19 = str_replace('<', '&lt;', $this->base_iva_19);
         $this->base_iva_19 = str_replace('>', '&gt;', $this->base_iva_19);
         $this->Texto_tag .= "<td>" . $this->base_iva_19 . "</td>\r\n";
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->valor_iva_19 = NM_charset_to_utf8($this->valor_iva_19);
         $this->valor_iva_19 = str_replace('<', '&lt;', $this->valor_iva_19);
         $this->valor_iva_19 = str_replace('>', '&gt;', $this->valor_iva_19);
         $this->Texto_tag .= "<td>" . $this->valor_iva_19 . "</td>\r\n";
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->base_iva_5 = NM_charset_to_utf8($this->base_iva_5);
         $this->base_iva_5 = str_replace('<', '&lt;', $this->base_iva_5);
         $this->base_iva_5 = str_replace('>', '&gt;', $this->base_iva_5);
         $this->Texto_tag .= "<td>" . $this->base_iva_5 . "</td>\r\n";
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->valor_iva_5 = NM_charset_to_utf8($this->valor_iva_5);
         $this->valor_iva_5 = str_replace('<', '&lt;', $this->valor_iva_5);
         $this->valor_iva_5 = str_replace('>', '&gt;', $this->valor_iva_5);
         $this->Texto_tag .= "<td>" . $this->valor_iva_5 . "</td>\r\n";
   }
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->excento = NM_charset_to_utf8($this->excento);
         $this->excento = str_replace('<', '&lt;', $this->excento);
         $this->excento = str_replace('>', '&gt;', $this->excento);
         $this->Texto_tag .= "<td>" . $this->excento . "</td>\r\n";
   }
   //----- ing_terceros
   function NM_export_ing_terceros()
   {
             nmgp_Form_Num_Val($this->ing_terceros, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->ing_terceros = NM_charset_to_utf8($this->ing_terceros);
         $this->ing_terceros = str_replace('<', '&lt;', $this->ing_terceros);
         $this->ing_terceros = str_replace('>', '&gt;', $this->ing_terceros);
         $this->Texto_tag .= "<td>" . $this->ing_terceros . "</td>\r\n";
   }
   //----- a4
   function NM_export_a4()
   {
         $this->a4 = html_entity_decode($this->a4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->a4 = strip_tags($this->a4);
         $this->a4 = NM_charset_to_utf8($this->a4);
         $this->a4 = str_replace('<', '&lt;', $this->a4);
         $this->a4 = str_replace('>', '&gt;', $this->a4);
         $this->Texto_tag .= "<td>" . $this->a4 . "</td>\r\n";
   }
   //----- idfacven
   function NM_export_idfacven()
   {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idfacven = NM_charset_to_utf8($this->idfacven);
         $this->idfacven = str_replace('<', '&lt;', $this->idfacven);
         $this->idfacven = str_replace('>', '&gt;', $this->idfacven);
         $this->Texto_tag .= "<td>" . $this->idfacven . "</td>\r\n";
   }
   //----- numfacven
   function NM_export_numfacven()
   {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numfacven = NM_charset_to_utf8($this->numfacven);
         $this->numfacven = str_replace('<', '&lt;', $this->numfacven);
         $this->numfacven = str_replace('>', '&gt;', $this->numfacven);
         $this->Texto_tag .= "<td>" . $this->numfacven . "</td>\r\n";
   }
   //----- credito
   function NM_export_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         $this->look_credito = str_replace('<', '&lt;', $this->look_credito);
         $this->look_credito = str_replace('>', '&gt;', $this->look_credito);
         $this->Texto_tag .= "<td>" . $this->look_credito . "</td>\r\n";
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechavenc = NM_charset_to_utf8($this->fechavenc);
         $this->fechavenc = str_replace('<', '&lt;', $this->fechavenc);
         $this->fechavenc = str_replace('>', '&gt;', $this->fechavenc);
         $this->Texto_tag .= "<td>" . $this->fechavenc . "</td>\r\n";
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->subtotal = str_replace('<', '&lt;', $this->subtotal);
         $this->subtotal = str_replace('>', '&gt;', $this->subtotal);
         $this->Texto_tag .= "<td>" . $this->subtotal . "</td>\r\n";
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->valoriva = str_replace('<', '&lt;', $this->valoriva);
         $this->valoriva = str_replace('>', '&gt;', $this->valoriva);
         $this->Texto_tag .= "<td>" . $this->valoriva . "</td>\r\n";
   }
   //----- pagada
   function NM_export_pagada()
   {
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         $this->pagada = str_replace('<', '&lt;', $this->pagada);
         $this->pagada = str_replace('>', '&gt;', $this->pagada);
         $this->Texto_tag .= "<td>" . $this->pagada . "</td>\r\n";
   }
   //----- asentada
   function NM_export_asentada()
   {
         $this->look_asentada = NM_charset_to_utf8($this->look_asentada);
         $this->look_asentada = str_replace('<', '&lt;', $this->look_asentada);
         $this->look_asentada = str_replace('>', '&gt;', $this->look_asentada);
         $this->Texto_tag .= "<td>" . $this->look_asentada . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->adicional = NM_charset_to_utf8($this->adicional);
         $this->adicional = str_replace('<', '&lt;', $this->adicional);
         $this->adicional = str_replace('>', '&gt;', $this->adicional);
         $this->Texto_tag .= "<td>" . $this->adicional . "</td>\r\n";
   }
   //----- adicional2
   function NM_export_adicional2()
   {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional2 = NM_charset_to_utf8($this->adicional2);
         $this->adicional2 = str_replace('<', '&lt;', $this->adicional2);
         $this->adicional2 = str_replace('>', '&gt;', $this->adicional2);
         $this->Texto_tag .= "<td>" . $this->adicional2 . "</td>\r\n";
   }
   //----- adicional3
   function NM_export_adicional3()
   {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional3 = NM_charset_to_utf8($this->adicional3);
         $this->adicional3 = str_replace('<', '&lt;', $this->adicional3);
         $this->adicional3 = str_replace('>', '&gt;', $this->adicional3);
         $this->Texto_tag .= "<td>" . $this->adicional3 . "</td>\r\n";
   }
   //----- resolucion
   function NM_export_resolucion()
   {
         nmgp_Form_Num_Val($this->look_resolucion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_resolucion = NM_charset_to_utf8($this->look_resolucion);
         $this->look_resolucion = str_replace('<', '&lt;', $this->look_resolucion);
         $this->look_resolucion = str_replace('>', '&gt;', $this->look_resolucion);
         $this->Texto_tag .= "<td>" . $this->look_resolucion . "</td>\r\n";
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         nmgp_Form_Num_Val($this->look_vendedor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         $this->look_vendedor = str_replace('<', '&lt;', $this->look_vendedor);
         $this->look_vendedor = str_replace('>', '&gt;', $this->look_vendedor);
         $this->Texto_tag .= "<td>" . $this->look_vendedor . "</td>\r\n";
   }
   //----- creado
   function NM_export_creado()
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
         $this->creado = NM_charset_to_utf8($this->creado);
         $this->creado = str_replace('<', '&lt;', $this->creado);
         $this->creado = str_replace('>', '&gt;', $this->creado);
         $this->Texto_tag .= "<td>" . $this->creado . "</td>\r\n";
   }
   //----- editado
   function NM_export_editado()
   {
         $this->editado = NM_charset_to_utf8($this->editado);
         $this->editado = str_replace('<', '&lt;', $this->editado);
         $this->editado = str_replace('>', '&gt;', $this->editado);
         $this->Texto_tag .= "<td>" . $this->editado . "</td>\r\n";
   }
   //----- usuario_crea
   function NM_export_usuario_crea()
   {
             nmgp_Form_Num_Val($this->usuario_crea, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->usuario_crea = NM_charset_to_utf8($this->usuario_crea);
         $this->usuario_crea = str_replace('<', '&lt;', $this->usuario_crea);
         $this->usuario_crea = str_replace('>', '&gt;', $this->usuario_crea);
         $this->Texto_tag .= "<td>" . $this->usuario_crea . "</td>\r\n";
   }
   //----- inicio
   function NM_export_inicio()
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
         $this->inicio = NM_charset_to_utf8($this->inicio);
         $this->inicio = str_replace('<', '&lt;', $this->inicio);
         $this->inicio = str_replace('>', '&gt;', $this->inicio);
         $this->Texto_tag .= "<td>" . $this->inicio . "</td>\r\n";
   }
   //----- fin
   function NM_export_fin()
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
         $this->fin = NM_charset_to_utf8($this->fin);
         $this->fin = str_replace('<', '&lt;', $this->fin);
         $this->fin = str_replace('>', '&gt;', $this->fin);
         $this->Texto_tag .= "<td>" . $this->fin . "</td>\r\n";
   }
   //----- banco
   function NM_export_banco()
   {
         nmgp_Form_Num_Val($this->look_banco, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_banco = NM_charset_to_utf8($this->look_banco);
         $this->look_banco = str_replace('<', '&lt;', $this->look_banco);
         $this->look_banco = str_replace('>', '&gt;', $this->look_banco);
         $this->Texto_tag .= "<td>" . $this->look_banco . "</td>\r\n";
   }
   //----- dias_decredito
   function NM_export_dias_decredito()
   {
             nmgp_Form_Num_Val($this->dias_decredito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->dias_decredito = NM_charset_to_utf8($this->dias_decredito);
         $this->dias_decredito = str_replace('<', '&lt;', $this->dias_decredito);
         $this->dias_decredito = str_replace('>', '&gt;', $this->dias_decredito);
         $this->Texto_tag .= "<td>" . $this->dias_decredito . "</td>\r\n";
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         $this->tipo = str_replace('<', '&lt;', $this->tipo);
         $this->tipo = str_replace('>', '&gt;', $this->tipo);
         $this->Texto_tag .= "<td>" . $this->tipo . "</td>\r\n";
   }
   //----- cod_cuenta
   function NM_export_cod_cuenta()
   {
         $this->cod_cuenta = html_entity_decode($this->cod_cuenta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_cuenta = strip_tags($this->cod_cuenta);
         $this->cod_cuenta = NM_charset_to_utf8($this->cod_cuenta);
         $this->cod_cuenta = str_replace('<', '&lt;', $this->cod_cuenta);
         $this->cod_cuenta = str_replace('>', '&gt;', $this->cod_cuenta);
         $this->Texto_tag .= "<td>" . $this->cod_cuenta . "</td>\r\n";
   }
   //----- editarpos
   function NM_export_editarpos()
   {
         $this->editarpos = html_entity_decode($this->editarpos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->editarpos = strip_tags($this->editarpos);
         $this->editarpos = NM_charset_to_utf8($this->editarpos);
         $this->editarpos = str_replace('<', '&lt;', $this->editarpos);
         $this->editarpos = str_replace('>', '&gt;', $this->editarpos);
         $this->Texto_tag .= "<td>" . $this->editarpos . "</td>\r\n";
   }
   //----- existeentns
   function NM_export_existeentns()
   {
         $this->existeentns = html_entity_decode($this->existeentns, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->existeentns = strip_tags($this->existeentns);
         $this->existeentns = NM_charset_to_utf8($this->existeentns);
         $this->existeentns = str_replace('<', '&lt;', $this->existeentns);
         $this->existeentns = str_replace('>', '&gt;', $this->existeentns);
         $this->Texto_tag .= "<td>" . $this->existeentns . "</td>\r\n";
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         $this->imprimir = html_entity_decode($this->imprimir, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimir = strip_tags($this->imprimir);
         $this->imprimir = NM_charset_to_utf8($this->imprimir);
         $this->imprimir = str_replace('<', '&lt;', $this->imprimir);
         $this->imprimir = str_replace('>', '&gt;', $this->imprimir);
         $this->Texto_tag .= "<td>" . $this->imprimir . "</td>\r\n";
   }
   //----- imprimircopia
   function NM_export_imprimircopia()
   {
         $this->imprimircopia = html_entity_decode($this->imprimircopia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->imprimircopia = strip_tags($this->imprimircopia);
         $this->imprimircopia = NM_charset_to_utf8($this->imprimircopia);
         $this->imprimircopia = str_replace('<', '&lt;', $this->imprimircopia);
         $this->imprimircopia = str_replace('>', '&gt;', $this->imprimircopia);
         $this->Texto_tag .= "<td>" . $this->imprimircopia . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Facturas de venta contrato :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_reporte_impuestos_ing_terceros_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_reporte_impuestos_ing_terceros"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAlinearTexto($texto, $titulo, $retorno, $distancia, $alineacion='izquierda')
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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


$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fPagarFacVen($idfactura,$formapago=1,$retorno=true,$vidrecibo=0)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$estado     = 1;
	$tot        = "";
	$this->resolucion = "";
	$numero     = "";
	$vfecha      = "";
	$res        = "";
	$vvendedor  = "";
	$vbanco     = 1;

	if(!empty($idfactura))
	{
		 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20),str_replace (convert(char(10),f.creado,102), '.', '-') + ' ' + convert(char(8),f.creado,20),f.tipo,r.prefijo,f.idcli from facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,f.fechaven,f.creado,f.tipo,r.prefijo,f.idcli from facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven='".$idfactura."'"; 
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
				
					$vsql2 = "update facturaven set pagada='SI', saldo='0'	where idfacven='".$idfactura."'";
					
					
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentar($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentarContratos($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fPagarPedido($id,$formapago=1,$retorno=true)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentarPedido($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fEnviarFV($vidfacven)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
}

?>
