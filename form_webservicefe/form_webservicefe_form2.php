<div id="form_webservicefe_form2" style='<?php echo ($this->tabCssClass["form_webservicefe_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


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
<?php if (isset($this->nmgp_cmp_hidden['proveedor_anterior']) && $this->nmgp_cmp_hidden['proveedor_anterior'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proveedor_anterior" value="<?php echo $this->form_encode_input($this->proveedor_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proveedor_anterior_line" id="hidden_field_data_proveedor_anterior" style="<?php echo $sStyleHidden_proveedor_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proveedor_anterior_label" style=""><span id="id_label_proveedor_anterior"><?php echo $this->nm_new_label['proveedor_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor_anterior"]) &&  $this->nmgp_cmp_readonly["proveedor_anterior"] == "on") { 

$proveedor_anterior_look = "";
 if ($this->proveedor_anterior == "FACILWEB") { $proveedor_anterior_look .= "FACILWEB" ;} 
 if ($this->proveedor_anterior == "DATAICO") { $proveedor_anterior_look .= "DATAICO" ;} 
 if ($this->proveedor_anterior == "CADENA S. A.") { $proveedor_anterior_look .= "CADENA S. A." ;} 
 if ($this->proveedor_anterior == "THE FACTORY HKA") { $proveedor_anterior_look .= "THE FACTORY HKA" ;} 
 if (empty($proveedor_anterior_look)) { $proveedor_anterior_look = $this->proveedor_anterior; }
?>
<input type="hidden" name="proveedor_anterior" value="<?php echo $this->form_encode_input($proveedor_anterior) . "\">" . $proveedor_anterior_look . ""; ?>
<?php } else { ?>
<?php

$proveedor_anterior_look = "";
 if ($this->proveedor_anterior == "FACILWEB") { $proveedor_anterior_look .= "FACILWEB" ;} 
 if ($this->proveedor_anterior == "DATAICO") { $proveedor_anterior_look .= "DATAICO" ;} 
 if ($this->proveedor_anterior == "CADENA S. A.") { $proveedor_anterior_look .= "CADENA S. A." ;} 
 if ($this->proveedor_anterior == "THE FACTORY HKA") { $proveedor_anterior_look .= "THE FACTORY HKA" ;} 
 if (empty($proveedor_anterior_look)) { $proveedor_anterior_look = $this->proveedor_anterior; }
?>
<span id="id_read_on_proveedor_anterior" class="css_proveedor_anterior_line"  style="<?php echo $sStyleReadLab_proveedor_anterior; ?>"><?php echo $this->form_format_readonly("proveedor_anterior", $this->form_encode_input($proveedor_anterior_look)); ?></span><span id="id_read_off_proveedor_anterior" class="css_read_off_proveedor_anterior<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_proveedor_anterior; ?>">
 <span id="idAjaxSelect_proveedor_anterior" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_proveedor_anterior_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proveedor_anterior" name="proveedor_anterior" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="FACILWEB" <?php  if ($this->proveedor_anterior == "FACILWEB") { echo " selected" ;} ?>>FACILWEB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['Lookup_proveedor_anterior'][] = 'FACILWEB'; ?>
 <option  value="DATAICO" <?php  if ($this->proveedor_anterior == "DATAICO") { echo " selected" ;} ?>>DATAICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['Lookup_proveedor_anterior'][] = 'DATAICO'; ?>
 <option  value="CADENA S. A." <?php  if ($this->proveedor_anterior == "CADENA S. A.") { echo " selected" ;} ?>>CADENA S. A.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['Lookup_proveedor_anterior'][] = 'CADENA S. A.'; ?>
 <option  value="THE FACTORY HKA" <?php  if ($this->proveedor_anterior == "THE FACTORY HKA") { echo " selected" ;} ?>>THE FACTORY HKA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe']['Lookup_proveedor_anterior'][] = 'THE FACTORY HKA'; ?>
 </select></span>
</span><?php  }?>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
