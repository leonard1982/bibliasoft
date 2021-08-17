<?php
class grid_ventas_lookup
{
//  
   function lookup_idcli(&$conteudo , $idcli) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idcli; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;" || trim($idcli) === "" || trim($idcli) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT nombres + \"- \" + documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(nombres, \"- \",documento)  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT nombres&\"- \"&documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT nombres||\"- \"||documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT nombres + \"- \" + documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT nombres||\"- \"||documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT nombres||\"- \"||documento  FROM terceros where idtercero = $idcli order by nombres, documento" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_asentada(&$asentada) 
   {
      $conteudo = "" ; 
      if ($asentada == "0")
      { 
          $conteudo = "NO";
      } 
      if ($asentada == "1")
      { 
          $conteudo = "SI";
      } 
      if (!empty($conteudo)) 
      { 
          $asentada = $conteudo; 
      } 
   }  
//  
   function lookup_credito(&$credito) 
   {
      $conteudo = "" ; 
      if ($credito == "1")
      { 
          $conteudo = "SI";
      } 
      if ($credito == "2")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $credito = $conteudo; 
      } 
   }  
//  
   function lookup_vendedor(&$conteudo , $vendedor) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $vendedor; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT nombres + \" -  \" + documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(nombres, \" -  \",documento)  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT nombres&\" -  \"&documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT nombres + \" -  \" + documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_credito_credito(&$credito) 
   {
      $conteudo = "" ; 
      if ($credito == "1")
      { 
          $conteudo = "SI";
      } 
      if ($credito == "2")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $credito = $conteudo; 
      } 
   }  
//  
   function lookup_vendedor_vendedor(&$conteudo , $vendedor) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $vendedor; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;" || trim($vendedor) === "" || trim($vendedor) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT nombres + \" -  \" + documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(nombres, \" -  \",documento)  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT nombres&\" -  \"&documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT nombres + \" -  \" + documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT nombres||\" -  \"||documento  FROM terceros where idtercero = $vendedor order by documento, nombres" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
