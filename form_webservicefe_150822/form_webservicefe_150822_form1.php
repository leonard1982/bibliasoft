<div id="form_webservicefe_150822_form1" style='<?php echo ($this->tabCssClass["form_webservicefe_150822_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
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
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_150822']['Lookup_enviar_dian'][] = '1'; ?>
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
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_150822']['Lookup_enviar_cliente'][] = '1'; ?>
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
