<?php

class grid_terceros_todos_json
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

   function __construct()
   {
      $this->nm_data = new nm_data("es");
   }

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['opcao'] = "";
      }
   }

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
                   nm_limpa_str_grid_terceros_todos($cadapar[1]);
                   nm_protect_num_grid_terceros_todos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_terceros_todos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $gnube_activa;
          nm_limpa_str_grid_terceros_todos($_SESSION["gnube_activa"]);
      }
      if (isset($gnit)) 
      {
          $_SESSION['gnit'] = $gnit;
          nm_limpa_str_grid_terceros_todos($_SESSION["gnit"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = false;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos/grid_terceros_todos_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_todos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_return']);
          if ($this->Tem_json_res) {
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
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_terceros_todos.zip";
      $this->Arquivo     .= "_grid_terceros_todos";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_terceros_todos.json";
      $this->Tit_zip      = "grid_terceros_todos.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['campos_busca'];
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
          $this->clasificacion_clientes = $Busca_temp['clasificacion_clientes']; 
          $tmp_pos = strpos($this->clasificacion_clientes, "##@@");
          if ($tmp_pos !== false && !is_array($this->clasificacion_clientes))
          {
              $this->clasificacion_clientes = substr($this->clasificacion_clientes, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_terceros_todos']['contr_erro'] = 'on';
if (!isset($_SESSION['gnit'])) {$_SESSION['gnit'] = "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
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
	$this->NM_cmp_hidden["si_nomina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['php_cmp_sel']["si_nomina"] = "on"; }
}
else
{
	$this->NM_cmp_hidden["si_nomina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['php_cmp_sel']["si_nomina"] = "off"; }
}

?>
<style>
body
{
	
	
	
	
	
	
	
	
	
	
	
	
}
</style>
<?php
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
if (isset($this->sc_temp_gnit)) {$_SESSION['gnit'] = $this->sc_temp_gnit;}
$_SESSION['scriptcase']['grid_terceros_todos']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT (if(dv is not null and dv <>'',concat(documento,'-',dv),documento)) as ccnit, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, documento, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, dv, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['order_grid'];
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->ccnit = $rs->fields[0] ;  
         $this->nombres = $rs->fields[1] ;  
         $this->direccion = $rs->fields[2] ;  
         $this->idmuni = $rs->fields[3] ;  
         $this->idmuni = (string)$this->idmuni;
         $this->tel_cel = $rs->fields[4] ;  
         $this->cliente = $rs->fields[5] ;  
         $this->proveedor = $rs->fields[6] ;  
         $this->empleado = $rs->fields[7] ;  
         $this->si_nomina = $rs->fields[8] ;  
         $this->idtercero = $rs->fields[9] ;  
         $this->idtercero = (string)$this->idtercero;
         $this->documento = $rs->fields[10] ;  
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
         $this->dv = $rs->fields[21] ;  
         $this->dv = (string)$this->dv;
         $this->contacto = $rs->fields[22] ;  
         $this->credito = $rs->fields[23] ;  
         $this->cupo = $rs->fields[24] ;  
         $this->cupo = (string)$this->cupo;
         $this->listaprecios = $rs->fields[25] ;  
         $this->listaprecios = (string)$this->listaprecios;
         $this->con_actual = $rs->fields[26] ;  
         $this->efec_retencion = $rs->fields[27] ;  
         $this->urlmail_1 = $rs->fields[28] ;  
         $this->nombre1 = $rs->fields[29] ;  
         $this->nombre2 = $rs->fields[30] ;  
         $this->apellido1 = $rs->fields[31] ;  
         $this->apellido2 = $rs->fields[32] ;  
         $this->sucur_cliente = $rs->fields[33] ;  
         $this->representante = $rs->fields[34] ;  
         $this->es_restaurante = $rs->fields[35] ;  
         $this->dias_credito = $rs->fields[36] ;  
         $this->dias_credito = (string)$this->dias_credito;
         $this->dias_mora = $rs->fields[37] ;  
         $this->dias_mora = (string)$this->dias_mora;
         $this->cupo_vendedor = $rs->fields[38] ;  
         $this->cupo_vendedor =  str_replace(",", ".", $this->cupo_vendedor);
         $this->cupo_vendedor = (string)$this->cupo_vendedor;
         $this->codigo_ter = $rs->fields[39] ;  
         $this->es_cajero = $rs->fields[40] ;  
         $this->autorizado = $rs->fields[41] ;  
         $this->zona_clientes = $rs->fields[42] ;  
         $this->zona_clientes = (string)$this->zona_clientes;
         $this->clasificacion_clientes = $rs->fields[43] ;  
         $this->clasificacion_clientes = (string)$this->clasificacion_clientes;
         $this->creado = $rs->fields[44] ;  
         $this->disponible = $rs->fields[45] ;  
         $this->id_pedido_tmp = $rs->fields[46] ;  
         $this->id_pedido_tmp = (string)$this->id_pedido_tmp;
         $this->n_pedido_tmp = $rs->fields[47] ;  
         $this->total_pedido_tmp = $rs->fields[48] ;  
         $this->total_pedido_tmp =  str_replace(",", ".", $this->total_pedido_tmp);
         $this->total_pedido_tmp = (string)$this->total_pedido_tmp;
         $this->obs_pedido_tmp = $rs->fields[49] ;  
         $this->vend_pedido_tmp = $rs->fields[50] ;  
         $this->ciudad = $rs->fields[51] ;  
         $this->codigo_postal = $rs->fields[52] ;  
         $this->lenguaje = $rs->fields[53] ;  
         $this->nombre_comercil = $rs->fields[54] ;  
         $this->notificar = $rs->fields[55] ;  
         $this->puc_auxiliar_deudores = $rs->fields[56] ;  
         $this->puc_retefuente_ventas = $rs->fields[57] ;  
         $this->puc_retefuente_servicios_clie = $rs->fields[58] ;  
         $this->puc_auxiliar_proveedores = $rs->fields[59] ;  
         $this->puc_retefuente_compras = $rs->fields[60] ;  
         $this->puc_retefuente_servicios_prov = $rs->fields[61] ;  
         $this->nube = $rs->fields[62] ;  
         $this->tipo_documento = $rs->fields[63] ;  
         $this->estado = $rs->fields[64] ;  
         //----- lookup - idmuni
         $this->look_idmuni = $this->idmuni; 
         $this->Lookup->lookup_idmuni($this->look_idmuni, $this->idmuni) ; 
         $this->look_idmuni = ($this->look_idmuni == "&nbsp;") ? "" : $this->look_idmuni; 
         //----- lookup - loatiende
         $this->look_loatiende = $this->loatiende; 
         $this->Lookup->lookup_loatiende($this->look_loatiende, $this->loatiende) ; 
         $this->look_loatiende = ($this->look_loatiende == "&nbsp;") ? "" : $this->look_loatiende; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_terceros_todos']['contr_erro'] = 'on';
 if($this->estado =="PENDIENTE")
{
	$this->NM_field_style["ccnit"] = "background-color:#33ff99;font-size:13px;color:#000000;font-family:arial;font-weight:sans-serif;";
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
$_SESSION['scriptcase']['grid_terceros_todos']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_terceros_todos_res_json.class.php");
              $this->Res = new grid_terceros_todos_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- ccnit
   function NM_export_ccnit()
   {
         $this->ccnit = NM_charset_to_utf8($this->ccnit);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ccnit'])) ? $this->New_label['ccnit'] : "Identificación"; 
         }
         else
         {
             $SC_Label = "ccnit"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ccnit;
   }
   //----- nombres
   function NM_export_nombres()
   {
         $this->nombres = NM_charset_to_utf8($this->nombres);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
         }
         else
         {
             $SC_Label = "nombres"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nombres;
   }
   //----- direccion
   function NM_export_direccion()
   {
         if ($this->Json_format)
         {
             if ($this->direccion !== "&nbsp;") 
             { 
                 $this->direccion =  sc_strtolower($this->direccion); 
                 $this->direccion = ucwords($this->direccion); 
             } 
         }
         $this->direccion = NM_charset_to_utf8($this->direccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Dirección"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direccion;
   }
   //----- idmuni
   function NM_export_idmuni()
   {
         nmgp_Form_Num_Val($this->look_idmuni, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idmuni = NM_charset_to_utf8($this->look_idmuni);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idmuni'])) ? $this->New_label['idmuni'] : "Ciudad"; 
         }
         else
         {
             $SC_Label = "idmuni"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idmuni;
   }
   //----- tel_cel
   function NM_export_tel_cel()
   {
         if ($this->Json_format)
         {
             if ($this->tel_cel !== "&nbsp;") 
             { 
                 $this->nm_gera_mask($this->tel_cel, "xxx xxx xx xx"); 
             } 
         }
         $this->tel_cel = NM_charset_to_utf8($this->tel_cel);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tel_cel'])) ? $this->New_label['tel_cel'] : "Tel. o celular"; 
         }
         else
         {
             $SC_Label = "tel_cel"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tel_cel;
   }
   //----- cliente
   function NM_export_cliente()
   {
         $this->cliente = NM_charset_to_utf8($this->cliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "cliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cliente;
   }
   //----- proveedor
   function NM_export_proveedor()
   {
         $this->proveedor = NM_charset_to_utf8($this->proveedor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : "Proveedor"; 
         }
         else
         {
             $SC_Label = "proveedor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->proveedor;
   }
   //----- empleado
   function NM_export_empleado()
   {
         $this->empleado = NM_charset_to_utf8($this->empleado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
         }
         else
         {
             $SC_Label = "empleado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empleado;
   }
   //----- si_nomina
   function NM_export_si_nomina()
   {
         $this->si_nomina = NM_charset_to_utf8($this->si_nomina);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['si_nomina'])) ? $this->New_label['si_nomina'] : "Nómina"; 
         }
         else
         {
             $SC_Label = "si_nomina"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->si_nomina;
   }
   //----- idtercero
   function NM_export_idtercero()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idtercero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idtercero'])) ? $this->New_label['idtercero'] : "Idtercero"; 
         }
         else
         {
             $SC_Label = "idtercero"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idtercero;
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = NM_charset_to_utf8($this->documento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Cédula/Nit"; 
         }
         else
         {
             $SC_Label = "documento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->documento;
   }
   //----- nacimiento
   function NM_export_nacimiento()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->nacimiento;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->nacimiento, "YYYY-MM-DD  ");
                 $this->nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nacimiento'])) ? $this->New_label['nacimiento'] : "Fec. Nacimiento"; 
         }
         else
         {
             $SC_Label = "nacimiento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nacimiento;
   }
   //----- sexo
   function NM_export_sexo()
   {
         $this->sexo = NM_charset_to_utf8($this->sexo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sexo'])) ? $this->New_label['sexo'] : "Género"; 
         }
         else
         {
             $SC_Label = "sexo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sexo;
   }
   //----- urlmail
   function NM_export_urlmail()
   {
         $this->urlmail = NM_charset_to_utf8($this->urlmail);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['urlmail'])) ? $this->New_label['urlmail'] : "E-mail"; 
         }
         else
         {
             $SC_Label = "urlmail"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->urlmail;
   }
   //----- fechault
   function NM_export_fechault()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fechault;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechault, "YYYY-MM-DD  ");
                 $this->fechault = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechault'])) ? $this->New_label['fechault'] : "Última comp."; 
         }
         else
         {
             $SC_Label = "fechault"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechault;
   }
   //----- saldo
   function NM_export_saldo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
         }
         else
         {
             $SC_Label = "saldo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->saldo;
   }
   //----- afiliacion
   function NM_export_afiliacion()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->afiliacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->afiliacion, "YYYY-MM-DD  ");
                 $this->afiliacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['afiliacion'])) ? $this->New_label['afiliacion'] : "Cliente desde"; 
         }
         else
         {
             $SC_Label = "afiliacion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->afiliacion;
   }
   //----- regimen
   function NM_export_regimen()
   {
         $this->regimen = NM_charset_to_utf8($this->regimen);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['regimen'])) ? $this->New_label['regimen'] : "Regimen"; 
         }
         else
         {
             $SC_Label = "regimen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->regimen;
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->tipo = NM_charset_to_utf8($this->tipo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
         }
         else
         {
             $SC_Label = "tipo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tipo;
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         if ($this->Json_format)
         {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtoupper($this->observaciones); 
             } 
         }
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
         }
         else
         {
             $SC_Label = "observaciones"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->observaciones;
   }
   //----- loatiende
   function NM_export_loatiende()
   {
         $this->look_loatiende = NM_charset_to_utf8($this->look_loatiende);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['loatiende'])) ? $this->New_label['loatiende'] : "Vendedor"; 
         }
         else
         {
             $SC_Label = "loatiende"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_loatiende;
   }
   //----- dv
   function NM_export_dv()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->dv, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dv'])) ? $this->New_label['dv'] : "DV"; 
         }
         else
         {
             $SC_Label = "dv"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dv;
   }
   //----- contacto
   function NM_export_contacto()
   {
         $this->contacto = NM_charset_to_utf8($this->contacto);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : "Contacto"; 
         }
         else
         {
             $SC_Label = "contacto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->contacto;
   }
   //----- credito
   function NM_export_credito()
   {
         $this->credito = NM_charset_to_utf8($this->credito);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->credito;
   }
   //----- cupo
   function NM_export_cupo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cupo'])) ? $this->New_label['cupo'] : "Cupo"; 
         }
         else
         {
             $SC_Label = "cupo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cupo;
   }
   //----- listaprecios
   function NM_export_listaprecios()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->listaprecios, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['listaprecios'])) ? $this->New_label['listaprecios'] : "Listaprecios"; 
         }
         else
         {
             $SC_Label = "listaprecios"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->listaprecios;
   }
   //----- con_actual
   function NM_export_con_actual()
   {
         if ($this->Json_format)
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
         }
         $this->con_actual = NM_charset_to_utf8($this->con_actual);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['con_actual'])) ? $this->New_label['con_actual'] : "Con Actual"; 
         }
         else
         {
             $SC_Label = "con_actual"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->con_actual;
   }
   //----- efec_retencion
   function NM_export_efec_retencion()
   {
         $this->efec_retencion = NM_charset_to_utf8($this->efec_retencion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['efec_retencion'])) ? $this->New_label['efec_retencion'] : "Efec Retencion"; 
         }
         else
         {
             $SC_Label = "efec_retencion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->efec_retencion;
   }
   //----- urlmail_1
   function NM_export_urlmail_1()
   {
         $this->urlmail_1 = NM_charset_to_utf8($this->urlmail_1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['urlmail_1'])) ? $this->New_label['urlmail_1'] : "Urlmail"; 
         }
         else
         {
             $SC_Label = "urlmail_1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->urlmail_1;
   }
   //----- nombre1
   function NM_export_nombre1()
   {
         $this->nombre1 = NM_charset_to_utf8($this->nombre1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "Nombre 1"; 
         }
         else
         {
             $SC_Label = "nombre1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nombre1;
   }
   //----- nombre2
   function NM_export_nombre2()
   {
         $this->nombre2 = NM_charset_to_utf8($this->nombre2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "Nombre 2"; 
         }
         else
         {
             $SC_Label = "nombre2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nombre2;
   }
   //----- apellido1
   function NM_export_apellido1()
   {
         $this->apellido1 = NM_charset_to_utf8($this->apellido1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "Apellido 1"; 
         }
         else
         {
             $SC_Label = "apellido1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->apellido1;
   }
   //----- apellido2
   function NM_export_apellido2()
   {
         $this->apellido2 = NM_charset_to_utf8($this->apellido2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "Apellido 2"; 
         }
         else
         {
             $SC_Label = "apellido2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->apellido2;
   }
   //----- sucur_cliente
   function NM_export_sucur_cliente()
   {
         $this->sucur_cliente = NM_charset_to_utf8($this->sucur_cliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sucur_cliente'])) ? $this->New_label['sucur_cliente'] : "Sucur Cliente"; 
         }
         else
         {
             $SC_Label = "sucur_cliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sucur_cliente;
   }
   //----- representante
   function NM_export_representante()
   {
         $this->representante = NM_charset_to_utf8($this->representante);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['representante'])) ? $this->New_label['representante'] : "Representante"; 
         }
         else
         {
             $SC_Label = "representante"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->representante;
   }
   //----- es_restaurante
   function NM_export_es_restaurante()
   {
         $this->es_restaurante = NM_charset_to_utf8($this->es_restaurante);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['es_restaurante'])) ? $this->New_label['es_restaurante'] : "Es Restaurante"; 
         }
         else
         {
             $SC_Label = "es_restaurante"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->es_restaurante;
   }
   //----- dias_credito
   function NM_export_dias_credito()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->dias_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dias_credito'])) ? $this->New_label['dias_credito'] : "Dias Credito"; 
         }
         else
         {
             $SC_Label = "dias_credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dias_credito;
   }
   //----- dias_mora
   function NM_export_dias_mora()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->dias_mora, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dias_mora'])) ? $this->New_label['dias_mora'] : "Dias Mora"; 
         }
         else
         {
             $SC_Label = "dias_mora"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dias_mora;
   }
   //----- cupo_vendedor
   function NM_export_cupo_vendedor()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cupo_vendedor, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cupo_vendedor'])) ? $this->New_label['cupo_vendedor'] : "Cupo Vendedor"; 
         }
         else
         {
             $SC_Label = "cupo_vendedor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cupo_vendedor;
   }
   //----- codigo_ter
   function NM_export_codigo_ter()
   {
         $this->codigo_ter = NM_charset_to_utf8($this->codigo_ter);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codigo_ter'])) ? $this->New_label['codigo_ter'] : "Codigo Ter"; 
         }
         else
         {
             $SC_Label = "codigo_ter"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codigo_ter;
   }
   //----- es_cajero
   function NM_export_es_cajero()
   {
         $this->es_cajero = NM_charset_to_utf8($this->es_cajero);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['es_cajero'])) ? $this->New_label['es_cajero'] : "Es Cajero"; 
         }
         else
         {
             $SC_Label = "es_cajero"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->es_cajero;
   }
   //----- autorizado
   function NM_export_autorizado()
   {
         $this->autorizado = NM_charset_to_utf8($this->autorizado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['autorizado'])) ? $this->New_label['autorizado'] : "Autorizado"; 
         }
         else
         {
             $SC_Label = "autorizado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->autorizado;
   }
   //----- zona_clientes
   function NM_export_zona_clientes()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->zona_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['zona_clientes'])) ? $this->New_label['zona_clientes'] : "Zona Clientes"; 
         }
         else
         {
             $SC_Label = "zona_clientes"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->zona_clientes;
   }
   //----- clasificacion_clientes
   function NM_export_clasificacion_clientes()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->clasificacion_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['clasificacion_clientes'])) ? $this->New_label['clasificacion_clientes'] : "Clasificacion Clientes"; 
         }
         else
         {
             $SC_Label = "clasificacion_clientes"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->clasificacion_clientes;
   }
   //----- creado
   function NM_export_creado()
   {
         if ($this->Json_format)
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
         }
         $this->creado = NM_charset_to_utf8($this->creado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
         }
         else
         {
             $SC_Label = "creado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->creado;
   }
   //----- disponible
   function NM_export_disponible()
   {
         $this->disponible = NM_charset_to_utf8($this->disponible);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['disponible'])) ? $this->New_label['disponible'] : "Disponible"; 
         }
         else
         {
             $SC_Label = "disponible"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->disponible;
   }
   //----- id_pedido_tmp
   function NM_export_id_pedido_tmp()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->id_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['id_pedido_tmp'])) ? $this->New_label['id_pedido_tmp'] : "Id Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "id_pedido_tmp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->id_pedido_tmp;
   }
   //----- n_pedido_tmp
   function NM_export_n_pedido_tmp()
   {
         $this->n_pedido_tmp = NM_charset_to_utf8($this->n_pedido_tmp);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['n_pedido_tmp'])) ? $this->New_label['n_pedido_tmp'] : "N Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "n_pedido_tmp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->n_pedido_tmp;
   }
   //----- total_pedido_tmp
   function NM_export_total_pedido_tmp()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->total_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['total_pedido_tmp'])) ? $this->New_label['total_pedido_tmp'] : "Total Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "total_pedido_tmp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->total_pedido_tmp;
   }
   //----- obs_pedido_tmp
   function NM_export_obs_pedido_tmp()
   {
         $this->obs_pedido_tmp = NM_charset_to_utf8($this->obs_pedido_tmp);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['obs_pedido_tmp'])) ? $this->New_label['obs_pedido_tmp'] : "Obs Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "obs_pedido_tmp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->obs_pedido_tmp;
   }
   //----- vend_pedido_tmp
   function NM_export_vend_pedido_tmp()
   {
         $this->vend_pedido_tmp = NM_charset_to_utf8($this->vend_pedido_tmp);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vend_pedido_tmp'])) ? $this->New_label['vend_pedido_tmp'] : "Vend Pedido Tmp"; 
         }
         else
         {
             $SC_Label = "vend_pedido_tmp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->vend_pedido_tmp;
   }
   //----- ciudad
   function NM_export_ciudad()
   {
         $this->ciudad = NM_charset_to_utf8($this->ciudad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
         }
         else
         {
             $SC_Label = "ciudad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ciudad;
   }
   //----- codigo_postal
   function NM_export_codigo_postal()
   {
         $this->codigo_postal = NM_charset_to_utf8($this->codigo_postal);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codigo_postal'])) ? $this->New_label['codigo_postal'] : "Codigo Postal"; 
         }
         else
         {
             $SC_Label = "codigo_postal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codigo_postal;
   }
   //----- lenguaje
   function NM_export_lenguaje()
   {
         $this->lenguaje = NM_charset_to_utf8($this->lenguaje);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lenguaje'])) ? $this->New_label['lenguaje'] : "Lenguaje"; 
         }
         else
         {
             $SC_Label = "lenguaje"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lenguaje;
   }
   //----- nombre_comercil
   function NM_export_nombre_comercil()
   {
         $this->nombre_comercil = NM_charset_to_utf8($this->nombre_comercil);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nombre_comercil'])) ? $this->New_label['nombre_comercil'] : "Nombre Comercil"; 
         }
         else
         {
             $SC_Label = "nombre_comercil"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nombre_comercil;
   }
   //----- notificar
   function NM_export_notificar()
   {
         $this->notificar = NM_charset_to_utf8($this->notificar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : "Notificar"; 
         }
         else
         {
             $SC_Label = "notificar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->notificar;
   }
   //----- puc_auxiliar_deudores
   function NM_export_puc_auxiliar_deudores()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_auxiliar_deudores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_auxiliar_deudores = NM_charset_to_utf8($this->puc_auxiliar_deudores);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_auxiliar_deudores'])) ? $this->New_label['puc_auxiliar_deudores'] : "Puc Auxiliar Deudores"; 
         }
         else
         {
             $SC_Label = "puc_auxiliar_deudores"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_auxiliar_deudores;
   }
   //----- puc_retefuente_ventas
   function NM_export_puc_retefuente_ventas()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_retefuente_ventas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_retefuente_ventas = NM_charset_to_utf8($this->puc_retefuente_ventas);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_ventas'])) ? $this->New_label['puc_retefuente_ventas'] : "Puc Retefuente Ventas"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_ventas"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_retefuente_ventas;
   }
   //----- puc_retefuente_servicios_clie
   function NM_export_puc_retefuente_servicios_clie()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_clie, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_retefuente_servicios_clie = NM_charset_to_utf8($this->puc_retefuente_servicios_clie);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_servicios_clie'])) ? $this->New_label['puc_retefuente_servicios_clie'] : "Puc Retefuente Servicios Clie"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_servicios_clie"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_retefuente_servicios_clie;
   }
   //----- puc_auxiliar_proveedores
   function NM_export_puc_auxiliar_proveedores()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_auxiliar_proveedores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_auxiliar_proveedores = NM_charset_to_utf8($this->puc_auxiliar_proveedores);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_auxiliar_proveedores'])) ? $this->New_label['puc_auxiliar_proveedores'] : "Puc Auxiliar Proveedores"; 
         }
         else
         {
             $SC_Label = "puc_auxiliar_proveedores"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_auxiliar_proveedores;
   }
   //----- puc_retefuente_compras
   function NM_export_puc_retefuente_compras()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_retefuente_compras, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_retefuente_compras = NM_charset_to_utf8($this->puc_retefuente_compras);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_compras'])) ? $this->New_label['puc_retefuente_compras'] : "Puc Retefuente Compras"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_compras"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_retefuente_compras;
   }
   //----- puc_retefuente_servicios_prov
   function NM_export_puc_retefuente_servicios_prov()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_prov, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         $this->puc_retefuente_servicios_prov = NM_charset_to_utf8($this->puc_retefuente_servicios_prov);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['puc_retefuente_servicios_prov'])) ? $this->New_label['puc_retefuente_servicios_prov'] : "Puc Retefuente Servicios Prov"; 
         }
         else
         {
             $SC_Label = "puc_retefuente_servicios_prov"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->puc_retefuente_servicios_prov;
   }
   //----- nube
   function NM_export_nube()
   {
         $this->nube = NM_charset_to_utf8($this->nube);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nube'])) ? $this->New_label['nube'] : "Nube"; 
         }
         else
         {
             $SC_Label = "nube"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nube;
   }
   //----- tipo_documento
   function NM_export_tipo_documento()
   {
         $this->tipo_documento = NM_charset_to_utf8($this->tipo_documento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tipo_documento'])) ? $this->New_label['tipo_documento'] : "Tipo Documento"; 
         }
         else
         {
             $SC_Label = "tipo_documento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tipo_documento;
   }
   //----- estado
   function NM_export_estado()
   {
         $this->estado = NM_charset_to_utf8($this->estado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
         }
         else
         {
             $SC_Label = "estado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->estado;
   }
   //----- facturas
   function NM_export_facturas()
   {
         $this->facturas = NM_charset_to_utf8($this->facturas);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['facturas'])) ? $this->New_label['facturas'] : "Listar Cartera"; 
         }
         else
         {
             $SC_Label = "facturas"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->facturas;
   }
   //----- sc_asigna_vendedor
   function NM_export_sc_asigna_vendedor()
   {
         $this->sc_asigna_vendedor = NM_charset_to_utf8($this->sc_asigna_vendedor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sc_asigna_vendedor'])) ? $this->New_label['sc_asigna_vendedor'] : "Lo Atiende"; 
         }
         else
         {
             $SC_Label = "sc_asigna_vendedor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sc_asigna_vendedor;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Terceros :: JSON</TITLE>
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
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
<form name="Fdown" method="get" action="grid_terceros_todos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_terceros_todos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos']['json_return']); ?>"> 
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
