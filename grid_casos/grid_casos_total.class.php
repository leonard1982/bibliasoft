<?php

class grid_casos_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_casos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_casos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->zona = $Busca_temp['zona']; 
          $tmp_pos = strpos($this->zona, "##@@");
          if ($tmp_pos !== false && !is_array($this->zona))
          {
              $this->zona = substr($this->zona, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->codigo_cliente = $Busca_temp['codigo_cliente']; 
          $tmp_pos = strpos($this->codigo_cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigo_cliente))
          {
              $this->codigo_cliente = substr($this->codigo_cliente, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false && !is_array($this->estado))
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
          $this->prioridad = $Busca_temp['prioridad']; 
          $tmp_pos = strpos($this->prioridad, "##@@");
          if ($tmp_pos !== false && !is_array($this->prioridad))
          {
              $this->prioridad = substr($this->prioridad, 0, $tmp_pos);
          }
          $this->tipo_caso = $Busca_temp['tipo_caso']; 
          $tmp_pos = strpos($this->tipo_caso, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo_caso))
          {
              $this->tipo_caso = substr($this->tipo_caso, 0, $tmp_pos);
          }
          $this->medio = $Busca_temp['medio']; 
          $tmp_pos = strpos($this->medio, "##@@");
          if ($tmp_pos !== false && !is_array($this->medio))
          {
              $this->medio = substr($this->medio, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asignado_tercero = $Busca_temp['asignado_tercero']; 
          $tmp_pos = strpos($this->asignado_tercero, "##@@");
          if ($tmp_pos !== false && !is_array($this->asignado_tercero))
          {
              $this->asignado_tercero = substr($this->asignado_tercero, 0, $tmp_pos);
          }
          $this->fecha_asignacion = $Busca_temp['fecha_asignacion']; 
          $tmp_pos = strpos($this->fecha_asignacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_asignacion))
          {
              $this->fecha_asignacion = substr($this->fecha_asignacion, 0, $tmp_pos);
          }
          $fecha_asignacion_2 = $Busca_temp['fecha_asignacion_input_2']; 
          $this->fecha_asignacion_2 = $Busca_temp['fecha_asignacion_input_2']; 
          $this->fecha_cierre = $Busca_temp['fecha_cierre']; 
          $tmp_pos = strpos($this->fecha_cierre, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_cierre))
          {
              $this->fecha_cierre = substr($this->fecha_cierre, 0, $tmp_pos);
          }
          $fecha_cierre_2 = $Busca_temp['fecha_cierre_input_2']; 
          $this->fecha_cierre_2 = $Busca_temp['fecha_cierre_input_2']; 
      } 
   }

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $factura, $asignado_tercero;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['contr_total_geral'] = "OK";
   } 

   //-----  fecha
   function quebra_fecha_sc_free_group_by($fecha, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_fecha = array() ;  
      $tot_fecha[0] = $fecha ; 
   }
   //-----  codigo_cliente
   function quebra_codigo_cliente_sc_free_group_by($codigo_cliente, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_codigo_cliente = array() ;  
      $tot_codigo_cliente[0] = $codigo_cliente ; 
   }
   //-----  estado
   function quebra_estado_sc_free_group_by($estado, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_estado = array() ;  
      $tot_estado[0] = $estado ; 
   }
   //-----  prioridad
   function quebra_prioridad_sc_free_group_by($prioridad, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_prioridad = array() ;  
      $tot_prioridad[0] = $prioridad ; 
   }
   //-----  tipo_caso
   function quebra_tipo_caso_sc_free_group_by($tipo_caso, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_tipo_caso = array() ;  
      $tot_tipo_caso[0] = $tipo_caso ; 
   }
   //-----  medio
   function quebra_medio_sc_free_group_by($medio, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_medio = array() ;  
      $tot_medio[0] = $medio ; 
   }
   //-----  asignado_tercero
   function quebra_asignado_tercero_sc_free_group_by($asignado_tercero, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $factura, $asignado_tercero;
      $tot_asignado_tercero = array() ;  
      $tot_asignado_tercero[0] = $asignado_tercero ; 
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
