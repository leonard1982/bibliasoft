<?php

class grid_terceros_cartera_por_edades_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cartera_por_edades']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cartera_por_edades']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['campos_busca'];
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
          $this->nombres = $Busca_temp['nombres']; 
          $tmp_pos = strpos($this->nombres, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombres))
          {
              $this->nombres = substr($this->nombres, 0, $tmp_pos);
          }
          $this->campos = $Busca_temp['campos']; 
          $tmp_pos = strpos($this->campos, "##@@");
          if ($tmp_pos !== false && !is_array($this->campos))
          {
              $this->campos = substr($this->campos, 0, $tmp_pos);
          }
          $this->clasificacion = $Busca_temp['clasificacion']; 
          $tmp_pos = strpos($this->clasificacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->clasificacion))
          {
              $this->clasificacion = substr($this->clasificacion, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(saldo), sum(dv30), sum(dv45), sum(dv60), sum(dv90), sum(dv120), sum(dv180), sum(dv_siempre) from (SELECT      idtercero,     documento,     nombres,     (saldo*-1) as saldo,     saldoapagar,     (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 1 and DATEDIFF(now(),fechavenc) <=30 and f.idcli=t.idtercero and f.saldo>0) as dv30, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 31 and DATEDIFF(now(),fechavenc) <=45 and f.idcli=t.idtercero and f.saldo>0) as dv45, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 46 and DATEDIFF(now(),fechavenc) <=60 and f.idcli=t.idtercero and f.saldo>0) as dv60, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 61 and DATEDIFF(now(),fechavenc) <=90 and f.idcli=t.idtercero and f.saldo>0) as dv90, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 91 and DATEDIFF(now(),fechavenc) <=120 and f.idcli=t.idtercero and f.saldo>0) as dv120, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 121 and DATEDIFF(now(),fechavenc) <=180 and f.idcli=t.idtercero and f.saldo>0) as dv180, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 181 and DATEDIFF(now(),fechavenc) <=99999 and f.idcli=t.idtercero and f.saldo>0) as dv_siempre FROM      terceros t WHERE     saldo<0) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(saldo), sum(dv30), sum(dv45), sum(dv60), sum(dv90), sum(dv120), sum(dv180), sum(dv_siempre) from (SELECT      idtercero,     documento,     nombres,     (saldo*-1) as saldo,     saldoapagar,     (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 1 and DATEDIFF(now(),fechavenc) <=30 and f.idcli=t.idtercero and f.saldo>0) as dv30, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 31 and DATEDIFF(now(),fechavenc) <=45 and f.idcli=t.idtercero and f.saldo>0) as dv45, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 46 and DATEDIFF(now(),fechavenc) <=60 and f.idcli=t.idtercero and f.saldo>0) as dv60, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 61 and DATEDIFF(now(),fechavenc) <=90 and f.idcli=t.idtercero and f.saldo>0) as dv90, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 91 and DATEDIFF(now(),fechavenc) <=120 and f.idcli=t.idtercero and f.saldo>0) as dv120, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 121 and DATEDIFF(now(),fechavenc) <=180 and f.idcli=t.idtercero and f.saldo>0) as dv180, (SELECT sum(f.saldo)  FROM facturaven f  WHERE f.credito = 1 and f.pagada <> 'SI' and f.asentada=1  and DATEDIFF(now(),fechavenc) >= 181 and DATEDIFF(now(),fechavenc) <=99999 and f.idcli=t.idtercero and f.saldo>0) as dv_siempre FROM      terceros t WHERE     saldo<0) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cartera_por_edades']['contr_total_geral'] = "OK";
   } 

   function Ajust_statistic($comando)
   {
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_vfp) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_odbc))
      {
          $comando = str_replace(array('count(distinct ','varp(','stdevp(','variance(','stddev('), array('sum(','sum(','sum(','sum(','sum('), $comando);
      }
      if ($this->Ini->nm_tp_variance == "P")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
      }
      if ($this->Ini->nm_tp_variance == "A")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $comando = str_replace(array('varp(','stdevp('), array('var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace('stddev(', 'stdev(', $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $comando = str_replace(array('variance(','stddev('), array('variance_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
      }
      return $comando;
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
