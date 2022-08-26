<?php

class grid_caja_280521_rtf
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
                   nm_limpa_str_grid_caja_280521($cadapar[1]);
                   nm_protect_num_grid_caja_280521($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_caja_280521']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_grid_caja_280521($_SESSION["empresa"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_caja_280521_total.class.php"); 
      $this->Tot      = new grid_caja_280521_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "prefijo")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "banco")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "documento")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "detallle")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_caja_280521']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_caja_280521";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_caja_280521.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_caja_280521']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_caja_280521']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_caja_280521']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['doc'])) ? $this->New_label['doc'] : "Número"; 
          if ($Cada_col == "doc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nota'])) ? $this->New_label['nota'] : "Nota"; 
          if ($Cada_col == "nota" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['doc_pagado'])) ? $this->New_label['doc_pagado'] : "Doc Pagado"; 
          if ($Cada_col == "doc_pagado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_tercero'])) ? $this->New_label['id_tercero'] : "Tercero"; 
          if ($Cada_col == "id_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Valor"; 
          if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['banco'])) ? $this->New_label['banco'] : "Banco"; 
          if ($Cada_col == "banco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['idcaja'])) ? $this->New_label['idcaja'] : "Idcaja"; 
          if ($Cada_col == "idcaja" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jornada'])) ? $this->New_label['jornada'] : "Jornada"; 
          if ($Cada_col == "jornada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "Detalle"; 
          if ($Cada_col == "detalle" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Número"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cierredia'])) ? $this->New_label['cierredia'] : "Cierredia"; 
          if ($Cada_col == "cierredia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['totaldia'])) ? $this->New_label['totaldia'] : "Totaldia"; 
          if ($Cada_col == "totaldia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['arqueo'])) ? $this->New_label['arqueo'] : "Arqueo"; 
          if ($Cada_col == "arqueo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "PJ"; 
          if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idrc'])) ? $this->New_label['idrc'] : "RC"; 
          if ($Cada_col == "idrc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idrp'])) ? $this->New_label['idrp'] : "CE"; 
          if ($Cada_col == "idrp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ie'])) ? $this->New_label['ie'] : "Ie"; 
          if ($Cada_col == "ie" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creado_inicio'])) ? $this->New_label['creado_inicio'] : "Creado Inicio"; 
          if ($Cada_col == "creado_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creado_fin'])) ? $this->New_label['creado_fin'] : "Creado Fin"; 
          if ($Cada_col == "creado_fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Tercero"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['order_grid'];
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
   $_SESSION['scriptcase']['grid_caja_280521']['contr_erro'] = 'on';
 ?>
<script>
	console.log("<?php echo "Filtro por defecto: ".$this->sc_where_orig ; ?>");
	console.log("<?php echo "Filtro por busqueda: ".$this->sc_where_atual ; ?>");
</script>
<?php

$_SESSION['scriptcase']['grid_caja_280521']['contr_erro'] = 'off';
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- fecha
   function NM_export_fecha()
   {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
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
   //----- doc
   function NM_export_doc()
   {
         $this->doc = html_entity_decode($this->doc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc = strip_tags($this->doc);
         $this->doc = NM_charset_to_utf8($this->doc);
         $this->doc = str_replace('<', '&lt;', $this->doc);
         $this->doc = str_replace('>', '&gt;', $this->doc);
         $this->Texto_tag .= "<td>" . $this->doc . "</td>\r\n";
   }
   //----- nota
   function NM_export_nota()
   {
         $this->nota = html_entity_decode($this->nota, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nota = strip_tags($this->nota);
         $this->nota = NM_charset_to_utf8($this->nota);
         $this->nota = str_replace('<', '&lt;', $this->nota);
         $this->nota = str_replace('>', '&gt;', $this->nota);
         $this->Texto_tag .= "<td>" . $this->nota . "</td>\r\n";
   }
   //----- doc_pagado
   function NM_export_doc_pagado()
   {
         $this->doc_pagado = html_entity_decode($this->doc_pagado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc_pagado = strip_tags($this->doc_pagado);
         $this->doc_pagado = NM_charset_to_utf8($this->doc_pagado);
         $this->doc_pagado = str_replace('<', '&lt;', $this->doc_pagado);
         $this->doc_pagado = str_replace('>', '&gt;', $this->doc_pagado);
         $this->Texto_tag .= "<td>" . $this->doc_pagado . "</td>\r\n";
   }
   //----- id_tercero
   function NM_export_id_tercero()
   {
         $this->look_id_tercero = html_entity_decode($this->look_id_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_id_tercero = strip_tags($this->look_id_tercero);
         $this->look_id_tercero = NM_charset_to_utf8($this->look_id_tercero);
         $this->look_id_tercero = str_replace('<', '&lt;', $this->look_id_tercero);
         $this->look_id_tercero = str_replace('>', '&gt;', $this->look_id_tercero);
         $this->Texto_tag .= "<td>" . $this->look_id_tercero . "</td>\r\n";
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, ",", ".", "2", "S", "2", "$", "V:3:12", "-"); 
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         $this->cantidad = str_replace('<', '&lt;', $this->cantidad);
         $this->cantidad = str_replace('>', '&gt;', $this->cantidad);
         $this->Texto_tag .= "<td>" . $this->cantidad . "</td>\r\n";
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
                 $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
             } 
         $this->creado = NM_charset_to_utf8($this->creado);
         $this->creado = str_replace('<', '&lt;', $this->creado);
         $this->creado = str_replace('>', '&gt;', $this->creado);
         $this->Texto_tag .= "<td>" . $this->creado . "</td>\r\n";
   }
   //----- idcaja
   function NM_export_idcaja()
   {
             nmgp_Form_Num_Val($this->idcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idcaja = NM_charset_to_utf8($this->idcaja);
         $this->idcaja = str_replace('<', '&lt;', $this->idcaja);
         $this->idcaja = str_replace('>', '&gt;', $this->idcaja);
         $this->Texto_tag .= "<td>" . $this->idcaja . "</td>\r\n";
   }
   //----- jornada
   function NM_export_jornada()
   {
         $this->jornada = html_entity_decode($this->jornada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jornada = strip_tags($this->jornada);
         $this->jornada = NM_charset_to_utf8($this->jornada);
         $this->jornada = str_replace('<', '&lt;', $this->jornada);
         $this->jornada = str_replace('>', '&gt;', $this->jornada);
         $this->Texto_tag .= "<td>" . $this->jornada . "</td>\r\n";
   }
   //----- detalle
   function NM_export_detalle()
   {
         $this->detalle = html_entity_decode($this->detalle, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle = strip_tags($this->detalle);
         $this->detalle = NM_charset_to_utf8($this->detalle);
         $this->detalle = str_replace('<', '&lt;', $this->detalle);
         $this->detalle = str_replace('>', '&gt;', $this->detalle);
         $this->Texto_tag .= "<td>" . $this->detalle . "</td>\r\n";
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         $this->documento = NM_charset_to_utf8($this->documento);
         $this->documento = str_replace('<', '&lt;', $this->documento);
         $this->documento = str_replace('>', '&gt;', $this->documento);
         $this->Texto_tag .= "<td>" . $this->documento . "</td>\r\n";
   }
   //----- cierredia
   function NM_export_cierredia()
   {
         $this->cierredia = html_entity_decode($this->cierredia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cierredia = strip_tags($this->cierredia);
         $this->cierredia = NM_charset_to_utf8($this->cierredia);
         $this->cierredia = str_replace('<', '&lt;', $this->cierredia);
         $this->cierredia = str_replace('>', '&gt;', $this->cierredia);
         $this->Texto_tag .= "<td>" . $this->cierredia . "</td>\r\n";
   }
   //----- totaldia
   function NM_export_totaldia()
   {
             nmgp_Form_Num_Val($this->totaldia, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->totaldia = NM_charset_to_utf8($this->totaldia);
         $this->totaldia = str_replace('<', '&lt;', $this->totaldia);
         $this->totaldia = str_replace('>', '&gt;', $this->totaldia);
         $this->Texto_tag .= "<td>" . $this->totaldia . "</td>\r\n";
   }
   //----- arqueo
   function NM_export_arqueo()
   {
             nmgp_Form_Num_Val($this->arqueo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->arqueo = NM_charset_to_utf8($this->arqueo);
         $this->arqueo = str_replace('<', '&lt;', $this->arqueo);
         $this->arqueo = str_replace('>', '&gt;', $this->arqueo);
         $this->Texto_tag .= "<td>" . $this->arqueo . "</td>\r\n";
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
   //----- resolucion
   function NM_export_resolucion()
   {
         nmgp_Form_Num_Val($this->look_resolucion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_resolucion = NM_charset_to_utf8($this->look_resolucion);
         $this->look_resolucion = str_replace('<', '&lt;', $this->look_resolucion);
         $this->look_resolucion = str_replace('>', '&gt;', $this->look_resolucion);
         $this->Texto_tag .= "<td>" . $this->look_resolucion . "</td>\r\n";
   }
   //----- idrc
   function NM_export_idrc()
   {
         nmgp_Form_Num_Val($this->look_idrc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idrc = NM_charset_to_utf8($this->look_idrc);
         $this->look_idrc = str_replace('<', '&lt;', $this->look_idrc);
         $this->look_idrc = str_replace('>', '&gt;', $this->look_idrc);
         $this->Texto_tag .= "<td>" . $this->look_idrc . "</td>\r\n";
   }
   //----- idrp
   function NM_export_idrp()
   {
         nmgp_Form_Num_Val($this->look_idrp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idrp = NM_charset_to_utf8($this->look_idrp);
         $this->look_idrp = str_replace('<', '&lt;', $this->look_idrp);
         $this->look_idrp = str_replace('>', '&gt;', $this->look_idrp);
         $this->Texto_tag .= "<td>" . $this->look_idrp . "</td>\r\n";
   }
   //----- ie
   function NM_export_ie()
   {
         $this->ie = html_entity_decode($this->ie, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ie = strip_tags($this->ie);
         $this->ie = NM_charset_to_utf8($this->ie);
         $this->ie = str_replace('<', '&lt;', $this->ie);
         $this->ie = str_replace('>', '&gt;', $this->ie);
         $this->Texto_tag .= "<td>" . $this->ie . "</td>\r\n";
   }
   //----- creado_inicio
   function NM_export_creado_inicio()
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
         $this->creado_inicio = NM_charset_to_utf8($this->creado_inicio);
         $this->creado_inicio = str_replace('<', '&lt;', $this->creado_inicio);
         $this->creado_inicio = str_replace('>', '&gt;', $this->creado_inicio);
         $this->Texto_tag .= "<td>" . $this->creado_inicio . "</td>\r\n";
   }
   //----- creado_fin
   function NM_export_creado_fin()
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
         $this->creado_fin = NM_charset_to_utf8($this->creado_fin);
         $this->creado_fin = str_replace('<', '&lt;', $this->creado_fin);
         $this->creado_fin = str_replace('>', '&gt;', $this->creado_fin);
         $this->Texto_tag .= "<td>" . $this->creado_fin . "</td>\r\n";
   }
   //----- cliente
   function NM_export_cliente()
   {
         nmgp_Form_Num_Val($this->look_cliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_cliente = NM_charset_to_utf8($this->look_cliente);
         $this->look_cliente = str_replace('<', '&lt;', $this->look_cliente);
         $this->look_cliente = str_replace('>', '&gt;', $this->look_cliente);
         $this->Texto_tag .= "<td>" . $this->look_cliente . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Movimiento de caja :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_caja_280521_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_caja_280521"> 
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
