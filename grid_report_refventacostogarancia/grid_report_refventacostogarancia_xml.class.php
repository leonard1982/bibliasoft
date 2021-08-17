<?php

class grid_report_refventacostogarancia_xml
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
   var $sum_cantidad;
   var $sum_valor_parcial;
   var $sum_costop;
   var $sum_gananciap;

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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['opcao'] = "";
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
                   nm_limpa_str_grid_report_refventacostogarancia($cadapar[1]);
                   nm_protect_num_grid_report_refventacostogarancia($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_report_refventacostogarancia']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_report_refventacostogarancia/grid_report_refventacostogarancia_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_report_refventacostogarancia_total.class.php"); 
      $this->Tot      = new grid_report_refventacostogarancia_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "Referencia")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "Descripcion")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "banco")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "tipo")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "documento")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][2];
              $this->sum_valor_parcial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][3];
              $this->sum_costop = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][4];
              $this->sum_gananciap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['tot_geral'][5];
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_report_refventacostogarancia']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_report_refventacostogarancia.zip";
      $this->Arquivo     .= "_grid_report_refventacostogarancia";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_report_refventacostogarancia.xml";
      $this->Tit_zip      = "grid_report_refventacostogarancia.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_report_refventacostogarancia']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_report_refventacostogarancia']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_report_refventacostogarancia']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->referencia = $Busca_temp['referencia']; 
          $tmp_pos = strpos($this->referencia, "##@@");
          if ($tmp_pos !== false && !is_array($this->referencia))
          {
              $this->referencia = substr($this->referencia, 0, $tmp_pos);
          }
          $this->descripcion = $Busca_temp['descripcion']; 
          $tmp_pos = strpos($this->descripcion, "##@@");
          if ($tmp_pos !== false && !is_array($this->descripcion))
          {
              $this->descripcion = substr($this->descripcion, 0, $tmp_pos);
          }
          $this->fecha_inicial = $Busca_temp['fecha_inicial']; 
          $tmp_pos = strpos($this->fecha_inicial, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_inicial))
          {
              $this->fecha_inicial = substr($this->fecha_inicial, 0, $tmp_pos);
          }
          $this->fecha_final = $Busca_temp['fecha_final']; 
          $tmp_pos = strpos($this->fecha_final, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_final))
          {
              $this->fecha_final = substr($this->fecha_final, 0, $tmp_pos);
          }
          $this->f_tipo = $Busca_temp['f_tipo']; 
          $tmp_pos = strpos($this->f_tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_tipo))
          {
              $this->f_tipo = substr($this->f_tipo, 0, $tmp_pos);
          }
          $this->devolucion = $Busca_temp['devolucion']; 
          $tmp_pos = strpos($this->devolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->devolucion))
          {
              $this->devolucion = substr($this->devolucion, 0, $tmp_pos);
          }
          $this->numfac = $Busca_temp['numfac']; 
          $tmp_pos = strpos($this->numfac, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfac))
          {
              $this->numfac = substr($this->numfac, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
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
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT f.idfacven as f_idfacven, str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20) as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT f.idfacven as f_idfacven, f.fechaven as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT f.idfacven as f_idfacven, convert(char(23),f.fechaven,121) as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT f.idfacven as f_idfacven, f.fechaven as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT f.idfacven as f_idfacven, EXTEND(f.fechaven, YEAR TO DAY) as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT f.idfacven as f_idfacven, f.fechaven as fecha_inicial, if(d.cantidad<0,'S','N') as devolucion, p.codigobar as referencia, p.nompro as descripcion, d.cantidad as cantidad, ((d.valorpar-d.iva)/d.cantidad) as precioventa, (d.cantidad * ((d.valorpar-d.iva)/d.cantidad)) as valor_parcial, (d.cantidad * p.costomen) as costop, (d.cantidad * (((d.valorpar-d.iva)/d.cantidad)-p.costomen)) as gananciap, b.codigo_banco as b_codigo_banco, f.pagada as f_pagada, if(f.nremision is null,'N','S') as remision, f.tipo as f_tipo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_report_refventacostogarancia>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_report_refventacostogarancia";
         }
         $this->f_idfacven = $rs->fields[0] ;  
         $this->f_idfacven = (string)$this->f_idfacven;
         $this->fecha_inicial = $rs->fields[1] ;  
         $this->devolucion = $rs->fields[2] ;  
         $this->referencia = $rs->fields[3] ;  
         $this->descripcion = $rs->fields[4] ;  
         $this->cantidad = $rs->fields[5] ;  
         $this->cantidad = (strpos(strtolower($this->cantidad), "e")) ? (float)$this->cantidad : $this->cantidad; 
         $this->cantidad = (string)$this->cantidad;
         $this->precioventa = $rs->fields[6] ;  
         $this->precioventa =  str_replace(",", ".", $this->precioventa);
         $this->precioventa = (strpos(strtolower($this->precioventa), "e")) ? (float)$this->precioventa : $this->precioventa; 
         $this->precioventa = (string)$this->precioventa;
         $this->valor_parcial = $rs->fields[7] ;  
         $this->valor_parcial =  str_replace(",", ".", $this->valor_parcial);
         $this->valor_parcial = (strpos(strtolower($this->valor_parcial), "e")) ? (float)$this->valor_parcial : $this->valor_parcial; 
         $this->valor_parcial = (string)$this->valor_parcial;
         $this->costop = $rs->fields[8] ;  
         $this->costop =  str_replace(",", ".", $this->costop);
         $this->costop = (strpos(strtolower($this->costop), "e")) ? (float)$this->costop : $this->costop; 
         $this->costop = (string)$this->costop;
         $this->gananciap = $rs->fields[9] ;  
         $this->gananciap =  str_replace(",", ".", $this->gananciap);
         $this->gananciap = (strpos(strtolower($this->gananciap), "e")) ? (float)$this->gananciap : $this->gananciap; 
         $this->gananciap = (string)$this->gananciap;
         $this->b_codigo_banco = $rs->fields[10] ;  
         $this->f_pagada = $rs->fields[11] ;  
         $this->remision = $rs->fields[12] ;  
         $this->f_tipo = $rs->fields[13] ;  
         //----- lookup - f_idfacven
         $this->look_f_idfacven = $this->f_idfacven; 
         $this->Lookup->lookup_f_idfacven($this->look_f_idfacven, $this->f_idfacven) ; 
         $this->look_f_idfacven = ($this->look_f_idfacven == "&nbsp;") ? "" : $this->look_f_idfacven; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_report_refventacostogarancia>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_report_refventacostogarancia_res_xml.class.php");
              $this->Res = new grid_report_refventacostogarancia_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_file']['xml'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_file']['xml']);
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
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_file']['view'];
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- f_idfacven
   function NM_export_f_idfacven()
   {
         nmgp_Form_Num_Val($this->look_f_idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_f_idfacven))
         {
             $this->look_f_idfacven = sc_convert_encoding($this->look_f_idfacven, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['f_idfacven'])) ? $this->New_label['f_idfacven'] : "Documento"; 
         }
         else
         {
             $SC_Label = "f_idfacven"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_f_idfacven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_f_idfacven) . "\"";
         }
   }
   //----- fecha_inicial
   function NM_export_fecha_inicial()
   {
             $conteudo_x =  $this->fecha_inicial;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_inicial, "YYYY-MM-DD  ");
                 $this->fecha_inicial = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_inicial'])) ? $this->New_label['fecha_inicial'] : "Fecha"; 
         }
         else
         {
             $SC_Label = "fecha_inicial"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_inicial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_inicial) . "\"";
         }
   }
   //----- devolucion
   function NM_export_devolucion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->devolucion))
         {
             $this->devolucion = sc_convert_encoding($this->devolucion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['devolucion'])) ? $this->New_label['devolucion'] : "DV"; 
         }
         else
         {
             $SC_Label = "devolucion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->devolucion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->devolucion) . "\"";
         }
   }
   //----- referencia
   function NM_export_referencia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->referencia))
         {
             $this->referencia = sc_convert_encoding($this->referencia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['referencia'])) ? $this->New_label['referencia'] : "Referencia"; 
         }
         else
         {
             $SC_Label = "referencia"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->referencia) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->referencia) . "\"";
         }
   }
   //----- descripcion
   function NM_export_descripcion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->descripcion))
         {
             $this->descripcion = sc_convert_encoding($this->descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : "Descripcion"; 
         }
         else
         {
             $SC_Label = "descripcion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->descripcion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->descripcion) . "\"";
         }
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
         }
         else
         {
             $SC_Label = "cantidad"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cantidad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cantidad) . "\"";
         }
   }
   //----- precioventa
   function NM_export_precioventa()
   {
             nmgp_Form_Num_Val($this->precioventa, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['precioventa'])) ? $this->New_label['precioventa'] : "Base/U"; 
         }
         else
         {
             $SC_Label = "precioventa"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->precioventa) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->precioventa) . "\"";
         }
   }
   //----- valor_parcial
   function NM_export_valor_parcial()
   {
             nmgp_Form_Num_Val($this->valor_parcial, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_parcial'])) ? $this->New_label['valor_parcial'] : "Total"; 
         }
         else
         {
             $SC_Label = "valor_parcial"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_parcial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_parcial) . "\"";
         }
   }
   //----- costop
   function NM_export_costop()
   {
             nmgp_Form_Num_Val($this->costop, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['costop'])) ? $this->New_label['costop'] : "Costo"; 
         }
         else
         {
             $SC_Label = "costop"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->costop) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->costop) . "\"";
         }
   }
   //----- gananciap
   function NM_export_gananciap()
   {
             nmgp_Form_Num_Val($this->gananciap, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['gananciap'])) ? $this->New_label['gananciap'] : "Ganancia"; 
         }
         else
         {
             $SC_Label = "gananciap"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->gananciap) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->gananciap) . "\"";
         }
   }
   //----- b_codigo_banco
   function NM_export_b_codigo_banco()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->b_codigo_banco))
         {
             $this->b_codigo_banco = sc_convert_encoding($this->b_codigo_banco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['b_codigo_banco'])) ? $this->New_label['b_codigo_banco'] : "Banco"; 
         }
         else
         {
             $SC_Label = "b_codigo_banco"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->b_codigo_banco) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->b_codigo_banco) . "\"";
         }
   }
   //----- f_pagada
   function NM_export_f_pagada()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_pagada))
         {
             $this->f_pagada = sc_convert_encoding($this->f_pagada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['f_pagada'])) ? $this->New_label['f_pagada'] : "Pagada"; 
         }
         else
         {
             $SC_Label = "f_pagada"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_pagada) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_pagada) . "\"";
         }
   }
   //----- remision
   function NM_export_remision()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->remision))
         {
             $this->remision = sc_convert_encoding($this->remision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['remision'])) ? $this->New_label['remision'] : "Remision"; 
         }
         else
         {
             $SC_Label = "remision"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->remision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->remision) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Referencia Venta/Costo/Ganancia :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_report_refventacostogarancia_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_report_refventacostogarancia"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_report_refventacostogarancia']['xml_return']); ?>"> 
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
