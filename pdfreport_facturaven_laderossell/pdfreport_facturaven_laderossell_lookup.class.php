<?php
class pdfreport_facturaven_laderossell_lookup
{
//  
   function lookup_credito(&$credito) 
   {
      $conteudo = "" ; 
      if ($credito == "2")
      { 
          $conteudo = "Contado";
      } 
      if ($credito == "1")
      { 
          $conteudo = "Crédito";
      } 
      if (!empty($conteudo)) 
      { 
          $credito = $conteudo; 
      } 
   }  
//  
   function lookup_idcli(&$conteudo , $idcli) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idcli; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idcli) === "" || trim($idcli) == "&nbsp;")
      { 
          $conteudo = "";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select nombres from terceros where idtercero = $idcli order by nombres" ; 
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_detalleventa(&$conteudo , $idfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($idfacven) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
   fl.idpro,
   sum(fl.cantidad) as cantidad,
   p.codigobar, 
   p.nompro, 
   fl.unidadmayor, 
   fl.factor,
   if(fl.unidadmayor='NO' and fl.factor>0, p.unimen, p.unimay) as unidad,
   (fl.valorunit-fl.descuento-(fl.iva/fl.cantidad)) as valorunita,   
   sum(fl.valorpar-fl.descuento-fl.iva) as parcial,
   fl.iva, 
   fl.adicional
 FROM 
    detalleventa fl
left join productos p on  fl.idpro=p.idprod
where
fl.numfac=$idfacven and fl.cantidad > 0
GROUP BY p.idprod" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "fl.idpro,
   sum(fl.cantidad) as cantidad,
   p.codigobar, 
   p.nompro, 
   fl.unidadmayor, 
   fl.factor,
   if(fl.unidadmayor='NO' and fl.factor>0, p.unimen, p.unimay) as unidad,
   (fl.valorunit-fl.descuento-(fl.iva/fl.cantidad)) as valorunita,   
   sum(fl.valorpar-fl.descuento-fl.iva) as parcial,
   fl.iva, 
   fl.adicional"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 $rx->fields[7] = str_replace(',', '.', $rx->fields[7]); 
                 $rx->fields[8] = str_replace(',', '.', $rx->fields[8]); 
                 $rx->fields[9] = str_replace(',', '.', $rx->fields[9]); 
                 $rx->fields[10] = str_replace(',', '.', $rx->fields[10]); 
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
                            $conteudo .= "";
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
   function lookup_municipio(&$conteudo , $municipio, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT municipio 
FROM municipio 
WHERE idmun = '" . substr($this->Db->qstr($municipio), 1 , -1) . "' 
ORDER BY municipio" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
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
   function lookup_colores(&$conteudo , $idfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($idfacven) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
   iddet,
   iddet as iddet2
FROM 
   detalleventa 
where
 numfac='$idfacven'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "iddet,
   iddet as iddet2"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
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
                            $conteudo .= "";
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
   function lookup_colores_iddet(&$conteudo , $idfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode("", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $colores_iddet = $conteudo;
      $nm_comando = "select concat(sum(fl.cantidad) ,'-',c.color) as cantidad_color from detalleventa fl
left join productos p on  fl.idpro=p.idprod
left join colores c on fl.colores=c.idcolores where fl.numfac = '$idfacven' group by c.color" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_colores_iddet2(&$conteudo , $idfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode("", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $colores_iddet2 = $conteudo;
      $nm_comando = "select concat(sum(fl.cantidad) ,'-',t.tamaño) as cantidad_talla from detalleventa fl
left join productos p on  fl.idpro=p.idprod
left join tallas t on fl.tallas=t.idtallas where fl.numfac = '$idfacven'
 and t.tallasabor = 'T' group by t.tamaño" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_tallas(&$conteudo , $idfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($idfacven) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
   iddet
FROM 
   detalleventa 
where
 numfac='$idfacven'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
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
   function lookup_tallas_iddet(&$conteudo , $idfacven) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idfacven; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode("", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $tallas_iddet = $conteudo;
      $nm_comando = "select concat(sum(fl.cantidad) ,'-',t.tamaño) as cantidad_talla from detalleventa fl
left join productos p on  fl.idpro=p.idprod
left join tallas t on fl.tallas=t.idtallas where fl.numfac = '$idfacven'
 and t.tallasabor = 'T' group by t.tamaño" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
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
          $conteudo = "";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
