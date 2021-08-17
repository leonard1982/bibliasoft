<?php
class grid_empresas_lookup
{
//  
   function lookup_tipo_negocio(&$tipo_negocio) 
   {
      $conteudo = "" ; 
      if ($tipo_negocio == "GENERAL")
      { 
          $conteudo = "GENERAL";
      } 
      if ($tipo_negocio == "FERRETERIA")
      { 
          $conteudo = "FERRETERIA";
      } 
      if ($tipo_negocio == "ELECTRICO")
      { 
          $conteudo = "ELECTRICO";
      } 
      if ($tipo_negocio == "RESTAURANTE")
      { 
          $conteudo = "RESTAURANTE";
      } 
      if ($tipo_negocio == "ZAPATERIA")
      { 
          $conteudo = "ZAPATERIA";
      } 
      if ($tipo_negocio == "BOUTIQUE")
      { 
          $conteudo = "BOUTIQUE";
      } 
      if ($tipo_negocio == "LAVAUTOS")
      { 
          $conteudo = "LAVAUTOS";
      } 
      if ($tipo_negocio == "DROGUERIA")
      { 
          $conteudo = "DROGUERIA";
      } 
      if (!empty($conteudo)) 
      { 
          $tipo_negocio = $conteudo; 
      } 
   }  
}
?>
