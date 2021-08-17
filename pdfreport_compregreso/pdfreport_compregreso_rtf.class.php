<?php

class pdfreport_compregreso_rtf
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
                   nm_limpa_str_pdfreport_compregreso($cadapar[1]);
                   nm_protect_num_pdfreport_compregreso($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_compregreso']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($par_comegreso)) 
      {
          $_SESSION['par_comegreso'] = $par_comegreso;
          nm_limpa_str_pdfreport_compregreso($_SESSION["par_comegreso"]);
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_pdfreport_compregreso($_SESSION["empresa"]);
      }
      if (isset($nit)) 
      {
          $_SESSION['nit'] = $nit;
          nm_limpa_str_pdfreport_compregreso($_SESSION["nit"]);
      }
      if (isset($direccion)) 
      {
          $_SESSION['direccion'] = $direccion;
          nm_limpa_str_pdfreport_compregreso($_SESSION["direccion"]);
      }
      if (isset($tele)) 
      {
          $_SESSION['tele'] = $tele;
          nm_limpa_str_pdfreport_compregreso($_SESSION["tele"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "pdfreport_compregreso_total.class.php"); 
      $this->Tot      = new pdfreport_compregreso_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_compregreso']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_compregreso";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_compregreso.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->porc_ret = $Busca_temp['porc_ret']; 
          $tmp_pos = strpos($this->porc_ret, "##@@");
          if ($tmp_pos !== false && !is_array($this->porc_ret))
          {
              $this->porc_ret = substr($this->porc_ret, 0, $tmp_pos);
          }
          $this->idpago = $Busca_temp['idpago']; 
          $tmp_pos = strpos($this->idpago, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpago))
          {
              $this->idpago = substr($this->idpago, 0, $tmp_pos);
          }
          $this->idpago_2 = $Busca_temp['idpago_input_2']; 
          $this->numpago = $Busca_temp['numpago']; 
          $tmp_pos = strpos($this->numpago, "##@@");
          if ($tmp_pos !== false && !is_array($this->numpago))
          {
              $this->numpago = substr($this->numpago, 0, $tmp_pos);
          }
          $this->numpago_2 = $Busca_temp['numpago_input_2']; 
          $this->client = $Busca_temp['client']; 
          $tmp_pos = strpos($this->client, "##@@");
          if ($tmp_pos !== false && !is_array($this->client))
          {
              $this->client = substr($this->client, 0, $tmp_pos);
          }
          $this->client_2 = $Busca_temp['client_input_2']; 
          $this->fecpago = $Busca_temp['fecpago']; 
          $tmp_pos = strpos($this->fecpago, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecpago))
          {
              $this->fecpago = substr($this->fecpago, 0, $tmp_pos);
          }
          $this->fecpago_2 = $Busca_temp['fecpago_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['par_comegreso'])) {$_SESSION['par_comegreso'] = "";}
if (!isset($this->sc_temp_par_comegreso)) {$this->sc_temp_par_comegreso = (isset($_SESSION['par_comegreso'])) ? $_SESSION['par_comegreso'] : "";}
  $_SESSION['pdfreport_compregreso']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_compregreso']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_compregreso']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_compregreso']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asent from pagos where idpago=$this->sc_temp_par_comegreso"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if($this->des[0][0]=='NO')
	{
	echo 'COMPROBANTE NO ESTÁ ASENTADO, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_comegreso)) {$_SESSION['par_comegreso'] = $this->sc_temp_par_comegreso;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idpago'])) ? $this->New_label['idpago'] : "Idpago"; 
          if ($Cada_col == "idpago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numpago'])) ? $this->New_label['numpago'] : "Numpago"; 
          if ($Cada_col == "numpago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['client'])) ? $this->New_label['client'] : "Client"; 
          if ($Cada_col == "client" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecpago'])) ? $this->New_label['fecpago'] : "Fecpago"; 
          if ($Cada_col == "fecpago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['montocan'])) ? $this->New_label['montocan'] : "Montocan"; 
          if ($Cada_col == "montocan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ret'])) ? $this->New_label['ret'] : "Ret"; 
          if ($Cada_col == "ret" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descuent'])) ? $this->New_label['descuent'] : "Descuent"; 
          if ($Cada_col == "descuent" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['docapagar'])) ? $this->New_label['docapagar'] : "Docapagar"; 
          if ($Cada_col == "docapagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iddocapagar'])) ? $this->New_label['iddocapagar'] : "Iddocapagar"; 
          if ($Cada_col == "iddocapagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['saldodocumento'])) ? $this->New_label['saldodocumento'] : "Saldodocumento"; 
          if ($Cada_col == "saldodocumento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['conc'])) ? $this->New_label['conc'] : "Conc"; 
          if ($Cada_col == "conc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "Obs"; 
          if ($Cada_col == "obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asent'])) ? $this->New_label['asent'] : "Asent"; 
          if ($Cada_col == "asent" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_ret'])) ? $this->New_label['porc_ret'] : "Porc Ret"; 
          if ($Cada_col == "porc_ret" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val_ica'])) ? $this->New_label['val_ica'] : "Val Ica"; 
          if ($Cada_col == "val_ica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_ica'])) ? $this->New_label['porc_ica'] : "Porc Ica"; 
          if ($Cada_col == "porc_ica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_reteiva'])) ? $this->New_label['porc_reteiva'] : "Porc Reteiva"; 
          if ($Cada_col == "porc_reteiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val_reteiva'])) ? $this->New_label['val_reteiva'] : "Val Reteiva"; 
          if ($Cada_col == "val_reteiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos'])) ? $this->New_label['detallepagos'] : "detallepagos"; 
          if ($Cada_col == "detallepagos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_banco'])) ? $this->New_label['detallepagos_banco'] : "Banco"; 
          if ($Cada_col == "detallepagos_banco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_fechacob'])) ? $this->New_label['detallepagos_fechacob'] : "Fechacob"; 
          if ($Cada_col == "detallepagos_fechacob" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_iddetall'])) ? $this->New_label['detallepagos_iddetall'] : "Iddetall"; 
          if ($Cada_col == "detallepagos_iddetall" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_idfact'])) ? $this->New_label['detallepagos_idfact'] : "Idfact"; 
          if ($Cada_col == "detallepagos_idfact" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_idfp'])) ? $this->New_label['detallepagos_idfp'] : "Idfp"; 
          if ($Cada_col == "detallepagos_idfp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_idrc'])) ? $this->New_label['detallepagos_idrc'] : "Idrc"; 
          if ($Cada_col == "detallepagos_idrc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_monto'])) ? $this->New_label['detallepagos_monto'] : "Monto"; 
          if ($Cada_col == "detallepagos_monto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detallepagos_numcheque'])) ? $this->New_label['detallepagos_numcheque'] : "Numcheque"; 
          if ($Cada_col == "detallepagos_numcheque" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT idpago, numpago, client, str_replace (convert(char(10),fecpago,102), '.', '-') + ' ' + convert(char(8),fecpago,20), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idpago, numpago, client, convert(char(23),fecpago,121), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idpago, numpago, client, EXTEND(fecpago, YEAR TO DAY), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['order_grid'];
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
         $this->idpago = $rs->fields[0] ;  
         $this->idpago = (string)$this->idpago;
         $this->numpago = $rs->fields[1] ;  
         $this->numpago = (string)$this->numpago;
         $this->client = $rs->fields[2] ;  
         $this->client = (string)$this->client;
         $this->fecpago = $rs->fields[3] ;  
         $this->montocan = $rs->fields[4] ;  
         $this->montocan =  str_replace(",", ".", $this->montocan);
         $this->montocan = (strpos(strtolower($this->montocan), "e")) ? (float)$this->montocan : $this->montocan; 
         $this->montocan = (string)$this->montocan;
         $this->ret = $rs->fields[5] ;  
         $this->ret =  str_replace(",", ".", $this->ret);
         $this->ret = (strpos(strtolower($this->ret), "e")) ? (float)$this->ret : $this->ret; 
         $this->ret = (string)$this->ret;
         $this->descuent = $rs->fields[6] ;  
         $this->descuent =  str_replace(",", ".", $this->descuent);
         $this->descuent = (strpos(strtolower($this->descuent), "e")) ? (float)$this->descuent : $this->descuent; 
         $this->descuent = (string)$this->descuent;
         $this->docapagar = $rs->fields[7] ;  
         $this->iddocapagar = $rs->fields[8] ;  
         $this->iddocapagar = (string)$this->iddocapagar;
         $this->saldodocumento = $rs->fields[9] ;  
         $this->saldodocumento =  str_replace(",", ".", $this->saldodocumento);
         $this->saldodocumento = (strpos(strtolower($this->saldodocumento), "e")) ? (float)$this->saldodocumento : $this->saldodocumento; 
         $this->saldodocumento = (string)$this->saldodocumento;
         $this->conc = $rs->fields[10] ;  
         $this->obs = $rs->fields[11] ;  
         $this->asent = $rs->fields[12] ;  
         $this->porc_ret = $rs->fields[13] ;  
         $this->porc_ret = (strpos(strtolower($this->porc_ret), "e")) ? (float)$this->porc_ret : $this->porc_ret; 
         $this->porc_ret = (string)$this->porc_ret;
         $this->val_ica = $rs->fields[14] ;  
         $this->val_ica =  str_replace(",", ".", $this->val_ica);
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;
         $this->porc_ica = $rs->fields[15] ;  
         $this->porc_ica = (strpos(strtolower($this->porc_ica), "e")) ? (float)$this->porc_ica : $this->porc_ica; 
         $this->porc_ica = (string)$this->porc_ica;
         $this->porc_reteiva = $rs->fields[16] ;  
         $this->porc_reteiva = (strpos(strtolower($this->porc_reteiva), "e")) ? (float)$this->porc_reteiva : $this->porc_reteiva; 
         $this->porc_reteiva = (string)$this->porc_reteiva;
         $this->val_reteiva = $rs->fields[17] ;  
         $this->val_reteiva =  str_replace(",", ".", $this->val_reteiva);
         $this->val_reteiva = (strpos(strtolower($this->val_reteiva), "e")) ? (float)$this->val_reteiva : $this->val_reteiva; 
         $this->val_reteiva = (string)$this->val_reteiva;
         //----- lookup - client
         $this->look_client = $this->client; 
         $this->Lookup->lookup_client($this->look_client, $this->client) ; 
         $this->look_client = ($this->look_client == "&nbsp;") ? "" : $this->look_client; 
         $this->sc_proc_grid = true; 
         //----- lookup - detallepagos_idfp
         $this->Lookup->lookup_detallepagos_idfp($this->detallepagos_idfp, $this->detallepagos_idfp, $this->array_detallepagos_idfp); 
         $this->detallepagos_idfp = str_replace("<br>", " ", $this->detallepagos_idfp); 
         $this->detallepagos_idfp = ($this->detallepagos_idfp == "&nbsp;") ? "" : $this->detallepagos_idfp; 
         $_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
  $this->ret =-$this->ret ;
$this->descuent =-$this->descuent ;
$this->val_ica =-$this->val_ica ;
$this->val_reteiva =-$this->val_reteiva ;


$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idpago
   function NM_export_idpago()
   {
             nmgp_Form_Num_Val($this->idpago, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idpago = NM_charset_to_utf8($this->idpago);
         $this->idpago = str_replace('<', '&lt;', $this->idpago);
         $this->idpago = str_replace('>', '&gt;', $this->idpago);
         $this->Texto_tag .= "<td>" . $this->idpago . "</td>\r\n";
   }
   //----- numpago
   function NM_export_numpago()
   {
             nmgp_Form_Num_Val($this->numpago, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numpago = NM_charset_to_utf8($this->numpago);
         $this->numpago = str_replace('<', '&lt;', $this->numpago);
         $this->numpago = str_replace('>', '&gt;', $this->numpago);
         $this->Texto_tag .= "<td>" . $this->numpago . "</td>\r\n";
   }
   //----- client
   function NM_export_client()
   {
         $this->look_client = html_entity_decode($this->look_client, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_client = strip_tags($this->look_client);
         $this->look_client = NM_charset_to_utf8($this->look_client);
         $this->look_client = str_replace('<', '&lt;', $this->look_client);
         $this->look_client = str_replace('>', '&gt;', $this->look_client);
         $this->Texto_tag .= "<td>" . $this->look_client . "</td>\r\n";
   }
   //----- fecpago
   function NM_export_fecpago()
   {
             $conteudo_x =  $this->fecpago;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecpago, "YYYY-MM-DD  ");
                 $this->fecpago = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecpago = NM_charset_to_utf8($this->fecpago);
         $this->fecpago = str_replace('<', '&lt;', $this->fecpago);
         $this->fecpago = str_replace('>', '&gt;', $this->fecpago);
         $this->Texto_tag .= "<td>" . $this->fecpago . "</td>\r\n";
   }
   //----- montocan
   function NM_export_montocan()
   {
             nmgp_Form_Num_Val($this->montocan, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->montocan = NM_charset_to_utf8($this->montocan);
         $this->montocan = str_replace('<', '&lt;', $this->montocan);
         $this->montocan = str_replace('>', '&gt;', $this->montocan);
         $this->Texto_tag .= "<td>" . $this->montocan . "</td>\r\n";
   }
   //----- ret
   function NM_export_ret()
   {
             nmgp_Form_Num_Val($this->ret, ".", ",", "0", "S", "2", "$", "V:3:2", "-"); 
         $this->ret = NM_charset_to_utf8($this->ret);
         $this->ret = str_replace('<', '&lt;', $this->ret);
         $this->ret = str_replace('>', '&gt;', $this->ret);
         $this->Texto_tag .= "<td>" . $this->ret . "</td>\r\n";
   }
   //----- descuent
   function NM_export_descuent()
   {
             nmgp_Form_Num_Val($this->descuent, ".", ",", "0", "S", "2", "$", "V:3:2", "-"); 
         $this->descuent = NM_charset_to_utf8($this->descuent);
         $this->descuent = str_replace('<', '&lt;', $this->descuent);
         $this->descuent = str_replace('>', '&gt;', $this->descuent);
         $this->Texto_tag .= "<td>" . $this->descuent . "</td>\r\n";
   }
   //----- docapagar
   function NM_export_docapagar()
   {
         $this->docapagar = html_entity_decode($this->docapagar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->docapagar = strip_tags($this->docapagar);
         $this->docapagar = NM_charset_to_utf8($this->docapagar);
         $this->docapagar = str_replace('<', '&lt;', $this->docapagar);
         $this->docapagar = str_replace('>', '&gt;', $this->docapagar);
         $this->Texto_tag .= "<td>" . $this->docapagar . "</td>\r\n";
   }
   //----- iddocapagar
   function NM_export_iddocapagar()
   {
             nmgp_Form_Num_Val($this->iddocapagar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->iddocapagar = NM_charset_to_utf8($this->iddocapagar);
         $this->iddocapagar = str_replace('<', '&lt;', $this->iddocapagar);
         $this->iddocapagar = str_replace('>', '&gt;', $this->iddocapagar);
         $this->Texto_tag .= "<td>" . $this->iddocapagar . "</td>\r\n";
   }
   //----- saldodocumento
   function NM_export_saldodocumento()
   {
             nmgp_Form_Num_Val($this->saldodocumento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldodocumento = NM_charset_to_utf8($this->saldodocumento);
         $this->saldodocumento = str_replace('<', '&lt;', $this->saldodocumento);
         $this->saldodocumento = str_replace('>', '&gt;', $this->saldodocumento);
         $this->Texto_tag .= "<td>" . $this->saldodocumento . "</td>\r\n";
   }
   //----- conc
   function NM_export_conc()
   {
         $this->conc = html_entity_decode($this->conc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->conc = strip_tags($this->conc);
         $this->conc = NM_charset_to_utf8($this->conc);
         $this->conc = str_replace('<', '&lt;', $this->conc);
         $this->conc = str_replace('>', '&gt;', $this->conc);
         $this->Texto_tag .= "<td>" . $this->conc . "</td>\r\n";
   }
   //----- obs
   function NM_export_obs()
   {
         $this->obs = html_entity_decode($this->obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs = strip_tags($this->obs);
         $this->obs = NM_charset_to_utf8($this->obs);
         $this->obs = str_replace('<', '&lt;', $this->obs);
         $this->obs = str_replace('>', '&gt;', $this->obs);
         $this->Texto_tag .= "<td>" . $this->obs . "</td>\r\n";
   }
   //----- asent
   function NM_export_asent()
   {
         $this->asent = html_entity_decode($this->asent, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->asent = strip_tags($this->asent);
         $this->asent = NM_charset_to_utf8($this->asent);
         $this->asent = str_replace('<', '&lt;', $this->asent);
         $this->asent = str_replace('>', '&gt;', $this->asent);
         $this->Texto_tag .= "<td>" . $this->asent . "</td>\r\n";
   }
   //----- porc_ret
   function NM_export_porc_ret()
   {
             nmgp_Form_Num_Val($this->porc_ret, ".", ",", "2", "S", "2", "", "N:2", "-") ; 
         $this->porc_ret = NM_charset_to_utf8($this->porc_ret);
         $this->porc_ret = str_replace('<', '&lt;', $this->porc_ret);
         $this->porc_ret = str_replace('>', '&gt;', $this->porc_ret);
         $this->Texto_tag .= "<td>" . $this->porc_ret . "</td>\r\n";
   }
   //----- val_ica
   function NM_export_val_ica()
   {
             nmgp_Form_Num_Val($this->val_ica, ".", ",", "0", "S", "2", "$", "V:3:2", "-"); 
         $this->val_ica = NM_charset_to_utf8($this->val_ica);
         $this->val_ica = str_replace('<', '&lt;', $this->val_ica);
         $this->val_ica = str_replace('>', '&gt;', $this->val_ica);
         $this->Texto_tag .= "<td>" . $this->val_ica . "</td>\r\n";
   }
   //----- porc_ica
   function NM_export_porc_ica()
   {
             nmgp_Form_Num_Val($this->porc_ica, ".", ",", "2", "S", "2", "", "N:2", "-") ; 
         $this->porc_ica = NM_charset_to_utf8($this->porc_ica);
         $this->porc_ica = str_replace('<', '&lt;', $this->porc_ica);
         $this->porc_ica = str_replace('>', '&gt;', $this->porc_ica);
         $this->Texto_tag .= "<td>" . $this->porc_ica . "</td>\r\n";
   }
   //----- porc_reteiva
   function NM_export_porc_reteiva()
   {
             nmgp_Form_Num_Val($this->porc_reteiva, ".", ",", "2", "S", "2", "", "N:2", "-") ; 
         $this->porc_reteiva = NM_charset_to_utf8($this->porc_reteiva);
         $this->porc_reteiva = str_replace('<', '&lt;', $this->porc_reteiva);
         $this->porc_reteiva = str_replace('>', '&gt;', $this->porc_reteiva);
         $this->Texto_tag .= "<td>" . $this->porc_reteiva . "</td>\r\n";
   }
   //----- val_reteiva
   function NM_export_val_reteiva()
   {
             nmgp_Form_Num_Val($this->val_reteiva, ".", ",", "0", "S", "2", "$", "V:3:2", "-"); 
         $this->val_reteiva = NM_charset_to_utf8($this->val_reteiva);
         $this->val_reteiva = str_replace('<', '&lt;', $this->val_reteiva);
         $this->val_reteiva = str_replace('>', '&gt;', $this->val_reteiva);
         $this->Texto_tag .= "<td>" . $this->val_reteiva . "</td>\r\n";
   }
   //----- detallepagos
   function NM_export_detallepagos()
   {
         $this->detallepagos = NM_charset_to_utf8($this->detallepagos);
         $this->detallepagos = str_replace('<', '&lt;', $this->detallepagos);
         $this->detallepagos = str_replace('>', '&gt;', $this->detallepagos);
         $this->Texto_tag .= "<td>" . $this->detallepagos . "</td>\r\n";
   }
   //----- detallepagos_banco
   function NM_export_detallepagos_banco()
   {
         $this->detallepagos_banco = html_entity_decode($this->detallepagos_banco, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detallepagos_banco = strip_tags($this->detallepagos_banco);
         $this->detallepagos_banco = NM_charset_to_utf8($this->detallepagos_banco);
         $this->detallepagos_banco = str_replace('<', '&lt;', $this->detallepagos_banco);
         $this->detallepagos_banco = str_replace('>', '&gt;', $this->detallepagos_banco);
         $this->Texto_tag .= "<td>" . $this->detallepagos_banco . "</td>\r\n";
   }
   //----- detallepagos_fechacob
   function NM_export_detallepagos_fechacob()
   {
             $conteudo_x =  $this->detallepagos_fechacob;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->detallepagos_fechacob, "YYYY-MM-DD  ");
                 $this->detallepagos_fechacob = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->detallepagos_fechacob = NM_charset_to_utf8($this->detallepagos_fechacob);
         $this->detallepagos_fechacob = str_replace('<', '&lt;', $this->detallepagos_fechacob);
         $this->detallepagos_fechacob = str_replace('>', '&gt;', $this->detallepagos_fechacob);
         $this->Texto_tag .= "<td>" . $this->detallepagos_fechacob . "</td>\r\n";
   }
   //----- detallepagos_iddetall
   function NM_export_detallepagos_iddetall()
   {
             nmgp_Form_Num_Val($this->detallepagos_iddetall, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detallepagos_iddetall = NM_charset_to_utf8($this->detallepagos_iddetall);
         $this->detallepagos_iddetall = str_replace('<', '&lt;', $this->detallepagos_iddetall);
         $this->detallepagos_iddetall = str_replace('>', '&gt;', $this->detallepagos_iddetall);
         $this->Texto_tag .= "<td>" . $this->detallepagos_iddetall . "</td>\r\n";
   }
   //----- detallepagos_idfact
   function NM_export_detallepagos_idfact()
   {
             nmgp_Form_Num_Val($this->detallepagos_idfact, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detallepagos_idfact = NM_charset_to_utf8($this->detallepagos_idfact);
         $this->detallepagos_idfact = str_replace('<', '&lt;', $this->detallepagos_idfact);
         $this->detallepagos_idfact = str_replace('>', '&gt;', $this->detallepagos_idfact);
         $this->Texto_tag .= "<td>" . $this->detallepagos_idfact . "</td>\r\n";
   }
   //----- detallepagos_idfp
   function NM_export_detallepagos_idfp()
   {
         nmgp_Form_Num_Val($this->detallepagos_idfp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detallepagos_idfp = NM_charset_to_utf8($this->detallepagos_idfp);
         $this->detallepagos_idfp = str_replace('<', '&lt;', $this->detallepagos_idfp);
         $this->detallepagos_idfp = str_replace('>', '&gt;', $this->detallepagos_idfp);
         $this->Texto_tag .= "<td>" . $this->detallepagos_idfp . "</td>\r\n";
   }
   //----- detallepagos_idrc
   function NM_export_detallepagos_idrc()
   {
             nmgp_Form_Num_Val($this->detallepagos_idrc, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detallepagos_idrc = NM_charset_to_utf8($this->detallepagos_idrc);
         $this->detallepagos_idrc = str_replace('<', '&lt;', $this->detallepagos_idrc);
         $this->detallepagos_idrc = str_replace('>', '&gt;', $this->detallepagos_idrc);
         $this->Texto_tag .= "<td>" . $this->detallepagos_idrc . "</td>\r\n";
   }
   //----- detallepagos_monto
   function NM_export_detallepagos_monto()
   {
             nmgp_Form_Num_Val($this->detallepagos_monto, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->detallepagos_monto = NM_charset_to_utf8($this->detallepagos_monto);
         $this->detallepagos_monto = str_replace('<', '&lt;', $this->detallepagos_monto);
         $this->detallepagos_monto = str_replace('>', '&gt;', $this->detallepagos_monto);
         $this->Texto_tag .= "<td>" . $this->detallepagos_monto . "</td>\r\n";
   }
   //----- detallepagos_numcheque
   function NM_export_detallepagos_numcheque()
   {
         $this->detallepagos_numcheque = html_entity_decode($this->detallepagos_numcheque, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detallepagos_numcheque = strip_tags($this->detallepagos_numcheque);
         $this->detallepagos_numcheque = NM_charset_to_utf8($this->detallepagos_numcheque);
         $this->detallepagos_numcheque = str_replace('<', '&lt;', $this->detallepagos_numcheque);
         $this->detallepagos_numcheque = str_replace('>', '&gt;', $this->detallepagos_numcheque);
         $this->Texto_tag .= "<td>" . $this->detallepagos_numcheque . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - recibocaja :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_compregreso_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_compregreso"> 
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
function fFormapago()
{
$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
  
$cad=$formapago ; 
	$existe=strpos ($cad, 'MIXT');
	if($existe !== false)
		{
		$formapago ='FORMA DE PAGO MULTIPLE';
		}



$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off';
}
}

?>
