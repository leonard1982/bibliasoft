<div id="form_cloud_empresas_mob_form2" style='<?php echo ($this->tabCssClass["form_cloud_empresas_mob_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_empresa']))
   {
       $this->nmgp_cmp_hidden['id_empresa'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['url_validar_licencia']))
   {
       $this->nmgp_cmp_hidden['url_validar_licencia'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_empresa']))
           {
               $this->nmgp_cmp_readonly['id_empresa'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Servidor Envío de Correo</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['enviar_documento_online']))
   {
       $this->nm_new_label['enviar_documento_online'] = "Enviar Documento Online";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enviar_documento_online = $this->enviar_documento_online;
   $sStyleHidden_enviar_documento_online = '';
   if (isset($this->nmgp_cmp_hidden['enviar_documento_online']) && $this->nmgp_cmp_hidden['enviar_documento_online'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enviar_documento_online']);
       $sStyleHidden_enviar_documento_online = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enviar_documento_online = 'display: none;';
   $sStyleReadInp_enviar_documento_online = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enviar_documento_online']) && $this->nmgp_cmp_readonly['enviar_documento_online'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enviar_documento_online']);
       $sStyleReadLab_enviar_documento_online = '';
       $sStyleReadInp_enviar_documento_online = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enviar_documento_online']) && $this->nmgp_cmp_hidden['enviar_documento_online'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="enviar_documento_online" value="<?php echo $this->form_encode_input($this->enviar_documento_online) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->enviar_documento_online_1 = explode(";", trim($this->enviar_documento_online));
  } 
  else
  {
      if (empty($this->enviar_documento_online))
      {
          $this->enviar_documento_online_1= array(); 
          $this->enviar_documento_online= "NO";
      } 
      else
      {
          $this->enviar_documento_online_1= $this->enviar_documento_online; 
          $this->enviar_documento_online= ""; 
          foreach ($this->enviar_documento_online_1 as $cada_enviar_documento_online)
          {
             if (!empty($enviar_documento_online))
             {
                 $this->enviar_documento_online.= ";"; 
             } 
             $this->enviar_documento_online.= $cada_enviar_documento_online; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_enviar_documento_online_line" id="hidden_field_data_enviar_documento_online" style="<?php echo $sStyleHidden_enviar_documento_online; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_documento_online_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_documento_online_label" style=""><span id="id_label_enviar_documento_online"><?php echo $this->nm_new_label['enviar_documento_online']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_documento_online"]) &&  $this->nmgp_cmp_readonly["enviar_documento_online"] == "on") { 

$enviar_documento_online_look = "";
 if ($this->enviar_documento_online == "SI") { $enviar_documento_online_look .= "SI" ;} 
 if (empty($enviar_documento_online_look)) { $enviar_documento_online_look = $this->enviar_documento_online; }
?>
<input type="hidden" name="enviar_documento_online" value="<?php echo $this->form_encode_input($enviar_documento_online) . "\">" . $enviar_documento_online_look . ""; ?>
<?php } else { ?>

<?php

$enviar_documento_online_look = "";
 if ($this->enviar_documento_online == "SI") { $enviar_documento_online_look .= "SI" ;} 
 if (empty($enviar_documento_online_look)) { $enviar_documento_online_look = $this->enviar_documento_online; }
?>
<span id="id_read_on_enviar_documento_online" class="css_enviar_documento_online_line" style="<?php echo $sStyleReadLab_enviar_documento_online; ?>"><?php echo $this->form_format_readonly("enviar_documento_online", $this->form_encode_input($enviar_documento_online_look)); ?></span><span id="id_read_off_enviar_documento_online" class="css_read_off_enviar_documento_online css_enviar_documento_online_line" style="<?php echo $sStyleReadInp_enviar_documento_online; ?>"><?php echo "<div id=\"idAjaxCheckbox_enviar_documento_online\" style=\"display: inline-block\" class=\"css_enviar_documento_online_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_enviar_documento_online_line"><?php $tempOptionId = "id-opt-enviar_documento_online" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-enviar_documento_online sc-ui-checkbox-enviar_documento_online" name="enviar_documento_online[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_documento_online'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->enviar_documento_online_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enviar_documento_online_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enviar_documento_online_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['smtp_tipo']))
   {
       $this->nm_new_label['smtp_tipo'] = "Tipo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $smtp_tipo = $this->smtp_tipo;
   $sStyleHidden_smtp_tipo = '';
   if (isset($this->nmgp_cmp_hidden['smtp_tipo']) && $this->nmgp_cmp_hidden['smtp_tipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['smtp_tipo']);
       $sStyleHidden_smtp_tipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_smtp_tipo = 'display: none;';
   $sStyleReadInp_smtp_tipo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['smtp_tipo']) && $this->nmgp_cmp_readonly['smtp_tipo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['smtp_tipo']);
       $sStyleReadLab_smtp_tipo = '';
       $sStyleReadInp_smtp_tipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['smtp_tipo']) && $this->nmgp_cmp_hidden['smtp_tipo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="smtp_tipo" value="<?php echo $this->form_encode_input($this->smtp_tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_smtp_tipo_line" id="hidden_field_data_smtp_tipo" style="<?php echo $sStyleHidden_smtp_tipo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_smtp_tipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_smtp_tipo_label" style=""><span id="id_label_smtp_tipo"><?php echo $this->nm_new_label['smtp_tipo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["smtp_tipo"]) &&  $this->nmgp_cmp_readonly["smtp_tipo"] == "on") { 

$smtp_tipo_look = "";
 if ($this->smtp_tipo == "NO") { $smtp_tipo_look .= "NO" ;} 
 if ($this->smtp_tipo == "S") { $smtp_tipo_look .= "SSL" ;} 
 if ($this->smtp_tipo == "T") { $smtp_tipo_look .= "TLS" ;} 
 if (empty($smtp_tipo_look)) { $smtp_tipo_look = $this->smtp_tipo; }
?>
<input type="hidden" name="smtp_tipo" value="<?php echo $this->form_encode_input($smtp_tipo) . "\">" . $smtp_tipo_look . ""; ?>
<?php } else { ?>
<?php

$smtp_tipo_look = "";
 if ($this->smtp_tipo == "NO") { $smtp_tipo_look .= "NO" ;} 
 if ($this->smtp_tipo == "S") { $smtp_tipo_look .= "SSL" ;} 
 if ($this->smtp_tipo == "T") { $smtp_tipo_look .= "TLS" ;} 
 if (empty($smtp_tipo_look)) { $smtp_tipo_look = $this->smtp_tipo; }
?>
<span id="id_read_on_smtp_tipo" class="css_smtp_tipo_line"  style="<?php echo $sStyleReadLab_smtp_tipo; ?>"><?php echo $this->form_format_readonly("smtp_tipo", $this->form_encode_input($smtp_tipo_look)); ?></span><span id="id_read_off_smtp_tipo" class="css_read_off_smtp_tipo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_smtp_tipo; ?>">
 <span id="idAjaxSelect_smtp_tipo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_smtp_tipo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_smtp_tipo" name="smtp_tipo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="NO" <?php  if ($this->smtp_tipo == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'NO'; ?>
 <option  value="S" <?php  if ($this->smtp_tipo == "S") { echo " selected" ;} ?>>SSL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'S'; ?>
 <option  value="T" <?php  if ($this->smtp_tipo == "T") { echo " selected" ;} ?>>TLS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'T'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_smtp_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_smtp_tipo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['smtp_servidor']))
    {
        $this->nm_new_label['smtp_servidor'] = "Servidor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $smtp_servidor = $this->smtp_servidor;
   $sStyleHidden_smtp_servidor = '';
   if (isset($this->nmgp_cmp_hidden['smtp_servidor']) && $this->nmgp_cmp_hidden['smtp_servidor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['smtp_servidor']);
       $sStyleHidden_smtp_servidor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_smtp_servidor = 'display: none;';
   $sStyleReadInp_smtp_servidor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['smtp_servidor']) && $this->nmgp_cmp_readonly['smtp_servidor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['smtp_servidor']);
       $sStyleReadLab_smtp_servidor = '';
       $sStyleReadInp_smtp_servidor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['smtp_servidor']) && $this->nmgp_cmp_hidden['smtp_servidor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="smtp_servidor" value="<?php echo $this->form_encode_input($smtp_servidor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_smtp_servidor_line" id="hidden_field_data_smtp_servidor" style="<?php echo $sStyleHidden_smtp_servidor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_smtp_servidor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_smtp_servidor_label" style=""><span id="id_label_smtp_servidor"><?php echo $this->nm_new_label['smtp_servidor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["smtp_servidor"]) &&  $this->nmgp_cmp_readonly["smtp_servidor"] == "on") { 

 ?>
<input type="hidden" name="smtp_servidor" value="<?php echo $this->form_encode_input($smtp_servidor) . "\">" . $smtp_servidor . ""; ?>
<?php } else { ?>
<span id="id_read_on_smtp_servidor" class="sc-ui-readonly-smtp_servidor css_smtp_servidor_line" style="<?php echo $sStyleReadLab_smtp_servidor; ?>"><?php echo $this->form_format_readonly("smtp_servidor", $this->form_encode_input($this->smtp_servidor)); ?></span><span id="id_read_off_smtp_servidor" class="css_read_off_smtp_servidor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_smtp_servidor; ?>">
 <input class="sc-js-input scFormObjectOdd css_smtp_servidor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_smtp_servidor" type=text name="smtp_servidor" value="<?php echo $this->form_encode_input($smtp_servidor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_smtp_servidor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_smtp_servidor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['smtp_puerto']))
    {
        $this->nm_new_label['smtp_puerto'] = "Puerto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $smtp_puerto = $this->smtp_puerto;
   $sStyleHidden_smtp_puerto = '';
   if (isset($this->nmgp_cmp_hidden['smtp_puerto']) && $this->nmgp_cmp_hidden['smtp_puerto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['smtp_puerto']);
       $sStyleHidden_smtp_puerto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_smtp_puerto = 'display: none;';
   $sStyleReadInp_smtp_puerto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['smtp_puerto']) && $this->nmgp_cmp_readonly['smtp_puerto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['smtp_puerto']);
       $sStyleReadLab_smtp_puerto = '';
       $sStyleReadInp_smtp_puerto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['smtp_puerto']) && $this->nmgp_cmp_hidden['smtp_puerto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="smtp_puerto" value="<?php echo $this->form_encode_input($smtp_puerto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_smtp_puerto_line" id="hidden_field_data_smtp_puerto" style="<?php echo $sStyleHidden_smtp_puerto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_smtp_puerto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_smtp_puerto_label" style=""><span id="id_label_smtp_puerto"><?php echo $this->nm_new_label['smtp_puerto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["smtp_puerto"]) &&  $this->nmgp_cmp_readonly["smtp_puerto"] == "on") { 

 ?>
<input type="hidden" name="smtp_puerto" value="<?php echo $this->form_encode_input($smtp_puerto) . "\">" . $smtp_puerto . ""; ?>
<?php } else { ?>
<span id="id_read_on_smtp_puerto" class="sc-ui-readonly-smtp_puerto css_smtp_puerto_line" style="<?php echo $sStyleReadLab_smtp_puerto; ?>"><?php echo $this->form_format_readonly("smtp_puerto", $this->form_encode_input($this->smtp_puerto)); ?></span><span id="id_read_off_smtp_puerto" class="css_read_off_smtp_puerto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_smtp_puerto; ?>">
 <input class="sc-js-input scFormObjectOdd css_smtp_puerto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_smtp_puerto" type=text name="smtp_puerto" value="<?php echo $this->form_encode_input($smtp_puerto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['smtp_puerto']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['smtp_puerto']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_smtp_puerto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_smtp_puerto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['smtp_usuario']))
    {
        $this->nm_new_label['smtp_usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $smtp_usuario = $this->smtp_usuario;
   $sStyleHidden_smtp_usuario = '';
   if (isset($this->nmgp_cmp_hidden['smtp_usuario']) && $this->nmgp_cmp_hidden['smtp_usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['smtp_usuario']);
       $sStyleHidden_smtp_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_smtp_usuario = 'display: none;';
   $sStyleReadInp_smtp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['smtp_usuario']) && $this->nmgp_cmp_readonly['smtp_usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['smtp_usuario']);
       $sStyleReadLab_smtp_usuario = '';
       $sStyleReadInp_smtp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['smtp_usuario']) && $this->nmgp_cmp_hidden['smtp_usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="smtp_usuario" value="<?php echo $this->form_encode_input($smtp_usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_smtp_usuario_line" id="hidden_field_data_smtp_usuario" style="<?php echo $sStyleHidden_smtp_usuario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_smtp_usuario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_smtp_usuario_label" style=""><span id="id_label_smtp_usuario"><?php echo $this->nm_new_label['smtp_usuario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["smtp_usuario"]) &&  $this->nmgp_cmp_readonly["smtp_usuario"] == "on") { 

 ?>
<input type="hidden" name="smtp_usuario" value="<?php echo $this->form_encode_input($smtp_usuario) . "\">" . $smtp_usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_smtp_usuario" class="sc-ui-readonly-smtp_usuario css_smtp_usuario_line" style="<?php echo $sStyleReadLab_smtp_usuario; ?>"><?php echo $this->form_format_readonly("smtp_usuario", $this->form_encode_input($this->smtp_usuario)); ?></span><span id="id_read_off_smtp_usuario" class="css_read_off_smtp_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_smtp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_smtp_usuario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_smtp_usuario" type=text name="smtp_usuario" value="<?php echo $this->form_encode_input($smtp_usuario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_smtp_usuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_smtp_usuario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['smtp_password']))
    {
        $this->nm_new_label['smtp_password'] = "Contraseña";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $smtp_password = $this->smtp_password;
   $sStyleHidden_smtp_password = '';
   if (isset($this->nmgp_cmp_hidden['smtp_password']) && $this->nmgp_cmp_hidden['smtp_password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['smtp_password']);
       $sStyleHidden_smtp_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_smtp_password = 'display: none;';
   $sStyleReadInp_smtp_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['smtp_password']) && $this->nmgp_cmp_readonly['smtp_password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['smtp_password']);
       $sStyleReadLab_smtp_password = '';
       $sStyleReadInp_smtp_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['smtp_password']) && $this->nmgp_cmp_hidden['smtp_password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="smtp_password" value="<?php echo $this->form_encode_input($smtp_password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_smtp_password_line" id="hidden_field_data_smtp_password" style="<?php echo $sStyleHidden_smtp_password; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_smtp_password_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_smtp_password_label" style=""><span id="id_label_smtp_password"><?php echo $this->nm_new_label['smtp_password']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["smtp_password"]) &&  $this->nmgp_cmp_readonly["smtp_password"] == "on") { 

 ?>
<input type="hidden" name="smtp_password" value="<?php echo $this->form_encode_input($smtp_password) . "\">" . $smtp_password . ""; ?>
<?php } else { ?>
<span id="id_read_on_smtp_password" class="sc-ui-readonly-smtp_password css_smtp_password_line" style="<?php echo $sStyleReadLab_smtp_password; ?>"><?php echo $this->form_format_readonly("smtp_password", $this->form_encode_input($this->smtp_password)); ?></span><span id="id_read_off_smtp_password" class="css_read_off_smtp_password<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_smtp_password; ?>">
 <input class="sc-js-input scFormObjectOdd css_smtp_password_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_smtp_password" type=text name="smtp_password" value="<?php echo $this->form_encode_input($smtp_password) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_smtp_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_smtp_password_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_smtp_password_dumb = ('' == $sStyleHidden_smtp_password) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_smtp_password_dumb" style="<?php echo $sStyleHidden_smtp_password_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Información Contacto</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto_nombre']))
    {
        $this->nm_new_label['contacto_nombre'] = "Nombre Contacto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto_nombre = $this->contacto_nombre;
   $sStyleHidden_contacto_nombre = '';
   if (isset($this->nmgp_cmp_hidden['contacto_nombre']) && $this->nmgp_cmp_hidden['contacto_nombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto_nombre']);
       $sStyleHidden_contacto_nombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto_nombre = 'display: none;';
   $sStyleReadInp_contacto_nombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto_nombre']) && $this->nmgp_cmp_readonly['contacto_nombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto_nombre']);
       $sStyleReadLab_contacto_nombre = '';
       $sStyleReadInp_contacto_nombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto_nombre']) && $this->nmgp_cmp_hidden['contacto_nombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto_nombre" value="<?php echo $this->form_encode_input($contacto_nombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_nombre_line" id="hidden_field_data_contacto_nombre" style="<?php echo $sStyleHidden_contacto_nombre; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_nombre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_nombre_label" style=""><span id="id_label_contacto_nombre"><?php echo $this->nm_new_label['contacto_nombre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto_nombre"]) &&  $this->nmgp_cmp_readonly["contacto_nombre"] == "on") { 

 ?>
<input type="hidden" name="contacto_nombre" value="<?php echo $this->form_encode_input($contacto_nombre) . "\">" . $contacto_nombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto_nombre" class="sc-ui-readonly-contacto_nombre css_contacto_nombre_line" style="<?php echo $sStyleReadLab_contacto_nombre; ?>"><?php echo $this->form_format_readonly("contacto_nombre", $this->form_encode_input($this->contacto_nombre)); ?></span><span id="id_read_off_contacto_nombre" class="css_read_off_contacto_nombre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto_nombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_nombre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto_nombre" type=text name="contacto_nombre" value="<?php echo $this->form_encode_input($contacto_nombre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_nombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_nombre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto_cargo']))
    {
        $this->nm_new_label['contacto_cargo'] = "Cargo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto_cargo = $this->contacto_cargo;
   $sStyleHidden_contacto_cargo = '';
   if (isset($this->nmgp_cmp_hidden['contacto_cargo']) && $this->nmgp_cmp_hidden['contacto_cargo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto_cargo']);
       $sStyleHidden_contacto_cargo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto_cargo = 'display: none;';
   $sStyleReadInp_contacto_cargo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto_cargo']) && $this->nmgp_cmp_readonly['contacto_cargo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto_cargo']);
       $sStyleReadLab_contacto_cargo = '';
       $sStyleReadInp_contacto_cargo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto_cargo']) && $this->nmgp_cmp_hidden['contacto_cargo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto_cargo" value="<?php echo $this->form_encode_input($contacto_cargo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_cargo_line" id="hidden_field_data_contacto_cargo" style="<?php echo $sStyleHidden_contacto_cargo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_cargo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_cargo_label" style=""><span id="id_label_contacto_cargo"><?php echo $this->nm_new_label['contacto_cargo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto_cargo"]) &&  $this->nmgp_cmp_readonly["contacto_cargo"] == "on") { 

 ?>
<input type="hidden" name="contacto_cargo" value="<?php echo $this->form_encode_input($contacto_cargo) . "\">" . $contacto_cargo . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto_cargo" class="sc-ui-readonly-contacto_cargo css_contacto_cargo_line" style="<?php echo $sStyleReadLab_contacto_cargo; ?>"><?php echo $this->form_format_readonly("contacto_cargo", $this->form_encode_input($this->contacto_cargo)); ?></span><span id="id_read_off_contacto_cargo" class="css_read_off_contacto_cargo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto_cargo; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_cargo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto_cargo" type=text name="contacto_cargo" value="<?php echo $this->form_encode_input($contacto_cargo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_cargo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_cargo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto_correo']))
    {
        $this->nm_new_label['contacto_correo'] = "Correo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto_correo = $this->contacto_correo;
   $sStyleHidden_contacto_correo = '';
   if (isset($this->nmgp_cmp_hidden['contacto_correo']) && $this->nmgp_cmp_hidden['contacto_correo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto_correo']);
       $sStyleHidden_contacto_correo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto_correo = 'display: none;';
   $sStyleReadInp_contacto_correo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto_correo']) && $this->nmgp_cmp_readonly['contacto_correo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto_correo']);
       $sStyleReadLab_contacto_correo = '';
       $sStyleReadInp_contacto_correo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto_correo']) && $this->nmgp_cmp_hidden['contacto_correo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto_correo" value="<?php echo $this->form_encode_input($contacto_correo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_correo_line" id="hidden_field_data_contacto_correo" style="<?php echo $sStyleHidden_contacto_correo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_correo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_correo_label" style=""><span id="id_label_contacto_correo"><?php echo $this->nm_new_label['contacto_correo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto_correo"]) &&  $this->nmgp_cmp_readonly["contacto_correo"] == "on") { 

 ?>
<input type="hidden" name="contacto_correo" value="<?php echo $this->form_encode_input($contacto_correo) . "\">" . $contacto_correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto_correo" class="sc-ui-readonly-contacto_correo css_contacto_correo_line" style="<?php echo $sStyleReadLab_contacto_correo; ?>"><?php echo $this->form_format_readonly("contacto_correo", $this->form_encode_input($this->contacto_correo)); ?></span><span id="id_read_off_contacto_correo" class="css_read_off_contacto_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto_correo" type=text name="contacto_correo" value="<?php echo $this->form_encode_input($contacto_correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><img src="../_lib/img/scriptcase__NM__nm_transparent.gif" style="vertical-align: middle; display: none" class="sc-js-ui-statusimg" id="id_sc_status_contacto_correo" />&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.contacto_correo.value != '') {window.open('mailto:' + document.F1.contacto_correo.value); }", "if (document.F1.contacto_correo.value != '') {window.open('mailto:' + document.F1.contacto_correo.value); }", "contacto_correo_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_correo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto_celular']))
    {
        $this->nm_new_label['contacto_celular'] = "Tel/Cel";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto_celular = $this->contacto_celular;
   $sStyleHidden_contacto_celular = '';
   if (isset($this->nmgp_cmp_hidden['contacto_celular']) && $this->nmgp_cmp_hidden['contacto_celular'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto_celular']);
       $sStyleHidden_contacto_celular = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto_celular = 'display: none;';
   $sStyleReadInp_contacto_celular = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto_celular']) && $this->nmgp_cmp_readonly['contacto_celular'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto_celular']);
       $sStyleReadLab_contacto_celular = '';
       $sStyleReadInp_contacto_celular = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto_celular']) && $this->nmgp_cmp_hidden['contacto_celular'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto_celular" value="<?php echo $this->form_encode_input($contacto_celular) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_celular_line" id="hidden_field_data_contacto_celular" style="<?php echo $sStyleHidden_contacto_celular; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_celular_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_celular_label" style=""><span id="id_label_contacto_celular"><?php echo $this->nm_new_label['contacto_celular']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto_celular"]) &&  $this->nmgp_cmp_readonly["contacto_celular"] == "on") { 

 ?>
<input type="hidden" name="contacto_celular" value="<?php echo $this->form_encode_input($contacto_celular) . "\">" . $contacto_celular . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto_celular" class="sc-ui-readonly-contacto_celular css_contacto_celular_line" style="<?php echo $sStyleReadLab_contacto_celular; ?>"><?php echo $this->form_format_readonly("contacto_celular", $this->form_encode_input($this->contacto_celular)); ?></span><span id="id_read_off_contacto_celular" class="css_read_off_contacto_celular<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto_celular; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_celular_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto_celular" type=text name="contacto_celular" value="<?php echo $this->form_encode_input($contacto_celular) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789ç -EXT()") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_celular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_celular_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto_fijo']))
    {
        $this->nm_new_label['contacto_fijo'] = "Teléfono Fijo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto_fijo = $this->contacto_fijo;
   $sStyleHidden_contacto_fijo = '';
   if (isset($this->nmgp_cmp_hidden['contacto_fijo']) && $this->nmgp_cmp_hidden['contacto_fijo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto_fijo']);
       $sStyleHidden_contacto_fijo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto_fijo = 'display: none;';
   $sStyleReadInp_contacto_fijo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto_fijo']) && $this->nmgp_cmp_readonly['contacto_fijo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto_fijo']);
       $sStyleReadLab_contacto_fijo = '';
       $sStyleReadInp_contacto_fijo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto_fijo']) && $this->nmgp_cmp_hidden['contacto_fijo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto_fijo" value="<?php echo $this->form_encode_input($contacto_fijo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_fijo_line" id="hidden_field_data_contacto_fijo" style="<?php echo $sStyleHidden_contacto_fijo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_fijo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_fijo_label" style=""><span id="id_label_contacto_fijo"><?php echo $this->nm_new_label['contacto_fijo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto_fijo"]) &&  $this->nmgp_cmp_readonly["contacto_fijo"] == "on") { 

 ?>
<input type="hidden" name="contacto_fijo" value="<?php echo $this->form_encode_input($contacto_fijo) . "\">" . $contacto_fijo . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto_fijo" class="sc-ui-readonly-contacto_fijo css_contacto_fijo_line" style="<?php echo $sStyleReadLab_contacto_fijo; ?>"><?php echo $this->form_format_readonly("contacto_fijo", $this->form_encode_input($this->contacto_fijo)); ?></span><span id="id_read_off_contacto_fijo" class="css_read_off_contacto_fijo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto_fijo; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_fijo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto_fijo" type=text name="contacto_fijo" value="<?php echo $this->form_encode_input($contacto_fijo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_fijo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_fijo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_contacto_fijo_dumb = ('' == $sStyleHidden_contacto_fijo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contacto_fijo_dumb" style="<?php echo $sStyleHidden_contacto_fijo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Contenido</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logo']))
    {
        $this->nm_new_label['logo'] = "Logo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $logo = $this->logo;
   $sStyleHidden_logo = '';
   if (isset($this->nmgp_cmp_hidden['logo']) && $this->nmgp_cmp_hidden['logo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['logo']);
       $sStyleHidden_logo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_logo = 'display: none;';
   $sStyleReadInp_logo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['logo']) && $this->nmgp_cmp_readonly['logo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['logo']);
       $sStyleReadLab_logo = '';
       $sStyleReadInp_logo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['logo']) && $this->nmgp_cmp_hidden['logo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="logo" value="<?php echo $this->form_encode_input($logo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_logo_line" id="hidden_field_data_logo" style="<?php echo $sStyleHidden_logo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_logo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_logo_label" style=""><span id="id_label_logo"><?php echo $this->nm_new_label['logo']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_logo" => $out1_logo); ?><script>var var_ajax_img_logo = '<?php echo $out1_logo; ?>';</script><?php if (!empty($out_logo)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_logo, '" . $this->nmgp_return_img['logo'][0] . "', '" . $this->nmgp_return_img['logo'][1] . "')\"><img id=\"id_ajax_img_logo\" border=\"0\" src=\"$out_logo\"></a> &nbsp;" . "<span id=\"txt_ajax_img_logo\" style=\"display: none\">" . $this->form_format_readonly("logo", $logo) . "</span>"; if (!empty($logo)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_logo\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_logo\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["logo"]) &&  $this->nmgp_cmp_readonly["logo"] == "on") { 

 ?>
<img id=\"logo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="logo" value="<?php echo $this->form_encode_input($logo) . "\">" . $logo . ""; ?>
<?php } else { ?>
<span id="id_read_off_logo" class="css_read_off_logo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_logo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-logo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_logo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="logo[]" id="id_sc_field_logo" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_logo"<?php if ($this->nmgp_opcao == "novo" || empty($logo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="logo_limpa" value="<?php echo $logo_limpa . '" '; if ($logo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="logo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_logo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_logo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_logo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_logo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['asunto']))
    {
        $this->nm_new_label['asunto'] = "Asunto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asunto = $this->asunto;
   $sStyleHidden_asunto = '';
   if (isset($this->nmgp_cmp_hidden['asunto']) && $this->nmgp_cmp_hidden['asunto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asunto']);
       $sStyleHidden_asunto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asunto = 'display: none;';
   $sStyleReadInp_asunto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asunto']) && $this->nmgp_cmp_readonly['asunto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asunto']);
       $sStyleReadLab_asunto = '';
       $sStyleReadInp_asunto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asunto']) && $this->nmgp_cmp_hidden['asunto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="asunto" value="<?php echo $this->form_encode_input($asunto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asunto_line" id="hidden_field_data_asunto" style="<?php echo $sStyleHidden_asunto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asunto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asunto_label" style=""><span id="id_label_asunto"><?php echo $this->nm_new_label['asunto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asunto"]) &&  $this->nmgp_cmp_readonly["asunto"] == "on") { 

 ?>
<input type="hidden" name="asunto" value="<?php echo $this->form_encode_input($asunto) . "\">" . $asunto . ""; ?>
<?php } else { ?>
<span id="id_read_on_asunto" class="sc-ui-readonly-asunto css_asunto_line" style="<?php echo $sStyleReadLab_asunto; ?>"><?php echo $this->form_format_readonly("asunto", $this->form_encode_input($this->asunto)); ?></span><span id="id_read_off_asunto" class="css_read_off_asunto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_asunto; ?>">
 <input class="sc-js-input scFormObjectOdd css_asunto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_asunto" type=text name="asunto" value="<?php echo $this->form_encode_input($asunto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asunto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asunto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mensaje']))
    {
        $this->nm_new_label['mensaje'] = "Mensaje correo factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mensaje = $this->mensaje;
   $sStyleHidden_mensaje = '';
   if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mensaje']);
       $sStyleHidden_mensaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mensaje = 'display: none;';
   $sStyleReadInp_mensaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mensaje']) && $this->nmgp_cmp_readonly['mensaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mensaje']);
       $sStyleReadLab_mensaje = '';
       $sStyleReadInp_mensaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensaje" value="<?php echo $this->form_encode_input($mensaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mensaje_line" id="hidden_field_data_mensaje" style="<?php echo $sStyleHidden_mensaje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mensaje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mensaje_label" style=""><span id="id_label_mensaje"><?php echo $this->nm_new_label['mensaje']; ?></span></span><br><span id="id_read_on_mensaje" style="<?php echo $sStyleReadLab_mensaje; ?>"><?php echo $this->form_format_readonly("mensaje", sc_strip_script($this->mensaje)); ?></span><span id="id_read_off_mensaje" class="css_read_off_mensaje" style="<?php echo $sStyleReadInp_mensaje; ?>"><textarea id="mensaje" name="mensaje" cols="50" rows="10" class="mceEditor_mensaje" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->mensaje); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensaje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensaje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['head_note']))
    {
        $this->nm_new_label['head_note'] = "Cabecera";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $head_note = $this->head_note;
   $sStyleHidden_head_note = '';
   if (isset($this->nmgp_cmp_hidden['head_note']) && $this->nmgp_cmp_hidden['head_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['head_note']);
       $sStyleHidden_head_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_head_note = 'display: none;';
   $sStyleReadInp_head_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['head_note']) && $this->nmgp_cmp_readonly['head_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['head_note']);
       $sStyleReadLab_head_note = '';
       $sStyleReadInp_head_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['head_note']) && $this->nmgp_cmp_hidden['head_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="head_note" value="<?php echo $this->form_encode_input($head_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_head_note_line" id="hidden_field_data_head_note" style="<?php echo $sStyleHidden_head_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_head_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_head_note_label" style=""><span id="id_label_head_note"><?php echo $this->nm_new_label['head_note']; ?></span></span><br>
<?php
$head_note_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($head_note));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["head_note"]) &&  $this->nmgp_cmp_readonly["head_note"] == "on") { 

 ?>
<input type="hidden" name="head_note" value="<?php echo $this->form_encode_input($head_note) . "\">" . $head_note_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_head_note" class="sc-ui-readonly-head_note css_head_note_line" style="<?php echo $sStyleReadLab_head_note; ?>"><?php echo $this->form_format_readonly("head_note", $this->form_encode_input($head_note_val)); ?></span><span id="id_read_off_head_note" class="css_read_off_head_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_head_note; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_head_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="head_note" id="id_sc_field_head_note" rows="8" cols="80"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $head_note; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_head_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_head_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pie_pagina']))
    {
        $this->nm_new_label['pie_pagina'] = "Pie página factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pie_pagina = $this->pie_pagina;
   $sStyleHidden_pie_pagina = '';
   if (isset($this->nmgp_cmp_hidden['pie_pagina']) && $this->nmgp_cmp_hidden['pie_pagina'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pie_pagina']);
       $sStyleHidden_pie_pagina = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pie_pagina = 'display: none;';
   $sStyleReadInp_pie_pagina = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pie_pagina']) && $this->nmgp_cmp_readonly['pie_pagina'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pie_pagina']);
       $sStyleReadLab_pie_pagina = '';
       $sStyleReadInp_pie_pagina = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pie_pagina']) && $this->nmgp_cmp_hidden['pie_pagina'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pie_pagina" value="<?php echo $this->form_encode_input($pie_pagina) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pie_pagina_line" id="hidden_field_data_pie_pagina" style="<?php echo $sStyleHidden_pie_pagina; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pie_pagina_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pie_pagina_label" style=""><span id="id_label_pie_pagina"><?php echo $this->nm_new_label['pie_pagina']; ?></span></span><br>
<?php
$pie_pagina_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($pie_pagina));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pie_pagina"]) &&  $this->nmgp_cmp_readonly["pie_pagina"] == "on") { 

 ?>
<input type="hidden" name="pie_pagina" value="<?php echo $this->form_encode_input($pie_pagina) . "\">" . $pie_pagina_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_pie_pagina" class="sc-ui-readonly-pie_pagina css_pie_pagina_line" style="<?php echo $sStyleReadLab_pie_pagina; ?>"><?php echo $this->form_format_readonly("pie_pagina", $this->form_encode_input($pie_pagina_val)); ?></span><span id="id_read_off_pie_pagina" class="css_read_off_pie_pagina<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pie_pagina; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_pie_pagina_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="pie_pagina" id="id_sc_field_pie_pagina" rows="8" cols="80"
 alt="{datatype: 'text', maxLength: 1000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $pie_pagina; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pie_pagina_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pie_pagina_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mensaje_nc']))
    {
        $this->nm_new_label['mensaje_nc'] = "Mensaje NC";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mensaje_nc = $this->mensaje_nc;
   $sStyleHidden_mensaje_nc = '';
   if (isset($this->nmgp_cmp_hidden['mensaje_nc']) && $this->nmgp_cmp_hidden['mensaje_nc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mensaje_nc']);
       $sStyleHidden_mensaje_nc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mensaje_nc = 'display: none;';
   $sStyleReadInp_mensaje_nc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mensaje_nc']) && $this->nmgp_cmp_readonly['mensaje_nc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mensaje_nc']);
       $sStyleReadLab_mensaje_nc = '';
       $sStyleReadInp_mensaje_nc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mensaje_nc']) && $this->nmgp_cmp_hidden['mensaje_nc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensaje_nc" value="<?php echo $this->form_encode_input($mensaje_nc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mensaje_nc_line" id="hidden_field_data_mensaje_nc" style="<?php echo $sStyleHidden_mensaje_nc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mensaje_nc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mensaje_nc_label" style=""><span id="id_label_mensaje_nc"><?php echo $this->nm_new_label['mensaje_nc']; ?></span></span><br><span id="id_read_on_mensaje_nc" style="<?php echo $sStyleReadLab_mensaje_nc; ?>"><?php echo $this->form_format_readonly("mensaje_nc", sc_strip_script($this->mensaje_nc)); ?></span><span id="id_read_off_mensaje_nc" class="css_read_off_mensaje_nc" style="<?php echo $sStyleReadInp_mensaje_nc; ?>"><textarea id="mensaje_nc" name="mensaje_nc" cols="50" rows="10" class="mceEditor_mensaje_nc" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->mensaje_nc); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensaje_nc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensaje_nc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pie_pagina_nc']))
    {
        $this->nm_new_label['pie_pagina_nc'] = "Pie página NC";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pie_pagina_nc = $this->pie_pagina_nc;
   $sStyleHidden_pie_pagina_nc = '';
   if (isset($this->nmgp_cmp_hidden['pie_pagina_nc']) && $this->nmgp_cmp_hidden['pie_pagina_nc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pie_pagina_nc']);
       $sStyleHidden_pie_pagina_nc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pie_pagina_nc = 'display: none;';
   $sStyleReadInp_pie_pagina_nc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pie_pagina_nc']) && $this->nmgp_cmp_readonly['pie_pagina_nc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pie_pagina_nc']);
       $sStyleReadLab_pie_pagina_nc = '';
       $sStyleReadInp_pie_pagina_nc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pie_pagina_nc']) && $this->nmgp_cmp_hidden['pie_pagina_nc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pie_pagina_nc" value="<?php echo $this->form_encode_input($pie_pagina_nc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pie_pagina_nc_line" id="hidden_field_data_pie_pagina_nc" style="<?php echo $sStyleHidden_pie_pagina_nc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pie_pagina_nc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pie_pagina_nc_label" style=""><span id="id_label_pie_pagina_nc"><?php echo $this->nm_new_label['pie_pagina_nc']; ?></span></span><br><span id="id_read_on_pie_pagina_nc" style="<?php echo $sStyleReadLab_pie_pagina_nc; ?>"><?php echo $this->form_format_readonly("pie_pagina_nc", sc_strip_script($this->pie_pagina_nc)); ?></span><span id="id_read_off_pie_pagina_nc" class="css_read_off_pie_pagina_nc" style="<?php echo $sStyleReadInp_pie_pagina_nc; ?>"><textarea id="pie_pagina_nc" name="pie_pagina_nc" cols="50" rows="10" class="mceEditor_pie_pagina_nc" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->pie_pagina_nc); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pie_pagina_nc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pie_pagina_nc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_facturas']))
    {
        $this->nm_new_label['servidor_facturas'] = "Servidor Facturas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_facturas = $this->servidor_facturas;
   $sStyleHidden_servidor_facturas = '';
   if (isset($this->nmgp_cmp_hidden['servidor_facturas']) && $this->nmgp_cmp_hidden['servidor_facturas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_facturas']);
       $sStyleHidden_servidor_facturas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_facturas = 'display: none;';
   $sStyleReadInp_servidor_facturas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_facturas']) && $this->nmgp_cmp_readonly['servidor_facturas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_facturas']);
       $sStyleReadLab_servidor_facturas = '';
       $sStyleReadInp_servidor_facturas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_facturas']) && $this->nmgp_cmp_hidden['servidor_facturas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_facturas" value="<?php echo $this->form_encode_input($servidor_facturas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_facturas_line" id="hidden_field_data_servidor_facturas" style="<?php echo $sStyleHidden_servidor_facturas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_facturas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_facturas_label" style=""><span id="id_label_servidor_facturas"><?php echo $this->nm_new_label['servidor_facturas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_facturas"]) &&  $this->nmgp_cmp_readonly["servidor_facturas"] == "on") { 

 ?>
<input type="hidden" name="servidor_facturas" value="<?php echo $this->form_encode_input($servidor_facturas) . "\">" . $servidor_facturas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_facturas" class="sc-ui-readonly-servidor_facturas css_servidor_facturas_line" style="<?php echo $sStyleReadLab_servidor_facturas; ?>"><?php echo $this->form_format_readonly("servidor_facturas", $this->form_encode_input($this->servidor_facturas)); ?></span><span id="id_read_off_servidor_facturas" class="css_read_off_servidor_facturas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_facturas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_facturas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_facturas" type=text name="servidor_facturas" value="<?php echo $this->form_encode_input($servidor_facturas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_facturas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_facturas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_nc']))
    {
        $this->nm_new_label['servidor_nc'] = "Servidor Notas Crédito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_nc = $this->servidor_nc;
   $sStyleHidden_servidor_nc = '';
   if (isset($this->nmgp_cmp_hidden['servidor_nc']) && $this->nmgp_cmp_hidden['servidor_nc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_nc']);
       $sStyleHidden_servidor_nc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_nc = 'display: none;';
   $sStyleReadInp_servidor_nc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_nc']) && $this->nmgp_cmp_readonly['servidor_nc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_nc']);
       $sStyleReadLab_servidor_nc = '';
       $sStyleReadInp_servidor_nc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_nc']) && $this->nmgp_cmp_hidden['servidor_nc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_nc" value="<?php echo $this->form_encode_input($servidor_nc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_nc_line" id="hidden_field_data_servidor_nc" style="<?php echo $sStyleHidden_servidor_nc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_nc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_nc_label" style=""><span id="id_label_servidor_nc"><?php echo $this->nm_new_label['servidor_nc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_nc"]) &&  $this->nmgp_cmp_readonly["servidor_nc"] == "on") { 

 ?>
<input type="hidden" name="servidor_nc" value="<?php echo $this->form_encode_input($servidor_nc) . "\">" . $servidor_nc . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_nc" class="sc-ui-readonly-servidor_nc css_servidor_nc_line" style="<?php echo $sStyleReadLab_servidor_nc; ?>"><?php echo $this->form_format_readonly("servidor_nc", $this->form_encode_input($this->servidor_nc)); ?></span><span id="id_read_off_servidor_nc" class="css_read_off_servidor_nc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_nc; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_nc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_nc" type=text name="servidor_nc" value="<?php echo $this->form_encode_input($servidor_nc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_nc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_nc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['correo_para_prueba']))
    {
        $this->nm_new_label['correo_para_prueba'] = "Correo para Prueba";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $correo_para_prueba = $this->correo_para_prueba;
   $sStyleHidden_correo_para_prueba = '';
   if (isset($this->nmgp_cmp_hidden['correo_para_prueba']) && $this->nmgp_cmp_hidden['correo_para_prueba'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['correo_para_prueba']);
       $sStyleHidden_correo_para_prueba = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_correo_para_prueba = 'display: none;';
   $sStyleReadInp_correo_para_prueba = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['correo_para_prueba']) && $this->nmgp_cmp_readonly['correo_para_prueba'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['correo_para_prueba']);
       $sStyleReadLab_correo_para_prueba = '';
       $sStyleReadInp_correo_para_prueba = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['correo_para_prueba']) && $this->nmgp_cmp_hidden['correo_para_prueba'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_para_prueba" value="<?php echo $this->form_encode_input($correo_para_prueba) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_correo_para_prueba_line" id="hidden_field_data_correo_para_prueba" style="<?php echo $sStyleHidden_correo_para_prueba; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_para_prueba_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_para_prueba_label" style=""><span id="id_label_correo_para_prueba"><?php echo $this->nm_new_label['correo_para_prueba']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_para_prueba"]) &&  $this->nmgp_cmp_readonly["correo_para_prueba"] == "on") { 

 ?>
<input type="hidden" name="correo_para_prueba" value="<?php echo $this->form_encode_input($correo_para_prueba) . "\">" . $correo_para_prueba . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_para_prueba" class="sc-ui-readonly-correo_para_prueba css_correo_para_prueba_line" style="<?php echo $sStyleReadLab_correo_para_prueba; ?>"><?php echo $this->form_format_readonly("correo_para_prueba", $this->form_encode_input($this->correo_para_prueba)); ?></span><span id="id_read_off_correo_para_prueba" class="css_read_off_correo_para_prueba<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_para_prueba; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_para_prueba_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo_para_prueba" type=text name="correo_para_prueba" value="<?php echo $this->form_encode_input($correo_para_prueba) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_para_prueba_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_para_prueba_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['correo_prueba']))
    {
        $this->nm_new_label['correo_prueba'] = "Mandar correo de prueba";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $correo_prueba = $this->correo_prueba;
   $sStyleHidden_correo_prueba = '';
   if (isset($this->nmgp_cmp_hidden['correo_prueba']) && $this->nmgp_cmp_hidden['correo_prueba'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['correo_prueba']);
       $sStyleHidden_correo_prueba = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_correo_prueba = 'display: none;';
   $sStyleReadInp_correo_prueba = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['correo_prueba']) && $this->nmgp_cmp_readonly['correo_prueba'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['correo_prueba']);
       $sStyleReadLab_correo_prueba = '';
       $sStyleReadInp_correo_prueba = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['correo_prueba']) && $this->nmgp_cmp_hidden['correo_prueba'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_prueba" value="<?php echo $this->form_encode_input($correo_prueba) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_correo_prueba_line" id="hidden_field_data_correo_prueba" style="<?php echo $sStyleHidden_correo_prueba; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_prueba_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_prueba_label" style=""><span id="id_label_correo_prueba"><?php echo $this->nm_new_label['correo_prueba']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__mail_forward_32.png"))
          { 
              $correo_prueba = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__mail_forward_32.png";
                  $correo_prueba = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__mail_forward_32.png\"/>" ; 
              }
              else {
                  $correo_prueba = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__mail_forward_32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_correo_prueba"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_blank_prueba_mail . "', '$this->nm_location', 'gidempresa*scin" . $this->nmgp_dados_form['id_empresa'] . "*scout', '', '_blank', '0', '0', 'blank_prueba_mail')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $correo_prueba ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_prueba"]) &&  $this->nmgp_cmp_readonly["correo_prueba"] == "on") { 

 ?>
<input type="hidden" name="correo_prueba" value="<?php echo $this->form_encode_input($correo_prueba) . "\">" . $correo_prueba . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_prueba" class="sc-ui-readonly-correo_prueba css_correo_prueba_line" style="<?php echo $sStyleReadLab_correo_prueba; ?>"><?php echo $this->form_format_readonly("correo_prueba", $this->form_encode_input($this->correo_prueba)); ?></span><span id="id_read_off_correo_prueba" class="css_read_off_correo_prueba<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_prueba; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_prueba_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_prueba_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['enviar_datos_establecimiento']))
   {
       $this->nm_new_label['enviar_datos_establecimiento'] = "Enviar Datos Establecimiento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enviar_datos_establecimiento = $this->enviar_datos_establecimiento;
   $sStyleHidden_enviar_datos_establecimiento = '';
   if (isset($this->nmgp_cmp_hidden['enviar_datos_establecimiento']) && $this->nmgp_cmp_hidden['enviar_datos_establecimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enviar_datos_establecimiento']);
       $sStyleHidden_enviar_datos_establecimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enviar_datos_establecimiento = 'display: none;';
   $sStyleReadInp_enviar_datos_establecimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enviar_datos_establecimiento']) && $this->nmgp_cmp_readonly['enviar_datos_establecimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enviar_datos_establecimiento']);
       $sStyleReadLab_enviar_datos_establecimiento = '';
       $sStyleReadInp_enviar_datos_establecimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enviar_datos_establecimiento']) && $this->nmgp_cmp_hidden['enviar_datos_establecimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="enviar_datos_establecimiento" value="<?php echo $this->form_encode_input($this->enviar_datos_establecimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->enviar_datos_establecimiento_1 = explode(";", trim($this->enviar_datos_establecimiento));
  } 
  else
  {
      if (empty($this->enviar_datos_establecimiento))
      {
          $this->enviar_datos_establecimiento_1= array(); 
          $this->enviar_datos_establecimiento= "NO";
      } 
      else
      {
          $this->enviar_datos_establecimiento_1= $this->enviar_datos_establecimiento; 
          $this->enviar_datos_establecimiento= ""; 
          foreach ($this->enviar_datos_establecimiento_1 as $cada_enviar_datos_establecimiento)
          {
             if (!empty($enviar_datos_establecimiento))
             {
                 $this->enviar_datos_establecimiento.= ";"; 
             } 
             $this->enviar_datos_establecimiento.= $cada_enviar_datos_establecimiento; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_enviar_datos_establecimiento_line" id="hidden_field_data_enviar_datos_establecimiento" style="<?php echo $sStyleHidden_enviar_datos_establecimiento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_datos_establecimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_datos_establecimiento_label" style=""><span id="id_label_enviar_datos_establecimiento"><?php echo $this->nm_new_label['enviar_datos_establecimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_datos_establecimiento"]) &&  $this->nmgp_cmp_readonly["enviar_datos_establecimiento"] == "on") { 

$enviar_datos_establecimiento_look = "";
 if ($this->enviar_datos_establecimiento == "SI") { $enviar_datos_establecimiento_look .= "SI" ;} 
 if (empty($enviar_datos_establecimiento_look)) { $enviar_datos_establecimiento_look = $this->enviar_datos_establecimiento; }
?>
<input type="hidden" name="enviar_datos_establecimiento" value="<?php echo $this->form_encode_input($enviar_datos_establecimiento) . "\">" . $enviar_datos_establecimiento_look . ""; ?>
<?php } else { ?>

<?php

$enviar_datos_establecimiento_look = "";
 if ($this->enviar_datos_establecimiento == "SI") { $enviar_datos_establecimiento_look .= "SI" ;} 
 if (empty($enviar_datos_establecimiento_look)) { $enviar_datos_establecimiento_look = $this->enviar_datos_establecimiento; }
?>
<span id="id_read_on_enviar_datos_establecimiento" class="css_enviar_datos_establecimiento_line" style="<?php echo $sStyleReadLab_enviar_datos_establecimiento; ?>"><?php echo $this->form_format_readonly("enviar_datos_establecimiento", $this->form_encode_input($enviar_datos_establecimiento_look)); ?></span><span id="id_read_off_enviar_datos_establecimiento" class="css_read_off_enviar_datos_establecimiento css_enviar_datos_establecimiento_line" style="<?php echo $sStyleReadInp_enviar_datos_establecimiento; ?>"><?php echo "<div id=\"idAjaxCheckbox_enviar_datos_establecimiento\" style=\"display: inline-block\" class=\"css_enviar_datos_establecimiento_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_enviar_datos_establecimiento_line"><?php $tempOptionId = "id-opt-enviar_datos_establecimiento" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-enviar_datos_establecimiento sc-ui-checkbox-enviar_datos_establecimiento" name="enviar_datos_establecimiento[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_datos_establecimiento'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->enviar_datos_establecimiento_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('enviar_datos_establecimiento')", "nm_mostra_mens('enviar_datos_establecimiento')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enviar_datos_establecimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enviar_datos_establecimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
