<div id="terceros_form4" style='<?php echo ($this->tabCssClass["terceros_form4"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_17"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idtercero']))
   {
       $this->nmgp_cmp_hidden['idtercero'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['relleno2']))
   {
       $this->nmgp_cmp_hidden['relleno2'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_17" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idtercero']))
           {
               $this->nmgp_cmp_readonly['idtercero'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fechault']))
           {
               $this->nmgp_cmp_readonly['fechault'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['saldo']))
           {
               $this->nmgp_cmp_readonly['saldo'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo_ter']))
    {
        $this->nm_new_label['codigo_ter'] = "Código TNS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_ter = $this->codigo_ter;
   $sStyleHidden_codigo_ter = '';
   if (isset($this->nmgp_cmp_hidden['codigo_ter']) && $this->nmgp_cmp_hidden['codigo_ter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_ter']);
       $sStyleHidden_codigo_ter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_ter = 'display: none;';
   $sStyleReadInp_codigo_ter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_ter']) && $this->nmgp_cmp_readonly['codigo_ter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_ter']);
       $sStyleReadLab_codigo_ter = '';
       $sStyleReadInp_codigo_ter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_ter']) && $this->nmgp_cmp_hidden['codigo_ter'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_ter" value="<?php echo $this->form_encode_input($codigo_ter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_ter_line" id="hidden_field_data_codigo_ter" style="<?php echo $sStyleHidden_codigo_ter; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_ter_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_ter_label" style=""><span id="id_label_codigo_ter"><?php echo $this->nm_new_label['codigo_ter']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_ter"]) &&  $this->nmgp_cmp_readonly["codigo_ter"] == "on") { 

 ?>
<input type="hidden" name="codigo_ter" value="<?php echo $this->form_encode_input($codigo_ter) . "\">" . $codigo_ter . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_ter" class="sc-ui-readonly-codigo_ter css_codigo_ter_line" style="<?php echo $sStyleReadLab_codigo_ter; ?>"><?php echo $this->form_format_readonly("codigo_ter", $this->form_encode_input($this->codigo_ter)); ?></span><span id="id_read_off_codigo_ter" class="css_read_off_codigo_ter<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_ter; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_ter_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_ter" type=text name="codigo_ter" value="<?php echo $this->form_encode_input($codigo_ter) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789.-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_ter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_ter_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['zona_clientes']))
   {
       $this->nm_new_label['zona_clientes'] = "Zona Tercero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zona_clientes = $this->zona_clientes;
   $sStyleHidden_zona_clientes = '';
   if (isset($this->nmgp_cmp_hidden['zona_clientes']) && $this->nmgp_cmp_hidden['zona_clientes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zona_clientes']);
       $sStyleHidden_zona_clientes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zona_clientes = 'display: none;';
   $sStyleReadInp_zona_clientes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zona_clientes']) && $this->nmgp_cmp_readonly['zona_clientes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zona_clientes']);
       $sStyleReadLab_zona_clientes = '';
       $sStyleReadInp_zona_clientes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zona_clientes']) && $this->nmgp_cmp_hidden['zona_clientes'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zona_clientes" value="<?php echo $this->form_encode_input($this->zona_clientes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zona_clientes_line" id="hidden_field_data_zona_clientes" style="<?php echo $sStyleHidden_zona_clientes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zona_clientes_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zona_clientes_label" style=""><span id="id_label_zona_clientes"><?php echo $this->nm_new_label['zona_clientes']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona_clientes"]) &&  $this->nmgp_cmp_readonly["zona_clientes"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idzona_cliente, codigo + ' - ' + nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idzona_cliente, concat(codigo,' - ',nombre)  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idzona_cliente, codigo&' - '&nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idzona_cliente, codigo||' - '||nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idzona_cliente, codigo + ' - ' + nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idzona_cliente, codigo||' - '||nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT idzona_cliente, codigo||' - '||nombre  FROM zona_clientes  ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $zona_clientes_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zona_clientes_1))
          {
              foreach ($this->zona_clientes_1 as $tmp_zona_clientes)
              {
                  if (trim($tmp_zona_clientes) === trim($cadaselect[1])) { $zona_clientes_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zona_clientes) === trim($cadaselect[1])) { $zona_clientes_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="zona_clientes" value="<?php echo $this->form_encode_input($zona_clientes) . "\">" . $zona_clientes_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_zona_clientes();
   $x = 0 ; 
   $zona_clientes_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zona_clientes_1))
          {
              foreach ($this->zona_clientes_1 as $tmp_zona_clientes)
              {
                  if (trim($tmp_zona_clientes) === trim($cadaselect[1])) { $zona_clientes_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zona_clientes) === trim($cadaselect[1])) { $zona_clientes_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($zona_clientes_look))
          {
              $zona_clientes_look = $this->zona_clientes;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_zona_clientes\" class=\"css_zona_clientes_line\" style=\"" .  $sStyleReadLab_zona_clientes . "\">" . $this->form_format_readonly("zona_clientes", $this->form_encode_input($zona_clientes_look)) . "</span><span id=\"id_read_off_zona_clientes\" class=\"css_read_off_zona_clientes" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_zona_clientes . "\">";
   echo " <span id=\"idAjaxSelect_zona_clientes\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_zona_clientes_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_zona_clientes\" name=\"zona_clientes\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_zona_clientes'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->zona_clientes) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->zona_clientes)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   if (isset($this->Ini->sc_lig_md5["form_zona_clientes"]) && $this->Ini->sc_lig_md5["form_zona_clientes"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_lkpedt_refresh_zona_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@terceros@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_lkpedt_refresh_zona_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_zona_clientes_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_zona_clientes_edit. "', '" . $Md5_Lig . "')", "fldedt_zona_clientes", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zona_clientes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zona_clientes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['clasificacion_clientes']))
   {
       $this->nm_new_label['clasificacion_clientes'] = "Clasificacion Tercero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clasificacion_clientes = $this->clasificacion_clientes;
   $sStyleHidden_clasificacion_clientes = '';
   if (isset($this->nmgp_cmp_hidden['clasificacion_clientes']) && $this->nmgp_cmp_hidden['clasificacion_clientes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clasificacion_clientes']);
       $sStyleHidden_clasificacion_clientes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clasificacion_clientes = 'display: none;';
   $sStyleReadInp_clasificacion_clientes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clasificacion_clientes']) && $this->nmgp_cmp_readonly['clasificacion_clientes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clasificacion_clientes']);
       $sStyleReadLab_clasificacion_clientes = '';
       $sStyleReadInp_clasificacion_clientes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clasificacion_clientes']) && $this->nmgp_cmp_hidden['clasificacion_clientes'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="clasificacion_clientes" value="<?php echo $this->form_encode_input($this->clasificacion_clientes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_clasificacion_clientes_line" id="hidden_field_data_clasificacion_clientes" style="<?php echo $sStyleHidden_clasificacion_clientes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clasificacion_clientes_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_clasificacion_clientes_label" style=""><span id="id_label_clasificacion_clientes"><?php echo $this->nm_new_label['clasificacion_clientes']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clasificacion_clientes"]) &&  $this->nmgp_cmp_readonly["clasificacion_clientes"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo + ' - ' + nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idclasificacion_cliente, concat(codigo,' - ',nombre)  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo&' - '&nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' - '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo + ' - ' + nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' - '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' - '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $clasificacion_clientes_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->clasificacion_clientes_1))
          {
              foreach ($this->clasificacion_clientes_1 as $tmp_clasificacion_clientes)
              {
                  if (trim($tmp_clasificacion_clientes) === trim($cadaselect[1])) { $clasificacion_clientes_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->clasificacion_clientes) === trim($cadaselect[1])) { $clasificacion_clientes_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="clasificacion_clientes" value="<?php echo $this->form_encode_input($clasificacion_clientes) . "\">" . $clasificacion_clientes_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_clasificacion_clientes();
   $x = 0 ; 
   $clasificacion_clientes_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->clasificacion_clientes_1))
          {
              foreach ($this->clasificacion_clientes_1 as $tmp_clasificacion_clientes)
              {
                  if (trim($tmp_clasificacion_clientes) === trim($cadaselect[1])) { $clasificacion_clientes_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->clasificacion_clientes) === trim($cadaselect[1])) { $clasificacion_clientes_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($clasificacion_clientes_look))
          {
              $clasificacion_clientes_look = $this->clasificacion_clientes;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_clasificacion_clientes\" class=\"css_clasificacion_clientes_line\" style=\"" .  $sStyleReadLab_clasificacion_clientes . "\">" . $this->form_format_readonly("clasificacion_clientes", $this->form_encode_input($clasificacion_clientes_look)) . "</span><span id=\"id_read_off_clasificacion_clientes\" class=\"css_read_off_clasificacion_clientes" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_clasificacion_clientes . "\">";
   echo " <span id=\"idAjaxSelect_clasificacion_clientes\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_clasificacion_clientes_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_clasificacion_clientes\" name=\"clasificacion_clientes\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_clasificacion_clientes'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->clasificacion_clientes) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->clasificacion_clientes)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   if (isset($this->Ini->sc_lig_md5["form_clasificacion_clientes"]) && $this->Ini->sc_lig_md5["form_clasificacion_clientes"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_lkpedt_refresh_clasificacion_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@terceros@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_lkpedt_refresh_clasificacion_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_clasificacion_clientes_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_clasificacion_clientes_edit. "', '" . $Md5_Lig . "')", "fldedt_clasificacion_clientes", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clasificacion_clientes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clasificacion_clientes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_clasificacion_clientes_dumb = ('' == $sStyleHidden_clasificacion_clientes) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_clasificacion_clientes_dumb" style="<?php echo $sStyleHidden_clasificacion_clientes_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_18"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_18"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_18" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['puc_auxiliar_deudores']))
    {
        $this->nm_new_label['puc_auxiliar_deudores'] = "PUC Auxiliar Deudores";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_auxiliar_deudores = $this->puc_auxiliar_deudores;
   $sStyleHidden_puc_auxiliar_deudores = '';
   if (isset($this->nmgp_cmp_hidden['puc_auxiliar_deudores']) && $this->nmgp_cmp_hidden['puc_auxiliar_deudores'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_auxiliar_deudores']);
       $sStyleHidden_puc_auxiliar_deudores = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_auxiliar_deudores = 'display: none;';
   $sStyleReadInp_puc_auxiliar_deudores = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_auxiliar_deudores']) && $this->nmgp_cmp_readonly['puc_auxiliar_deudores'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_auxiliar_deudores']);
       $sStyleReadLab_puc_auxiliar_deudores = '';
       $sStyleReadInp_puc_auxiliar_deudores = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_auxiliar_deudores']) && $this->nmgp_cmp_hidden['puc_auxiliar_deudores'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_auxiliar_deudores" value="<?php echo $this->form_encode_input($puc_auxiliar_deudores) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_auxiliar_deudores_line" id="hidden_field_data_puc_auxiliar_deudores" style="<?php echo $sStyleHidden_puc_auxiliar_deudores; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_auxiliar_deudores_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_auxiliar_deudores_label" style=""><span id="id_label_puc_auxiliar_deudores"><?php echo $this->nm_new_label['puc_auxiliar_deudores']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_auxiliar_deudores"]) &&  $this->nmgp_cmp_readonly["puc_auxiliar_deudores"] == "on") { 

 ?>
<input type="hidden" name="puc_auxiliar_deudores" value="<?php echo $this->form_encode_input($puc_auxiliar_deudores) . "\">" . $puc_auxiliar_deudores . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_auxiliar_deudores'] = $this->puc_auxiliar_deudores;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_auxiliar_deudores])) ? $aLookup[0][$this->puc_auxiliar_deudores] : $this->puc_auxiliar_deudores;
$puc_auxiliar_deudores_look = (isset($aLookup[0][$this->puc_auxiliar_deudores])) ? $aLookup[0][$this->puc_auxiliar_deudores] : $this->puc_auxiliar_deudores;
?>
<span id="id_read_on_puc_auxiliar_deudores" class="sc-ui-readonly-puc_auxiliar_deudores css_puc_auxiliar_deudores_line" style="<?php echo $sStyleReadLab_puc_auxiliar_deudores; ?>"><?php echo $this->form_format_readonly("puc_auxiliar_deudores", str_replace("<", "&lt;", $puc_auxiliar_deudores_look)); ?></span><span id="id_read_off_puc_auxiliar_deudores" class="css_read_off_puc_auxiliar_deudores<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_auxiliar_deudores; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_auxiliar_deudores_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_auxiliar_deudores" type=text name="puc_auxiliar_deudores" value="<?php echo $this->form_encode_input($puc_auxiliar_deudores) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_auxiliar_deudores'] = $this->puc_auxiliar_deudores;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_deudores), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_deudores'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_auxiliar_deudores])) ? $aLookup[0][$this->puc_auxiliar_deudores] : '';
$puc_auxiliar_deudores_look = (isset($aLookup[0][$this->puc_auxiliar_deudores])) ? $aLookup[0][$this->puc_auxiliar_deudores] : '';
?>
<select id="id_ac_puc_auxiliar_deudores" class="scFormObjectOdd sc-ui-autocomp-puc_auxiliar_deudores css_puc_auxiliar_deudores_obj sc-js-input"><?php if ('' != $this->puc_auxiliar_deudores) { ?><option value="<?php echo $this->puc_auxiliar_deudores ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_auxiliar_deudores_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_auxiliar_deudores_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['puc_retefuente_ventas']))
    {
        $this->nm_new_label['puc_retefuente_ventas'] = "PUC Retefuente Ventas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_retefuente_ventas = $this->puc_retefuente_ventas;
   $sStyleHidden_puc_retefuente_ventas = '';
   if (isset($this->nmgp_cmp_hidden['puc_retefuente_ventas']) && $this->nmgp_cmp_hidden['puc_retefuente_ventas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_retefuente_ventas']);
       $sStyleHidden_puc_retefuente_ventas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_retefuente_ventas = 'display: none;';
   $sStyleReadInp_puc_retefuente_ventas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_retefuente_ventas']) && $this->nmgp_cmp_readonly['puc_retefuente_ventas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_retefuente_ventas']);
       $sStyleReadLab_puc_retefuente_ventas = '';
       $sStyleReadInp_puc_retefuente_ventas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_retefuente_ventas']) && $this->nmgp_cmp_hidden['puc_retefuente_ventas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_retefuente_ventas" value="<?php echo $this->form_encode_input($puc_retefuente_ventas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_retefuente_ventas_line" id="hidden_field_data_puc_retefuente_ventas" style="<?php echo $sStyleHidden_puc_retefuente_ventas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_retefuente_ventas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_retefuente_ventas_label" style=""><span id="id_label_puc_retefuente_ventas"><?php echo $this->nm_new_label['puc_retefuente_ventas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_retefuente_ventas"]) &&  $this->nmgp_cmp_readonly["puc_retefuente_ventas"] == "on") { 

 ?>
<input type="hidden" name="puc_retefuente_ventas" value="<?php echo $this->form_encode_input($puc_retefuente_ventas) . "\">" . $puc_retefuente_ventas . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_retefuente_ventas'] = $this->puc_retefuente_ventas;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_ventas])) ? $aLookup[0][$this->puc_retefuente_ventas] : $this->puc_retefuente_ventas;
$puc_retefuente_ventas_look = (isset($aLookup[0][$this->puc_retefuente_ventas])) ? $aLookup[0][$this->puc_retefuente_ventas] : $this->puc_retefuente_ventas;
?>
<span id="id_read_on_puc_retefuente_ventas" class="sc-ui-readonly-puc_retefuente_ventas css_puc_retefuente_ventas_line" style="<?php echo $sStyleReadLab_puc_retefuente_ventas; ?>"><?php echo $this->form_format_readonly("puc_retefuente_ventas", str_replace("<", "&lt;", $puc_retefuente_ventas_look)); ?></span><span id="id_read_off_puc_retefuente_ventas" class="css_read_off_puc_retefuente_ventas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_retefuente_ventas; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_retefuente_ventas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_retefuente_ventas" type=text name="puc_retefuente_ventas" value="<?php echo $this->form_encode_input($puc_retefuente_ventas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_retefuente_ventas'] = $this->puc_retefuente_ventas;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_ventas), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_ventas'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_ventas])) ? $aLookup[0][$this->puc_retefuente_ventas] : '';
$puc_retefuente_ventas_look = (isset($aLookup[0][$this->puc_retefuente_ventas])) ? $aLookup[0][$this->puc_retefuente_ventas] : '';
?>
<select id="id_ac_puc_retefuente_ventas" class="scFormObjectOdd sc-ui-autocomp-puc_retefuente_ventas css_puc_retefuente_ventas_obj sc-js-input"><?php if ('' != $this->puc_retefuente_ventas) { ?><option value="<?php echo $this->puc_retefuente_ventas ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_retefuente_ventas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_retefuente_ventas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['puc_retefuente_servicios_clie']))
    {
        $this->nm_new_label['puc_retefuente_servicios_clie'] = "PUC Retefuente Servicios Clie";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_retefuente_servicios_clie = $this->puc_retefuente_servicios_clie;
   $sStyleHidden_puc_retefuente_servicios_clie = '';
   if (isset($this->nmgp_cmp_hidden['puc_retefuente_servicios_clie']) && $this->nmgp_cmp_hidden['puc_retefuente_servicios_clie'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_retefuente_servicios_clie']);
       $sStyleHidden_puc_retefuente_servicios_clie = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_retefuente_servicios_clie = 'display: none;';
   $sStyleReadInp_puc_retefuente_servicios_clie = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_retefuente_servicios_clie']) && $this->nmgp_cmp_readonly['puc_retefuente_servicios_clie'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_retefuente_servicios_clie']);
       $sStyleReadLab_puc_retefuente_servicios_clie = '';
       $sStyleReadInp_puc_retefuente_servicios_clie = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_retefuente_servicios_clie']) && $this->nmgp_cmp_hidden['puc_retefuente_servicios_clie'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_retefuente_servicios_clie" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_clie) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_retefuente_servicios_clie_line" id="hidden_field_data_puc_retefuente_servicios_clie" style="<?php echo $sStyleHidden_puc_retefuente_servicios_clie; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_retefuente_servicios_clie_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_retefuente_servicios_clie_label" style=""><span id="id_label_puc_retefuente_servicios_clie"><?php echo $this->nm_new_label['puc_retefuente_servicios_clie']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_retefuente_servicios_clie"]) &&  $this->nmgp_cmp_readonly["puc_retefuente_servicios_clie"] == "on") { 

 ?>
<input type="hidden" name="puc_retefuente_servicios_clie" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_clie) . "\">" . $puc_retefuente_servicios_clie . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_retefuente_servicios_clie'] = $this->puc_retefuente_servicios_clie;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_servicios_clie])) ? $aLookup[0][$this->puc_retefuente_servicios_clie] : $this->puc_retefuente_servicios_clie;
$puc_retefuente_servicios_clie_look = (isset($aLookup[0][$this->puc_retefuente_servicios_clie])) ? $aLookup[0][$this->puc_retefuente_servicios_clie] : $this->puc_retefuente_servicios_clie;
?>
<span id="id_read_on_puc_retefuente_servicios_clie" class="sc-ui-readonly-puc_retefuente_servicios_clie css_puc_retefuente_servicios_clie_line" style="<?php echo $sStyleReadLab_puc_retefuente_servicios_clie; ?>"><?php echo $this->form_format_readonly("puc_retefuente_servicios_clie", str_replace("<", "&lt;", $puc_retefuente_servicios_clie_look)); ?></span><span id="id_read_off_puc_retefuente_servicios_clie" class="css_read_off_puc_retefuente_servicios_clie<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_retefuente_servicios_clie; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_retefuente_servicios_clie_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_retefuente_servicios_clie" type=text name="puc_retefuente_servicios_clie" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_clie) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_retefuente_servicios_clie'] = $this->puc_retefuente_servicios_clie;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_clie), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_clie'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_servicios_clie])) ? $aLookup[0][$this->puc_retefuente_servicios_clie] : '';
$puc_retefuente_servicios_clie_look = (isset($aLookup[0][$this->puc_retefuente_servicios_clie])) ? $aLookup[0][$this->puc_retefuente_servicios_clie] : '';
?>
<select id="id_ac_puc_retefuente_servicios_clie" class="scFormObjectOdd sc-ui-autocomp-puc_retefuente_servicios_clie css_puc_retefuente_servicios_clie_obj sc-js-input"><?php if ('' != $this->puc_retefuente_servicios_clie) { ?><option value="<?php echo $this->puc_retefuente_servicios_clie ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_retefuente_servicios_clie_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_retefuente_servicios_clie_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_puc_auxiliar_deudores_dumb = ('' == $sStyleHidden_puc_auxiliar_deudores) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_auxiliar_deudores_dumb" style="<?php echo $sStyleHidden_puc_auxiliar_deudores_dumb; ?>"></TD>
<?php $sStyleHidden_puc_retefuente_ventas_dumb = ('' == $sStyleHidden_puc_retefuente_ventas) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_retefuente_ventas_dumb" style="<?php echo $sStyleHidden_puc_retefuente_ventas_dumb; ?>"></TD>
<?php $sStyleHidden_puc_retefuente_servicios_clie_dumb = ('' == $sStyleHidden_puc_retefuente_servicios_clie) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_retefuente_servicios_clie_dumb" style="<?php echo $sStyleHidden_puc_retefuente_servicios_clie_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['puc_auxiliar_proveedores']))
    {
        $this->nm_new_label['puc_auxiliar_proveedores'] = "PUC Auxiliar Proveedores";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_auxiliar_proveedores = $this->puc_auxiliar_proveedores;
   $sStyleHidden_puc_auxiliar_proveedores = '';
   if (isset($this->nmgp_cmp_hidden['puc_auxiliar_proveedores']) && $this->nmgp_cmp_hidden['puc_auxiliar_proveedores'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_auxiliar_proveedores']);
       $sStyleHidden_puc_auxiliar_proveedores = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_auxiliar_proveedores = 'display: none;';
   $sStyleReadInp_puc_auxiliar_proveedores = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_auxiliar_proveedores']) && $this->nmgp_cmp_readonly['puc_auxiliar_proveedores'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_auxiliar_proveedores']);
       $sStyleReadLab_puc_auxiliar_proveedores = '';
       $sStyleReadInp_puc_auxiliar_proveedores = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_auxiliar_proveedores']) && $this->nmgp_cmp_hidden['puc_auxiliar_proveedores'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_auxiliar_proveedores" value="<?php echo $this->form_encode_input($puc_auxiliar_proveedores) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_auxiliar_proveedores_line" id="hidden_field_data_puc_auxiliar_proveedores" style="<?php echo $sStyleHidden_puc_auxiliar_proveedores; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_auxiliar_proveedores_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_auxiliar_proveedores_label" style=""><span id="id_label_puc_auxiliar_proveedores"><?php echo $this->nm_new_label['puc_auxiliar_proveedores']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_auxiliar_proveedores"]) &&  $this->nmgp_cmp_readonly["puc_auxiliar_proveedores"] == "on") { 

 ?>
<input type="hidden" name="puc_auxiliar_proveedores" value="<?php echo $this->form_encode_input($puc_auxiliar_proveedores) . "\">" . $puc_auxiliar_proveedores . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_auxiliar_proveedores'] = $this->puc_auxiliar_proveedores;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_auxiliar_proveedores])) ? $aLookup[0][$this->puc_auxiliar_proveedores] : $this->puc_auxiliar_proveedores;
$puc_auxiliar_proveedores_look = (isset($aLookup[0][$this->puc_auxiliar_proveedores])) ? $aLookup[0][$this->puc_auxiliar_proveedores] : $this->puc_auxiliar_proveedores;
?>
<span id="id_read_on_puc_auxiliar_proveedores" class="sc-ui-readonly-puc_auxiliar_proveedores css_puc_auxiliar_proveedores_line" style="<?php echo $sStyleReadLab_puc_auxiliar_proveedores; ?>"><?php echo $this->form_format_readonly("puc_auxiliar_proveedores", str_replace("<", "&lt;", $puc_auxiliar_proveedores_look)); ?></span><span id="id_read_off_puc_auxiliar_proveedores" class="css_read_off_puc_auxiliar_proveedores<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_auxiliar_proveedores; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_auxiliar_proveedores_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_auxiliar_proveedores" type=text name="puc_auxiliar_proveedores" value="<?php echo $this->form_encode_input($puc_auxiliar_proveedores) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_auxiliar_proveedores'] = $this->puc_auxiliar_proveedores;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_auxiliar_proveedores), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_auxiliar_proveedores'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_auxiliar_proveedores])) ? $aLookup[0][$this->puc_auxiliar_proveedores] : '';
$puc_auxiliar_proveedores_look = (isset($aLookup[0][$this->puc_auxiliar_proveedores])) ? $aLookup[0][$this->puc_auxiliar_proveedores] : '';
?>
<select id="id_ac_puc_auxiliar_proveedores" class="scFormObjectOdd sc-ui-autocomp-puc_auxiliar_proveedores css_puc_auxiliar_proveedores_obj sc-js-input"><?php if ('' != $this->puc_auxiliar_proveedores) { ?><option value="<?php echo $this->puc_auxiliar_proveedores ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_auxiliar_proveedores_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_auxiliar_proveedores_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['puc_retefuente_compras']))
    {
        $this->nm_new_label['puc_retefuente_compras'] = "PUC Retefuente Compras";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_retefuente_compras = $this->puc_retefuente_compras;
   $sStyleHidden_puc_retefuente_compras = '';
   if (isset($this->nmgp_cmp_hidden['puc_retefuente_compras']) && $this->nmgp_cmp_hidden['puc_retefuente_compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_retefuente_compras']);
       $sStyleHidden_puc_retefuente_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_retefuente_compras = 'display: none;';
   $sStyleReadInp_puc_retefuente_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_retefuente_compras']) && $this->nmgp_cmp_readonly['puc_retefuente_compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_retefuente_compras']);
       $sStyleReadLab_puc_retefuente_compras = '';
       $sStyleReadInp_puc_retefuente_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_retefuente_compras']) && $this->nmgp_cmp_hidden['puc_retefuente_compras'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_retefuente_compras" value="<?php echo $this->form_encode_input($puc_retefuente_compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_retefuente_compras_line" id="hidden_field_data_puc_retefuente_compras" style="<?php echo $sStyleHidden_puc_retefuente_compras; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_retefuente_compras_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_retefuente_compras_label" style=""><span id="id_label_puc_retefuente_compras"><?php echo $this->nm_new_label['puc_retefuente_compras']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_retefuente_compras"]) &&  $this->nmgp_cmp_readonly["puc_retefuente_compras"] == "on") { 

 ?>
<input type="hidden" name="puc_retefuente_compras" value="<?php echo $this->form_encode_input($puc_retefuente_compras) . "\">" . $puc_retefuente_compras . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_retefuente_compras'] = $this->puc_retefuente_compras;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_compras])) ? $aLookup[0][$this->puc_retefuente_compras] : $this->puc_retefuente_compras;
$puc_retefuente_compras_look = (isset($aLookup[0][$this->puc_retefuente_compras])) ? $aLookup[0][$this->puc_retefuente_compras] : $this->puc_retefuente_compras;
?>
<span id="id_read_on_puc_retefuente_compras" class="sc-ui-readonly-puc_retefuente_compras css_puc_retefuente_compras_line" style="<?php echo $sStyleReadLab_puc_retefuente_compras; ?>"><?php echo $this->form_format_readonly("puc_retefuente_compras", str_replace("<", "&lt;", $puc_retefuente_compras_look)); ?></span><span id="id_read_off_puc_retefuente_compras" class="css_read_off_puc_retefuente_compras<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_retefuente_compras; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_retefuente_compras_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_retefuente_compras" type=text name="puc_retefuente_compras" value="<?php echo $this->form_encode_input($puc_retefuente_compras) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_retefuente_compras'] = $this->puc_retefuente_compras;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_compras), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_compras'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_compras])) ? $aLookup[0][$this->puc_retefuente_compras] : '';
$puc_retefuente_compras_look = (isset($aLookup[0][$this->puc_retefuente_compras])) ? $aLookup[0][$this->puc_retefuente_compras] : '';
?>
<select id="id_ac_puc_retefuente_compras" class="scFormObjectOdd sc-ui-autocomp-puc_retefuente_compras css_puc_retefuente_compras_obj sc-js-input"><?php if ('' != $this->puc_retefuente_compras) { ?><option value="<?php echo $this->puc_retefuente_compras ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_retefuente_compras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_retefuente_compras_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['puc_retefuente_servicios_prov']))
    {
        $this->nm_new_label['puc_retefuente_servicios_prov'] = "PUC Retefuente Servicios Prov";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_retefuente_servicios_prov = $this->puc_retefuente_servicios_prov;
   $sStyleHidden_puc_retefuente_servicios_prov = '';
   if (isset($this->nmgp_cmp_hidden['puc_retefuente_servicios_prov']) && $this->nmgp_cmp_hidden['puc_retefuente_servicios_prov'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_retefuente_servicios_prov']);
       $sStyleHidden_puc_retefuente_servicios_prov = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_retefuente_servicios_prov = 'display: none;';
   $sStyleReadInp_puc_retefuente_servicios_prov = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_retefuente_servicios_prov']) && $this->nmgp_cmp_readonly['puc_retefuente_servicios_prov'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_retefuente_servicios_prov']);
       $sStyleReadLab_puc_retefuente_servicios_prov = '';
       $sStyleReadInp_puc_retefuente_servicios_prov = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_retefuente_servicios_prov']) && $this->nmgp_cmp_hidden['puc_retefuente_servicios_prov'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puc_retefuente_servicios_prov" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_prov) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puc_retefuente_servicios_prov_line" id="hidden_field_data_puc_retefuente_servicios_prov" style="<?php echo $sStyleHidden_puc_retefuente_servicios_prov; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_retefuente_servicios_prov_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puc_retefuente_servicios_prov_label" style=""><span id="id_label_puc_retefuente_servicios_prov"><?php echo $this->nm_new_label['puc_retefuente_servicios_prov']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_retefuente_servicios_prov"]) &&  $this->nmgp_cmp_readonly["puc_retefuente_servicios_prov"] == "on") { 

 ?>
<input type="hidden" name="puc_retefuente_servicios_prov" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_prov) . "\">" . $puc_retefuente_servicios_prov . ""; ?>
<?php } else { ?>

<?php
$aRecData['puc_retefuente_servicios_prov'] = $this->puc_retefuente_servicios_prov;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_servicios_prov])) ? $aLookup[0][$this->puc_retefuente_servicios_prov] : $this->puc_retefuente_servicios_prov;
$puc_retefuente_servicios_prov_look = (isset($aLookup[0][$this->puc_retefuente_servicios_prov])) ? $aLookup[0][$this->puc_retefuente_servicios_prov] : $this->puc_retefuente_servicios_prov;
?>
<span id="id_read_on_puc_retefuente_servicios_prov" class="sc-ui-readonly-puc_retefuente_servicios_prov css_puc_retefuente_servicios_prov_line" style="<?php echo $sStyleReadLab_puc_retefuente_servicios_prov; ?>"><?php echo $this->form_format_readonly("puc_retefuente_servicios_prov", str_replace("<", "&lt;", $puc_retefuente_servicios_prov_look)); ?></span><span id="id_read_off_puc_retefuente_servicios_prov" class="css_read_off_puc_retefuente_servicios_prov<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_puc_retefuente_servicios_prov; ?>">
 <input class="sc-js-input scFormObjectOdd css_puc_retefuente_servicios_prov_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_puc_retefuente_servicios_prov" type=text name="puc_retefuente_servicios_prov" value="<?php echo $this->form_encode_input($puc_retefuente_servicios_prov) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> maxlength=16 style="display: none" alt="{datatype: 'text', maxLength: 16, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['puc_retefuente_servicios_prov'] = $this->puc_retefuente_servicios_prov;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $old_value_celular_notificafe = $this->celular_notificafe;
   $old_value_cupo = $this->cupo;
   $old_value_cupodis = $this->cupodis;
   $old_value_dias_credito = $this->dias_credito;
   $old_value_dias_mora = $this->dias_mora;
   $old_value_nacimiento = $this->nacimiento;
   $old_value_fechault = $this->fechault;
   $old_value_saldo = $this->saldo;
   $old_value_afiliacion = $this->afiliacion;
   $old_value_cupo_vendedor = $this->cupo_vendedor;
   $old_value_dias = $this->dias;
   $old_value_fechultcomp = $this->fechultcomp;
   $old_value_saldoapagar = $this->saldoapagar;
   $old_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;
   $unformatted_value_celular_notificafe = $this->celular_notificafe;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_dias_credito = $this->dias_credito;
   $unformatted_value_dias_mora = $this->dias_mora;
   $unformatted_value_nacimiento = $this->nacimiento;
   $unformatted_value_fechault = $this->fechault;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_afiliacion = $this->afiliacion;
   $unformatted_value_cupo_vendedor = $this->cupo_vendedor;
   $unformatted_value_dias = $this->dias;
   $unformatted_value_fechultcomp = $this->fechultcomp;
   $unformatted_value_saldoapagar = $this->saldoapagar;
   $unformatted_value_porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;

   $cliente_val_str = "''";
   if (!empty($this->cliente))
   {
       if (is_array($this->cliente))
       {
           $Tmp_array = $this->cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->cliente);
       }
       $cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $cliente_val_str)
          {
             $cliente_val_str .= ", ";
          }
          $cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $empleado_val_str = "''";
   if (!empty($this->empleado))
   {
       if (is_array($this->empleado))
       {
           $Tmp_array = $this->empleado;
       }
       else
       {
           $Tmp_array = explode(";", $this->empleado);
       }
       $empleado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $empleado_val_str)
          {
             $empleado_val_str .= ", ";
          }
          $empleado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $proveedor_val_str = "''";
   if (!empty($this->proveedor))
   {
       if (is_array($this->proveedor))
       {
           $Tmp_array = $this->proveedor;
       }
       else
       {
           $Tmp_array = explode(";", $this->proveedor);
       }
       $proveedor_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $proveedor_val_str)
          {
             $proveedor_val_str .= ", ";
          }
          $proveedor_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $sucur_cliente_val_str = "''";
   if (!empty($this->sucur_cliente))
   {
       if (is_array($this->sucur_cliente))
       {
           $Tmp_array = $this->sucur_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->sucur_cliente);
       }
       $sucur_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sucur_cliente_val_str)
          {
             $sucur_cliente_val_str .= ", ";
          }
          $sucur_cliente_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_restaurante_val_str = "''";
   if (!empty($this->es_restaurante))
   {
       if (is_array($this->es_restaurante))
       {
           $Tmp_array = $this->es_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_restaurante);
       }
       $es_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_restaurante_val_str)
          {
             $es_restaurante_val_str .= ", ";
          }
          $es_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $notificar_val_str = "''";
   if (!empty($this->notificar))
   {
       if (is_array($this->notificar))
       {
           $Tmp_array = $this->notificar;
       }
       else
       {
           $Tmp_array = explode(";", $this->notificar);
       }
       $notificar_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $notificar_val_str)
          {
             $notificar_val_str .= ", ";
          }
          $notificar_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $es_tecnico_val_str = "''";
   if (!empty($this->es_tecnico))
   {
       if (is_array($this->es_tecnico))
       {
           $Tmp_array = $this->es_tecnico;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_tecnico);
       }
       $es_tecnico_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_tecnico_val_str)
          {
             $es_tecnico_val_str .= ", ";
          }
          $es_tecnico_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre) FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre FROM plancuentas WHERE codigo = '" . substr($this->Db->qstr($this->puc_retefuente_servicios_prov), 1, -1) . "' ORDER BY codigo, nombre";
   }

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;
   $this->celular_notificafe = $old_value_celular_notificafe;
   $this->cupo = $old_value_cupo;
   $this->cupodis = $old_value_cupodis;
   $this->dias_credito = $old_value_dias_credito;
   $this->dias_mora = $old_value_dias_mora;
   $this->nacimiento = $old_value_nacimiento;
   $this->fechault = $old_value_fechault;
   $this->saldo = $old_value_saldo;
   $this->afiliacion = $old_value_afiliacion;
   $this->cupo_vendedor = $old_value_cupo_vendedor;
   $this->dias = $old_value_dias;
   $this->fechultcomp = $old_value_fechultcomp;
   $this->saldoapagar = $old_value_saldoapagar;
   $this->porcentaje_propina_sugerida = $old_value_porcentaje_propina_sugerida;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros']['Lookup_puc_retefuente_servicios_prov'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->puc_retefuente_servicios_prov])) ? $aLookup[0][$this->puc_retefuente_servicios_prov] : '';
$puc_retefuente_servicios_prov_look = (isset($aLookup[0][$this->puc_retefuente_servicios_prov])) ? $aLookup[0][$this->puc_retefuente_servicios_prov] : '';
?>
<select id="id_ac_puc_retefuente_servicios_prov" class="scFormObjectOdd sc-ui-autocomp-puc_retefuente_servicios_prov css_puc_retefuente_servicios_prov_obj sc-js-input"><?php if ('' != $this->puc_retefuente_servicios_prov) { ?><option value="<?php echo $this->puc_retefuente_servicios_prov ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_retefuente_servicios_prov_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_retefuente_servicios_prov_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
