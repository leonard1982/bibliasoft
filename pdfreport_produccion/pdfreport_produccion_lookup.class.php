<?php
class pdfreport_produccion_lookup
{
//  
   function lookup_id_bodega(&$conteudo , $id_bodega) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $id_bodega; 
      if ($tst_cache === $save_conteudo && $conteudo != "") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($id_bodega) === "" || trim($id_bodega) == "&nbsp;")
      { 
          $conteudo = "";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select bodega from bodegas where idbodega = $id_bodega order by bodega" ; 
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
   function lookup_detalle(&$conteudo , $numero, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($numero) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
    fl.numproducc, fl.idpro, concat(j.codigobar,' - ',j.nompro) as nompro,
    fl.idbod, fl.costop, fl.cantidad,
    fl.valorpar, fl.colores, c.color, fl.tallas, ta.tamaño,t.tamaño,fl.sabor
FROM 
    detalleprod fl
left join productos j on  fl.idpro=j.idprod
left join colores c on fl.colores=c.idcolores
left join tallas t on fl.tallas=t.idtallas
left join tallas ta on fl.sabor=ta.idtallas
where numproducc='$numero'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "fl.numproducc, fl.idpro, concat(j.codigobar,' - ',j.nompro) as nompro,
    fl.idbod, fl.costop, fl.cantidad,
    fl.valorpar, fl.colores, c.color, fl.tallas, ta.tamaño,t.tamaño,fl.sabor"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]); 
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]); 
                 $rx->fields[6] = str_replace(',', '.', $rx->fields[6]); 
                 $rx->fields[7] = str_replace(',', '.', $rx->fields[7]); 
                 $rx->fields[9] = str_replace(',', '.', $rx->fields[9]); 
                 $rx->fields[12] = str_replace(',', '.', $rx->fields[12]); 
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
