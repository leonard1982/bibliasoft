<?php

class grid_empresas_rtf
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
                   nm_limpa_str_grid_empresas($cadapar[1]);
                   nm_protect_num_grid_empresas($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_empresas']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_empresas_total.class.php"); 
      $this->Tot      = new grid_empresas_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_empresas']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_empresas";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_empresas.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_empresas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_empresas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_empresas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idempresa = $Busca_temp['idempresa']; 
          $tmp_pos = strpos($this->idempresa, "##@@");
          if ($tmp_pos !== false && !is_array($this->idempresa))
          {
              $this->idempresa = substr($this->idempresa, 0, $tmp_pos);
          }
          $this->idempresa_2 = $Busca_temp['idempresa_input_2']; 
          $this->nombre = $Busca_temp['nombre']; 
          $tmp_pos = strpos($this->nombre, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombre))
          {
              $this->nombre = substr($this->nombre, 0, $tmp_pos);
          }
          $this->nombre_empresa = $Busca_temp['nombre_empresa']; 
          $tmp_pos = strpos($this->nombre_empresa, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombre_empresa))
          {
              $this->nombre_empresa = substr($this->nombre_empresa, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nombre_empresa'])) ? $this->New_label['nombre_empresa'] : "Empresa"; 
          if ($Cada_col == "nombre_empresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creada'])) ? $this->New_label['creada'] : "Creada"; 
          if ($Cada_col == "creada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['copiada_como'])) ? $this->New_label['copiada_como'] : "Copiada Como"; 
          if ($Cada_col == "copiada_como" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sinmovimiento'])) ? $this->New_label['sinmovimiento'] : "Sin Movimiento"; 
          if ($Cada_col == "sinmovimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_negocio'])) ? $this->New_label['tipo_negocio'] : "Tipo Negocio"; 
          if ($Cada_col == "tipo_negocio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['predeterminada'])) ? $this->New_label['predeterminada'] : "Predeterminada"; 
          if ($Cada_col == "predeterminada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nomina'])) ? $this->New_label['nomina'] : "Nómina"; 
          if ($Cada_col == "nomina" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codempresa'])) ? $this->New_label['codempresa'] : "Cod Nómina"; 
          if ($Cada_col == "codempresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idempresa'])) ? $this->New_label['idempresa'] : "Idempresa"; 
          if ($Cada_col == "idempresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['actualizada'])) ? $this->New_label['actualizada'] : "Actualizada"; 
          if ($Cada_col == "actualizada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT nombre_empresa, creada, copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, actualizada from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT nombre_empresa, creada, copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, actualizada from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT nombre_empresa, creada, copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, actualizada from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT nombre_empresa, TO_DATE(TO_CHAR(creada, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, TO_DATE(TO_CHAR(actualizada, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT nombre_empresa, creada, copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, actualizada from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT nombre_empresa, creada, copiada_como, sinmovimiento, tipo_negocio, predeterminada, nomina, codempresa, idempresa, nombre, observaciones, actualizada from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['order_grid'];
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
         $this->nombre_empresa = $rs->fields[0] ;  
         $this->creada = $rs->fields[1] ;  
         $this->copiada_como = $rs->fields[2] ;  
         $this->sinmovimiento = $rs->fields[3] ;  
         $this->tipo_negocio = $rs->fields[4] ;  
         $this->predeterminada = $rs->fields[5] ;  
         $this->nomina = $rs->fields[6] ;  
         $this->codempresa = $rs->fields[7] ;  
         $this->idempresa = $rs->fields[8] ;  
         $this->idempresa = (string)$this->idempresa;
         $this->nombre = $rs->fields[9] ;  
         $this->observaciones = $rs->fields[10] ;  
         $this->actualizada = $rs->fields[11] ;  
         //----- lookup - tipo_negocio
         $this->look_tipo_negocio = $this->tipo_negocio; 
         $this->Lookup->lookup_tipo_negocio($this->look_tipo_negocio); 
         $this->look_tipo_negocio = ($this->look_tipo_negocio == "&nbsp;") ? "" : $this->look_tipo_negocio; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- nombre_empresa
   function NM_export_nombre_empresa()
   {
         $this->nombre_empresa = html_entity_decode($this->nombre_empresa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_empresa = strip_tags($this->nombre_empresa);
         $this->nombre_empresa = NM_charset_to_utf8($this->nombre_empresa);
         $this->nombre_empresa = str_replace('<', '&lt;', $this->nombre_empresa);
         $this->nombre_empresa = str_replace('>', '&gt;', $this->nombre_empresa);
         $this->Texto_tag .= "<td>" . $this->nombre_empresa . "</td>\r\n";
   }
   //----- creada
   function NM_export_creada()
   {
             if (substr($this->creada, 10, 1) == "-") 
             { 
                 $this->creada = substr($this->creada, 0, 10) . " " . substr($this->creada, 11);
             } 
             if (substr($this->creada, 13, 1) == ".") 
             { 
                $this->creada = substr($this->creada, 0, 13) . ":" . substr($this->creada, 14, 2) . ":" . substr($this->creada, 17);
             } 
             $conteudo_x =  $this->creada;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->creada, "YYYY-MM-DD HH:II:SS  ");
                 $this->creada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->creada = NM_charset_to_utf8($this->creada);
         $this->creada = str_replace('<', '&lt;', $this->creada);
         $this->creada = str_replace('>', '&gt;', $this->creada);
         $this->Texto_tag .= "<td>" . $this->creada . "</td>\r\n";
   }
   //----- copiada_como
   function NM_export_copiada_como()
   {
         $this->copiada_como = html_entity_decode($this->copiada_como, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->copiada_como = strip_tags($this->copiada_como);
         $this->copiada_como = NM_charset_to_utf8($this->copiada_como);
         $this->copiada_como = str_replace('<', '&lt;', $this->copiada_como);
         $this->copiada_como = str_replace('>', '&gt;', $this->copiada_como);
         $this->Texto_tag .= "<td>" . $this->copiada_como . "</td>\r\n";
   }
   //----- sinmovimiento
   function NM_export_sinmovimiento()
   {
         $this->sinmovimiento = html_entity_decode($this->sinmovimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sinmovimiento = strip_tags($this->sinmovimiento);
         $this->sinmovimiento = NM_charset_to_utf8($this->sinmovimiento);
         $this->sinmovimiento = str_replace('<', '&lt;', $this->sinmovimiento);
         $this->sinmovimiento = str_replace('>', '&gt;', $this->sinmovimiento);
         $this->Texto_tag .= "<td>" . $this->sinmovimiento . "</td>\r\n";
   }
   //----- tipo_negocio
   function NM_export_tipo_negocio()
   {
         $this->look_tipo_negocio = html_entity_decode($this->look_tipo_negocio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_tipo_negocio = strip_tags($this->look_tipo_negocio);
         $this->look_tipo_negocio = NM_charset_to_utf8($this->look_tipo_negocio);
         $this->look_tipo_negocio = str_replace('<', '&lt;', $this->look_tipo_negocio);
         $this->look_tipo_negocio = str_replace('>', '&gt;', $this->look_tipo_negocio);
         $this->Texto_tag .= "<td>" . $this->look_tipo_negocio . "</td>\r\n";
   }
   //----- predeterminada
   function NM_export_predeterminada()
   {
         $this->predeterminada = html_entity_decode($this->predeterminada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->predeterminada = strip_tags($this->predeterminada);
         $this->predeterminada = NM_charset_to_utf8($this->predeterminada);
         $this->predeterminada = str_replace('<', '&lt;', $this->predeterminada);
         $this->predeterminada = str_replace('>', '&gt;', $this->predeterminada);
         $this->Texto_tag .= "<td>" . $this->predeterminada . "</td>\r\n";
   }
   //----- nomina
   function NM_export_nomina()
   {
         $this->nomina = html_entity_decode($this->nomina, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomina = strip_tags($this->nomina);
         $this->nomina = NM_charset_to_utf8($this->nomina);
         $this->nomina = str_replace('<', '&lt;', $this->nomina);
         $this->nomina = str_replace('>', '&gt;', $this->nomina);
         $this->Texto_tag .= "<td>" . $this->nomina . "</td>\r\n";
   }
   //----- codempresa
   function NM_export_codempresa()
   {
         $this->codempresa = html_entity_decode($this->codempresa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codempresa = strip_tags($this->codempresa);
         $this->codempresa = NM_charset_to_utf8($this->codempresa);
         $this->codempresa = str_replace('<', '&lt;', $this->codempresa);
         $this->codempresa = str_replace('>', '&gt;', $this->codempresa);
         $this->Texto_tag .= "<td>" . $this->codempresa . "</td>\r\n";
   }
   //----- idempresa
   function NM_export_idempresa()
   {
             nmgp_Form_Num_Val($this->idempresa, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idempresa = NM_charset_to_utf8($this->idempresa);
         $this->idempresa = str_replace('<', '&lt;', $this->idempresa);
         $this->idempresa = str_replace('>', '&gt;', $this->idempresa);
         $this->Texto_tag .= "<td>" . $this->idempresa . "</td>\r\n";
   }
   //----- nombre
   function NM_export_nombre()
   {
         $this->nombre = html_entity_decode($this->nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre = strip_tags($this->nombre);
         $this->nombre = NM_charset_to_utf8($this->nombre);
         $this->nombre = str_replace('<', '&lt;', $this->nombre);
         $this->nombre = str_replace('>', '&gt;', $this->nombre);
         $this->Texto_tag .= "<td>" . $this->nombre . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- actualizada
   function NM_export_actualizada()
   {
             if (substr($this->actualizada, 10, 1) == "-") 
             { 
                 $this->actualizada = substr($this->actualizada, 0, 10) . " " . substr($this->actualizada, 11);
             } 
             if (substr($this->actualizada, 13, 1) == ".") 
             { 
                $this->actualizada = substr($this->actualizada, 0, 13) . ":" . substr($this->actualizada, 14, 2) . ":" . substr($this->actualizada, 17);
             } 
             $conteudo_x =  $this->actualizada;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->actualizada, "YYYY-MM-DD HH:II:SS  ");
                 $this->actualizada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->actualizada = NM_charset_to_utf8($this->actualizada);
         $this->actualizada = str_replace('<', '&lt;', $this->actualizada);
         $this->actualizada = str_replace('>', '&gt;', $this->actualizada);
         $this->Texto_tag .= "<td>" . $this->actualizada . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de Empresas :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_empresas_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_empresas"> 
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
function fGestionarFTP($rutaarchivo,$host,$port,$user,$password,$carpeta)
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  	
	$mensaje = "";
	
	try
	{
		if(is_readable($rutaarchivo))
		{
			$nombrearchivo = trim(basename($rutaarchivo).PHP_EOL);

			# Realizamos la conexion con el servidor
			$conn_id=@ftp_connect($host,$port);

			if($conn_id)
			{
				# Realizamos el login con nuestro usuario y contraseña
				if(@ftp_login($conn_id,$user,$password))
				{
					if (ftp_mkdir($conn_id, $carpeta)) 
					{
					} 
					else 
					{
					}
					
					# Cambiamos al directorio especificado
					if(@ftp_chdir($conn_id,$carpeta))
					{

						# Subimos el fichero
						if(@ftp_put($conn_id,$nombrearchivo,$rutaarchivo,FTP_ASCII))
						{
							$mensaje = "Fichero subido correctamente";
						}
						else
						{
							$mensaje = "No ha sido posible subir el fichero";
						}
						
					}
					else
					{
						$mensaje = "No existe el directorio especificado";
					}
				}
				else
				{
					$mensaje = "El usuario o la contraseña son incorrectos";
				}

				# Cerramos la conexion ftp
				ftp_close($conn_id);

			}
			else
			{
				$mensaje = "No ha sido posible conectar con el servidor";
			}
		}
		else
		{
		   $mensaje = "No existe o no es legible el archivo";
		}
		
		echo $mensaje." -- Cerre la ventana.";
		
		echo "<script>";
		echo "console.log('fGestionarFTP: ".$mensaje."');";
		echo "</script>";
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fGestionarFTP: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function ConectarFTP()
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	define("SERVER","ftp.solucionesnavarro.com"); 
	define("PORT",21); 
	define("USER","p@gestionftpfacilweb.solucionesnavarro.com"); 
	define("PASSWORD",".facilweb2020"); 
	define("PASV",true); 
	
	$id_ftp=ftp_connect(SERVER,PORT); 
	ftp_login($id_ftp,USER,PASSWORD); 
	ftp_pasv($id_ftp,PASV); 
	return $id_ftp; 

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function SubirArchivo($archivo_local,$carpeta){
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP();
	
	$nombrearchivo = trim(basename($archivo_local).PHP_EOL);
	
	$directorios = ftp_nlist($id_ftp, ".");
	
	if(!in_array($carpeta,$directorios))
	{
		if (ftp_mkdir($id_ftp, $carpeta)) 
		{
			echo "Creado con exito ".$carpeta."<br>";
		} 
	}
	
	ftp_chdir($id_ftp,$carpeta);
	ftp_put($id_ftp,$nombrearchivo,$archivo_local,FTP_BINARY);
	ftp_quit($id_ftp); 
	
	echo "Copia subida con éxito a la carpeta remota: ".$carpeta."<br>";

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function ObtenerRuta(){
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP(); 
	$Directorio=ftp_pwd($id_ftp); 
	ftp_quit($id_ftp); 
	return $Directorio; 

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function fCopiasBD($nomempresa,$ruta,$tipo,$retorno=false,$sinmovimiento="NO",$ubicacion_archivo="NO",$vpuerto=3311)
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
if (!isset($_SESSION['gOS'])) {$_SESSION['gOS'] = "";}
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
  
	try {
		
		if($this->sc_temp_gOS!="WIN")
		{
			 if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_copia_php') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };
		}
		
		$vruta = getcwd();
		
		if (!file_exists($vruta.'/menu'))
		{
			chdir('../');
			$vruta = getcwd();
		}
		
		if(empty($ruta))
		{
			$ruta = $vruta.'/copias/'.$nomempresa;
		}
		
		if (!file_exists($ruta))
		{
			mkdir($ruta, 0777, true);
		}
		
		 $carpeta_tmp = '../tmp';

		 if (!file_exists($carpeta_tmp))
		 {
			 mkdir($carpeta_tmp, 0777, true);
		 }
		
		$gvnit = "";
		 
      $nm_select = "select concat(nit,'-',dv) from $nomempresa.datosemp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vnit = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vnit[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vnit = false;
          $this->vnit_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
		if(isset($this->vnit[0][0]))
		{
			$gvnit = $this->vnit[0][0];
			$gvnit = $gvnit.'_';
		}
		
		$varchivocopia = $ruta.'/'.$tipo.'_'.$gvnit.$nomempresa.'_fecha_'.date('Y-m-d').'_hora_'.date('H-i-s').'.sql';
		
		if($sinmovimiento=="NO")
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' > "'.$varchivocopia.'"';
			
			
		}
		else
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' aplicaciones_menu aplicaciones_permisos bodegas c_costos caja_ventas colores colorxproducto configuraciones datosemp departamento detallecombos detallekardexcombos direccion formadepago formatosimpresion formatosimpresion_prefijos grupo impuestos iva municipio paises permisos productos resdian saborxproducto tallas tallaxproducto terceros tipoautoretencion tipoica tiporetefuente tipotransfe usuarios usuarios_grupos vencimiento_lote version webservicefe  > "'.$varchivocopia.'"';
		}
		
		shell_exec($vcmd);
		
		echo "<script>";
		echo "console.log('fCopiasBD: Copia realizada.');";
		echo "</script>";
		
		include_once($this->Ini->path_third . "/zipfile/zipfile.php");
$sc_Zip_files = new zipfile();
$sc_Zip_files->set_file( $varchivocopia.'.zip');
if (is_array($varchivocopia))
{
    foreach ($varchivocopia as $SC_cada_zip)
    {
        $sc_Zip_files->sc_zip_all($SC_cada_zip);
    }
}
else
{
    $sc_Zip_files->sc_zip_all($varchivocopia);
}
$sc_Zip_files->file();
;
		
		unlink($varchivocopia);
		
		if($retorno)
		{
			return addslashes($varchivocopia);
		}
		
		if($ubicacion_archivo=="SI")
		{
			return addslashes($varchivocopia.'.zip');
		}
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fCopiasBD: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}
if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
}

?>
