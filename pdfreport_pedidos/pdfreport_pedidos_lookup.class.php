<?php
class pdfreport_pedidos_lookup
{
//  
   function lookup_credito(&$credito) 
   {
      $conteudo = "" ; 
      if ($credito == "1")
      { 
          $conteudo = "Crédito";
      } 
      if ($credito == "2")
      { 
          $conteudo = "Contado";
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
   function lookup_detalleventa(&$conteudo , $idpedido, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($idpedido) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
    fl.iddet,
    fl.idpedid,
    fl.idpro, j.nompro,
    fl.unidadmayor,
    fl.factor,
if(fl.unidadmayor='NO' and fl.factor>0, j.unimen, j.unimay) as unidad,
   (fl.valorunit-fl.descuento-(fl.iva/fl.cantidad)) as valorunita,   (fl.valorpar-fl.descuento-fl.iva) as parcial, 
    fl.idbod,
    fl.cantidad,
    fl.iva,
    fl.adicional,
    fl.adicional1
FROM 
    detallepedido fl
left join productos j on fl.idpro=j.idprod
WHERE
    idpedid=$idpedido" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "fl.iddet,
    fl.idpedid,
    fl.idpro, j.nompro,
    fl.unidadmayor,
    fl.factor,
if(fl.unidadmayor='NO' and fl.factor>0, j.unimen, j.unimay) as unidad,
   (fl.valorunit-fl.descuento-(fl.iva/fl.cantidad)) as valorunita,   (fl.valorpar-fl.descuento-fl.iva) as parcial, 
    fl.idbod,
    fl.cantidad,
    fl.iva,
    fl.adicional,
    fl.adicional1"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 $rx->fields[7] = str_replace(',', '.', $rx->fields[7]); 
                 $rx->fields[8] = str_replace(',', '.', $rx->fields[8]); 
                 $rx->fields[9] = str_replace(',', '.', $rx->fields[9]); 
                 $rx->fields[10] = str_replace(',', '.', $rx->fields[10]); 
                 $rx->fields[11] = str_replace(',', '.', $rx->fields[11]); 
                 $rx->fields[12] = str_replace(',', '.', $rx->fields[12]); 
                 $rx->fields[13] = str_replace(',', '.', $rx->fields[13]); 
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
}
?>
