<div id="form_webservicefe_form3" style='<?php echo ($this->tabCssClass["form_webservicefe_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Proveedor Anterior</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proveedor_anterior']))
    {
        $this->nm_new_label['proveedor_anterior'] = "Proveedor Anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proveedor_anterior = $this->proveedor_anterior;
   $sStyleHidden_proveedor_anterior = '';
   if (isset($this->nmgp_cmp_hidden['proveedor_anterior']) && $this->nmgp_cmp_hidden['proveedor_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proveedor_anterior']);
       $sStyleHidden_proveedor_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proveedor_anterior = 'display: none;';
   $sStyleReadInp_proveedor_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proveedor_anterior']) && $this->nmgp_cmp_readonly['proveedor_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proveedor_anterior']);
       $sStyleReadLab_proveedor_anterior = '';
       $sStyleReadInp_proveedor_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proveedor_anterior']) && $this->nmgp_cmp_hidden['proveedor_anterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proveedor_anterior" value="<?php echo $this->form_encode_input($proveedor_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proveedor_anterior_line" id="hidden_field_data_proveedor_anterior" style="<?php echo $sStyleHidden_proveedor_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proveedor_anterior_label" style=""><span id="id_label_proveedor_anterior"><?php echo $this->nm_new_label['proveedor_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor_anterior"]) &&  $this->nmgp_cmp_readonly["proveedor_anterior"] == "on") { 

 ?>
<input type="hidden" name="proveedor_anterior" value="<?php echo $this->form_encode_input($proveedor_anterior) . "\">" . $proveedor_anterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_proveedor_anterior" class="sc-ui-readonly-proveedor_anterior css_proveedor_anterior_line" style="<?php echo $sStyleReadLab_proveedor_anterior; ?>"><?php echo $this->form_format_readonly("proveedor_anterior", $this->form_encode_input($this->proveedor_anterior)); ?></span><span id="id_read_off_proveedor_anterior" class="css_read_off_proveedor_anterior<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_proveedor_anterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_proveedor_anterior_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proveedor_anterior" type=text name="proveedor_anterior" value="<?php echo $this->form_encode_input($proveedor_anterior) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proveedor_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proveedor_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_anterior1']))
    {
        $this->nm_new_label['servidor_anterior1'] = "Servidor Anterior 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_anterior1 = $this->servidor_anterior1;
   $sStyleHidden_servidor_anterior1 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_anterior1']) && $this->nmgp_cmp_hidden['servidor_anterior1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_anterior1']);
       $sStyleHidden_servidor_anterior1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_anterior1 = 'display: none;';
   $sStyleReadInp_servidor_anterior1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_anterior1']) && $this->nmgp_cmp_readonly['servidor_anterior1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_anterior1']);
       $sStyleReadLab_servidor_anterior1 = '';
       $sStyleReadInp_servidor_anterior1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_anterior1']) && $this->nmgp_cmp_hidden['servidor_anterior1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_anterior1" value="<?php echo $this->form_encode_input($servidor_anterior1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_anterior1_line" id="hidden_field_data_servidor_anterior1" style="<?php echo $sStyleHidden_servidor_anterior1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_anterior1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_anterior1_label" style=""><span id="id_label_servidor_anterior1"><?php echo $this->nm_new_label['servidor_anterior1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_anterior1"]) &&  $this->nmgp_cmp_readonly["servidor_anterior1"] == "on") { 

 ?>
<input type="hidden" name="servidor_anterior1" value="<?php echo $this->form_encode_input($servidor_anterior1) . "\">" . $servidor_anterior1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_anterior1" class="sc-ui-readonly-servidor_anterior1 css_servidor_anterior1_line" style="<?php echo $sStyleReadLab_servidor_anterior1; ?>"><?php echo $this->form_format_readonly("servidor_anterior1", $this->form_encode_input($this->servidor_anterior1)); ?></span><span id="id_read_off_servidor_anterior1" class="css_read_off_servidor_anterior1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_anterior1; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_anterior1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_anterior1" type=text name="servidor_anterior1" value="<?php echo $this->form_encode_input($servidor_anterior1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_anterior1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_anterior1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_anterior2']))
    {
        $this->nm_new_label['servidor_anterior2'] = "Servidor Anterior 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_anterior2 = $this->servidor_anterior2;
   $sStyleHidden_servidor_anterior2 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_anterior2']) && $this->nmgp_cmp_hidden['servidor_anterior2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_anterior2']);
       $sStyleHidden_servidor_anterior2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_anterior2 = 'display: none;';
   $sStyleReadInp_servidor_anterior2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_anterior2']) && $this->nmgp_cmp_readonly['servidor_anterior2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_anterior2']);
       $sStyleReadLab_servidor_anterior2 = '';
       $sStyleReadInp_servidor_anterior2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_anterior2']) && $this->nmgp_cmp_hidden['servidor_anterior2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_anterior2" value="<?php echo $this->form_encode_input($servidor_anterior2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_anterior2_line" id="hidden_field_data_servidor_anterior2" style="<?php echo $sStyleHidden_servidor_anterior2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_anterior2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_anterior2_label" style=""><span id="id_label_servidor_anterior2"><?php echo $this->nm_new_label['servidor_anterior2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_anterior2"]) &&  $this->nmgp_cmp_readonly["servidor_anterior2"] == "on") { 

 ?>
<input type="hidden" name="servidor_anterior2" value="<?php echo $this->form_encode_input($servidor_anterior2) . "\">" . $servidor_anterior2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_anterior2" class="sc-ui-readonly-servidor_anterior2 css_servidor_anterior2_line" style="<?php echo $sStyleReadLab_servidor_anterior2; ?>"><?php echo $this->form_format_readonly("servidor_anterior2", $this->form_encode_input($this->servidor_anterior2)); ?></span><span id="id_read_off_servidor_anterior2" class="css_read_off_servidor_anterior2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_anterior2; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_anterior2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_anterior2" type=text name="servidor_anterior2" value="<?php echo $this->form_encode_input($servidor_anterior2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_anterior2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_anterior2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_anterior3']))
    {
        $this->nm_new_label['servidor_anterior3'] = "Servidor Anterior 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_anterior3 = $this->servidor_anterior3;
   $sStyleHidden_servidor_anterior3 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_anterior3']) && $this->nmgp_cmp_hidden['servidor_anterior3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_anterior3']);
       $sStyleHidden_servidor_anterior3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_anterior3 = 'display: none;';
   $sStyleReadInp_servidor_anterior3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_anterior3']) && $this->nmgp_cmp_readonly['servidor_anterior3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_anterior3']);
       $sStyleReadLab_servidor_anterior3 = '';
       $sStyleReadInp_servidor_anterior3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_anterior3']) && $this->nmgp_cmp_hidden['servidor_anterior3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_anterior3" value="<?php echo $this->form_encode_input($servidor_anterior3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_anterior3_line" id="hidden_field_data_servidor_anterior3" style="<?php echo $sStyleHidden_servidor_anterior3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_anterior3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_anterior3_label" style=""><span id="id_label_servidor_anterior3"><?php echo $this->nm_new_label['servidor_anterior3']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_anterior3"]) &&  $this->nmgp_cmp_readonly["servidor_anterior3"] == "on") { 

 ?>
<input type="hidden" name="servidor_anterior3" value="<?php echo $this->form_encode_input($servidor_anterior3) . "\">" . $servidor_anterior3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_anterior3" class="sc-ui-readonly-servidor_anterior3 css_servidor_anterior3_line" style="<?php echo $sStyleReadLab_servidor_anterior3; ?>"><?php echo $this->form_format_readonly("servidor_anterior3", $this->form_encode_input($this->servidor_anterior3)); ?></span><span id="id_read_off_servidor_anterior3" class="css_read_off_servidor_anterior3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_anterior3; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_anterior3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_anterior3" type=text name="servidor_anterior3" value="<?php echo $this->form_encode_input($servidor_anterior3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_anterior3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_anterior3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token_anterior']))
    {
        $this->nm_new_label['token_anterior'] = "Token Anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token_anterior = $this->token_anterior;
   $sStyleHidden_token_anterior = '';
   if (isset($this->nmgp_cmp_hidden['token_anterior']) && $this->nmgp_cmp_hidden['token_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token_anterior']);
       $sStyleHidden_token_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token_anterior = 'display: none;';
   $sStyleReadInp_token_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token_anterior']) && $this->nmgp_cmp_readonly['token_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token_anterior']);
       $sStyleReadLab_token_anterior = '';
       $sStyleReadInp_token_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token_anterior']) && $this->nmgp_cmp_hidden['token_anterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_anterior_line" id="hidden_field_data_token_anterior" style="<?php echo $sStyleHidden_token_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_anterior_label" style=""><span id="id_label_token_anterior"><?php echo $this->nm_new_label['token_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token_anterior"]) &&  $this->nmgp_cmp_readonly["token_anterior"] == "on") { 

 ?>
<input type="hidden" name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) . "\">" . $token_anterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_token_anterior" class="sc-ui-readonly-token_anterior css_token_anterior_line" style="<?php echo $sStyleReadLab_token_anterior; ?>"><?php echo $this->form_format_readonly("token_anterior", $this->form_encode_input($this->token_anterior)); ?></span><span id="id_read_off_token_anterior" class="css_read_off_token_anterior<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token_anterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_anterior_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_token_anterior" type=text name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password_anterior']))
    {
        $this->nm_new_label['password_anterior'] = "Password Anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password_anterior = $this->password_anterior;
   $sStyleHidden_password_anterior = '';
   if (isset($this->nmgp_cmp_hidden['password_anterior']) && $this->nmgp_cmp_hidden['password_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password_anterior']);
       $sStyleHidden_password_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password_anterior = 'display: none;';
   $sStyleReadInp_password_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password_anterior']) && $this->nmgp_cmp_readonly['password_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password_anterior']);
       $sStyleReadLab_password_anterior = '';
       $sStyleReadInp_password_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password_anterior']) && $this->nmgp_cmp_hidden['password_anterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password_anterior" value="<?php echo $this->form_encode_input($password_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_anterior_line" id="hidden_field_data_password_anterior" style="<?php echo $sStyleHidden_password_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_anterior_label" style=""><span id="id_label_password_anterior"><?php echo $this->nm_new_label['password_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password_anterior"]) &&  $this->nmgp_cmp_readonly["password_anterior"] == "on") { 

 ?>
<input type="hidden" name="password_anterior" value="<?php echo $this->form_encode_input($password_anterior) . "\">" . $password_anterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_password_anterior" class="sc-ui-readonly-password_anterior css_password_anterior_line" style="<?php echo $sStyleReadLab_password_anterior; ?>"><?php echo $this->form_format_readonly("password_anterior", $this->form_encode_input($this->password_anterior)); ?></span><span id="id_read_off_password_anterior" class="css_read_off_password_anterior<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password_anterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_anterior_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password_anterior" type=text name="password_anterior" value="<?php echo $this->form_encode_input($password_anterior) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
 $NM_pag_atual = "form_webservicefe_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_webservicefe_form" . $this->nmgp_ancora;
 }
?>
<?php
if (!$this->nmgp_form_empty) {
?>
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.width='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.height='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.display='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.overflow='visible';
<?php
}
else {
?>
  $(".sc-ui-page-tab-line").hide();
  $("#sc-id-required-row").hide();
<?php
}
?>
</script> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_webservicefe");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_webservicefe");
 parent.scAjaxDetailHeight("form_webservicefe", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_webservicefe", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_webservicefe", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
