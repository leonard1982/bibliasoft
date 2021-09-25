<?php
class grid_log_lookup
{
//  
   function lookup_periodo(&$periodo) 
   {
      $conteudo = "" ; 
      if ($periodo == "1")
      { 
          $conteudo = "ENERO";
      } 
      if ($periodo == "2")
      { 
          $conteudo = "FEBRERO";
      } 
      if ($periodo == "3")
      { 
          $conteudo = "MARZO";
      } 
      if ($periodo == "4")
      { 
          $conteudo = "ABRIL";
      } 
      if ($periodo == "5")
      { 
          $conteudo = "MAYO";
      } 
      if ($periodo == "6")
      { 
          $conteudo = "JUNIO";
      } 
      if ($periodo == "7")
      { 
          $conteudo = "JULIO";
      } 
      if ($periodo == "8")
      { 
          $conteudo = "AGOSTO";
      } 
      if ($periodo == "9")
      { 
          $conteudo = "SEPTIEMBRE";
      } 
      if ($periodo == "10")
      { 
          $conteudo = "OCTUBRE";
      } 
      if ($periodo == "11")
      { 
          $conteudo = "NOVIEMBRE";
      } 
      if ($periodo == "12")
      { 
          $conteudo = "DICIEMBRE";
      } 
      if (!empty($conteudo)) 
      { 
          $periodo = $conteudo; 
      } 
   }  
//  
   function lookup_usuario(&$conteudo , $usuario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $usuario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,' - ',nombres)  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&' - '&nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
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
   function lookup_sc_free_group_by_usuario(&$conteudo , $usuario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $usuario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;" || trim($usuario) === "" || trim($usuario) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,' - ',nombres)  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&' - '&nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $usuario order by documento, nombres" ; 
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
   function lookup_sc_free_group_by_periodo(&$periodo) 
   {
      $conteudo = "" ; 
      if ($periodo == "1")
      { 
          $conteudo = "ENERO";
      } 
      if ($periodo == "2")
      { 
          $conteudo = "FEBRERO";
      } 
      if ($periodo == "3")
      { 
          $conteudo = "MARZO";
      } 
      if ($periodo == "4")
      { 
          $conteudo = "ABRIL";
      } 
      if ($periodo == "5")
      { 
          $conteudo = "MAYO";
      } 
      if ($periodo == "6")
      { 
          $conteudo = "JUNIO";
      } 
      if ($periodo == "7")
      { 
          $conteudo = "JULIO";
      } 
      if ($periodo == "8")
      { 
          $conteudo = "AGOSTO";
      } 
      if ($periodo == "9")
      { 
          $conteudo = "SEPTIEMBRE";
      } 
      if ($periodo == "10")
      { 
          $conteudo = "OCTUBRE";
      } 
      if ($periodo == "11")
      { 
          $conteudo = "NOVIEMBRE";
      } 
      if ($periodo == "12")
      { 
          $conteudo = "DICIEMBRE";
      } 
      if (!empty($conteudo)) 
      { 
          $periodo = $conteudo; 
      } 
   }  
}
?>
