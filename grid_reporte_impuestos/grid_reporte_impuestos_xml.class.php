<?php

class grid_reporte_impuestos_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;
   var $sum_subtotal;
   var $sum_valoriva;
   var $sum_total;
   var $sum_base_iva_19;
   var $sum_valor_iva_19;
   var $sum_base_iva_5;
   var $sum_valor_iva_5;
   var $sum_excento;
   var $sum_ing_terceros;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
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
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['opcao'] = "";
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
                   nm_limpa_str_grid_reporte_impuestos($cadapar[1]);
                   nm_protect_num_grid_reporte_impuestos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_reporte_impuestos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gcorreo_receptor)) 
      {
          $_SESSION['gcorreo_receptor'] = $gcorreo_receptor;
          nm_limpa_str_grid_reporte_impuestos($_SESSION["gcorreo_receptor"]);
      }
      if (isset($gcorreo_asunto)) 
      {
          $_SESSION['gcorreo_asunto'] = $gcorreo_asunto;
          nm_limpa_str_grid_reporte_impuestos($_SESSION["gcorreo_asunto"]);
      }
      if (isset($gcorreo_mensaje)) 
      {
          $_SESSION['gcorreo_mensaje'] = $gcorreo_mensaje;
          nm_limpa_str_grid_reporte_impuestos($_SESSION["gcorreo_mensaje"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = true;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_reporte_impuestos/grid_reporte_impuestos_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_reporte_impuestos_total.class.php"); 
      $this->Tot      = new grid_reporte_impuestos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['SC_Ind_Groupby'] == "periodo")
          {
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][2];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][3];
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][9];
              $this->sum_ing_terceros = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['tot_geral'][10];
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_impuestos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_reporte_impuestos.zip";
      $this->Arquivo     .= "_grid_reporte_impuestos";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_reporte_impuestos.xml";
      $this->Tit_zip      = "grid_reporte_impuestos.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_impuestos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['campos_busca'];
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
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->correo_receptor = $Busca_temp['correo_receptor']; 
          $tmp_pos = strpos($this->correo_receptor, "##@@");
          if ($tmp_pos !== false && !is_array($this->correo_receptor))
          {
              $this->correo_receptor = substr($this->correo_receptor, 0, $tmp_pos);
          }
          $this->asunto = $Busca_temp['asunto']; 
          $tmp_pos = strpos($this->asunto, "##@@");
          if ($tmp_pos !== false && !is_array($this->asunto))
          {
              $this->asunto = substr($this->asunto, 0, $tmp_pos);
          }
          $this->mensaje = $Busca_temp['mensaje']; 
          $tmp_pos = strpos($this->mensaje, "##@@");
          if ($tmp_pos !== false && !is_array($this->mensaje))
          {
              $this->mensaje = substr($this->mensaje, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT tipo, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tipo, fechaven, numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT tipo, convert(char(23),fechaven,121), numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tipo, fechaven, numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tipo, EXTEND(fechaven, YEAR TO DAY), numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT tipo, fechaven, numero2, idcli, subtotal, valoriva, total, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, ing_terceros from (SELECT      f.idfacven as idfacven,     f.numfacven as numfacven,     f.credito as credito,     f.fechaven as fechaven,     f.fechavenc as fechavenc,     f.idcli as idcli,     f.subtotal as subtotal,     f.valoriva as valoriva,     f.total as total,     f.pagada as pagada,     f.saldo as saldo,     f.adicional as adicional,     f.adicional2 as adicional2,     f.adicional3 as adicional3,     f.resolucion as adicional4,     f.vendedor as vendedor,     f.creado as creado,     f.editado as editado,     f.usuario_crea as usuario_crea,     f.creado as inicio,     f.creado as fin,     f.dias_decredito as dias_decredito,     f.tipo as tipo,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numero2,     f.fecha_validacion as fecha_validacion,     f.cufe as cufe,     t.direccion as direccion,     (MONTH(f.fechaven)) as periodo,     (YEAR(f.fechaven)) as anio,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=f.idfacven and v.adicional='0'),0) as excento, coalesce((select sum(v.valorpar-v.iva) from detalleventa v left join productos p on v.idpro=p.idprod where v.numfac=f.idfacven and v.adicional='0' and p.tipo_producto='RE'),0) as ing_terceros,    t.documento FROM      facturaven f     inner join terceros t on f.idcli=t.idtercero WHERE    f.asentada='1' and f.tipo='FV' ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['order_grid'];
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
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_reporte_impuestos>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_reporte_impuestos";
         }
         $this->tipo = $rs->fields[0] ;  
         $this->fechaven = $rs->fields[1] ;  
         $this->numero2 = $rs->fields[2] ;  
         $this->idcli = $rs->fields[3] ;  
         $this->idcli = (string)$this->idcli;
         $this->subtotal = $rs->fields[4] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[5] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
         $this->total = $rs->fields[6] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->base_iva_19 = $rs->fields[7] ;  
         $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
         $this->base_iva_19 = (string)$this->base_iva_19;
         $this->valor_iva_19 = $rs->fields[8] ;  
         $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
         $this->valor_iva_19 = (string)$this->valor_iva_19;
         $this->base_iva_5 = $rs->fields[9] ;  
         $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
         $this->base_iva_5 = (string)$this->base_iva_5;
         $this->valor_iva_5 = $rs->fields[10] ;  
         $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
         $this->valor_iva_5 = (string)$this->valor_iva_5;
         $this->excento = $rs->fields[11] ;  
         $this->excento =  str_replace(",", ".", $this->excento);
         $this->excento = (string)$this->excento;
         $this->ing_terceros = $rs->fields[12] ;  
         $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
         $this->ing_terceros = (string)$this->ing_terceros;
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_reporte_impuestos>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_reporte_impuestos_res_xml.class.php");
              $this->Res = new grid_reporte_impuestos_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- tipo
   function NM_export_tipo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo))
         {
             $this->tipo = sc_convert_encoding($this->tipo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
         }
         else
         {
             $SC_Label = "tipo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipo) . "\"";
         }
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
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
         }
         else
         {
             $SC_Label = "fechaven"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechaven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechaven) . "\"";
         }
   }
   //----- numero2
   function NM_export_numero2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numero2))
         {
             $this->numero2 = sc_convert_encoding($this->numero2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['numero2'])) ? $this->New_label['numero2'] : "Numero 2"; 
         }
         else
         {
             $SC_Label = "numero2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->numero2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->numero2) . "\"";
         }
   }
   //----- idcli
   function NM_export_idcli()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_idcli))
         {
             $this->look_idcli = sc_convert_encoding($this->look_idcli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "idcli"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_idcli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_idcli) . "\"";
         }
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
         }
         else
         {
             $SC_Label = "subtotal"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->subtotal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->subtotal) . "\"";
         }
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Impuesto"; 
         }
         else
         {
             $SC_Label = "valoriva"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valoriva) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valoriva) . "\"";
         }
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->total) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->total) . "\"";
         }
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base 19"; 
         }
         else
         {
             $SC_Label = "base_iva_19"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->base_iva_19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->base_iva_19) . "\"";
         }
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "IVA 19"; 
         }
         else
         {
             $SC_Label = "valor_iva_19"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_iva_19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_iva_19) . "\"";
         }
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base 5"; 
         }
         else
         {
             $SC_Label = "base_iva_5"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->base_iva_5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->base_iva_5) . "\"";
         }
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "IVA 5"; 
         }
         else
         {
             $SC_Label = "valor_iva_5"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_iva_5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_iva_5) . "\"";
         }
   }
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Exento"; 
         }
         else
         {
             $SC_Label = "excento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->excento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->excento) . "\"";
         }
   }
   //----- ing_terceros
   function NM_export_ing_terceros()
   {
             nmgp_Form_Num_Val($this->ing_terceros, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['ing_terceros'])) ? $this->New_label['ing_terceros'] : "Ing/Terceros"; 
         }
         else
         {
             $SC_Label = "ing_terceros"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ing_terceros) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ing_terceros) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte Impuestos :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_reporte_impuestos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_reporte_impuestos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos']['xml_return']); ?>"> 
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
