<?php

class impresion_pos_pdf_rtf
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
                   nm_limpa_str_impresion_pos_pdf($cadapar[1]);
                   nm_protect_num_impresion_pos_pdf($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['impresion_pos_pdf']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gidfacven)) 
      {
          $_SESSION['gidfacven'] = $gidfacven;
          nm_limpa_str_impresion_pos_pdf($_SESSION["gidfacven"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "impresion_pos_pdf_total.class.php"); 
      $this->Tot      = new impresion_pos_pdf_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['impresion_pos_pdf']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_impresion_pos_pdf";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "impresion_pos_pdf.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->total = $Busca_temp['total']; 
          $tmp_pos = strpos($this->total, "##@@");
          if ($tmp_pos !== false && !is_array($this->total))
          {
              $this->total = substr($this->total, 0, $tmp_pos);
          }
          $this->total_2 = $Busca_temp['total_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->nombres = $Busca_temp['nombres']; 
          $tmp_pos = strpos($this->nombres, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombres))
          {
              $this->nombres = substr($this->nombres, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fechaven"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
          if ($Cada_col == "nombres" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
          if ($Cada_col == "vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['resoluciondian'])) ? $this->New_label['resoluciondian'] : "Resoluciondian"; 
          if ($Cada_col == "resoluciondian" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rango'])) ? $this->New_label['rango'] : "Rango"; 
          if ($Cada_col == "rango" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "detalle"; 
          if ($Cada_col == "detalle" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['impuestos'])) ? $this->New_label['impuestos'] : "impuestos"; 
          if ($Cada_col == "impuestos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['impuestos_tipo_iva'])) ? $this->New_label['impuestos_tipo_iva'] : "Tipo Iva"; 
          if ($Cada_col == "impuestos_tipo_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['impuestos_valor_iva'])) ? $this->New_label['impuestos_valor_iva'] : "Valor Iva"; 
          if ($Cada_col == "impuestos_valor_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['impuestos_base'])) ? $this->New_label['impuestos_base'] : "Base"; 
          if ($Cada_col == "impuestos_base" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['impuestos_total'])) ? $this->New_label['impuestos_total'] : "Total"; 
          if ($Cada_col == "impuestos_total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_p_codigobar'])) ? $this->New_label['detalle_p_codigobar'] : "Codigobar"; 
          if ($Cada_col == "detalle_p_codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_p_nompro'])) ? $this->New_label['detalle_p_nompro'] : "Nompro"; 
          if ($Cada_col == "detalle_p_nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_d_cantidad'])) ? $this->New_label['detalle_d_cantidad'] : "Cantidad"; 
          if ($Cada_col == "detalle_d_cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_d_valorunit'])) ? $this->New_label['detalle_d_valorunit'] : "Valorunit"; 
          if ($Cada_col == "detalle_d_valorunit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_d_valorpar'])) ? $this->New_label['detalle_d_valorpar'] : "Valorpar"; 
          if ($Cada_col == "detalle_d_valorpar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_linea'])) ? $this->New_label['detalle_linea'] : "Linea"; 
          if ($Cada_col == "detalle_linea" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),fechaven,121), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fechaven, YEAR TO DAY), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['order_grid'];
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
         $this->fechaven = $rs->fields[0] ;  
         $this->total = $rs->fields[1] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->documento = $rs->fields[2] ;  
         $this->nombres = $rs->fields[3] ;  
         $this->vendedor = $rs->fields[4] ;  
         $this->numero = $rs->fields[5] ;  
         $this->resoluciondian = $rs->fields[6] ;  
         $this->rango = $rs->fields[7] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
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
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
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
   //----- nombres
   function NM_export_nombres()
   {
         $this->nombres = html_entity_decode($this->nombres, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombres = strip_tags($this->nombres);
         $this->nombres = NM_charset_to_utf8($this->nombres);
         $this->nombres = str_replace('<', '&lt;', $this->nombres);
         $this->nombres = str_replace('>', '&gt;', $this->nombres);
         $this->Texto_tag .= "<td>" . $this->nombres . "</td>\r\n";
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         $this->vendedor = html_entity_decode($this->vendedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vendedor = strip_tags($this->vendedor);
         $this->vendedor = NM_charset_to_utf8($this->vendedor);
         $this->vendedor = str_replace('<', '&lt;', $this->vendedor);
         $this->vendedor = str_replace('>', '&gt;', $this->vendedor);
         $this->Texto_tag .= "<td>" . $this->vendedor . "</td>\r\n";
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
   //----- resoluciondian
   function NM_export_resoluciondian()
   {
         $this->resoluciondian = html_entity_decode($this->resoluciondian, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->resoluciondian = strip_tags($this->resoluciondian);
         $this->resoluciondian = NM_charset_to_utf8($this->resoluciondian);
         $this->resoluciondian = str_replace('<', '&lt;', $this->resoluciondian);
         $this->resoluciondian = str_replace('>', '&gt;', $this->resoluciondian);
         $this->Texto_tag .= "<td>" . $this->resoluciondian . "</td>\r\n";
   }
   //----- rango
   function NM_export_rango()
   {
         $this->rango = html_entity_decode($this->rango, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rango = strip_tags($this->rango);
         $this->rango = NM_charset_to_utf8($this->rango);
         $this->rango = str_replace('<', '&lt;', $this->rango);
         $this->rango = str_replace('>', '&gt;', $this->rango);
         $this->Texto_tag .= "<td>" . $this->rango . "</td>\r\n";
   }
   //----- detalle
   function NM_export_detalle()
   {
         $this->detalle = NM_charset_to_utf8($this->detalle);
         $this->detalle = str_replace('<', '&lt;', $this->detalle);
         $this->detalle = str_replace('>', '&gt;', $this->detalle);
         $this->Texto_tag .= "<td>" . $this->detalle . "</td>\r\n";
   }
   //----- impuestos
   function NM_export_impuestos()
   {
         $this->impuestos = NM_charset_to_utf8($this->impuestos);
         $this->impuestos = str_replace('<', '&lt;', $this->impuestos);
         $this->impuestos = str_replace('>', '&gt;', $this->impuestos);
         $this->Texto_tag .= "<td>" . $this->impuestos . "</td>\r\n";
   }
   //----- impuestos_tipo_iva
   function NM_export_impuestos_tipo_iva()
   {
             nmgp_Form_Num_Val($this->impuestos_tipo_iva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->impuestos_tipo_iva = NM_charset_to_utf8($this->impuestos_tipo_iva);
         $this->impuestos_tipo_iva = str_replace('<', '&lt;', $this->impuestos_tipo_iva);
         $this->impuestos_tipo_iva = str_replace('>', '&gt;', $this->impuestos_tipo_iva);
         $this->Texto_tag .= "<td>" . $this->impuestos_tipo_iva . "</td>\r\n";
   }
   //----- impuestos_valor_iva
   function NM_export_impuestos_valor_iva()
   {
             nmgp_Form_Num_Val($this->impuestos_valor_iva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->impuestos_valor_iva = NM_charset_to_utf8($this->impuestos_valor_iva);
         $this->impuestos_valor_iva = str_replace('<', '&lt;', $this->impuestos_valor_iva);
         $this->impuestos_valor_iva = str_replace('>', '&gt;', $this->impuestos_valor_iva);
         $this->Texto_tag .= "<td>" . $this->impuestos_valor_iva . "</td>\r\n";
   }
   //----- impuestos_base
   function NM_export_impuestos_base()
   {
             nmgp_Form_Num_Val($this->impuestos_base, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->impuestos_base = NM_charset_to_utf8($this->impuestos_base);
         $this->impuestos_base = str_replace('<', '&lt;', $this->impuestos_base);
         $this->impuestos_base = str_replace('>', '&gt;', $this->impuestos_base);
         $this->Texto_tag .= "<td>" . $this->impuestos_base . "</td>\r\n";
   }
   //----- impuestos_total
   function NM_export_impuestos_total()
   {
             nmgp_Form_Num_Val($this->impuestos_total, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->impuestos_total = NM_charset_to_utf8($this->impuestos_total);
         $this->impuestos_total = str_replace('<', '&lt;', $this->impuestos_total);
         $this->impuestos_total = str_replace('>', '&gt;', $this->impuestos_total);
         $this->Texto_tag .= "<td>" . $this->impuestos_total . "</td>\r\n";
   }
   //----- detalle_p_codigobar
   function NM_export_detalle_p_codigobar()
   {
         $this->detalle_p_codigobar = html_entity_decode($this->detalle_p_codigobar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle_p_codigobar = strip_tags($this->detalle_p_codigobar);
         $this->detalle_p_codigobar = NM_charset_to_utf8($this->detalle_p_codigobar);
         $this->detalle_p_codigobar = str_replace('<', '&lt;', $this->detalle_p_codigobar);
         $this->detalle_p_codigobar = str_replace('>', '&gt;', $this->detalle_p_codigobar);
         $this->Texto_tag .= "<td>" . $this->detalle_p_codigobar . "</td>\r\n";
   }
   //----- detalle_p_nompro
   function NM_export_detalle_p_nompro()
   {
         $this->detalle_p_nompro = html_entity_decode($this->detalle_p_nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle_p_nompro = strip_tags($this->detalle_p_nompro);
         $this->detalle_p_nompro = NM_charset_to_utf8($this->detalle_p_nompro);
         $this->detalle_p_nompro = str_replace('<', '&lt;', $this->detalle_p_nompro);
         $this->detalle_p_nompro = str_replace('>', '&gt;', $this->detalle_p_nompro);
         $this->Texto_tag .= "<td>" . $this->detalle_p_nompro . "</td>\r\n";
   }
   //----- detalle_d_cantidad
   function NM_export_detalle_d_cantidad()
   {
             nmgp_Form_Num_Val($this->detalle_d_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalle_d_cantidad = NM_charset_to_utf8($this->detalle_d_cantidad);
         $this->detalle_d_cantidad = str_replace('<', '&lt;', $this->detalle_d_cantidad);
         $this->detalle_d_cantidad = str_replace('>', '&gt;', $this->detalle_d_cantidad);
         $this->Texto_tag .= "<td>" . $this->detalle_d_cantidad . "</td>\r\n";
   }
   //----- detalle_d_valorunit
   function NM_export_detalle_d_valorunit()
   {
             nmgp_Form_Num_Val($this->detalle_d_valorunit, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalle_d_valorunit = NM_charset_to_utf8($this->detalle_d_valorunit);
         $this->detalle_d_valorunit = str_replace('<', '&lt;', $this->detalle_d_valorunit);
         $this->detalle_d_valorunit = str_replace('>', '&gt;', $this->detalle_d_valorunit);
         $this->Texto_tag .= "<td>" . $this->detalle_d_valorunit . "</td>\r\n";
   }
   //----- detalle_d_valorpar
   function NM_export_detalle_d_valorpar()
   {
             nmgp_Form_Num_Val($this->detalle_d_valorpar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalle_d_valorpar = NM_charset_to_utf8($this->detalle_d_valorpar);
         $this->detalle_d_valorpar = str_replace('<', '&lt;', $this->detalle_d_valorpar);
         $this->detalle_d_valorpar = str_replace('>', '&gt;', $this->detalle_d_valorpar);
         $this->Texto_tag .= "<td>" . $this->detalle_d_valorpar . "</td>\r\n";
   }
   //----- detalle_linea
   function NM_export_detalle_linea()
   {
         $this->detalle_linea = html_entity_decode($this->detalle_linea, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle_linea = strip_tags($this->detalle_linea);
         $this->detalle_linea = NM_charset_to_utf8($this->detalle_linea);
         $this->detalle_linea = str_replace('<', '&lt;', $this->detalle_linea);
         $this->detalle_linea = str_replace('>', '&gt;', $this->detalle_linea);
         $this->Texto_tag .= "<td>" . $this->detalle_linea . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: RTF</TITLE>
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
<form name="Fdown" method="get" action="impresion_pos_pdf_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="impresion_pos_pdf"> 
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
