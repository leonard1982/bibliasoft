<?php
class grid_mensajes_masivos_envios_lookup
{
//  
   function lookup_id_mensaje(&$conteudo , $id_mensaje) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $id_mensaje; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($id_mensaje) === "" || trim($id_mensaje) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select descripcion from mensajes_masivos where id = $id_mensaje order by descripcion" ; 
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
   function lookup_clasificaciones_destino(&$conteudo , $clasificaciones_destino) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $clasificaciones_destino; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode(";", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $clasificaciones_destino = $conteudo;
      $nm_comando = "select nombre from clasificacion_clientes where idclasificacion_cliente  IN ('$clasificaciones_destino') order by nombre" ; 
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
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
