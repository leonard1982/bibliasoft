<?php

class grid_detallepedido_210422_rtf
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
                   nm_limpa_str_grid_detallepedido_210422($cadapar[1]);
                   nm_protect_num_grid_detallepedido_210422($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_detallepedido_210422']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($par_idpedio)) 
      {
          $_SESSION['par_idpedio'] = $par_idpedio;
          nm_limpa_str_grid_detallepedido_210422($_SESSION["par_idpedio"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_detallepedido_210422_total.class.php"); 
      $this->Tot      = new grid_detallepedido_210422_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['tot_geral'][1];
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['tot_geral'][2];
          $this->sum_valorpar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['tot_geral'][3];
          $this->sum_iva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['tot_geral'][4];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_detallepedido_210422']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_detallepedido_210422";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_detallepedido_210422.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detallepedido_210422']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detallepedido_210422']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detallepedido_210422']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->iddet = $Busca_temp['iddet']; 
          $tmp_pos = strpos($this->iddet, "##@@");
          if ($tmp_pos !== false && !is_array($this->iddet))
          {
              $this->iddet = substr($this->iddet, 0, $tmp_pos);
          }
          $this->iddet_2 = $Busca_temp['iddet_input_2']; 
          $this->idpedid = $Busca_temp['idpedid']; 
          $tmp_pos = strpos($this->idpedid, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpedid))
          {
              $this->idpedid = substr($this->idpedid, 0, $tmp_pos);
          }
          $this->idpedid_2 = $Busca_temp['idpedid_input_2']; 
          $this->numfac = $Busca_temp['numfac']; 
          $tmp_pos = strpos($this->numfac, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfac))
          {
              $this->numfac = substr($this->numfac, 0, $tmp_pos);
          }
          $this->numfac_2 = $Busca_temp['numfac_input_2']; 
          $this->remision = $Busca_temp['remision']; 
          $tmp_pos = strpos($this->remision, "##@@");
          if ($tmp_pos !== false && !is_array($this->remision))
          {
              $this->remision = substr($this->remision, 0, $tmp_pos);
          }
          $this->remision_2 = $Busca_temp['remision_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_detallepedido_210422']['contr_erro'] = 'on';
  
      $nm_select = "select codproducto_en_facventa from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vtipocod = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vtipocod[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vtipocod = false;
          $this->vtipocod_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vtipocod[0][0]))
{
	if($this->vtipocod[0][0]=='SI')
	{
		$this->NM_cmp_hidden["codigobar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']["codigobar"] = "off"; }
		$this->NM_cmp_hidden["codigoprod"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']["codigoprod"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["codigobar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']["codigobar"] = "on"; }
		$this->NM_cmp_hidden["codigoprod"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['php_cmp_sel']["codigoprod"] = "off"; }
	}
}
$_SESSION['scriptcase']['grid_detallepedido_210422']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['codigoprod'])) ? $this->New_label['codigoprod'] : "Codigo"; 
          if ($Cada_col == "codigoprod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "CodBarra"; 
          if ($Cada_col == "codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
          if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valorunit'])) ? $this->New_label['valorunit'] : "Valor. unit."; 
          if ($Cada_col == "valorunit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descuento'])) ? $this->New_label['descuento'] : "Desc. x U."; 
          if ($Cada_col == "descuento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valorpar'])) ? $this->New_label['valorpar'] : "Valor par."; 
          if ($Cada_col == "valorpar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva'])) ? $this->New_label['iva'] : "Impuesto"; 
          if ($Cada_col == "iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unidad'])) ? $this->New_label['unidad'] : "Unidad"; 
          if ($Cada_col == "unidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado_comanda'])) ? $this->New_label['estado_comanda'] : "Estado"; 
          if ($Cada_col == "estado_comanda" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['hora_inicio'])) ? $this->New_label['hora_inicio'] : "Inicio comanda"; 
          if ($Cada_col == "hora_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['hora_final'])) ? $this->New_label['hora_final'] : "Fin comanda"; 
          if ($Cada_col == "hora_final" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observ'])) ? $this->New_label['observ'] : "Observacion"; 
          if ($Cada_col == "observ" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cerrado'])) ? $this->New_label['cerrado'] : "Cerrado"; 
          if ($Cada_col == "cerrado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iddet'])) ? $this->New_label['iddet'] : "Iddet"; 
          if ($Cada_col == "iddet" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idpedid'])) ? $this->New_label['idpedid'] : "Idpedid"; 
          if ($Cada_col == "idpedid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numfac'])) ? $this->New_label['numfac'] : "Numfac"; 
          if ($Cada_col == "numfac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['remision'])) ? $this->New_label['remision'] : "Remision"; 
          if ($Cada_col == "remision" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unidadmayor'])) ? $this->New_label['unidadmayor'] : "Unidadmayor"; 
          if ($Cada_col == "unidadmayor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['costop'])) ? $this->New_label['costop'] : "Costop"; 
          if ($Cada_col == "costop" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, hora_inicio, hora_final, observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, hora_inicio, hora_final, observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, hora_inicio, hora_final, observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, TO_DATE(TO_CHAR(hora_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(hora_final, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, hora_inicio, hora_final, observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idpro as codigoprod, idpro as codigobar, idpro, colores, tallas, sabor, cantidad, valorunit, descuento, valorpar, iva, estado_comanda, hora_inicio, hora_final, observ, cerrado, iddet, idpedid, numfac, remision, unidadmayor, costop from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['order_grid'];
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
         $this->codigoprod = $rs->fields[0] ;  
         $this->codigoprod = (string)$this->codigoprod;
         $this->codigobar = $rs->fields[1] ;  
         $this->codigobar = (string)$this->codigobar;
         $this->idpro = $rs->fields[2] ;  
         $this->idpro = (string)$this->idpro;
         $this->colores = $rs->fields[3] ;  
         $this->colores = (string)$this->colores;
         $this->tallas = $rs->fields[4] ;  
         $this->tallas = (string)$this->tallas;
         $this->sabor = $rs->fields[5] ;  
         $this->sabor = (string)$this->sabor;
         $this->cantidad = $rs->fields[6] ;  
         $this->cantidad = (strpos(strtolower($this->cantidad), "e")) ? (float)$this->cantidad : $this->cantidad; 
         $this->cantidad = (string)$this->cantidad;
         $this->valorunit = $rs->fields[7] ;  
         $this->valorunit =  str_replace(",", ".", $this->valorunit);
         $this->valorunit = (strpos(strtolower($this->valorunit), "e")) ? (float)$this->valorunit : $this->valorunit; 
         $this->valorunit = (string)$this->valorunit;
         $this->descuento = $rs->fields[8] ;  
         $this->descuento =  str_replace(",", ".", $this->descuento);
         $this->descuento = (strpos(strtolower($this->descuento), "e")) ? (float)$this->descuento : $this->descuento; 
         $this->descuento = (string)$this->descuento;
         $this->valorpar = $rs->fields[9] ;  
         $this->valorpar =  str_replace(",", ".", $this->valorpar);
         $this->valorpar = (strpos(strtolower($this->valorpar), "e")) ? (float)$this->valorpar : $this->valorpar; 
         $this->valorpar = (string)$this->valorpar;
         $this->iva = $rs->fields[10] ;  
         $this->iva =  str_replace(",", ".", $this->iva);
         $this->iva = (strpos(strtolower($this->iva), "e")) ? (float)$this->iva : $this->iva; 
         $this->iva = (string)$this->iva;
         $this->estado_comanda = $rs->fields[11] ;  
         $this->hora_inicio = $rs->fields[12] ;  
         $this->hora_final = $rs->fields[13] ;  
         $this->observ = $rs->fields[14] ;  
         $this->cerrado = $rs->fields[15] ;  
         $this->iddet = $rs->fields[16] ;  
         $this->iddet = (string)$this->iddet;
         $this->idpedid = $rs->fields[17] ;  
         $this->idpedid = (string)$this->idpedid;
         $this->numfac = $rs->fields[18] ;  
         $this->numfac = (string)$this->numfac;
         $this->remision = $rs->fields[19] ;  
         $this->remision = (string)$this->remision;
         $this->unidadmayor = $rs->fields[20] ;  
         $this->costop = $rs->fields[21] ;  
         $this->costop = (strpos(strtolower($this->costop), "e")) ? (float)$this->costop : $this->costop; 
         $this->costop = (string)$this->costop;
         //----- lookup - codigoprod
         $this->look_codigoprod = $this->codigoprod; 
         $this->Lookup->lookup_codigoprod($this->look_codigoprod, $this->codigoprod) ; 
         $this->look_codigoprod = ($this->look_codigoprod == "&nbsp;") ? "" : $this->look_codigoprod; 
         //----- lookup - codigobar
         $this->look_codigobar = $this->codigobar; 
         $this->Lookup->lookup_codigobar($this->look_codigobar, $this->codigobar) ; 
         $this->look_codigobar = ($this->look_codigobar == "&nbsp;") ? "" : $this->look_codigobar; 
         //----- lookup - idpro
         $this->look_idpro = $this->idpro; 
         $this->Lookup->lookup_idpro($this->look_idpro, $this->idpro) ; 
         $this->look_idpro = ($this->look_idpro == "&nbsp;") ? "" : $this->look_idpro; 
         //----- lookup - estado_comanda
         $this->look_estado_comanda = $this->estado_comanda; 
         $this->Lookup->lookup_estado_comanda($this->look_estado_comanda); 
         $this->look_estado_comanda = ($this->look_estado_comanda == "&nbsp;") ? "" : $this->look_estado_comanda; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_detallepedido_210422']['contr_erro'] = 'on';
 $idp=$this->idpro ;
 
      $nm_select = "select unimay, unimen from productos where idprod=$idp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->da[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da = false;
          $this->da_erro = $this->Db->ErrorMsg();
      } 
;
if (isset($this->da[0][0]))
	{
	if ($this->unidadmayor =='SI')
		{
		$this->unidad =$this->da[0][0];
		}
	else
		{
		$this->unidad =$this->da[0][1];
		}
	}
else
	{
	$this->unidad ="";
	}
if($this->colores <1)
	{
	$this->colores ='';
	}
else
	{
	 
      $nm_select = "SELECT color FROM colores WHERE idcolores =$this->colores  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
	$this->colores =substr($this->ds , 5);
	}
if($this->tallas <1)
	{
	$this->tallas ='';
	}
else
	{
	 
      $nm_select = "SELECT tamaño FROM tallas WHERE idtallas =$this->tallas  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
	$this->tallas =substr($this->ds , 7);
	}
if($this->sabor <1)
	{
	$this->sabor ='';
	}
else
	{
	 
      $nm_select = "SELECT tamaño FROM tallas WHERE idtallas =$this->tallas  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
	$this->sabor =substr($this->ds , 7);
	}
$_SESSION['scriptcase']['grid_detallepedido_210422']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- codigoprod
   function NM_export_codigoprod()
   {
         nmgp_Form_Num_Val($this->look_codigoprod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_codigoprod = NM_charset_to_utf8($this->look_codigoprod);
         $this->look_codigoprod = str_replace('<', '&lt;', $this->look_codigoprod);
         $this->look_codigoprod = str_replace('>', '&gt;', $this->look_codigoprod);
         $this->Texto_tag .= "<td>" . $this->look_codigoprod . "</td>\r\n";
   }
   //----- codigobar
   function NM_export_codigobar()
   {
         nmgp_Form_Num_Val($this->look_codigobar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_codigobar = NM_charset_to_utf8($this->look_codigobar);
         $this->look_codigobar = str_replace('<', '&lt;', $this->look_codigobar);
         $this->look_codigobar = str_replace('>', '&gt;', $this->look_codigobar);
         $this->Texto_tag .= "<td>" . $this->look_codigobar . "</td>\r\n";
   }
   //----- idpro
   function NM_export_idpro()
   {
         nmgp_Form_Num_Val($this->look_idpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idpro = NM_charset_to_utf8($this->look_idpro);
         $this->look_idpro = str_replace('<', '&lt;', $this->look_idpro);
         $this->look_idpro = str_replace('>', '&gt;', $this->look_idpro);
         $this->Texto_tag .= "<td>" . $this->look_idpro . "</td>\r\n";
   }
   //----- colores
   function NM_export_colores()
   {
             nmgp_Form_Num_Val($this->colores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->colores = NM_charset_to_utf8($this->colores);
         $this->colores = str_replace('<', '&lt;', $this->colores);
         $this->colores = str_replace('>', '&gt;', $this->colores);
         $this->Texto_tag .= "<td>" . $this->colores . "</td>\r\n";
   }
   //----- tallas
   function NM_export_tallas()
   {
             nmgp_Form_Num_Val($this->tallas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tallas = NM_charset_to_utf8($this->tallas);
         $this->tallas = str_replace('<', '&lt;', $this->tallas);
         $this->tallas = str_replace('>', '&gt;', $this->tallas);
         $this->Texto_tag .= "<td>" . $this->tallas . "</td>\r\n";
   }
   //----- sabor
   function NM_export_sabor()
   {
             nmgp_Form_Num_Val($this->sabor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->sabor = NM_charset_to_utf8($this->sabor);
         $this->sabor = str_replace('<', '&lt;', $this->sabor);
         $this->sabor = str_replace('>', '&gt;', $this->sabor);
         $this->Texto_tag .= "<td>" . $this->sabor . "</td>\r\n";
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         $this->cantidad = str_replace('<', '&lt;', $this->cantidad);
         $this->cantidad = str_replace('>', '&gt;', $this->cantidad);
         $this->Texto_tag .= "<td>" . $this->cantidad . "</td>\r\n";
   }
   //----- valorunit
   function NM_export_valorunit()
   {
             nmgp_Form_Num_Val($this->valorunit, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valorunit = NM_charset_to_utf8($this->valorunit);
         $this->valorunit = str_replace('<', '&lt;', $this->valorunit);
         $this->valorunit = str_replace('>', '&gt;', $this->valorunit);
         $this->Texto_tag .= "<td>" . $this->valorunit . "</td>\r\n";
   }
   //----- descuento
   function NM_export_descuento()
   {
             nmgp_Form_Num_Val($this->descuento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->descuento = NM_charset_to_utf8($this->descuento);
         $this->descuento = str_replace('<', '&lt;', $this->descuento);
         $this->descuento = str_replace('>', '&gt;', $this->descuento);
         $this->Texto_tag .= "<td>" . $this->descuento . "</td>\r\n";
   }
   //----- valorpar
   function NM_export_valorpar()
   {
             nmgp_Form_Num_Val($this->valorpar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valorpar = NM_charset_to_utf8($this->valorpar);
         $this->valorpar = str_replace('<', '&lt;', $this->valorpar);
         $this->valorpar = str_replace('>', '&gt;', $this->valorpar);
         $this->Texto_tag .= "<td>" . $this->valorpar . "</td>\r\n";
   }
   //----- iva
   function NM_export_iva()
   {
             nmgp_Form_Num_Val($this->iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->iva = NM_charset_to_utf8($this->iva);
         $this->iva = str_replace('<', '&lt;', $this->iva);
         $this->iva = str_replace('>', '&gt;', $this->iva);
         $this->Texto_tag .= "<td>" . $this->iva . "</td>\r\n";
   }
   //----- unidad
   function NM_export_unidad()
   {
         $this->unidad = html_entity_decode($this->unidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unidad = strip_tags($this->unidad);
         $this->unidad = NM_charset_to_utf8($this->unidad);
         $this->unidad = str_replace('<', '&lt;', $this->unidad);
         $this->unidad = str_replace('>', '&gt;', $this->unidad);
         $this->Texto_tag .= "<td>" . $this->unidad . "</td>\r\n";
   }
   //----- estado_comanda
   function NM_export_estado_comanda()
   {
         $this->look_estado_comanda = html_entity_decode($this->look_estado_comanda, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_estado_comanda = strip_tags($this->look_estado_comanda);
         $this->look_estado_comanda = NM_charset_to_utf8($this->look_estado_comanda);
         $this->look_estado_comanda = str_replace('<', '&lt;', $this->look_estado_comanda);
         $this->look_estado_comanda = str_replace('>', '&gt;', $this->look_estado_comanda);
         $this->Texto_tag .= "<td>" . $this->look_estado_comanda . "</td>\r\n";
   }
   //----- hora_inicio
   function NM_export_hora_inicio()
   {
             if (substr($this->hora_inicio, 10, 1) == "-") 
             { 
                 $this->hora_inicio = substr($this->hora_inicio, 0, 10) . " " . substr($this->hora_inicio, 11);
             } 
             if (substr($this->hora_inicio, 13, 1) == ".") 
             { 
                $this->hora_inicio = substr($this->hora_inicio, 0, 13) . ":" . substr($this->hora_inicio, 14, 2) . ":" . substr($this->hora_inicio, 17);
             } 
             $conteudo_x =  $this->hora_inicio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->hora_inicio, "YYYY-MM-DD HH:II:SS  ");
                 $this->hora_inicio = $this->nm_data->FormataSaida("H:i:s");
             } 
         $this->hora_inicio = NM_charset_to_utf8($this->hora_inicio);
         $this->hora_inicio = str_replace('<', '&lt;', $this->hora_inicio);
         $this->hora_inicio = str_replace('>', '&gt;', $this->hora_inicio);
         $this->Texto_tag .= "<td>" . $this->hora_inicio . "</td>\r\n";
   }
   //----- hora_final
   function NM_export_hora_final()
   {
             if (substr($this->hora_final, 10, 1) == "-") 
             { 
                 $this->hora_final = substr($this->hora_final, 0, 10) . " " . substr($this->hora_final, 11);
             } 
             if (substr($this->hora_final, 13, 1) == ".") 
             { 
                $this->hora_final = substr($this->hora_final, 0, 13) . ":" . substr($this->hora_final, 14, 2) . ":" . substr($this->hora_final, 17);
             } 
             $conteudo_x =  $this->hora_final;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->hora_final, "YYYY-MM-DD HH:II:SS  ");
                 $this->hora_final = $this->nm_data->FormataSaida("H:i:s");
             } 
         $this->hora_final = NM_charset_to_utf8($this->hora_final);
         $this->hora_final = str_replace('<', '&lt;', $this->hora_final);
         $this->hora_final = str_replace('>', '&gt;', $this->hora_final);
         $this->Texto_tag .= "<td>" . $this->hora_final . "</td>\r\n";
   }
   //----- observ
   function NM_export_observ()
   {
         $this->observ = html_entity_decode($this->observ, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observ = strip_tags($this->observ);
         $this->observ = NM_charset_to_utf8($this->observ);
         $this->observ = str_replace('<', '&lt;', $this->observ);
         $this->observ = str_replace('>', '&gt;', $this->observ);
         $this->Texto_tag .= "<td>" . $this->observ . "</td>\r\n";
   }
   //----- cerrado
   function NM_export_cerrado()
   {
         $this->cerrado = html_entity_decode($this->cerrado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cerrado = strip_tags($this->cerrado);
         $this->cerrado = NM_charset_to_utf8($this->cerrado);
         $this->cerrado = str_replace('<', '&lt;', $this->cerrado);
         $this->cerrado = str_replace('>', '&gt;', $this->cerrado);
         $this->Texto_tag .= "<td>" . $this->cerrado . "</td>\r\n";
   }
   //----- iddet
   function NM_export_iddet()
   {
             nmgp_Form_Num_Val($this->iddet, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->iddet = NM_charset_to_utf8($this->iddet);
         $this->iddet = str_replace('<', '&lt;', $this->iddet);
         $this->iddet = str_replace('>', '&gt;', $this->iddet);
         $this->Texto_tag .= "<td>" . $this->iddet . "</td>\r\n";
   }
   //----- idpedid
   function NM_export_idpedid()
   {
             nmgp_Form_Num_Val($this->idpedid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idpedid = NM_charset_to_utf8($this->idpedid);
         $this->idpedid = str_replace('<', '&lt;', $this->idpedid);
         $this->idpedid = str_replace('>', '&gt;', $this->idpedid);
         $this->Texto_tag .= "<td>" . $this->idpedid . "</td>\r\n";
   }
   //----- numfac
   function NM_export_numfac()
   {
             nmgp_Form_Num_Val($this->numfac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numfac = NM_charset_to_utf8($this->numfac);
         $this->numfac = str_replace('<', '&lt;', $this->numfac);
         $this->numfac = str_replace('>', '&gt;', $this->numfac);
         $this->Texto_tag .= "<td>" . $this->numfac . "</td>\r\n";
   }
   //----- remision
   function NM_export_remision()
   {
             nmgp_Form_Num_Val($this->remision, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->remision = NM_charset_to_utf8($this->remision);
         $this->remision = str_replace('<', '&lt;', $this->remision);
         $this->remision = str_replace('>', '&gt;', $this->remision);
         $this->Texto_tag .= "<td>" . $this->remision . "</td>\r\n";
   }
   //----- unidadmayor
   function NM_export_unidadmayor()
   {
         $this->unidadmayor = html_entity_decode($this->unidadmayor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unidadmayor = strip_tags($this->unidadmayor);
         $this->unidadmayor = NM_charset_to_utf8($this->unidadmayor);
         $this->unidadmayor = str_replace('<', '&lt;', $this->unidadmayor);
         $this->unidadmayor = str_replace('>', '&gt;', $this->unidadmayor);
         $this->Texto_tag .= "<td>" . $this->unidadmayor . "</td>\r\n";
   }
   //----- costop
   function NM_export_costop()
   {
             nmgp_Form_Num_Val($this->costop, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->costop = NM_charset_to_utf8($this->costop);
         $this->costop = str_replace('<', '&lt;', $this->costop);
         $this->costop = str_replace('>', '&gt;', $this->costop);
         $this->Texto_tag .= "<td>" . $this->costop . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido_210422'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - detallepedido :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_detallepedido_210422_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_detallepedido_210422"> 
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
