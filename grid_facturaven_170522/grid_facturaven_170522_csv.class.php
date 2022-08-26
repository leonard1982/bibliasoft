<?php

class grid_facturaven_170522_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $Csv_label;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;
   var $sum_total;
   var $sum_subtotal;
   var $sum_valoriva;
   var $sum_base_iva_19;
   var $sum_valor_iva_19;
   var $sum_base_iva_5;
   var $sum_valor_iva_5;
   var $sum_excento;
   var $sum_base_con_8;
   var $sum_valor_con_8;
   var $sum_t_iva;
   var $sum_imp_bolsa;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Csv_f);
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
                   nm_limpa_str_grid_facturaven_170522($cadapar[1]);
                   nm_protect_num_grid_facturaven_170522($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_170522']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $par_numfacventa;
          nm_limpa_str_grid_facturaven_170522($_SESSION["par_numfacventa"]);
      }
      if (!isset($gIdfac) && isset($gidfac)) 
      {
         $gIdfac = $gidfac;
      }
      if (isset($gIdfac)) 
      {
          $_SESSION['gIdfac'] = $gIdfac;
          nm_limpa_str_grid_facturaven_170522($_SESSION["gIdfac"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_facturaven_170522_total.class.php"); 
      $this->Tot      = new grid_facturaven_170522_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "vencimiento")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "credito")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "vendedor")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "prefijo")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "tipo")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][9];
              $this->sum_base_con_8 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][10];
              $this->sum_valor_con_8 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][11];
              $this->sum_t_iva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][12];
              $this->sum_imp_bolsa = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['tot_geral'][13];
          }
      }
      $this->Csv_password = "";
      $this->Arquivo   = "sc_csv";
      $this->Arquivo  .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip   = $this->Arquivo . "_grid_facturaven_170522.zip";
      $this->Arquivo  .= "_grid_facturaven_170522";
      $this->Arquivo  .= ".csv";
      $this->Tit_doc   = "grid_facturaven_170522.csv";
      $this->Tit_zip   = "grid_facturaven_170522.zip";
      $this->Label_CSV = "N";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
      $this->Tem_csv_res = false;
      if (isset($_REQUEST['nm_delim_line']) && !empty($_REQUEST['nm_delim_line']))
      {
          $this->Delim_line = str_replace(array(1,2,3), array("\r\n","\r","\n"), $_REQUEST['nm_delim_line']);
      }
      if (isset($_REQUEST['nm_delim_col']) && !empty($_REQUEST['nm_delim_col']))
      {
          $this->Delim_col = str_replace(array(1,2,3,4,5), array(";",",","\	","#",""), $_REQUEST['nm_delim_col']);
      }
      if (isset($_REQUEST['nm_delim_dados']) && !empty($_REQUEST['nm_delim_dados']))
      {
          $this->Delim_dados = str_replace(array(1,2,3,4), array('"',"'","","|"), $_REQUEST['nm_delim_dados']);
      }
      if (isset($_REQUEST['nm_label_csv']) && !empty($_REQUEST['nm_label_csv']))
      {
          $this->Label_CSV = $_REQUEST['nm_label_csv'];
      }
          $this->Tem_csv_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_csv_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_csv_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['SC_Gb_Free_cmp']))
          {
              $this->Tem_csv_res  = false;
          }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_170522']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_return']);
          if ($this->Tem_csv_res) {
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
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_170522']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_170522']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_170522']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['campos_busca'];
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
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_facturaven_170522']['contr_erro'] = 'on';
 ;
;
$this->nmgp_botoes["enviar"] = "off";;
$this->nmgp_botoes["enviar_tmp"] = "off";;
 
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
		
		}
	else
		{
		$this->nmgp_botoes["prueba"] = "off";;
		$this->nmgp_botoes["Estado"] = "off";;
		$this->nmgp_botoes["Descarga"] = "off";;
		$this->nmgp_botoes["descarga_xml"] = "off";;
		}
	}
else
	{
	$this->nmgp_botoes["prueba"] = "off";;
	$this->nmgp_botoes["Estado"] = "off";;
	$this->nmgp_botoes["Descarga"] = "off";;
	$this->nmgp_botoes["descarga_xml"] = "off";;
	}
$_SESSION['scriptcase']['grid_facturaven_170522']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'] .= ".csv";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Csv_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      if ($this->Label_CSV == "S")
      { 
          $this->NM_prim_col  = 0;
          $this->csv_registro = "";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['field_order'] as $Cada_col)
          { 
              $SC_Label = (isset($this->New_label['tipo_doc'])) ? $this->New_label['tipo_doc'] : "TIPO"; 
              if ($Cada_col == "tipo_doc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "PJ"; 
              if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Número"; 
              if ($Cada_col == "numfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
              if ($Cada_col == "idcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
              if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
              if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
              if ($Cada_col == "pagada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
              if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Crédito"; 
              if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "imprimir"; 
              if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['imprmirtirilla'])) ? $this->New_label['imprmirtirilla'] : "POS"; 
              if ($Cada_col == "imprmirtirilla" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
              if ($Cada_col == "idfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
              if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
              if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Tot. Imp."; 
              if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
              if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
              if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
              if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
              if ($Cada_col == "adicional2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
              if ($Cada_col == "adicional3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
              if ($Cada_col == "vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['pedido'])) ? $this->New_label['pedido'] : "Pedido"; 
              if ($Cada_col == "pedido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base IVA 19"; 
              if ($Cada_col == "base_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "Valor IVA 19"; 
              if ($Cada_col == "valor_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base IVA 5"; 
              if ($Cada_col == "base_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "Valor IVA 5"; 
              if ($Cada_col == "valor_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Excento"; 
              if ($Cada_col == "excento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['base_con_8'])) ? $this->New_label['base_con_8'] : "Base ICON. 8"; 
              if ($Cada_col == "base_con_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valor_con_8'])) ? $this->New_label['valor_con_8'] : "Valor ICON. 8"; 
              if ($Cada_col == "valor_con_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['t_iva'])) ? $this->New_label['t_iva'] : "T. IVA"; 
              if ($Cada_col == "t_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['imp_bolsa'])) ? $this->New_label['imp_bolsa'] : "Imp. Bolsa"; 
              if ($Cada_col == "imp_bolsa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['print'])) ? $this->New_label['print'] : "print"; 
              if ($Cada_col == "print" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
          } 
          $this->csv_registro .= $this->Delim_line;
          fwrite($csv_f, $this->csv_registro);
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), total, pagada, asentada, credito, idfacven, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, fechaven, total, pagada, asentada, credito, idfacven, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, convert(char(23),fechaven,121), total, pagada, asentada, credito, idfacven, convert(char(23),fechavenc,121), subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, fechaven, total, pagada, asentada, credito, idfacven, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, EXTEND(fechaven, YEAR TO DAY), total, pagada, asentada, credito, idfacven, EXTEND(fechavenc, YEAR TO DAY), subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT resolucion, numfacven, idcli, fechaven, total, pagada, asentada, credito, idfacven, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, base_con_8, valor_con_8, t_iva, imp_bolsa, tipo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     if(tipo='NC',subtotal*-1,subtotal) as subtotal,     if(tipo='NC',valoriva*-1,valoriva) as valoriva,     if(tipo='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     if(tipo='NC',saldo*-1,saldo) as saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as base_iva_19,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) *-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0)) as valor_iva_19,     if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as base_iva_5,     if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0)) as valor_iva_5,    if(tipo='NC',(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0)))*-1,(coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) - (coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) ) as excento,    tipo, if(tipo='NC',coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as base_con_8, if(tipo='NC',coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)*-1,coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0)) as valor_con_8, if(tipo='NC',(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )*-1,(valoriva - coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='8'),0) )) as t_iva, if(tipo='NC',(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))*-1,(coalesce((select sum(v.valorpar) from detalleventa v where v.numfac=idfacven and v.adicional='0' and (select tipo_producto from productos where idprod=v.idpro) = 'IM'),0))) as imp_bolsa FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['order_grid'];
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
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->resolucion = $rs->fields[0] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->numfacven = $rs->fields[1] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->idcli = $rs->fields[2] ;  
         $this->idcli = (string)$this->idcli;
         $this->fechaven = $rs->fields[3] ;  
         $this->total = $rs->fields[4] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->pagada = $rs->fields[5] ;  
         $this->asentada = $rs->fields[6] ;  
         $this->asentada = (string)$this->asentada;
         $this->credito = $rs->fields[7] ;  
         $this->credito = (string)$this->credito;
         $this->idfacven = $rs->fields[8] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->fechavenc = $rs->fields[9] ;  
         $this->subtotal = $rs->fields[10] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[11] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
         $this->observaciones = $rs->fields[12] ;  
         $this->saldo = $rs->fields[13] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[14] ;  
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[15] ;  
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[16] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->vendedor = $rs->fields[17] ;  
         $this->vendedor = (string)$this->vendedor;
         $this->pedido = $rs->fields[18] ;  
         $this->pedido = (string)$this->pedido;
         $this->base_iva_19 = $rs->fields[19] ;  
         $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
         $this->base_iva_19 = (string)$this->base_iva_19;
         $this->valor_iva_19 = $rs->fields[20] ;  
         $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
         $this->valor_iva_19 = (string)$this->valor_iva_19;
         $this->base_iva_5 = $rs->fields[21] ;  
         $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
         $this->base_iva_5 = (string)$this->base_iva_5;
         $this->valor_iva_5 = $rs->fields[22] ;  
         $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
         $this->valor_iva_5 = (string)$this->valor_iva_5;
         $this->excento = $rs->fields[23] ;  
         $this->excento =  str_replace(",", ".", $this->excento);
         $this->excento = (string)$this->excento;
         $this->base_con_8 = $rs->fields[24] ;  
         $this->base_con_8 =  str_replace(",", ".", $this->base_con_8);
         $this->base_con_8 = (string)$this->base_con_8;
         $this->valor_con_8 = $rs->fields[25] ;  
         $this->valor_con_8 =  str_replace(",", ".", $this->valor_con_8);
         $this->valor_con_8 = (string)$this->valor_con_8;
         $this->t_iva = $rs->fields[26] ;  
         $this->t_iva =  str_replace(",", ".", $this->t_iva);
         $this->t_iva = (string)$this->t_iva;
         $this->imp_bolsa = $rs->fields[27] ;  
         $this->imp_bolsa =  str_replace(",", ".", $this->imp_bolsa);
         $this->imp_bolsa = (string)$this->imp_bolsa;
         $this->tipo = $rs->fields[28] ;  
         $this->Orig_resolucion = $this->resolucion;
         $this->Orig_numfacven = $this->numfacven;
         $this->Orig_idcli = $this->idcli;
         $this->Orig_fechaven = $this->fechaven;
         $this->Orig_total = $this->total;
         $this->Orig_pagada = $this->pagada;
         $this->Orig_asentada = $this->asentada;
         $this->Orig_credito = $this->credito;
         $this->Orig_idfacven = $this->idfacven;
         $this->Orig_fechavenc = $this->fechavenc;
         $this->Orig_subtotal = $this->subtotal;
         $this->Orig_valoriva = $this->valoriva;
         $this->Orig_observaciones = $this->observaciones;
         $this->Orig_saldo = $this->saldo;
         $this->Orig_adicional = $this->adicional;
         $this->Orig_adicional2 = $this->adicional2;
         $this->Orig_adicional3 = $this->adicional3;
         $this->Orig_vendedor = $this->vendedor;
         $this->Orig_pedido = $this->pedido;
         $this->Orig_base_iva_19 = $this->base_iva_19;
         $this->Orig_valor_iva_19 = $this->valor_iva_19;
         $this->Orig_base_iva_5 = $this->base_iva_5;
         $this->Orig_valor_iva_5 = $this->valor_iva_5;
         $this->Orig_excento = $this->excento;
         $this->Orig_base_con_8 = $this->base_con_8;
         $this->Orig_valor_con_8 = $this->valor_con_8;
         $this->Orig_t_iva = $this->t_iva;
         $this->Orig_imp_bolsa = $this->imp_bolsa;
         $this->Orig_tipo = $this->tipo;
         //----- lookup - resolucion
         $this->look_resolucion = $this->resolucion; 
         $this->Lookup->lookup_resolucion($this->look_resolucion, $this->resolucion) ; 
         $this->look_resolucion = ($this->look_resolucion == "&nbsp;") ? "" : $this->look_resolucion; 
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         //----- lookup - asentada
         $this->look_asentada = $this->asentada; 
         $this->Lookup->lookup_asentada($this->look_asentada); 
         $this->look_asentada = ($this->look_asentada == "&nbsp;") ? "" : $this->look_asentada; 
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - vendedor
         $this->look_vendedor = $this->vendedor; 
         $this->Lookup->lookup_vendedor($this->look_vendedor, $this->vendedor) ; 
         $this->look_vendedor = ($this->look_vendedor == "&nbsp;") ? "" : $this->look_vendedor; 
         $this->sc_proc_grid = true; 
         //----- lookup - tipo_doc
         $this->Lookup->lookup_tipo_doc($this->tipo_doc, $this->idfacven, $this->array_tipo_doc); 
         $this->tipo_doc = str_replace("<br>", " ", $this->tipo_doc); 
         $this->tipo_doc = ($this->tipo_doc == "&nbsp;") ? "" : $this->tipo_doc; 
         $_SESSION['scriptcase']['grid_facturaven_170522']['contr_erro'] = 'on';
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
 
$vnfe   = "";
$vpj_fe = "";

 
      $nm_select = "select concat(r.prefijo,f.numfacven),r.prefijo_fe from facturaven f inner join resdian r on f.resolucion=r.Idres where idfacven='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNPJ = array();
      $this->vnpj = array();
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
                        $this->vNPJ[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnpj[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNPJ = false;
          $this->vNPJ_erro = $this->Db->ErrorMsg();
          $this->vnpj = false;
          $this->vnpj_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vnpj[0][0]))
{
	$vnfe   = $this->vnpj[0][0];
	$vpj_fe = $this->vnpj[0][1];
	
	if($vpj_fe=="SI")
	{
		$this->estadofe  = "<img src='../_lib/img/scriptcase__NM__ico__NM__selection_replace_32.png' onclick='fEstadoFE(\"".$vnfe."\");' />";
		$this->enviarfe  = "<img src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' onclick='fEnviarFE(\"".$this->idfacven ."\");' />";
		
		$this->pdf  = "<button onclick='fPDFFactura(\"".$vnfe."\");return false;'>PDF</button>";
		
		$file = "../blank_generar_pdf_fe/".$vnfe.".pdf";

		if (file_exists($file))
		{
			$this->pdf  = "<a href='".$file."' target='_blank' >PDF</a>";
		}

	}	
	else
	{
		$this->pdf  = "";
		$this->estadofe  = "";
		$this->enviarfe  = "";
	}
}
else
{
	$this->pdf    = "";
	$vnfe   = "";
	$vpj_fe = "";
	$this->estadofe  = "";
	$this->enviarfe  = "";
}
	
$sql = "select asentada from facturaven where numfacven='".$this->numfacven ."'";

 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiAsentada = array();
      $this->vsiasentada = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiAsentada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiasentada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiAsentada = false;
          $this->vSiAsentada_erro = $this->Db->ErrorMsg();
          $this->vsiasentada = false;
          $this->vsiasentada_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsiasentada[0][0])){
	
	if($this->vsiasentada[0][0]==1){
	
		$this->print ="<a href='../pdfreport_facturaven' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
	
		$this->sc_temp_par_numfacventa = $this->numfacven ;
		
	}else{
		
		$this->print ="<img onclick='alert(\"No se puede imprimir una factura sin asentar!\")' src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' />";
	}
	
}
if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->pagada =="SI")
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->pagada =="SI" and $this->asentada ==1)
{
	
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

	
	$this->imprmirtirilla  = "<a href='../frm_pos_impresion_html/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__icon-recibo-32.png' /></a>";
	
}
else
{
	$this->imprmirtirilla  ="";
	
}

$vIdFac='';
 
      $nm_select = "select estado, tipo, id_fact from facturaven where idfacven='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_est = array();
     if ($this->idfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->d_est[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_est = false;
          $this->d_est_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if($this->d_est[0][0]=='200' or $this->d_est[0][0]=='201')
	{
	$this->NM_field_style["tipo_doc"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
	}
else
	{
	$this->NM_field_style["tipo_doc"] = "background-color:#f6571f;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
	}

if($this->d_est[0][1]=='ND' or $this->d_est[0][1]=='NC')
	{
	$vIdFac=$this->d_est[0][2];
	 
      $nm_select = "select prefijo, (select numfacven from facturaven where idfacven=$vIdFac) as numero_fac from resdian where Idres=(select resolucion from facturaven where idfacven=$vIdFac)"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_resd = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->d_resd[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_resd = false;
          $this->d_resd_erro = $this->Db->ErrorMsg();
      } 
;
	
	$this->tipo_doc =$this->tipo_doc .' '.$this->d_resd[0][0].' - '.$this->d_resd[0][1];
	}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['grid_facturaven_170522']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);
      if ($this->Tem_csv_res)
      { 
          if (!$this->Ini->sc_export_ajax) {
              $this->PB_dif = intval ($this->PB_dif / 2);
              $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
              $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
              $this->pb->addSteps($this->PB_dif);
          }
          require_once($this->Ini->path_aplicacao . "grid_facturaven_170522_res_csv.class.php");
          $this->Res = new grid_facturaven_170522_res_csv();
          $this->prep_modulos("Res");
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_res_grid'] = true;
          $this->Res->monta_csv();
      } 
      if (!$this->Ini->sc_export_ajax) {
          $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->addSteps($this->PB_dif);
      }
      if ($this->Csv_password != "" || $this->Tem_csv_res)
      { 
          $str_zip    = "";
          $Parm_pass  = ($this->Csv_password != "") ? " -p" : "";
          $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input  = (FALSE !== strpos($this->Csv_f, ' ')) ? " \"" . $this->Csv_f . "\"" :  $this->Csv_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
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
                $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
              $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
          if ($this->Tem_csv_res)
          { 
              $str_zip    = "";
              $Arq_res    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_res_file'];
              $Arq_input  = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_res_file']);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- tipo_doc
   function NM_export_tipo_doc()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->tipo_doc);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- resolucion
   function NM_export_resolucion()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_resolucion);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- numfacven
   function NM_export_numfacven()
   {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->numfacven);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- idcli
   function NM_export_idcli()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_idcli);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- fechaven
   function NM_export_fechaven()
   {
             $conteudo_x =  $this->fechaven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaven, "YYYY-MM-DD  ");
                 $this->fechaven = $this->nm_data->FormataSaida("d/m/y");
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->fechaven);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, ".", ",", "0", "S", "2", "$", "V:3:10", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->total);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- pagada
   function NM_export_pagada()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->pagada);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asentada
   function NM_export_asentada()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_asentada);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- credito
   function NM_export_credito()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_credito);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- imprimir
   function NM_export_imprimir()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->imprimir);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- imprmirtirilla
   function NM_export_imprmirtirilla()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->imprmirtirilla);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- idfacven
   function NM_export_idfacven()
   {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->idfacven);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida("m/d/y");
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->fechavenc);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->subtotal);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valoriva);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtolower($this->observaciones); 
                 $this->observaciones = ucfirst($this->observaciones); 
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->observaciones);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->saldo);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->adicional);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- adicional2
   function NM_export_adicional2()
   {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->adicional2);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- adicional3
   function NM_export_adicional3()
   {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->adicional3);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- vendedor
   function NM_export_vendedor()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_vendedor);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- pedido
   function NM_export_pedido()
   {
             nmgp_Form_Num_Val($this->pedido, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->pedido);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->base_iva_19);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valor_iva_19);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->base_iva_5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valor_iva_5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->excento);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- base_con_8
   function NM_export_base_con_8()
   {
             nmgp_Form_Num_Val($this->base_con_8, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->base_con_8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valor_con_8
   function NM_export_valor_con_8()
   {
             nmgp_Form_Num_Val($this->valor_con_8, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valor_con_8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- t_iva
   function NM_export_t_iva()
   {
             nmgp_Form_Num_Val($this->t_iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->t_iva);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- imp_bolsa
   function NM_export_imp_bolsa()
   {
             nmgp_Form_Num_Val($this->imp_bolsa, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->imp_bolsa);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- print
   function NM_export_print()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->print);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Facturas de Venta :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
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
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fdown" method="get" action="grid_facturaven_170522_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_facturaven_170522"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_170522']['csv_return']); ?>"> 
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
