<?php
class grid_log_pedidos_borrados_lookup
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
   function lookup_mesa_cliente(&$conteudo , $mesa_cliente) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $mesa_cliente; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($mesa_cliente) === "" || trim($mesa_cliente) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $mesa_cliente order by nombres" ; 
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
      if (trim($vendedor) === "" || trim($vendedor) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $vendedor order by nombres" ; 
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
//  
   function lookup_sc_free_group_by_mesa_cliente(&$conteudo , $mesa_cliente) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $mesa_cliente; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($mesa_cliente) === "" || trim($mesa_cliente) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $mesa_cliente order by nombres" ; 
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
   function lookup_sc_free_group_by_vendedor(&$conteudo , $vendedor) 
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
      if (trim($vendedor) === "" || trim($vendedor) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $vendedor order by nombres" ; 
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
