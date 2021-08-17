<div id="form_configuraciones_form2" style='<?php echo ($this->tabCssClass["form_configuraciones_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['integrar_tns']))
   {
       $this->nm_new_label['integrar_tns'] = "Integrar con TNS:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $integrar_tns = $this->integrar_tns;
   $sStyleHidden_integrar_tns = '';
   if (isset($this->nmgp_cmp_hidden['integrar_tns']) && $this->nmgp_cmp_hidden['integrar_tns'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['integrar_tns']);
       $sStyleHidden_integrar_tns = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_integrar_tns = 'display: none;';
   $sStyleReadInp_integrar_tns = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['integrar_tns']) && $this->nmgp_cmp_readonly['integrar_tns'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['integrar_tns']);
       $sStyleReadLab_integrar_tns = '';
       $sStyleReadInp_integrar_tns = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['integrar_tns']) && $this->nmgp_cmp_hidden['integrar_tns'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="integrar_tns" value="<?php echo $this->form_encode_input($this->integrar_tns) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->integrar_tns_1 = explode(";", trim($this->integrar_tns));
  } 
  else
  {
      if (empty($this->integrar_tns))
      {
          $this->integrar_tns_1= array(); 
          $this->integrar_tns= "NO";
      } 
      else
      {
          $this->integrar_tns_1= $this->integrar_tns; 
          $this->integrar_tns= ""; 
          foreach ($this->integrar_tns_1 as $cada_integrar_tns)
          {
             if (!empty($integrar_tns))
             {
                 $this->integrar_tns.= ";"; 
             } 
             $this->integrar_tns.= $cada_integrar_tns; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_integrar_tns_label" id="hidden_field_label_integrar_tns" style="<?php echo $sStyleHidden_integrar_tns; ?>"><span id="id_label_integrar_tns"><?php echo $this->nm_new_label['integrar_tns']; ?></span></TD>
    <TD class="scFormDataOdd css_integrar_tns_line" id="hidden_field_data_integrar_tns" style="<?php echo $sStyleHidden_integrar_tns; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_integrar_tns_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["integrar_tns"]) &&  $this->nmgp_cmp_readonly["integrar_tns"] == "on") { 

$integrar_tns_look = "";
 if ($this->integrar_tns == "SI") { $integrar_tns_look .= "" ;} 
 if (empty($integrar_tns_look)) { $integrar_tns_look = $this->integrar_tns; }
?>
<input type="hidden" name="integrar_tns" value="<?php echo $this->form_encode_input($integrar_tns) . "\">" . $integrar_tns_look . ""; ?>
<?php } else { ?>

<?php

$integrar_tns_look = "";
 if ($this->integrar_tns == "SI") { $integrar_tns_look .= "" ;} 
 if (empty($integrar_tns_look)) { $integrar_tns_look = $this->integrar_tns; }
?>
<span id="id_read_on_integrar_tns" class="css_integrar_tns_line" style="<?php echo $sStyleReadLab_integrar_tns; ?>"><?php echo $this->form_format_readonly("integrar_tns", $this->form_encode_input($integrar_tns_look)); ?></span><span id="id_read_off_integrar_tns" class="css_read_off_integrar_tns css_integrar_tns_line" style="<?php echo $sStyleReadInp_integrar_tns; ?>"><?php echo "<div id=\"idAjaxCheckbox_integrar_tns\" style=\"display: inline-block\" class=\"css_integrar_tns_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_integrar_tns_line"><?php $tempOptionId = "id-opt-integrar_tns" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-integrar_tns sc-ui-checkbox-integrar_tns" name="integrar_tns[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_integrar_tns'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->integrar_tns_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_integrar_tns_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_integrar_tns_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ip']))
    {
        $this->nm_new_label['ip'] = "IP Servidor TNS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ip = $this->ip;
   $sStyleHidden_ip = '';
   if (isset($this->nmgp_cmp_hidden['ip']) && $this->nmgp_cmp_hidden['ip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ip']);
       $sStyleHidden_ip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ip = 'display: none;';
   $sStyleReadInp_ip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ip']) && $this->nmgp_cmp_readonly['ip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ip']);
       $sStyleReadLab_ip = '';
       $sStyleReadInp_ip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ip']) && $this->nmgp_cmp_hidden['ip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ip" value="<?php echo $this->form_encode_input($ip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ip_label" id="hidden_field_label_ip" style="<?php echo $sStyleHidden_ip; ?>"><span id="id_label_ip"><?php echo $this->nm_new_label['ip']; ?></span></TD>
    <TD class="scFormDataOdd css_ip_line" id="hidden_field_data_ip" style="<?php echo $sStyleHidden_ip; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ip_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ip"]) &&  $this->nmgp_cmp_readonly["ip"] == "on") { 

 ?>
<input type="hidden" name="ip" value="<?php echo $this->form_encode_input($ip) . "\">" . $ip . ""; ?>
<?php } else { ?>
<span id="id_read_on_ip" class="sc-ui-readonly-ip css_ip_line" style="<?php echo $sStyleReadLab_ip; ?>"><?php echo $this->form_format_readonly("ip", $this->form_encode_input($this->ip)); ?></span><span id="id_read_off_ip" class="css_read_off_ip" style="white-space: nowrap;<?php echo $sStyleReadInp_ip; ?>">
 <input class="sc-js-input scFormObjectOdd css_ip_obj" style="" id="id_sc_field_ip" type=text name="ip" value="<?php echo $this->form_encode_input($ip) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ip_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ruta_bd_tns']))
    {
        $this->nm_new_label['ruta_bd_tns'] = "Ruta Bd Tns";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruta_bd_tns = $this->ruta_bd_tns;
   $sStyleHidden_ruta_bd_tns = '';
   if (isset($this->nmgp_cmp_hidden['ruta_bd_tns']) && $this->nmgp_cmp_hidden['ruta_bd_tns'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruta_bd_tns']);
       $sStyleHidden_ruta_bd_tns = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruta_bd_tns = 'display: none;';
   $sStyleReadInp_ruta_bd_tns = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ruta_bd_tns']) && $this->nmgp_cmp_readonly['ruta_bd_tns'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruta_bd_tns']);
       $sStyleReadLab_ruta_bd_tns = '';
       $sStyleReadInp_ruta_bd_tns = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruta_bd_tns']) && $this->nmgp_cmp_hidden['ruta_bd_tns'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruta_bd_tns" value="<?php echo $this->form_encode_input($ruta_bd_tns) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ruta_bd_tns_label" id="hidden_field_label_ruta_bd_tns" style="<?php echo $sStyleHidden_ruta_bd_tns; ?>"><span id="id_label_ruta_bd_tns"><?php echo $this->nm_new_label['ruta_bd_tns']; ?></span></TD>
    <TD class="scFormDataOdd css_ruta_bd_tns_line" id="hidden_field_data_ruta_bd_tns" style="<?php echo $sStyleHidden_ruta_bd_tns; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ruta_bd_tns_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruta_bd_tns"]) &&  $this->nmgp_cmp_readonly["ruta_bd_tns"] == "on") { 

 ?>
<input type="hidden" name="ruta_bd_tns" value="<?php echo $this->form_encode_input($ruta_bd_tns) . "\">" . $ruta_bd_tns . ""; ?>
<?php } else { ?>
<span id="id_read_on_ruta_bd_tns" class="sc-ui-readonly-ruta_bd_tns css_ruta_bd_tns_line" style="<?php echo $sStyleReadLab_ruta_bd_tns; ?>"><?php echo $this->form_format_readonly("ruta_bd_tns", $this->form_encode_input($this->ruta_bd_tns)); ?></span><span id="id_read_off_ruta_bd_tns" class="css_read_off_ruta_bd_tns" style="white-space: nowrap;<?php echo $sStyleReadInp_ruta_bd_tns; ?>">
 <input class="sc-js-input scFormObjectOdd css_ruta_bd_tns_obj" style="" id="id_sc_field_ruta_bd_tns" type=text name="ruta_bd_tns" value="<?php echo $this->form_encode_input($ruta_bd_tns) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruta_bd_tns_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruta_bd_tns_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['habilitar_comprobantes']))
   {
       $this->nm_new_label['habilitar_comprobantes'] = "Habilitar Comprobantes";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $habilitar_comprobantes = $this->habilitar_comprobantes;
   $sStyleHidden_habilitar_comprobantes = '';
   if (isset($this->nmgp_cmp_hidden['habilitar_comprobantes']) && $this->nmgp_cmp_hidden['habilitar_comprobantes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['habilitar_comprobantes']);
       $sStyleHidden_habilitar_comprobantes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_habilitar_comprobantes = 'display: none;';
   $sStyleReadInp_habilitar_comprobantes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['habilitar_comprobantes']) && $this->nmgp_cmp_readonly['habilitar_comprobantes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['habilitar_comprobantes']);
       $sStyleReadLab_habilitar_comprobantes = '';
       $sStyleReadInp_habilitar_comprobantes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['habilitar_comprobantes']) && $this->nmgp_cmp_hidden['habilitar_comprobantes'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="habilitar_comprobantes" value="<?php echo $this->form_encode_input($this->habilitar_comprobantes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->habilitar_comprobantes_1 = explode(";", trim($this->habilitar_comprobantes));
  } 
  else
  {
      if (empty($this->habilitar_comprobantes))
      {
          $this->habilitar_comprobantes_1= array(); 
          $this->habilitar_comprobantes= "NO";
      } 
      else
      {
          $this->habilitar_comprobantes_1= $this->habilitar_comprobantes; 
          $this->habilitar_comprobantes= ""; 
          foreach ($this->habilitar_comprobantes_1 as $cada_habilitar_comprobantes)
          {
             if (!empty($habilitar_comprobantes))
             {
                 $this->habilitar_comprobantes.= ";"; 
             } 
             $this->habilitar_comprobantes.= $cada_habilitar_comprobantes; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_habilitar_comprobantes_label" id="hidden_field_label_habilitar_comprobantes" style="<?php echo $sStyleHidden_habilitar_comprobantes; ?>"><span id="id_label_habilitar_comprobantes"><?php echo $this->nm_new_label['habilitar_comprobantes']; ?></span></TD>
    <TD class="scFormDataOdd css_habilitar_comprobantes_line" id="hidden_field_data_habilitar_comprobantes" style="<?php echo $sStyleHidden_habilitar_comprobantes; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_habilitar_comprobantes_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["habilitar_comprobantes"]) &&  $this->nmgp_cmp_readonly["habilitar_comprobantes"] == "on") { 

$habilitar_comprobantes_look = "";
 if ($this->habilitar_comprobantes == "SI") { $habilitar_comprobantes_look .= "" ;} 
 if (empty($habilitar_comprobantes_look)) { $habilitar_comprobantes_look = $this->habilitar_comprobantes; }
?>
<input type="hidden" name="habilitar_comprobantes" value="<?php echo $this->form_encode_input($habilitar_comprobantes) . "\">" . $habilitar_comprobantes_look . ""; ?>
<?php } else { ?>

<?php

$habilitar_comprobantes_look = "";
 if ($this->habilitar_comprobantes == "SI") { $habilitar_comprobantes_look .= "" ;} 
 if (empty($habilitar_comprobantes_look)) { $habilitar_comprobantes_look = $this->habilitar_comprobantes; }
?>
<span id="id_read_on_habilitar_comprobantes" class="css_habilitar_comprobantes_line" style="<?php echo $sStyleReadLab_habilitar_comprobantes; ?>"><?php echo $this->form_format_readonly("habilitar_comprobantes", $this->form_encode_input($habilitar_comprobantes_look)); ?></span><span id="id_read_off_habilitar_comprobantes" class="css_read_off_habilitar_comprobantes css_habilitar_comprobantes_line" style="<?php echo $sStyleReadInp_habilitar_comprobantes; ?>"><?php echo "<div id=\"idAjaxCheckbox_habilitar_comprobantes\" style=\"display: inline-block\" class=\"css_habilitar_comprobantes_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_habilitar_comprobantes_line"><?php $tempOptionId = "id-opt-habilitar_comprobantes" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-habilitar_comprobantes sc-ui-checkbox-habilitar_comprobantes" name="habilitar_comprobantes[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_habilitar_comprobantes'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->habilitar_comprobantes_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('habilitar_comprobantes')", "nm_mostra_mens('habilitar_comprobantes')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_habilitar_comprobantes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_habilitar_comprobantes_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
