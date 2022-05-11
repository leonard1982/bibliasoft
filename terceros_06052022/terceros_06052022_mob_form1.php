<div id="terceros_06052022_mob_form1" style='<?php echo ($this->tabCssClass["terceros_06052022_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idtercero']))
   {
       $this->nmgp_cmp_hidden['idtercero'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['imagenter']))
   {
       $this->nmgp_cmp_hidden['imagenter'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['relleno2']))
   {
       $this->nmgp_cmp_hidden['relleno2'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_6" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idtercero']))
           {
               $this->nmgp_cmp_readonly['idtercero'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf6\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos Crédito Cliente<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['credito']))
   {
       $this->nm_new_label['credito'] = "Credito";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $credito = $this->credito;
   $sStyleHidden_credito = '';
   if (isset($this->nmgp_cmp_hidden['credito']) && $this->nmgp_cmp_hidden['credito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['credito']);
       $sStyleHidden_credito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_credito = 'display: none;';
   $sStyleReadInp_credito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['credito']) && $this->nmgp_cmp_readonly['credito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['credito']);
       $sStyleReadLab_credito = '';
       $sStyleReadInp_credito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['credito']) && $this->nmgp_cmp_hidden['credito'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="credito" value="<?php echo $this->form_encode_input($this->credito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_credito_line" id="hidden_field_data_credito" style="<?php echo $sStyleHidden_credito; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_credito_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_credito_label" style=""><span id="id_label_credito"><?php echo $this->nm_new_label['credito']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["credito"]) &&  $this->nmgp_cmp_readonly["credito"] == "on") { 

$credito_look = "";
 if ($this->credito == "NO") { $credito_look .= "NO" ;} 
 if ($this->credito == "SI") { $credito_look .= "SI" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<input type="hidden" name="credito" value="<?php echo $this->form_encode_input($credito) . "\">" . $credito_look . ""; ?>
<?php } else { ?>
<?php

$credito_look = "";
 if ($this->credito == "NO") { $credito_look .= "NO" ;} 
 if ($this->credito == "SI") { $credito_look .= "SI" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<span id="id_read_on_credito" class="css_credito_line"  style="<?php echo $sStyleReadLab_credito; ?>"><?php echo $this->form_format_readonly("credito", $this->form_encode_input($credito_look)); ?></span><span id="id_read_off_credito" class="css_read_off_credito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_credito; ?>">
 <span id="idAjaxSelect_credito" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_credito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_credito" name="credito" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->credito == "NO") { echo " selected" ;} ?><?php  if (empty($this->credito)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_credito'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->credito == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_credito'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_credito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_credito_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cupo']))
    {
        $this->nm_new_label['cupo'] = "Cupo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cupo = $this->cupo;
   $sStyleHidden_cupo = '';
   if (isset($this->nmgp_cmp_hidden['cupo']) && $this->nmgp_cmp_hidden['cupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cupo']);
       $sStyleHidden_cupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cupo = 'display: none;';
   $sStyleReadInp_cupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cupo']) && $this->nmgp_cmp_readonly['cupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cupo']);
       $sStyleReadLab_cupo = '';
       $sStyleReadInp_cupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cupo']) && $this->nmgp_cmp_hidden['cupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cupo" value="<?php echo $this->form_encode_input($cupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cupo_line" id="hidden_field_data_cupo" style="<?php echo $sStyleHidden_cupo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cupo_label" style=""><span id="id_label_cupo"><?php echo $this->nm_new_label['cupo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cupo"]) &&  $this->nmgp_cmp_readonly["cupo"] == "on") { 

 ?>
<input type="hidden" name="cupo" value="<?php echo $this->form_encode_input($cupo) . "\">" . $cupo . ""; ?>
<?php } else { ?>
<span id="id_read_on_cupo" class="sc-ui-readonly-cupo css_cupo_line" style="<?php echo $sStyleReadLab_cupo; ?>"><?php echo $this->form_format_readonly("cupo", $this->form_encode_input($this->cupo)); ?></span><span id="id_read_off_cupo" class="css_read_off_cupo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cupo; ?>">
 <input class="sc-js-input scFormObjectOdd css_cupo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cupo" type=text name="cupo" value="<?php echo $this->form_encode_input($cupo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cupo']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cupo']['format_pos'] || 3 == $this->field_config['cupo']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cupo']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cupo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cupo']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cupo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('cupo')", "nm_mostra_mens('cupo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cupodis']))
    {
        $this->nm_new_label['cupodis'] = "Cupo disponible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cupodis = $this->cupodis;
   $sStyleHidden_cupodis = '';
   if (isset($this->nmgp_cmp_hidden['cupodis']) && $this->nmgp_cmp_hidden['cupodis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cupodis']);
       $sStyleHidden_cupodis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cupodis = 'display: none;';
   $sStyleReadInp_cupodis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cupodis']) && $this->nmgp_cmp_readonly['cupodis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cupodis']);
       $sStyleReadLab_cupodis = '';
       $sStyleReadInp_cupodis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cupodis']) && $this->nmgp_cmp_hidden['cupodis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cupodis" value="<?php echo $this->form_encode_input($cupodis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cupodis_line" id="hidden_field_data_cupodis" style="<?php echo $sStyleHidden_cupodis; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cupodis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cupodis_label" style=""><span id="id_label_cupodis"><?php echo $this->nm_new_label['cupodis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cupodis"]) &&  $this->nmgp_cmp_readonly["cupodis"] == "on") { 

 ?>
<input type="hidden" name="cupodis" value="<?php echo $this->form_encode_input($cupodis) . "\">" . $cupodis . ""; ?>
<?php } else { ?>
<span id="id_read_on_cupodis" class="sc-ui-readonly-cupodis css_cupodis_line" style="<?php echo $sStyleReadLab_cupodis; ?>"><?php echo $this->form_format_readonly("cupodis", $this->form_encode_input($this->cupodis)); ?></span><span id="id_read_off_cupodis" class="css_read_off_cupodis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cupodis; ?>">
 <input class="sc-js-input scFormObjectOdd css_cupodis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cupodis" type=text name="cupodis" value="<?php echo $this->form_encode_input($cupodis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cupodis']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cupodis']['format_pos'] || 3 == $this->field_config['cupodis']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cupodis']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cupodis']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cupodis']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cupodis']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cupodis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cupodis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dias_credito']))
    {
        $this->nm_new_label['dias_credito'] = "Dias Crédito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dias_credito = $this->dias_credito;
   $sStyleHidden_dias_credito = '';
   if (isset($this->nmgp_cmp_hidden['dias_credito']) && $this->nmgp_cmp_hidden['dias_credito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dias_credito']);
       $sStyleHidden_dias_credito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dias_credito = 'display: none;';
   $sStyleReadInp_dias_credito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dias_credito']) && $this->nmgp_cmp_readonly['dias_credito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dias_credito']);
       $sStyleReadLab_dias_credito = '';
       $sStyleReadInp_dias_credito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dias_credito']) && $this->nmgp_cmp_hidden['dias_credito'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dias_credito" value="<?php echo $this->form_encode_input($dias_credito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dias_credito_line" id="hidden_field_data_dias_credito" style="<?php echo $sStyleHidden_dias_credito; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dias_credito_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dias_credito_label" style=""><span id="id_label_dias_credito"><?php echo $this->nm_new_label['dias_credito']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dias_credito"]) &&  $this->nmgp_cmp_readonly["dias_credito"] == "on") { 

 ?>
<input type="hidden" name="dias_credito" value="<?php echo $this->form_encode_input($dias_credito) . "\">" . $dias_credito . ""; ?>
<?php } else { ?>
<span id="id_read_on_dias_credito" class="sc-ui-readonly-dias_credito css_dias_credito_line" style="<?php echo $sStyleReadLab_dias_credito; ?>"><?php echo $this->form_format_readonly("dias_credito", $this->form_encode_input($this->dias_credito)); ?></span><span id="id_read_off_dias_credito" class="css_read_off_dias_credito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dias_credito; ?>">
 <input class="sc-js-input scFormObjectOdd css_dias_credito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dias_credito" type=text name="dias_credito" value="<?php echo $this->form_encode_input($dias_credito) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dias_credito']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dias_credito']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dias_credito']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('dias_credito')", "nm_mostra_mens('dias_credito')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dias_credito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dias_credito_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dias_mora']))
    {
        $this->nm_new_label['dias_mora'] = "Dias Mora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dias_mora = $this->dias_mora;
   $sStyleHidden_dias_mora = '';
   if (isset($this->nmgp_cmp_hidden['dias_mora']) && $this->nmgp_cmp_hidden['dias_mora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dias_mora']);
       $sStyleHidden_dias_mora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dias_mora = 'display: none;';
   $sStyleReadInp_dias_mora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dias_mora']) && $this->nmgp_cmp_readonly['dias_mora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dias_mora']);
       $sStyleReadLab_dias_mora = '';
       $sStyleReadInp_dias_mora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dias_mora']) && $this->nmgp_cmp_hidden['dias_mora'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dias_mora" value="<?php echo $this->form_encode_input($dias_mora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dias_mora_line" id="hidden_field_data_dias_mora" style="<?php echo $sStyleHidden_dias_mora; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dias_mora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dias_mora_label" style=""><span id="id_label_dias_mora"><?php echo $this->nm_new_label['dias_mora']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dias_mora"]) &&  $this->nmgp_cmp_readonly["dias_mora"] == "on") { 

 ?>
<input type="hidden" name="dias_mora" value="<?php echo $this->form_encode_input($dias_mora) . "\">" . $dias_mora . ""; ?>
<?php } else { ?>
<span id="id_read_on_dias_mora" class="sc-ui-readonly-dias_mora css_dias_mora_line" style="<?php echo $sStyleReadLab_dias_mora; ?>"><?php echo $this->form_format_readonly("dias_mora", $this->form_encode_input($this->dias_mora)); ?></span><span id="id_read_off_dias_mora" class="css_read_off_dias_mora<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dias_mora; ?>">
 <input class="sc-js-input scFormObjectOdd css_dias_mora_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dias_mora" type=text name="dias_mora" value="<?php echo $this->form_encode_input($dias_mora) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dias_mora']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dias_mora']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dias_mora']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('dias_mora')", "nm_mostra_mens('dias_mora')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dias_mora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dias_mora_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['efec_retencion']))
   {
       $this->nm_new_label['efec_retencion'] = "Practica Retención";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $efec_retencion = $this->efec_retencion;
   $sStyleHidden_efec_retencion = '';
   if (isset($this->nmgp_cmp_hidden['efec_retencion']) && $this->nmgp_cmp_hidden['efec_retencion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['efec_retencion']);
       $sStyleHidden_efec_retencion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_efec_retencion = 'display: none;';
   $sStyleReadInp_efec_retencion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['efec_retencion']) && $this->nmgp_cmp_readonly['efec_retencion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['efec_retencion']);
       $sStyleReadLab_efec_retencion = '';
       $sStyleReadInp_efec_retencion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['efec_retencion']) && $this->nmgp_cmp_hidden['efec_retencion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="efec_retencion" value="<?php echo $this->form_encode_input($this->efec_retencion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_efec_retencion_line" id="hidden_field_data_efec_retencion" style="<?php echo $sStyleHidden_efec_retencion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_efec_retencion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_efec_retencion_label" style=""><span id="id_label_efec_retencion"><?php echo $this->nm_new_label['efec_retencion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["efec_retencion"]) &&  $this->nmgp_cmp_readonly["efec_retencion"] == "on") { 

$efec_retencion_look = "";
 if ($this->efec_retencion == "N") { $efec_retencion_look .= "NO" ;} 
 if ($this->efec_retencion == "S") { $efec_retencion_look .= "SI" ;} 
 if (empty($efec_retencion_look)) { $efec_retencion_look = $this->efec_retencion; }
?>
<input type="hidden" name="efec_retencion" value="<?php echo $this->form_encode_input($efec_retencion) . "\">" . $efec_retencion_look . ""; ?>
<?php } else { ?>
<?php

$efec_retencion_look = "";
 if ($this->efec_retencion == "N") { $efec_retencion_look .= "NO" ;} 
 if ($this->efec_retencion == "S") { $efec_retencion_look .= "SI" ;} 
 if (empty($efec_retencion_look)) { $efec_retencion_look = $this->efec_retencion; }
?>
<span id="id_read_on_efec_retencion" class="css_efec_retencion_line"  style="<?php echo $sStyleReadLab_efec_retencion; ?>"><?php echo $this->form_format_readonly("efec_retencion", $this->form_encode_input($efec_retencion_look)); ?></span><span id="id_read_off_efec_retencion" class="css_read_off_efec_retencion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_efec_retencion; ?>">
 <span id="idAjaxSelect_efec_retencion" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_efec_retencion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_efec_retencion" name="efec_retencion" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="N" <?php  if ($this->efec_retencion == "N") { echo " selected" ;} ?><?php  if (empty($this->efec_retencion)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_efec_retencion'][] = 'N'; ?>
 <option  value="S" <?php  if ($this->efec_retencion == "S") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_efec_retencion'][] = 'S'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('efec_retencion')", "nm_mostra_mens('efec_retencion')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_efec_retencion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_efec_retencion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['listaprecios']))
   {
       $this->nm_new_label['listaprecios'] = "Aplica Lista de Precios";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $listaprecios = $this->listaprecios;
   $sStyleHidden_listaprecios = '';
   if (isset($this->nmgp_cmp_hidden['listaprecios']) && $this->nmgp_cmp_hidden['listaprecios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['listaprecios']);
       $sStyleHidden_listaprecios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_listaprecios = 'display: none;';
   $sStyleReadInp_listaprecios = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['listaprecios']) && $this->nmgp_cmp_readonly['listaprecios'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['listaprecios']);
       $sStyleReadLab_listaprecios = '';
       $sStyleReadInp_listaprecios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['listaprecios']) && $this->nmgp_cmp_hidden['listaprecios'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="listaprecios" value="<?php echo $this->form_encode_input($this->listaprecios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_listaprecios_line" id="hidden_field_data_listaprecios" style="<?php echo $sStyleHidden_listaprecios; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_listaprecios_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_listaprecios_label" style=""><span id="id_label_listaprecios"><?php echo $this->nm_new_label['listaprecios']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["listaprecios"]) &&  $this->nmgp_cmp_readonly["listaprecios"] == "on") { 

$listaprecios_look = "";
 if ($this->listaprecios == "1") { $listaprecios_look .= "Precio Full" ;} 
 if ($this->listaprecios == "2") { $listaprecios_look .= "Precio Intermedio" ;} 
 if ($this->listaprecios == "3") { $listaprecios_look .= "Precio Mínimo" ;} 
 if (empty($listaprecios_look)) { $listaprecios_look = $this->listaprecios; }
?>
<input type="hidden" name="listaprecios" value="<?php echo $this->form_encode_input($listaprecios) . "\">" . $listaprecios_look . ""; ?>
<?php } else { ?>
<?php

$listaprecios_look = "";
 if ($this->listaprecios == "1") { $listaprecios_look .= "Precio Full" ;} 
 if ($this->listaprecios == "2") { $listaprecios_look .= "Precio Intermedio" ;} 
 if ($this->listaprecios == "3") { $listaprecios_look .= "Precio Mínimo" ;} 
 if (empty($listaprecios_look)) { $listaprecios_look = $this->listaprecios; }
?>
<span id="id_read_on_listaprecios" class="css_listaprecios_line"  style="<?php echo $sStyleReadLab_listaprecios; ?>"><?php echo $this->form_format_readonly("listaprecios", $this->form_encode_input($listaprecios_look)); ?></span><span id="id_read_off_listaprecios" class="css_read_off_listaprecios<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_listaprecios; ?>">
 <span id="idAjaxSelect_listaprecios" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_listaprecios_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_listaprecios" name="listaprecios" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="1" <?php  if ($this->listaprecios == "1") { echo " selected" ;} ?><?php  if (empty($this->listaprecios)) { echo " selected" ;} ?>>Precio Full</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_listaprecios'][] = '1'; ?>
 <option  value="2" <?php  if ($this->listaprecios == "2") { echo " selected" ;} ?>>Precio Intermedio</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_listaprecios'][] = '2'; ?>
 <option  value="3" <?php  if ($this->listaprecios == "3") { echo " selected" ;} ?>>Precio Mínimo</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_listaprecios'][] = '3'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('listaprecios')", "nm_mostra_mens('listaprecios')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_listaprecios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_listaprecios_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['loatiende']))
   {
       $this->nm_new_label['loatiende'] = "Vendedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $loatiende = $this->loatiende;
   $sStyleHidden_loatiende = '';
   if (isset($this->nmgp_cmp_hidden['loatiende']) && $this->nmgp_cmp_hidden['loatiende'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['loatiende']);
       $sStyleHidden_loatiende = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_loatiende = 'display: none;';
   $sStyleReadInp_loatiende = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['loatiende']) && $this->nmgp_cmp_readonly['loatiende'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['loatiende']);
       $sStyleReadLab_loatiende = '';
       $sStyleReadInp_loatiende = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['loatiende']) && $this->nmgp_cmp_hidden['loatiende'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="loatiende" value="<?php echo $this->form_encode_input($this->loatiende) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_loatiende_line" id="hidden_field_data_loatiende" style="<?php echo $sStyleHidden_loatiende; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_loatiende_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_loatiende_label" style=""><span id="id_label_loatiende"><?php echo $this->nm_new_label['loatiende']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["loatiende"]) &&  $this->nmgp_cmp_readonly["loatiende"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'] = array(); 
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

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres)  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'][] = $rs->fields[0];
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
   $loatiende_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->loatiende_1))
          {
              foreach ($this->loatiende_1 as $tmp_loatiende)
              {
                  if (trim($tmp_loatiende) === trim($cadaselect[1])) { $loatiende_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->loatiende) === trim($cadaselect[1])) { $loatiende_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="loatiende" value="<?php echo $this->form_encode_input($loatiende) . "\">" . $loatiende_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_loatiende();
   $x = 0 ; 
   $loatiende_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->loatiende_1))
          {
              foreach ($this->loatiende_1 as $tmp_loatiende)
              {
                  if (trim($tmp_loatiende) === trim($cadaselect[1])) { $loatiende_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->loatiende) === trim($cadaselect[1])) { $loatiende_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($loatiende_look))
          {
              $loatiende_look = $this->loatiende;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_loatiende\" class=\"css_loatiende_line\" style=\"" .  $sStyleReadLab_loatiende . "\">" . $this->form_format_readonly("loatiende", $this->form_encode_input($loatiende_look)) . "</span><span id=\"id_read_off_loatiende\" class=\"css_read_off_loatiende" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_loatiende . "\">";
   echo " <span id=\"idAjaxSelect_loatiende\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_loatiende_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_loatiende\" name=\"loatiende\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_loatiende'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Vendedor") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->loatiende) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->loatiende)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_loatiende_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_loatiende_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['autorizado']))
   {
       $this->nm_new_label['autorizado'] = "Autorizar Ventas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autorizado = $this->autorizado;
   $sStyleHidden_autorizado = '';
   if (isset($this->nmgp_cmp_hidden['autorizado']) && $this->nmgp_cmp_hidden['autorizado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autorizado']);
       $sStyleHidden_autorizado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autorizado = 'display: none;';
   $sStyleReadInp_autorizado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autorizado']) && $this->nmgp_cmp_readonly['autorizado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autorizado']);
       $sStyleReadLab_autorizado = '';
       $sStyleReadInp_autorizado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autorizado']) && $this->nmgp_cmp_hidden['autorizado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="autorizado" value="<?php echo $this->form_encode_input($this->autorizado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->autorizado_1 = explode(";", trim($this->autorizado));
  } 
  else
  {
      if (empty($this->autorizado))
      {
          $this->autorizado_1= array(); 
          $this->autorizado= "NO";
      } 
      else
      {
          $this->autorizado_1= $this->autorizado; 
          $this->autorizado= ""; 
          foreach ($this->autorizado_1 as $cada_autorizado)
          {
             if (!empty($autorizado))
             {
                 $this->autorizado.= ";"; 
             } 
             $this->autorizado.= $cada_autorizado; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_autorizado_line" id="hidden_field_data_autorizado" style="<?php echo $sStyleHidden_autorizado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_autorizado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_autorizado_label" style=""><span id="id_label_autorizado"><?php echo $this->nm_new_label['autorizado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autorizado"]) &&  $this->nmgp_cmp_readonly["autorizado"] == "on") { 

$autorizado_look = "";
 if ($this->autorizado == "SI") { $autorizado_look .= "SI" ;} 
 if (empty($autorizado_look)) { $autorizado_look = $this->autorizado; }
?>
<input type="hidden" name="autorizado" value="<?php echo $this->form_encode_input($autorizado) . "\">" . $autorizado_look . ""; ?>
<?php } else { ?>

<?php

$autorizado_look = "";
 if ($this->autorizado == "SI") { $autorizado_look .= "SI" ;} 
 if (empty($autorizado_look)) { $autorizado_look = $this->autorizado; }
?>
<span id="id_read_on_autorizado" class="css_autorizado_line" style="<?php echo $sStyleReadLab_autorizado; ?>"><?php echo $this->form_format_readonly("autorizado", $this->form_encode_input($autorizado_look)); ?></span><span id="id_read_off_autorizado" class="css_read_off_autorizado css_autorizado_line" style="<?php echo $sStyleReadInp_autorizado; ?>"><?php echo "<div id=\"idAjaxCheckbox_autorizado\" style=\"display: inline-block\" class=\"css_autorizado_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_autorizado_line"><?php $tempOptionId = "id-opt-autorizado" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-autorizado sc-ui-checkbox-autorizado sc-js-input" name="autorizado[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_autorizado'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->autorizado_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('autorizado')", "nm_mostra_mens('autorizado')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autorizado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autorizado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['relleno2']))
    {
        $this->nm_new_label['relleno2'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $relleno2 = $this->relleno2;
   if (!isset($this->nmgp_cmp_hidden['relleno2']))
   {
       $this->nmgp_cmp_hidden['relleno2'] = 'off';
   }
   $sStyleHidden_relleno2 = '';
   if (isset($this->nmgp_cmp_hidden['relleno2']) && $this->nmgp_cmp_hidden['relleno2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['relleno2']);
       $sStyleHidden_relleno2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_relleno2 = 'display: none;';
   $sStyleReadInp_relleno2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['relleno2']) && $this->nmgp_cmp_readonly['relleno2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['relleno2']);
       $sStyleReadLab_relleno2 = '';
       $sStyleReadInp_relleno2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['relleno2']) && $this->nmgp_cmp_hidden['relleno2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="relleno2" value="<?php echo $this->form_encode_input($relleno2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_relleno2_line" id="hidden_field_data_relleno2" style="<?php echo $sStyleHidden_relleno2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_relleno2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_relleno2_label" style=""><span id="id_label_relleno2"><?php echo $this->nm_new_label['relleno2']; ?></span></span><br><input type="hidden" name="relleno2" value="<?php echo $this->form_encode_input($relleno2); ?>"><span id="id_ajax_label_relleno2"><?php echo nl2br($relleno2); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_relleno2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_relleno2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_relleno2_dumb = ('' == $sStyleHidden_relleno2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_relleno2_dumb" style="<?php echo $sStyleHidden_relleno2_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf7\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Agregar Sucursales<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direcciones']))
    {
        $this->nm_new_label['direcciones'] = "direcciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direcciones = $this->direcciones;
   $sStyleHidden_direcciones = '';
   if (isset($this->nmgp_cmp_hidden['direcciones']) && $this->nmgp_cmp_hidden['direcciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direcciones']);
       $sStyleHidden_direcciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direcciones = 'display: none;';
   $sStyleReadInp_direcciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direcciones']) && $this->nmgp_cmp_readonly['direcciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direcciones']);
       $sStyleReadLab_direcciones = '';
       $sStyleReadInp_direcciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direcciones']) && $this->nmgp_cmp_hidden['direcciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direcciones" value="<?php echo $this->form_encode_input($direcciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direcciones_line" id="hidden_field_data_direcciones" style="<?php echo $sStyleHidden_direcciones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_direcciones_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_direcciones'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_direcciones'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_direcciones'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_qtd_reg'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['embutida_parms'] = "cliente*scin" . $this->nmgp_dados_form['idtercero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['foreign_key']['idter'] = $this->nmgp_dados_form['idtercero'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['where_filter'] = "idter = " . $this->nmgp_dados_form['idtercero'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['where_detal']  = "idter = " . $this->nmgp_dados_form['idtercero'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['terceros_06052022_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'terceros_06052022_mob_empty.htm' : $this->Ini->link_form_direccion_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init'] ]['form_direccion'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_direcciones']) && 'nmsc_iframe_liga_form_direccion_mob' != $this->Ini->sc_lig_target['C_@scinf_direcciones'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_direcciones'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['form_direccion_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_direcciones'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_direccion_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="1200" name="nmsc_iframe_liga_form_direccion_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direcciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direcciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sucur_cliente']))
   {
       $this->nm_new_label['sucur_cliente'] = "Sucursales";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sucur_cliente = $this->sucur_cliente;
   $sStyleHidden_sucur_cliente = '';
   if (isset($this->nmgp_cmp_hidden['sucur_cliente']) && $this->nmgp_cmp_hidden['sucur_cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sucur_cliente']);
       $sStyleHidden_sucur_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sucur_cliente = 'display: none;';
   $sStyleReadInp_sucur_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sucur_cliente']) && $this->nmgp_cmp_readonly['sucur_cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sucur_cliente']);
       $sStyleReadLab_sucur_cliente = '';
       $sStyleReadInp_sucur_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sucur_cliente']) && $this->nmgp_cmp_hidden['sucur_cliente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sucur_cliente" value="<?php echo $this->form_encode_input($this->sucur_cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->sucur_cliente_1 = explode(";", trim($this->sucur_cliente));
  } 
  else
  {
      if (empty($this->sucur_cliente))
      {
          $this->sucur_cliente_1= array(); 
          $this->sucur_cliente= "NO";
      } 
      else
      {
          $this->sucur_cliente_1= $this->sucur_cliente; 
          $this->sucur_cliente= ""; 
          foreach ($this->sucur_cliente_1 as $cada_sucur_cliente)
          {
             if (!empty($sucur_cliente))
             {
                 $this->sucur_cliente.= ";"; 
             } 
             $this->sucur_cliente.= $cada_sucur_cliente; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_sucur_cliente_line" id="hidden_field_data_sucur_cliente" style="<?php echo $sStyleHidden_sucur_cliente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sucur_cliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sucur_cliente"]) &&  $this->nmgp_cmp_readonly["sucur_cliente"] == "on") { 

$sucur_cliente_look = "";
 if ($this->sucur_cliente == "SI") { $sucur_cliente_look .= "SI" ;} 
 if (empty($sucur_cliente_look)) { $sucur_cliente_look = $this->sucur_cliente; }
?>
<input type="hidden" name="sucur_cliente" value="<?php echo $this->form_encode_input($sucur_cliente) . "\">" . $sucur_cliente_look . ""; ?>
<?php } else { ?>

<?php

$sucur_cliente_look = "";
 if ($this->sucur_cliente == "SI") { $sucur_cliente_look .= "SI" ;} 
 if (empty($sucur_cliente_look)) { $sucur_cliente_look = $this->sucur_cliente; }
?>
<span id="id_read_on_sucur_cliente" class="css_sucur_cliente_line" style="<?php echo $sStyleReadLab_sucur_cliente; ?>"><?php echo $this->form_format_readonly("sucur_cliente", $this->form_encode_input($sucur_cliente_look)); ?></span><span id="id_read_off_sucur_cliente" class="css_read_off_sucur_cliente css_sucur_cliente_line" style="<?php echo $sStyleReadInp_sucur_cliente; ?>"><?php echo "<div id=\"idAjaxCheckbox_sucur_cliente\" style=\"display: inline-block\" class=\"css_sucur_cliente_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_sucur_cliente_line"><?php $tempOptionId = "id-opt-sucur_cliente" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-sucur_cliente sc-ui-checkbox-sucur_cliente sc-js-input" name="sucur_cliente[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022_mob']['Lookup_sucur_cliente'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->sucur_cliente_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sucur_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sucur_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_sucur_cliente_dumb = ('' == $sStyleHidden_sucur_cliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sucur_cliente_dumb" style="<?php echo $sStyleHidden_sucur_cliente_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf8\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>REQUERIDOS DIAN<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_tributario']))
    {
        $this->nm_new_label['detalle_tributario'] = "DETALLE TRIBUTARIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_tributario = $this->detalle_tributario;
   $sStyleHidden_detalle_tributario = '';
   if (isset($this->nmgp_cmp_hidden['detalle_tributario']) && $this->nmgp_cmp_hidden['detalle_tributario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_tributario']);
       $sStyleHidden_detalle_tributario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_tributario = 'display: none;';
   $sStyleReadInp_detalle_tributario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_tributario']) && $this->nmgp_cmp_readonly['detalle_tributario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_tributario']);
       $sStyleReadLab_detalle_tributario = '';
       $sStyleReadInp_detalle_tributario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_tributario']) && $this->nmgp_cmp_hidden['detalle_tributario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_tributario" value="<?php echo $this->form_encode_input($detalle_tributario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_tributario_line" id="hidden_field_data_detalle_tributario" style="<?php echo $sStyleHidden_detalle_tributario; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_detalle_tributario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_tributario_label" style=""><span id="id_label_detalle_tributario"><?php echo $this->nm_new_label['detalle_tributario']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png"))
          { 
              $detalle_tributario = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png";
                  $detalle_tributario = "<img border=\"0\" src=\"grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
              else {
                  $detalle_tributario = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_detalle_tributario"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_det_trib_x_tercero_edit . "', '$this->nm_location', 'terc_cliente*scin" . $this->nmgp_dados_form['idtercero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scout', '', 'modal', '400', '600', 'form_det_trib_x_tercero')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $detalle_tributario ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["detalle_tributario"]) &&  $this->nmgp_cmp_readonly["detalle_tributario"] == "on") { 

 ?>
<input type="hidden" name="detalle_tributario" value="<?php echo $this->form_encode_input($detalle_tributario) . "\">" . $detalle_tributario . ""; ?>
<?php } else { ?>
<span id="id_read_on_detalle_tributario" class="sc-ui-readonly-detalle_tributario css_detalle_tributario_line" style="<?php echo $sStyleReadLab_detalle_tributario; ?>"><?php echo $this->form_format_readonly("detalle_tributario", $this->form_encode_input($this->detalle_tributario)); ?></span><span id="id_read_off_detalle_tributario" class="css_read_off_detalle_tributario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detalle_tributario; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_tributario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_tributario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['responsabilidad_fiscal']))
    {
        $this->nm_new_label['responsabilidad_fiscal'] = "RESPONSABILIDADES FISCALES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $responsabilidad_fiscal = $this->responsabilidad_fiscal;
   $sStyleHidden_responsabilidad_fiscal = '';
   if (isset($this->nmgp_cmp_hidden['responsabilidad_fiscal']) && $this->nmgp_cmp_hidden['responsabilidad_fiscal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['responsabilidad_fiscal']);
       $sStyleHidden_responsabilidad_fiscal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_responsabilidad_fiscal = 'display: none;';
   $sStyleReadInp_responsabilidad_fiscal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['responsabilidad_fiscal']) && $this->nmgp_cmp_readonly['responsabilidad_fiscal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['responsabilidad_fiscal']);
       $sStyleReadLab_responsabilidad_fiscal = '';
       $sStyleReadInp_responsabilidad_fiscal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['responsabilidad_fiscal']) && $this->nmgp_cmp_hidden['responsabilidad_fiscal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="responsabilidad_fiscal" value="<?php echo $this->form_encode_input($responsabilidad_fiscal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_responsabilidad_fiscal_line" id="hidden_field_data_responsabilidad_fiscal" style="<?php echo $sStyleHidden_responsabilidad_fiscal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_responsabilidad_fiscal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_responsabilidad_fiscal_label" style=""><span id="id_label_responsabilidad_fiscal"><?php echo $this->nm_new_label['responsabilidad_fiscal']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png"))
          { 
              $responsabilidad_fiscal = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png";
                  $responsabilidad_fiscal = "<img border=\"0\" src=\"grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
              else {
                  $responsabilidad_fiscal = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_responsabilidad_fiscal"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_resp_trib_x_tercero_edit . "', '$this->nm_location', 'terc_cliente*scin" . $this->nmgp_dados_form['idtercero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scout', '', 'modal', '400', '700', 'form_resp_trib_x_tercero')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $responsabilidad_fiscal ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["responsabilidad_fiscal"]) &&  $this->nmgp_cmp_readonly["responsabilidad_fiscal"] == "on") { 

 ?>
<input type="hidden" name="responsabilidad_fiscal" value="<?php echo $this->form_encode_input($responsabilidad_fiscal) . "\">" . $responsabilidad_fiscal . ""; ?>
<?php } else { ?>
<span id="id_read_on_responsabilidad_fiscal" class="sc-ui-readonly-responsabilidad_fiscal css_responsabilidad_fiscal_line" style="<?php echo $sStyleReadLab_responsabilidad_fiscal; ?>"><?php echo $this->form_format_readonly("responsabilidad_fiscal", $this->form_encode_input($this->responsabilidad_fiscal)); ?></span><span id="id_read_off_responsabilidad_fiscal" class="css_read_off_responsabilidad_fiscal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_responsabilidad_fiscal; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_responsabilidad_fiscal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_responsabilidad_fiscal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ciiu']))
    {
        $this->nm_new_label['ciiu'] = "ACTIVIDAD ECONÓMICA (CIIU)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ciiu = $this->ciiu;
   $sStyleHidden_ciiu = '';
   if (isset($this->nmgp_cmp_hidden['ciiu']) && $this->nmgp_cmp_hidden['ciiu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ciiu']);
       $sStyleHidden_ciiu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ciiu = 'display: none;';
   $sStyleReadInp_ciiu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ciiu']) && $this->nmgp_cmp_readonly['ciiu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ciiu']);
       $sStyleReadLab_ciiu = '';
       $sStyleReadInp_ciiu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ciiu']) && $this->nmgp_cmp_hidden['ciiu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ciiu" value="<?php echo $this->form_encode_input($ciiu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ciiu_line" id="hidden_field_data_ciiu" style="<?php echo $sStyleHidden_ciiu; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciiu_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ciiu_label" style=""><span id="id_label_ciiu"><?php echo $this->nm_new_label['ciiu']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png"))
          { 
              $ciiu = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png";
                  $ciiu = "<img border=\"0\" src=\"grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
              else {
                  $ciiu = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__1486564168-finance-bank-check_81495.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_ciiu"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_ciiu_tercero_edit . "', '$this->nm_location', 'terc_cliente*scin" . $this->nmgp_dados_form['idtercero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scout', '', 'modal', '400', '800', 'form_ciiu_tercero')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ciiu ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciiu"]) &&  $this->nmgp_cmp_readonly["ciiu"] == "on") { 

 ?>
<input type="hidden" name="ciiu" value="<?php echo $this->form_encode_input($ciiu) . "\">" . $ciiu . ""; ?>
<?php } else { ?>
<span id="id_read_on_ciiu" class="sc-ui-readonly-ciiu css_ciiu_line" style="<?php echo $sStyleReadLab_ciiu; ?>"><?php echo $this->form_format_readonly("ciiu", $this->form_encode_input($this->ciiu)); ?></span><span id="id_read_off_ciiu" class="css_read_off_ciiu<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ciiu; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciiu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciiu_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_ciiu_dumb = ('' == $sStyleHidden_ciiu) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ciiu_dumb" style="<?php echo $sStyleHidden_ciiu_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_9"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_9"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_9" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf9\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos contacto y cumpleaños<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fechault']))
           {
               $this->nmgp_cmp_readonly['fechault'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['nacimiento']))
    {
        $this->nm_new_label['nacimiento'] = "Cumpleaños";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nacimiento = $this->nacimiento;
   $sStyleHidden_nacimiento = '';
   if (isset($this->nmgp_cmp_hidden['nacimiento']) && $this->nmgp_cmp_hidden['nacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nacimiento']);
       $sStyleHidden_nacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nacimiento = 'display: none;';
   $sStyleReadInp_nacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nacimiento']) && $this->nmgp_cmp_readonly['nacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nacimiento']);
       $sStyleReadLab_nacimiento = '';
       $sStyleReadInp_nacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nacimiento']) && $this->nmgp_cmp_hidden['nacimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nacimiento" value="<?php echo $this->form_encode_input($nacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nacimiento_line" id="hidden_field_data_nacimiento" style="<?php echo $sStyleHidden_nacimiento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nacimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nacimiento_label" style=""><span id="id_label_nacimiento"><?php echo $this->nm_new_label['nacimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nacimiento"]) &&  $this->nmgp_cmp_readonly["nacimiento"] == "on") { 

 ?>
<input type="hidden" name="nacimiento" value="<?php echo $this->form_encode_input($nacimiento) . "\">" . $nacimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_nacimiento" class="sc-ui-readonly-nacimiento css_nacimiento_line" style="<?php echo $sStyleReadLab_nacimiento; ?>"><?php echo $this->form_format_readonly("nacimiento", $this->form_encode_input($nacimiento)); ?></span><span id="id_read_off_nacimiento" class="css_read_off_nacimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nacimiento; ?>"><?php
$tmp_form_data = $this->field_config['nacimiento']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_nacimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nacimiento" type=text name="nacimiento" value="<?php echo $this->form_encode_input($nacimiento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['nacimiento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['nacimiento']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'dd/mm/aaaa', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nacimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_nacimiento_dumb = ('' == $sStyleHidden_nacimiento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nacimiento_dumb" style="<?php echo $sStyleHidden_nacimiento_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_10"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_10"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_10" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf10\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos Fidelización<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['saldo']))
           {
               $this->nmgp_cmp_readonly['saldo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fechault']))
    {
        $this->nm_new_label['fechault'] = "Fecha de última compra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechault = $this->fechault;
   $sStyleHidden_fechault = '';
   if (isset($this->nmgp_cmp_hidden['fechault']) && $this->nmgp_cmp_hidden['fechault'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechault']);
       $sStyleHidden_fechault = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechault = 'display: none;';
   $sStyleReadInp_fechault = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fechault"]) &&  $this->nmgp_cmp_readonly["fechault"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechault']);
       $sStyleReadLab_fechault = '';
       $sStyleReadInp_fechault = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechault']) && $this->nmgp_cmp_hidden['fechault'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechault" value="<?php echo $this->form_encode_input($fechault) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechault_line" id="hidden_field_data_fechault" style="<?php echo $sStyleHidden_fechault; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechault_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechault_label" style=""><span id="id_label_fechault"><?php echo $this->nm_new_label['fechault']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fechault"]) &&  $this->nmgp_cmp_readonly["fechault"] == "on")) { 

 ?>
<input type="hidden" name="fechault" value="<?php echo $this->form_encode_input($fechault) . "\"><span id=\"id_ajax_label_fechault\">" . $fechault . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fechault" class="sc-ui-readonly-fechault css_fechault_line" style="<?php echo $sStyleReadLab_fechault; ?>"><?php echo $this->form_format_readonly("fechault", $this->form_encode_input($fechault)); ?></span><span id="id_read_off_fechault" class="css_read_off_fechault<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechault; ?>"><?php
$tmp_form_data = $this->field_config['fechault']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fechault_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechault" type=text name="fechault" value="<?php echo $this->form_encode_input($fechault) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechault']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechault']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'dd/mm/aaaa', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechault_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechault_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldo']))
    {
        $this->nm_new_label['saldo'] = "Saldo pendiente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldo = $this->saldo;
   $sStyleHidden_saldo = '';
   if (isset($this->nmgp_cmp_hidden['saldo']) && $this->nmgp_cmp_hidden['saldo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldo']);
       $sStyleHidden_saldo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldo = 'display: none;';
   $sStyleReadInp_saldo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["saldo"]) &&  $this->nmgp_cmp_readonly["saldo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldo']);
       $sStyleReadLab_saldo = '';
       $sStyleReadInp_saldo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldo']) && $this->nmgp_cmp_hidden['saldo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo" value="<?php echo $this->form_encode_input($saldo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldo_line" id="hidden_field_data_saldo" style="<?php echo $sStyleHidden_saldo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldo_label" style=""><span id="id_label_saldo"><?php echo $this->nm_new_label['saldo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["saldo"]) &&  $this->nmgp_cmp_readonly["saldo"] == "on")) { 

 ?>
<input type="hidden" name="saldo" value="<?php echo $this->form_encode_input($saldo) . "\"><span id=\"id_ajax_label_saldo\">" . $saldo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_saldo" class="sc-ui-readonly-saldo css_saldo_line" style="<?php echo $sStyleReadLab_saldo; ?>"><?php echo $this->form_format_readonly("saldo", $this->form_encode_input($this->saldo)); ?></span><span id="id_read_off_saldo" class="css_read_off_saldo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldo; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldo" type=text name="saldo" value="<?php echo $this->form_encode_input($saldo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['saldo']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['saldo']['format_pos'] || 3 == $this->field_config['saldo']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 19, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldo']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['afiliacion']))
    {
        $this->nm_new_label['afiliacion'] = "Cliente desde";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $afiliacion = $this->afiliacion;
   $sStyleHidden_afiliacion = '';
   if (isset($this->nmgp_cmp_hidden['afiliacion']) && $this->nmgp_cmp_hidden['afiliacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['afiliacion']);
       $sStyleHidden_afiliacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_afiliacion = 'display: none;';
   $sStyleReadInp_afiliacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['afiliacion']) && $this->nmgp_cmp_readonly['afiliacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['afiliacion']);
       $sStyleReadLab_afiliacion = '';
       $sStyleReadInp_afiliacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['afiliacion']) && $this->nmgp_cmp_hidden['afiliacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="afiliacion" value="<?php echo $this->form_encode_input($afiliacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_afiliacion_line" id="hidden_field_data_afiliacion" style="<?php echo $sStyleHidden_afiliacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_afiliacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_afiliacion_label" style=""><span id="id_label_afiliacion"><?php echo $this->nm_new_label['afiliacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["afiliacion"]) &&  $this->nmgp_cmp_readonly["afiliacion"] == "on") { 

 ?>
<input type="hidden" name="afiliacion" value="<?php echo $this->form_encode_input($afiliacion) . "\">" . $afiliacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_afiliacion" class="sc-ui-readonly-afiliacion css_afiliacion_line" style="<?php echo $sStyleReadLab_afiliacion; ?>"><?php echo $this->form_format_readonly("afiliacion", $this->form_encode_input($afiliacion)); ?></span><span id="id_read_off_afiliacion" class="css_read_off_afiliacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_afiliacion; ?>"><?php
$tmp_form_data = $this->field_config['afiliacion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_afiliacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_afiliacion" type=text name="afiliacion" value="<?php echo $this->form_encode_input($afiliacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['afiliacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['afiliacion']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'dd/mm/aaaa', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_afiliacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_afiliacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
