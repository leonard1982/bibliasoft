<?php
class grid_cartera_090919_lookup
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
          $nm_comando = "SELECT documento + \" - \" + nombres + \" - \" + tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,\" - \", nombres, \" - \",tel_cel)  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&\" - \"&nombres&\" - \"&tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres||\" - \"||tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres||\" - \"||tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
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
   function lookup_resolucion(&$conteudo , $resolucion) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $resolucion; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($resolucion) === "" || trim($resolucion) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select prefijo from resdian where Idres = $resolucion order by prefijo" ; 
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
   function lookup_cliente_idcli(&$conteudo , $idcli) 
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
          $nm_comando = "SELECT documento + \" - \" + nombres + \" - \" + tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,\" - \", nombres, \" - \",tel_cel)  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&\" - \"&nombres&\" - \"&tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres||\" - \"||tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres||\" - \"||tel_cel  FROM terceros where idtercero = $idcli AND cliente='SI' order by documento, nombres, tel_cel" ; 
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
