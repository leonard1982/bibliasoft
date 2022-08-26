<?php

class grid_inventario_rtf
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
                   nm_limpa_str_grid_inventario($cadapar[1]);
                   nm_protect_num_grid_inventario($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_inventario']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_inventario_total.class.php"); 
      $this->Tot      = new grid_inventario_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "ubicacion")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "producto")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "grupofamilia")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2];
              $this->sum_valorparcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_inventario']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_inventario";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_inventario.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; 
          if ($Cada_col == "escombo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idpro'])) ? $this->New_label['idpro'] : "Producto"; 
          if ($Cada_col == "idpro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcombo'])) ? $this->New_label['idcombo'] : "De"; 
          if ($Cada_col == "idcombo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
          if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valorparcial'])) ? $this->New_label['valorparcial'] : "V/Parcial"; 
          if ($Cada_col == "valorparcial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['costo'])) ? $this->New_label['costo'] : "Costo/U."; 
          if ($Cada_col == "costo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idbod'])) ? $this->New_label['idbod'] : "Ubicación"; 
          if ($Cada_col == "idbod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "Detalle"; 
          if ($Cada_col == "detalle" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inicio'])) ? $this->New_label['inicio'] : "Creado"; 
          if ($Cada_col == "inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha Doc"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idmov'])) ? $this->New_label['idmov'] : "Idmov"; 
          if ($Cada_col == "idmov" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nufacvta'])) ? $this->New_label['nufacvta'] : "Factura"; 
          if ($Cada_col == "nufacvta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['colores'])) ? $this->New_label['colores'] : "Color"; 
          if ($Cada_col == "colores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tallas'])) ? $this->New_label['tallas'] : "Talla"; 
          if ($Cada_col == "tallas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sabor'])) ? $this->New_label['sabor'] : "Sabor"; 
          if ($Cada_col == "sabor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grupo'])) ? $this->New_label['grupo'] : "Grupo"; 
          if ($Cada_col == "grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idped'])) ? $this->New_label['idped'] : "Pedido"; 
          if ($Cada_col == "idped" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['lote2'])) ? $this->New_label['lote2'] : "Lote"; 
          if ($Cada_col == "lote2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarifa'])) ? $this->New_label['tarifa'] : "Tarifa Imp"; 
          if ($Cada_col == "tarifa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base'])) ? $this->New_label['base'] : "Base"; 
          if ($Cada_col == "base" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['utilidad'])) ? $this->New_label['utilidad'] : "Utilidad (Ul.Cos.)"; 
          if ($Cada_col == "utilidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, inicio, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), idmov, nufacvta, colores, tallas, sabor, grupo, idped, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, inicio, fecha, idmov, nufacvta, colores, tallas, sabor, grupo, idped, fechavenc, lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, inicio, convert(char(23),fecha,121), idmov, nufacvta, colores, tallas, sabor, grupo, idped, convert(char(23),fechavenc,121), lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, TO_DATE(TO_CHAR(inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), fecha, idmov, nufacvta, colores, tallas, sabor, grupo, idped, fechavenc, lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, inicio, EXTEND(fecha, YEAR TO DAY), idmov, nufacvta, colores, tallas, sabor, grupo, idped, EXTEND(fechavenc, YEAR TO DAY), lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT escombo, idpro, idcombo, cantidad, valorparcial, costo, idbod, tipo, detalle, inicio, fecha, idmov, nufacvta, colores, tallas, sabor, grupo, idped, fechavenc, lote2, tarifa, base, utilidad, idinv from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['order_grid'];
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
         $this->escombo = $rs->fields[0] ;  
         $this->idpro = $rs->fields[1] ;  
         $this->idpro = (string)$this->idpro;
         $this->idcombo = $rs->fields[2] ;  
         $this->idcombo = (string)$this->idcombo;
         $this->cantidad = $rs->fields[3] ;  
         $this->cantidad =  str_replace(",", ".", $this->cantidad);
         $this->cantidad = (string)$this->cantidad;
         $this->valorparcial = $rs->fields[4] ;  
         $this->valorparcial =  str_replace(",", ".", $this->valorparcial);
         $this->valorparcial = (string)$this->valorparcial;
         $this->costo = $rs->fields[5] ;  
         $this->costo =  str_replace(",", ".", $this->costo);
         $this->costo = (string)$this->costo;
         $this->idbod = $rs->fields[6] ;  
         $this->idbod = (string)$this->idbod;
         $this->tipo = $rs->fields[7] ;  
         $this->tipo = (string)$this->tipo;
         $this->detalle = $rs->fields[8] ;  
         $this->inicio = $rs->fields[9] ;  
         $this->fecha = $rs->fields[10] ;  
         $this->idmov = $rs->fields[11] ;  
         $this->idmov = (string)$this->idmov;
         $this->nufacvta = $rs->fields[12] ;  
         $this->nufacvta = (string)$this->nufacvta;
         $this->colores = $rs->fields[13] ;  
         $this->colores = (string)$this->colores;
         $this->tallas = $rs->fields[14] ;  
         $this->tallas = (string)$this->tallas;
         $this->sabor = $rs->fields[15] ;  
         $this->sabor = (string)$this->sabor;
         $this->grupo = $rs->fields[16] ;  
         $this->grupo = (string)$this->grupo;
         $this->idped = $rs->fields[17] ;  
         $this->idped = (string)$this->idped;
         $this->fechavenc = $rs->fields[18] ;  
         $this->lote2 = $rs->fields[19] ;  
         $this->tarifa = $rs->fields[20] ;  
         $this->tarifa = (string)$this->tarifa;
         $this->base = $rs->fields[21] ;  
         $this->base =  str_replace(",", ".", $this->base);
         $this->base = (string)$this->base;
         $this->utilidad = $rs->fields[22] ;  
         $this->utilidad =  str_replace(",", ".", $this->utilidad);
         $this->utilidad = (string)$this->utilidad;
         $this->idinv = $rs->fields[23] ;  
         $this->idinv = (string)$this->idinv;
         //----- lookup - idpro
         $this->look_idpro = $this->idpro; 
         $this->Lookup->lookup_idpro($this->look_idpro, $this->idpro) ; 
         $this->look_idpro = ($this->look_idpro == "&nbsp;") ? "" : $this->look_idpro; 
         //----- lookup - idcombo
         $this->look_idcombo = $this->idcombo; 
         $this->Lookup->lookup_idcombo($this->look_idcombo, $this->idcombo) ; 
         $this->look_idcombo = ($this->look_idcombo == "&nbsp;") ? "" : $this->look_idcombo; 
         //----- lookup - idbod
         $this->look_idbod = $this->idbod; 
         $this->Lookup->lookup_idbod($this->look_idbod, $this->idbod) ; 
         $this->look_idbod = ($this->look_idbod == "&nbsp;") ? "" : $this->look_idbod; 
         //----- lookup - tipo
         $this->look_tipo = $this->tipo; 
         $this->Lookup->lookup_tipo($this->look_tipo); 
         $this->look_tipo = ($this->look_tipo == "&nbsp;") ? "" : $this->look_tipo; 
         //----- lookup - colores
         $this->look_colores = $this->colores; 
         $this->Lookup->lookup_colores($this->look_colores, $this->colores) ; 
         $this->look_colores = ($this->look_colores == "&nbsp;") ? "" : $this->look_colores; 
         //----- lookup - tallas
         $this->look_tallas = $this->tallas; 
         $this->Lookup->lookup_tallas($this->look_tallas, $this->tallas) ; 
         $this->look_tallas = ($this->look_tallas == "&nbsp;") ? "" : $this->look_tallas; 
         //----- lookup - sabor
         $this->look_sabor = $this->sabor; 
         $this->Lookup->lookup_sabor($this->look_sabor, $this->sabor) ; 
         $this->look_sabor = ($this->look_sabor == "&nbsp;") ? "" : $this->look_sabor; 
         //----- lookup - grupo
         $this->look_grupo = $this->grupo; 
         $this->Lookup->lookup_grupo($this->look_grupo, $this->grupo) ; 
         $this->look_grupo = ($this->look_grupo == "&nbsp;") ? "" : $this->look_grupo; 
         //----- lookup - idped
         $this->look_idped = $this->idped; 
         $this->Lookup->lookup_idped($this->look_idped, $this->idped) ; 
         $this->look_idped = ($this->look_idped == "&nbsp;") ? "" : $this->look_idped; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_inventario']['contr_erro'] = 'on';
 if($this->escombo =="SI")
{
	$this->NM_field_style["escombo"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_inventario']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- escombo
   function NM_export_escombo()
   {
         $this->escombo = html_entity_decode($this->escombo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->escombo = strip_tags($this->escombo);
         $this->escombo = NM_charset_to_utf8($this->escombo);
         $this->escombo = str_replace('<', '&lt;', $this->escombo);
         $this->escombo = str_replace('>', '&gt;', $this->escombo);
         $this->Texto_tag .= "<td>" . $this->escombo . "</td>\r\n";
   }
   //----- idpro
   function NM_export_idpro()
   {
         if ($this->look_idpro !== "&nbsp;") 
         { 
             $this->look_idpro = sc_strtoupper($this->look_idpro); 
         } 
         $this->look_idpro = html_entity_decode($this->look_idpro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idpro = strip_tags($this->look_idpro);
         $this->look_idpro = NM_charset_to_utf8($this->look_idpro);
         $this->look_idpro = str_replace('<', '&lt;', $this->look_idpro);
         $this->look_idpro = str_replace('>', '&gt;', $this->look_idpro);
         $this->Texto_tag .= "<td>" . $this->look_idpro . "</td>\r\n";
   }
   //----- idcombo
   function NM_export_idcombo()
   {
         nmgp_Form_Num_Val($this->look_idcombo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idcombo = NM_charset_to_utf8($this->look_idcombo);
         $this->look_idcombo = str_replace('<', '&lt;', $this->look_idcombo);
         $this->look_idcombo = str_replace('>', '&gt;', $this->look_idcombo);
         $this->Texto_tag .= "<td>" . $this->look_idcombo . "</td>\r\n";
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         $this->cantidad = str_replace('<', '&lt;', $this->cantidad);
         $this->cantidad = str_replace('>', '&gt;', $this->cantidad);
         $this->Texto_tag .= "<td>" . $this->cantidad . "</td>\r\n";
   }
   //----- valorparcial
   function NM_export_valorparcial()
   {
             nmgp_Form_Num_Val($this->valorparcial, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valorparcial = NM_charset_to_utf8($this->valorparcial);
         $this->valorparcial = str_replace('<', '&lt;', $this->valorparcial);
         $this->valorparcial = str_replace('>', '&gt;', $this->valorparcial);
         $this->Texto_tag .= "<td>" . $this->valorparcial . "</td>\r\n";
   }
   //----- costo
   function NM_export_costo()
   {
             nmgp_Form_Num_Val($this->costo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->costo = NM_charset_to_utf8($this->costo);
         $this->costo = str_replace('<', '&lt;', $this->costo);
         $this->costo = str_replace('>', '&gt;', $this->costo);
         $this->Texto_tag .= "<td>" . $this->costo . "</td>\r\n";
   }
   //----- idbod
   function NM_export_idbod()
   {
         nmgp_Form_Num_Val($this->look_idbod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idbod = NM_charset_to_utf8($this->look_idbod);
         $this->look_idbod = str_replace('<', '&lt;', $this->look_idbod);
         $this->look_idbod = str_replace('>', '&gt;', $this->look_idbod);
         $this->Texto_tag .= "<td>" . $this->look_idbod . "</td>\r\n";
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->look_tipo = NM_charset_to_utf8($this->look_tipo);
         $this->look_tipo = str_replace('<', '&lt;', $this->look_tipo);
         $this->look_tipo = str_replace('>', '&gt;', $this->look_tipo);
         $this->Texto_tag .= "<td>" . $this->look_tipo . "</td>\r\n";
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
                 $this->inicio = $this->nm_data->FormataSaida("d/m/y H:i");
             } 
         $this->inicio = NM_charset_to_utf8($this->inicio);
         $this->inicio = str_replace('<', '&lt;', $this->inicio);
         $this->inicio = str_replace('>', '&gt;', $this->inicio);
         $this->Texto_tag .= "<td>" . $this->inicio . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
                 $this->fecha = $this->nm_data->FormataSaida("d/m/Y");
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- idmov
   function NM_export_idmov()
   {
             nmgp_Form_Num_Val($this->idmov, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idmov = NM_charset_to_utf8($this->idmov);
         $this->idmov = str_replace('<', '&lt;', $this->idmov);
         $this->idmov = str_replace('>', '&gt;', $this->idmov);
         $this->Texto_tag .= "<td>" . $this->idmov . "</td>\r\n";
   }
   //----- nufacvta
   function NM_export_nufacvta()
   {
             nmgp_Form_Num_Val($this->nufacvta, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->nufacvta = NM_charset_to_utf8($this->nufacvta);
         $this->nufacvta = str_replace('<', '&lt;', $this->nufacvta);
         $this->nufacvta = str_replace('>', '&gt;', $this->nufacvta);
         $this->Texto_tag .= "<td>" . $this->nufacvta . "</td>\r\n";
   }
   //----- colores
   function NM_export_colores()
   {
         $this->look_colores = html_entity_decode($this->look_colores, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_colores = strip_tags($this->look_colores);
         $this->look_colores = NM_charset_to_utf8($this->look_colores);
         $this->look_colores = str_replace('<', '&lt;', $this->look_colores);
         $this->look_colores = str_replace('>', '&gt;', $this->look_colores);
         $this->Texto_tag .= "<td>" . $this->look_colores . "</td>\r\n";
   }
   //----- tallas
   function NM_export_tallas()
   {
         $this->look_tallas = html_entity_decode($this->look_tallas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_tallas = strip_tags($this->look_tallas);
         $this->look_tallas = NM_charset_to_utf8($this->look_tallas);
         $this->look_tallas = str_replace('<', '&lt;', $this->look_tallas);
         $this->look_tallas = str_replace('>', '&gt;', $this->look_tallas);
         $this->Texto_tag .= "<td>" . $this->look_tallas . "</td>\r\n";
   }
   //----- sabor
   function NM_export_sabor()
   {
         $this->look_sabor = html_entity_decode($this->look_sabor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_sabor = strip_tags($this->look_sabor);
         $this->look_sabor = NM_charset_to_utf8($this->look_sabor);
         $this->look_sabor = str_replace('<', '&lt;', $this->look_sabor);
         $this->look_sabor = str_replace('>', '&gt;', $this->look_sabor);
         $this->Texto_tag .= "<td>" . $this->look_sabor . "</td>\r\n";
   }
   //----- grupo
   function NM_export_grupo()
   {
         nmgp_Form_Num_Val($this->look_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_grupo = NM_charset_to_utf8($this->look_grupo);
         $this->look_grupo = str_replace('<', '&lt;', $this->look_grupo);
         $this->look_grupo = str_replace('>', '&gt;', $this->look_grupo);
         $this->Texto_tag .= "<td>" . $this->look_grupo . "</td>\r\n";
   }
   //----- idped
   function NM_export_idped()
   {
         nmgp_Form_Num_Val($this->look_idped, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idped = NM_charset_to_utf8($this->look_idped);
         $this->look_idped = str_replace('<', '&lt;', $this->look_idped);
         $this->look_idped = str_replace('>', '&gt;', $this->look_idped);
         $this->Texto_tag .= "<td>" . $this->look_idped . "</td>\r\n";
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida("d/m/y");
             } 
         $this->fechavenc = NM_charset_to_utf8($this->fechavenc);
         $this->fechavenc = str_replace('<', '&lt;', $this->fechavenc);
         $this->fechavenc = str_replace('>', '&gt;', $this->fechavenc);
         $this->Texto_tag .= "<td>" . $this->fechavenc . "</td>\r\n";
   }
   //----- lote2
   function NM_export_lote2()
   {
         $this->lote2 = html_entity_decode($this->lote2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lote2 = strip_tags($this->lote2);
         $this->lote2 = NM_charset_to_utf8($this->lote2);
         $this->lote2 = str_replace('<', '&lt;', $this->lote2);
         $this->lote2 = str_replace('>', '&gt;', $this->lote2);
         $this->Texto_tag .= "<td>" . $this->lote2 . "</td>\r\n";
   }
   //----- tarifa
   function NM_export_tarifa()
   {
             nmgp_Form_Num_Val($this->tarifa, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tarifa = NM_charset_to_utf8($this->tarifa);
         $this->tarifa = str_replace('<', '&lt;', $this->tarifa);
         $this->tarifa = str_replace('>', '&gt;', $this->tarifa);
         $this->Texto_tag .= "<td>" . $this->tarifa . "</td>\r\n";
   }
   //----- base
   function NM_export_base()
   {
             nmgp_Form_Num_Val($this->base, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base = NM_charset_to_utf8($this->base);
         $this->base = str_replace('<', '&lt;', $this->base);
         $this->base = str_replace('>', '&gt;', $this->base);
         $this->Texto_tag .= "<td>" . $this->base . "</td>\r\n";
   }
   //----- utilidad
   function NM_export_utilidad()
   {
             nmgp_Form_Num_Val($this->utilidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->utilidad = NM_charset_to_utf8($this->utilidad);
         $this->utilidad = str_replace('<', '&lt;', $this->utilidad);
         $this->utilidad = str_replace('>', '&gt;', $this->utilidad);
         $this->Texto_tag .= "<td>" . $this->utilidad . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -Rotación del inventario :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_inventario_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_inventario"> 
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
