<?php

class grid_cloud_copias_rtf
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
                   nm_limpa_str_grid_cloud_copias($cadapar[1]);
                   nm_protect_num_grid_cloud_copias($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_cloud_copias']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gidempresa)) 
      {
          $_SESSION['gidempresa'] = $gidempresa;
          nm_limpa_str_grid_cloud_copias($_SESSION["gidempresa"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_cloud_copias_total.class.php"); 
      $this->Tot      = new grid_cloud_copias_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_cloud_copias']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_cloud_copias";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_cloud_copias.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_cloud_copias']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_cloud_copias']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_cloud_copias']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_copia'])) ? $this->New_label['id_copia'] : "Id"; 
          if ($Cada_col == "id_copia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_archivo'])) ? $this->New_label['nombre_archivo'] : "Nombre Archivo"; 
          if ($Cada_col == "nombre_archivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : "Descargar"; 
          if ($Cada_col == "descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subida'])) ? $this->New_label['subida'] : "Nube"; 
          if ($Cada_col == "subida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : ""; 
          if ($Cada_col == "imagen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['borrar'])) ? $this->New_label['borrar'] : ""; 
          if ($Cada_col == "borrar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT id_copia, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), nombre_archivo, descripcion, subida from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_copia, fecha, nombre_archivo, descripcion, subida from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_copia, fecha, nombre_archivo, descripcion, subida from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['order_grid'];
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
         $this->id_copia = $rs->fields[0] ;  
         $this->id_copia = (string)$this->id_copia;
         $this->fecha = $rs->fields[1] ;  
         $this->nombre_archivo = $rs->fields[2] ;  
         $this->descripcion = $rs->fields[3] ;  
         $this->subida = $rs->fields[4] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  if(!empty($this->descripcion ))
{
	$this->descripcion  = "<a target='_blank' href='../copias/".$this->nombre_archivo ."'>Descargar Copia</a>";
}

if($this->subida =='SI')
{
	$this->NM_field_style["subida"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id_copia
   function NM_export_id_copia()
   {
             nmgp_Form_Num_Val($this->id_copia, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_copia = NM_charset_to_utf8($this->id_copia);
         $this->id_copia = str_replace('<', '&lt;', $this->id_copia);
         $this->id_copia = str_replace('>', '&gt;', $this->id_copia);
         $this->Texto_tag .= "<td>" . $this->id_copia . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
             if (substr($this->fecha, 10, 1) == "-") 
             { 
                 $this->fecha = substr($this->fecha, 0, 10) . " " . substr($this->fecha, 11);
             } 
             if (substr($this->fecha, 13, 1) == ".") 
             { 
                $this->fecha = substr($this->fecha, 0, 13) . ":" . substr($this->fecha, 14, 2) . ":" . substr($this->fecha, 17);
             } 
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- nombre_archivo
   function NM_export_nombre_archivo()
   {
         $this->nombre_archivo = html_entity_decode($this->nombre_archivo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_archivo = strip_tags($this->nombre_archivo);
         $this->nombre_archivo = NM_charset_to_utf8($this->nombre_archivo);
         $this->nombre_archivo = str_replace('<', '&lt;', $this->nombre_archivo);
         $this->nombre_archivo = str_replace('>', '&gt;', $this->nombre_archivo);
         $this->Texto_tag .= "<td>" . $this->nombre_archivo . "</td>\r\n";
   }
   //----- descripcion
   function NM_export_descripcion()
   {
         $this->descripcion = html_entity_decode($this->descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descripcion = strip_tags($this->descripcion);
         $this->descripcion = NM_charset_to_utf8($this->descripcion);
         $this->descripcion = str_replace('<', '&lt;', $this->descripcion);
         $this->descripcion = str_replace('>', '&gt;', $this->descripcion);
         $this->Texto_tag .= "<td>" . $this->descripcion . "</td>\r\n";
   }
   //----- subida
   function NM_export_subida()
   {
         $this->subida = html_entity_decode($this->subida, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->subida = strip_tags($this->subida);
         $this->subida = NM_charset_to_utf8($this->subida);
         $this->subida = str_replace('<', '&lt;', $this->subida);
         $this->subida = str_replace('>', '&gt;', $this->subida);
         $this->Texto_tag .= "<td>" . $this->subida . "</td>\r\n";
   }
   //----- imagen
   function NM_export_imagen()
   {
         $this->imagen = NM_charset_to_utf8($this->imagen);
         $this->imagen = str_replace('<', '&lt;', $this->imagen);
         $this->imagen = str_replace('>', '&gt;', $this->imagen);
         $this->Texto_tag .= "<td>" . $this->imagen . "</td>\r\n";
   }
   //----- borrar
   function NM_export_borrar()
   {
         $this->borrar = NM_charset_to_utf8($this->borrar);
         $this->borrar = str_replace('<', '&lt;', $this->borrar);
         $this->borrar = str_replace('>', '&gt;', $this->borrar);
         $this->Texto_tag .= "<td>" . $this->borrar . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Copias :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_cloud_copias_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_cloud_copias"> 
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
function full_copy( $source, $target ) {
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                $this->full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function fGestionarFTP($rutaarchivo,$host,$port,$user,$password,$carpeta)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  	
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

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function ConectarFTP()
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	define("SERVER","ftp.solucionesnavarro.com"); 
	define("PORT",21); 
	define("USER","p@gestionftpfacilweb.solucionesnavarro.com"); 
	define("PASSWORD",".facilweb2020"); 
	define("PASV",true); 
	
	$id_ftp=ftp_connect(SERVER,PORT); 
	ftp_login($id_ftp,USER,PASSWORD); 
	ftp_pasv($id_ftp,PASV); 
	return $id_ftp; 

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function SubirArchivo($archivo_local,$carpeta,$id_copia)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	$id_ftp=$this->ConectarFTP();
	
	$nombrearchivo = trim(basename($archivo_local).PHP_EOL);
	
	$directorios = ftp_nlist($id_ftp, "facilweb_fe");
	
	if(!in_array($carpeta,$directorios))
	{
		if (ftp_mkdir($id_ftp, 'facilweb_fe/'.$carpeta)) 
		{
			echo "Creado con exito ".$carpeta."<br>";
		} 
	}
	
	ftp_chdir($id_ftp,'facilweb_fe/'.$carpeta);
	ftp_put($id_ftp,$nombrearchivo,$archivo_local,FTP_BINARY);
	ftp_quit($id_ftp); 
	
	echo "Copia subida con éxito a la carpeta remota: facilweb_fe/".$carpeta."<br>";
	
	$vsql = "update cloud_copias set subida='SI' where id_copia='".$id_copia."'";
	
     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function ObtenerRuta(){
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP(); 
	$Directorio=ftp_pwd($id_ftp); 
	ftp_quit($id_ftp); 
	return $Directorio; 

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function fCopiasBD($ruta,$retorno=false)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
  
	try {
		$vruta = getcwd();
		
		if (!file_exists($ruta))
		{
			mkdir($ruta, 0777, true);
		}
		
		$vfecha  = date("Y-m-d H:i:s");
		$vfecha2 = date('Y-m-d');
		$vhora2  = date('H-i-s');
		$vnomcarpeta     = 'copia_facilweb_fe_fecha_'.$vfecha2.'_hora_'.$vhora2;
		if (!file_exists($vruta.'/copias/'.$vnomcarpeta))
		{
			mkdir($vruta.'/copias/'.$vnomcarpeta, 0777, true);
		}
		$vnomarchivo     = 'copia_facilweb_fe_fecha_'.$vfecha2.'_hora_'.$vhora2;
		$vnomarchivo_qr  = 'copia_facilweb_fe_fecha_qr_'.$vfecha2.'_hora_'.$vhora2.'.zip';
		$varchivocopia   = $ruta.'/'.$vnomcarpeta.'/'.$vnomarchivo.'.sql';
		
		$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port=3332 --user=root --password=.facilweb2020 --no-create-info --skip-triggers --extended-insert=true --complete-insert facilweb_cloud > "'.$varchivocopia.'"';
		
		shell_exec($vcmd);
		
		if(!is_dir($vruta.'/copias/'.$vnomcarpeta.'/qr'))
		{
			$source = $vruta.'/qr';
			$destination = $vruta.'/copias/'.$vnomcarpeta.'/qr';
			$this->full_copy($source, $destination);
		}
		
		if(!is_dir($vruta.'/copias/'.$vnomcarpeta.'/xmls'))
		{
			$source = $vruta.'/xmls';
			$destination = $vruta.'/copias/'.$vnomcarpeta.'/xmls';
			$this->full_copy($source, $destination);
		}
		
		$vnomcopia = $vruta.'/copias/'.$vnomcarpeta.'.zip';
		include_once($this->Ini->path_third . "/zipfile/zipfile.php");
$sc_Zip_files = new zipfile();
$sc_Zip_files->set_file($vnomcopia);
if (is_array($vruta.'/copias/'.$vnomcarpeta))
{
    foreach ($vruta.'/copias/'.$vnomcarpeta as $SC_cada_zip)
    {
        $sc_Zip_files->sc_zip_all($SC_cada_zip);
    }
}
else
{
    $sc_Zip_files->sc_zip_all($vruta.'/copias/'.$vnomcarpeta);
}
$sc_Zip_files->file();
;
		
		$vsql = "insert into cloud_copias set fecha='".$vfecha."',descripcion='".addslashes($vnomcopia)."',id_empresa='".$this->sc_temp_gidempresa."',nombre_archivo='".$vnomarchivo.".zip'";
		
		
     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		if($retorno)
		{
			return $varchivocopia;
		}
		
		unlink($vruta.'/copias/'.$vnomcarpeta.'/qr/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta.'/qr');
		unlink($vruta.'/copias/'.$vnomcarpeta.'/xmls/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta.'/xml');
		unlink($vruta.'/copias/'.$vnomcarpeta.'/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta);
		
		echo "Copia finalizada con éxito!!!";
		
	} catch (Exception $e) {
		
	}
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
}

?>
