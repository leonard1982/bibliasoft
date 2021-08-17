<?php

class grid_inventario_final_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_inventario_final']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_inventario_final']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_articulos($res_limit=false)
   {
      global $nada, $nm_lang , $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_porgrupo($res_limit=false)
   {
      global $nada, $nm_lang , $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_porbodega($res_limit=false)
   {
      global $nada, $nm_lang , $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['contr_total_geral'] = "OK";
   } 

   //-----  idpro
   function quebra_idpro_articulos($idpro, $arg_sum_idpro) 
   {
      global $tot_idpro, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $tot_idpro = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'])) 
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
   function quebra_grupo_porgrupo($grupo, $arg_sum_grupo) 
   {
      global $tot_grupo, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $tot_grupo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'])) 
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

   //-----  idbod
   function quebra_idbod_porbodega($idbod, $arg_sum_idbod) 
   {
      global $tot_idbod, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $tot_idbod = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad), sum(costoinv) from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'])) 
      { 
         $nm_comando .= " where idbod" . $arg_sum_idbod ; 
      } 
      else 
      { 
         $nm_comando .= " and idbod" . $arg_sum_idbod ; 
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


   //----- 
   function Calc_resumo_articulos($destino_resumo)
   {
      global $nm_lang, $presentacion, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['SC_Ind_Groupby'];
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
          $this->Res_Totaliza_articulos($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_articulos($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','costo' => 'N','valorparcial' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','grupo' => 'N','costoinv' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']))
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
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'articulos', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "idpro") {
                  $this->Lookup->lookup_articulos_idpro($$Cada_dim,  $idpro);
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
              $vl_statistic = $this->Calc_statist_manual_articulos($where_ok);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_porgrupo($destino_resumo)
   {
      global $nm_lang, $presentacion, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['SC_Ind_Groupby'];
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
          $this->Res_Totaliza_porgrupo($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_porgrupo($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','costo' => 'N','valorparcial' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','grupo' => 'N','costoinv' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']))
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
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'porgrupo', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "grupo") {
                  $this->Lookup->lookup_porgrupo_grupo($$Cada_dim,  $grupo);
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
              $vl_statistic = $this->Calc_statist_manual_porgrupo($where_ok);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_porbodega($destino_resumo)
   {
      global $nm_lang, $presentacion, $grupo, $colores, $tallas, $sabor, $idbod, $idpro;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false && !is_array($this->cantidad))
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $this->idbod = $Busca_temp['idbod']; 
          $tmp_pos = strpos($this->idbod, "##@@");
          if ($tmp_pos !== false && !is_array($this->idbod))
          {
              $this->idbod = substr($this->idbod, 0, $tmp_pos);
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('idbod' => "idbod");
      $cmps_quebra_atual = array("idbod");
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
          $this->Res_Totaliza_porbodega($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_porbodega($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idinv' => 'N','cantidad' => 'N','idpro' => 'N','costo' => 'N','valorparcial' => 'N','idbod' => 'N','tipo' => 'N','idmov' => 'N','idfaccom' => 'N','nufacvta' => 'N','colores' => 'N','tallas' => 'N','sabor' => 'N','grupo' => 'N','costoinv' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad), sum(costoinv)#@#cmps_quebras#@# from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1), sum(SC_metric2)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1,costoinv as SC_metric2, " . $cmps_quebras1 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idinv,     fecha,     cantidad,     idpro,     costo,     valorparcial,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     (select p.codigobar from productos p where p.idprod=idpro) as codigobar,     (select p.nompro from productos p where p.idprod=idpro) as nompro,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (costo*cantidad) as costoinv FROM      inventario GROUP BY idpro, idbod, colores, tallas, sabor) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_final']['Res_search_metric_use']))
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
      $format_dimensions['idbod']['reg'] = "S";
      $format_dimensions['idbod']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'porbodega', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "idbod") {
                  $this->Lookup->lookup_porbodega_idbod($$Cada_dim,  $idbod);
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
              $vl_statistic = $this->Calc_statist_manual_porbodega($where_ok);
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
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[2] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
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
function consulta()
{
$_SESSION['scriptcase']['grid_inventario_final']['contr_erro'] = 'on';
  
$sql="select unidmaymen, unimay, unimen from productos where idprod=$this->idpro ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;

if(($this->ds[0][0])=='SI')
	{
	$this->presentacion =$this->ds[0][1];
	}
else
	{
	$this->presentacion =$this->ds[0][2];
	}
$_SESSION['scriptcase']['grid_inventario_final']['contr_erro'] = 'off';
}
}

?>
