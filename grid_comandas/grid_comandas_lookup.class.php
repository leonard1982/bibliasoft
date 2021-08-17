<?php
class grid_comandas_lookup
{
//  
   function lookup_d_estado_comanda(&$d_estado_comanda) 
   {
      $conteudo = "" ; 
      if ($d_estado_comanda == "1")
      { 
          $conteudo = "PENDIENTE";
      } 
      if ($d_estado_comanda == "2")
      { 
          $conteudo = "PROCESO";
      } 
      if ($d_estado_comanda == "3")
      { 
          $conteudo = "CERRADA";
      } 
      if (!empty($conteudo)) 
      { 
          $d_estado_comanda = $conteudo; 
      } 
   }  
}
?>
