<?php

class grid_productos_nube_rtf
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
                   nm_limpa_str_grid_productos_nube($cadapar[1]);
                   nm_protect_num_grid_productos_nube($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_productos_nube']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_productos_nube_total.class.php"); 
      $this->Tot      = new grid_productos_nube_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_productos_nube']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_productos_nube";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_productos_nube.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos_nube']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos_nube']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos_nube']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
          if ($Cada_col == "codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Descripción"; 
          if ($Cada_col == "nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : "Grupo/Familia"; 
          if ($Cada_col == "idgrup" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : "Precio1"; 
          if ($Cada_col == "preciomen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen2'])) ? $this->New_label['preciomen2'] : "Precio2"; 
          if ($Cada_col == "preciomen2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen3'])) ? $this->New_label['preciomen3'] : "Precio3"; 
          if ($Cada_col == "preciomen3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unimen'])) ? $this->New_label['unimen'] : "U/Menor"; 
          if ($Cada_col == "unimen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['existencia_menor'])) ? $this->New_label['existencia_menor'] : "Existencia"; 
          if ($Cada_col == "existencia_menor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciofull'])) ? $this->New_label['preciofull'] : "Precio M1"; 
          if ($Cada_col == "preciofull" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['precio2'])) ? $this->New_label['precio2'] : "Precio M2"; 
          if ($Cada_col == "precio2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomay'])) ? $this->New_label['preciomay'] : "Precio M3"; 
          if ($Cada_col == "preciomay" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unimay'])) ? $this->New_label['unimay'] : "U/Mayor"; 
          if ($Cada_col == "unimay" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['stockmen'])) ? $this->New_label['stockmen'] : "Existencia"; 
          if ($Cada_col == "stockmen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idprod'])) ? $this->New_label['idprod'] : "Idprod"; 
          if ($Cada_col == "idprod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigoprod'])) ? $this->New_label['codigoprod'] : "Codigoprod"; 
          if ($Cada_col == "codigoprod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unidmaymen'])) ? $this->New_label['unidmaymen'] : "Unidmaymen"; 
          if ($Cada_col == "unidmaymen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT codigobar, nompro, idgrup, preciomen, preciomen2, preciomen3, unimen, existencia_menor, preciofull, precio2, preciomay, unimay, stockmen, idprod, codigoprod, unidmaymen from (SELECT      idprod,     codigobar,     codigoprod,     nompro,     unidmaymen,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciomen,     preciomen2,     preciomen3,     precio2,     preciomay,     preciofull,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     colores,     tallas,     sabores,     imagenprod,     imconsumo,     escombo,     idcombo,     precio_editable,     cod_cuenta,     fecha_vencimiento,     fecha_fab,     lote,     serial_codbarras,     maneja_tcs_lfs,     control_costo,     por_preciominimo,     id_marca,     id_linea,     ultima_compra,     n_ultcompra,     ultima_venta,     n_ultventa,     codigobar2,     codigobar3,     nube,      if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor FROM      productos ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['order_grid'];
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
         $this->codigobar = $rs->fields[0] ;  
         $this->nompro = $rs->fields[1] ;  
         $this->idgrup = $rs->fields[2] ;  
         $this->idgrup = (string)$this->idgrup;
         $this->preciomen = $rs->fields[3] ;  
         $this->preciomen =  str_replace(",", ".", $this->preciomen);
         $this->preciomen = (strpos(strtolower($this->preciomen), "e")) ? (float)$this->preciomen : $this->preciomen; 
         $this->preciomen = (string)$this->preciomen;
         $this->preciomen2 = $rs->fields[4] ;  
         $this->preciomen2 =  str_replace(",", ".", $this->preciomen2);
         $this->preciomen2 = (strpos(strtolower($this->preciomen2), "e")) ? (float)$this->preciomen2 : $this->preciomen2; 
         $this->preciomen2 = (string)$this->preciomen2;
         $this->preciomen3 = $rs->fields[5] ;  
         $this->preciomen3 =  str_replace(",", ".", $this->preciomen3);
         $this->preciomen3 = (strpos(strtolower($this->preciomen3), "e")) ? (float)$this->preciomen3 : $this->preciomen3; 
         $this->preciomen3 = (string)$this->preciomen3;
         $this->unimen = $rs->fields[6] ;  
         $this->existencia_menor = $rs->fields[7] ;  
         $this->existencia_menor = (strpos(strtolower($this->existencia_menor), "e")) ? (float)$this->existencia_menor : $this->existencia_menor; 
         $this->existencia_menor = (string)$this->existencia_menor;
         $this->preciofull = $rs->fields[8] ;  
         $this->preciofull =  str_replace(",", ".", $this->preciofull);
         $this->preciofull = (strpos(strtolower($this->preciofull), "e")) ? (float)$this->preciofull : $this->preciofull; 
         $this->preciofull = (string)$this->preciofull;
         $this->precio2 = $rs->fields[9] ;  
         $this->precio2 =  str_replace(",", ".", $this->precio2);
         $this->precio2 = (strpos(strtolower($this->precio2), "e")) ? (float)$this->precio2 : $this->precio2; 
         $this->precio2 = (string)$this->precio2;
         $this->preciomay = $rs->fields[10] ;  
         $this->preciomay =  str_replace(",", ".", $this->preciomay);
         $this->preciomay = (strpos(strtolower($this->preciomay), "e")) ? (float)$this->preciomay : $this->preciomay; 
         $this->preciomay = (string)$this->preciomay;
         $this->unimay = $rs->fields[11] ;  
         $this->stockmen = $rs->fields[12] ;  
         $this->stockmen = (strpos(strtolower($this->stockmen), "e")) ? (float)$this->stockmen : $this->stockmen; 
         $this->stockmen = (string)$this->stockmen;
         $this->idprod = $rs->fields[13] ;  
         $this->idprod = (string)$this->idprod;
         $this->codigoprod = $rs->fields[14] ;  
         $this->unidmaymen = $rs->fields[15] ;  
         //----- lookup - idgrup
         $this->look_idgrup = $this->idgrup; 
         $this->Lookup->lookup_idgrup($this->look_idgrup, $this->idgrup) ; 
         $this->look_idgrup = ($this->look_idgrup == "&nbsp;") ? "" : $this->look_idgrup; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_productos_nube']['contr_erro'] = 'on';
 if($this->unidmaymen =="NO")
{
	$this->stockmen  = 0;
}

$_SESSION['scriptcase']['grid_productos_nube']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- codigobar
   function NM_export_codigobar()
   {
         $this->codigobar = html_entity_decode($this->codigobar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigobar = strip_tags($this->codigobar);
         $this->codigobar = NM_charset_to_utf8($this->codigobar);
         $this->codigobar = str_replace('<', '&lt;', $this->codigobar);
         $this->codigobar = str_replace('>', '&gt;', $this->codigobar);
         $this->Texto_tag .= "<td>" . $this->codigobar . "</td>\r\n";
   }
   //----- nompro
   function NM_export_nompro()
   {
         $this->nompro = html_entity_decode($this->nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nompro = strip_tags($this->nompro);
         $this->nompro = NM_charset_to_utf8($this->nompro);
         $this->nompro = str_replace('<', '&lt;', $this->nompro);
         $this->nompro = str_replace('>', '&gt;', $this->nompro);
         $this->Texto_tag .= "<td>" . $this->nompro . "</td>\r\n";
   }
   //----- idgrup
   function NM_export_idgrup()
   {
         nmgp_Form_Num_Val($this->look_idgrup, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idgrup = NM_charset_to_utf8($this->look_idgrup);
         $this->look_idgrup = str_replace('<', '&lt;', $this->look_idgrup);
         $this->look_idgrup = str_replace('>', '&gt;', $this->look_idgrup);
         $this->Texto_tag .= "<td>" . $this->look_idgrup . "</td>\r\n";
   }
   //----- preciomen
   function NM_export_preciomen()
   {
             nmgp_Form_Num_Val($this->preciomen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciomen = NM_charset_to_utf8($this->preciomen);
         $this->preciomen = str_replace('<', '&lt;', $this->preciomen);
         $this->preciomen = str_replace('>', '&gt;', $this->preciomen);
         $this->Texto_tag .= "<td>" . $this->preciomen . "</td>\r\n";
   }
   //----- preciomen2
   function NM_export_preciomen2()
   {
             nmgp_Form_Num_Val($this->preciomen2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciomen2 = NM_charset_to_utf8($this->preciomen2);
         $this->preciomen2 = str_replace('<', '&lt;', $this->preciomen2);
         $this->preciomen2 = str_replace('>', '&gt;', $this->preciomen2);
         $this->Texto_tag .= "<td>" . $this->preciomen2 . "</td>\r\n";
   }
   //----- preciomen3
   function NM_export_preciomen3()
   {
             nmgp_Form_Num_Val($this->preciomen3, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciomen3 = NM_charset_to_utf8($this->preciomen3);
         $this->preciomen3 = str_replace('<', '&lt;', $this->preciomen3);
         $this->preciomen3 = str_replace('>', '&gt;', $this->preciomen3);
         $this->Texto_tag .= "<td>" . $this->preciomen3 . "</td>\r\n";
   }
   //----- unimen
   function NM_export_unimen()
   {
         $this->unimen = html_entity_decode($this->unimen, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unimen = strip_tags($this->unimen);
         $this->unimen = NM_charset_to_utf8($this->unimen);
         $this->unimen = str_replace('<', '&lt;', $this->unimen);
         $this->unimen = str_replace('>', '&gt;', $this->unimen);
         $this->Texto_tag .= "<td>" . $this->unimen . "</td>\r\n";
   }
   //----- existencia_menor
   function NM_export_existencia_menor()
   {
             nmgp_Form_Num_Val($this->existencia_menor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->existencia_menor = NM_charset_to_utf8($this->existencia_menor);
         $this->existencia_menor = str_replace('<', '&lt;', $this->existencia_menor);
         $this->existencia_menor = str_replace('>', '&gt;', $this->existencia_menor);
         $this->Texto_tag .= "<td>" . $this->existencia_menor . "</td>\r\n";
   }
   //----- preciofull
   function NM_export_preciofull()
   {
             nmgp_Form_Num_Val($this->preciofull, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciofull = NM_charset_to_utf8($this->preciofull);
         $this->preciofull = str_replace('<', '&lt;', $this->preciofull);
         $this->preciofull = str_replace('>', '&gt;', $this->preciofull);
         $this->Texto_tag .= "<td>" . $this->preciofull . "</td>\r\n";
   }
   //----- precio2
   function NM_export_precio2()
   {
             nmgp_Form_Num_Val($this->precio2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->precio2 = NM_charset_to_utf8($this->precio2);
         $this->precio2 = str_replace('<', '&lt;', $this->precio2);
         $this->precio2 = str_replace('>', '&gt;', $this->precio2);
         $this->Texto_tag .= "<td>" . $this->precio2 . "</td>\r\n";
   }
   //----- preciomay
   function NM_export_preciomay()
   {
             nmgp_Form_Num_Val($this->preciomay, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciomay = NM_charset_to_utf8($this->preciomay);
         $this->preciomay = str_replace('<', '&lt;', $this->preciomay);
         $this->preciomay = str_replace('>', '&gt;', $this->preciomay);
         $this->Texto_tag .= "<td>" . $this->preciomay . "</td>\r\n";
   }
   //----- unimay
   function NM_export_unimay()
   {
         $this->unimay = html_entity_decode($this->unimay, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unimay = strip_tags($this->unimay);
         $this->unimay = NM_charset_to_utf8($this->unimay);
         $this->unimay = str_replace('<', '&lt;', $this->unimay);
         $this->unimay = str_replace('>', '&gt;', $this->unimay);
         $this->Texto_tag .= "<td>" . $this->unimay . "</td>\r\n";
   }
   //----- stockmen
   function NM_export_stockmen()
   {
             nmgp_Form_Num_Val($this->stockmen, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->stockmen = NM_charset_to_utf8($this->stockmen);
         $this->stockmen = str_replace('<', '&lt;', $this->stockmen);
         $this->stockmen = str_replace('>', '&gt;', $this->stockmen);
         $this->Texto_tag .= "<td>" . $this->stockmen . "</td>\r\n";
   }
   //----- idprod
   function NM_export_idprod()
   {
             nmgp_Form_Num_Val($this->idprod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idprod = NM_charset_to_utf8($this->idprod);
         $this->idprod = str_replace('<', '&lt;', $this->idprod);
         $this->idprod = str_replace('>', '&gt;', $this->idprod);
         $this->Texto_tag .= "<td>" . $this->idprod . "</td>\r\n";
   }
   //----- codigoprod
   function NM_export_codigoprod()
   {
         $this->codigoprod = html_entity_decode($this->codigoprod, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigoprod = strip_tags($this->codigoprod);
         $this->codigoprod = NM_charset_to_utf8($this->codigoprod);
         $this->codigoprod = str_replace('<', '&lt;', $this->codigoprod);
         $this->codigoprod = str_replace('>', '&gt;', $this->codigoprod);
         $this->Texto_tag .= "<td>" . $this->codigoprod . "</td>\r\n";
   }
   //----- unidmaymen
   function NM_export_unidmaymen()
   {
         $this->unidmaymen = html_entity_decode($this->unidmaymen, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unidmaymen = strip_tags($this->unidmaymen);
         $this->unidmaymen = NM_charset_to_utf8($this->unidmaymen);
         $this->unidmaymen = str_replace('<', '&lt;', $this->unidmaymen);
         $this->unidmaymen = str_replace('>', '&gt;', $this->unidmaymen);
         $this->Texto_tag .= "<td>" . $this->unidmaymen . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos_nube'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - productos :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_productos_nube_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_productos_nube"> 
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
