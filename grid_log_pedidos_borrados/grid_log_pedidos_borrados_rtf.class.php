<?php

class grid_log_pedidos_borrados_rtf
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
                   nm_limpa_str_grid_log_pedidos_borrados($cadapar[1]);
                   nm_protect_num_grid_log_pedidos_borrados($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_log_pedidos_borrados']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_log_pedidos_borrados_total.class.php"); 
      $this->Tot      = new grid_log_pedidos_borrados_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['tot_geral'][2];
              $this->sum_valorpar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_valorpar = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_log_pedidos_borrados']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_log_pedidos_borrados";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_log_pedidos_borrados.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_log_pedidos_borrados']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_log_pedidos_borrados']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_log_pedidos_borrados']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->anio = $Busca_temp['anio']; 
          $tmp_pos = strpos($this->anio, "##@@");
          if ($tmp_pos !== false && !is_array($this->anio))
          {
              $this->anio = substr($this->anio, 0, $tmp_pos);
          }
          $this->periodo = $Busca_temp['periodo']; 
          $tmp_pos = strpos($this->periodo, "##@@");
          if ($tmp_pos !== false && !is_array($this->periodo))
          {
              $this->periodo = substr($this->periodo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->mesa_cliente = $Busca_temp['mesa_cliente']; 
          $tmp_pos = strpos($this->mesa_cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->mesa_cliente))
          {
              $this->mesa_cliente = substr($this->mesa_cliente, 0, $tmp_pos);
          }
          $this->descr = $Busca_temp['descr']; 
          $tmp_pos = strpos($this->descr, "##@@");
          if ($tmp_pos !== false && !is_array($this->descr))
          {
              $this->descr = substr($this->descr, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['anio'])) ? $this->New_label['anio'] : "Año"; 
          if ($Cada_col == "anio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['periodo'])) ? $this->New_label['periodo'] : "Periodo"; 
          if ($Cada_col == "periodo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['mesa_cliente'])) ? $this->New_label['mesa_cliente'] : "Mesa/Cliente"; 
          if ($Cada_col == "mesa_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descr'])) ? $this->New_label['descr'] : "Producto"; 
          if ($Cada_col == "descr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['valorpar'])) ? $this->New_label['valorpar'] : "Valor Línea"; 
          if ($Cada_col == "valorpar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT anio, periodo, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT anio, periodo, fechaven, numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT anio, periodo, convert(char(23),fechaven,121), numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT anio, periodo, fechaven, numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT anio, periodo, EXTEND(fechaven, YEAR TO DAY), numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT anio, periodo, fechaven, numero, mesa_cliente, descr, cantidad, valorpar, vendedor from (select  YEAR(ps.fechaven) as anio, MONTH(ps.fechaven) as periodo, ps.fechaven,  concat((select r.prefijo from resdian r where r.Idres=ps.prefijo_ped),'/',ps.numpedido) as numero,  ps.idcli as mesa_cliente,  dps.descr,  dps.cantidad,  dps.valorpar,  ps.vendedor as vendedor  from  pedidos_self ps  left join detallepedido_self dps on dps.idpedid=ps.idpedido  where  dps.descr is not null and (select p.idpedido from pedidos p where p.idpedido=ps.idpedido) is null) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['order_grid'];
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
         $this->anio = $rs->fields[0] ;  
         $this->anio = (string)$this->anio;
         $this->periodo = $rs->fields[1] ;  
         $this->periodo = (string)$this->periodo;
         $this->fechaven = $rs->fields[2] ;  
         $this->numero = $rs->fields[3] ;  
         $this->mesa_cliente = $rs->fields[4] ;  
         $this->mesa_cliente = (string)$this->mesa_cliente;
         $this->descr = $rs->fields[5] ;  
         $this->cantidad = $rs->fields[6] ;  
         $this->cantidad =  str_replace(",", ".", $this->cantidad);
         $this->cantidad = (string)$this->cantidad;
         $this->valorpar = $rs->fields[7] ;  
         $this->valorpar =  str_replace(",", ".", $this->valorpar);
         $this->valorpar = (string)$this->valorpar;
         $this->vendedor = $rs->fields[8] ;  
         $this->vendedor = (string)$this->vendedor;
         //----- lookup - periodo
         $this->look_periodo = $this->periodo; 
         $this->Lookup->lookup_periodo($this->look_periodo); 
         $this->look_periodo = ($this->look_periodo == "&nbsp;") ? "" : $this->look_periodo; 
         //----- lookup - mesa_cliente
         $this->look_mesa_cliente = $this->mesa_cliente; 
         $this->Lookup->lookup_mesa_cliente($this->look_mesa_cliente, $this->mesa_cliente) ; 
         $this->look_mesa_cliente = ($this->look_mesa_cliente == "&nbsp;") ? "" : $this->look_mesa_cliente; 
         //----- lookup - vendedor
         $this->look_vendedor = $this->vendedor; 
         $this->Lookup->lookup_vendedor($this->look_vendedor, $this->vendedor) ; 
         $this->look_vendedor = ($this->look_vendedor == "&nbsp;") ? "" : $this->look_vendedor; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- anio
   function NM_export_anio()
   {
             nmgp_Form_Num_Val($this->anio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anio = NM_charset_to_utf8($this->anio);
         $this->anio = str_replace('<', '&lt;', $this->anio);
         $this->anio = str_replace('>', '&gt;', $this->anio);
         $this->Texto_tag .= "<td>" . $this->anio . "</td>\r\n";
   }
   //----- periodo
   function NM_export_periodo()
   {
         $this->look_periodo = NM_charset_to_utf8($this->look_periodo);
         $this->look_periodo = str_replace('<', '&lt;', $this->look_periodo);
         $this->look_periodo = str_replace('>', '&gt;', $this->look_periodo);
         $this->Texto_tag .= "<td>" . $this->look_periodo . "</td>\r\n";
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
   //----- mesa_cliente
   function NM_export_mesa_cliente()
   {
         $this->look_mesa_cliente = html_entity_decode($this->look_mesa_cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_mesa_cliente = strip_tags($this->look_mesa_cliente);
         $this->look_mesa_cliente = NM_charset_to_utf8($this->look_mesa_cliente);
         $this->look_mesa_cliente = str_replace('<', '&lt;', $this->look_mesa_cliente);
         $this->look_mesa_cliente = str_replace('>', '&gt;', $this->look_mesa_cliente);
         $this->Texto_tag .= "<td>" . $this->look_mesa_cliente . "</td>\r\n";
   }
   //----- descr
   function NM_export_descr()
   {
         $this->descr = html_entity_decode($this->descr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descr = strip_tags($this->descr);
         $this->descr = NM_charset_to_utf8($this->descr);
         $this->descr = str_replace('<', '&lt;', $this->descr);
         $this->descr = str_replace('>', '&gt;', $this->descr);
         $this->Texto_tag .= "<td>" . $this->descr . "</td>\r\n";
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         $this->cantidad = str_replace('<', '&lt;', $this->cantidad);
         $this->cantidad = str_replace('>', '&gt;', $this->cantidad);
         $this->Texto_tag .= "<td>" . $this->cantidad . "</td>\r\n";
   }
   //----- valorpar
   function NM_export_valorpar()
   {
             nmgp_Form_Num_Val($this->valorpar, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         $this->valorpar = NM_charset_to_utf8($this->valorpar);
         $this->valorpar = str_replace('<', '&lt;', $this->valorpar);
         $this->valorpar = str_replace('>', '&gt;', $this->valorpar);
         $this->Texto_tag .= "<td>" . $this->valorpar . "</td>\r\n";
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         $this->look_vendedor = html_entity_decode($this->look_vendedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_vendedor = strip_tags($this->look_vendedor);
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         $this->look_vendedor = str_replace('<', '&lt;', $this->look_vendedor);
         $this->look_vendedor = str_replace('>', '&gt;', $this->look_vendedor);
         $this->Texto_tag .= "<td>" . $this->look_vendedor . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_log_pedidos_borrados'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Pedidos Borrados :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_log_pedidos_borrados_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_log_pedidos_borrados"> 
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
