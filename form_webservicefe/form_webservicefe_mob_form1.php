<div id="form_webservicefe_mob_form1" style='<?php echo ($this->tabCssClass["form_webservicefe_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Pruebas</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_prueba1']))
    {
        $this->nm_new_label['servidor_prueba1'] = "Servidor Prueba 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_prueba1 = $this->servidor_prueba1;
   $sStyleHidden_servidor_prueba1 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_prueba1']) && $this->nmgp_cmp_hidden['servidor_prueba1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_prueba1']);
       $sStyleHidden_servidor_prueba1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_prueba1 = 'display: none;';
   $sStyleReadInp_servidor_prueba1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_prueba1']) && $this->nmgp_cmp_readonly['servidor_prueba1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_prueba1']);
       $sStyleReadLab_servidor_prueba1 = '';
       $sStyleReadInp_servidor_prueba1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_prueba1']) && $this->nmgp_cmp_hidden['servidor_prueba1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_prueba1" value="<?php echo $this->form_encode_input($servidor_prueba1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_prueba1_line" id="hidden_field_data_servidor_prueba1" style="<?php echo $sStyleHidden_servidor_prueba1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_prueba1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_prueba1_label" style=""><span id="id_label_servidor_prueba1"><?php echo $this->nm_new_label['servidor_prueba1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_prueba1"]) &&  $this->nmgp_cmp_readonly["servidor_prueba1"] == "on") { 

 ?>
<input type="hidden" name="servidor_prueba1" value="<?php echo $this->form_encode_input($servidor_prueba1) . "\">" . $servidor_prueba1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_prueba1" class="sc-ui-readonly-servidor_prueba1 css_servidor_prueba1_line" style="<?php echo $sStyleReadLab_servidor_prueba1; ?>"><?php echo $this->form_format_readonly("servidor_prueba1", $this->form_encode_input($this->servidor_prueba1)); ?></span><span id="id_read_off_servidor_prueba1" class="css_read_off_servidor_prueba1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_prueba1; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_prueba1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_prueba1" type=text name="servidor_prueba1" value="<?php echo $this->form_encode_input($servidor_prueba1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_prueba1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_prueba1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_prueba2']))
    {
        $this->nm_new_label['servidor_prueba2'] = "Servidor Prueba 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_prueba2 = $this->servidor_prueba2;
   $sStyleHidden_servidor_prueba2 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_prueba2']) && $this->nmgp_cmp_hidden['servidor_prueba2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_prueba2']);
       $sStyleHidden_servidor_prueba2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_prueba2 = 'display: none;';
   $sStyleReadInp_servidor_prueba2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_prueba2']) && $this->nmgp_cmp_readonly['servidor_prueba2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_prueba2']);
       $sStyleReadLab_servidor_prueba2 = '';
       $sStyleReadInp_servidor_prueba2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_prueba2']) && $this->nmgp_cmp_hidden['servidor_prueba2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_prueba2" value="<?php echo $this->form_encode_input($servidor_prueba2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_prueba2_line" id="hidden_field_data_servidor_prueba2" style="<?php echo $sStyleHidden_servidor_prueba2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_prueba2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_prueba2_label" style=""><span id="id_label_servidor_prueba2"><?php echo $this->nm_new_label['servidor_prueba2']; ?></span></span><br>
<?php
$servidor_prueba2_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($servidor_prueba2));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_prueba2"]) &&  $this->nmgp_cmp_readonly["servidor_prueba2"] == "on") { 

 ?>
<input type="hidden" name="servidor_prueba2" value="<?php echo $this->form_encode_input($servidor_prueba2) . "\">" . $servidor_prueba2_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_prueba2" class="sc-ui-readonly-servidor_prueba2 css_servidor_prueba2_line" style="<?php echo $sStyleReadLab_servidor_prueba2; ?>"><?php echo $this->form_format_readonly("servidor_prueba2", $this->form_encode_input($servidor_prueba2_val)); ?></span><span id="id_read_off_servidor_prueba2" class="css_read_off_servidor_prueba2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_prueba2; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_servidor_prueba2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="servidor_prueba2" id="id_sc_field_servidor_prueba2" rows="2" cols="80"
 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $servidor_prueba2; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_prueba2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_prueba2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_prueba3']))
    {
        $this->nm_new_label['servidor_prueba3'] = "Servidor Prueba 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_prueba3 = $this->servidor_prueba3;
   $sStyleHidden_servidor_prueba3 = '';
   if (isset($this->nmgp_cmp_hidden['servidor_prueba3']) && $this->nmgp_cmp_hidden['servidor_prueba3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_prueba3']);
       $sStyleHidden_servidor_prueba3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_prueba3 = 'display: none;';
   $sStyleReadInp_servidor_prueba3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_prueba3']) && $this->nmgp_cmp_readonly['servidor_prueba3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_prueba3']);
       $sStyleReadLab_servidor_prueba3 = '';
       $sStyleReadInp_servidor_prueba3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_prueba3']) && $this->nmgp_cmp_hidden['servidor_prueba3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_prueba3" value="<?php echo $this->form_encode_input($servidor_prueba3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_prueba3_line" id="hidden_field_data_servidor_prueba3" style="<?php echo $sStyleHidden_servidor_prueba3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_prueba3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_prueba3_label" style=""><span id="id_label_servidor_prueba3"><?php echo $this->nm_new_label['servidor_prueba3']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor_prueba3"]) &&  $this->nmgp_cmp_readonly["servidor_prueba3"] == "on") { 

 ?>
<input type="hidden" name="servidor_prueba3" value="<?php echo $this->form_encode_input($servidor_prueba3) . "\">" . $servidor_prueba3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor_prueba3" class="sc-ui-readonly-servidor_prueba3 css_servidor_prueba3_line" style="<?php echo $sStyleReadLab_servidor_prueba3; ?>"><?php echo $this->form_format_readonly("servidor_prueba3", $this->form_encode_input($this->servidor_prueba3)); ?></span><span id="id_read_off_servidor_prueba3" class="css_read_off_servidor_prueba3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor_prueba3; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_prueba3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor_prueba3" type=text name="servidor_prueba3" value="<?php echo $this->form_encode_input($servidor_prueba3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_prueba3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_prueba3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token_prueba']))
    {
        $this->nm_new_label['token_prueba'] = "Token Prueba";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token_prueba = $this->token_prueba;
   $sStyleHidden_token_prueba = '';
   if (isset($this->nmgp_cmp_hidden['token_prueba']) && $this->nmgp_cmp_hidden['token_prueba'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token_prueba']);
       $sStyleHidden_token_prueba = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token_prueba = 'display: none;';
   $sStyleReadInp_token_prueba = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token_prueba']) && $this->nmgp_cmp_readonly['token_prueba'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token_prueba']);
       $sStyleReadLab_token_prueba = '';
       $sStyleReadInp_token_prueba = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token_prueba']) && $this->nmgp_cmp_hidden['token_prueba'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token_prueba" value="<?php echo $this->form_encode_input($token_prueba) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_prueba_line" id="hidden_field_data_token_prueba" style="<?php echo $sStyleHidden_token_prueba; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_prueba_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_prueba_label" style=""><span id="id_label_token_prueba"><?php echo $this->nm_new_label['token_prueba']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token_prueba"]) &&  $this->nmgp_cmp_readonly["token_prueba"] == "on") { 

 ?>
<input type="hidden" name="token_prueba" value="<?php echo $this->form_encode_input($token_prueba) . "\">" . $token_prueba . ""; ?>
<?php } else { ?>
<span id="id_read_on_token_prueba" class="sc-ui-readonly-token_prueba css_token_prueba_line" style="<?php echo $sStyleReadLab_token_prueba; ?>"><?php echo $this->form_format_readonly("token_prueba", $this->form_encode_input($this->token_prueba)); ?></span><span id="id_read_off_token_prueba" class="css_read_off_token_prueba<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token_prueba; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_prueba_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_token_prueba" type=text name="token_prueba" value="<?php echo $this->form_encode_input($token_prueba) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_prueba_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_prueba_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password_prueba']))
    {
        $this->nm_new_label['password_prueba'] = "Password Prueba";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password_prueba = $this->password_prueba;
   $sStyleHidden_password_prueba = '';
   if (isset($this->nmgp_cmp_hidden['password_prueba']) && $this->nmgp_cmp_hidden['password_prueba'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password_prueba']);
       $sStyleHidden_password_prueba = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password_prueba = 'display: none;';
   $sStyleReadInp_password_prueba = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password_prueba']) && $this->nmgp_cmp_readonly['password_prueba'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password_prueba']);
       $sStyleReadLab_password_prueba = '';
       $sStyleReadInp_password_prueba = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password_prueba']) && $this->nmgp_cmp_hidden['password_prueba'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password_prueba" value="<?php echo $this->form_encode_input($password_prueba) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_prueba_line" id="hidden_field_data_password_prueba" style="<?php echo $sStyleHidden_password_prueba; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_prueba_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_prueba_label" style=""><span id="id_label_password_prueba"><?php echo $this->nm_new_label['password_prueba']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password_prueba"]) &&  $this->nmgp_cmp_readonly["password_prueba"] == "on") { 

 ?>
<input type="hidden" name="password_prueba" value="<?php echo $this->form_encode_input($password_prueba) . "\">" . $password_prueba . ""; ?>
<?php } else { ?>
<span id="id_read_on_password_prueba" class="sc-ui-readonly-password_prueba css_password_prueba_line" style="<?php echo $sStyleReadLab_password_prueba; ?>"><?php echo $this->form_format_readonly("password_prueba", $this->form_encode_input($this->password_prueba)); ?></span><span id="id_read_off_password_prueba" class="css_read_off_password_prueba<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password_prueba; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_prueba_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password_prueba" type=text name="password_prueba" value="<?php echo $this->form_encode_input($password_prueba) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_prueba_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_prueba_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['enviar_dian']))
   {
       $this->nm_new_label['enviar_dian'] = "Enviar Dian";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enviar_dian = $this->enviar_dian;
   $sStyleHidden_enviar_dian = '';
   if (isset($this->nmgp_cmp_hidden['enviar_dian']) && $this->nmgp_cmp_hidden['enviar_dian'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enviar_dian']);
       $sStyleHidden_enviar_dian = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enviar_dian = 'display: none;';
   $sStyleReadInp_enviar_dian = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enviar_dian']) && $this->nmgp_cmp_readonly['enviar_dian'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enviar_dian']);
       $sStyleReadLab_enviar_dian = '';
       $sStyleReadInp_enviar_dian = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enviar_dian']) && $this->nmgp_cmp_hidden['enviar_dian'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="enviar_dian" value="<?php echo $this->form_encode_input($this->enviar_dian) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->enviar_dian_1 = explode(";", trim($this->enviar_dian));
  } 
  else
  {
      if (empty($this->enviar_dian))
      {
          $this->enviar_dian_1= array(); 
          $this->enviar_dian= "0";
      } 
      else
      {
          $this->enviar_dian_1= $this->enviar_dian; 
          $this->enviar_dian= ""; 
          foreach ($this->enviar_dian_1 as $cada_enviar_dian)
          {
             if (!empty($enviar_dian))
             {
                 $this->enviar_dian.= ";"; 
             } 
             $this->enviar_dian.= $cada_enviar_dian; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_enviar_dian_line" id="hidden_field_data_enviar_dian" style="<?php echo $sStyleHidden_enviar_dian; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_dian_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_dian_label" style=""><span id="id_label_enviar_dian"><?php echo $this->nm_new_label['enviar_dian']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_dian"]) &&  $this->nmgp_cmp_readonly["enviar_dian"] == "on") { 

$enviar_dian_look = "";
 if ($this->enviar_dian == "1") { $enviar_dian_look .= "SI" ;} 
 if (empty($enviar_dian_look)) { $enviar_dian_look = $this->enviar_dian; }
?>
<input type="hidden" name="enviar_dian" value="<?php echo $this->form_encode_input($enviar_dian) . "\">" . $enviar_dian_look . ""; ?>
<?php } else { ?>

<?php

$enviar_dian_look = "";
 if ($this->enviar_dian == "1") { $enviar_dian_look .= "SI" ;} 
 if (empty($enviar_dian_look)) { $enviar_dian_look = $this->enviar_dian; }
?>
<span id="id_read_on_enviar_dian" class="css_enviar_dian_line" style="<?php echo $sStyleReadLab_enviar_dian; ?>"><?php echo $this->form_format_readonly("enviar_dian", $this->form_encode_input($enviar_dian_look)); ?></span><span id="id_read_off_enviar_dian" class="css_read_off_enviar_dian css_enviar_dian_line" style="<?php echo $sStyleReadInp_enviar_dian; ?>"><?php echo "<div id=\"idAjaxCheckbox_enviar_dian\" style=\"display: inline-block\" class=\"css_enviar_dian_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_enviar_dian_line"><?php $tempOptionId = "id-opt-enviar_dian" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-enviar_dian sc-ui-checkbox-enviar_dian" name="enviar_dian[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_enviar_dian'][] = '1'; ?>
<?php  if (in_array("1", $this->enviar_dian_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('enviar_dian')", "nm_mostra_mens('enviar_dian')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enviar_dian_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enviar_dian_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['enviar_cliente']))
   {
       $this->nm_new_label['enviar_cliente'] = "Enviar Cliente";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enviar_cliente = $this->enviar_cliente;
   $sStyleHidden_enviar_cliente = '';
   if (isset($this->nmgp_cmp_hidden['enviar_cliente']) && $this->nmgp_cmp_hidden['enviar_cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enviar_cliente']);
       $sStyleHidden_enviar_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enviar_cliente = 'display: none;';
   $sStyleReadInp_enviar_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enviar_cliente']) && $this->nmgp_cmp_readonly['enviar_cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enviar_cliente']);
       $sStyleReadLab_enviar_cliente = '';
       $sStyleReadInp_enviar_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enviar_cliente']) && $this->nmgp_cmp_hidden['enviar_cliente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="enviar_cliente" value="<?php echo $this->form_encode_input($this->enviar_cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->enviar_cliente_1 = explode(";", trim($this->enviar_cliente));
  } 
  else
  {
      if (empty($this->enviar_cliente))
      {
          $this->enviar_cliente_1= array(); 
          $this->enviar_cliente= "0";
      } 
      else
      {
          $this->enviar_cliente_1= $this->enviar_cliente; 
          $this->enviar_cliente= ""; 
          foreach ($this->enviar_cliente_1 as $cada_enviar_cliente)
          {
             if (!empty($enviar_cliente))
             {
                 $this->enviar_cliente.= ";"; 
             } 
             $this->enviar_cliente.= $cada_enviar_cliente; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_enviar_cliente_line" id="hidden_field_data_enviar_cliente" style="<?php echo $sStyleHidden_enviar_cliente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_cliente_label" style=""><span id="id_label_enviar_cliente"><?php echo $this->nm_new_label['enviar_cliente']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_cliente"]) &&  $this->nmgp_cmp_readonly["enviar_cliente"] == "on") { 

$enviar_cliente_look = "";
 if ($this->enviar_cliente == "1") { $enviar_cliente_look .= "SI" ;} 
 if (empty($enviar_cliente_look)) { $enviar_cliente_look = $this->enviar_cliente; }
?>
<input type="hidden" name="enviar_cliente" value="<?php echo $this->form_encode_input($enviar_cliente) . "\">" . $enviar_cliente_look . ""; ?>
<?php } else { ?>

<?php

$enviar_cliente_look = "";
 if ($this->enviar_cliente == "1") { $enviar_cliente_look .= "SI" ;} 
 if (empty($enviar_cliente_look)) { $enviar_cliente_look = $this->enviar_cliente; }
?>
<span id="id_read_on_enviar_cliente" class="css_enviar_cliente_line" style="<?php echo $sStyleReadLab_enviar_cliente; ?>"><?php echo $this->form_format_readonly("enviar_cliente", $this->form_encode_input($enviar_cliente_look)); ?></span><span id="id_read_off_enviar_cliente" class="css_read_off_enviar_cliente css_enviar_cliente_line" style="<?php echo $sStyleReadInp_enviar_cliente; ?>"><?php echo "<div id=\"idAjaxCheckbox_enviar_cliente\" style=\"display: inline-block\" class=\"css_enviar_cliente_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_enviar_cliente_line"><?php $tempOptionId = "id-opt-enviar_cliente" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-enviar_cliente sc-ui-checkbox-enviar_cliente" name="enviar_cliente[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_enviar_cliente'][] = '1'; ?>
<?php  if (in_array("1", $this->enviar_cliente_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('enviar_cliente')", "nm_mostra_mens('enviar_cliente')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enviar_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enviar_cliente_text"></span></td></tr></table></td></tr></table> </TD>
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
 $NM_pag_atual = "form_webservicefe_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_webservicefe_mob_form" . $this->nmgp_ancora;
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_webservicefe_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_webservicefe_mob");
 parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['sc_modal'])
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
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['buttonStatus'] = $this->nmgp_botoes;
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
