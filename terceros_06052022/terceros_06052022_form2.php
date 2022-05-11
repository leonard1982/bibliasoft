<div id="terceros_06052022_form2" style='<?php echo ($this->tabCssClass["terceros_06052022_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_11"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_11" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
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


    <TD colspan="3" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf11\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Empleados<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php $sStyleHidden_fechault_dumb = ('' == $sStyleHidden_fechault) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechault_dumb" style="<?php echo $sStyleHidden_fechault_dumb; ?>"></TD>
<?php $sStyleHidden_saldo_dumb = ('' == $sStyleHidden_saldo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldo_dumb" style="<?php echo $sStyleHidden_saldo_dumb; ?>"></TD>
<?php $sStyleHidden_afiliacion_dumb = ('' == $sStyleHidden_afiliacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_afiliacion_dumb" style="<?php echo $sStyleHidden_afiliacion_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['es_cajero']))
   {
       $this->nm_new_label['es_cajero'] = "Es Cajero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_cajero = $this->es_cajero;
   $sStyleHidden_es_cajero = '';
   if (isset($this->nmgp_cmp_hidden['es_cajero']) && $this->nmgp_cmp_hidden['es_cajero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_cajero']);
       $sStyleHidden_es_cajero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_cajero = 'display: none;';
   $sStyleReadInp_es_cajero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_cajero']) && $this->nmgp_cmp_readonly['es_cajero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_cajero']);
       $sStyleReadLab_es_cajero = '';
       $sStyleReadInp_es_cajero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_cajero']) && $this->nmgp_cmp_hidden['es_cajero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="es_cajero" value="<?php echo $this->form_encode_input($this->es_cajero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->es_cajero_1 = explode(";", trim($this->es_cajero));
  } 
  else
  {
      if (empty($this->es_cajero))
      {
          $this->es_cajero_1= array(); 
          $this->es_cajero= "NO";
      } 
      else
      {
          $this->es_cajero_1= $this->es_cajero; 
          $this->es_cajero= ""; 
          foreach ($this->es_cajero_1 as $cada_es_cajero)
          {
             if (!empty($es_cajero))
             {
                 $this->es_cajero.= ";"; 
             } 
             $this->es_cajero.= $cada_es_cajero; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_es_cajero_line" id="hidden_field_data_es_cajero" style="<?php echo $sStyleHidden_es_cajero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_cajero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_es_cajero_label" style=""><span id="id_label_es_cajero"><?php echo $this->nm_new_label['es_cajero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_cajero"]) &&  $this->nmgp_cmp_readonly["es_cajero"] == "on") { 

$es_cajero_look = "";
 if ($this->es_cajero == "SI") { $es_cajero_look .= "SI" ;} 
 if (empty($es_cajero_look)) { $es_cajero_look = $this->es_cajero; }
?>
<input type="hidden" name="es_cajero" value="<?php echo $this->form_encode_input($es_cajero) . "\">" . $es_cajero_look . ""; ?>
<?php } else { ?>

<?php

$es_cajero_look = "";
 if ($this->es_cajero == "SI") { $es_cajero_look .= "SI" ;} 
 if (empty($es_cajero_look)) { $es_cajero_look = $this->es_cajero; }
?>
<span id="id_read_on_es_cajero" class="css_es_cajero_line" style="<?php echo $sStyleReadLab_es_cajero; ?>"><?php echo $this->form_format_readonly("es_cajero", $this->form_encode_input($es_cajero_look)); ?></span><span id="id_read_off_es_cajero" class="css_read_off_es_cajero css_es_cajero_line" style="<?php echo $sStyleReadInp_es_cajero; ?>"><?php echo "<div id=\"idAjaxCheckbox_es_cajero\" style=\"display: inline-block\" class=\"css_es_cajero_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_es_cajero_line"><?php $tempOptionId = "id-opt-es_cajero" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-es_cajero sc-ui-checkbox-es_cajero sc-js-input" name="es_cajero[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022']['Lookup_es_cajero'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->es_cajero_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_cajero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_cajero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cupo_vendedor']))
    {
        $this->nm_new_label['cupo_vendedor'] = "Cupo Vendedor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cupo_vendedor = $this->cupo_vendedor;
   $sStyleHidden_cupo_vendedor = '';
   if (isset($this->nmgp_cmp_hidden['cupo_vendedor']) && $this->nmgp_cmp_hidden['cupo_vendedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cupo_vendedor']);
       $sStyleHidden_cupo_vendedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cupo_vendedor = 'display: none;';
   $sStyleReadInp_cupo_vendedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cupo_vendedor']) && $this->nmgp_cmp_readonly['cupo_vendedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cupo_vendedor']);
       $sStyleReadLab_cupo_vendedor = '';
       $sStyleReadInp_cupo_vendedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cupo_vendedor']) && $this->nmgp_cmp_hidden['cupo_vendedor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cupo_vendedor" value="<?php echo $this->form_encode_input($cupo_vendedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cupo_vendedor_line" id="hidden_field_data_cupo_vendedor" style="<?php echo $sStyleHidden_cupo_vendedor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cupo_vendedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cupo_vendedor_label" style=""><span id="id_label_cupo_vendedor"><?php echo $this->nm_new_label['cupo_vendedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cupo_vendedor"]) &&  $this->nmgp_cmp_readonly["cupo_vendedor"] == "on") { 

 ?>
<input type="hidden" name="cupo_vendedor" value="<?php echo $this->form_encode_input($cupo_vendedor) . "\">" . $cupo_vendedor . ""; ?>
<?php } else { ?>
<span id="id_read_on_cupo_vendedor" class="sc-ui-readonly-cupo_vendedor css_cupo_vendedor_line" style="<?php echo $sStyleReadLab_cupo_vendedor; ?>"><?php echo $this->form_format_readonly("cupo_vendedor", $this->form_encode_input($this->cupo_vendedor)); ?></span><span id="id_read_off_cupo_vendedor" class="css_read_off_cupo_vendedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cupo_vendedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_cupo_vendedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cupo_vendedor" type=text name="cupo_vendedor" value="<?php echo $this->form_encode_input($cupo_vendedor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cupo_vendedor']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cupo_vendedor']['format_pos'] || 3 == $this->field_config['cupo_vendedor']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cupo_vendedor']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cupo_vendedor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cupo_vendedor']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cupo_vendedor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cupo_vendedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cupo_vendedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
