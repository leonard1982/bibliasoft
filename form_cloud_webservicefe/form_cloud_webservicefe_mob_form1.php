<div id="form_cloud_webservicefe_mob_form1" style='<?php echo ($this->tabCssClass["form_cloud_webservicefe_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idwebservicefe']))
   {
       $this->nmgp_cmp_hidden['idwebservicefe'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_empresa']))
   {
       $this->nmgp_cmp_hidden['id_empresa'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->apl['100perc_classes']['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idwebservicefe']))
           {
               $this->nmgp_cmp_readonly['idwebservicefe'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Datos Desarrollo</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor1_pruebas']))
    {
        $this->nm_new_label['servidor1_pruebas'] = "Servidor 1 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor1_pruebas = $this->servidor1_pruebas;
   $sStyleHidden_servidor1_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor1_pruebas']) && $this->nmgp_cmp_hidden['servidor1_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor1_pruebas']);
       $sStyleHidden_servidor1_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor1_pruebas = 'display: none;';
   $sStyleReadInp_servidor1_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor1_pruebas']) && $this->nmgp_cmp_readonly['servidor1_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor1_pruebas']);
       $sStyleReadLab_servidor1_pruebas = '';
       $sStyleReadInp_servidor1_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor1_pruebas']) && $this->nmgp_cmp_hidden['servidor1_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor1_pruebas_line" id="hidden_field_data_servidor1_pruebas" style="<?php echo $sStyleHidden_servidor1_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor1_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor1_pruebas_label" style=""><span id="id_label_servidor1_pruebas"><?php echo $this->nm_new_label['servidor1_pruebas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['servidor1_pruebas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['servidor1_pruebas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor1_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor1_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) . "\">" . $servidor1_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor1_pruebas" class="sc-ui-readonly-servidor1_pruebas css_servidor1_pruebas_line" style="<?php echo $sStyleReadLab_servidor1_pruebas; ?>"><?php echo $this->form_format_readonly("servidor1_pruebas", $this->form_encode_input($this->servidor1_pruebas)); ?></span><span id="id_read_off_servidor1_pruebas" class="css_read_off_servidor1_pruebas<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor1_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor1_pruebas_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_servidor1_pruebas" type=text name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor1_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor1_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor2_pruebas']))
    {
        $this->nm_new_label['servidor2_pruebas'] = "Servidor 2 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor2_pruebas = $this->servidor2_pruebas;
   $sStyleHidden_servidor2_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor2_pruebas']) && $this->nmgp_cmp_hidden['servidor2_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor2_pruebas']);
       $sStyleHidden_servidor2_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor2_pruebas = 'display: none;';
   $sStyleReadInp_servidor2_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor2_pruebas']) && $this->nmgp_cmp_readonly['servidor2_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor2_pruebas']);
       $sStyleReadLab_servidor2_pruebas = '';
       $sStyleReadInp_servidor2_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor2_pruebas']) && $this->nmgp_cmp_hidden['servidor2_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor2_pruebas_line" id="hidden_field_data_servidor2_pruebas" style="<?php echo $sStyleHidden_servidor2_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor2_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor2_pruebas_label" style=""><span id="id_label_servidor2_pruebas"><?php echo $this->nm_new_label['servidor2_pruebas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['servidor2_pruebas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['servidor2_pruebas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor2_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor2_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) . "\">" . $servidor2_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor2_pruebas" class="sc-ui-readonly-servidor2_pruebas css_servidor2_pruebas_line" style="<?php echo $sStyleReadLab_servidor2_pruebas; ?>"><?php echo $this->form_format_readonly("servidor2_pruebas", $this->form_encode_input($this->servidor2_pruebas)); ?></span><span id="id_read_off_servidor2_pruebas" class="css_read_off_servidor2_pruebas<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor2_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor2_pruebas_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_servidor2_pruebas" type=text name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor2_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor2_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor3_pruebas']))
    {
        $this->nm_new_label['servidor3_pruebas'] = "Servidor 3 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor3_pruebas = $this->servidor3_pruebas;
   $sStyleHidden_servidor3_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor3_pruebas']) && $this->nmgp_cmp_hidden['servidor3_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor3_pruebas']);
       $sStyleHidden_servidor3_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor3_pruebas = 'display: none;';
   $sStyleReadInp_servidor3_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor3_pruebas']) && $this->nmgp_cmp_readonly['servidor3_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor3_pruebas']);
       $sStyleReadLab_servidor3_pruebas = '';
       $sStyleReadInp_servidor3_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor3_pruebas']) && $this->nmgp_cmp_hidden['servidor3_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor3_pruebas_line" id="hidden_field_data_servidor3_pruebas" style="<?php echo $sStyleHidden_servidor3_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor3_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor3_pruebas_label" style=""><span id="id_label_servidor3_pruebas"><?php echo $this->nm_new_label['servidor3_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor3_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor3_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) . "\">" . $servidor3_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor3_pruebas" class="sc-ui-readonly-servidor3_pruebas css_servidor3_pruebas_line" style="<?php echo $sStyleReadLab_servidor3_pruebas; ?>"><?php echo $this->form_format_readonly("servidor3_pruebas", $this->form_encode_input($this->servidor3_pruebas)); ?></span><span id="id_read_off_servidor3_pruebas" class="css_read_off_servidor3_pruebas<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor3_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor3_pruebas_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_servidor3_pruebas" type=text name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor3_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor3_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token_pruebas']))
    {
        $this->nm_new_label['token_pruebas'] = "Token Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token_pruebas = $this->token_pruebas;
   $sStyleHidden_token_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['token_pruebas']) && $this->nmgp_cmp_hidden['token_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token_pruebas']);
       $sStyleHidden_token_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token_pruebas = 'display: none;';
   $sStyleReadInp_token_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token_pruebas']) && $this->nmgp_cmp_readonly['token_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token_pruebas']);
       $sStyleReadLab_token_pruebas = '';
       $sStyleReadInp_token_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token_pruebas']) && $this->nmgp_cmp_hidden['token_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_pruebas_line" id="hidden_field_data_token_pruebas" style="<?php echo $sStyleHidden_token_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_pruebas_label" style=""><span id="id_label_token_pruebas"><?php echo $this->nm_new_label['token_pruebas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['token_pruebas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['token_pruebas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token_pruebas"]) &&  $this->nmgp_cmp_readonly["token_pruebas"] == "on") { 

 ?>
<input type="hidden" name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) . "\">" . $token_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_token_pruebas" class="sc-ui-readonly-token_pruebas css_token_pruebas_line" style="<?php echo $sStyleReadLab_token_pruebas; ?>"><?php echo $this->form_format_readonly("token_pruebas", $this->form_encode_input($this->token_pruebas)); ?></span><span id="id_read_off_token_pruebas" class="css_read_off_token_pruebas<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_pruebas_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_token_pruebas" type=text name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password_pruebas']))
    {
        $this->nm_new_label['password_pruebas'] = "Password Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password_pruebas = $this->password_pruebas;
   $sStyleHidden_password_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['password_pruebas']) && $this->nmgp_cmp_hidden['password_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password_pruebas']);
       $sStyleHidden_password_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password_pruebas = 'display: none;';
   $sStyleReadInp_password_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password_pruebas']) && $this->nmgp_cmp_readonly['password_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password_pruebas']);
       $sStyleReadLab_password_pruebas = '';
       $sStyleReadInp_password_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password_pruebas']) && $this->nmgp_cmp_hidden['password_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_pruebas_line" id="hidden_field_data_password_pruebas" style="<?php echo $sStyleHidden_password_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_pruebas_label" style=""><span id="id_label_password_pruebas"><?php echo $this->nm_new_label['password_pruebas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['password_pruebas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe_mob']['php_cmp_required']['password_pruebas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password_pruebas"]) &&  $this->nmgp_cmp_readonly["password_pruebas"] == "on") { 

 ?>
<input type="hidden" name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) . "\">" . $password_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_password_pruebas" class="sc-ui-readonly-password_pruebas css_password_pruebas_line" style="<?php echo $sStyleReadLab_password_pruebas; ?>"><?php echo $this->form_format_readonly("password_pruebas", $this->form_encode_input($this->password_pruebas)); ?></span><span id="id_read_off_password_pruebas" class="css_read_off_password_pruebas<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_pruebas_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_password_pruebas" type=text name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['testsetid']))
    {
        $this->nm_new_label['testsetid'] = "TestSetId";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $testsetid = $this->testsetid;
   $sStyleHidden_testsetid = '';
   if (isset($this->nmgp_cmp_hidden['testsetid']) && $this->nmgp_cmp_hidden['testsetid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['testsetid']);
       $sStyleHidden_testsetid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_testsetid = 'display: none;';
   $sStyleReadInp_testsetid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['testsetid']) && $this->nmgp_cmp_readonly['testsetid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['testsetid']);
       $sStyleReadLab_testsetid = '';
       $sStyleReadInp_testsetid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['testsetid']) && $this->nmgp_cmp_hidden['testsetid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="testsetid" value="<?php echo $this->form_encode_input($testsetid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_testsetid_line" id="hidden_field_data_testsetid" style="<?php echo $sStyleHidden_testsetid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_testsetid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_testsetid_label" style=""><span id="id_label_testsetid"><?php echo $this->nm_new_label['testsetid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["testsetid"]) &&  $this->nmgp_cmp_readonly["testsetid"] == "on") { 

 ?>
<input type="hidden" name="testsetid" value="<?php echo $this->form_encode_input($testsetid) . "\">" . $testsetid . ""; ?>
<?php } else { ?>
<span id="id_read_on_testsetid" class="sc-ui-readonly-testsetid css_testsetid_line" style="<?php echo $sStyleReadLab_testsetid; ?>"><?php echo $this->form_format_readonly("testsetid", $this->form_encode_input($this->testsetid)); ?></span><span id="id_read_off_testsetid" class="css_read_off_testsetid<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_testsetid; ?>">
 <input class="sc-js-input scFormObjectOdd css_testsetid_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_testsetid" type=text name="testsetid" value="<?php echo $this->form_encode_input($testsetid) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_testsetid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_testsetid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clave_tecnica']))
    {
        $this->nm_new_label['clave_tecnica'] = "Clave Técnica";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clave_tecnica = $this->clave_tecnica;
   $sStyleHidden_clave_tecnica = '';
   if (isset($this->nmgp_cmp_hidden['clave_tecnica']) && $this->nmgp_cmp_hidden['clave_tecnica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clave_tecnica']);
       $sStyleHidden_clave_tecnica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clave_tecnica = 'display: none;';
   $sStyleReadInp_clave_tecnica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clave_tecnica']) && $this->nmgp_cmp_readonly['clave_tecnica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clave_tecnica']);
       $sStyleReadLab_clave_tecnica = '';
       $sStyleReadInp_clave_tecnica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clave_tecnica']) && $this->nmgp_cmp_hidden['clave_tecnica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clave_tecnica" value="<?php echo $this->form_encode_input($clave_tecnica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_clave_tecnica_line" id="hidden_field_data_clave_tecnica" style="<?php echo $sStyleHidden_clave_tecnica; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clave_tecnica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_clave_tecnica_label" style=""><span id="id_label_clave_tecnica"><?php echo $this->nm_new_label['clave_tecnica']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clave_tecnica"]) &&  $this->nmgp_cmp_readonly["clave_tecnica"] == "on") { 

 ?>
<input type="hidden" name="clave_tecnica" value="<?php echo $this->form_encode_input($clave_tecnica) . "\">" . $clave_tecnica . ""; ?>
<?php } else { ?>
<span id="id_read_on_clave_tecnica" class="sc-ui-readonly-clave_tecnica css_clave_tecnica_line" style="<?php echo $sStyleReadLab_clave_tecnica; ?>"><?php echo $this->form_format_readonly("clave_tecnica", $this->form_encode_input($this->clave_tecnica)); ?></span><span id="id_read_off_clave_tecnica" class="css_read_off_clave_tecnica<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_clave_tecnica; ?>">
 <input class="sc-js-input scFormObjectOdd css_clave_tecnica_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_clave_tecnica" type=text name="clave_tecnica" value="<?php echo $this->form_encode_input($clave_tecnica) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clave_tecnica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clave_tecnica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
