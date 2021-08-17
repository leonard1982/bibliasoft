<?php

class grid_casos_vistacontrato_rtf
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
   function grid_casos_vistacontrato_rtf()
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
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_casos_vistacontrato";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_casos_vistacontrato.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_casos_vistacontrato']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_casos_vistacontrato']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_casos_vistacontrato']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->codigo_cliente = $Busca_temp['codigo_cliente']; 
          $tmp_pos = strpos($this->codigo_cliente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->codigo_cliente = substr($this->codigo_cliente, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false)
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
          $this->prioridad = $Busca_temp['prioridad']; 
          $tmp_pos = strpos($this->prioridad, "##@@");
          if ($tmp_pos !== false)
          {
              $this->prioridad = substr($this->prioridad, 0, $tmp_pos);
          }
          $this->tipo_caso = $Busca_temp['tipo_caso']; 
          $tmp_pos = strpos($this->tipo_caso, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tipo_caso = substr($this->tipo_caso, 0, $tmp_pos);
          }
          $this->medio = $Busca_temp['medio']; 
          $tmp_pos = strpos($this->medio, "##@@");
          if ($tmp_pos !== false)
          {
              $this->medio = substr($this->medio, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false)
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asignado_tercero = $Busca_temp['asignado_tercero']; 
          $tmp_pos = strpos($this->asignado_tercero, "##@@");
          if ($tmp_pos !== false)
          {
              $this->asignado_tercero = substr($this->asignado_tercero, 0, $tmp_pos);
          }
          $this->fecha_asignacion = $Busca_temp['fecha_asignacion']; 
          $tmp_pos = strpos($this->fecha_asignacion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha_asignacion = substr($this->fecha_asignacion, 0, $tmp_pos);
          }
          $this->fecha_asignacion_2 = $Busca_temp['fecha_asignacion_input_2']; 
          $this->fecha_cierre = $Busca_temp['fecha_cierre']; 
          $tmp_pos = strpos($this->fecha_cierre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha_cierre = substr($this->fecha_cierre, 0, $tmp_pos);
          }
          $this->fecha_cierre_2 = $Busca_temp['fecha_cierre_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), estado, valor, observaciones, id_caso, codigo_cliente, prioridad, tipo_caso, medio, asignado_tercero, str_replace (convert(char(10),fecha_asignacion,102), '.', '-') + ' ' + convert(char(8),fecha_asignacion,20), str_replace (convert(char(10),fecha_cierre,102), '.', '-') + ' ' + convert(char(8),fecha_cierre,20), cedula_tercero, notificado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT numero, fecha, estado, valor, observaciones, id_caso, codigo_cliente, prioridad, tipo_caso, medio, asignado_tercero, fecha_asignacion, fecha_cierre, cedula_tercero, notificado from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT numero, fecha, estado, valor, observaciones, id_caso, codigo_cliente, prioridad, tipo_caso, medio, asignado_tercero, fecha_asignacion, fecha_cierre, cedula_tercero, notificado from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Caso"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor"; 
          if ($Cada_col == "valor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : ""; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_caso'])) ? $this->New_label['id_caso'] : "Id Caso"; 
          if ($Cada_col == "id_caso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigo_cliente'])) ? $this->New_label['codigo_cliente'] : "Cod/Cliente"; 
          if ($Cada_col == "codigo_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prioridad'])) ? $this->New_label['prioridad'] : "Prioridad"; 
          if ($Cada_col == "prioridad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_caso'])) ? $this->New_label['tipo_caso'] : "Tipo Caso"; 
          if ($Cada_col == "tipo_caso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medio'])) ? $this->New_label['medio'] : "Medio"; 
          if ($Cada_col == "medio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asignado_tercero'])) ? $this->New_label['asignado_tercero'] : "Asignado a:"; 
          if ($Cada_col == "asignado_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_asignacion'])) ? $this->New_label['fecha_asignacion'] : "Fecha Asignacion"; 
          if ($Cada_col == "fecha_asignacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_cierre'])) ? $this->New_label['fecha_cierre'] : "Fecha Cierre"; 
          if ($Cada_col == "fecha_cierre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cedula_tercero'])) ? $this->New_label['cedula_tercero'] : "Cedula Tercero"; 
          if ($Cada_col == "cedula_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['notificado'])) ? $this->New_label['notificado'] : "Notificado"; 
          if ($Cada_col == "notificado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : ""; 
          if ($Cada_col == "notificar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->numero = $rs->fields[0] ;  
         $this->numero = (string)$this->numero;
         $this->fecha = $rs->fields[1] ;  
         $this->estado = $rs->fields[2] ;  
         $this->valor = $rs->fields[3] ;  
         $this->valor =  str_replace(",", ".", $this->valor);
         $this->valor = (strpos(strtolower($this->valor), "e")) ? (float)$this->valor : $this->valor; 
         $this->valor = (string)$this->valor;
         $this->observaciones = $rs->fields[4] ;  
         $this->id_caso = $rs->fields[5] ;  
         $this->id_caso = (string)$this->id_caso;
         $this->codigo_cliente = $rs->fields[6] ;  
         $this->prioridad = $rs->fields[7] ;  
         $this->tipo_caso = $rs->fields[8] ;  
         $this->medio = $rs->fields[9] ;  
         $this->asignado_tercero = $rs->fields[10] ;  
         $this->fecha_asignacion = $rs->fields[11] ;  
         $this->fecha_cierre = $rs->fields[12] ;  
         $this->cedula_tercero = $rs->fields[13] ;  
         $this->notificado = $rs->fields[14] ;  
         //----- lookup - asignado_tercero
         $this->look_asignado_tercero = $this->asignado_tercero; 
         $this->Lookup->lookup_asignado_tercero($this->look_asignado_tercero, $this->asignado_tercero) ; 
         $this->look_asignado_tercero = ($this->look_asignado_tercero == "&nbsp;") ? "" : $this->look_asignado_tercero; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_casos_vistacontrato']['contr_erro'] = 'on';
  
      $nm_select = "select color from casos_estado where descripcion='".$this->estado  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vColor = array();
      $this->vcolor = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->vColor[$y] [$x] = $rx->fields[$x];
                        $this->vcolor[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vColor = false;
          $this->vColor_erro = $this->Db->ErrorMsg();
          $this->vcolor = false;
          $this->vcolor_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vcolor[0][0]))
{
	$vcol = $this->vcolor[0][0];
	$this->NM_field_color["estado"] = $vcol;
	
	$this->estado  = "<div style='background:".$vcol.";margin:0px;width:90%;height:100%;padding:5px;'><b><label style='color:#ffffff;'>".$this->estado ."</label></b></div>";
}

if($this->notificado =='SI')
{
	$this->NM_field_style["notificado"] = "background-color:#33ff99;font-size:14px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

 
      $nm_select = "select color from casos_prioridad where descripcion='".$this->prioridad  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vColor2 = array();
      $this->vcolor2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->vColor2[$y] [$x] = $rx->fields[$x];
                        $this->vcolor2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vColor2 = false;
          $this->vColor2_erro = $this->Db->ErrorMsg();
          $this->vcolor2 = false;
          $this->vcolor2_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vcolor2[0][0]))
{
	$vcol2 = $this->vcolor2[0][0];
	$this->NM_field_color["prioridad"] = $vcol2;
}
$_SESSION['scriptcase']['grid_casos_vistacontrato']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['field_order'] as $Cada_col)
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

      $rs->Close();
   }
   //----- numero
   function NM_export_numero()
   {
         nmgp_Form_Num_Val($this->numero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->numero))
         {
             $this->numero = sc_convert_encoding($this->numero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->numero = str_replace('<', '&lt;', $this->numero);
         $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->Texto_tag .= "<td>" . $this->numero . "</td>\r\n";
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
         $conteudo_x = $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD HH:II:SS");
             $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->fecha))
         {
             $this->fecha = sc_convert_encoding($this->fecha, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- estado
   function NM_export_estado()
   {
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         if (!NM_is_utf8($this->estado))
         {
             $this->estado = sc_convert_encoding($this->estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- valor
   function NM_export_valor()
   {
         nmgp_Form_Num_Val($this->valor, ",", ".", "0", "S", "2", "$", "V:3:3", "-"); 
         if (!NM_is_utf8($this->valor))
         {
             $this->valor = sc_convert_encoding($this->valor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->valor = str_replace('<', '&lt;', $this->valor);
         $this->valor = str_replace('>', '&gt;', $this->valor);
         $this->Texto_tag .= "<td>" . $this->valor . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         if (!NM_is_utf8($this->observaciones))
         {
             $this->observaciones = sc_convert_encoding($this->observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         if (!NM_is_utf8($this->imprimir))
         {
             $this->imprimir = sc_convert_encoding($this->imprimir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->imprimir = str_replace('<', '&lt;', $this->imprimir);
         $this->imprimir = str_replace('>', '&gt;', $this->imprimir);
         $this->Texto_tag .= "<td>" . $this->imprimir . "</td>\r\n";
   }
   //----- id_caso
   function NM_export_id_caso()
   {
         nmgp_Form_Num_Val($this->id_caso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_caso))
         {
             $this->id_caso = sc_convert_encoding($this->id_caso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_caso = str_replace('<', '&lt;', $this->id_caso);
         $this->id_caso = str_replace('>', '&gt;', $this->id_caso);
         $this->Texto_tag .= "<td>" . $this->id_caso . "</td>\r\n";
   }
   //----- codigo_cliente
   function NM_export_codigo_cliente()
   {
         $this->codigo_cliente = html_entity_decode($this->codigo_cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigo_cliente = strip_tags($this->codigo_cliente);
         if (!NM_is_utf8($this->codigo_cliente))
         {
             $this->codigo_cliente = sc_convert_encoding($this->codigo_cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->codigo_cliente = str_replace('<', '&lt;', $this->codigo_cliente);
         $this->codigo_cliente = str_replace('>', '&gt;', $this->codigo_cliente);
         $this->Texto_tag .= "<td>" . $this->codigo_cliente . "</td>\r\n";
   }
   //----- prioridad
   function NM_export_prioridad()
   {
         $this->prioridad = html_entity_decode($this->prioridad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prioridad = strip_tags($this->prioridad);
         if (!NM_is_utf8($this->prioridad))
         {
             $this->prioridad = sc_convert_encoding($this->prioridad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->prioridad = str_replace('<', '&lt;', $this->prioridad);
         $this->prioridad = str_replace('>', '&gt;', $this->prioridad);
         $this->Texto_tag .= "<td>" . $this->prioridad . "</td>\r\n";
   }
   //----- tipo_caso
   function NM_export_tipo_caso()
   {
         $this->tipo_caso = html_entity_decode($this->tipo_caso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_caso = strip_tags($this->tipo_caso);
         if (!NM_is_utf8($this->tipo_caso))
         {
             $this->tipo_caso = sc_convert_encoding($this->tipo_caso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tipo_caso = str_replace('<', '&lt;', $this->tipo_caso);
         $this->tipo_caso = str_replace('>', '&gt;', $this->tipo_caso);
         $this->Texto_tag .= "<td>" . $this->tipo_caso . "</td>\r\n";
   }
   //----- medio
   function NM_export_medio()
   {
         $this->medio = html_entity_decode($this->medio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medio = strip_tags($this->medio);
         if (!NM_is_utf8($this->medio))
         {
             $this->medio = sc_convert_encoding($this->medio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->medio = str_replace('<', '&lt;', $this->medio);
         $this->medio = str_replace('>', '&gt;', $this->medio);
         $this->Texto_tag .= "<td>" . $this->medio . "</td>\r\n";
   }
   //----- asignado_tercero
   function NM_export_asignado_tercero()
   {
         $this->look_asignado_tercero = html_entity_decode($this->look_asignado_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_asignado_tercero = strip_tags($this->look_asignado_tercero);
         if (!NM_is_utf8($this->look_asignado_tercero))
         {
             $this->look_asignado_tercero = sc_convert_encoding($this->look_asignado_tercero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_asignado_tercero = str_replace('<', '&lt;', $this->look_asignado_tercero);
         $this->look_asignado_tercero = str_replace('>', '&gt;', $this->look_asignado_tercero);
         $this->Texto_tag .= "<td>" . $this->look_asignado_tercero . "</td>\r\n";
   }
   //----- fecha_asignacion
   function NM_export_fecha_asignacion()
   {
         if (substr($this->fecha_asignacion, 10, 1) == "-") 
         { 
             $this->fecha_asignacion = substr($this->fecha_asignacion, 0, 10) . " " . substr($this->fecha_asignacion, 11);
         } 
         if (substr($this->fecha_asignacion, 13, 1) == ".") 
         { 
            $this->fecha_asignacion = substr($this->fecha_asignacion, 0, 13) . ":" . substr($this->fecha_asignacion, 14, 2) . ":" . substr($this->fecha_asignacion, 17);
         } 
         $conteudo_x = $this->fecha_asignacion;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha_asignacion, "YYYY-MM-DD HH:II:SS");
             $this->fecha_asignacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->fecha_asignacion))
         {
             $this->fecha_asignacion = sc_convert_encoding($this->fecha_asignacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecha_asignacion = str_replace('<', '&lt;', $this->fecha_asignacion);
         $this->fecha_asignacion = str_replace('>', '&gt;', $this->fecha_asignacion);
         $this->Texto_tag .= "<td>" . $this->fecha_asignacion . "</td>\r\n";
   }
   //----- fecha_cierre
   function NM_export_fecha_cierre()
   {
         if (substr($this->fecha_cierre, 10, 1) == "-") 
         { 
             $this->fecha_cierre = substr($this->fecha_cierre, 0, 10) . " " . substr($this->fecha_cierre, 11);
         } 
         if (substr($this->fecha_cierre, 13, 1) == ".") 
         { 
            $this->fecha_cierre = substr($this->fecha_cierre, 0, 13) . ":" . substr($this->fecha_cierre, 14, 2) . ":" . substr($this->fecha_cierre, 17);
         } 
         $conteudo_x = $this->fecha_cierre;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha_cierre, "YYYY-MM-DD HH:II:SS");
             $this->fecha_cierre = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
         if (!NM_is_utf8($this->fecha_cierre))
         {
             $this->fecha_cierre = sc_convert_encoding($this->fecha_cierre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecha_cierre = str_replace('<', '&lt;', $this->fecha_cierre);
         $this->fecha_cierre = str_replace('>', '&gt;', $this->fecha_cierre);
         $this->Texto_tag .= "<td>" . $this->fecha_cierre . "</td>\r\n";
   }
   //----- cedula_tercero
   function NM_export_cedula_tercero()
   {
         $this->cedula_tercero = html_entity_decode($this->cedula_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cedula_tercero = strip_tags($this->cedula_tercero);
         if (!NM_is_utf8($this->cedula_tercero))
         {
             $this->cedula_tercero = sc_convert_encoding($this->cedula_tercero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cedula_tercero = str_replace('<', '&lt;', $this->cedula_tercero);
         $this->cedula_tercero = str_replace('>', '&gt;', $this->cedula_tercero);
         $this->Texto_tag .= "<td>" . $this->cedula_tercero . "</td>\r\n";
   }
   //----- notificado
   function NM_export_notificado()
   {
         $this->notificado = html_entity_decode($this->notificado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->notificado = strip_tags($this->notificado);
         if (!NM_is_utf8($this->notificado))
         {
             $this->notificado = sc_convert_encoding($this->notificado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->notificado = str_replace('<', '&lt;', $this->notificado);
         $this->notificado = str_replace('>', '&gt;', $this->notificado);
         $this->Texto_tag .= "<td>" . $this->notificado . "</td>\r\n";
   }
   //----- notificar
   function NM_export_notificar()
   {
         if (!NM_is_utf8($this->notificar))
         {
             $this->notificar = sc_convert_encoding($this->notificar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->notificar = str_replace('<', '&lt;', $this->notificar);
         $this->notificar = str_replace('>', '&gt;', $this->notificar);
         $this->Texto_tag .= "<td>" . $this->notificar . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
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
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos_vistacontrato'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista Casos :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
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
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_casos_vistacontrato_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_casos_vistacontrato"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
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
      $mask_num = false;
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
}

?>
