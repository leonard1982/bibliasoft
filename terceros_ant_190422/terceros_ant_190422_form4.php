<div id="terceros_ant_190422_form4" style='<?php echo ($this->tabCssClass["terceros_ant_190422_form4"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_zona_clientes'][] = '0'; 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_ant_190422_lkpedt_refresh_zona_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@terceros_ant_190422@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_ant_190422_lkpedt_refresh_zona_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_clasificacion_clientes'][] = '0'; 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_ant_190422_lkpedt_refresh_clasificacion_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@terceros_ant_190422@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_terceros_ant_190422_lkpedt_refresh_clasificacion_clientes*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_deudores'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_ventas'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_clie'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_auxiliar_proveedores'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_compras'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_puc_retefuente_servicios_prov'][] = $rs->fields[0];
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






<?php $sStyleHidden_puc_auxiliar_proveedores_dumb = ('' == $sStyleHidden_puc_auxiliar_proveedores) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_auxiliar_proveedores_dumb" style="<?php echo $sStyleHidden_puc_auxiliar_proveedores_dumb; ?>"></TD>
<?php $sStyleHidden_puc_retefuente_compras_dumb = ('' == $sStyleHidden_puc_retefuente_compras) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_retefuente_compras_dumb" style="<?php echo $sStyleHidden_puc_retefuente_compras_dumb; ?>"></TD>
<?php $sStyleHidden_puc_retefuente_servicios_prov_dumb = ('' == $sStyleHidden_puc_retefuente_servicios_prov) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_puc_retefuente_servicios_prov_dumb" style="<?php echo $sStyleHidden_puc_retefuente_servicios_prov_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_19"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_19"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_19" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Adicionales Facilweb</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archivo_cedula']))
    {
        $this->nm_new_label['archivo_cedula'] = "Cédula";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archivo_cedula = $this->archivo_cedula;
   $sStyleHidden_archivo_cedula = '';
   if (isset($this->nmgp_cmp_hidden['archivo_cedula']) && $this->nmgp_cmp_hidden['archivo_cedula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archivo_cedula']);
       $sStyleHidden_archivo_cedula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archivo_cedula = 'display: none;';
   $sStyleReadInp_archivo_cedula = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archivo_cedula']) && $this->nmgp_cmp_readonly['archivo_cedula'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archivo_cedula']);
       $sStyleReadLab_archivo_cedula = '';
       $sStyleReadInp_archivo_cedula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archivo_cedula']) && $this->nmgp_cmp_hidden['archivo_cedula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivo_cedula" value="<?php echo $this->form_encode_input($archivo_cedula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archivo_cedula_line" id="hidden_field_data_archivo_cedula" style="<?php echo $sStyleHidden_archivo_cedula; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archivo_cedula_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_archivo_cedula_label" style=""><span id="id_label_archivo_cedula"><?php echo $this->nm_new_label['archivo_cedula']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archivo_cedula"]) &&  $this->nmgp_cmp_readonly["archivo_cedula"] == "on") { 

 ?>
<input type="hidden" name="archivo_cedula" value="<?php echo $this->form_encode_input($archivo_cedula) . "\"><img id=\"archivo_cedula_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_archivo_cedula\"><a href=\"javascript:nm_mostra_doc('1', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_cedula, 3)) . "', 'terceros_ant_190422')\">" . $archivo_cedula . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_archivo_cedula" class="scFormLinkOdd sc-ui-readonly-archivo_cedula css_archivo_cedula_line" style="<?php echo $sStyleReadLab_archivo_cedula; ?>"><?php echo $this->form_format_readonly("archivo_cedula", $this->archivo_cedula) ?></span><span id="id_read_off_archivo_cedula" class="css_read_off_archivo_cedula" style="white-space: nowrap;<?php echo $sStyleReadInp_archivo_cedula; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-archivo_cedula" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_archivo_cedula_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="archivo_cedula[]" id="id_sc_field_archivo_cedula" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_archivo_cedula"<?php if ($this->nmgp_opcao == "novo" || empty($archivo_cedula)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="archivo_cedula_limpa" value="<?php echo $archivo_cedula_limpa . '" '; if ($archivo_cedula_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $archivo_cedula = trim($archivo_cedula); 
   if (!empty($archivo_cedula)) 
   { 
       $nm_img_icone = $this->gera_icone($archivo_cedula); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_archivo_cedula\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="archivo_cedula_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_archivo_cedula"><a href="javascript:nm_mostra_doc('1', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_cedula, 3)); ?>', 'terceros_ant_190422')"><?php echo $archivo_cedula ?></a></span><div id="id_img_loader_archivo_cedula" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_archivo_cedula" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_archivo_cedula" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_archivo_cedula ?>"><i class='root'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivo_cedula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivo_cedula_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archivo_rut']))
    {
        $this->nm_new_label['archivo_rut'] = "RUT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archivo_rut = $this->archivo_rut;
   $sStyleHidden_archivo_rut = '';
   if (isset($this->nmgp_cmp_hidden['archivo_rut']) && $this->nmgp_cmp_hidden['archivo_rut'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archivo_rut']);
       $sStyleHidden_archivo_rut = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archivo_rut = 'display: none;';
   $sStyleReadInp_archivo_rut = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archivo_rut']) && $this->nmgp_cmp_readonly['archivo_rut'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archivo_rut']);
       $sStyleReadLab_archivo_rut = '';
       $sStyleReadInp_archivo_rut = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archivo_rut']) && $this->nmgp_cmp_hidden['archivo_rut'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivo_rut" value="<?php echo $this->form_encode_input($archivo_rut) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archivo_rut_line" id="hidden_field_data_archivo_rut" style="<?php echo $sStyleHidden_archivo_rut; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archivo_rut_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_archivo_rut_label" style=""><span id="id_label_archivo_rut"><?php echo $this->nm_new_label['archivo_rut']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archivo_rut"]) &&  $this->nmgp_cmp_readonly["archivo_rut"] == "on") { 

 ?>
<input type="hidden" name="archivo_rut" value="<?php echo $this->form_encode_input($archivo_rut) . "\"><img id=\"archivo_rut_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_archivo_rut\"><a href=\"javascript:nm_mostra_doc('2', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_rut, 3)) . "', 'terceros_ant_190422')\">" . $archivo_rut . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_archivo_rut" class="scFormLinkOdd sc-ui-readonly-archivo_rut css_archivo_rut_line" style="<?php echo $sStyleReadLab_archivo_rut; ?>"><?php echo $this->form_format_readonly("archivo_rut", $this->archivo_rut) ?></span><span id="id_read_off_archivo_rut" class="css_read_off_archivo_rut" style="white-space: nowrap;<?php echo $sStyleReadInp_archivo_rut; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-archivo_rut" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_archivo_rut_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="archivo_rut[]" id="id_sc_field_archivo_rut" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_archivo_rut"<?php if ($this->nmgp_opcao == "novo" || empty($archivo_rut)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="archivo_rut_limpa" value="<?php echo $archivo_rut_limpa . '" '; if ($archivo_rut_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $archivo_rut = trim($archivo_rut); 
   if (!empty($archivo_rut)) 
   { 
       $nm_img_icone = $this->gera_icone($archivo_rut); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_archivo_rut\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="archivo_rut_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_archivo_rut"><a href="javascript:nm_mostra_doc('2', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_rut, 3)); ?>', 'terceros_ant_190422')"><?php echo $archivo_rut ?></a></span><div id="id_img_loader_archivo_rut" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_archivo_rut" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_archivo_rut" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_archivo_rut ?>"><i class='root'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivo_rut_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivo_rut_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archivo_nit']))
    {
        $this->nm_new_label['archivo_nit'] = "Cámara de Comercio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archivo_nit = $this->archivo_nit;
   $sStyleHidden_archivo_nit = '';
   if (isset($this->nmgp_cmp_hidden['archivo_nit']) && $this->nmgp_cmp_hidden['archivo_nit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archivo_nit']);
       $sStyleHidden_archivo_nit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archivo_nit = 'display: none;';
   $sStyleReadInp_archivo_nit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archivo_nit']) && $this->nmgp_cmp_readonly['archivo_nit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archivo_nit']);
       $sStyleReadLab_archivo_nit = '';
       $sStyleReadInp_archivo_nit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archivo_nit']) && $this->nmgp_cmp_hidden['archivo_nit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivo_nit" value="<?php echo $this->form_encode_input($archivo_nit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archivo_nit_line" id="hidden_field_data_archivo_nit" style="<?php echo $sStyleHidden_archivo_nit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archivo_nit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_archivo_nit_label" style=""><span id="id_label_archivo_nit"><?php echo $this->nm_new_label['archivo_nit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archivo_nit"]) &&  $this->nmgp_cmp_readonly["archivo_nit"] == "on") { 

 ?>
<input type="hidden" name="archivo_nit" value="<?php echo $this->form_encode_input($archivo_nit) . "\"><img id=\"archivo_nit_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_archivo_nit\"><a href=\"javascript:nm_mostra_doc('3', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_nit, 3)) . "', 'terceros_ant_190422')\">" . $archivo_nit . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_archivo_nit" class="scFormLinkOdd sc-ui-readonly-archivo_nit css_archivo_nit_line" style="<?php echo $sStyleReadLab_archivo_nit; ?>"><?php echo $this->form_format_readonly("archivo_nit", $this->archivo_nit) ?></span><span id="id_read_off_archivo_nit" class="css_read_off_archivo_nit" style="white-space: nowrap;<?php echo $sStyleReadInp_archivo_nit; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-archivo_nit" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_archivo_nit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="archivo_nit[]" id="id_sc_field_archivo_nit" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_archivo_nit"<?php if ($this->nmgp_opcao == "novo" || empty($archivo_nit)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="archivo_nit_limpa" value="<?php echo $archivo_nit_limpa . '" '; if ($archivo_nit_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $archivo_nit = trim($archivo_nit); 
   if (!empty($archivo_nit)) 
   { 
       $nm_img_icone = $this->gera_icone($archivo_nit); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_archivo_nit\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="archivo_nit_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_archivo_nit"><a href="javascript:nm_mostra_doc('3', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_nit, 3)); ?>', 'terceros_ant_190422')"><?php echo $archivo_nit ?></a></span><div id="id_img_loader_archivo_nit" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_archivo_nit" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_archivo_nit" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_archivo_nit ?>"><i class='root'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivo_nit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivo_nit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archivo_pago']))
    {
        $this->nm_new_label['archivo_pago'] = "Archivos de Pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archivo_pago = $this->archivo_pago;
   $sStyleHidden_archivo_pago = '';
   if (isset($this->nmgp_cmp_hidden['archivo_pago']) && $this->nmgp_cmp_hidden['archivo_pago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archivo_pago']);
       $sStyleHidden_archivo_pago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archivo_pago = 'display: none;';
   $sStyleReadInp_archivo_pago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archivo_pago']) && $this->nmgp_cmp_readonly['archivo_pago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archivo_pago']);
       $sStyleReadLab_archivo_pago = '';
       $sStyleReadInp_archivo_pago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archivo_pago']) && $this->nmgp_cmp_hidden['archivo_pago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivo_pago" value="<?php echo $this->form_encode_input($archivo_pago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archivo_pago_line" id="hidden_field_data_archivo_pago" style="<?php echo $sStyleHidden_archivo_pago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archivo_pago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_archivo_pago_label" style=""><span id="id_label_archivo_pago"><?php echo $this->nm_new_label['archivo_pago']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archivo_pago"]) &&  $this->nmgp_cmp_readonly["archivo_pago"] == "on") { 

 ?>
<input type="hidden" name="archivo_pago" value="<?php echo $this->form_encode_input($archivo_pago) . "\"><img id=\"archivo_pago_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_archivo_pago\"><a href=\"javascript:nm_mostra_doc('4', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_pago, 3)) . "', 'terceros_ant_190422')\">" . $archivo_pago . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_archivo_pago" class="scFormLinkOdd sc-ui-readonly-archivo_pago css_archivo_pago_line" style="<?php echo $sStyleReadLab_archivo_pago; ?>"><?php echo $this->form_format_readonly("archivo_pago", $this->archivo_pago) ?></span><span id="id_read_off_archivo_pago" class="css_read_off_archivo_pago" style="white-space: nowrap;<?php echo $sStyleReadInp_archivo_pago; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-archivo_pago" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_archivo_pago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="archivo_pago[]" id="id_sc_field_archivo_pago" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_archivo_pago"<?php if ($this->nmgp_opcao == "novo" || empty($archivo_pago)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="archivo_pago_limpa" value="<?php echo $archivo_pago_limpa . '" '; if ($archivo_pago_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $archivo_pago = trim($archivo_pago); 
   if (!empty($archivo_pago)) 
   { 
       $nm_img_icone = $this->gera_icone($archivo_pago); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_archivo_pago\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="archivo_pago_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_archivo_pago"><a href="javascript:nm_mostra_doc('4', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_archivo_pago, 3)); ?>', 'terceros_ant_190422')"><?php echo $archivo_pago ?></a></span><div id="id_img_loader_archivo_pago" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_archivo_pago" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_archivo_pago" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_archivo_pago ?>"><i class='root'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivo_pago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivo_pago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_plan']))
   {
       $this->nm_new_label['id_plan'] = "Plan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_plan = $this->id_plan;
   $sStyleHidden_id_plan = '';
   if (isset($this->nmgp_cmp_hidden['id_plan']) && $this->nmgp_cmp_hidden['id_plan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_plan']);
       $sStyleHidden_id_plan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_plan = 'display: none;';
   $sStyleReadInp_id_plan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_plan']) && $this->nmgp_cmp_readonly['id_plan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_plan']);
       $sStyleReadLab_id_plan = '';
       $sStyleReadInp_id_plan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_plan']) && $this->nmgp_cmp_hidden['id_plan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_plan" value="<?php echo $this->form_encode_input($this->id_plan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_plan_line" id="hidden_field_data_id_plan" style="<?php echo $sStyleHidden_id_plan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_plan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_plan_label" style=""><span id="id_label_id_plan"><?php echo $this->nm_new_label['id_plan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_plan"]) &&  $this->nmgp_cmp_readonly["id_plan"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'] = array(); 
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
   $old_value_valor_plan = $this->valor_plan;
   $old_value_fecha_registro_fe = $this->fecha_registro_fe;
   $old_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $old_value_n_trabajadores = $this->n_trabajadores;
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
   $unformatted_value_valor_plan = $this->valor_plan;
   $unformatted_value_fecha_registro_fe = $this->fecha_registro_fe;
   $unformatted_value_fecha_registro_fe_hora = $this->fecha_registro_fe_hora;
   $unformatted_value_n_trabajadores = $this->n_trabajadores;
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
   $si_nomina_val_str = "''";
   if (!empty($this->si_nomina))
   {
       if (is_array($this->si_nomina))
       {
           $Tmp_array = $this->si_nomina;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_nomina);
       }
       $si_nomina_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_nomina_val_str)
          {
             $si_nomina_val_str .= ", ";
          }
          $si_nomina_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $si_factura_electronica_val_str = "''";
   if (!empty($this->si_factura_electronica))
   {
       if (is_array($this->si_factura_electronica))
       {
           $Tmp_array = $this->si_factura_electronica;
       }
       else
       {
           $Tmp_array = explode(";", $this->si_factura_electronica);
       }
       $si_factura_electronica_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $si_factura_electronica_val_str)
          {
             $si_factura_electronica_val_str .= ", ";
          }
          $si_factura_electronica_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + ' - ' + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar,' - ',nompro)  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&' - '&nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||' - '||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + ' - ' + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||' - '||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||' - '||nompro  FROM productos  ORDER BY codigobar, nompro";
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
   $this->valor_plan = $old_value_valor_plan;
   $this->fecha_registro_fe = $old_value_fecha_registro_fe;
   $this->fecha_registro_fe_hora = $old_value_fecha_registro_fe_hora;
   $this->n_trabajadores = $old_value_n_trabajadores;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'][] = $rs->fields[0];
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
   $id_plan_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_plan_1))
          {
              foreach ($this->id_plan_1 as $tmp_id_plan)
              {
                  if (trim($tmp_id_plan) === trim($cadaselect[1])) { $id_plan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_plan) === trim($cadaselect[1])) { $id_plan_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_plan" value="<?php echo $this->form_encode_input($id_plan) . "\">" . $id_plan_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_plan();
   $x = 0 ; 
   $id_plan_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_plan_1))
          {
              foreach ($this->id_plan_1 as $tmp_id_plan)
              {
                  if (trim($tmp_id_plan) === trim($cadaselect[1])) { $id_plan_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_plan) === trim($cadaselect[1])) { $id_plan_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_plan_look))
          {
              $id_plan_look = $this->id_plan;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_plan\" class=\"css_id_plan_line\" style=\"" .  $sStyleReadLab_id_plan . "\">" . $this->form_format_readonly("id_plan", $this->form_encode_input($id_plan_look)) . "</span><span id=\"id_read_off_id_plan\" class=\"css_read_off_id_plan" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_plan . "\">";
   echo " <span id=\"idAjaxSelect_id_plan\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_plan_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_plan\" name=\"id_plan\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_id_plan'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_plan) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_plan)) 
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
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_plan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_plan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_plan']))
    {
        $this->nm_new_label['valor_plan'] = "Valor Plan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_plan = $this->valor_plan;
   $sStyleHidden_valor_plan = '';
   if (isset($this->nmgp_cmp_hidden['valor_plan']) && $this->nmgp_cmp_hidden['valor_plan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_plan']);
       $sStyleHidden_valor_plan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_plan = 'display: none;';
   $sStyleReadInp_valor_plan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_plan']) && $this->nmgp_cmp_readonly['valor_plan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_plan']);
       $sStyleReadLab_valor_plan = '';
       $sStyleReadInp_valor_plan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_plan']) && $this->nmgp_cmp_hidden['valor_plan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_plan" value="<?php echo $this->form_encode_input($valor_plan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_plan_line" id="hidden_field_data_valor_plan" style="<?php echo $sStyleHidden_valor_plan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_plan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_plan_label" style=""><span id="id_label_valor_plan"><?php echo $this->nm_new_label['valor_plan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_plan"]) &&  $this->nmgp_cmp_readonly["valor_plan"] == "on") { 

 ?>
<input type="hidden" name="valor_plan" value="<?php echo $this->form_encode_input($valor_plan) . "\">" . $valor_plan . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_plan" class="sc-ui-readonly-valor_plan css_valor_plan_line" style="<?php echo $sStyleReadLab_valor_plan; ?>"><?php echo $this->form_format_readonly("valor_plan", $this->form_encode_input($this->valor_plan)); ?></span><span id="id_read_off_valor_plan" class="css_read_off_valor_plan<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_plan; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_plan_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_plan" type=text name="valor_plan" value="<?php echo $this->form_encode_input($valor_plan) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_plan']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_plan']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_plan']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_plan']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_plan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_plan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_registro_fe']))
    {
        $this->nm_new_label['fecha_registro_fe'] = "Fecha Registro Fe";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_registro_fe = $this->fecha_registro_fe;
   if (strlen($this->fecha_registro_fe_hora) > 8 ) {$this->fecha_registro_fe_hora = substr($this->fecha_registro_fe_hora, 0, 8);}
   $this->fecha_registro_fe .= ' ' . $this->fecha_registro_fe_hora;
   $this->fecha_registro_fe  = trim($this->fecha_registro_fe);
   $fecha_registro_fe = $this->fecha_registro_fe;
   $sStyleHidden_fecha_registro_fe = '';
   if (isset($this->nmgp_cmp_hidden['fecha_registro_fe']) && $this->nmgp_cmp_hidden['fecha_registro_fe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_registro_fe']);
       $sStyleHidden_fecha_registro_fe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_registro_fe = 'display: none;';
   $sStyleReadInp_fecha_registro_fe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_registro_fe']) && $this->nmgp_cmp_readonly['fecha_registro_fe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_registro_fe']);
       $sStyleReadLab_fecha_registro_fe = '';
       $sStyleReadInp_fecha_registro_fe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_registro_fe']) && $this->nmgp_cmp_hidden['fecha_registro_fe'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_registro_fe" value="<?php echo $this->form_encode_input($fecha_registro_fe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_registro_fe_line" id="hidden_field_data_fecha_registro_fe" style="<?php echo $sStyleHidden_fecha_registro_fe; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_registro_fe_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_registro_fe_label" style=""><span id="id_label_fecha_registro_fe"><?php echo $this->nm_new_label['fecha_registro_fe']; ?></span></span><br><input type="hidden" name="fecha_registro_fe" value="<?php echo $this->form_encode_input($fecha_registro_fe); ?>"><span id="id_ajax_label_fecha_registro_fe"><?php echo nl2br($fecha_registro_fe); ?></span>
<?php
$tmp_form_data = $this->field_config['fecha_registro_fe']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_registro_fe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_registro_fe_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha_registro_fe = $old_dt_fecha_registro_fe;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_contador']))
    {
        $this->nm_new_label['nombre_contador'] = "Nombre Contador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_contador = $this->nombre_contador;
   $sStyleHidden_nombre_contador = '';
   if (isset($this->nmgp_cmp_hidden['nombre_contador']) && $this->nmgp_cmp_hidden['nombre_contador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_contador']);
       $sStyleHidden_nombre_contador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_contador = 'display: none;';
   $sStyleReadInp_nombre_contador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_contador']) && $this->nmgp_cmp_readonly['nombre_contador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_contador']);
       $sStyleReadLab_nombre_contador = '';
       $sStyleReadInp_nombre_contador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_contador']) && $this->nmgp_cmp_hidden['nombre_contador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_contador" value="<?php echo $this->form_encode_input($nombre_contador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_contador_line" id="hidden_field_data_nombre_contador" style="<?php echo $sStyleHidden_nombre_contador; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_contador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_contador_label" style=""><span id="id_label_nombre_contador"><?php echo $this->nm_new_label['nombre_contador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_contador"]) &&  $this->nmgp_cmp_readonly["nombre_contador"] == "on") { 

 ?>
<input type="hidden" name="nombre_contador" value="<?php echo $this->form_encode_input($nombre_contador) . "\">" . $nombre_contador . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_contador" class="sc-ui-readonly-nombre_contador css_nombre_contador_line" style="<?php echo $sStyleReadLab_nombre_contador; ?>"><?php echo $this->form_format_readonly("nombre_contador", $this->form_encode_input($this->nombre_contador)); ?></span><span id="id_read_off_nombre_contador" class="css_read_off_nombre_contador<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_contador; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_contador_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_contador" type=text name="nombre_contador" value="<?php echo $this->form_encode_input($nombre_contador) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_contador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_contador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estado']))
   {
       $this->nm_new_label['estado'] = "Estado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estado" value="<?php echo $this->form_encode_input($this->estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_label" style=""><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

$estado_look = "";
 if ($this->estado == "PENDIENTE") { $estado_look .= "PENDIENTE" ;} 
 if ($this->estado == "ASIGNADO") { $estado_look .= "ASIGNADO" ;} 
 if ($this->estado == "PRODUCCION") { $estado_look .= "PRODUCCION" ;} 
 if ($this->estado == "SUSPENDIDO") { $estado_look .= "SUSPENDIDO" ;} 
 if ($this->estado == "INACTIVO") { $estado_look .= "INACTIVO" ;} 
 if (empty($estado_look)) { $estado_look = $this->estado; }
?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado_look . ""; ?>
<?php } else { ?>
<?php

$estado_look = "";
 if ($this->estado == "PENDIENTE") { $estado_look .= "PENDIENTE" ;} 
 if ($this->estado == "ASIGNADO") { $estado_look .= "ASIGNADO" ;} 
 if ($this->estado == "PRODUCCION") { $estado_look .= "PRODUCCION" ;} 
 if ($this->estado == "SUSPENDIDO") { $estado_look .= "SUSPENDIDO" ;} 
 if ($this->estado == "INACTIVO") { $estado_look .= "INACTIVO" ;} 
 if (empty($estado_look)) { $estado_look = $this->estado; }
?>
<span id="id_read_on_estado" class="css_estado_line"  style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->form_format_readonly("estado", $this->form_encode_input($estado_look)); ?></span><span id="id_read_off_estado" class="css_read_off_estado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_estado; ?>">
 <span id="idAjaxSelect_estado" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_estado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado" name="estado" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = ''; ?>
 <option value="">SIN ESTADO</option>
 <option  value="PENDIENTE" <?php  if ($this->estado == "PENDIENTE") { echo " selected" ;} ?>>PENDIENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = 'PENDIENTE'; ?>
 <option  value="ASIGNADO" <?php  if ($this->estado == "ASIGNADO") { echo " selected" ;} ?>>ASIGNADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = 'ASIGNADO'; ?>
 <option  value="PRODUCCION" <?php  if ($this->estado == "PRODUCCION") { echo " selected" ;} ?>>PRODUCCION</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = 'PRODUCCION'; ?>
 <option  value="SUSPENDIDO" <?php  if ($this->estado == "SUSPENDIDO") { echo " selected" ;} ?>>SUSPENDIDO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = 'SUSPENDIDO'; ?>
 <option  value="INACTIVO" <?php  if ($this->estado == "INACTIVO") { echo " selected" ;} ?>>INACTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_estado'][] = 'INACTIVO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['si_nomina']))
   {
       $this->nm_new_label['si_nomina'] = "Nómina";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $si_nomina = $this->si_nomina;
   $sStyleHidden_si_nomina = '';
   if (isset($this->nmgp_cmp_hidden['si_nomina']) && $this->nmgp_cmp_hidden['si_nomina'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['si_nomina']);
       $sStyleHidden_si_nomina = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_si_nomina = 'display: none;';
   $sStyleReadInp_si_nomina = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['si_nomina']) && $this->nmgp_cmp_readonly['si_nomina'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['si_nomina']);
       $sStyleReadLab_si_nomina = '';
       $sStyleReadInp_si_nomina = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['si_nomina']) && $this->nmgp_cmp_hidden['si_nomina'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="si_nomina" value="<?php echo $this->form_encode_input($this->si_nomina) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->si_nomina_1 = explode(";", trim($this->si_nomina));
  } 
  else
  {
      if (empty($this->si_nomina))
      {
          $this->si_nomina_1= array(); 
          $this->si_nomina= "NO";
      } 
      else
      {
          $this->si_nomina_1= $this->si_nomina; 
          $this->si_nomina= ""; 
          foreach ($this->si_nomina_1 as $cada_si_nomina)
          {
             if (!empty($si_nomina))
             {
                 $this->si_nomina.= ";"; 
             } 
             $this->si_nomina.= $cada_si_nomina; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_si_nomina_line" id="hidden_field_data_si_nomina" style="<?php echo $sStyleHidden_si_nomina; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_si_nomina_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_si_nomina_label" style=""><span id="id_label_si_nomina"><?php echo $this->nm_new_label['si_nomina']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["si_nomina"]) &&  $this->nmgp_cmp_readonly["si_nomina"] == "on") { 

$si_nomina_look = "";
 if ($this->si_nomina == "SI") { $si_nomina_look .= "SI" ;} 
 if (empty($si_nomina_look)) { $si_nomina_look = $this->si_nomina; }
?>
<input type="hidden" name="si_nomina" value="<?php echo $this->form_encode_input($si_nomina) . "\">" . $si_nomina_look . ""; ?>
<?php } else { ?>

<?php

$si_nomina_look = "";
 if ($this->si_nomina == "SI") { $si_nomina_look .= "SI" ;} 
 if (empty($si_nomina_look)) { $si_nomina_look = $this->si_nomina; }
?>
<span id="id_read_on_si_nomina" class="css_si_nomina_line" style="<?php echo $sStyleReadLab_si_nomina; ?>"><?php echo $this->form_format_readonly("si_nomina", $this->form_encode_input($si_nomina_look)); ?></span><span id="id_read_off_si_nomina" class="css_read_off_si_nomina css_si_nomina_line" style="<?php echo $sStyleReadInp_si_nomina; ?>"><?php echo "<div id=\"idAjaxCheckbox_si_nomina\" style=\"display: inline-block\" class=\"css_si_nomina_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_si_nomina_line"><?php $tempOptionId = "id-opt-si_nomina" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-si_nomina sc-ui-checkbox-si_nomina sc-js-input" name="si_nomina[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_si_nomina'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->si_nomina_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span class="scFormDataTagOdd" style="display: block">Si el cliente va a usar nómina</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_si_nomina_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_si_nomina_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['n_trabajadores']))
    {
        $this->nm_new_label['n_trabajadores'] = "Número de Empleados";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $n_trabajadores = $this->n_trabajadores;
   $sStyleHidden_n_trabajadores = '';
   if (isset($this->nmgp_cmp_hidden['n_trabajadores']) && $this->nmgp_cmp_hidden['n_trabajadores'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['n_trabajadores']);
       $sStyleHidden_n_trabajadores = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_n_trabajadores = 'display: none;';
   $sStyleReadInp_n_trabajadores = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['n_trabajadores']) && $this->nmgp_cmp_readonly['n_trabajadores'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['n_trabajadores']);
       $sStyleReadLab_n_trabajadores = '';
       $sStyleReadInp_n_trabajadores = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['n_trabajadores']) && $this->nmgp_cmp_hidden['n_trabajadores'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="n_trabajadores" value="<?php echo $this->form_encode_input($n_trabajadores) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_n_trabajadores_line" id="hidden_field_data_n_trabajadores" style="<?php echo $sStyleHidden_n_trabajadores; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_n_trabajadores_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_n_trabajadores_label" style=""><span id="id_label_n_trabajadores"><?php echo $this->nm_new_label['n_trabajadores']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["n_trabajadores"]) &&  $this->nmgp_cmp_readonly["n_trabajadores"] == "on") { 

 ?>
<input type="hidden" name="n_trabajadores" value="<?php echo $this->form_encode_input($n_trabajadores) . "\">" . $n_trabajadores . ""; ?>
<?php } else { ?>
<span id="id_read_on_n_trabajadores" class="sc-ui-readonly-n_trabajadores css_n_trabajadores_line" style="<?php echo $sStyleReadLab_n_trabajadores; ?>"><?php echo $this->form_format_readonly("n_trabajadores", $this->form_encode_input($this->n_trabajadores)); ?></span><span id="id_read_off_n_trabajadores" class="css_read_off_n_trabajadores<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_n_trabajadores; ?>">
 <input class="sc-js-input scFormObjectOdd css_n_trabajadores_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_n_trabajadores" type=text name="n_trabajadores" value="<?php echo $this->form_encode_input($n_trabajadores) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['n_trabajadores']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['n_trabajadores']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['n_trabajadores']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('n_trabajadores')", "nm_mostra_mens('n_trabajadores')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_n_trabajadores_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_n_trabajadores_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['si_factura_electronica']))
   {
       $this->nm_new_label['si_factura_electronica'] = "Factura Electrónica";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $si_factura_electronica = $this->si_factura_electronica;
   $sStyleHidden_si_factura_electronica = '';
   if (isset($this->nmgp_cmp_hidden['si_factura_electronica']) && $this->nmgp_cmp_hidden['si_factura_electronica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['si_factura_electronica']);
       $sStyleHidden_si_factura_electronica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_si_factura_electronica = 'display: none;';
   $sStyleReadInp_si_factura_electronica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['si_factura_electronica']) && $this->nmgp_cmp_readonly['si_factura_electronica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['si_factura_electronica']);
       $sStyleReadLab_si_factura_electronica = '';
       $sStyleReadInp_si_factura_electronica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['si_factura_electronica']) && $this->nmgp_cmp_hidden['si_factura_electronica'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="si_factura_electronica" value="<?php echo $this->form_encode_input($this->si_factura_electronica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->si_factura_electronica_1 = explode(";", trim($this->si_factura_electronica));
  } 
  else
  {
      if (empty($this->si_factura_electronica))
      {
          $this->si_factura_electronica_1= array(); 
          $this->si_factura_electronica= "NO";
      } 
      else
      {
          $this->si_factura_electronica_1= $this->si_factura_electronica; 
          $this->si_factura_electronica= ""; 
          foreach ($this->si_factura_electronica_1 as $cada_si_factura_electronica)
          {
             if (!empty($si_factura_electronica))
             {
                 $this->si_factura_electronica.= ";"; 
             } 
             $this->si_factura_electronica.= $cada_si_factura_electronica; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_si_factura_electronica_line" id="hidden_field_data_si_factura_electronica" style="<?php echo $sStyleHidden_si_factura_electronica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_si_factura_electronica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_si_factura_electronica_label" style=""><span id="id_label_si_factura_electronica"><?php echo $this->nm_new_label['si_factura_electronica']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["si_factura_electronica"]) &&  $this->nmgp_cmp_readonly["si_factura_electronica"] == "on") { 

$si_factura_electronica_look = "";
 if ($this->si_factura_electronica == "SI") { $si_factura_electronica_look .= "SI" ;} 
 if (empty($si_factura_electronica_look)) { $si_factura_electronica_look = $this->si_factura_electronica; }
?>
<input type="hidden" name="si_factura_electronica" value="<?php echo $this->form_encode_input($si_factura_electronica) . "\">" . $si_factura_electronica_look . ""; ?>
<?php } else { ?>

<?php

$si_factura_electronica_look = "";
 if ($this->si_factura_electronica == "SI") { $si_factura_electronica_look .= "SI" ;} 
 if (empty($si_factura_electronica_look)) { $si_factura_electronica_look = $this->si_factura_electronica; }
?>
<span id="id_read_on_si_factura_electronica" class="css_si_factura_electronica_line" style="<?php echo $sStyleReadLab_si_factura_electronica; ?>"><?php echo $this->form_format_readonly("si_factura_electronica", $this->form_encode_input($si_factura_electronica_look)); ?></span><span id="id_read_off_si_factura_electronica" class="css_read_off_si_factura_electronica css_si_factura_electronica_line" style="<?php echo $sStyleReadInp_si_factura_electronica; ?>"><?php echo "<div id=\"idAjaxCheckbox_si_factura_electronica\" style=\"display: inline-block\" class=\"css_si_factura_electronica_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_si_factura_electronica_line"><?php $tempOptionId = "id-opt-si_factura_electronica" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-si_factura_electronica sc-ui-checkbox-si_factura_electronica sc-js-input" name="si_factura_electronica[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_ant_190422']['Lookup_si_factura_electronica'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->si_factura_electronica_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span class="scFormDataTagOdd" style="display: block">Si el cliente va a usar facturación electrónica</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_si_factura_electronica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_si_factura_electronica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_empresa_bd']))
    {
        $this->nm_new_label['nombre_empresa_bd'] = "Nombre Empresa BD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_empresa_bd = $this->nombre_empresa_bd;
   $sStyleHidden_nombre_empresa_bd = '';
   if (isset($this->nmgp_cmp_hidden['nombre_empresa_bd']) && $this->nmgp_cmp_hidden['nombre_empresa_bd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_empresa_bd']);
       $sStyleHidden_nombre_empresa_bd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_empresa_bd = 'display: none;';
   $sStyleReadInp_nombre_empresa_bd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_empresa_bd']) && $this->nmgp_cmp_readonly['nombre_empresa_bd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_empresa_bd']);
       $sStyleReadLab_nombre_empresa_bd = '';
       $sStyleReadInp_nombre_empresa_bd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_empresa_bd']) && $this->nmgp_cmp_hidden['nombre_empresa_bd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_empresa_bd" value="<?php echo $this->form_encode_input($nombre_empresa_bd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_empresa_bd_line" id="hidden_field_data_nombre_empresa_bd" style="<?php echo $sStyleHidden_nombre_empresa_bd; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_empresa_bd_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_empresa_bd_label" style=""><span id="id_label_nombre_empresa_bd"><?php echo $this->nm_new_label['nombre_empresa_bd']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_empresa_bd"]) &&  $this->nmgp_cmp_readonly["nombre_empresa_bd"] == "on") { 

 ?>
<input type="hidden" name="nombre_empresa_bd" value="<?php echo $this->form_encode_input($nombre_empresa_bd) . "\">" . $nombre_empresa_bd . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_empresa_bd" class="sc-ui-readonly-nombre_empresa_bd css_nombre_empresa_bd_line" style="<?php echo $sStyleReadLab_nombre_empresa_bd; ?>"><?php echo $this->form_format_readonly("nombre_empresa_bd", $this->form_encode_input($this->nombre_empresa_bd)); ?></span><span id="id_read_off_nombre_empresa_bd" class="css_read_off_nombre_empresa_bd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_empresa_bd; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_empresa_bd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_empresa_bd" type=text name="nombre_empresa_bd" value="<?php echo $this->form_encode_input($nombre_empresa_bd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz ") ?>', lettersCase: 'lower', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormDataTagOdd" style="display: block">El nombre de la base de datos en Mysql que va a tener el cliente</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_empresa_bd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_empresa_bd_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
