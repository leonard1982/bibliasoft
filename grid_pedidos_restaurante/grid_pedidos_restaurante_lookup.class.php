<?php
class grid_pedidos_restaurante_lookup
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
      if (trim($idcli) === "" || trim($idcli) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $idcli order by documento, nombres" ; 
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
   function lookup_numfacven(&$conteudo , $numfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $numfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;" || trim($numfacven) === "" || trim($numfacven) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT fac.numfacven + \" - \" + res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(fac.numfacven, \" - \", res.prefijo)  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT fac.numfacven&\" - \"&res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT fac.numfacven||\" - \"||res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT fac.numfacven + \" - \" + res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT fac.numfacven||\" - \"||res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT fac.numfacven||\" - \"||res.prefijo  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres where idfacven = $numfacven order by fac.numfacven, fac.resolucion" ; 
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
   function lookup_nremision(&$conteudo , $nremision) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $nremision; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;" || trim($nremision) === "" || trim($nremision) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT rem.nremision + \" - \" + res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(rem.nremision, \" - \",res.prefijo)  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT rem.nremision&\" - \"&res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT rem.nremision||\" - \"||res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT rem.nremision + \" - \" + res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT rem.nremision||\" - \"||res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT rem.nremision||\" - \"||res.prefijo  FROM remisiones rem left join resdian res on rem.resolucion=res.Idres where idfacven = $nremision order by rem.nremision, rem.resolucion" ; 
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
   function lookup_prefijo_ped(&$conteudo , $prefijo_ped) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $prefijo_ped; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($prefijo_ped) === "" || trim($prefijo_ped) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select prefijo from resdian where Idres = '$prefijo_ped' order by prefijo" ; 
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
   function lookup_facturado(&$conteudo , $numfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($numfacven) === "")
      { 
          $conteudo = "&nbsp;";
          return ; 
      } 
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT res.prefijo + '/' + fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(res.prefijo,'/',fac.numfacven)  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT res.prefijo&'/'&fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT res.prefijo||'/'||fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT res.prefijo + '/' + fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT res.prefijo||'/'||fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT res.prefijo||'/'||fac.numfacven  FROM facturaven fac left join resdian res on fac.resolucion=res.Idres WHERE idfacven = $numfacven  ORDER BY fac.numfacven, fac.resolucion" ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "res.prefijo,'/',fac.numfacven"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "&nbsp;";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
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
   function lookup_prefijo_prefijo_ped(&$conteudo , $prefijo_ped) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $prefijo_ped; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($prefijo_ped) === "" || trim($prefijo_ped) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select prefijo from resdian where Idres = '$prefijo_ped' order by prefijo" ; 
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
