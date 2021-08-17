<?php
class grid_comprobantes_detalle_lookup
{
//  
   function lookup_plan_cuenta(&$conteudo , $plan_cuenta) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $plan_cuenta; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT codigo + ' - ' + nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(codigo,' - ',nombre)  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT codigo&' - '&nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT codigo||' - '||nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT codigo + ' - ' + nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT codigo||' - '||nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT codigo||' - '||nombre  FROM plancuentas where codigo = '" . substr($this->Db->qstr($plan_cuenta), 1 , -1) . "' order by codigo, nombre" ; 
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
   function lookup_tipo(&$tipo) 
   {
      $conteudo = "" ; 
      if ($tipo == "debito")
      { 
          $conteudo = "Debe";
      } 
      if ($tipo == "credito")
      { 
          $conteudo = "Haber";
      } 
      if (!empty($conteudo)) 
      { 
          $tipo = $conteudo; 
      } 
   }  
//  
   function lookup_tercero(&$conteudo , $tercero) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $tercero; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;" || trim($tercero) === "" || trim($tercero) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,' - ',nombres)  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&' - '&nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||' - '||nombres  FROM terceros where idtercero = $tercero order by documento, nombres" ; 
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
