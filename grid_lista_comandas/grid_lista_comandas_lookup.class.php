<?php
class grid_lista_comandas_lookup
{
//  
   function lookup_estado(&$estado) 
   {
      $conteudo = "" ; 
      if ($estado == "1")
      { 
          $conteudo = "PENDIENTE";
      } 
      if ($estado == "2")
      { 
          $conteudo = "PROCESO";
      } 
      if ($estado == "3")
      { 
          $conteudo = "CERRADO";
      } 
      if (!empty($conteudo)) 
      { 
          $estado = $conteudo; 
      } 
   }  
//  
   function lookup_por_estado_estado(&$estado) 
   {
      $conteudo = "" ; 
      if ($estado == "1")
      { 
          $conteudo = "PENDIENTE";
      } 
      if ($estado == "2")
      { 
          $conteudo = "PROCESO";
      } 
      if ($estado == "3")
      { 
          $conteudo = "CERRADO";
      } 
      if (!empty($conteudo)) 
      { 
          $estado = $conteudo; 
      } 
   }  
}
?>
