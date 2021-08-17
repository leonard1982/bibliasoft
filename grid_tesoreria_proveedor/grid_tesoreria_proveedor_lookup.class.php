<?php
class grid_tesoreria_proveedor_lookup
{
//  
   function lookup_idprov(&$conteudo , $idprov) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idprov; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;" || trim($idprov) === "" || trim($idprov) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT nombres + \" - \" + documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(nombres, \" - \",documento)  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT nombres&\" - \"&documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT nombres||\" - \"||documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT nombres + \" - \" + documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT nombres||\" - \"||documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT nombres||\" - \"||documento  FROM terceros where idtercero = $idprov order by nombres, documento" ; 
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
