<div id="terceros170521_mob_form3" style='<?php echo ($this->tabCssClass["terceros170521_mob_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_13"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_13" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
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
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf13\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Proveedores<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['autoretenedor']))
   {
       $this->nm_new_label['autoretenedor'] = "Autoretenedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autoretenedor = $this->autoretenedor;
   $sStyleHidden_autoretenedor = '';
   if (isset($this->nmgp_cmp_hidden['autoretenedor']) && $this->nmgp_cmp_hidden['autoretenedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autoretenedor']);
       $sStyleHidden_autoretenedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autoretenedor = 'display: none;';
   $sStyleReadInp_autoretenedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autoretenedor']) && $this->nmgp_cmp_readonly['autoretenedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autoretenedor']);
       $sStyleReadLab_autoretenedor = '';
       $sStyleReadInp_autoretenedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autoretenedor']) && $this->nmgp_cmp_hidden['autoretenedor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="autoretenedor" value="<?php echo $this->form_encode_input($this->autoretenedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_autoretenedor_line" id="hidden_field_data_autoretenedor" style="<?php echo $sStyleHidden_autoretenedor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_autoretenedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_autoretenedor_label" style=""><span id="id_label_autoretenedor"><?php echo $this->nm_new_label['autoretenedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autoretenedor"]) &&  $this->nmgp_cmp_readonly["autoretenedor"] == "on") { 

$autoretenedor_look = "";
 if ($this->autoretenedor == "SI") { $autoretenedor_look .= "SI" ;} 
 if ($this->autoretenedor == "NO") { $autoretenedor_look .= "NO" ;} 
 if (empty($autoretenedor_look)) { $autoretenedor_look = $this->autoretenedor; }
?>
<input type="hidden" name="autoretenedor" value="<?php echo $this->form_encode_input($autoretenedor) . "\">" . $autoretenedor_look . ""; ?>
<?php } else { ?>
<?php

$autoretenedor_look = "";
 if ($this->autoretenedor == "SI") { $autoretenedor_look .= "SI" ;} 
 if ($this->autoretenedor == "NO") { $autoretenedor_look .= "NO" ;} 
 if (empty($autoretenedor_look)) { $autoretenedor_look = $this->autoretenedor; }
?>
<span id="id_read_on_autoretenedor" class="css_autoretenedor_line"  style="<?php echo $sStyleReadLab_autoretenedor; ?>"><?php echo $this->form_format_readonly("autoretenedor", $this->form_encode_input($autoretenedor_look)); ?></span><span id="id_read_off_autoretenedor" class="css_read_off_autoretenedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_autoretenedor; ?>">
 <span id="idAjaxSelect_autoretenedor" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_autoretenedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_autoretenedor" name="autoretenedor" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="SI" <?php  if ($this->autoretenedor == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['Lookup_autoretenedor'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->autoretenedor == "NO") { echo " selected" ;} ?><?php  if (empty($this->autoretenedor)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['Lookup_autoretenedor'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autoretenedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autoretenedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['creditoprov']))
   {
       $this->nm_new_label['creditoprov'] = "Otorga Crédito";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $creditoprov = $this->creditoprov;
   $sStyleHidden_creditoprov = '';
   if (isset($this->nmgp_cmp_hidden['creditoprov']) && $this->nmgp_cmp_hidden['creditoprov'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['creditoprov']);
       $sStyleHidden_creditoprov = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_creditoprov = 'display: none;';
   $sStyleReadInp_creditoprov = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['creditoprov']) && $this->nmgp_cmp_readonly['creditoprov'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['creditoprov']);
       $sStyleReadLab_creditoprov = '';
       $sStyleReadInp_creditoprov = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['creditoprov']) && $this->nmgp_cmp_hidden['creditoprov'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="creditoprov" value="<?php echo $this->form_encode_input($this->creditoprov) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_creditoprov_line" id="hidden_field_data_creditoprov" style="<?php echo $sStyleHidden_creditoprov; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_creditoprov_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_creditoprov_label" style=""><span id="id_label_creditoprov"><?php echo $this->nm_new_label['creditoprov']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["creditoprov"]) &&  $this->nmgp_cmp_readonly["creditoprov"] == "on") { 

$creditoprov_look = "";
 if ($this->creditoprov == "SI") { $creditoprov_look .= "SI" ;} 
 if ($this->creditoprov == "NO") { $creditoprov_look .= "NO" ;} 
 if (empty($creditoprov_look)) { $creditoprov_look = $this->creditoprov; }
?>
<input type="hidden" name="creditoprov" value="<?php echo $this->form_encode_input($creditoprov) . "\">" . $creditoprov_look . ""; ?>
<?php } else { ?>
<?php

$creditoprov_look = "";
 if ($this->creditoprov == "SI") { $creditoprov_look .= "SI" ;} 
 if ($this->creditoprov == "NO") { $creditoprov_look .= "NO" ;} 
 if (empty($creditoprov_look)) { $creditoprov_look = $this->creditoprov; }
?>
<span id="id_read_on_creditoprov" class="css_creditoprov_line"  style="<?php echo $sStyleReadLab_creditoprov; ?>"><?php echo $this->form_format_readonly("creditoprov", $this->form_encode_input($creditoprov_look)); ?></span><span id="id_read_off_creditoprov" class="css_read_off_creditoprov<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_creditoprov; ?>">
 <span id="idAjaxSelect_creditoprov" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_creditoprov_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_creditoprov" name="creditoprov" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="SI" <?php  if ($this->creditoprov == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['Lookup_creditoprov'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->creditoprov == "NO") { echo " selected" ;} ?><?php  if (empty($this->creditoprov)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['Lookup_creditoprov'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_creditoprov_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_creditoprov_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dias']))
    {
        $this->nm_new_label['dias'] = "Días del crédito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dias = $this->dias;
   $sStyleHidden_dias = '';
   if (isset($this->nmgp_cmp_hidden['dias']) && $this->nmgp_cmp_hidden['dias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dias']);
       $sStyleHidden_dias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dias = 'display: none;';
   $sStyleReadInp_dias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dias']) && $this->nmgp_cmp_readonly['dias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dias']);
       $sStyleReadLab_dias = '';
       $sStyleReadInp_dias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dias']) && $this->nmgp_cmp_hidden['dias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dias" value="<?php echo $this->form_encode_input($dias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dias_line" id="hidden_field_data_dias" style="<?php echo $sStyleHidden_dias; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dias_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dias_label" style=""><span id="id_label_dias"><?php echo $this->nm_new_label['dias']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dias"]) &&  $this->nmgp_cmp_readonly["dias"] == "on") { 

 ?>
<input type="hidden" name="dias" value="<?php echo $this->form_encode_input($dias) . "\">" . $dias . ""; ?>
<?php } else { ?>
<span id="id_read_on_dias" class="sc-ui-readonly-dias css_dias_line" style="<?php echo $sStyleReadLab_dias; ?>"><?php echo $this->form_format_readonly("dias", $this->form_encode_input($this->dias)); ?></span><span id="id_read_off_dias" class="css_read_off_dias<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dias; ?>">
 <input class="sc-js-input scFormObjectOdd css_dias_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dias" type=text name="dias" value="<?php echo $this->form_encode_input($dias) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dias']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dias']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dias']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dias_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_dias_dumb = ('' == $sStyleHidden_dias) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dias_dumb" style="<?php echo $sStyleHidden_dias_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_14"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_14"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_14" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf14\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos Contacto<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url']))
    {
        $this->nm_new_label['url'] = "Url";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url = $this->url;
   $sStyleHidden_url = '';
   if (isset($this->nmgp_cmp_hidden['url']) && $this->nmgp_cmp_hidden['url'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url']);
       $sStyleHidden_url = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url = 'display: none;';
   $sStyleReadInp_url = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url']) && $this->nmgp_cmp_readonly['url'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url']);
       $sStyleReadLab_url = '';
       $sStyleReadInp_url = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url']) && $this->nmgp_cmp_hidden['url'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url" value="<?php echo $this->form_encode_input($url) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_line" id="hidden_field_data_url" style="<?php echo $sStyleHidden_url; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_label" style=""><span id="id_label_url"><?php echo $this->nm_new_label['url']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url"]) &&  $this->nmgp_cmp_readonly["url"] == "on") { 

 ?>
<input type="hidden" name="url" value="<?php echo $this->form_encode_input($url) . "\">" . $url . ""; ?>
<?php } else { ?>
<span id="id_read_on_url" class="scFormLinkOdd sc-ui-readonly-url css_url_line" style="<?php echo $sStyleReadLab_url; ?>"><?php echo $this->form_format_readonly("url", $this->form_encode_input($this->url)); ?></span><span id="id_read_off_url" class="css_read_off_url<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url" type=text name="url" value="<?php echo $this->form_encode_input($url) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'www.facilweb.com.co', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.url.value), '_blank')", "window.open(nm_link_url(document.F1.url.value), '_blank')", "url_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contacto']))
    {
        $this->nm_new_label['contacto'] = "Persona de Contacto o vendedor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contacto = $this->contacto;
   $sStyleHidden_contacto = '';
   if (isset($this->nmgp_cmp_hidden['contacto']) && $this->nmgp_cmp_hidden['contacto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contacto']);
       $sStyleHidden_contacto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contacto = 'display: none;';
   $sStyleReadInp_contacto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contacto']) && $this->nmgp_cmp_readonly['contacto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contacto']);
       $sStyleReadLab_contacto = '';
       $sStyleReadInp_contacto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contacto']) && $this->nmgp_cmp_hidden['contacto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contacto" value="<?php echo $this->form_encode_input($contacto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contacto_line" id="hidden_field_data_contacto" style="<?php echo $sStyleHidden_contacto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contacto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contacto_label" style=""><span id="id_label_contacto"><?php echo $this->nm_new_label['contacto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contacto"]) &&  $this->nmgp_cmp_readonly["contacto"] == "on") { 

 ?>
<input type="hidden" name="contacto" value="<?php echo $this->form_encode_input($contacto) . "\">" . $contacto . ""; ?>
<?php } else { ?>
<span id="id_read_on_contacto" class="sc-ui-readonly-contacto css_contacto_line" style="<?php echo $sStyleReadLab_contacto; ?>"><?php echo $this->form_format_readonly("contacto", $this->form_encode_input($this->contacto)); ?></span><span id="id_read_off_contacto" class="css_read_off_contacto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contacto; ?>">
 <input class="sc-js-input scFormObjectOdd css_contacto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contacto" type=text name="contacto" value="<?php echo $this->form_encode_input($contacto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Contacto', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contacto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contacto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefonos_prov']))
    {
        $this->nm_new_label['telefonos_prov'] = "Número de Tel.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefonos_prov = $this->telefonos_prov;
   $sStyleHidden_telefonos_prov = '';
   if (isset($this->nmgp_cmp_hidden['telefonos_prov']) && $this->nmgp_cmp_hidden['telefonos_prov'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefonos_prov']);
       $sStyleHidden_telefonos_prov = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefonos_prov = 'display: none;';
   $sStyleReadInp_telefonos_prov = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefonos_prov']) && $this->nmgp_cmp_readonly['telefonos_prov'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefonos_prov']);
       $sStyleReadLab_telefonos_prov = '';
       $sStyleReadInp_telefonos_prov = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefonos_prov']) && $this->nmgp_cmp_hidden['telefonos_prov'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefonos_prov" value="<?php echo $this->form_encode_input($telefonos_prov) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefonos_prov_line" id="hidden_field_data_telefonos_prov" style="<?php echo $sStyleHidden_telefonos_prov; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefonos_prov_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefonos_prov_label" style=""><span id="id_label_telefonos_prov"><?php echo $this->nm_new_label['telefonos_prov']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefonos_prov"]) &&  $this->nmgp_cmp_readonly["telefonos_prov"] == "on") { 

 ?>
<input type="hidden" name="telefonos_prov" value="<?php echo $this->form_encode_input($telefonos_prov) . "\">" . $telefonos_prov . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefonos_prov" class="sc-ui-readonly-telefonos_prov css_telefonos_prov_line" style="<?php echo $sStyleReadLab_telefonos_prov; ?>"><?php echo $this->form_format_readonly("telefonos_prov", $this->form_encode_input($this->telefonos_prov)); ?></span><span id="id_read_off_telefonos_prov" class="css_read_off_telefonos_prov<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefonos_prov; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefonos_prov_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefonos_prov" type=text name="telefonos_prov" value="<?php echo $this->form_encode_input($telefonos_prov) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789 -") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Tel - Cel - Whatsapp...', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefonos_prov_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefonos_prov_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label" style=""><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_format_readonly("email", $this->form_encode_input($this->email)); ?></span><span id="id_read_off_email" class="css_read_off_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'micorreo@ahora.com', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_email_dumb = ('' == $sStyleHidden_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_email_dumb" style="<?php echo $sStyleHidden_email_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_15"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_15"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_15" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechultcomp']))
    {
        $this->nm_new_label['fechultcomp'] = "Última Compra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechultcomp = $this->fechultcomp;
   $sStyleHidden_fechultcomp = '';
   if (isset($this->nmgp_cmp_hidden['fechultcomp']) && $this->nmgp_cmp_hidden['fechultcomp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechultcomp']);
       $sStyleHidden_fechultcomp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechultcomp = 'display: none;';
   $sStyleReadInp_fechultcomp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechultcomp']) && $this->nmgp_cmp_readonly['fechultcomp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechultcomp']);
       $sStyleReadLab_fechultcomp = '';
       $sStyleReadInp_fechultcomp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechultcomp']) && $this->nmgp_cmp_hidden['fechultcomp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechultcomp" value="<?php echo $this->form_encode_input($fechultcomp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechultcomp_line" id="hidden_field_data_fechultcomp" style="<?php echo $sStyleHidden_fechultcomp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechultcomp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechultcomp_label" style=""><span id="id_label_fechultcomp"><?php echo $this->nm_new_label['fechultcomp']; ?></span></span><br><input type="hidden" name="fechultcomp" value="<?php echo $this->form_encode_input($fechultcomp); ?>"><span id="id_ajax_label_fechultcomp"><?php echo nl2br($fechultcomp); ?></span>
<?php
$tmp_form_data = $this->field_config['fechultcomp']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechultcomp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechultcomp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldoapagar']))
    {
        $this->nm_new_label['saldoapagar'] = "Saldo a pagar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldoapagar = $this->saldoapagar;
   $sStyleHidden_saldoapagar = '';
   if (isset($this->nmgp_cmp_hidden['saldoapagar']) && $this->nmgp_cmp_hidden['saldoapagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldoapagar']);
       $sStyleHidden_saldoapagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldoapagar = 'display: none;';
   $sStyleReadInp_saldoapagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldoapagar']) && $this->nmgp_cmp_readonly['saldoapagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldoapagar']);
       $sStyleReadLab_saldoapagar = '';
       $sStyleReadInp_saldoapagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldoapagar']) && $this->nmgp_cmp_hidden['saldoapagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldoapagar" value="<?php echo $this->form_encode_input($saldoapagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldoapagar_line" id="hidden_field_data_saldoapagar" style="<?php echo $sStyleHidden_saldoapagar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldoapagar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldoapagar_label" style=""><span id="id_label_saldoapagar"><?php echo $this->nm_new_label['saldoapagar']; ?></span></span><br><input type="hidden" name="saldoapagar" value="<?php echo $this->form_encode_input($saldoapagar); ?>"><span id="id_ajax_label_saldoapagar"><?php echo nl2br($saldoapagar); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldoapagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldoapagar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
