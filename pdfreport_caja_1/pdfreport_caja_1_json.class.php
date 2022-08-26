<?php

class pdfreport_caja_1_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_caja_1($cadapar[1]);
                   nm_protect_num_pdfreport_caja_1($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_caja_1']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($elbanco)) 
      {
          $_SESSION['elbanco'] = $elbanco;
          nm_limpa_str_pdfreport_caja_1($_SESSION["elbanco"]);
      }
      if (isset($lafecha)) 
      {
          $_SESSION['lafecha'] = $lafecha;
          nm_limpa_str_pdfreport_caja_1($_SESSION["lafecha"]);
      }
      if (isset($elprefijo)) 
      {
          $_SESSION['elprefijo'] = $elprefijo;
          nm_limpa_str_pdfreport_caja_1($_SESSION["elprefijo"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_caja_1/pdfreport_caja_1_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_caja_1']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_caja_1.zip";
      $this->Arquivo     .= "_pdfreport_caja_1";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_caja_1.json";
      $this->Tit_zip      = "pdfreport_caja_1.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->iva_0 = $Busca_temp['iva_0']; 
          $tmp_pos = strpos($this->iva_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->iva_0))
          {
              $this->iva_0 = substr($this->iva_0, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cheques = $Busca_temp['cheques']; 
          $tmp_pos = strpos($this->cheques, "##@@");
          if ($tmp_pos !== false && !is_array($this->cheques))
          {
              $this->cheques = substr($this->cheques, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'on';
 

$_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),fecha,121), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->fecha = $rs->fields[0] ;  
         $this->cantidad = $rs->fields[1] ;  
         $this->cantidad = (strpos(strtolower($this->cantidad), "e")) ? (float)$this->cantidad : $this->cantidad; 
         $this->cantidad = (string)$this->cantidad;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'on';
if (!isset($_SESSION['elprefijo'])) {$_SESSION['elprefijo'] = "";}
if (!isset($this->sc_temp_elprefijo)) {$this->sc_temp_elprefijo = (isset($_SESSION['elprefijo'])) ? $_SESSION['elprefijo'] : "";}
if (!isset($_SESSION['lafecha'])) {$_SESSION['lafecha'] = "";}
if (!isset($this->sc_temp_lafecha)) {$this->sc_temp_lafecha = (isset($_SESSION['lafecha'])) ? $_SESSION['lafecha'] : "";}
if (!isset($_SESSION['elbanco'])) {$_SESSION['elbanco'] = "";}
if (!isset($this->sc_temp_elbanco)) {$this->sc_temp_elbanco = (isset($_SESSION['elbanco'])) ? $_SESSION['elbanco'] : "";}
 $this->cheques =0.00;
$this->efectivo =0.00;
$this->tarjeta =0.00;
$this->credito =0.00;
$this->retefuente =0.00;
$this->reteica =0.00;
$this->reteiva =0.00;
$this->cree =0.00;
$this->tot_rete =0.00;
$this->ajuste =0.00;
$this->iva_19 =0.00;
$this->iva_5 =0.00;
$this->iva_0 =0.00;
$this->tot_iva =0.00;
$this->base19 =0.00;
$this->base5 =0.00;
$this->base0 =0.00;
$this->tot_base =0.00;
$this->imp_consumo ='';
$this->imp_bolsa =0.00;
$this->nfac =0;
$this->c_efec  = 0;
$this->c_tarj  = 0;
$this->c_cheq  = 0;
$this->c_credito  = 0;
$this->porc_ef  = 0.00;
$this->porc_tarj  = 0.00;
$this->porc_cheq  = 0.00;
$this->porc_credito  = 0.00;
$this->depto  = 'DEPARTAMENTO: Sin departamento';


$i=0;
$j=0;
$x=0;
$vNdoc='';
$vNres='';
$vIdfv='';
$vLis='';
$vIdrc='';

 
      $nm_select = "SELECT razonsoc, nit, dv, direccion, telefono, correo, ciudad, nom_depto from datosemp Order By iddatos ASC Limit 1 "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dEmp = array();
      $this->demp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dEmp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->demp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dEmp = false;
          $this->dEmp_erro = $this->Db->ErrorMsg();
          $this->demp = false;
          $this->demp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->demp[0][0]))
	{
	$this->empresa =$this->demp[0][0].' '.'Nit: '.$this->demp[0][1].'-'.$this->demp[0][2];
	$this->dire_ =$this->demp[0][3].' - '.'Tel: '.$this->demp[0][4].' - '.$this->demp[0][6].', '.$this->demp[0][7];
	$this->correo_ =$this->demp[0][5];
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->facturado =$this->ds_fv[0][0];
	}

else
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->facturado =$this->ds_fv[0][0];
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select resolucion, prefijo, fecha, str_replace (convert(char(10),fec_vencimiento,102), '.', '-') + ' ' + convert(char(8),fec_vencimiento,20), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select resolucion, prefijo, fecha, convert(char(23),fec_vencimiento,121), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      else
      { 
          $nm_select = "select resolucion, prefijo, fecha, fec_vencimiento, primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dReso = array();
      $this->dreso = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dReso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dreso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dReso = false;
          $this->dReso_erro = $this->Db->ErrorMsg();
          $this->dreso = false;
          $this->dreso_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dreso[0][0]))
		{
		$this->resolu  = 'Resolución DIAN: '.$this->dreso[0][0].' de '.$this->dreso[0][6].' del '.$this->dreso[0][1].$this->dreso[0][4].' a la '.$this->dreso[0][1].$this->dreso[0][5].' de fecha: '.$this->dreso[0][2];
		}
	}




if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and tipo = 'FV' ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	
	}
$this->nfac =$this->ds_cont[0][0];

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}

if(isset($this->ds_cont2[0][1]))
	{
	$this->credito =$this->ds_cont2[0][1];
	$this->c_credito  = $this->ds_cont2[0][0];
	}

if($this->sc_temp_elprefijo<>'' or $this->sc_temp_elprefijo<>NULL or $this->sc_temp_elprefijo>0)
	{
	 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
	if (isset($this->ds_ca2[0][0]))
	{
	$vIdres=$this->ds_ca2[0][1];
	 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
	$this->rango .="Facurado desde ".$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
	}

	 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->ds_ca3[0][0]))
		{
		$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
		}
	}
else
	{
	 
      $nm_select = "SELECT COUNT(DISTINCT resolucion) AS cantidad FROM facturaven WHERE banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da_fv = array();
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
                        $this->da_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da_fv = false;
          $this->da_fv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->da_fv[0][0]))
		{
		if($this->da_fv[0][0]>1)
			{
			$this->rango ="RANGO: Varios";
			}
		else
			{
			 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
			if (isset($this->ds_ca2[0][0]))
			{
			$vIdres=$this->ds_ca2[0][1];
			 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
			$this->rango .="Facurado desde ".$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
			}

			 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;

			if (isset($this->ds_ca3[0][0]))
				{
				$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
				}
			}
		}
	
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}

else
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}

if(isset($this->ds_idf[0][0]))
	{ 
	foreach($this->ds_idf  as $ads_idf)
		{
		$i=$i+1;
		$vNdoc=$ads_idf[0];
		$vNres=$ads_idf[1];
		$vIdrc=$ads_idf[3];
		 
      $nm_select = "select idfacven from facturaven where numfacven='$vNdoc' and resolucion=$vNres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_fv[0][0]))
			{
			$vIdfv=$this->ds_fv[0][0];
			 
      $nm_select = "select idfp, monto from detallepagos where idfact=$vIdfv"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dp = false;
          $this->ds_dp_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_dp[0][0]))
				{
				foreach($this->ds_dp  as $ads_dp)
					{
					$j=$j+1;
					$vLis.=$ads_dp[0];
					switch ($vLis)
						{
						case 1:
						$this->efectivo =$this->efectivo +$ads_dp[1];
						$this->c_efec  = $this->c_efec +1;
						break;

						case 2:
						$this->tarjeta =$this->tarjeta +$ads_dp[1];
						$this->c_tarj  = $this->c_tarj +1;
						break;

						case 3:
						$this->cheques =$this->cheques +$ads_dp[1];
						$this->c_cheq  = $this->c_cheq +1;
						break;

						$vLisi='';
						}
					}
				}
			else
				{
				if($vIdrc>0)
					{
					 
      $nm_select = "select idfp, monto from detallepagos where idrc=$vIdrc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dpi = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dpi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dpi = false;
          $this->ds_dpi_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($this->ds_dpi[0][0]))
						{
						$vLisi='';
						foreach($this->ds_dpi  as $ads_dpi)
							{
							$x=$x+1;
							$vLisi.=$ads_dpi[0];
							switch ($vLisi)
								{
								case 1:
								$this->efectivo =$this->efectivo +$ads_dpi[1];
								$this->c_efec  = $this->c_efec +1;
								break;

								case 2:
								$this->tarjeta =$this->tarjeta +$ads_dpi[1];
								$this->c_tarj  = $this->c_tarj +1;
								break;

								case 3:
								$this->cheques =$this->cheques +$ads_dpi[1];
								$this->c_cheq  = $this->c_cheq +1;
								break;

								
								}
							$vLisi='';
							}
						$x=0;
						}
					else
						{
						$this->efectivo =$this->efectivo +$this->ds_idf[0][2];
						$this->c_efec  = $this->nfac  - $this->c_credito ;
						}
					}
				else
					{
					$this->efectivo =$this->efectivo +$ads_idf[2];
					$this->c_efec  = $this->nfac  - $this->c_credito ;
					}
				
				}
			$vIdfv='';
			$j=0;
			$vLis='';
			$vLisi='';
			$x=0;
			}
		$vNdoc='';
		$vNres='';
		$vIdrc='';
		}
	}
$this->totventa =$this->credito +$this->efectivo +$this->cheques +$this->tarjeta ;
$this->porc_ef  = round(($this->c_efec /$this->nfac ),2)*100;
$this->porc_tarj  = round(($this->c_tarj /$this->nfac ),2)*100;
$this->porc_cheq  = round(($this->c_cheq /$this->nfac ),2)*100;
$this->porc_credito  = round(($this->c_credito /$this->nfac ),2)*100;


if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}

$k=0;
$ads_facv='';
$vBase=0;
$vTasaRet=0;
$vTasaIca=0;
$vTasaRiva=0;
if(isset($this->ds_fav[0][0]))
	{
	foreach($this->ds_fav  as $ads_facv)
		{
		$k=$k+1;
		$vBase=$ads_facv[0]-$ads_facv[1];
		if($ads_facv[3]>0)
			{
			$vTasaRet=round(($ads_facv[3]/100), 3);
			$this->retefuente =round(($vBase*$vTasaRet), 2)+$this->retefuente ;
			}
		if($ads_facv[5]>0)
			{
			$vTasaIca=$ads_facv[5];
			$this->reteica =round((($vBase*$vTasaIca)/1000), 2)+$this->reteica ;
			}
		if($ads_facv[4]>0)
			{
			$vTasaRiva=round(($ads_facv[4]/100), 3);
			$this->reteiva =round(($ads_facv[1]*$vTasaIva), 0)+$this->reteiva ;
			}
		if($ads_facv[6]>0)
			{
			$vTcree=round(($ads_facv[6]/100), 3);
			$this->cree =round(($vBase*$vTcree), 0)+$this->cree ;
			}
		
		if($ads_facv[1]>0)
			{
			 
      $nm_select = "select iva, adicional, valorpar from detalleventa where numfac=$ads_facv[7]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_df = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_df[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_df = false;
          $this->dt_df_erro = $this->Db->ErrorMsg();
      } 
;
			$y=0;$this->prueba =$ads_facv[7];
			if(isset($this->dt_df[0][0]))
				{
				$vTiva='';
				foreach($this->dt_df  as $ads_df)
					{
					$y=$y+1;
					$vTiva=$ads_df[1];
					$this->tot_iva =$ads_df[0]+$this->tot_iva ;
					$this->tot_base =($ads_df[2]-$ads_df[0])+$this->tot_base ;
					switch($vTiva)
						{
						case 19:
						$this->iva_19 =$ads_df[0]+$this->iva_19 ;
						$this->base19 =($ads_df[2]-$ads_df[0])+$this->base19 ;
						break;
						
						case 5:
						$this->iva_5 =$ads_df[0]+$this->iva_5 ;
						$this->base5 =($ads_df[2]-$ads_df[0])+$this->base5 ;
						break;
						
						case 0:
						$this->iva_0 =$ads_df[0]+$this->iva_0 ;
						$this->base0 =$ads_df[2]+$this->base0 ;
						break;
						
						case 8:
						$this->imp_consumo =$ads_df[0]+$this->imp_consumo ;
						break;
						}
					$vTiva='';
					}
				$y=0;
				}
			}
		
		$vBase=0;
		$vTasaRet=0;
		$vTasaIca=0;
		$vTasaRiva=0;
		}
	}

$this->ajuste =round(($this->retefuente +$this->reteica +$this->reteiva ),0)-($this->retefuente +$this->reteica +$this->reteiva );
$this->tot_rete =$this->retefuente +$this->reteica +$this->reteiva +$this->ajuste ;
if($this->imp_consumo >0)
	{
	$this->imp_consumo =$this->imp_consumo ;
	}
else
	{
	$this->imp_consumo ='';
	}
if (isset($this->sc_temp_elbanco)) {$_SESSION['elbanco'] = $this->sc_temp_elbanco;}
if (isset($this->sc_temp_lafecha)) {$_SESSION['lafecha'] = $this->sc_temp_lafecha;}
if (isset($this->sc_temp_elprefijo)) {$_SESSION['elprefijo'] = $this->sc_temp_elprefijo;}
$_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "pdfreport_caja_1_res_json.class.php");
              $this->Res = new pdfreport_caja_1_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- fecha
   function NM_export_fecha()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
         }
         else
         {
             $SC_Label = "fecha"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fecha;
   }
   //----- cantidad
   function NM_export_cantidad()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
         }
         else
         {
             $SC_Label = "cantidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cantidad;
   }
   //----- cheques
   function NM_export_cheques()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cheques, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cheques'])) ? $this->New_label['cheques'] : "cheques"; 
         }
         else
         {
             $SC_Label = "cheques"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cheques;
   }
   //----- efectivo
   function NM_export_efectivo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->efectivo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['efectivo'])) ? $this->New_label['efectivo'] : "efectivo"; 
         }
         else
         {
             $SC_Label = "efectivo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->efectivo;
   }
   //----- facturado
   function NM_export_facturado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->facturado, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['facturado'])) ? $this->New_label['facturado'] : "facturado"; 
         }
         else
         {
             $SC_Label = "facturado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->facturado;
   }
   //----- rango
   function NM_export_rango()
   {
         $this->rango = NM_charset_to_utf8($this->rango);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rango'])) ? $this->New_label['rango'] : "rango"; 
         }
         else
         {
             $SC_Label = "rango"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rango;
   }
   //----- tarjeta
   function NM_export_tarjeta()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tarjeta, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "tarjeta"; 
         }
         else
         {
             $SC_Label = "tarjeta"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tarjeta;
   }
   //----- prueba
   function NM_export_prueba()
   {
         $this->prueba = NM_charset_to_utf8($this->prueba);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['prueba'])) ? $this->New_label['prueba'] : "prueba"; 
         }
         else
         {
             $SC_Label = "prueba"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->prueba;
   }
   //----- nfac
   function NM_export_nfac()
   {
         $this->nfac = NM_charset_to_utf8($this->nfac);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nfac'])) ? $this->New_label['nfac'] : "nfac"; 
         }
         else
         {
             $SC_Label = "nfac"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nfac;
   }
   //----- totventa
   function NM_export_totventa()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totventa, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "N", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totventa'])) ? $this->New_label['totventa'] : "totventa"; 
         }
         else
         {
             $SC_Label = "totventa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totventa;
   }
   //----- credito
   function NM_export_credito()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->credito, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "credito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->credito;
   }
   //----- retefuente
   function NM_export_retefuente()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->retefuente, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['retefuente'])) ? $this->New_label['retefuente'] : "retefuente"; 
         }
         else
         {
             $SC_Label = "retefuente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->retefuente;
   }
   //----- reteica
   function NM_export_reteica()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->reteica, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "N", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['reteica'])) ? $this->New_label['reteica'] : "reteica"; 
         }
         else
         {
             $SC_Label = "reteica"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->reteica;
   }
   //----- reteiva
   function NM_export_reteiva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->reteiva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['reteiva'])) ? $this->New_label['reteiva'] : "reteiva"; 
         }
         else
         {
             $SC_Label = "reteiva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->reteiva;
   }
   //----- cree
   function NM_export_cree()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cree, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cree'])) ? $this->New_label['cree'] : "cree"; 
         }
         else
         {
             $SC_Label = "cree"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cree;
   }
   //----- tot_rete
   function NM_export_tot_rete()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tot_rete, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tot_rete'])) ? $this->New_label['tot_rete'] : "tot_rete"; 
         }
         else
         {
             $SC_Label = "tot_rete"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tot_rete;
   }
   //----- ajuste
   function NM_export_ajuste()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->ajuste, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ajuste'])) ? $this->New_label['ajuste'] : "ajuste"; 
         }
         else
         {
             $SC_Label = "ajuste"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ajuste;
   }
   //----- iva_19
   function NM_export_iva_19()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['iva_19'])) ? $this->New_label['iva_19'] : "iva_19"; 
         }
         else
         {
             $SC_Label = "iva_19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->iva_19;
   }
   //----- iva_5
   function NM_export_iva_5()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['iva_5'])) ? $this->New_label['iva_5'] : "iva_5"; 
         }
         else
         {
             $SC_Label = "iva_5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->iva_5;
   }
   //----- iva_0
   function NM_export_iva_0()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->iva_0, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['iva_0'])) ? $this->New_label['iva_0'] : "iva_0"; 
         }
         else
         {
             $SC_Label = "iva_0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->iva_0;
   }
   //----- tot_iva
   function NM_export_tot_iva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tot_iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tot_iva'])) ? $this->New_label['tot_iva'] : "tot_iva"; 
         }
         else
         {
             $SC_Label = "tot_iva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tot_iva;
   }
   //----- tot_base
   function NM_export_tot_base()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tot_base, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tot_base'])) ? $this->New_label['tot_base'] : "tot_base"; 
         }
         else
         {
             $SC_Label = "tot_base"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tot_base;
   }
   //----- base19
   function NM_export_base19()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->base19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['base19'])) ? $this->New_label['base19'] : "base19"; 
         }
         else
         {
             $SC_Label = "base19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->base19;
   }
   //----- base5
   function NM_export_base5()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->base5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['base5'])) ? $this->New_label['base5'] : "base5"; 
         }
         else
         {
             $SC_Label = "base5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->base5;
   }
   //----- base0
   function NM_export_base0()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->base0, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['base0'])) ? $this->New_label['base0'] : "base0"; 
         }
         else
         {
             $SC_Label = "base0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->base0;
   }
   //----- imp_consumo
   function NM_export_imp_consumo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->imp_consumo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['imp_consumo'])) ? $this->New_label['imp_consumo'] : "imp_consumo"; 
         }
         else
         {
             $SC_Label = "imp_consumo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->imp_consumo;
   }
   //----- tot_impoconsumo
   function NM_export_tot_impoconsumo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tot_impoconsumo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tot_impoconsumo'])) ? $this->New_label['tot_impoconsumo'] : "tot_impoconsumo"; 
         }
         else
         {
             $SC_Label = "tot_impoconsumo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tot_impoconsumo;
   }
   //----- imp_bolsa
   function NM_export_imp_bolsa()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->imp_bolsa, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['imp_bolsa'])) ? $this->New_label['imp_bolsa'] : "imp_bolsa"; 
         }
         else
         {
             $SC_Label = "imp_bolsa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->imp_bolsa;
   }
   //----- descuentos
   function NM_export_descuentos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->descuentos, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['descuentos'])) ? $this->New_label['descuentos'] : "descuentos"; 
         }
         else
         {
             $SC_Label = "descuentos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->descuentos;
   }
   //----- c_efec
   function NM_export_c_efec()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c_efec, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c_efec'])) ? $this->New_label['c_efec'] : "c_efec"; 
         }
         else
         {
             $SC_Label = "c_efec"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c_efec;
   }
   //----- c_tarj
   function NM_export_c_tarj()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c_tarj, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c_tarj'])) ? $this->New_label['c_tarj'] : "c_tarj"; 
         }
         else
         {
             $SC_Label = "c_tarj"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c_tarj;
   }
   //----- c_cheq
   function NM_export_c_cheq()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c_cheq, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c_cheq'])) ? $this->New_label['c_cheq'] : "c_cheq"; 
         }
         else
         {
             $SC_Label = "c_cheq"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c_cheq;
   }
   //----- c_credito
   function NM_export_c_credito()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->c_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['c_credito'])) ? $this->New_label['c_credito'] : "c_credito"; 
         }
         else
         {
             $SC_Label = "c_credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->c_credito;
   }
   //----- porc_ef
   function NM_export_porc_ef()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->porc_ef, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['porc_ef'])) ? $this->New_label['porc_ef'] : "porc_ef"; 
         }
         else
         {
             $SC_Label = "porc_ef"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->porc_ef;
   }
   //----- porc_tarj
   function NM_export_porc_tarj()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->porc_tarj, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['porc_tarj'])) ? $this->New_label['porc_tarj'] : "porc_tarj"; 
         }
         else
         {
             $SC_Label = "porc_tarj"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->porc_tarj;
   }
   //----- porc_cheq
   function NM_export_porc_cheq()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->porc_cheq, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['porc_cheq'])) ? $this->New_label['porc_cheq'] : "porc_cheq"; 
         }
         else
         {
             $SC_Label = "porc_cheq"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->porc_cheq;
   }
   //----- porc_credito
   function NM_export_porc_credito()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->porc_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['porc_credito'])) ? $this->New_label['porc_credito'] : "porc_credito"; 
         }
         else
         {
             $SC_Label = "porc_credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->porc_credito;
   }
   //----- depto
   function NM_export_depto()
   {
         $this->depto = NM_charset_to_utf8($this->depto);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['depto'])) ? $this->New_label['depto'] : "depto"; 
         }
         else
         {
             $SC_Label = "depto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->depto;
   }
   //----- empresa
   function NM_export_empresa()
   {
         $this->empresa = NM_charset_to_utf8($this->empresa);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa'])) ? $this->New_label['empresa'] : "empresa"; 
         }
         else
         {
             $SC_Label = "empresa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa;
   }
   //----- resolu
   function NM_export_resolu()
   {
         $this->resolu = NM_charset_to_utf8($this->resolu);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['resolu'])) ? $this->New_label['resolu'] : "resolu"; 
         }
         else
         {
             $SC_Label = "resolu"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->resolu;
   }
   //----- dire_
   function NM_export_dire_()
   {
         $this->dire_ = NM_charset_to_utf8($this->dire_);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dire_'])) ? $this->New_label['dire_'] : "dire_"; 
         }
         else
         {
             $SC_Label = "dire_"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dire_;
   }
   //----- correo_
   function NM_export_correo_()
   {
         $this->correo_ = NM_charset_to_utf8($this->correo_);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['correo_'])) ? $this->New_label['correo_'] : "correo_"; 
         }
         else
         {
             $SC_Label = "correo_"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->correo_;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - caja :: JSON</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_caja_1_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_caja_1"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['json_return']); ?>"> 
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
