<?php

class pdfreport_pedidos_cti_proforma_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_pedidos_cti_proforma($cadapar[1]);
                   nm_protect_num_pdfreport_pedidos_cti_proforma($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_pedidos_cti_proforma']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($nit)) 
      {
          $_SESSION['nit'] = $nit;
          nm_limpa_str_pdfreport_pedidos_cti_proforma($_SESSION["nit"]);
      }
      if (isset($par_pedido)) 
      {
          $_SESSION['par_pedido'] = $par_pedido;
          nm_limpa_str_pdfreport_pedidos_cti_proforma($_SESSION["par_pedido"]);
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_pdfreport_pedidos_cti_proforma($_SESSION["empresa"]);
      }
      if (isset($direccion)) 
      {
          $_SESSION['direccion'] = $direccion;
          nm_limpa_str_pdfreport_pedidos_cti_proforma($_SESSION["direccion"]);
      }
      if (isset($tele)) 
      {
          $_SESSION['tele'] = $tele;
          nm_limpa_str_pdfreport_pedidos_cti_proforma($_SESSION["tele"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_pedidos_cti_proforma/pdfreport_pedidos_cti_proforma_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_pedidos_cti_proforma.zip";
      $this->Arquivo     .= "_pdfreport_pedidos_cti_proforma";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_pedidos_cti_proforma.json";
      $this->Tit_zip      = "pdfreport_pedidos_cti_proforma.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->prefijo_ped = $Busca_temp['prefijo_ped']; 
          $tmp_pos = strpos($this->prefijo_ped, "##@@");
          if ($tmp_pos !== false && !is_array($this->prefijo_ped))
          {
              $this->prefijo_ped = substr($this->prefijo_ped, 0, $tmp_pos);
          }
          $this->prefijo_ped_2 = $Busca_temp['prefijo_ped_input_2']; 
          $this->idpedido = $Busca_temp['idpedido']; 
          $tmp_pos = strpos($this->idpedido, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpedido))
          {
              $this->idpedido = substr($this->idpedido, 0, $tmp_pos);
          }
          $this->idpedido_2 = $Busca_temp['idpedido_input_2']; 
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->numfacven_2 = $Busca_temp['numfacven_input_2']; 
          $this->nremision = $Busca_temp['nremision']; 
          $tmp_pos = strpos($this->nremision, "##@@");
          if ($tmp_pos !== false && !is_array($this->nremision))
          {
              $this->nremision = substr($this->nremision, 0, $tmp_pos);
          }
          $this->nremision_2 = $Busca_temp['nremision_input_2']; 
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
          $this->credito_2 = $Busca_temp['credito_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['par_pedido'])) {$_SESSION['par_pedido'] = "";}
if (!isset($this->sc_temp_par_pedido)) {$this->sc_temp_par_pedido = (isset($_SESSION['par_pedido'])) ? $_SESSION['par_pedido'] : "";}
  $_SESSION['pdfreport_pedidos_cti_proforma']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_pedidos_cti_proforma']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_pedidos_cti_proforma']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_pedidos_cti_proforma']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asentada from pedidos where idpedido=$this->sc_temp_par_pedido"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
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
                        $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
if($this->des[0][0]==0)
	{
	echo 'PEDIDO NO ESTÁ ASENTADO, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_pedido)) {$_SESSION['par_pedido'] = $this->sc_temp_par_pedido;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, LOTOFILE(logo, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['order_grid'];
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->idpedido = $rs->fields[0] ;  
         $this->idpedido = (string)$this->idpedido;
         $this->numfacven = $rs->fields[1] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->nremision = $rs->fields[2] ;  
         $this->nremision = (string)$this->nremision;
         $this->credito = $rs->fields[3] ;  
         $this->credito = (string)$this->credito;
         $this->fechaven = $rs->fields[4] ;  
         $this->fechavenc = $rs->fields[5] ;  
         $this->idcli = $rs->fields[6] ;  
         $this->idcli = (string)$this->idcli;
         $this->subtotal = $rs->fields[7] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[8] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;
         $this->total = $rs->fields[9] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->facturado = $rs->fields[10] ;  
         $this->asentada = $rs->fields[11] ;  
         $this->asentada = (string)$this->asentada;
         $this->observaciones = $rs->fields[12] ;  
         $this->saldo = $rs->fields[13] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[14] ;  
         $this->adicional = (string)$this->adicional;
         $this->formapago = $rs->fields[15] ;  
         $this->adicional2 = $rs->fields[16] ;  
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[17] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->obspago = $rs->fields[18] ;  
         $this->vendedor = $rs->fields[19] ;  
         $this->vendedor = (string)$this->vendedor;
         $this->dircliente = $rs->fields[20] ;  
         $this->dircliente = (string)$this->dircliente;
         $this->numpedido = $rs->fields[21] ;  
         $this->numpedido = (string)$this->numpedido;
         $this->prefijo_ped = $rs->fields[22] ;  
         $this->prefijo_ped = (string)$this->prefijo_ped;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->logo = "";  
              if (is_file($rs_grid->fields[23])) 
              { 
                  $this->logo = file_get_contents($rs_grid->fields[23]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->logo = $this->Db->BlobDecode($rs->fields[23]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->logo = $this->Db->BlobDecode($rs->fields[23]) ;  
         } 
         else
         { 
             $this->logo = $rs->fields[23] ;  
         } 
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         //----- lookup - vendedor
         $this->look_vendedor = $this->vendedor; 
         $this->Lookup->lookup_vendedor($this->look_vendedor, $this->vendedor) ; 
         $this->look_vendedor = ($this->look_vendedor == "&nbsp;") ? "" : $this->look_vendedor; 
         //----- lookup - dircliente
         $this->look_dircliente = $this->dircliente; 
         $this->Lookup->lookup_dircliente($this->look_dircliente, $this->dircliente) ; 
         $this->look_dircliente = ($this->look_dircliente == "&nbsp;") ? "" : $this->look_dircliente; 
         //----- lookup - prefijo_ped
         $this->look_prefijo_ped = $this->prefijo_ped; 
         $this->Lookup->lookup_prefijo_ped($this->look_prefijo_ped, $this->prefijo_ped) ; 
         $this->look_prefijo_ped = ($this->look_prefijo_ped == "&nbsp;") ? "" : $this->look_prefijo_ped; 
         $this->logo = "";
         $this->sc_proc_grid = true; 
         //----- lookup - municipio
         $this->Lookup->lookup_municipio($this->municipio, $this->municipio, $this->array_municipio); 
         $this->municipio = str_replace("<br>", " ", $this->municipio); 
         $this->municipio = ($this->municipio == "&nbsp;") ? "" : $this->municipio; 
         //----- lookup - detallepedido_fl_colores
         $this->Lookup->lookup_detallepedido_fl_colores($this->detallepedido_fl_colores, $this->detallepedido_fl_colores, $this->array_detallepedido_fl_colores); 
         $this->detallepedido_fl_colores = str_replace("<br>", " ", $this->detallepedido_fl_colores); 
         $this->detallepedido_fl_colores = ($this->detallepedido_fl_colores == "&nbsp;") ? "" : $this->detallepedido_fl_colores; 
         //----- lookup - detallepedido_fl_tallas
         $this->Lookup->lookup_detallepedido_fl_tallas($this->detallepedido_fl_tallas, $this->detallepedido_fl_tallas, $this->array_detallepedido_fl_tallas); 
         $this->detallepedido_fl_tallas = str_replace("<br>", " ", $this->detallepedido_fl_tallas); 
         $this->detallepedido_fl_tallas = ($this->detallepedido_fl_tallas == "&nbsp;") ? "" : $this->detallepedido_fl_tallas; 
         //----- lookup - detallepedido_fl_sabor
         $this->Lookup->lookup_detallepedido_fl_sabor($this->detallepedido_fl_sabor, $this->detallepedido_fl_sabor, $this->array_detallepedido_fl_sabor); 
         $this->detallepedido_fl_sabor = str_replace("<br>", " ", $this->detallepedido_fl_sabor); 
         $this->detallepedido_fl_sabor = ($this->detallepedido_fl_sabor == "&nbsp;") ? "" : $this->detallepedido_fl_sabor; 
         $_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'on';
   
      $nm_select = "select documento, dv, tel_cel, idmuni from terceros where idtercero=$this->idcli  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->idcli !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(!empty($this->ds[0][0]))
   {
	$this->documento = $this->ds[0][0];
	if(!empty($this->ds[0][1]))
	{
		$this->d_v ="-".$this->ds[0][1];
	}
	else
	{
		$this->d_v ="";
	}
	$this->telefono =$this->ds[0][2];
	$this->municipio =$this->ds[0][3];
	}
$this->el_prefijo();
$_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "pdfreport_pedidos_cti_proforma_res_json.class.php");
              $this->Res = new pdfreport_pedidos_cti_proforma_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idpedido
   function NM_export_idpedido()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idpedido, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idpedido'])) ? $this->New_label['idpedido'] : "Idpedido"; 
         }
         else
         {
             $SC_Label = "idpedido"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idpedido;
   }
   //----- numfacven
   function NM_export_numfacven()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Numfacven"; 
         }
         else
         {
             $SC_Label = "numfacven"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numfacven;
   }
   //----- nremision
   function NM_export_nremision()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->nremision, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nremision'])) ? $this->New_label['nremision'] : "Nremision"; 
         }
         else
         {
             $SC_Label = "nremision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nremision;
   }
   //----- credito
   function NM_export_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_credito;
   }
   //----- fechaven
   function NM_export_fechaven()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fechaven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaven, "YYYY-MM-DD  ");
                 $this->fechaven = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fechaven"; 
         }
         else
         {
             $SC_Label = "fechaven"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechaven;
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Fechavenc"; 
         }
         else
         {
             $SC_Label = "fechavenc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechavenc;
   }
   //----- idcli
   function NM_export_idcli()
   {
         nmgp_Form_Num_Val($this->look_idcli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Idcli"; 
         }
         else
         {
             $SC_Label = "idcli"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idcli;
   }
   //----- subtotal
   function NM_export_subtotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
         }
         else
         {
             $SC_Label = "subtotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->subtotal;
   }
   //----- valoriva
   function NM_export_valoriva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
         }
         else
         {
             $SC_Label = "valoriva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoriva;
   }
   //----- total
   function NM_export_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->total;
   }
   //----- facturado
   function NM_export_facturado()
   {
         $this->facturado = NM_charset_to_utf8($this->facturado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['facturado'])) ? $this->New_label['facturado'] : "Facturado"; 
         }
         else
         {
             $SC_Label = "facturado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->facturado;
   }
   //----- asentada
   function NM_export_asentada()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->asentada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
         }
         else
         {
             $SC_Label = "asentada"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->asentada;
   }
   //----- observaciones
   function NM_export_observaciones()
   {
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
   //----- saldo
   function NM_export_saldo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
   //----- adicional
   function NM_export_adicional()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
         }
         else
         {
             $SC_Label = "adicional"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional;
   }
   //----- formapago
   function NM_export_formapago()
   {
         $this->formapago = NM_charset_to_utf8($this->formapago);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['formapago'])) ? $this->New_label['formapago'] : "Formapago"; 
         }
         else
         {
             $SC_Label = "formapago"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->formapago;
   }
   //----- adicional2
   function NM_export_adicional2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
         }
         else
         {
             $SC_Label = "adicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional2;
   }
   //----- adicional3
   function NM_export_adicional3()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
         }
         else
         {
             $SC_Label = "adicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional3;
   }
   //----- obspago
   function NM_export_obspago()
   {
         $this->obspago = NM_charset_to_utf8($this->obspago);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['obspago'])) ? $this->New_label['obspago'] : "Obspago"; 
         }
         else
         {
             $SC_Label = "obspago"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->obspago;
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         nmgp_Form_Num_Val($this->look_vendedor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
         }
         else
         {
             $SC_Label = "vendedor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_vendedor;
   }
   //----- dircliente
   function NM_export_dircliente()
   {
         nmgp_Form_Num_Val($this->look_dircliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_dircliente = NM_charset_to_utf8($this->look_dircliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dircliente'])) ? $this->New_label['dircliente'] : "Dircliente"; 
         }
         else
         {
             $SC_Label = "dircliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_dircliente;
   }
   //----- numpedido
   function NM_export_numpedido()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->numpedido, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numpedido'])) ? $this->New_label['numpedido'] : "Numpedido"; 
         }
         else
         {
             $SC_Label = "numpedido"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numpedido;
   }
   //----- prefijo_ped
   function NM_export_prefijo_ped()
   {
         nmgp_Form_Num_Val($this->look_prefijo_ped, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_prefijo_ped = NM_charset_to_utf8($this->look_prefijo_ped);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['prefijo_ped'])) ? $this->New_label['prefijo_ped'] : "Prefijo Ped"; 
         }
         else
         {
             $SC_Label = "prefijo_ped"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_prefijo_ped;
   }
   //----- logo
   function NM_export_logo()
   {
         $this->logo = NM_charset_to_utf8($this->logo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "Logo"; 
         }
         else
         {
             $SC_Label = "logo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->logo;
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = NM_charset_to_utf8($this->documento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "documento"; 
         }
         else
         {
             $SC_Label = "documento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->documento;
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = NM_charset_to_utf8($this->telefono);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "telefono"; 
         }
         else
         {
             $SC_Label = "telefono"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->telefono;
   }
   //----- municipio
   function NM_export_municipio()
   {
         $this->municipio = NM_charset_to_utf8($this->municipio);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['municipio'])) ? $this->New_label['municipio'] : "municipio"; 
         }
         else
         {
             $SC_Label = "municipio"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->municipio;
   }
   //----- d_v
   function NM_export_d_v()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->d_v, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['d_v'])) ? $this->New_label['d_v'] : "d_v"; 
         }
         else
         {
             $SC_Label = "d_v"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->d_v;
   }
   //----- detallepedido
   function NM_export_detallepedido()
   {
         $this->detallepedido = NM_charset_to_utf8($this->detallepedido);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido'])) ? $this->New_label['detallepedido'] : "detallepedido"; 
         }
         else
         {
             $SC_Label = "detallepedido"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido;
   }
   //----- detallepedido_unidad
   function NM_export_detallepedido_unidad()
   {
         $this->detallepedido_unidad = NM_charset_to_utf8($this->detallepedido_unidad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_unidad'])) ? $this->New_label['detallepedido_unidad'] : "Unidad"; 
         }
         else
         {
             $SC_Label = "detallepedido_unidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_unidad;
   }
   //----- detallepedido_valorunita
   function NM_export_detallepedido_valorunita()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_valorunita, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_valorunita'])) ? $this->New_label['detallepedido_valorunita'] : "Valorunita"; 
         }
         else
         {
             $SC_Label = "detallepedido_valorunita"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_valorunita;
   }
   //----- detallepedido_parcial
   function NM_export_detallepedido_parcial()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_parcial, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_parcial'])) ? $this->New_label['detallepedido_parcial'] : "Parcial"; 
         }
         else
         {
             $SC_Label = "detallepedido_parcial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_parcial;
   }
   //----- detallepedido_fl_iddet
   function NM_export_detallepedido_fl_iddet()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_iddet, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_iddet'])) ? $this->New_label['detallepedido_fl_iddet'] : "Iddet"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_iddet"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_iddet;
   }
   //----- detallepedido_fl_idpedid
   function NM_export_detallepedido_fl_idpedid()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_idpedid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_idpedid'])) ? $this->New_label['detallepedido_fl_idpedid'] : "Idpedid"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_idpedid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_idpedid;
   }
   //----- detallepedido_fl_idpro
   function NM_export_detallepedido_fl_idpro()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_idpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_idpro'])) ? $this->New_label['detallepedido_fl_idpro'] : "Idpro"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_idpro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_idpro;
   }
   //----- detallepedido_j_nompro
   function NM_export_detallepedido_j_nompro()
   {
         $this->detallepedido_j_nompro = NM_charset_to_utf8($this->detallepedido_j_nompro);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_j_nompro'])) ? $this->New_label['detallepedido_j_nompro'] : "Nompro"; 
         }
         else
         {
             $SC_Label = "detallepedido_j_nompro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_j_nompro;
   }
   //----- detallepedido_j_codigobar
   function NM_export_detallepedido_j_codigobar()
   {
         $this->detallepedido_j_codigobar = NM_charset_to_utf8($this->detallepedido_j_codigobar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_j_codigobar'])) ? $this->New_label['detallepedido_j_codigobar'] : "Codigobar"; 
         }
         else
         {
             $SC_Label = "detallepedido_j_codigobar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_j_codigobar;
   }
   //----- detallepedido_fl_unidadmayor
   function NM_export_detallepedido_fl_unidadmayor()
   {
         $this->detallepedido_fl_unidadmayor = NM_charset_to_utf8($this->detallepedido_fl_unidadmayor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_unidadmayor'])) ? $this->New_label['detallepedido_fl_unidadmayor'] : "Unidadmayor"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_unidadmayor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_unidadmayor;
   }
   //----- detallepedido_fl_factor
   function NM_export_detallepedido_fl_factor()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_factor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_factor'])) ? $this->New_label['detallepedido_fl_factor'] : "Factor"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_factor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_factor;
   }
   //----- detallepedido_fl_idbod
   function NM_export_detallepedido_fl_idbod()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_idbod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_idbod'])) ? $this->New_label['detallepedido_fl_idbod'] : "Idbod"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_idbod"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_idbod;
   }
   //----- detallepedido_fl_cantidad
   function NM_export_detallepedido_fl_cantidad()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_cantidad'])) ? $this->New_label['detallepedido_fl_cantidad'] : "Cantidad"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_cantidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_cantidad;
   }
   //----- detallepedido_fl_iva
   function NM_export_detallepedido_fl_iva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_iva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_iva'])) ? $this->New_label['detallepedido_fl_iva'] : "Iva"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_iva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_iva;
   }
   //----- detallepedido_fl_adicional
   function NM_export_detallepedido_fl_adicional()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_adicional'])) ? $this->New_label['detallepedido_fl_adicional'] : "Adicional"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_adicional"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_adicional;
   }
   //----- detallepedido_fl_adicional1
   function NM_export_detallepedido_fl_adicional1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detallepedido_fl_adicional1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_adicional1'])) ? $this->New_label['detallepedido_fl_adicional1'] : "Adicional 1"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_adicional1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_adicional1;
   }
   //----- detallepedido_fl_colores
   function NM_export_detallepedido_fl_colores()
   {
         nmgp_Form_Num_Val($this->detallepedido_fl_colores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_colores'])) ? $this->New_label['detallepedido_fl_colores'] : "Colores"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_colores"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_colores;
   }
   //----- detallepedido_fl_tallas
   function NM_export_detallepedido_fl_tallas()
   {
         nmgp_Form_Num_Val($this->detallepedido_fl_tallas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_tallas'])) ? $this->New_label['detallepedido_fl_tallas'] : "Tallas"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_tallas"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_tallas;
   }
   //----- detallepedido_fl_sabor
   function NM_export_detallepedido_fl_sabor()
   {
         nmgp_Form_Num_Val($this->detallepedido_fl_sabor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detallepedido_fl_sabor'])) ? $this->New_label['detallepedido_fl_sabor'] : "Sabor"; 
         }
         else
         {
             $SC_Label = "detallepedido_fl_sabor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detallepedido_fl_sabor;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - pedidos :: JSON</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_pedidos_cti_proforma_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_pedidos_cti_proforma"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_cti_proforma']['json_return']); ?>"> 
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
function el_prefijo()
{
$_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'on';
  
$pref=$this->prefijo_ped ;
 
      $nm_select = "select prefijo from resdian where Idres=$pref"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->pre = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->pre[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->pre = false;
          $this->pre_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->pre[0][0]))
	{
	$cad=$this->pre[0][0]; 
	$existe=strpos ($cad, 'PED');
	if($existe !== false)
		{
		$_SESSION['pdfreport_pedidos_cti_proforma']['tipodocu']='PEDIDO';
		}
	else
		{
		$existe=strpos ($cad, 'COT');
		if($existe!== false)
			{
			$_SESSION['pdfreport_pedidos_cti_proforma']['tipodocu']='COTIZACIÓN';
			}
		else
			{
			$_SESSION['pdfreport_pedidos_cti_proforma']['tipodocu']='PROFORMA';
			}
		}
	}
$_SESSION['scriptcase']['pdfreport_pedidos_cti_proforma']['contr_erro'] = 'off';
}
}

?>
