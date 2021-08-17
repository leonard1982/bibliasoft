<?php

class pdfreport_facturaven_anterior_rtf
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
                   nm_limpa_str_pdfreport_facturaven_anterior($cadapar[1]);
                   nm_protect_num_pdfreport_facturaven_anterior($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_facturaven_anterior']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $par_numfacventa;
          nm_limpa_str_pdfreport_facturaven_anterior($_SESSION["par_numfacventa"]);
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_pdfreport_facturaven_anterior($_SESSION["empresa"]);
      }
      if (isset($nit)) 
      {
          $_SESSION['nit'] = $nit;
          nm_limpa_str_pdfreport_facturaven_anterior($_SESSION["nit"]);
      }
      if (isset($direccion)) 
      {
          $_SESSION['direccion'] = $direccion;
          nm_limpa_str_pdfreport_facturaven_anterior($_SESSION["direccion"]);
      }
      if (isset($tele)) 
      {
          $_SESSION['tele'] = $tele;
          nm_limpa_str_pdfreport_facturaven_anterior($_SESSION["tele"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "pdfreport_facturaven_anterior_total.class.php"); 
      $this->Tot      = new pdfreport_facturaven_anterior_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_facturaven_anterior']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_facturaven_anterior";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_facturaven_anterior.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->adicional3 = $Busca_temp['adicional3']; 
          $tmp_pos = strpos($this->adicional3, "##@@");
          if ($tmp_pos !== false && !is_array($this->adicional3))
          {
              $this->adicional3 = substr($this->adicional3, 0, $tmp_pos);
          }
          $this->adicional3_2 = $Busca_temp['adicional3_input_2']; 
          $this->idfacven = $Busca_temp['idfacven']; 
          $tmp_pos = strpos($this->idfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->idfacven))
          {
              $this->idfacven = substr($this->idfacven, 0, $tmp_pos);
          }
          $this->idfacven_2 = $Busca_temp['idfacven_input_2']; 
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->numfacven_2 = $Busca_temp['numfacven_input_2']; 
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
          $this->credito_2 = $Busca_temp['credito_input_2']; 
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $_SESSION['pdfreport_facturaven_anterior']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_facturaven_anterior']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_facturaven_anterior']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_facturaven_anterior']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asentada from facturaven where idfacven=$this->sc_temp_par_numfacventa"; 
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
	echo 'FACTURA NO ESTÁ ASENTADA, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
          if ($Cada_col == "idfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Numfacven"; 
          if ($Cada_col == "numfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fechaven"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Fechavenc"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Idcli"; 
          if ($Cada_col == "idcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
          if ($Cada_col == "pagada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
          if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
          if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
          if ($Cada_col == "adicional2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
          if ($Cada_col == "adicional3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "Resolucion"; 
          if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dircliente'])) ? $this->New_label['dircliente'] : "Dircliente"; 
          if ($Cada_col == "dircliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa'])) ? $this->New_label['detalleventa'] : "detalleventa"; 
          if ($Cada_col == "detalleventa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_cantidad'])) ? $this->New_label['detalleventa_cantidad'] : "Cantidad"; 
          if ($Cada_col == "detalleventa_cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_idpro'])) ? $this->New_label['detalleventa_idpro'] : "Idpro"; 
          if ($Cada_col == "detalleventa_idpro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_parcial'])) ? $this->New_label['detalleventa_parcial'] : "Parcial"; 
          if ($Cada_col == "detalleventa_parcial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_unidad'])) ? $this->New_label['detalleventa_unidad'] : "Unidad"; 
          if ($Cada_col == "detalleventa_unidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_valorunita'])) ? $this->New_label['detalleventa_valorunita'] : "Valorunita"; 
          if ($Cada_col == "detalleventa_valorunita" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empresa'])) ? $this->New_label['empresa'] : "empresa"; 
          if ($Cada_col == "empresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etiqueta'])) ? $this->New_label['etiqueta'] : "etiqueta"; 
          if ($Cada_col == "etiqueta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechares'])) ? $this->New_label['fechares'] : "fechares"; 
          if ($Cada_col == "fechares" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ladireccion'])) ? $this->New_label['ladireccion'] : "ladireccion"; 
          if ($Cada_col == "ladireccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['municipio'])) ? $this->New_label['municipio'] : "municipio"; 
          if ($Cada_col == "municipio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numnit'])) ? $this->New_label['numnit'] : "numnit"; 
          if ($Cada_col == "numnit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numtele'])) ? $this->New_label['numtele'] : "numtele"; 
          if ($Cada_col == "numtele" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prefijo'])) ? $this->New_label['prefijo'] : "prefijo"; 
          if ($Cada_col == "prefijo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rangofac'])) ? $this->New_label['rangofac'] : "rangofac"; 
          if ($Cada_col == "rangofac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "telefono"; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['colores'])) ? $this->New_label['colores'] : "colores"; 
          if ($Cada_col == "colores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['colores_cantidad_color'])) ? $this->New_label['colores_cantidad_color'] : "Cantidad Color"; 
          if ($Cada_col == "colores_cantidad_color" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_p_codigobar'])) ? $this->New_label['detalleventa_p_codigobar'] : "Codigobar"; 
          if ($Cada_col == "detalleventa_p_codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_p_nompro'])) ? $this->New_label['detalleventa_p_nompro'] : "Nompro"; 
          if ($Cada_col == "detalleventa_p_nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_fl_unidadmayor'])) ? $this->New_label['detalleventa_fl_unidadmayor'] : "Unidadmayor"; 
          if ($Cada_col == "detalleventa_fl_unidadmayor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_fl_factor'])) ? $this->New_label['detalleventa_fl_factor'] : "Factor"; 
          if ($Cada_col == "detalleventa_fl_factor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_fl_iva'])) ? $this->New_label['detalleventa_fl_iva'] : "Iva"; 
          if ($Cada_col == "detalleventa_fl_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_fl_adicional'])) ? $this->New_label['detalleventa_fl_adicional'] : "Adicional"; 
          if ($Cada_col == "detalleventa_fl_adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalleventa_fl_iddet'])) ? $this->New_label['detalleventa_fl_iddet'] : "Iddet"; 
          if ($Cada_col == "detalleventa_fl_iddet" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['colores4'])) ? $this->New_label['colores4'] : "colores4"; 
          if ($Cada_col == "colores4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['colores4_iddet'])) ? $this->New_label['colores4_iddet'] : "Iddet"; 
          if ($Cada_col == "colores4_iddet" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT idfacven, numfacven, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idfacven, numfacven, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['order_grid'];
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
         $this->idfacven = $rs->fields[0] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->numfacven = $rs->fields[1] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->credito = $rs->fields[2] ;  
         $this->credito = (string)$this->credito;
         $this->fechaven = $rs->fields[3] ;  
         $this->fechavenc = $rs->fields[4] ;  
         $this->idcli = $rs->fields[5] ;  
         $this->idcli = (string)$this->idcli;
         $this->subtotal = $rs->fields[6] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[7] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;
         $this->total = $rs->fields[8] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->pagada = $rs->fields[9] ;  
         $this->asentada = $rs->fields[10] ;  
         $this->asentada = (string)$this->asentada;
         $this->observaciones = $rs->fields[11] ;  
         $this->saldo = $rs->fields[12] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[13] ;  
         $this->adicional =  str_replace(",", ".", $this->adicional);
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[14] ;  
         $this->adicional2 =  str_replace(",", ".", $this->adicional2);
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[15] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->resolucion = $rs->fields[16] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->dircliente = $rs->fields[17] ;  
         $this->dircliente = (string)$this->dircliente;
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         $this->sc_proc_grid = true; 
         //----- lookup - municipio
         $this->Lookup->lookup_municipio($this->municipio, $this->municipio, $this->array_municipio); 
         $this->municipio = str_replace("<br>", " ", $this->municipio); 
         $this->municipio = ($this->municipio == "&nbsp;") ? "" : $this->municipio; 
         //----- lookup - colores4_iddet
         $this->Lookup->lookup_colores4_iddet($this->colores4_iddet, $this->idfacven, $this->array_colores4_iddet); 
         $this->colores4_iddet = str_replace("<br>", " ", $this->colores4_iddet); 
         $this->colores4_iddet = ($this->colores4_iddet == "&nbsp;") ? "" : $this->colores4_iddet; 
         $_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'on';
   
      $nm_select = "select documento from terceros where idtercero=$this->idcli  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->des = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
$this->documento =substr($this->des , 9);
 
      $nm_select = "select idmuni, direc, telefono  from direccion where iddireccion=$this->dircliente  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->dircliente !== "")
     { 
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
	$this->direccion =$this->ds[0][1];
	$this->telefono =$this->ds[0][2];
	$this->municipio =$this->ds[0][0];
	}
$this->trae_resolucion();
$_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idfacven
   function NM_export_idfacven()
   {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idfacven = NM_charset_to_utf8($this->idfacven);
         $this->idfacven = str_replace('<', '&lt;', $this->idfacven);
         $this->idfacven = str_replace('>', '&gt;', $this->idfacven);
         $this->Texto_tag .= "<td>" . $this->idfacven . "</td>\r\n";
   }
   //----- numfacven
   function NM_export_numfacven()
   {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numfacven = NM_charset_to_utf8($this->numfacven);
         $this->numfacven = str_replace('<', '&lt;', $this->numfacven);
         $this->numfacven = str_replace('>', '&gt;', $this->numfacven);
         $this->Texto_tag .= "<td>" . $this->numfacven . "</td>\r\n";
   }
   //----- credito
   function NM_export_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         $this->look_credito = str_replace('<', '&lt;', $this->look_credito);
         $this->look_credito = str_replace('>', '&gt;', $this->look_credito);
         $this->Texto_tag .= "<td>" . $this->look_credito . "</td>\r\n";
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
   //----- fechavenc
   function NM_export_fechavenc()
   {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechavenc = NM_charset_to_utf8($this->fechavenc);
         $this->fechavenc = str_replace('<', '&lt;', $this->fechavenc);
         $this->fechavenc = str_replace('>', '&gt;', $this->fechavenc);
         $this->Texto_tag .= "<td>" . $this->fechavenc . "</td>\r\n";
   }
   //----- idcli
   function NM_export_idcli()
   {
         nmgp_Form_Num_Val($this->look_idcli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         $this->look_idcli = str_replace('<', '&lt;', $this->look_idcli);
         $this->look_idcli = str_replace('>', '&gt;', $this->look_idcli);
         $this->Texto_tag .= "<td>" . $this->look_idcli . "</td>\r\n";
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->subtotal = str_replace('<', '&lt;', $this->subtotal);
         $this->subtotal = str_replace('>', '&gt;', $this->subtotal);
         $this->Texto_tag .= "<td>" . $this->subtotal . "</td>\r\n";
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->valoriva = str_replace('<', '&lt;', $this->valoriva);
         $this->valoriva = str_replace('>', '&gt;', $this->valoriva);
         $this->Texto_tag .= "<td>" . $this->valoriva . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- pagada
   function NM_export_pagada()
   {
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         $this->pagada = str_replace('<', '&lt;', $this->pagada);
         $this->pagada = str_replace('>', '&gt;', $this->pagada);
         $this->Texto_tag .= "<td>" . $this->pagada . "</td>\r\n";
   }
   //----- asentada
   function NM_export_asentada()
   {
             nmgp_Form_Num_Val($this->asentada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->asentada = NM_charset_to_utf8($this->asentada);
         $this->asentada = str_replace('<', '&lt;', $this->asentada);
         $this->asentada = str_replace('>', '&gt;', $this->asentada);
         $this->Texto_tag .= "<td>" . $this->asentada . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones =  sc_strtolower($this->observaciones); 
                 $this->observaciones = ucwords($this->observaciones); 
             } 
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->adicional = NM_charset_to_utf8($this->adicional);
         $this->adicional = str_replace('<', '&lt;', $this->adicional);
         $this->adicional = str_replace('>', '&gt;', $this->adicional);
         $this->Texto_tag .= "<td>" . $this->adicional . "</td>\r\n";
   }
   //----- adicional2
   function NM_export_adicional2()
   {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->adicional2 = NM_charset_to_utf8($this->adicional2);
         $this->adicional2 = str_replace('<', '&lt;', $this->adicional2);
         $this->adicional2 = str_replace('>', '&gt;', $this->adicional2);
         $this->Texto_tag .= "<td>" . $this->adicional2 . "</td>\r\n";
   }
   //----- adicional3
   function NM_export_adicional3()
   {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional3 = NM_charset_to_utf8($this->adicional3);
         $this->adicional3 = str_replace('<', '&lt;', $this->adicional3);
         $this->adicional3 = str_replace('>', '&gt;', $this->adicional3);
         $this->Texto_tag .= "<td>" . $this->adicional3 . "</td>\r\n";
   }
   //----- resolucion
   function NM_export_resolucion()
   {
             nmgp_Form_Num_Val($this->resolucion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->resolucion = NM_charset_to_utf8($this->resolucion);
         $this->resolucion = str_replace('<', '&lt;', $this->resolucion);
         $this->resolucion = str_replace('>', '&gt;', $this->resolucion);
         $this->Texto_tag .= "<td>" . $this->resolucion . "</td>\r\n";
   }
   //----- dircliente
   function NM_export_dircliente()
   {
             nmgp_Form_Num_Val($this->dircliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->dircliente = NM_charset_to_utf8($this->dircliente);
         $this->dircliente = str_replace('<', '&lt;', $this->dircliente);
         $this->dircliente = str_replace('>', '&gt;', $this->dircliente);
         $this->Texto_tag .= "<td>" . $this->dircliente . "</td>\r\n";
   }
   //----- detalleventa
   function NM_export_detalleventa()
   {
         $this->detalleventa = NM_charset_to_utf8($this->detalleventa);
         $this->detalleventa = str_replace('<', '&lt;', $this->detalleventa);
         $this->detalleventa = str_replace('>', '&gt;', $this->detalleventa);
         $this->Texto_tag .= "<td>" . $this->detalleventa . "</td>\r\n";
   }
   //----- detalleventa_cantidad
   function NM_export_detalleventa_cantidad()
   {
             nmgp_Form_Num_Val($this->detalleventa_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->detalleventa_cantidad = NM_charset_to_utf8($this->detalleventa_cantidad);
         $this->detalleventa_cantidad = str_replace('<', '&lt;', $this->detalleventa_cantidad);
         $this->detalleventa_cantidad = str_replace('>', '&gt;', $this->detalleventa_cantidad);
         $this->Texto_tag .= "<td>" . $this->detalleventa_cantidad . "</td>\r\n";
   }
   //----- detalleventa_idpro
   function NM_export_detalleventa_idpro()
   {
             nmgp_Form_Num_Val($this->detalleventa_idpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_idpro = NM_charset_to_utf8($this->detalleventa_idpro);
         $this->detalleventa_idpro = str_replace('<', '&lt;', $this->detalleventa_idpro);
         $this->detalleventa_idpro = str_replace('>', '&gt;', $this->detalleventa_idpro);
         $this->Texto_tag .= "<td>" . $this->detalleventa_idpro . "</td>\r\n";
   }
   //----- detalleventa_parcial
   function NM_export_detalleventa_parcial()
   {
             nmgp_Form_Num_Val($this->detalleventa_parcial, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_parcial = NM_charset_to_utf8($this->detalleventa_parcial);
         $this->detalleventa_parcial = str_replace('<', '&lt;', $this->detalleventa_parcial);
         $this->detalleventa_parcial = str_replace('>', '&gt;', $this->detalleventa_parcial);
         $this->Texto_tag .= "<td>" . $this->detalleventa_parcial . "</td>\r\n";
   }
   //----- detalleventa_unidad
   function NM_export_detalleventa_unidad()
   {
         $this->detalleventa_unidad = html_entity_decode($this->detalleventa_unidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalleventa_unidad = strip_tags($this->detalleventa_unidad);
         $this->detalleventa_unidad = NM_charset_to_utf8($this->detalleventa_unidad);
         $this->detalleventa_unidad = str_replace('<', '&lt;', $this->detalleventa_unidad);
         $this->detalleventa_unidad = str_replace('>', '&gt;', $this->detalleventa_unidad);
         $this->Texto_tag .= "<td>" . $this->detalleventa_unidad . "</td>\r\n";
   }
   //----- detalleventa_valorunita
   function NM_export_detalleventa_valorunita()
   {
             nmgp_Form_Num_Val($this->detalleventa_valorunita, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_valorunita = NM_charset_to_utf8($this->detalleventa_valorunita);
         $this->detalleventa_valorunita = str_replace('<', '&lt;', $this->detalleventa_valorunita);
         $this->detalleventa_valorunita = str_replace('>', '&gt;', $this->detalleventa_valorunita);
         $this->Texto_tag .= "<td>" . $this->detalleventa_valorunita . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = html_entity_decode($this->direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion = strip_tags($this->direccion);
         $this->direccion = NM_charset_to_utf8($this->direccion);
         $this->direccion = str_replace('<', '&lt;', $this->direccion);
         $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->Texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
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
   //----- empresa
   function NM_export_empresa()
   {
         $this->empresa = html_entity_decode($this->empresa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->empresa = strip_tags($this->empresa);
         $this->empresa = NM_charset_to_utf8($this->empresa);
         $this->empresa = str_replace('<', '&lt;', $this->empresa);
         $this->empresa = str_replace('>', '&gt;', $this->empresa);
         $this->Texto_tag .= "<td>" . $this->empresa . "</td>\r\n";
   }
   //----- etiqueta
   function NM_export_etiqueta()
   {
         $this->etiqueta = html_entity_decode($this->etiqueta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etiqueta = strip_tags($this->etiqueta);
         $this->etiqueta = NM_charset_to_utf8($this->etiqueta);
         $this->etiqueta = str_replace('<', '&lt;', $this->etiqueta);
         $this->etiqueta = str_replace('>', '&gt;', $this->etiqueta);
         $this->Texto_tag .= "<td>" . $this->etiqueta . "</td>\r\n";
   }
   //----- fechares
   function NM_export_fechares()
   {
         $this->fechares = html_entity_decode($this->fechares, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fechares = strip_tags($this->fechares);
         $this->fechares = NM_charset_to_utf8($this->fechares);
         $this->fechares = str_replace('<', '&lt;', $this->fechares);
         $this->fechares = str_replace('>', '&gt;', $this->fechares);
         $this->Texto_tag .= "<td>" . $this->fechares . "</td>\r\n";
   }
   //----- ladireccion
   function NM_export_ladireccion()
   {
         $this->ladireccion = html_entity_decode($this->ladireccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ladireccion = strip_tags($this->ladireccion);
         $this->ladireccion = NM_charset_to_utf8($this->ladireccion);
         $this->ladireccion = str_replace('<', '&lt;', $this->ladireccion);
         $this->ladireccion = str_replace('>', '&gt;', $this->ladireccion);
         $this->Texto_tag .= "<td>" . $this->ladireccion . "</td>\r\n";
   }
   //----- municipio
   function NM_export_municipio()
   {
         $this->municipio = NM_charset_to_utf8($this->municipio);
         $this->municipio = str_replace('<', '&lt;', $this->municipio);
         $this->municipio = str_replace('>', '&gt;', $this->municipio);
         $this->Texto_tag .= "<td>" . $this->municipio . "</td>\r\n";
   }
   //----- numnit
   function NM_export_numnit()
   {
         $this->numnit = html_entity_decode($this->numnit, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numnit = strip_tags($this->numnit);
         $this->numnit = NM_charset_to_utf8($this->numnit);
         $this->numnit = str_replace('<', '&lt;', $this->numnit);
         $this->numnit = str_replace('>', '&gt;', $this->numnit);
         $this->Texto_tag .= "<td>" . $this->numnit . "</td>\r\n";
   }
   //----- numtele
   function NM_export_numtele()
   {
         $this->numtele = html_entity_decode($this->numtele, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numtele = strip_tags($this->numtele);
         $this->numtele = NM_charset_to_utf8($this->numtele);
         $this->numtele = str_replace('<', '&lt;', $this->numtele);
         $this->numtele = str_replace('>', '&gt;', $this->numtele);
         $this->Texto_tag .= "<td>" . $this->numtele . "</td>\r\n";
   }
   //----- prefijo
   function NM_export_prefijo()
   {
             if ($this->prefijo !== "&nbsp;") 
             { 
                 $this->prefijo = sc_strtoupper($this->prefijo); 
             } 
         $this->prefijo = html_entity_decode($this->prefijo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo = NM_charset_to_utf8($this->prefijo);
         $this->prefijo = str_replace('<', '&lt;', $this->prefijo);
         $this->prefijo = str_replace('>', '&gt;', $this->prefijo);
         $this->Texto_tag .= "<td>" . $this->prefijo . "</td>\r\n";
   }
   //----- rangofac
   function NM_export_rangofac()
   {
         $this->rangofac = html_entity_decode($this->rangofac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rangofac = strip_tags($this->rangofac);
         $this->rangofac = NM_charset_to_utf8($this->rangofac);
         $this->rangofac = str_replace('<', '&lt;', $this->rangofac);
         $this->rangofac = str_replace('>', '&gt;', $this->rangofac);
         $this->Texto_tag .= "<td>" . $this->rangofac . "</td>\r\n";
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = html_entity_decode($this->telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefono = strip_tags($this->telefono);
         $this->telefono = NM_charset_to_utf8($this->telefono);
         $this->telefono = str_replace('<', '&lt;', $this->telefono);
         $this->telefono = str_replace('>', '&gt;', $this->telefono);
         $this->Texto_tag .= "<td>" . $this->telefono . "</td>\r\n";
   }
   //----- colores
   function NM_export_colores()
   {
         $this->colores = NM_charset_to_utf8($this->colores);
         $this->colores = str_replace('<', '&lt;', $this->colores);
         $this->colores = str_replace('>', '&gt;', $this->colores);
         $this->Texto_tag .= "<td>" . $this->colores . "</td>\r\n";
   }
   //----- colores_cantidad_color
   function NM_export_colores_cantidad_color()
   {
         $this->colores_cantidad_color = html_entity_decode($this->colores_cantidad_color, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->colores_cantidad_color = NM_charset_to_utf8($this->colores_cantidad_color);
         $this->colores_cantidad_color = str_replace('<', '&lt;', $this->colores_cantidad_color);
         $this->colores_cantidad_color = str_replace('>', '&gt;', $this->colores_cantidad_color);
         $this->Texto_tag .= "<td>" . $this->colores_cantidad_color . "</td>\r\n";
   }
   //----- detalleventa_p_codigobar
   function NM_export_detalleventa_p_codigobar()
   {
         $this->detalleventa_p_codigobar = html_entity_decode($this->detalleventa_p_codigobar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalleventa_p_codigobar = strip_tags($this->detalleventa_p_codigobar);
         $this->detalleventa_p_codigobar = NM_charset_to_utf8($this->detalleventa_p_codigobar);
         $this->detalleventa_p_codigobar = str_replace('<', '&lt;', $this->detalleventa_p_codigobar);
         $this->detalleventa_p_codigobar = str_replace('>', '&gt;', $this->detalleventa_p_codigobar);
         $this->Texto_tag .= "<td>" . $this->detalleventa_p_codigobar . "</td>\r\n";
   }
   //----- detalleventa_p_nompro
   function NM_export_detalleventa_p_nompro()
   {
         $this->detalleventa_p_nompro = html_entity_decode($this->detalleventa_p_nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalleventa_p_nompro = strip_tags($this->detalleventa_p_nompro);
         $this->detalleventa_p_nompro = NM_charset_to_utf8($this->detalleventa_p_nompro);
         $this->detalleventa_p_nompro = str_replace('<', '&lt;', $this->detalleventa_p_nompro);
         $this->detalleventa_p_nompro = str_replace('>', '&gt;', $this->detalleventa_p_nompro);
         $this->Texto_tag .= "<td>" . $this->detalleventa_p_nompro . "</td>\r\n";
   }
   //----- detalleventa_fl_unidadmayor
   function NM_export_detalleventa_fl_unidadmayor()
   {
         $this->detalleventa_fl_unidadmayor = html_entity_decode($this->detalleventa_fl_unidadmayor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalleventa_fl_unidadmayor = strip_tags($this->detalleventa_fl_unidadmayor);
         $this->detalleventa_fl_unidadmayor = NM_charset_to_utf8($this->detalleventa_fl_unidadmayor);
         $this->detalleventa_fl_unidadmayor = str_replace('<', '&lt;', $this->detalleventa_fl_unidadmayor);
         $this->detalleventa_fl_unidadmayor = str_replace('>', '&gt;', $this->detalleventa_fl_unidadmayor);
         $this->Texto_tag .= "<td>" . $this->detalleventa_fl_unidadmayor . "</td>\r\n";
   }
   //----- detalleventa_fl_factor
   function NM_export_detalleventa_fl_factor()
   {
             nmgp_Form_Num_Val($this->detalleventa_fl_factor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_fl_factor = NM_charset_to_utf8($this->detalleventa_fl_factor);
         $this->detalleventa_fl_factor = str_replace('<', '&lt;', $this->detalleventa_fl_factor);
         $this->detalleventa_fl_factor = str_replace('>', '&gt;', $this->detalleventa_fl_factor);
         $this->Texto_tag .= "<td>" . $this->detalleventa_fl_factor . "</td>\r\n";
   }
   //----- detalleventa_fl_iva
   function NM_export_detalleventa_fl_iva()
   {
             nmgp_Form_Num_Val($this->detalleventa_fl_iva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_fl_iva = NM_charset_to_utf8($this->detalleventa_fl_iva);
         $this->detalleventa_fl_iva = str_replace('<', '&lt;', $this->detalleventa_fl_iva);
         $this->detalleventa_fl_iva = str_replace('>', '&gt;', $this->detalleventa_fl_iva);
         $this->Texto_tag .= "<td>" . $this->detalleventa_fl_iva . "</td>\r\n";
   }
   //----- detalleventa_fl_adicional
   function NM_export_detalleventa_fl_adicional()
   {
             nmgp_Form_Num_Val($this->detalleventa_fl_adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_fl_adicional = NM_charset_to_utf8($this->detalleventa_fl_adicional);
         $this->detalleventa_fl_adicional = str_replace('<', '&lt;', $this->detalleventa_fl_adicional);
         $this->detalleventa_fl_adicional = str_replace('>', '&gt;', $this->detalleventa_fl_adicional);
         $this->Texto_tag .= "<td>" . $this->detalleventa_fl_adicional . "</td>\r\n";
   }
   //----- detalleventa_fl_iddet
   function NM_export_detalleventa_fl_iddet()
   {
             nmgp_Form_Num_Val($this->detalleventa_fl_iddet, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->detalleventa_fl_iddet = NM_charset_to_utf8($this->detalleventa_fl_iddet);
         $this->detalleventa_fl_iddet = str_replace('<', '&lt;', $this->detalleventa_fl_iddet);
         $this->detalleventa_fl_iddet = str_replace('>', '&gt;', $this->detalleventa_fl_iddet);
         $this->Texto_tag .= "<td>" . $this->detalleventa_fl_iddet . "</td>\r\n";
   }
   //----- colores4
   function NM_export_colores4()
   {
         $this->colores4 = NM_charset_to_utf8($this->colores4);
         $this->colores4 = str_replace('<', '&lt;', $this->colores4);
         $this->colores4 = str_replace('>', '&gt;', $this->colores4);
         $this->Texto_tag .= "<td>" . $this->colores4 . "</td>\r\n";
   }
   //----- colores4_iddet
   function NM_export_colores4_iddet()
   {
         $this->colores4_iddet = NM_charset_to_utf8($this->colores4_iddet);
         $this->colores4_iddet = str_replace('<', '&lt;', $this->colores4_iddet);
         $this->colores4_iddet = str_replace('>', '&gt;', $this->colores4_iddet);
         $this->Texto_tag .= "<td>" . $this->colores4_iddet . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_anterior'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - facturaven :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_facturaven_anterior_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_facturaven_anterior"> 
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
function trae_resolucion()
{
$_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'on';
  
$this->etiqueta ="Descuento aplicado"; 
 
      $nm_select = "select resolucion, rangofac, fecha, prefijo from resdian where Idres=$this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
     if ($this->resolucion !== "")
     { 
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
     } 
;
$this->resolucion =" Res.DIAN ".$this->des[0][0];
$this->rangofac ="Rango Autorizado: ".$this->des[0][1];
$this->fechares ="Vigencia ".$this->des[0][2];
$this->prefijo =$this->des[0][3];
$_SESSION['scriptcase']['pdfreport_facturaven_anterior']['contr_erro'] = 'off';
}
}

?>
