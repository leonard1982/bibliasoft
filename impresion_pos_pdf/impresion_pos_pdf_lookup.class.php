<?php
class impresion_pos_pdf_lookup
{
//  
   function lookup_detalle(&$conteudo , $gidfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "select 
					  p.codigobar,
					  p.nompro,
					  d.cantidad,
					  d.valorunit,
					  d.valorpar,
                                          concat(d.cantidad,' ',p.nompro,' ',d.valorpar) as linea
					  from 
					  facturaven f 
					  inner join detalleventa d on d.numfac=f.idfacven 
					  inner join productos p on d.idpro=p.idprod
					  where 
					  d.numfac='" . $_SESSION['gidfacven'] . "'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "p.codigobar,
					  p.nompro,
					  d.cantidad,
					  d.valorunit,
					  d.valorpar,
                                          concat(d.cantidad,' ',p.nompro,' ',d.valorpar) as linea"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]); 
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
   function lookup_impuestos(&$conteudo , $gidfacven, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT 
adicional as tipo_iva, 
sum(iva) as valor_iva, 
(sum(valorpar)-sum(iva)) as base,
(sum(valorpar)) as total
from 
detalleventa 
where 
numfac='" . $_SESSION['gidfacven'] . "' 
GROUP by adicional" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "adicional as tipo_iva, 
sum(iva) as valor_iva, 
(sum(valorpar)-sum(iva)) as base,
(sum(valorpar)) as total"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
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
}
?>
