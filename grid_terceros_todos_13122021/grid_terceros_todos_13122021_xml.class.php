<?php

class grid_terceros_todos_13122021_xml
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "";
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
                   nm_limpa_str_grid_terceros_todos_13122021($cadapar[1]);
                   nm_protect_num_grid_terceros_todos_13122021($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_terceros_todos_13122021']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $gnube_activa;
          nm_limpa_str_grid_terceros_todos_13122021($_SESSION["gnube_activa"]);
      }
      if (isset($gnit)) 
      {
          $_SESSION['gnit'] = $gnit;
          nm_limpa_str_grid_terceros_todos_13122021($_SESSION["gnit"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_terceros_todos_13122021_total.class.php"); 
      $this->Tot      = new grid_terceros_todos_13122021_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_todos_13122021']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_terceros_todos_13122021.zip";
      $this->Arquivo     .= "_grid_terceros_todos_13122021";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_terceros_todos_13122021.xml";
      $this->Tit_zip      = "grid_terceros_todos_13122021.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->documento_2 = $Busca_temp['documento_input_2']; 
          $this->nombres = $Busca_temp['nombres']; 
          $tmp_pos = strpos($this->nombres, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombres))
          {
              $this->nombres = substr($this->nombres, 0, $tmp_pos);
          }
          $this->nombres_2 = $Busca_temp['nombres_input_2']; 
          $this->loatiende = $Busca_temp['loatiende']; 
          $tmp_pos = strpos($this->loatiende, "##@@");
          if ($tmp_pos !== false && !is_array($this->loatiende))
          {
              $this->loatiende = substr($this->loatiende, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false && !is_array($this->estado))
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
if (!isset($_SESSION['gnit'])) {$_SESSION['gnit'] = "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
 ?>
<style>
.dn-expand-button{
	color:white !important;
}
</style>
<?php

if($this->sc_temp_gnube_activa == "SI")
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "on";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "on";;
}
else
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "off";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "off";;
}

$vso   = "escritorio";

if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
{  
	$vso = "escritorio";
}
else
{
	$vso = "nube";
}

if($this->sc_temp_gnit=="88261176-7" and $vso=="nube")
{
	$this->NM_cmp_hidden["si_nomina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "on"; }
}
else
{
	$this->NM_cmp_hidden["si_nomina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "off"; }
}
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
if (isset($this->sc_temp_gnit)) {$_SESSION['gnit'] = $this->sc_temp_gnit;}
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
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
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
              $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_terceros_todos_13122021>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_terceros_todos_13122021";
         }
         $this->documento = $rs->fields[0] ;  
         $this->dv = $rs->fields[1] ;  
         $this->dv = (string)$this->dv;
         $this->nombres = $rs->fields[2] ;  
         $this->direccion = $rs->fields[3] ;  
         $this->idmuni = $rs->fields[4] ;  
         $this->idmuni = (string)$this->idmuni;
         $this->tel_cel = $rs->fields[5] ;  
         $this->cliente = $rs->fields[6] ;  
         $this->proveedor = $rs->fields[7] ;  
         $this->empleado = $rs->fields[8] ;  
         $this->si_nomina = $rs->fields[9] ;  
         $this->idtercero = $rs->fields[10] ;  
         $this->idtercero = (string)$this->idtercero;
         $this->nacimiento = $rs->fields[11] ;  
         $this->sexo = $rs->fields[12] ;  
         $this->urlmail = $rs->fields[13] ;  
         $this->fechault = $rs->fields[14] ;  
         $this->saldo = $rs->fields[15] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->afiliacion = $rs->fields[16] ;  
         $this->regimen = $rs->fields[17] ;  
         $this->tipo = $rs->fields[18] ;  
         $this->observaciones = $rs->fields[19] ;  
         $this->loatiende = $rs->fields[20] ;  
         $this->loatiende = (string)$this->loatiende;
         $this->contacto = $rs->fields[21] ;  
         $this->credito = $rs->fields[22] ;  
         $this->cupo = $rs->fields[23] ;  
         $this->cupo = (string)$this->cupo;
         $this->listaprecios = $rs->fields[24] ;  
         $this->listaprecios = (string)$this->listaprecios;
         $this->con_actual = $rs->fields[25] ;  
         $this->efec_retencion = $rs->fields[26] ;  
         $this->urlmail_1 = $rs->fields[27] ;  
         $this->nombre1 = $rs->fields[28] ;  
         $this->nombre2 = $rs->fields[29] ;  
         $this->apellido1 = $rs->fields[30] ;  
         $this->apellido2 = $rs->fields[31] ;  
         $this->sucur_cliente = $rs->fields[32] ;  
         $this->representante = $rs->fields[33] ;  
         $this->es_restaurante = $rs->fields[34] ;  
         $this->dias_credito = $rs->fields[35] ;  
         $this->dias_credito = (string)$this->dias_credito;
         $this->dias_mora = $rs->fields[36] ;  
         $this->dias_mora = (string)$this->dias_mora;
         $this->cupo_vendedor = $rs->fields[37] ;  
         $this->cupo_vendedor =  str_replace(",", ".", $this->cupo_vendedor);
         $this->cupo_vendedor = (string)$this->cupo_vendedor;
         $this->codigo_ter = $rs->fields[38] ;  
         $this->es_cajero = $rs->fields[39] ;  
         $this->autorizado = $rs->fields[40] ;  
         $this->zona_clientes = $rs->fields[41] ;  
         $this->zona_clientes = (string)$this->zona_clientes;
         $this->clasificacion_clientes = $rs->fields[42] ;  
         $this->clasificacion_clientes = (string)$this->clasificacion_clientes;
         $this->creado = $rs->fields[43] ;  
         $this->disponible = $rs->fields[44] ;  
         $this->id_pedido_tmp = $rs->fields[45] ;  
         $this->id_pedido_tmp = (string)$this->id_pedido_tmp;
         $this->n_pedido_tmp = $rs->fields[46] ;  
         $this->total_pedido_tmp = $rs->fields[47] ;  
         $this->total_pedido_tmp =  str_replace(",", ".", $this->total_pedido_tmp);
         $this->total_pedido_tmp = (string)$this->total_pedido_tmp;
         $this->obs_pedido_tmp = $rs->fields[48] ;  
         $this->vend_pedido_tmp = $rs->fields[49] ;  
         $this->ciudad = $rs->fields[50] ;  
         $this->codigo_postal = $rs->fields[51] ;  
         $this->lenguaje = $rs->fields[52] ;  
         $this->nombre_comercil = $rs->fields[53] ;  
         $this->notificar = $rs->fields[54] ;  
         $this->puc_auxiliar_deudores = $rs->fields[55] ;  
         $this->puc_retefuente_ventas = $rs->fields[56] ;  
         $this->puc_retefuente_servicios_clie = $rs->fields[57] ;  
         $this->puc_auxiliar_proveedores = $rs->fields[58] ;  
         $this->puc_retefuente_compras = $rs->fields[59] ;  
         $this->puc_retefuente_servicios_prov = $rs->fields[60] ;  
         $this->nube = $rs->fields[61] ;  
         $this->tipo_documento = $rs->fields[62] ;  
         $this->estado = $rs->fields[63] ;  
         //----- lookup - idmuni
         $this->look_idmuni = $this->idmuni; 
         $this->Lookup->lookup_idmuni($this->look_idmuni, $this->idmuni) ; 
         $this->look_idmuni = ($this->look_idmuni == "&nbsp;") ? "" : $this->look_idmuni; 
         //----- lookup - loatiende
         $this->look_loatiende = $this->loatiende; 
         $this->Lookup->lookup_loatiende($this->look_loatiende, $this->loatiende) ; 
         $this->look_loatiende = ($this->look_loatiende == "&nbsp;") ? "" : $this->look_loatiende; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
 if($this->estado =="PENDIENTE")
{
	$this->NM_field_style["documento"] = "background-color:#33ff99;font-size:13px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$this->sc_asigna_vendedor   = "<select onchange='fAsignarVendedor(\"".$this->idtercero ."\",this.value);'>";
 
      $nm_select = "select idtercero,nombres from terceros where empleado='SI'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vVendedores = array();
      $this->vvendedores = array();
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
                        $this->vVendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vvendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vVendedores = false;
          $this->vVendedores_erro = $this->Db->ErrorMsg();
          $this->vvendedores = false;
          $this->vvendedores_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vvendedores[0][0]))
{
	for($i=0;$i<count($this->vvendedores );$i++)
	{
		if($this->loatiende ==$this->vvendedores[$i][0])
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."' selected='selected'>".$this->vvendedores[$i][1]."</option>";
		}
		else
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."'>".$this->vvendedores[$i][1]."</option>";
		}
	}
}
$this->sc_asigna_vendedor  .="</select>";
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_terceros_todos_13122021>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_terceros_todos_13122021_res_xml.class.php");
              $this->Res = new grid_terceros_todos_13122021_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_file']['xml'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_file']['xml']);
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
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_file']['view'];
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- documento
   function NM_export_documento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->documento))
         {
             $this->documento = sc_convert_encoding($this->documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Cédula/Nit"; 
         }
         else
         {
             $SC_Label = "documento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->documento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->documento) . "\"";
         }
   }
   //----- dv
   function NM_export_dv()
   {
             nmgp_Form_Num_Val($this->dv, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['dv'])) ? $this->New_label['dv'] : "DV"; 
         }
         else
         {
             $SC_Label = "dv"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->dv) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->dv) . "\"";
         }
   }
   //----- nombres
   function NM_export_nombres()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombres))
         {
             $this->nombres = sc_convert_encoding($this->nombres, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
         }
         else
         {
             $SC_Label = "nombres"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombres) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombres) . "\"";
         }
   }
   //----- direccion
   function NM_export_direccion()
   {
             if ($this->direccion !== "&nbsp;") 
             { 
                 $this->direccion =  sc_strtolower($this->direccion); 
                 $this->direccion = ucwords($this->direccion); 
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direccion))
         {
             $this->direccion = sc_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Dirección"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->direccion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->direccion) . "\"";
         }
   }
   //----- idmuni
   function NM_export_idmuni()
   {
         nmgp_Form_Num_Val($this->look_idmuni, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_idmuni))
         {
             $this->look_idmuni = sc_convert_encoding($this->look_idmuni, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idmuni'])) ? $this->New_label['idmuni'] : "Ciudad"; 
         }
         else
         {
             $SC_Label = "idmuni"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_idmuni) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_idmuni) . "\"";
         }
   }
   //----- tel_cel
   function NM_export_tel_cel()
   {
             if ($this->tel_cel !== "&nbsp;") 
             { 
                 $this->nm_gera_mask($this->tel_cel, "xxx xxx xx xx"); 
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tel_cel))
         {
             $this->tel_cel = sc_convert_encoding($this->tel_cel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tel_cel'])) ? $this->New_label['tel_cel'] : "Tel. o celular"; 
         }
         else
         {
             $SC_Label = "tel_cel"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tel_cel) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tel_cel) . "\"";
         }
   }
   //----- cliente
   function NM_export_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cliente))
         {
             $this->cliente = sc_convert_encoding($this->cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "cliente"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cliente) . "\"";
         }
   }
   //----- proveedor
   function NM_export_proveedor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->proveedor))
         {
             $this->proveedor = sc_convert_encoding($this->proveedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : "Proveedor"; 
         }
         else
         {
             $SC_Label = "proveedor"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->proveedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->proveedor) . "\"";
         }
   }
   //----- empleado
   function NM_export_empleado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->empleado))
         {
             $this->empleado = sc_convert_encoding($this->empleado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
         }
         else
         {
             $SC_Label = "empleado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->empleado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->empleado) . "\"";
         }
   }
   //----- si_nomina
   function NM_export_si_nomina()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->si_nomina))
         {
             $this->si_nomina = sc_convert_encoding($this->si_nomina, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['si_nomina'])) ? $this->New_label['si_nomina'] : "Nómina"; 
         }
         else
         {
             $SC_Label = "si_nomina"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->si_nomina) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->si_nomina) . "\"";
         }
   }
   //----- idtercero
   function NM_export_idtercero()
   {
             nmgp_Form_Num_Val($this->idtercero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idtercero'])) ? $this->New_label['idtercero'] : "Idtercero"; 
         }
         else
         {
             $SC_Label = "idtercero"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->idtercero) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->idtercero) . "\"";
         }
   }
   //----- nacimiento
   function NM_export_nacimiento()
   {
             $conteudo_x =  $this->nacimiento;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->nacimiento, "YYYY-MM-DD  ");
                 $this->nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nacimiento'])) ? $this->New_label['nacimiento'] : "Fec. Nacimiento"; 
         }
         else
         {
             $SC_Label = "nacimiento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nacimiento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nacimiento) . "\"";
         }
   }
   //----- sexo
   function NM_export_sexo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sexo))
         {
             $this->sexo = sc_convert_encoding($this->sexo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['sexo'])) ? $this->New_label['sexo'] : "Género"; 
         }
         else
         {
             $SC_Label = "sexo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sexo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sexo) . "\"";
         }
   }
   //----- urlmail
   function NM_export_urlmail()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->urlmail))
         {
             $this->urlmail = sc_convert_encoding($this->urlmail, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['urlmail'])) ? $this->New_label['urlmail'] : "E-mail"; 
         }
         else
         {
             $SC_Label = "urlmail"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->urlmail) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->urlmail) . "\"";
         }
   }
   //----- fechault
   function NM_export_fechault()
   {
             $conteudo_x =  $this->fechault;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechault, "YYYY-MM-DD  ");
                 $this->fechault = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechault'])) ? $this->New_label['fechault'] : "Última comp."; 
         }
         else
         {
             $SC_Label = "fechault"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechault) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechault) . "\"";
         }
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
         }
         else
         {
             $SC_Label = "saldo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->saldo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->saldo) . "\"";
         }
   }
   //----- afiliacion
   function NM_export_afiliacion()
   {
             $conteudo_x =  $this->afiliacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->afiliacion, "YYYY-MM-DD  ");
                 $this->afiliacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['afiliacion'])) ? $this->New_label['afiliacion'] : "Cliente desde"; 
         }
         else
         {
             $SC_Label = "afiliacion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->afiliacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->afiliacion) . "\"";
         }
   }
   //----- regimen
   function NM_export_regimen()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->regimen))
         {
             $this->regimen = sc_convert_encoding($this->regimen, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['regimen'])) ? $this->New_label['regimen'] : "Regimen"; 
         }
         else
         {
             $SC_Label = "regimen"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->regimen) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->regimen) . "\"";
         }
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
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtoupper($this->observaciones); 
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->observaciones))
         {
             $this->observaciones = sc_convert_encoding($this->observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
         }
         else
         {
             $SC_Label = "observaciones"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->observaciones) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->observaciones) . "\"";
         }
   }
   //----- loatiende
   function NM_export_loatiende()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_loatiende))
         {
             $this->look_loatiende = sc_convert_encoding($this->look_loatiende, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['loatiende'])) ? $this->New_label['loatiende'] : "Vendedor"; 
         }
         else
         {
             $SC_Label = "loatiende"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_loatiende) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_loatiende) . "\"";
         }
   }
   //----- contacto
   function NM_export_contacto()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->contacto))
         {
             $this->contacto = sc_convert_encoding($this->contacto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : "Contacto"; 
         }
         else
         {
             $SC_Label = "contacto"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->contacto) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->contacto) . "\"";
         }
   }
   //----- credito
   function NM_export_credito()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->credito))
         {
             $this->credito = sc_convert_encoding($this->credito, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->credito) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->credito) . "\"";
         }
   }
   //----- cupo
   function NM_export_cupo()
   {
             nmgp_Form_Num_Val($this->cupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cupo'])) ? $this->New_label['cupo'] : "Cupo"; 
         }
         else
         {
             $SC_Label = "cupo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cupo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cupo) . "\"";
         }
   }
   //----- listaprecios
   function NM_export_listaprecios()
   {
             nmgp_Form_Num_Val($this->listaprecios, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['listaprecios'])) ? $this->New_label['listaprecios'] : "Listaprecios"; 
         }
         else
         {
             $SC_Label = "listaprecios"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->listaprecios) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->listaprecios) . "\"";
         }
   }
   //----- con_actual
   function NM_export_con_actual()
   {
             if (substr($this->con_actual, 10, 1) == "-") 
             { 
                 $this->con_actual = substr($this->con_actual, 0, 10) . " " . substr($this->con_actual, 11);
             } 
             if (substr($this->con_actual, 13, 1) == ".") 
             { 
                $this->con_actual = substr($this->con_actual, 0, 13) . ":" . substr($this->con_actual, 14, 2) . ":" . substr($this->con_actual, 17);
             } 
             $conteudo_x =  $this->con_actual;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->con_actual, "YYYY-MM-DD HH:II:SS  ");
                 $this->con_actual = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->con_actual))
         {
             $this->con_actual = sc_convert_encoding($this->con_actual, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['con_actual'])) ? $this->New_label['con_actual'] : "Con Actual"; 
         }
         else
         {
             $SC_Label = "con_actual"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->con_actual) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->con_actual) . "\"";
         }
   }
   //----- efec_retencion
   function NM_export_efec_retencion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->efec_retencion))
         {
             $this->efec_retencion = sc_convert_encoding($this->efec_retencion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['efec_retencion'])) ? $this->New_label['efec_retencion'] : "Efec Retencion"; 
         }
         else
         {
             $SC_Label = "efec_retencion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->efec_retencion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->efec_retencion) . "\"";
         }
   }
   //----- urlmail_1
   function NM_export_urlmail_1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->urlmail_1))
         {
             $this->urlmail_1 = sc_convert_encoding($this->urlmail_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['urlmail_1'])) ? $this->New_label['urlmail_1'] : "Urlmail"; 
         }
         else
         {
             $SC_Label = "urlmail_1"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->urlmail_1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->urlmail_1) . "\"";
         }
   }
   //----- nombre1
   function NM_export_nombre1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre1))
         {
             $this->nombre1 = sc_convert_encoding($this->nombre1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "Nombre 1"; 
         }
         else
         {
             $SC_Label = "nombre1"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre1) . "\"";
         }
   }
   //----- nombre2
   function NM_export_nombre2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre2))
         {
             $this->nombre2 = sc_convert_encoding($this->nombre2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "Nombre 2"; 
         }
         else
         {
             $SC_Label = "nombre2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre2) . "\"";
         }
   }
   //----- apellido1
   function NM_export_apellido1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->apellido1))
         {
             $this->apellido1 = sc_convert_encoding($this->apellido1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "Apellido 1"; 
         }
         else
         {
             $SC_Label = "apellido1"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->apellido1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->apellido1) . "\"";
         }
   }
   //----- apellido2
   function NM_export_apellido2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->apellido2))
         {
             $this->apellido2 = sc_convert_encoding($this->apellido2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "Apellido 2"; 
         }
         else
         {
             $SC_Label = "apellido2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->apellido2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->apellido2) . "\"";
         }
   }
   //----- sucur_cliente
   function NM_export_sucur_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sucur_cliente))
         {
             $this->sucur_cliente = sc_convert_encoding($this->sucur_cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['sucur_cliente'])) ? $this->New_label['sucur_cliente'] : "Sucur Cliente"; 
         }
         else
         {
             $SC_Label = "sucur_cliente"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sucur_cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sucur_cliente) . "\"";
         }
   }
   //----- representante
   function NM_export_representante()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->representante))
         {
             $this->representante = sc_convert_encoding($this->representante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['representante'])) ? $this->New_label['representante'] : "Representante"; 
         }
         else
         {
             $SC_Label = "representante"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->representante) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->representante) . "\"";
         }
   }
   //----- es_restaurante
   function NM_export_es_restaurante()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->es_restaurante))
         {
             $this->es_restaurante = sc_convert_encoding($this->es_restaurante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['es_restaurante'])) ? $this->New_label['es_restaurante'] : "Es Restaurante"; 
         }
         else
         {
             $SC_Label = "es_restaurante"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->es_restaurante) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->es_restaurante) . "\"";
         }
   }
   //----- dias_credito
   function NM_export_dias_credito()
   {
             nmgp_Form_Num_Val($this->dias_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['dias_credito'])) ? $this->New_label['dias_credito'] : "Dias Credito"; 
         }
         else
         {
             $SC_Label = "dias_credito"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->dias_credito) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->dias_credito) . "\"";
         }
   }
   //----- dias_mora
   function NM_export_dias_mora()
   {
             nmgp_Form_Num_Val($this->dias_mora, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['dias_mora'])) ? $this->New_label['dias_mora'] : "Dias Mora"; 
         }
         else
         {
             $SC_Label = "dias_mora"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->dias_mora) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->dias_mora) . "\"";
         }
   }
   //----- cupo_vendedor
   function NM_export_cupo_vendedor()
   {
             nmgp_Form_Num_Val($this->cupo_vendedor, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cupo_vendedor'])) ? $this->New_label['cupo_vendedor'] : "Cupo Vendedor"; 
         }
         else
         {
             $SC_Label = "cupo_vendedor"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cupo_vendedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cupo_vendedor) . "\"";
         }
   }
   //----- codigo_ter
   function NM_export_codigo_ter()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->codigo_ter))
         {
             $this->codigo_ter = sc_convert_encoding($this->codigo_ter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['codigo_ter'])) ? $this->New_label['codigo_ter'] : "Codigo Ter"; 
         }
         else
         {
             $SC_Label = "codigo_ter"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->codigo_ter) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->codigo_ter) . "\"";
         }
   }
   //----- es_cajero
   function NM_export_es_cajero()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->es_cajero))
         {
             $this->es_cajero = sc_convert_encoding($this->es_cajero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['es_cajero'])) ? $this->New_label['es_cajero'] : "Es Cajero"; 
         }
         else
         {
             $SC_Label = "es_cajero"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->es_cajero) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->es_cajero) . "\"";
         }
   }
   //----- autorizado
   function NM_export_autorizado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->autorizado))
         {
             $this->autorizado = sc_convert_encoding($this->autorizado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['autorizado'])) ? $this->New_label['autorizado'] : "Autorizado"; 
         }
         else
         {
             $SC_Label = "autorizado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->autorizado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->autorizado) . "\"";
         }
   }
   //----- zona_clientes
   function NM_export_zona_clientes()
   {
             nmgp_Form_Num_Val($this->zona_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['zona_clientes'])) ? $this->New_label['zona_clientes'] : "Zona Clientes"; 
         }
         else
         {
             $SC_Label = "zona_clientes"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->zona_clientes) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->zona_clientes) . "\"";
         }
   }
   //----- clasificacion_clientes
   function NM_export_clasificacion_clientes()
   {
             nmgp_Form_Num_Val($this->clasificacion_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['clasificacion_clientes'])) ? $this->New_label['clasificacion_clientes'] : "Clasificacion Clientes"; 
         }
         else
         {
             $SC_Label = "clasificacion_clientes"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->clasificacion_clientes) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->clasificacion_clientes) . "\"";
         }
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
                 $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->creado))
         {
             $this->creado = sc_convert_encoding($this->creado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
         }
         else
         {
             $SC_Label = "creado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->creado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->creado) . "\"";
         }
   }
   //----- disponible
   function NM_export_disponible()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->disponible))
         {
             $this->disponible = sc_convert_encoding($this->disponible, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['disponible'])) ? $this->New_label['disponible'] : "Disponible"; 
         }
         else
         {
             $SC_Label = "disponible"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->disponible) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->disponible) . "\"";
         }
   }
   //----- id_pedido_tmp
   function NM_export_id_pedido_tmp()
   {
             nmgp_Form_Num_Val($this->id_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['id_pedido_tmp'])) ? $this->New_label['id_pedido_tmp'] : "Id Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "id_pedido_tmp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->id_pedido_tmp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->id_pedido_tmp) . "\"";
         }
   }
   //----- n_pedido_tmp
   function NM_export_n_pedido_tmp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->n_pedido_tmp))
         {
             $this->n_pedido_tmp = sc_convert_encoding($this->n_pedido_tmp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['n_pedido_tmp'])) ? $this->New_label['n_pedido_tmp'] : "N Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "n_pedido_tmp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->n_pedido_tmp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->n_pedido_tmp) . "\"";
         }
   }
   //----- total_pedido_tmp
   function NM_export_total_pedido_tmp()
   {
             nmgp_Form_Num_Val($this->total_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['total_pedido_tmp'])) ? $this->New_label['total_pedido_tmp'] : "Total Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "total_pedido_tmp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->total_pedido_tmp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->total_pedido_tmp) . "\"";
         }
   }
   //----- obs_pedido_tmp
   function NM_export_obs_pedido_tmp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->obs_pedido_tmp))
         {
             $this->obs_pedido_tmp = sc_convert_encoding($this->obs_pedido_tmp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['obs_pedido_tmp'])) ? $this->New_label['obs_pedido_tmp'] : "Obs Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "obs_pedido_tmp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->obs_pedido_tmp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->obs_pedido_tmp) . "\"";
         }
   }
   //----- vend_pedido_tmp
   function NM_export_vend_pedido_tmp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vend_pedido_tmp))
         {
             $this->vend_pedido_tmp = sc_convert_encoding($this->vend_pedido_tmp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vend_pedido_tmp'])) ? $this->New_label['vend_pedido_tmp'] : "Vend Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "vend_pedido_tmp"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vend_pedido_tmp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vend_pedido_tmp) . "\"";
         }
   }
   //----- ciudad
   function NM_export_ciudad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ciudad))
         {
             $this->ciudad = sc_convert_encoding($this->ciudad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
         }
         else
         {
             $SC_Label = "ciudad"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ciudad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ciudad) . "\"";
         }
   }
   //----- codigo_postal
   function NM_export_codigo_postal()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->codigo_postal))
         {
             $this->codigo_postal = sc_convert_encoding($this->codigo_postal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['codigo_postal'])) ? $this->New_label['codigo_postal'] : "Codigo Postal"; 
         }
         else
         {
             $SC_Label = "codigo_postal"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->codigo_postal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->codigo_postal) . "\"";
         }
   }
   //----- lenguaje
   function NM_export_lenguaje()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->lenguaje))
         {
             $this->lenguaje = sc_convert_encoding($this->lenguaje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['lenguaje'])) ? $this->New_label['lenguaje'] : "Lenguaje"; 
         }
         else
         {
             $SC_Label = "lenguaje"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->lenguaje) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->lenguaje) . "\"";
         }
   }
   //----- nombre_comercil
   function NM_export_nombre_comercil()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre_comercil))
         {
             $this->nombre_comercil = sc_convert_encoding($this->nombre_comercil, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nombre_comercil'])) ? $this->New_label['nombre_comercil'] : "Nombre Comercil"; 
         }
         else
         {
             $SC_Label = "nombre_comercil"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre_comercil) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre_comercil) . "\"";
         }
   }
   //----- notificar
   function NM_export_notificar()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->notificar))
         {
             $this->notificar = sc_convert_encoding($this->notificar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : "Notificar"; 
         }
         else
         {
             $SC_Label = "notificar"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->notificar) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->notificar) . "\"";
         }
   }
   //----- puc_auxiliar_deudores
   function NM_export_puc_auxiliar_deudores()
   {
             nmgp_Form_Num_Val($this->puc_auxiliar_deudores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_auxiliar_deudores))
         {
             $this->puc_auxiliar_deudores = sc_convert_encoding($this->puc_auxiliar_deudores, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_auxiliar_deudores'])) ? $this->New_label['puc_auxiliar_deudores'] : "Puc Auxiliar Deudores"; 
         }
         else
         {
             $SC_Label = "puc_auxiliar_deudores"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_auxiliar_deudores) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_auxiliar_deudores) . "\"";
         }
   }
   //----- puc_retefuente_ventas
   function NM_export_puc_retefuente_ventas()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_ventas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retefuente_ventas))
         {
             $this->puc_retefuente_ventas = sc_convert_encoding($this->puc_retefuente_ventas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_ventas'])) ? $this->New_label['puc_retefuente_ventas'] : "Puc Retefuente Ventas"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_ventas"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retefuente_ventas) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retefuente_ventas) . "\"";
         }
   }
   //----- puc_retefuente_servicios_clie
   function NM_export_puc_retefuente_servicios_clie()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_clie, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retefuente_servicios_clie))
         {
             $this->puc_retefuente_servicios_clie = sc_convert_encoding($this->puc_retefuente_servicios_clie, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_servicios_clie'])) ? $this->New_label['puc_retefuente_servicios_clie'] : "Puc Retefuente Servicios Clie"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_servicios_clie"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retefuente_servicios_clie) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retefuente_servicios_clie) . "\"";
         }
   }
   //----- puc_auxiliar_proveedores
   function NM_export_puc_auxiliar_proveedores()
   {
             nmgp_Form_Num_Val($this->puc_auxiliar_proveedores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_auxiliar_proveedores))
         {
             $this->puc_auxiliar_proveedores = sc_convert_encoding($this->puc_auxiliar_proveedores, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_auxiliar_proveedores'])) ? $this->New_label['puc_auxiliar_proveedores'] : "Puc Auxiliar Proveedores"; 
         }
         else
         {
             $SC_Label = "puc_auxiliar_proveedores"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_auxiliar_proveedores) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_auxiliar_proveedores) . "\"";
         }
   }
   //----- puc_retefuente_compras
   function NM_export_puc_retefuente_compras()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_compras, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retefuente_compras))
         {
             $this->puc_retefuente_compras = sc_convert_encoding($this->puc_retefuente_compras, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_compras'])) ? $this->New_label['puc_retefuente_compras'] : "Puc Retefuente Compras"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_compras"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retefuente_compras) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retefuente_compras) . "\"";
         }
   }
   //----- puc_retefuente_servicios_prov
   function NM_export_puc_retefuente_servicios_prov()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_prov, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retefuente_servicios_prov))
         {
             $this->puc_retefuente_servicios_prov = sc_convert_encoding($this->puc_retefuente_servicios_prov, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_servicios_prov'])) ? $this->New_label['puc_retefuente_servicios_prov'] : "Puc Retefuente Servicios Prov"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_servicios_prov"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retefuente_servicios_prov) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retefuente_servicios_prov) . "\"";
         }
   }
   //----- nube
   function NM_export_nube()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nube))
         {
             $this->nube = sc_convert_encoding($this->nube, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['nube'])) ? $this->New_label['nube'] : "Nube"; 
         }
         else
         {
             $SC_Label = "nube"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nube) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nube) . "\"";
         }
   }
   //----- tipo_documento
   function NM_export_tipo_documento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo_documento))
         {
             $this->tipo_documento = sc_convert_encoding($this->tipo_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['tipo_documento'])) ? $this->New_label['tipo_documento'] : "Tipo Documento"; 
         }
         else
         {
             $SC_Label = "tipo_documento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipo_documento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipo_documento) . "\"";
         }
   }
   //----- estado
   function NM_export_estado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estado))
         {
             $this->estado = sc_convert_encoding($this->estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
         }
         else
         {
             $SC_Label = "estado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->estado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->estado) . "\"";
         }
   }
   //----- facturas
   function NM_export_facturas()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->facturas))
         {
             $this->facturas = sc_convert_encoding($this->facturas, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['facturas'])) ? $this->New_label['facturas'] : "Listar Cartera"; 
         }
         else
         {
             $SC_Label = "facturas"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->facturas) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->facturas) . "\"";
         }
   }
   //----- sc_asigna_vendedor
   function NM_export_sc_asigna_vendedor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_asigna_vendedor))
         {
             $this->sc_asigna_vendedor = sc_convert_encoding($this->sc_asigna_vendedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['sc_asigna_vendedor'])) ? $this->New_label['sc_asigna_vendedor'] : "Lo Atiende"; 
         }
         else
         {
             $SC_Label = "sc_asigna_vendedor"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sc_asigna_vendedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sc_asigna_vendedor) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Terceros :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_terceros_todos_13122021_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_terceros_todos_13122021"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['xml_return']); ?>"> 
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
