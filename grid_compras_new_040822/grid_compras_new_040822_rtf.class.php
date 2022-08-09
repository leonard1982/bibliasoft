<?php

class grid_compras_new_040822_rtf
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
                   nm_limpa_str_grid_compras_new_040822($cadapar[1]);
                   nm_protect_num_grid_compras_new_040822($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_compras_new_040822']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_compras_new_040822_total.class.php"); 
      $this->Tot      = new grid_compras_new_040822_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'] == "proveedor")
          {
              $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][2];
              $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][3];
              $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][4];
              $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][2];
              $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][3];
              $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][4];
              $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'] == "pagada")
          {
              $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][2];
              $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][3];
              $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][4];
              $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'] == "asentada")
          {
              $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][2];
              $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][3];
              $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][4];
              $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][4];
              $this->sum_a_pagar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][5];
              $this->sum_val_ica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][6];
              $this->sum_val_ret = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][7];
              $this->sum_val_retiva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['tot_geral'][8];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_compras_new_040822']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_compras_new_040822";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_compras_new_040822.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040822']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040822']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras_new_040822']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['campos_busca'];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tipo_com'])) ? $this->New_label['tipo_com'] : "Tipo"; 
          if ($Cada_col == "tipo_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prefijo_com'])) ? $this->New_label['prefijo_com'] : "Prefijo"; 
          if ($Cada_col == "prefijo_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero_com'])) ? $this->New_label['numero_com'] : "Consecutivo"; 
          if ($Cada_col == "numero_com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numfacom'])) ? $this->New_label['numfacom'] : "Ref. Compra"; 
          if ($Cada_col == "numfacom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['formapago'])) ? $this->New_label['formapago'] : "F.Pago"; 
          if ($Cada_col == "formapago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechacom'])) ? $this->New_label['fechacom'] : "Fecha"; 
          if ($Cada_col == "fechacom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['pagos'])) ? $this->New_label['pagos'] : "Abonos"; 
          if ($Cada_col == "pagos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idprov'])) ? $this->New_label['idprov'] : "Proveedor"; 
          if ($Cada_col == "idprov" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
          if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idfaccom'])) ? $this->New_label['idfaccom'] : "#"; 
          if ($Cada_col == "idfaccom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['id_pedidocom'])) ? $this->New_label['id_pedidocom'] : "Pedido"; 
          if ($Cada_col == "id_pedidocom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['retencion'])) ? $this->New_label['retencion'] : "Retención %"; 
          if ($Cada_col == "retencion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['reteica'])) ? $this->New_label['reteica'] : "Reteica"; 
          if ($Cada_col == "reteica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['reteiva'])) ? $this->New_label['reteiva'] : "Reteiva"; 
          if ($Cada_col == "reteiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Excento"; 
          if ($Cada_col == "excento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base Iva 19"; 
          if ($Cada_col == "base_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "Valor Iva 19"; 
          if ($Cada_col == "valor_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base Iva 5"; 
          if ($Cada_col == "base_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "Valor Iva 5"; 
          if ($Cada_col == "valor_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_con_8'])) ? $this->New_label['base_con_8'] : "Base Con 8"; 
          if ($Cada_col == "base_con_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_con_8'])) ? $this->New_label['valor_con_8'] : "Valor Con 8"; 
          if ($Cada_col == "valor_con_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_iva'])) ? $this->New_label['t_iva'] : "T Iva"; 
          if ($Cada_col == "t_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['a_pagar'])) ? $this->New_label['a_pagar'] : "Val a Pagar"; 
          if ($Cada_col == "a_pagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['devolucion'])) ? $this->New_label['devolucion'] : "Devolución"; 
          if ($Cada_col == "devolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val_ica'])) ? $this->New_label['val_ica'] : "$ ReteICA"; 
          if ($Cada_col == "val_ica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val_ret'])) ? $this->New_label['val_ret'] : "$ Retención"; 
          if ($Cada_col == "val_ret" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val_retiva'])) ? $this->New_label['val_retiva'] : "$ ReteIVA"; 
          if ($Cada_col == "val_retiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tipo_com, prefijo_com, numero_com, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, idfaccom, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta, excento, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, base_con_8, valor_con_8, t_iva from (SELECT      idfaccom,     numfacom,     fechacom,     fechavenc,     idprov,     if(tipo_com='NC',subtotal*-1,subtotal) as subtotal,     if(tipo_com='NC',valoriva*-1,valoriva) as valoriva,     if(tipo_com='NC',total*-1,total) as total,     pagada,     asentada,     observaciones,     saldo,     id_pedidocom,     formapago, retencion, reteica, reteiva, cod_cuenta, tipo_com, prefijo_com, numero_com,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='0'),0)) as excento,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as base_iva_19,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0) *-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='19'),0)) as valor_iva_19,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as base_iva_5,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='5'),0)) as valor_iva_5,  if(tipo_com='NC',coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.valorpar) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as base_con_8,  if(tipo_com='NC',coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=idfaccom and c.tasaiva='8'),0)*-1,coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0)) as valor_con_8,  if(tipo_com='NC',(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )*-1,(valoriva - coalesce((select sum(c.iva) from detallecompra c where c.idfaccom=p.idfaccom and c.tasaiva='8'),0) )) as t_iva  FROM      facturacom p ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
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
         $this->excento = $rs->fields[21] ;  
         $this->excento =  str_replace(",", ".", $this->excento);
         $this->excento = (string)$this->excento;
         $this->base_iva_19 = $rs->fields[22] ;  
         $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
         $this->base_iva_19 = (string)$this->base_iva_19;
         $this->valor_iva_19 = $rs->fields[23] ;  
         $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
         $this->valor_iva_19 = (string)$this->valor_iva_19;
         $this->base_iva_5 = $rs->fields[24] ;  
         $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
         $this->base_iva_5 = (string)$this->base_iva_5;
         $this->valor_iva_5 = $rs->fields[25] ;  
         $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
         $this->valor_iva_5 = (string)$this->valor_iva_5;
         $this->base_con_8 = $rs->fields[26] ;  
         $this->base_con_8 =  str_replace(",", ".", $this->base_con_8);
         $this->base_con_8 = (string)$this->base_con_8;
         $this->valor_con_8 = $rs->fields[27] ;  
         $this->valor_con_8 =  str_replace(",", ".", $this->valor_con_8);
         $this->valor_con_8 = (string)$this->valor_con_8;
         $this->t_iva = $rs->fields[28] ;  
         $this->t_iva =  str_replace(",", ".", $this->t_iva);
         $this->t_iva = (string)$this->t_iva;
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
         $this->Orig_excento = $this->excento;
         $this->Orig_base_iva_19 = $this->base_iva_19;
         $this->Orig_valor_iva_19 = $this->valor_iva_19;
         $this->Orig_base_iva_5 = $this->base_iva_5;
         $this->Orig_valor_iva_5 = $this->valor_iva_5;
         $this->Orig_base_con_8 = $this->base_con_8;
         $this->Orig_valor_con_8 = $this->valor_con_8;
         $this->Orig_t_iva = $this->t_iva;
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
         $_SESSION['scriptcase']['grid_compras_new_040822']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['grid_compras_new_040822']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- tipo_com
   function NM_export_tipo_com()
   {
         $this->tipo_com = html_entity_decode($this->tipo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_com = strip_tags($this->tipo_com);
         $this->tipo_com = NM_charset_to_utf8($this->tipo_com);
         $this->tipo_com = str_replace('<', '&lt;', $this->tipo_com);
         $this->tipo_com = str_replace('>', '&gt;', $this->tipo_com);
         $this->Texto_tag .= "<td>" . $this->tipo_com . "</td>\r\n";
   }
   //----- prefijo_com
   function NM_export_prefijo_com()
   {
         $this->prefijo_com = html_entity_decode($this->prefijo_com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo_com = strip_tags($this->prefijo_com);
         $this->prefijo_com = NM_charset_to_utf8($this->prefijo_com);
         $this->prefijo_com = str_replace('<', '&lt;', $this->prefijo_com);
         $this->prefijo_com = str_replace('>', '&gt;', $this->prefijo_com);
         $this->Texto_tag .= "<td>" . $this->prefijo_com . "</td>\r\n";
   }
   //----- numero_com
   function NM_export_numero_com()
   {
             nmgp_Form_Num_Val($this->numero_com, "", "", "0", "S", "2", "", "N:1", "-") ; 
         $this->numero_com = NM_charset_to_utf8($this->numero_com);
         $this->numero_com = str_replace('<', '&lt;', $this->numero_com);
         $this->numero_com = str_replace('>', '&gt;', $this->numero_com);
         $this->Texto_tag .= "<td>" . $this->numero_com . "</td>\r\n";
   }
   //----- numfacom
   function NM_export_numfacom()
   {
         $this->numfacom = html_entity_decode($this->numfacom, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numfacom = strip_tags($this->numfacom);
         $this->numfacom = NM_charset_to_utf8($this->numfacom);
         $this->numfacom = str_replace('<', '&lt;', $this->numfacom);
         $this->numfacom = str_replace('>', '&gt;', $this->numfacom);
         $this->Texto_tag .= "<td>" . $this->numfacom . "</td>\r\n";
   }
   //----- formapago
   function NM_export_formapago()
   {
         $this->formapago = html_entity_decode($this->formapago, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->formapago = strip_tags($this->formapago);
         $this->formapago = NM_charset_to_utf8($this->formapago);
         $this->formapago = str_replace('<', '&lt;', $this->formapago);
         $this->formapago = str_replace('>', '&gt;', $this->formapago);
         $this->Texto_tag .= "<td>" . $this->formapago . "</td>\r\n";
   }
   //----- fechacom
   function NM_export_fechacom()
   {
             $conteudo_x =  $this->fechacom;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
                 $this->fechacom = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechacom = NM_charset_to_utf8($this->fechacom);
         $this->fechacom = str_replace('<', '&lt;', $this->fechacom);
         $this->fechacom = str_replace('>', '&gt;', $this->fechacom);
         $this->Texto_tag .= "<td>" . $this->fechacom . "</td>\r\n";
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
   //----- pagos
   function NM_export_pagos()
   {
         $this->pagos = NM_charset_to_utf8($this->pagos);
         $this->pagos = str_replace('<', '&lt;', $this->pagos);
         $this->pagos = str_replace('>', '&gt;', $this->pagos);
         $this->Texto_tag .= "<td>" . $this->pagos . "</td>\r\n";
   }
   //----- idprov
   function NM_export_idprov()
   {
         $this->look_idprov = html_entity_decode($this->look_idprov, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idprov = strip_tags($this->look_idprov);
         $this->look_idprov = NM_charset_to_utf8($this->look_idprov);
         $this->look_idprov = str_replace('<', '&lt;', $this->look_idprov);
         $this->look_idprov = str_replace('>', '&gt;', $this->look_idprov);
         $this->Texto_tag .= "<td>" . $this->look_idprov . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- asentada
   function NM_export_asentada()
   {
         $this->look_asentada = NM_charset_to_utf8($this->look_asentada);
         $this->look_asentada = str_replace('<', '&lt;', $this->look_asentada);
         $this->look_asentada = str_replace('>', '&gt;', $this->look_asentada);
         $this->Texto_tag .= "<td>" . $this->look_asentada . "</td>\r\n";
   }
   //----- idfaccom
   function NM_export_idfaccom()
   {
             nmgp_Form_Num_Val($this->idfaccom, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idfaccom = NM_charset_to_utf8($this->idfaccom);
         $this->idfaccom = str_replace('<', '&lt;', $this->idfaccom);
         $this->idfaccom = str_replace('>', '&gt;', $this->idfaccom);
         $this->Texto_tag .= "<td>" . $this->idfaccom . "</td>\r\n";
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->subtotal = str_replace('<', '&lt;', $this->subtotal);
         $this->subtotal = str_replace('>', '&gt;', $this->subtotal);
         $this->Texto_tag .= "<td>" . $this->subtotal . "</td>\r\n";
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->valoriva = str_replace('<', '&lt;', $this->valoriva);
         $this->valoriva = str_replace('>', '&gt;', $this->valoriva);
         $this->Texto_tag .= "<td>" . $this->valoriva . "</td>\r\n";
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
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- id_pedidocom
   function NM_export_id_pedidocom()
   {
         nmgp_Form_Num_Val($this->look_id_pedidocom, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_id_pedidocom = NM_charset_to_utf8($this->look_id_pedidocom);
         $this->look_id_pedidocom = str_replace('<', '&lt;', $this->look_id_pedidocom);
         $this->look_id_pedidocom = str_replace('>', '&gt;', $this->look_id_pedidocom);
         $this->Texto_tag .= "<td>" . $this->look_id_pedidocom . "</td>\r\n";
   }
   //----- retencion
   function NM_export_retencion()
   {
             nmgp_Form_Num_Val($this->retencion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->retencion = NM_charset_to_utf8($this->retencion);
         $this->retencion = str_replace('<', '&lt;', $this->retencion);
         $this->retencion = str_replace('>', '&gt;', $this->retencion);
         $this->Texto_tag .= "<td>" . $this->retencion . "</td>\r\n";
   }
   //----- reteica
   function NM_export_reteica()
   {
             nmgp_Form_Num_Val($this->reteica, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->reteica = NM_charset_to_utf8($this->reteica);
         $this->reteica = str_replace('<', '&lt;', $this->reteica);
         $this->reteica = str_replace('>', '&gt;', $this->reteica);
         $this->Texto_tag .= "<td>" . $this->reteica . "</td>\r\n";
   }
   //----- reteiva
   function NM_export_reteiva()
   {
             nmgp_Form_Num_Val($this->reteiva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->reteiva = NM_charset_to_utf8($this->reteiva);
         $this->reteiva = str_replace('<', '&lt;', $this->reteiva);
         $this->reteiva = str_replace('>', '&gt;', $this->reteiva);
         $this->Texto_tag .= "<td>" . $this->reteiva . "</td>\r\n";
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
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->excento = NM_charset_to_utf8($this->excento);
         $this->excento = str_replace('<', '&lt;', $this->excento);
         $this->excento = str_replace('>', '&gt;', $this->excento);
         $this->Texto_tag .= "<td>" . $this->excento . "</td>\r\n";
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base_iva_19 = NM_charset_to_utf8($this->base_iva_19);
         $this->base_iva_19 = str_replace('<', '&lt;', $this->base_iva_19);
         $this->base_iva_19 = str_replace('>', '&gt;', $this->base_iva_19);
         $this->Texto_tag .= "<td>" . $this->base_iva_19 . "</td>\r\n";
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_iva_19 = NM_charset_to_utf8($this->valor_iva_19);
         $this->valor_iva_19 = str_replace('<', '&lt;', $this->valor_iva_19);
         $this->valor_iva_19 = str_replace('>', '&gt;', $this->valor_iva_19);
         $this->Texto_tag .= "<td>" . $this->valor_iva_19 . "</td>\r\n";
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base_iva_5 = NM_charset_to_utf8($this->base_iva_5);
         $this->base_iva_5 = str_replace('<', '&lt;', $this->base_iva_5);
         $this->base_iva_5 = str_replace('>', '&gt;', $this->base_iva_5);
         $this->Texto_tag .= "<td>" . $this->base_iva_5 . "</td>\r\n";
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_iva_5 = NM_charset_to_utf8($this->valor_iva_5);
         $this->valor_iva_5 = str_replace('<', '&lt;', $this->valor_iva_5);
         $this->valor_iva_5 = str_replace('>', '&gt;', $this->valor_iva_5);
         $this->Texto_tag .= "<td>" . $this->valor_iva_5 . "</td>\r\n";
   }
   //----- base_con_8
   function NM_export_base_con_8()
   {
             nmgp_Form_Num_Val($this->base_con_8, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "02", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base_con_8 = NM_charset_to_utf8($this->base_con_8);
         $this->base_con_8 = str_replace('<', '&lt;', $this->base_con_8);
         $this->base_con_8 = str_replace('>', '&gt;', $this->base_con_8);
         $this->Texto_tag .= "<td>" . $this->base_con_8 . "</td>\r\n";
   }
   //----- valor_con_8
   function NM_export_valor_con_8()
   {
             nmgp_Form_Num_Val($this->valor_con_8, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_con_8 = NM_charset_to_utf8($this->valor_con_8);
         $this->valor_con_8 = str_replace('<', '&lt;', $this->valor_con_8);
         $this->valor_con_8 = str_replace('>', '&gt;', $this->valor_con_8);
         $this->Texto_tag .= "<td>" . $this->valor_con_8 . "</td>\r\n";
   }
   //----- t_iva
   function NM_export_t_iva()
   {
             nmgp_Form_Num_Val($this->t_iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->t_iva = NM_charset_to_utf8($this->t_iva);
         $this->t_iva = str_replace('<', '&lt;', $this->t_iva);
         $this->t_iva = str_replace('>', '&gt;', $this->t_iva);
         $this->Texto_tag .= "<td>" . $this->t_iva . "</td>\r\n";
   }
   //----- a_pagar
   function NM_export_a_pagar()
   {
             nmgp_Form_Num_Val($this->a_pagar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->a_pagar = NM_charset_to_utf8($this->a_pagar);
         $this->a_pagar = str_replace('<', '&lt;', $this->a_pagar);
         $this->a_pagar = str_replace('>', '&gt;', $this->a_pagar);
         $this->Texto_tag .= "<td>" . $this->a_pagar . "</td>\r\n";
   }
   //----- devolucion
   function NM_export_devolucion()
   {
         $this->devolucion = NM_charset_to_utf8($this->devolucion);
         $this->devolucion = str_replace('<', '&lt;', $this->devolucion);
         $this->devolucion = str_replace('>', '&gt;', $this->devolucion);
         $this->Texto_tag .= "<td>" . $this->devolucion . "</td>\r\n";
   }
   //----- val_ica
   function NM_export_val_ica()
   {
             nmgp_Form_Num_Val($this->val_ica, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->val_ica = NM_charset_to_utf8($this->val_ica);
         $this->val_ica = str_replace('<', '&lt;', $this->val_ica);
         $this->val_ica = str_replace('>', '&gt;', $this->val_ica);
         $this->Texto_tag .= "<td>" . $this->val_ica . "</td>\r\n";
   }
   //----- val_ret
   function NM_export_val_ret()
   {
             nmgp_Form_Num_Val($this->val_ret, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->val_ret = NM_charset_to_utf8($this->val_ret);
         $this->val_ret = str_replace('<', '&lt;', $this->val_ret);
         $this->val_ret = str_replace('>', '&gt;', $this->val_ret);
         $this->Texto_tag .= "<td>" . $this->val_ret . "</td>\r\n";
   }
   //----- val_retiva
   function NM_export_val_retiva()
   {
             nmgp_Form_Num_Val($this->val_retiva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->val_retiva = NM_charset_to_utf8($this->val_retiva);
         $this->val_retiva = str_replace('<', '&lt;', $this->val_retiva);
         $this->val_retiva = str_replace('>', '&gt;', $this->val_retiva);
         $this->Texto_tag .= "<td>" . $this->val_retiva . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras_new_040822'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>DOCUMENTOS COMPRAS :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_compras_new_040822_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_compras_new_040822"> 
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
}

?>
