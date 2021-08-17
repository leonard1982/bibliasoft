<?php
class grid_report_refventacostogarancia_lookup
{
//  
   function lookup_f_idfacven(&$conteudo , $f_idfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $f_idfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT f.tipo + '/' + r.prefijo + '/' + f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(f.tipo,'/',r.prefijo,'/',f.numfacven)  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT f.tipo&'/'&r.prefijo&'/'&f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT f.tipo + '/' + r.prefijo + '/' + f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
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
   function lookup_documento_f_idfacven(&$conteudo , $f_idfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $f_idfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;" || trim($f_idfacven) === "" || trim($f_idfacven) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT f.tipo + '/' + r.prefijo + '/' + f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(f.tipo,'/',r.prefijo,'/',f.numfacven)  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT f.tipo&'/'&r.prefijo&'/'&f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT f.tipo + '/' + r.prefijo + '/' + f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT f.tipo||'/'||r.prefijo||'/'||f.numfacven  FROM facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven = $f_idfacven order by f.resolucion, f.numfacven" ; 
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
