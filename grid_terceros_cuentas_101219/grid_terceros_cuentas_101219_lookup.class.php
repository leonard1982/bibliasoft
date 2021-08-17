<?php
class grid_terceros_cuentas_101219_lookup
{
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
      if (trim($tercero) === "" || trim($tercero) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $tercero order by documento, nombres" ; 
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
   function lookup_ie(&$ie) 
   {
      $conteudo = "" ; 
      if ($ie == "INGRESO")
      { 
          $conteudo = "I";
      } 
      if ($ie == "EGRESO")
      { 
          $conteudo = "E";
      } 
      if (!empty($conteudo)) 
      { 
          $ie = $conteudo; 
      } 
   }  
//  
   function lookup_tipo(&$tipo) 
   {
      $conteudo = "" ; 
      if ($tipo == "FV")
      { 
          $conteudo = "VENTA";
      } 
      if ($tipo == "RS")
      { 
          $conteudo = "REMISION";
      } 
      if ($tipo == "FC")
      { 
          $conteudo = "COMPRA";
      } 
      if ($tipo == "CE")
      { 
          $conteudo = "EGRESO";
      } 
      if ($tipo == "RC")
      { 
          $conteudo = "RECIBO";
      } 
      if ($tipo == "IG")
      { 
          $conteudo = "INGRESO GENERAL";
      } 
      if ($tipo == "EG")
      { 
          $conteudo = "EGRESO GENERAL";
      } 
      if (!empty($conteudo)) 
      { 
          $tipo = $conteudo; 
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
      $nm_comando = "select nombres from terceros where idtercero = '$usuario' order by nombres" ; 
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
