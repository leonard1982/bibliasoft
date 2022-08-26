<?php

class grid_inventariofisico_rtf
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
                   nm_limpa_str_grid_inventariofisico($cadapar[1]);
                   nm_protect_num_grid_inventariofisico($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_inventariofisico']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($par_idmov)) 
      {
          $_SESSION['par_idmov'] = $par_idmov;
          nm_limpa_str_grid_inventariofisico($_SESSION["par_idmov"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_inventariofisico_total.class.php"); 
      $this->Tot      = new grid_inventariofisico_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_inventariofisico']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_inventariofisico";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_inventariofisico.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idmov = $Busca_temp['idmov']; 
          $tmp_pos = strpos($this->idmov, "##@@");
          if ($tmp_pos !== false && !is_array($this->idmov))
          {
              $this->idmov = substr($this->idmov, 0, $tmp_pos);
          }
          $this->idmov_2 = $Busca_temp['idmov_input_2']; 
          $this->idtipotran = $Busca_temp['idtipotran']; 
          $tmp_pos = strpos($this->idtipotran, "##@@");
          if ($tmp_pos !== false && !is_array($this->idtipotran))
          {
              $this->idtipotran = substr($this->idtipotran, 0, $tmp_pos);
          }
          $this->idtipotran_2 = $Busca_temp['idtipotran_input_2']; 
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['titulo'])) ? $this->New_label['titulo'] : "titulo"; 
          if ($Cada_col == "titulo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Nota #:"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_nota'])) ? $this->New_label['fecha_nota'] : "fecha_nota"; 
          if ($Cada_col == "fecha_nota" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_conc'])) ? $this->New_label['t_conc'] : "t_conc"; 
          if ($Cada_col == "t_conc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['concepto'])) ? $this->New_label['concepto'] : "concepto"; 
          if ($Cada_col == "concepto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r1'])) ? $this->New_label['r1'] : "r1"; 
          if ($Cada_col == "r1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r2'])) ? $this->New_label['r2'] : "r2"; 
          if ($Cada_col == "r2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_obs'])) ? $this->New_label['t_obs'] : "t_obs"; 
          if ($Cada_col == "t_obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "obs"; 
          if ($Cada_col == "obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r3'])) ? $this->New_label['r3'] : "r3"; 
          if ($Cada_col == "r3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r4'])) ? $this->New_label['r4'] : "r4"; 
          if ($Cada_col == "r4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_ubi'])) ? $this->New_label['t_ubi'] : "t_ubi"; 
          if ($Cada_col == "t_ubi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "ubicacion"; 
          if ($Cada_col == "ubicacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r5'])) ? $this->New_label['r5'] : "r5"; 
          if ($Cada_col == "r5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['r6'])) ? $this->New_label['r6'] : "r6"; 
          if ($Cada_col == "r6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $this->Sub_Consultas[] = "detalle_nota";
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idtipotran, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idtipotran, fecha, idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idtipotran, convert(char(23),fecha,121), idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idtipotran, fecha, idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idtipotran, EXTEND(fecha, YEAR TO DAY), idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idtipotran, fecha, idboddes, observaciones, numeronota, prefijonota, idmov from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['order_grid'];
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
         $this->idtipotran = $rs->fields[0] ;  
         $this->idtipotran = (string)$this->idtipotran;
         $this->fecha = $rs->fields[1] ;  
         $this->idboddes = $rs->fields[2] ;  
         $this->idboddes = (string)$this->idboddes;
         $this->observaciones = $rs->fields[3] ;  
         $this->numeronota = $rs->fields[4] ;  
         $this->numeronota = (string)$this->numeronota;
         $this->prefijonota = $rs->fields[5] ;  
         $this->prefijonota = (string)$this->prefijonota;
         $this->idmov = $rs->fields[6] ;  
         $this->idmov = (string)$this->idmov;
         $this->Orig_idtipotran = $this->idtipotran;
         $this->Orig_fecha = $this->fecha;
         $this->Orig_idboddes = $this->idboddes;
         $this->Orig_observaciones = $this->observaciones;
         $this->Orig_numeronota = $this->numeronota;
         $this->Orig_prefijonota = $this->prefijonota;
         $this->Orig_idmov = $this->idmov;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_inventariofisico']['contr_erro'] = 'on';
  
      $nm_select = "SELECT prefijo FROM resdian WHERE Idres = '".$this->prefijonota  ."' ORDER BY prefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dp = array();
     if ($this->prefijonota !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dp = false;
          $this->dp_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->dp[0][0]))
	{
	$this->prefijo  = 'Número: '.$this->dp[0][0];
	}
else
	{
	$this->prefijo  = 'Número: ';
	}
$this->numero  = $this->numeronota ;
$this->titulo  = 'Nota de Inventario';
$this->fecha_nota  = 'Fecha: '.$this->fecha ;
 
      $nm_select = "SELECT nombre FROM tipotransfe WHERE idtipo = '".$this->idtipotran  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dc = array();
     if ($this->idtipotran !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dc = false;
          $this->dc_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->t_conc  = 'CONCEPTO: ';
$this->concepto  = $this->dc[0][0];
$this->t_obs  = 'OBSERVACION: ';
$this->obs  = $this->observaciones ;
 
      $nm_select = "SELECT bodega FROM bodegas WHERE idbodega = '".$this->idboddes  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsb = array();
     if ($this->idboddes !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dsb[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsb = false;
          $this->dsb_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->t_ubi  = 'UBICACIÓN: ';
$this->ubicacion  = $this->dsb[0][0];
$this->r1  = '';
$this->r2  = '';
$this->r3  = '';
$this->r4  = '';
$_SESSION['scriptcase']['grid_inventariofisico']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['field_order'] as $Cada_col)
         { 
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- titulo
   function NM_export_titulo()
   {
             if ($this->titulo !== "&nbsp;") 
             { 
                 $this->titulo = sc_strtoupper($this->titulo); 
             } 
         $this->titulo = html_entity_decode($this->titulo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->titulo = strip_tags($this->titulo);
         $this->titulo = NM_charset_to_utf8($this->titulo);
         $this->titulo = str_replace('<', '&lt;', $this->titulo);
         $this->titulo = str_replace('>', '&gt;', $this->titulo);
         $this->Texto_tag .= "<td>" . $this->titulo . "</td>\r\n";
   }
   //----- prefijo
   function NM_export_prefijo()
   {
         $this->prefijo = html_entity_decode($this->prefijo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo = strip_tags($this->prefijo);
         $this->prefijo = NM_charset_to_utf8($this->prefijo);
         $this->prefijo = str_replace('<', '&lt;', $this->prefijo);
         $this->prefijo = str_replace('>', '&gt;', $this->prefijo);
         $this->Texto_tag .= "<td>" . $this->prefijo . "</td>\r\n";
   }
   //----- numero
   function NM_export_numero()
   {
             nmgp_Form_Num_Val($this->numero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numero = NM_charset_to_utf8($this->numero);
         $this->numero = str_replace('<', '&lt;', $this->numero);
         $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->Texto_tag .= "<td>" . $this->numero . "</td>\r\n";
   }
   //----- fecha_nota
   function NM_export_fecha_nota()
   {
             $conteudo_x =  $this->fecha_nota;
             nm_conv_limpa_dado($conteudo_x, "YYYYMMDD");
             if (is_numeric($conteudo_x) && $conteudo_x > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_nota, "YYYYMMDD");
                 $this->fecha_nota = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_nota = NM_charset_to_utf8($this->fecha_nota);
         $this->fecha_nota = str_replace('<', '&lt;', $this->fecha_nota);
         $this->fecha_nota = str_replace('>', '&gt;', $this->fecha_nota);
         $this->Texto_tag .= "<td>" . $this->fecha_nota . "</td>\r\n";
   }
   //----- t_conc
   function NM_export_t_conc()
   {
         $this->t_conc = html_entity_decode($this->t_conc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->t_conc = strip_tags($this->t_conc);
         $this->t_conc = NM_charset_to_utf8($this->t_conc);
         $this->t_conc = str_replace('<', '&lt;', $this->t_conc);
         $this->t_conc = str_replace('>', '&gt;', $this->t_conc);
         $this->Texto_tag .= "<td>" . $this->t_conc . "</td>\r\n";
   }
   //----- concepto
   function NM_export_concepto()
   {
         $this->concepto = html_entity_decode($this->concepto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->concepto = strip_tags($this->concepto);
         $this->concepto = NM_charset_to_utf8($this->concepto);
         $this->concepto = str_replace('<', '&lt;', $this->concepto);
         $this->concepto = str_replace('>', '&gt;', $this->concepto);
         $this->Texto_tag .= "<td>" . $this->concepto . "</td>\r\n";
   }
   //----- r1
   function NM_export_r1()
   {
         $this->r1 = html_entity_decode($this->r1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r1 = strip_tags($this->r1);
         $this->r1 = NM_charset_to_utf8($this->r1);
         $this->r1 = str_replace('<', '&lt;', $this->r1);
         $this->r1 = str_replace('>', '&gt;', $this->r1);
         $this->Texto_tag .= "<td>" . $this->r1 . "</td>\r\n";
   }
   //----- r2
   function NM_export_r2()
   {
         $this->r2 = html_entity_decode($this->r2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r2 = strip_tags($this->r2);
         $this->r2 = NM_charset_to_utf8($this->r2);
         $this->r2 = str_replace('<', '&lt;', $this->r2);
         $this->r2 = str_replace('>', '&gt;', $this->r2);
         $this->Texto_tag .= "<td>" . $this->r2 . "</td>\r\n";
   }
   //----- t_obs
   function NM_export_t_obs()
   {
         $this->t_obs = html_entity_decode($this->t_obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->t_obs = strip_tags($this->t_obs);
         $this->t_obs = NM_charset_to_utf8($this->t_obs);
         $this->t_obs = str_replace('<', '&lt;', $this->t_obs);
         $this->t_obs = str_replace('>', '&gt;', $this->t_obs);
         $this->Texto_tag .= "<td>" . $this->t_obs . "</td>\r\n";
   }
   //----- obs
   function NM_export_obs()
   {
             if ($this->obs !== "&nbsp;") 
             { 
                 $this->obs = sc_strtoupper($this->obs); 
             } 
         $this->obs = html_entity_decode($this->obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs = strip_tags($this->obs);
         $this->obs = NM_charset_to_utf8($this->obs);
         $this->obs = str_replace('<', '&lt;', $this->obs);
         $this->obs = str_replace('>', '&gt;', $this->obs);
         $this->Texto_tag .= "<td>" . $this->obs . "</td>\r\n";
   }
   //----- r3
   function NM_export_r3()
   {
         $this->r3 = html_entity_decode($this->r3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r3 = strip_tags($this->r3);
         $this->r3 = NM_charset_to_utf8($this->r3);
         $this->r3 = str_replace('<', '&lt;', $this->r3);
         $this->r3 = str_replace('>', '&gt;', $this->r3);
         $this->Texto_tag .= "<td>" . $this->r3 . "</td>\r\n";
   }
   //----- r4
   function NM_export_r4()
   {
         $this->r4 = html_entity_decode($this->r4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r4 = strip_tags($this->r4);
         $this->r4 = NM_charset_to_utf8($this->r4);
         $this->r4 = str_replace('<', '&lt;', $this->r4);
         $this->r4 = str_replace('>', '&gt;', $this->r4);
         $this->Texto_tag .= "<td>" . $this->r4 . "</td>\r\n";
   }
   //----- t_ubi
   function NM_export_t_ubi()
   {
         $this->t_ubi = html_entity_decode($this->t_ubi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->t_ubi = strip_tags($this->t_ubi);
         $this->t_ubi = NM_charset_to_utf8($this->t_ubi);
         $this->t_ubi = str_replace('<', '&lt;', $this->t_ubi);
         $this->t_ubi = str_replace('>', '&gt;', $this->t_ubi);
         $this->Texto_tag .= "<td>" . $this->t_ubi . "</td>\r\n";
   }
   //----- ubicacion
   function NM_export_ubicacion()
   {
         $this->ubicacion = html_entity_decode($this->ubicacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ubicacion = strip_tags($this->ubicacion);
         $this->ubicacion = NM_charset_to_utf8($this->ubicacion);
         $this->ubicacion = str_replace('<', '&lt;', $this->ubicacion);
         $this->ubicacion = str_replace('>', '&gt;', $this->ubicacion);
         $this->Texto_tag .= "<td>" . $this->ubicacion . "</td>\r\n";
   }
   //----- r5
   function NM_export_r5()
   {
         $this->r5 = html_entity_decode($this->r5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r5 = strip_tags($this->r5);
         $this->r5 = NM_charset_to_utf8($this->r5);
         $this->r5 = str_replace('<', '&lt;', $this->r5);
         $this->r5 = str_replace('>', '&gt;', $this->r5);
         $this->Texto_tag .= "<td>" . $this->r5 . "</td>\r\n";
   }
   //----- r6
   function NM_export_r6()
   {
         $this->r6 = html_entity_decode($this->r6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->r6 = strip_tags($this->r6);
         $this->r6 = NM_charset_to_utf8($this->r6);
         $this->r6 = str_replace('<', '&lt;', $this->r6);
         $this->r6 = str_replace('>', '&gt;', $this->r6);
         $this->Texto_tag .= "<td>" . $this->r6 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventariofisico'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Nota de Inventario :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_inventariofisico_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_inventariofisico"> 
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
