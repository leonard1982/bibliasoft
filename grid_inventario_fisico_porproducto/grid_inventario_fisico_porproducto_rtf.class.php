<?php

class grid_inventario_fisico_porproducto_rtf
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
                   nm_limpa_str_grid_inventario_fisico_porproducto($cadapar[1]);
                   nm_protect_num_grid_inventario_fisico_porproducto($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_inventario_fisico_porproducto']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_inventario_fisico_porproducto_total.class.php"); 
      $this->Tot      = new grid_inventario_fisico_porproducto_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_d_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_inventario_fisico_porproducto']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_inventario_fisico_porproducto";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_inventario_fisico_porproducto.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_fisico_porproducto']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_fisico_porproducto']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_fisico_porproducto']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->m_fecha = $Busca_temp['m_fecha']; 
          $tmp_pos = strpos($this->m_fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->m_fecha))
          {
              $this->m_fecha = substr($this->m_fecha, 0, $tmp_pos);
          }
          $this->m_fecha_2 = $Busca_temp['m_fecha_input_2']; 
          $this->numero = $Busca_temp['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero))
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
          $this->m_observaciones = $Busca_temp['m_observaciones']; 
          $tmp_pos = strpos($this->m_observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->m_observaciones))
          {
              $this->m_observaciones = substr($this->m_observaciones, 0, $tmp_pos);
          }
          $this->producto = $Busca_temp['producto']; 
          $tmp_pos = strpos($this->producto, "##@@");
          if ($tmp_pos !== false && !is_array($this->producto))
          {
              $this->producto = substr($this->producto, 0, $tmp_pos);
          }
          $this->b_bodega = $Busca_temp['b_bodega']; 
          $tmp_pos = strpos($this->b_bodega, "##@@");
          if ($tmp_pos !== false && !is_array($this->b_bodega))
          {
              $this->b_bodega = substr($this->b_bodega, 0, $tmp_pos);
          }
          $this->vence = $Busca_temp['vence']; 
          $tmp_pos = strpos($this->vence, "##@@");
          if ($tmp_pos !== false && !is_array($this->vence))
          {
              $this->vence = substr($this->vence, 0, $tmp_pos);
          }
          $this->d_lote = $Busca_temp['d_lote']; 
          $tmp_pos = strpos($this->d_lote, "##@@");
          if ($tmp_pos !== false && !is_array($this->d_lote))
          {
              $this->d_lote = substr($this->d_lote, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['m_fecha'])) ? $this->New_label['m_fecha'] : "Fecha"; 
          if ($Cada_col == "m_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Numero"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['m_observaciones'])) ? $this->New_label['m_observaciones'] : "Observaciones"; 
          if ($Cada_col == "m_observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['producto'])) ? $this->New_label['producto'] : "Producto"; 
          if ($Cada_col == "producto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['b_bodega'])) ? $this->New_label['b_bodega'] : "Bodega"; 
          if ($Cada_col == "b_bodega" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['d_cantidad'])) ? $this->New_label['d_cantidad'] : "Cantidad"; 
          if ($Cada_col == "d_cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['d_presentacion'])) ? $this->New_label['d_presentacion'] : "Presentacion"; 
          if ($Cada_col == "d_presentacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vence'])) ? $this->New_label['vence'] : "Vence"; 
          if ($Cada_col == "vence" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['d_lote'])) ? $this->New_label['d_lote'] : "Lote"; 
          if ($Cada_col == "d_lote" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['m_idmov'])) ? $this->New_label['m_idmov'] : "Idmov"; 
          if ($Cada_col == "m_idmov" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),m.fecha,102), '.', '-') + ' ' + convert(char(8),m.fecha,20) as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, str_replace (convert(char(10),d.fechavenc,102), '.', '-') + ' ' + convert(char(8),d.fechavenc,20) as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT m.fecha as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, d.fechavenc as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),m.fecha,121) as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, convert(char(23),d.fechavenc,121) as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT m.fecha as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, d.fechavenc as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(m.fecha, YEAR TO DAY) as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, EXTEND(d.fechavenc, YEAR TO DAY) as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT m.fecha as m_fecha, concat(r.prefijo,'-',m.numeronota) as numero, m.observaciones as m_observaciones, concat(p.codigobar,' - ',p.nompro) as producto, b.bodega as b_bodega, d.cantidad as d_cantidad, d.presentacion as d_presentacion, d.fechavenc as vence, d.lote as d_lote, m.idmov as m_idmov from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['order_grid'];
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
         $this->m_fecha = $rs->fields[0] ;  
         $this->numero = $rs->fields[1] ;  
         $this->m_observaciones = $rs->fields[2] ;  
         $this->producto = $rs->fields[3] ;  
         $this->b_bodega = $rs->fields[4] ;  
         $this->d_cantidad = $rs->fields[5] ;  
         $this->d_cantidad = (strpos(strtolower($this->d_cantidad), "e")) ? (float)$this->d_cantidad : $this->d_cantidad; 
         $this->d_cantidad = (string)$this->d_cantidad;
         $this->d_presentacion = $rs->fields[6] ;  
         $this->vence = $rs->fields[7] ;  
         $this->d_lote = $rs->fields[8] ;  
         $this->m_idmov = $rs->fields[9] ;  
         $this->m_idmov = (string)$this->m_idmov;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- m_fecha
   function NM_export_m_fecha()
   {
             $conteudo_x =  $this->m_fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->m_fecha, "YYYY-MM-DD  ");
                 $this->m_fecha = $this->nm_data->FormataSaida("d/m/y");
             } 
         $this->m_fecha = NM_charset_to_utf8($this->m_fecha);
         $this->m_fecha = str_replace('<', '&lt;', $this->m_fecha);
         $this->m_fecha = str_replace('>', '&gt;', $this->m_fecha);
         $this->Texto_tag .= "<td>" . $this->m_fecha . "</td>\r\n";
   }
   //----- numero
   function NM_export_numero()
   {
         $this->numero = html_entity_decode($this->numero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero = strip_tags($this->numero);
         $this->numero = NM_charset_to_utf8($this->numero);
         $this->numero = str_replace('<', '&lt;', $this->numero);
         $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->Texto_tag .= "<td>" . $this->numero . "</td>\r\n";
   }
   //----- m_observaciones
   function NM_export_m_observaciones()
   {
         $this->m_observaciones = html_entity_decode($this->m_observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->m_observaciones = strip_tags($this->m_observaciones);
         $this->m_observaciones = NM_charset_to_utf8($this->m_observaciones);
         $this->m_observaciones = str_replace('<', '&lt;', $this->m_observaciones);
         $this->m_observaciones = str_replace('>', '&gt;', $this->m_observaciones);
         $this->Texto_tag .= "<td>" . $this->m_observaciones . "</td>\r\n";
   }
   //----- producto
   function NM_export_producto()
   {
         $this->producto = html_entity_decode($this->producto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->producto = strip_tags($this->producto);
         $this->producto = NM_charset_to_utf8($this->producto);
         $this->producto = str_replace('<', '&lt;', $this->producto);
         $this->producto = str_replace('>', '&gt;', $this->producto);
         $this->Texto_tag .= "<td>" . $this->producto . "</td>\r\n";
   }
   //----- b_bodega
   function NM_export_b_bodega()
   {
         $this->b_bodega = html_entity_decode($this->b_bodega, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->b_bodega = strip_tags($this->b_bodega);
         $this->b_bodega = NM_charset_to_utf8($this->b_bodega);
         $this->b_bodega = str_replace('<', '&lt;', $this->b_bodega);
         $this->b_bodega = str_replace('>', '&gt;', $this->b_bodega);
         $this->Texto_tag .= "<td>" . $this->b_bodega . "</td>\r\n";
   }
   //----- d_cantidad
   function NM_export_d_cantidad()
   {
             nmgp_Form_Num_Val($this->d_cantidad, ",", ".", "3", "S", "2", "", "N:2", "-") ; 
         $this->d_cantidad = NM_charset_to_utf8($this->d_cantidad);
         $this->d_cantidad = str_replace('<', '&lt;', $this->d_cantidad);
         $this->d_cantidad = str_replace('>', '&gt;', $this->d_cantidad);
         $this->Texto_tag .= "<td>" . $this->d_cantidad . "</td>\r\n";
   }
   //----- d_presentacion
   function NM_export_d_presentacion()
   {
         $this->d_presentacion = html_entity_decode($this->d_presentacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->d_presentacion = strip_tags($this->d_presentacion);
         $this->d_presentacion = NM_charset_to_utf8($this->d_presentacion);
         $this->d_presentacion = str_replace('<', '&lt;', $this->d_presentacion);
         $this->d_presentacion = str_replace('>', '&gt;', $this->d_presentacion);
         $this->Texto_tag .= "<td>" . $this->d_presentacion . "</td>\r\n";
   }
   //----- vence
   function NM_export_vence()
   {
             $conteudo_x =  $this->vence;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->vence, "YYYY-MM-DD  ");
                 $this->vence = $this->nm_data->FormataSaida("d/m/y");
             } 
         $this->vence = NM_charset_to_utf8($this->vence);
         $this->vence = str_replace('<', '&lt;', $this->vence);
         $this->vence = str_replace('>', '&gt;', $this->vence);
         $this->Texto_tag .= "<td>" . $this->vence . "</td>\r\n";
   }
   //----- d_lote
   function NM_export_d_lote()
   {
         $this->d_lote = html_entity_decode($this->d_lote, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->d_lote = strip_tags($this->d_lote);
         $this->d_lote = NM_charset_to_utf8($this->d_lote);
         $this->d_lote = str_replace('<', '&lt;', $this->d_lote);
         $this->d_lote = str_replace('>', '&gt;', $this->d_lote);
         $this->Texto_tag .= "<td>" . $this->d_lote . "</td>\r\n";
   }
   //----- m_idmov
   function NM_export_m_idmov()
   {
             nmgp_Form_Num_Val($this->m_idmov, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->m_idmov = NM_charset_to_utf8($this->m_idmov);
         $this->m_idmov = str_replace('<', '&lt;', $this->m_idmov);
         $this->m_idmov = str_replace('>', '&gt;', $this->m_idmov);
         $this->Texto_tag .= "<td>" . $this->m_idmov . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_fisico_porproducto'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Inventario Físico por Producto :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_inventario_fisico_porproducto_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_inventario_fisico_porproducto"> 
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
