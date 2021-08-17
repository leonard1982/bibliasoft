<?php

class reporte_compra_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['reporte_compra']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['reporte_compra']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechacom = $Busca_temp['fechacom']; 
          $tmp_pos = strpos($this->fechacom, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechacom))
          {
              $this->fechacom = substr($this->fechacom, 0, $tmp_pos);
          }
          $fechacom_2 = $Busca_temp['fechacom_input_2']; 
          $this->fechacom_2 = $Busca_temp['fechacom_input_2']; 
          $this->numfacom = $Busca_temp['numfacom']; 
          $tmp_pos = strpos($this->numfacom, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacom))
          {
              $this->numfacom = substr($this->numfacom, 0, $tmp_pos);
          }
          $this->idprov = $Busca_temp['idprov']; 
          $tmp_pos = strpos($this->idprov, "##@@");
          if ($tmp_pos !== false && !is_array($this->idprov))
          {
              $this->idprov = substr($this->idprov, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_proveedor($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][0] = "Total compras"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][8] = $rt->fields[7]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][0] = "Total compras"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][8] = $rt->fields[7]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_pagada($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][0] = "Total compras"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][8] = $rt->fields[7]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_asentada($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][0] = "Total compras"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][8] = $rt->fields[7]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][0] = "Total compras"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['tot_geral'][4] = $rt->fields[3]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['contr_total_geral'] = "OK";
   } 

   //-----  idprov
   function quebra_idprov_proveedor($idprov, $arg_sum_idprov) 
   {
      global $tot_idprov;
      $tot_idprov = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq'])) 
      { 
         $nm_comando .= " where idprov" . $arg_sum_idprov ; 
      } 
      else 
      { 
         $nm_comando .= " and idprov" . $arg_sum_idprov ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idprov[0] = sc_strip_script($idprov) ; 
      $tot_idprov[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idprov[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idprov[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_idprov[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_idprov[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_idprov[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_idprov[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_idprov[8] = (string)$rt->fields[7]; 
      $rt->Close(); 
   } 

   //-----  total
   function quebra_total_total($total, $arg_sum_total) 
   {
      global $tot_total;
      $tot_total = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq'])) 
      { 
         $nm_comando .= " where total" . $arg_sum_total ; 
      } 
      else 
      { 
         $nm_comando .= " and total" . $arg_sum_total ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_total[0] = NM_encode_input(sc_strip_script($total)) ; 
      $tot_total[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_total[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_total[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_total[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_total[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_total[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_total[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_total[8] = (string)$rt->fields[7]; 
      $rt->Close(); 
   } 

   //-----  pagada
   function quebra_pagada_pagada($pagada, $arg_sum_pagada) 
   {
      global $tot_pagada;
      $tot_pagada = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq'])) 
      { 
         $nm_comando .= " where pagada" . $arg_sum_pagada ; 
      } 
      else 
      { 
         $nm_comando .= " and pagada" . $arg_sum_pagada ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_pagada[0] = sc_strip_script($pagada) ; 
      $tot_pagada[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_pagada[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_pagada[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_pagada[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_pagada[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_pagada[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_pagada[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_pagada[8] = (string)$rt->fields[7]; 
      $rt->Close(); 
   } 

   //-----  asentada
   function quebra_asentada_asentada($asentada, $arg_sum_asentada) 
   {
      global $tot_asentada;
      $tot_asentada = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(subtotal), sum(valoriva), sum(total), 0, 0, 0, 0 from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['reporte_compra']['where_pesq'])) 
      { 
         $nm_comando .= " where asentada" . $arg_sum_asentada ; 
      } 
      else 
      { 
         $nm_comando .= " and asentada" . $arg_sum_asentada ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_asentada[0] = NM_encode_input(sc_strip_script($asentada)) ; 
      $tot_asentada[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_asentada[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_asentada[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_asentada[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_asentada[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_asentada[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_asentada[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_asentada[8] = (string)$rt->fields[7]; 
      $rt->Close(); 
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
