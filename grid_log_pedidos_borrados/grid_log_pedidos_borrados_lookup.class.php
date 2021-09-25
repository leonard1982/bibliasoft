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
}
?>
