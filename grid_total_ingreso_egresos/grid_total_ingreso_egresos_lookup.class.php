<?php
class grid_total_ingreso_egresos_lookup
{
//  
   function lookup_fecha(&$fecha) 
   {
      $conteudo = "" ; 
      if ($fecha == "1")
      { 
          $conteudo = "ENERO";
      } 
      if ($fecha == "2")
      { 
          $conteudo = "FEBRERO";
      } 
      if ($fecha == "3")
      { 
          $conteudo = "MARZO";
      } 
      if ($fecha == "4")
      { 
          $conteudo = "ABRIL";
      } 
      if ($fecha == "5")
      { 
          $conteudo = "MAYO";
      } 
      if ($fecha == "6")
      { 
          $conteudo = "JUNIO";
      } 
      if ($fecha == "7")
      { 
          $conteudo = "JULIO";
      } 
      if ($fecha == "8")
      { 
          $conteudo = "AGOSTO";
      } 
      if ($fecha == "9")
      { 
          $conteudo = "SEPTIEMBRE";
      } 
      if ($fecha == "10")
      { 
          $conteudo = "OCTUBRE";
      } 
      if ($fecha == "11")
      { 
          $conteudo = "NOVIEMBRE";
      } 
      if ($fecha == "12")
      { 
          $conteudo = "DICIEMBRE";
      } 
      if (!empty($conteudo)) 
      { 
          $fecha = $conteudo; 
      } 
   }  
//  
   function lookup_Periodo_fecha(&$fecha) 
   {
      $conteudo = "" ; 
      if ($fecha == "1")
      { 
          $conteudo = "ENERO";
      } 
      if ($fecha == "2")
      { 
          $conteudo = "FEBRERO";
      } 
      if ($fecha == "3")
      { 
          $conteudo = "MARZO";
      } 
      if ($fecha == "4")
      { 
          $conteudo = "ABRIL";
      } 
      if ($fecha == "5")
      { 
          $conteudo = "MAYO";
      } 
      if ($fecha == "6")
      { 
          $conteudo = "JUNIO";
      } 
      if ($fecha == "7")
      { 
          $conteudo = "JULIO";
      } 
      if ($fecha == "8")
      { 
          $conteudo = "AGOSTO";
      } 
      if ($fecha == "9")
      { 
          $conteudo = "SEPTIEMBRE";
      } 
      if ($fecha == "10")
      { 
          $conteudo = "OCTUBRE";
      } 
      if ($fecha == "11")
      { 
          $conteudo = "NOVIEMBRE";
      } 
      if ($fecha == "12")
      { 
          $conteudo = "DICIEMBRE";
      } 
      if (!empty($conteudo)) 
      { 
          $fecha = $conteudo; 
      } 
   }  
}
?>
