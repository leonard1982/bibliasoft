<?php

class grid_facturaven_210421_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_fecha($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_fecha();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_vencimiento($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_vencimiento();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_credito($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_credito();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_vendedor($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_vendedor();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_prefijo($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_prefijo();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_tipo($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral_tipo();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $idfacven, $resolucion, $idcli, $vendedor;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      if ($rt->fields[0] == 0)
      { 
          if (!isset($Contrl_Interat) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_filtro']) && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq_fast']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search']))
          {
              $Contrl_Interat = 1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_sem_interativ'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['interativ_search'] = array();
              $this->quebra_geral__NM_SC_();
          }
          
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][0] = "Total venta"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][5] = $rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $rt->fields[5] = (string)$rt->fields[5]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][6] = $rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $rt->fields[6] = (string)$rt->fields[6]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][7] = $rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $rt->fields[7] = (string)$rt->fields[7]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][8] = $rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $rt->fields[8] = (string)$rt->fields[8]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['tot_geral'][9] = $rt->fields[8]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['contr_total_geral'] = "OK";
   } 

   //-----  fechaven
   function quebra_fechaven_fecha($fechaven, $arg_sum_fechaven) 
   {
      global $tot_fechaven, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_fechaven = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fechaven . $arg_sum_fechaven ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fechaven . $arg_sum_fechaven ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fechaven[0] = NM_encode_input(sc_strip_script($fechaven)) ; 
      $tot_fechaven[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fechaven[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_fechaven[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_fechaven[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_fechaven[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_fechaven[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_fechaven[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_fechaven[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_fechaven[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 

   //-----  fechavenc
   function quebra_fechavenc_vencimiento($fechavenc, $arg_sum_fechavenc) 
   {
      global $tot_fechavenc, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_fechavenc = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fechavenc . $arg_sum_fechavenc ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fechavenc . $arg_sum_fechavenc ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fechavenc[0] = NM_encode_input(sc_strip_script($fechavenc)) ; 
      $tot_fechavenc[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fechavenc[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_fechavenc[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_fechavenc[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_fechavenc[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_fechavenc[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_fechavenc[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_fechavenc[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_fechavenc[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 

   //-----  credito
   function quebra_credito_credito($credito, $arg_sum_credito) 
   {
      global $tot_credito, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_credito = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where credito" . $arg_sum_credito ; 
      } 
      else 
      { 
         $nm_comando .= " and credito" . $arg_sum_credito ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_credito[0] = NM_encode_input(sc_strip_script($credito)) ; 
      $tot_credito[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_credito[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_credito[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_credito[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_credito[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_credito[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_credito[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_credito[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_credito[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 

   //-----  vendedor
   function quebra_vendedor_vendedor($vendedor, $arg_sum_vendedor) 
   {
      global $tot_vendedor, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_vendedor = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where vendedor" . $arg_sum_vendedor ; 
      } 
      else 
      { 
         $nm_comando .= " and vendedor" . $arg_sum_vendedor ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_vendedor[0] = sc_strip_script($vendedor) ; 
      $tot_vendedor[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_vendedor[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_vendedor[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_vendedor[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_vendedor[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_vendedor[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_vendedor[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_vendedor[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_vendedor[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 

   //-----  resolucion
   function quebra_resolucion_prefijo($resolucion, $arg_sum_resolucion) 
   {
      global $tot_resolucion, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_resolucion = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where resolucion" . $arg_sum_resolucion ; 
      } 
      else 
      { 
         $nm_comando .= " and resolucion" . $arg_sum_resolucion ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_resolucion[0] = sc_strip_script($resolucion) ; 
      $tot_resolucion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_resolucion[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_resolucion[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_resolucion[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_resolucion[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_resolucion[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_resolucion[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_resolucion[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_resolucion[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 

   //-----  tipo
   function quebra_tipo_tipo($tipo, $arg_sum_tipo) 
   {
      global $tot_tipo, $idfacven, $resolucion, $idcli, $vendedor;
      $tot_tipo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento) from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'])) 
      { 
         $nm_comando .= " where tipo" . $arg_sum_tipo ; 
      } 
      else 
      { 
         $nm_comando .= " and tipo" . $arg_sum_tipo ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_tipo[0] = sc_strip_script($tipo) ; 
      $tot_tipo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tipo[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_tipo[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_tipo[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_tipo[5] = (string)$rt->fields[4]; 
      $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
      $tot_tipo[6] = (string)$rt->fields[5]; 
      $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
      $tot_tipo[7] = (string)$rt->fields[6]; 
      $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
      $tot_tipo[8] = (string)$rt->fields[7]; 
      $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
      $tot_tipo[9] = (string)$rt->fields[8]; 
      $rt->Close(); 
   } 


   //----- 
   function Calc_resumo_fecha($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fechaven' => "fechaven");
      $cmps_quebra_atual = array("fechaven");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_fecha($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_fecha($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['fechaven']['reg'] = "S";
      $format_dimensions['fechaven']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'fecha', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_fecha($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_vencimiento($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fechavenc' => "fechavenc");
      $cmps_quebra_atual = array("fechavenc");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_vencimiento($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_vencimiento($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['fechavenc']['reg'] = "S";
      $format_dimensions['fechavenc']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'vencimiento', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_vencimiento($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_credito($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('credito' => "credito");
      $cmps_quebra_atual = array("credito");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_credito($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_credito($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['credito']['reg'] = "S";
      $format_dimensions['credito']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'credito', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "credito") {
                  $this->Lookup->lookup_credito_credito($$Cada_dim); 
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_credito($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_vendedor($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('vendedor' => "vendedor");
      $cmps_quebra_atual = array("vendedor");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_vendedor($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_vendedor($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['vendedor']['reg'] = "S";
      $format_dimensions['vendedor']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'vendedor', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "vendedor") {
                  $this->Lookup->lookup_vendedor_vendedor($$Cada_dim,  $vendedor);
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_vendedor($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_prefijo($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('resolucion' => "resolucion");
      $cmps_quebra_atual = array("resolucion");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_prefijo($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_prefijo($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['resolucion']['reg'] = "S";
      $format_dimensions['resolucion']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'prefijo', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "resolucion") {
                  $this->Lookup->lookup_prefijo_resolucion($$Cada_dim,  $resolucion);
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_prefijo($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_tipo($destino_resumo)
   {
      global $nm_lang, $tipo_doc, $imprimir, $imprmirtirilla, $print, $enviarfe, $estadofe, $pdf, $idfacven, $resolucion, $idcli, $vendedor;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('tipo' => "tipo");
      $cmps_quebra_atual = array("tipo");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 9;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_tipo($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_tipo($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idfacven' => 'N','numfacven' => 'N','credito' => 'N','idcli' => 'N','subtotal' => 'N','valoriva' => 'N','total' => 'N','asentada' => 'N','saldo' => 'N','adicional' => 'N','adicional2' => 'N','adicional3' => 'N','vendedor' => 'N','pedido' => 'N','resolucion' => 'N','base_iva_19' => 'N','valor_iva_19' => 'N','base_iva_5' => 'N','valor_iva_5' => 'N','excento' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(total), sum(subtotal), sum(valoriva), sum(base_iva_19), sum(valor_iva_19), sum(base_iva_5), sum(valor_iva_5), sum(excento)#@#cmps_quebras#@# from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2), sum(SC_metric3), sum(SC_metric4), sum(SC_metric5), sum(SC_metric6), sum(SC_metric7), sum(SC_metric8)#@#cmps_quebras#@# from (";
         $comando .= "select total as SC_metric1,subtotal as SC_metric2,valoriva as SC_metric3,base_iva_19 as SC_metric4,valor_iva_19 as SC_metric5,base_iva_5 as SC_metric6,valor_iva_5 as SC_metric7,excento as SC_metric8, " . $cmps_quebras1 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento,    tipo FROM      facturaven WHERE     numfacven!=0 ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_210421']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['tipo']['reg'] = "S";
      $format_dimensions['tipo']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'tipo', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "tipo") {
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_tipo($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 0);
          $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
          $rt->fields[2] = (strpos(strtolower($rt->fields[2]), "e")) ? (float)$rt->fields[2] : $rt->fields[2]; 
          $rt->fields[2] = (string)$rt->fields[2];
          if ($rt->fields[2] == "") 
          {
              $rt->fields[2] = 0;
          }
          if (substr($rt->fields[2], 0, 1) == ".") 
          {
              $rt->fields[2] = "0" . $rt->fields[2];
          }
          if (substr($rt->fields[2], 0, 2) == "-.") 
          {
              $rt->fields[2] = "-0" . substr($rt->fields[2], 1);
          }
          nmgp_Trunc_Num($rt->fields[2], 2);
          $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
          $rt->fields[3] = (strpos(strtolower($rt->fields[3]), "e")) ? (float)$rt->fields[3] : $rt->fields[3]; 
          $rt->fields[3] = (string)$rt->fields[3];
          if ($rt->fields[3] == "") 
          {
              $rt->fields[3] = 0;
          }
          if (substr($rt->fields[3], 0, 1) == ".") 
          {
              $rt->fields[3] = "0" . $rt->fields[3];
          }
          if (substr($rt->fields[3], 0, 2) == "-.") 
          {
              $rt->fields[3] = "-0" . substr($rt->fields[3], 1);
          }
          nmgp_Trunc_Num($rt->fields[3], 2);
          $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
          $rt->fields[4] = (strpos(strtolower($rt->fields[4]), "e")) ? (float)$rt->fields[4] : $rt->fields[4]; 
          $rt->fields[4] = (string)$rt->fields[4];
          if ($rt->fields[4] == "") 
          {
              $rt->fields[4] = 0;
          }
          if (substr($rt->fields[4], 0, 1) == ".") 
          {
              $rt->fields[4] = "0" . $rt->fields[4];
          }
          if (substr($rt->fields[4], 0, 2) == "-.") 
          {
              $rt->fields[4] = "-0" . substr($rt->fields[4], 1);
          }
          nmgp_Trunc_Num($rt->fields[4], 0);
          $rt->fields[5] = str_replace(",", ".", $rt->fields[5]);
          $rt->fields[5] = (strpos(strtolower($rt->fields[5]), "e")) ? (float)$rt->fields[5] : $rt->fields[5]; 
          $rt->fields[5] = (string)$rt->fields[5];
          if ($rt->fields[5] == "") 
          {
              $rt->fields[5] = 0;
          }
          if (substr($rt->fields[5], 0, 1) == ".") 
          {
              $rt->fields[5] = "0" . $rt->fields[5];
          }
          if (substr($rt->fields[5], 0, 2) == "-.") 
          {
              $rt->fields[5] = "-0" . substr($rt->fields[5], 1);
          }
          nmgp_Trunc_Num($rt->fields[5], 0);
          $rt->fields[6] = str_replace(",", ".", $rt->fields[6]);
          $rt->fields[6] = (strpos(strtolower($rt->fields[6]), "e")) ? (float)$rt->fields[6] : $rt->fields[6]; 
          $rt->fields[6] = (string)$rt->fields[6];
          if ($rt->fields[6] == "") 
          {
              $rt->fields[6] = 0;
          }
          if (substr($rt->fields[6], 0, 1) == ".") 
          {
              $rt->fields[6] = "0" . $rt->fields[6];
          }
          if (substr($rt->fields[6], 0, 2) == "-.") 
          {
              $rt->fields[6] = "-0" . substr($rt->fields[6], 1);
          }
          nmgp_Trunc_Num($rt->fields[6], 0);
          $rt->fields[7] = str_replace(",", ".", $rt->fields[7]);
          $rt->fields[7] = (strpos(strtolower($rt->fields[7]), "e")) ? (float)$rt->fields[7] : $rt->fields[7]; 
          $rt->fields[7] = (string)$rt->fields[7];
          if ($rt->fields[7] == "") 
          {
              $rt->fields[7] = 0;
          }
          if (substr($rt->fields[7], 0, 1) == ".") 
          {
              $rt->fields[7] = "0" . $rt->fields[7];
          }
          if (substr($rt->fields[7], 0, 2) == "-.") 
          {
              $rt->fields[7] = "-0" . substr($rt->fields[7], 1);
          }
          nmgp_Trunc_Num($rt->fields[7], 0);
          $rt->fields[8] = str_replace(",", ".", $rt->fields[8]);
          $rt->fields[8] = (strpos(strtolower($rt->fields[8]), "e")) ? (float)$rt->fields[8] : $rt->fields[8]; 
          $rt->fields[8] = (string)$rt->fields[8];
          if ($rt->fields[8] == "") 
          {
              $rt->fields[8] = 0;
          }
          if (substr($rt->fields[8], 0, 1) == ".") 
          {
              $rt->fields[8] = "0" . $rt->fields[8];
          }
          if (substr($rt->fields[8], 0, 2) == "-.") 
          {
              $rt->fields[8] = "-0" . substr($rt->fields[8], 1);
          }
          nmgp_Trunc_Num($rt->fields[8], 0);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[3] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[4] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[6]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[5] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[7]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[6] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[8]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[7] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[9]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[8] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[10]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[11]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
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
