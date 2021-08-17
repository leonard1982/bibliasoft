<?php

class grid_pedidos_restaurante_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_pedidos_restaurante']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_pedidos_restaurante']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->numpedido = $Busca_temp['numpedido']; 
          $tmp_pos = strpos($this->numpedido, "##@@");
          if ($tmp_pos !== false && !is_array($this->numpedido))
          {
              $this->numpedido = substr($this->numpedido, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->nremision = $Busca_temp['nremision']; 
          $tmp_pos = strpos($this->nremision, "##@@");
          if ($tmp_pos !== false && !is_array($this->nremision))
          {
              $this->nremision = substr($this->nremision, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_prefijo($res_limit=false)
   {
      global $nada, $nm_lang , $idcli, $vendedor, $numfacven, $nremision, $prefijo_ped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_vendedor($res_limit=false)
   {
      global $nada, $nm_lang , $idcli, $vendedor, $numfacven, $nremision, $prefijo_ped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $idcli, $vendedor, $numfacven, $nremision, $prefijo_ped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['contr_total_geral'] = "OK";
   } 

   //-----  prefijo_ped
   function quebra_prefijo_ped_prefijo($prefijo_ped, $arg_sum_prefijo_ped) 
   {
      global $tot_prefijo_ped, $idcli, $vendedor, $numfacven, $nremision, $prefijo_ped;
      $tot_prefijo_ped = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq'])) 
      { 
         $nm_comando .= " where prefijo_ped" . $arg_sum_prefijo_ped ; 
      } 
      else 
      { 
         $nm_comando .= " and prefijo_ped" . $arg_sum_prefijo_ped ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_prefijo_ped[0] = NM_encode_input(sc_strip_script($prefijo_ped)) ; 
      $tot_prefijo_ped[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_prefijo_ped[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  vendedor
   function quebra_vendedor_vendedor($vendedor, $arg_sum_vendedor) 
   {
      global $tot_vendedor, $idcli, $vendedor, $numfacven, $nremision, $prefijo_ped;
      $tot_vendedor = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(total) from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' and p.asentada='0' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos_restaurante']['where_pesq'])) 
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
      $tot_vendedor[0] = NM_encode_input(sc_strip_script($vendedor)) ; 
      $tot_vendedor[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_vendedor[2] = (string)$rt->fields[1]; 
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
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_pedidos_restaurante']['contr_erro'] = 'on';
  
if(!empty($iddet))
{	
	if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

	
	$vsqldetalle = "select 
					cantidad,
					idpro,
					costop,
					valorpar,
					idbod,
					idpedid,
					unidadmayor,
					factor,
					(select p.fechaven from pedidos p where p.idpedido=idpedid) as fecha
					from 
					detallepedido
					where 
					iddet='".$iddet."'
					";
	
	 
      $nm_select = $vsqldetalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosDetalle = array();
      $this->vdatosdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatosdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosDetalle = false;
          $this->vDatosDetalle_erro = $this->Db->ErrorMsg();
          $this->vdatosdetalle = false;
          $this->vdatosdetalle_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vdatosdetalle[0][0]))
	{
		$vcantidad = $this->vdatosdetalle[0][0];
		$vidpro    = $this->vdatosdetalle[0][1];
		$vcosto    = $this->vdatosdetalle[0][2];
		$vvalorpar = $this->vdatosdetalle[0][3];
		$vidbod    = $this->vdatosdetalle[0][4];
		$vnumfac   = $this->vdatosdetalle[0][5];
		$vtipo     = $tipo;
		$vdetalle  = "Venta-Pedido";
		$vidmov    = 1;
		$vfecha    = $this->vdatosdetalle[0][8];
		$vunidadmayor = $this->vdatosdetalle[0][6];
		$vfactor   = $this->vdatosdetalle[0][7];
		
		if($vunidadmayor!="SI" and $vfactor > 0)
		{
			$vcantidad = $vcantidad/$vfactor;
		}
	}
	
	
	if($tipo==2)
	{
		$vsqlinv = "INSERT 
			  inventario 
			  SET 
			  fecha		   ='".$vfecha."', 
			  cantidad	   =(".$vcantidad."*-1), 
			  idpro		   ='".$vidpro."', 
			  costo		   ='".$vcosto."',
			  valorparcial ='".$vvalorpar."', 
			  idbod        ='".$vidbod."', 
			  tipo		   ='".$vtipo."', 
			  detalle	   ='".$vdetalle."', 
			  idmov		   ='".$vidmov."',
			  idped 	   ='".$vnumfac."', 
			  iddetalle	   ='".$iddet."'
			  ";

		
     $nm_select = $vsqlinv; 
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

		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen-$vcantidad
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
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
		
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,sum(cantidad) as cantidad,sum(precio) as precio from detallecombos where idcombo='".$vidpro."' group by idproducto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$sqlcostoprod = "select costomen from productos where idprod='".$vidpro2."'";
						 
      $nm_select = $sqlcostoprod; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vcostoprod = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vcostoprod[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vcostoprod = false;
          $this->vcostoprod_erro = $this->Db->ErrorMsg();
      } 
;
						
						if(isset($this->vcostoprod[0][0]))
						{
							$vsqlinv2 = "INSERT 
								  inventario 
								  SET 
								  fecha		   ='".$vfecha."', 
								  cantidad	   =(($vcantidad2*$vcantidad)*-1), 
								  idpro		   ='".$vidpro2."', 
								  costo		   ='".$this->vcostoprod[0][0]."',
								  valorparcial ='".$vprecio2."', 
								  idbod        ='".$vidbod."', 
								  tipo		   ='".$vtipo."', 
								  detalle	   ='".$vdetalle."', 
								  idmov		   ='".$vidmov."',
								  idped  	   ='".$vnumfac."', 
								  iddetalle	   ='".$iddet."',
								  idcombo      ='".$vidpro."'
								  ";

							
     $nm_select = $vsqlinv2; 
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

							$vsqlstock2="UPDATE 
								   productos 
								   SET 
								   stockmen = (stockmen-($vcantidad2*$vcantidad))
								   WHERE 
								   idprod='".$vidpro2."'
								   ";

							
     $nm_select = $vsqlstock2; 
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
							
						}
					}
				}
			}
		}
	}
	
	if($tipo==1)
	{
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,sum(cantidad) as cantidad,sum(precio) as precio from detallecombos where idcombo='".$vidpro."'  group by idproducto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$vsqlinv2="delete 
								  from 
								  inventario 
								  where 
									  idpro='".$vidpro2."' 
								  and idped='".$vnumfac."' 
								  and detalle like '%Venta%' 
								  and iddetalle='".$iddet."'
								  and idcombo='".$vidpro."'
								  ";

						
     $nm_select = $vsqlinv2; 
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

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen+($vcantidad*$vcantidad2) 
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
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
					}
				}
			}
		}
		
		
		$vsqlinv="delete 
				  from 
				  inventario 
				  where 
				      idpro='".$vidpro."' 
				  and idped='".$vnumfac."' 
				  and detalle like '%Venta%' 
				  and iddetalle='".$iddet."'
				  ";
		
		
     $nm_select = $vsqlinv; 
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
		
		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen+$vcantidad 
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
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
	}
	
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

}
$_SESSION['scriptcase']['grid_pedidos_restaurante']['contr_erro'] = 'off';
}
}

?>
