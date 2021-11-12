<?php

class grid_inventario_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_fecha($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_ubicacion($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_producto($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_grupofamilia($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['contr_total_geral'] = "OK";
   } 

   //-----  fecha
   function quebra_fecha_fecha($fecha, $arg_sum_fecha) 
   {
      global $tot_fecha, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fecha . $arg_sum_fecha ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fecha . $arg_sum_fecha ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fecha[0] = NM_encode_input(sc_strip_script($fecha)) ; 
      $tot_fecha[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_fecha[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  idpro
   function quebra_idpro_ubicacion($idpro, $arg_sum_idpro) 
   {
      global $tot_idpro, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idpro = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where idpro" . $arg_sum_idpro ; 
      } 
      else 
      { 
         $nm_comando .= " and idpro" . $arg_sum_idpro ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idpro[0] = sc_strip_script($idpro) ; 
      $tot_idpro[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idpro[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idpro[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  idbod
   function quebra_idbod_ubicacion($idpro, $idbod, $arg_sum_idpro, $arg_sum_idbod) 
   {
      global $tot_idbod, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idbod = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where idpro" . $arg_sum_idpro . " and idbod" . $arg_sum_idbod ; 
      } 
      else 
      { 
         $nm_comando .= " and idpro" . $arg_sum_idpro . " and idbod" . $arg_sum_idbod ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idbod[0] = NM_encode_input(sc_strip_script($idbod)) ; 
      $tot_idbod[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idbod[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idbod[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  fecha
   function quebra_fecha_sc_free_group_by($fecha, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fecha[0] = NM_encode_input(sc_strip_script($fecha)) ; 
      $tot_fecha[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_fecha[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_fecha;
   } 

   //-----  idpro
   function quebra_idpro_sc_free_group_by($idpro, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idpro = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idpro[0] = sc_strip_script($idpro) ; 
      $tot_idpro[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idpro[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idpro[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_idpro;
   } 

   //-----  idbod
   function quebra_idbod_sc_free_group_by($idbod, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idbod = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idbod[0] = NM_encode_input(sc_strip_script($idbod)) ; 
      $tot_idbod[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idbod[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idbod[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_idbod;
   } 

   //-----  tipo
   function quebra_tipo_sc_free_group_by($tipo, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_tipo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_tipo[0] = NM_encode_input(sc_strip_script($tipo)) ; 
      $tot_tipo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tipo[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_tipo[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_tipo;
   } 

   //-----  detalle
   function quebra_detalle_sc_free_group_by($detalle, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_detalle = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_detalle[0] = sc_strip_script($detalle) ; 
      $tot_detalle[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_detalle[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_detalle[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_detalle;
   } 

   //-----  colores
   function quebra_colores_sc_free_group_by($colores, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_colores = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_colores[0] = sc_strip_script($colores) ; 
      $tot_colores[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_colores[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_colores[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_colores;
   } 

   //-----  tallas
   function quebra_tallas_sc_free_group_by($tallas, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_tallas = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_tallas[0] = sc_strip_script($tallas) ; 
      $tot_tallas[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tallas[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_tallas[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_tallas;
   } 

   //-----  sabor
   function quebra_sabor_sc_free_group_by($sabor, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_sabor = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_sabor[0] = sc_strip_script($sabor) ; 
      $tot_sabor[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_sabor[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_sabor[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_sabor;
   } 

   //-----  idcombo
   function quebra_idcombo_sc_free_group_by($idcombo, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idcombo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idcombo[0] = NM_encode_input(sc_strip_script($idcombo)) ; 
      $tot_idcombo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idcombo[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idcombo[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_idcombo;
   } 

   //-----  grupo
   function quebra_grupo_sc_free_group_by($grupo, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_grupo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_grupo[0] = NM_encode_input(sc_strip_script($grupo)) ; 
      $tot_grupo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_grupo[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_grupo[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_grupo;
   } 

   //-----  idpro
   function quebra_idpro_producto($idpro, $arg_sum_idpro) 
   {
      global $tot_idpro, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_idpro = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where idpro" . $arg_sum_idpro ; 
      } 
      else 
      { 
         $nm_comando .= " and idpro" . $arg_sum_idpro ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idpro[0] = sc_strip_script($idpro) ; 
      $tot_idpro[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idpro[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_idpro[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 

   //-----  grupo
   function quebra_grupo_grupofamilia($grupo, $arg_sum_grupo) 
   {
      global $tot_grupo, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $tot_grupo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(valorparcial) from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'])) 
      { 
         $nm_comando .= " where grupo" . $arg_sum_grupo ; 
      } 
      else 
      { 
         $nm_comando .= " and grupo" . $arg_sum_grupo ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_grupo[0] = NM_encode_input(sc_strip_script($grupo)) ; 
      $tot_grupo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_grupo[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_grupo[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 


   //----- 
   function Calc_resumo_fecha($destino_resumo)
   {
      global $nm_lang, $documento, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fecha' => "fecha");
      $cmps_quebra_atual = array("fecha");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
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
      $ind_cmps  = 3;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_fecha($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','costo' => 'N','valorparcial' => 'N','idcombo' => 'N','grupo' => 'N','idped' => 'N','tarifa' => 'N','base' => 'N','utilidad' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']))
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
      $format_dimensions['fecha']['reg'] = "S";
      $format_dimensions['fecha']['msk'] = "";
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
          nmgp_Trunc_Num($rt->fields[1], 3);
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
          nmgp_Trunc_Num($rt->fields[2], 0);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_ubicacion($destino_resumo)
   {
      global $nm_lang, $documento, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('idpro' => "idpro",'idbod' => "idbod");
      $cmps_quebra_atual = array("idpro","idbod");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
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
      $ind_cmps  = 3;
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
          $this->Res_Totaliza_ubicacion($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_ubicacion($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','costo' => 'N','valorparcial' => 'N','idcombo' => 'N','grupo' => 'N','idped' => 'N','tarifa' => 'N','base' => 'N','utilidad' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']))
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
      $format_dimensions['idpro']['reg'] = "S";
      $format_dimensions['idpro']['msk'] = "";
      $format_dimensions['idbod']['reg'] = "S";
      $format_dimensions['idbod']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'ubicacion', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "idpro") {
                  $this->Lookup->lookup_ubicacion_idpro($$Cada_dim,  $idpro);
              }
              if ($Cada_dim == "idbod") {
                  $this->Lookup->lookup_ubicacion_idbod($$Cada_dim,  $idbod);
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
              $vl_statistic = $this->Calc_statist_manual_ubicacion($where_ok);
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
          nmgp_Trunc_Num($rt->fields[1], 3);
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
          nmgp_Trunc_Num($rt->fields[2], 0);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_sc_free_group_by($destino_resumo)
   {
      global $nm_lang, $documento, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fecha' => "fecha",'idpro' => "idpro",'idbod' => "idbod",'tipo' => "tipo",'detalle' => "detalle",'colores' => "colores",'tallas' => "tallas",'sabor' => "sabor",'idcombo' => "idcombo",'grupo' => "grupo");
      $cmps_quebra_atual = array();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Gb_Free_cmp'] as $cmp => $resto)
      {
          $cmps_quebra_atual[] = $cmp;
      }
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
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
      $ind_cmps  = 3;
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
          $this->Res_Totaliza_sc_free_group_by($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_sc_free_group_by($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','costo' => 'N','valorparcial' => 'N','idcombo' => 'N','grupo' => 'N','idped' => 'N','tarifa' => 'N','base' => 'N','utilidad' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']))
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
      $format_dimensions['fecha']['reg'] = "S";
      $format_dimensions['fecha']['msk'] = "";
      $format_dimensions['idpro']['reg'] = "S";
      $format_dimensions['idpro']['msk'] = "";
      $format_dimensions['idbod']['reg'] = "S";
      $format_dimensions['idbod']['msk'] = "";
      $format_dimensions['tipo']['reg'] = "S";
      $format_dimensions['tipo']['msk'] = "";
      $format_dimensions['detalle']['reg'] = "S";
      $format_dimensions['detalle']['msk'] = "";
      $format_dimensions['colores']['reg'] = "S";
      $format_dimensions['colores']['msk'] = "";
      $format_dimensions['tallas']['reg'] = "S";
      $format_dimensions['tallas']['msk'] = "";
      $format_dimensions['sabor']['reg'] = "S";
      $format_dimensions['sabor']['msk'] = "";
      $format_dimensions['idcombo']['reg'] = "S";
      $format_dimensions['idcombo']['msk'] = "";
      $format_dimensions['grupo']['reg'] = "S";
      $format_dimensions['grupo']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'sc_free_group_by', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "idpro") {
                  $this->Lookup->lookup_sc_free_group_by_idpro($$Cada_dim,  $idpro);
              }
              if ($Cada_dim == "idbod") {
                  $this->Lookup->lookup_sc_free_group_by_idbod($$Cada_dim,  $idbod);
              }
              if ($Cada_dim == "tipo") {
                  $this->Lookup->lookup_sc_free_group_by_tipo($$Cada_dim); 
              }
              if ($Cada_dim == "detalle") {
              }
              if ($Cada_dim == "colores") {
                  $this->Lookup->lookup_sc_free_group_by_colores($$Cada_dim,  $colores);
              }
              if ($Cada_dim == "tallas") {
                  $this->Lookup->lookup_sc_free_group_by_tallas($$Cada_dim,  $tallas);
              }
              if ($Cada_dim == "sabor") {
                  $this->Lookup->lookup_sc_free_group_by_sabor($$Cada_dim,  $sabor);
              }
              if ($Cada_dim == "idcombo") {
                  $this->Lookup->lookup_sc_free_group_by_idcombo($$Cada_dim,  $idcombo);
              }
              if ($Cada_dim == "grupo") {
                  $this->Lookup->lookup_sc_free_group_by_grupo($$Cada_dim,  $grupo);
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
              $vl_statistic = $this->Calc_statist_manual_sc_free_group_by($where_ok);
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
          nmgp_Trunc_Num($rt->fields[1], 3);
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
          nmgp_Trunc_Num($rt->fields[2], 0);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_producto($destino_resumo)
   {
      global $nm_lang, $documento, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('idpro' => "idpro");
      $cmps_quebra_atual = array("idpro");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
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
      $ind_cmps  = 3;
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
          $this->Res_Totaliza_producto($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_producto($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','costo' => 'N','valorparcial' => 'N','idcombo' => 'N','grupo' => 'N','idped' => 'N','tarifa' => 'N','base' => 'N','utilidad' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']))
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
      $format_dimensions['idpro']['reg'] = "S";
      $format_dimensions['idpro']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'producto', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "idpro") {
                  $this->Lookup->lookup_producto_idpro($$Cada_dim,  $idpro);
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
              $vl_statistic = $this->Calc_statist_manual_producto($where_ok);
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
          nmgp_Trunc_Num($rt->fields[1], 3);
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
          nmgp_Trunc_Num($rt->fields[2], 0);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_grupofamilia($destino_resumo)
   {
      global $nm_lang, $documento, $idpro, $idcombo, $idbod, $colores, $tallas, $sabor, $grupo, $idped;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idpro = $Busca_temp['idpro']; 
          $tmp_pos = strpos($this->idpro, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro))
          {
              $this->idpro = substr($this->idpro, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->idcombo = $Busca_temp['idcombo']; 
          $tmp_pos = strpos($this->idcombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcombo))
          {
              $this->idcombo = substr($this->idcombo, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->inicio = $Busca_temp['inicio']; 
          $tmp_pos = strpos($this->inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->inicio))
          {
              $this->inicio = substr($this->inicio, 0, $tmp_pos);
          }
          $this->fin = $Busca_temp['fin']; 
          $tmp_pos = strpos($this->fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->fin))
          {
              $this->fin = substr($this->fin, 0, $tmp_pos);
          }
          $this->fechavenc = $Busca_temp['fechavenc']; 
          $tmp_pos = strpos($this->fechavenc, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechavenc))
          {
              $this->fechavenc = substr($this->fechavenc, 0, $tmp_pos);
          }
          $this->fechavenc_2 = $Busca_temp['fechavenc_input_2']; 
          $this->lote2 = $Busca_temp['lote2']; 
          $tmp_pos = strpos($this->lote2, "##@@");
          if ($tmp_pos !== false && !is_array($this->lote2))
          {
              $this->lote2 = substr($this->lote2, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('grupo' => "grupo");
      $cmps_quebra_atual = array("grupo");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 3;
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
      $ind_cmps  = 3;
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
          $this->Res_Totaliza_grupofamilia($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_grupofamilia($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','costo' => 'N','valorparcial' => 'N','idcombo' => 'N','grupo' => 'N','idped' => 'N','tarifa' => 'N','base' => 'N','utilidad' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(valorparcial)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,valorparcial as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2,     (select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro)) as tarifa,    (round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) as base,    ((round(valorparcial/(((select i.trifa from iva i where i.idiva=(select p.idiva from productos p where p.idprod=idpro))/100)+1), 2)) + (costo*cantidad)) as utilidad FROM      inventario ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario']['Res_search_metric_use']))
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
      $format_dimensions['grupo']['reg'] = "S";
      $format_dimensions['grupo']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'grupofamilia', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "grupo") {
                  $this->Lookup->lookup_grupofamilia_grupo($$Cada_dim,  $grupo);
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
              $vl_statistic = $this->Calc_statist_manual_grupofamilia($where_ok);
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
          nmgp_Trunc_Num($rt->fields[1], 3);
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
          nmgp_Trunc_Num($rt->fields[2], 0);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[5]";
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
