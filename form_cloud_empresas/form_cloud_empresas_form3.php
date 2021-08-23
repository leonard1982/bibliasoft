<div id="form_cloud_empresas_form3" style='<?php echo ($this->tabCssClass["form_cloud_empresas_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_7" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_empresa']))
           {
               $this->nmgp_cmp_readonly['id_empresa'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Más Configuraciones</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_pc_red']))
    {
        $this->nm_new_label['nombre_pc_red'] = "Nombre PC red";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_pc_red = $this->nombre_pc_red;
   $sStyleHidden_nombre_pc_red = '';
   if (isset($this->nmgp_cmp_hidden['nombre_pc_red']) && $this->nmgp_cmp_hidden['nombre_pc_red'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_pc_red']);
       $sStyleHidden_nombre_pc_red = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_pc_red = 'display: none;';
   $sStyleReadInp_nombre_pc_red = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_pc_red']) && $this->nmgp_cmp_readonly['nombre_pc_red'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_pc_red']);
       $sStyleReadLab_nombre_pc_red = '';
       $sStyleReadInp_nombre_pc_red = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_pc_red']) && $this->nmgp_cmp_hidden['nombre_pc_red'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_pc_red" value="<?php echo $this->form_encode_input($nombre_pc_red) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_pc_red_line" id="hidden_field_data_nombre_pc_red" style="<?php echo $sStyleHidden_nombre_pc_red; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_pc_red_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_pc_red_label" style=""><span id="id_label_nombre_pc_red"><?php echo $this->nm_new_label['nombre_pc_red']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_pc_red"]) &&  $this->nmgp_cmp_readonly["nombre_pc_red"] == "on") { 

 ?>
<input type="hidden" name="nombre_pc_red" value="<?php echo $this->form_encode_input($nombre_pc_red) . "\">" . $nombre_pc_red . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_pc_red" class="sc-ui-readonly-nombre_pc_red css_nombre_pc_red_line" style="<?php echo $sStyleReadLab_nombre_pc_red; ?>"><?php echo $this->form_format_readonly("nombre_pc_red", $this->form_encode_input($this->nombre_pc_red)); ?></span><span id="id_read_off_nombre_pc_red" class="css_read_off_nombre_pc_red<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_pc_red; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_pc_red_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_pc_red" type=text name="nombre_pc_red" value="<?php echo $this->form_encode_input($nombre_pc_red) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_pc_red_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_pc_red_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sumarimpuestosdeldetalle']))
   {
       $this->nm_new_label['sumarimpuestosdeldetalle'] = "Sumar impuestos del detalle";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sumarimpuestosdeldetalle = $this->sumarimpuestosdeldetalle;
   $sStyleHidden_sumarimpuestosdeldetalle = '';
   if (isset($this->nmgp_cmp_hidden['sumarimpuestosdeldetalle']) && $this->nmgp_cmp_hidden['sumarimpuestosdeldetalle'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sumarimpuestosdeldetalle']);
       $sStyleHidden_sumarimpuestosdeldetalle = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sumarimpuestosdeldetalle = 'display: none;';
   $sStyleReadInp_sumarimpuestosdeldetalle = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sumarimpuestosdeldetalle']) && $this->nmgp_cmp_readonly['sumarimpuestosdeldetalle'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sumarimpuestosdeldetalle']);
       $sStyleReadLab_sumarimpuestosdeldetalle = '';
       $sStyleReadInp_sumarimpuestosdeldetalle = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sumarimpuestosdeldetalle']) && $this->nmgp_cmp_hidden['sumarimpuestosdeldetalle'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sumarimpuestosdeldetalle" value="<?php echo $this->form_encode_input($this->sumarimpuestosdeldetalle) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->sumarimpuestosdeldetalle_1 = explode(";", trim($this->sumarimpuestosdeldetalle));
  } 
  else
  {
      if (empty($this->sumarimpuestosdeldetalle))
      {
          $this->sumarimpuestosdeldetalle_1= array(); 
          $this->sumarimpuestosdeldetalle= "NO";
      } 
      else
      {
          $this->sumarimpuestosdeldetalle_1= $this->sumarimpuestosdeldetalle; 
          $this->sumarimpuestosdeldetalle= ""; 
          foreach ($this->sumarimpuestosdeldetalle_1 as $cada_sumarimpuestosdeldetalle)
          {
             if (!empty($sumarimpuestosdeldetalle))
             {
                 $this->sumarimpuestosdeldetalle.= ";"; 
             } 
             $this->sumarimpuestosdeldetalle.= $cada_sumarimpuestosdeldetalle; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_sumarimpuestosdeldetalle_line" id="hidden_field_data_sumarimpuestosdeldetalle" style="<?php echo $sStyleHidden_sumarimpuestosdeldetalle; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sumarimpuestosdeldetalle_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sumarimpuestosdeldetalle_label" style=""><span id="id_label_sumarimpuestosdeldetalle"><?php echo $this->nm_new_label['sumarimpuestosdeldetalle']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sumarimpuestosdeldetalle"]) &&  $this->nmgp_cmp_readonly["sumarimpuestosdeldetalle"] == "on") { 

$sumarimpuestosdeldetalle_look = "";
 if ($this->sumarimpuestosdeldetalle == "SI") { $sumarimpuestosdeldetalle_look .= "SI" ;} 
 if (empty($sumarimpuestosdeldetalle_look)) { $sumarimpuestosdeldetalle_look = $this->sumarimpuestosdeldetalle; }
?>
<input type="hidden" name="sumarimpuestosdeldetalle" value="<?php echo $this->form_encode_input($sumarimpuestosdeldetalle) . "\">" . $sumarimpuestosdeldetalle_look . ""; ?>
<?php } else { ?>

<?php

$sumarimpuestosdeldetalle_look = "";
 if ($this->sumarimpuestosdeldetalle == "SI") { $sumarimpuestosdeldetalle_look .= "SI" ;} 
 if (empty($sumarimpuestosdeldetalle_look)) { $sumarimpuestosdeldetalle_look = $this->sumarimpuestosdeldetalle; }
?>
<span id="id_read_on_sumarimpuestosdeldetalle" class="css_sumarimpuestosdeldetalle_line" style="<?php echo $sStyleReadLab_sumarimpuestosdeldetalle; ?>"><?php echo $this->form_format_readonly("sumarimpuestosdeldetalle", $this->form_encode_input($sumarimpuestosdeldetalle_look)); ?></span><span id="id_read_off_sumarimpuestosdeldetalle" class="css_read_off_sumarimpuestosdeldetalle css_sumarimpuestosdeldetalle_line" style="<?php echo $sStyleReadInp_sumarimpuestosdeldetalle; ?>"><?php echo "<div id=\"idAjaxCheckbox_sumarimpuestosdeldetalle\" style=\"display: inline-block\" class=\"css_sumarimpuestosdeldetalle_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_sumarimpuestosdeldetalle_line"><?php $tempOptionId = "id-opt-sumarimpuestosdeldetalle" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-sumarimpuestosdeldetalle sc-ui-checkbox-sumarimpuestosdeldetalle" name="sumarimpuestosdeldetalle[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_sumarimpuestosdeldetalle'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->sumarimpuestosdeldetalle_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sumarimpuestosdeldetalle_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sumarimpuestosdeldetalle_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidaddecimales']))
    {
        $this->nm_new_label['cantidaddecimales'] = "Cantidad Decimales";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidaddecimales = $this->cantidaddecimales;
   $sStyleHidden_cantidaddecimales = '';
   if (isset($this->nmgp_cmp_hidden['cantidaddecimales']) && $this->nmgp_cmp_hidden['cantidaddecimales'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidaddecimales']);
       $sStyleHidden_cantidaddecimales = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidaddecimales = 'display: none;';
   $sStyleReadInp_cantidaddecimales = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidaddecimales']) && $this->nmgp_cmp_readonly['cantidaddecimales'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidaddecimales']);
       $sStyleReadLab_cantidaddecimales = '';
       $sStyleReadInp_cantidaddecimales = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidaddecimales']) && $this->nmgp_cmp_hidden['cantidaddecimales'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidaddecimales" value="<?php echo $this->form_encode_input($cantidaddecimales) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cantidaddecimales_line" id="hidden_field_data_cantidaddecimales" style="<?php echo $sStyleHidden_cantidaddecimales; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidaddecimales_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cantidaddecimales_label" style=""><span id="id_label_cantidaddecimales"><?php echo $this->nm_new_label['cantidaddecimales']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidaddecimales"]) &&  $this->nmgp_cmp_readonly["cantidaddecimales"] == "on") { 

 ?>
<input type="hidden" name="cantidaddecimales" value="<?php echo $this->form_encode_input($cantidaddecimales) . "\">" . $cantidaddecimales . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidaddecimales" class="sc-ui-readonly-cantidaddecimales css_cantidaddecimales_line" style="<?php echo $sStyleReadLab_cantidaddecimales; ?>"><?php echo $this->form_format_readonly("cantidaddecimales", $this->form_encode_input($this->cantidaddecimales)); ?></span><span id="id_read_off_cantidaddecimales" class="css_read_off_cantidaddecimales<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidaddecimales; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidaddecimales_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidaddecimales" type=text name="cantidaddecimales" value="<?php echo $this->form_encode_input($cantidaddecimales) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidaddecimales']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidaddecimales']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidaddecimales']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidaddecimales_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidaddecimales_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valortributounidad']))
    {
        $this->nm_new_label['valortributounidad'] = "Valor Tributo Unidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valortributounidad = $this->valortributounidad;
   $sStyleHidden_valortributounidad = '';
   if (isset($this->nmgp_cmp_hidden['valortributounidad']) && $this->nmgp_cmp_hidden['valortributounidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valortributounidad']);
       $sStyleHidden_valortributounidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valortributounidad = 'display: none;';
   $sStyleReadInp_valortributounidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valortributounidad']) && $this->nmgp_cmp_readonly['valortributounidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valortributounidad']);
       $sStyleReadLab_valortributounidad = '';
       $sStyleReadInp_valortributounidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valortributounidad']) && $this->nmgp_cmp_hidden['valortributounidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valortributounidad" value="<?php echo $this->form_encode_input($valortributounidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valortributounidad_line" id="hidden_field_data_valortributounidad" style="<?php echo $sStyleHidden_valortributounidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valortributounidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valortributounidad_label" style=""><span id="id_label_valortributounidad"><?php echo $this->nm_new_label['valortributounidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valortributounidad"]) &&  $this->nmgp_cmp_readonly["valortributounidad"] == "on") { 

 ?>
<input type="hidden" name="valortributounidad" value="<?php echo $this->form_encode_input($valortributounidad) . "\">" . $valortributounidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_valortributounidad" class="sc-ui-readonly-valortributounidad css_valortributounidad_line" style="<?php echo $sStyleReadLab_valortributounidad; ?>"><?php echo $this->form_format_readonly("valortributounidad", $this->form_encode_input($this->valortributounidad)); ?></span><span id="id_read_off_valortributounidad" class="css_read_off_valortributounidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valortributounidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_valortributounidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valortributounidad" type=text name="valortributounidad" value="<?php echo $this->form_encode_input($valortributounidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valortributounidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valortributounidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['conf_auto_tercero']))
   {
       $this->nm_new_label['conf_auto_tercero'] = "Configuracion auto tercero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conf_auto_tercero = $this->conf_auto_tercero;
   $sStyleHidden_conf_auto_tercero = '';
   if (isset($this->nmgp_cmp_hidden['conf_auto_tercero']) && $this->nmgp_cmp_hidden['conf_auto_tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conf_auto_tercero']);
       $sStyleHidden_conf_auto_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conf_auto_tercero = 'display: none;';
   $sStyleReadInp_conf_auto_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conf_auto_tercero']) && $this->nmgp_cmp_readonly['conf_auto_tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conf_auto_tercero']);
       $sStyleReadLab_conf_auto_tercero = '';
       $sStyleReadInp_conf_auto_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conf_auto_tercero']) && $this->nmgp_cmp_hidden['conf_auto_tercero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="conf_auto_tercero" value="<?php echo $this->form_encode_input($this->conf_auto_tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->conf_auto_tercero_1 = explode(";", trim($this->conf_auto_tercero));
  } 
  else
  {
      if (empty($this->conf_auto_tercero))
      {
          $this->conf_auto_tercero_1= array(); 
          $this->conf_auto_tercero= "NO";
      } 
      else
      {
          $this->conf_auto_tercero_1= $this->conf_auto_tercero; 
          $this->conf_auto_tercero= ""; 
          foreach ($this->conf_auto_tercero_1 as $cada_conf_auto_tercero)
          {
             if (!empty($conf_auto_tercero))
             {
                 $this->conf_auto_tercero.= ";"; 
             } 
             $this->conf_auto_tercero.= $cada_conf_auto_tercero; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_conf_auto_tercero_line" id="hidden_field_data_conf_auto_tercero" style="<?php echo $sStyleHidden_conf_auto_tercero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conf_auto_tercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conf_auto_tercero_label" style=""><span id="id_label_conf_auto_tercero"><?php echo $this->nm_new_label['conf_auto_tercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conf_auto_tercero"]) &&  $this->nmgp_cmp_readonly["conf_auto_tercero"] == "on") { 

$conf_auto_tercero_look = "";
 if ($this->conf_auto_tercero == "SI") { $conf_auto_tercero_look .= "" ;} 
 if (empty($conf_auto_tercero_look)) { $conf_auto_tercero_look = $this->conf_auto_tercero; }
?>
<input type="hidden" name="conf_auto_tercero" value="<?php echo $this->form_encode_input($conf_auto_tercero) . "\">" . $conf_auto_tercero_look . ""; ?>
<?php } else { ?>

<?php

$conf_auto_tercero_look = "";
 if ($this->conf_auto_tercero == "SI") { $conf_auto_tercero_look .= "" ;} 
 if (empty($conf_auto_tercero_look)) { $conf_auto_tercero_look = $this->conf_auto_tercero; }
?>
<span id="id_read_on_conf_auto_tercero" class="css_conf_auto_tercero_line" style="<?php echo $sStyleReadLab_conf_auto_tercero; ?>"><?php echo $this->form_format_readonly("conf_auto_tercero", $this->form_encode_input($conf_auto_tercero_look)); ?></span><span id="id_read_off_conf_auto_tercero" class="css_read_off_conf_auto_tercero css_conf_auto_tercero_line" style="<?php echo $sStyleReadInp_conf_auto_tercero; ?>"><?php echo "<div id=\"idAjaxCheckbox_conf_auto_tercero\" style=\"display: inline-block\" class=\"css_conf_auto_tercero_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_conf_auto_tercero_line"><?php $tempOptionId = "id-opt-conf_auto_tercero" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-conf_auto_tercero sc-ui-checkbox-conf_auto_tercero" name="conf_auto_tercero[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_conf_auto_tercero'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->conf_auto_tercero_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('conf_auto_tercero')", "nm_mostra_mens('conf_auto_tercero')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conf_auto_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conf_auto_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['no_validar_mail']))
   {
       $this->nm_new_label['no_validar_mail'] = "Correo alternativo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $no_validar_mail = $this->no_validar_mail;
   $sStyleHidden_no_validar_mail = '';
   if (isset($this->nmgp_cmp_hidden['no_validar_mail']) && $this->nmgp_cmp_hidden['no_validar_mail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['no_validar_mail']);
       $sStyleHidden_no_validar_mail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_no_validar_mail = 'display: none;';
   $sStyleReadInp_no_validar_mail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['no_validar_mail']) && $this->nmgp_cmp_readonly['no_validar_mail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['no_validar_mail']);
       $sStyleReadLab_no_validar_mail = '';
       $sStyleReadInp_no_validar_mail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['no_validar_mail']) && $this->nmgp_cmp_hidden['no_validar_mail'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="no_validar_mail" value="<?php echo $this->form_encode_input($this->no_validar_mail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->no_validar_mail_1 = explode(";", trim($this->no_validar_mail));
  } 
  else
  {
      if (empty($this->no_validar_mail))
      {
          $this->no_validar_mail_1= array(); 
          $this->no_validar_mail= "NO";
      } 
      else
      {
          $this->no_validar_mail_1= $this->no_validar_mail; 
          $this->no_validar_mail= ""; 
          foreach ($this->no_validar_mail_1 as $cada_no_validar_mail)
          {
             if (!empty($no_validar_mail))
             {
                 $this->no_validar_mail.= ";"; 
             } 
             $this->no_validar_mail.= $cada_no_validar_mail; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_no_validar_mail_line" id="hidden_field_data_no_validar_mail" style="<?php echo $sStyleHidden_no_validar_mail; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_no_validar_mail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_no_validar_mail_label" style=""><span id="id_label_no_validar_mail"><?php echo $this->nm_new_label['no_validar_mail']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["no_validar_mail"]) &&  $this->nmgp_cmp_readonly["no_validar_mail"] == "on") { 

$no_validar_mail_look = "";
 if ($this->no_validar_mail == "SI") { $no_validar_mail_look .= "" ;} 
 if (empty($no_validar_mail_look)) { $no_validar_mail_look = $this->no_validar_mail; }
?>
<input type="hidden" name="no_validar_mail" value="<?php echo $this->form_encode_input($no_validar_mail) . "\">" . $no_validar_mail_look . ""; ?>
<?php } else { ?>

<?php

$no_validar_mail_look = "";
 if ($this->no_validar_mail == "SI") { $no_validar_mail_look .= "" ;} 
 if (empty($no_validar_mail_look)) { $no_validar_mail_look = $this->no_validar_mail; }
?>
<span id="id_read_on_no_validar_mail" class="css_no_validar_mail_line" style="<?php echo $sStyleReadLab_no_validar_mail; ?>"><?php echo $this->form_format_readonly("no_validar_mail", $this->form_encode_input($no_validar_mail_look)); ?></span><span id="id_read_off_no_validar_mail" class="css_read_off_no_validar_mail css_no_validar_mail_line" style="<?php echo $sStyleReadInp_no_validar_mail; ?>"><?php echo "<div id=\"idAjaxCheckbox_no_validar_mail\" style=\"display: inline-block\" class=\"css_no_validar_mail_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_no_validar_mail_line"><?php $tempOptionId = "id-opt-no_validar_mail" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-no_validar_mail sc-ui-checkbox-no_validar_mail" name="no_validar_mail[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_no_validar_mail'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->no_validar_mail_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('no_validar_mail')", "nm_mostra_mens('no_validar_mail')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_no_validar_mail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_no_validar_mail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email_alternativo']))
    {
        $this->nm_new_label['email_alternativo'] = "Correo alternativo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email_alternativo = $this->email_alternativo;
   $sStyleHidden_email_alternativo = '';
   if (isset($this->nmgp_cmp_hidden['email_alternativo']) && $this->nmgp_cmp_hidden['email_alternativo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email_alternativo']);
       $sStyleHidden_email_alternativo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email_alternativo = 'display: none;';
   $sStyleReadInp_email_alternativo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email_alternativo']) && $this->nmgp_cmp_readonly['email_alternativo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email_alternativo']);
       $sStyleReadLab_email_alternativo = '';
       $sStyleReadInp_email_alternativo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email_alternativo']) && $this->nmgp_cmp_hidden['email_alternativo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email_alternativo" value="<?php echo $this->form_encode_input($email_alternativo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_alternativo_line" id="hidden_field_data_email_alternativo" style="<?php echo $sStyleHidden_email_alternativo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_alternativo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_alternativo_label" style=""><span id="id_label_email_alternativo"><?php echo $this->nm_new_label['email_alternativo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email_alternativo"]) &&  $this->nmgp_cmp_readonly["email_alternativo"] == "on") { 

 ?>
<input type="hidden" name="email_alternativo" value="<?php echo $this->form_encode_input($email_alternativo) . "\">" . $email_alternativo . ""; ?>
<?php } else { ?>
<span id="id_read_on_email_alternativo" class="sc-ui-readonly-email_alternativo css_email_alternativo_line" style="<?php echo $sStyleReadLab_email_alternativo; ?>"><?php echo $this->form_format_readonly("email_alternativo", $this->form_encode_input($this->email_alternativo)); ?></span><span id="id_read_off_email_alternativo" class="css_read_off_email_alternativo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_email_alternativo; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_alternativo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_email_alternativo" type=text name="email_alternativo" value="<?php echo $this->form_encode_input($email_alternativo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><img src="../_lib/img/scriptcase__NM__nm_transparent.gif" style="vertical-align: middle; display: none" class="sc-js-ui-statusimg" id="id_sc_status_email_alternativo" />&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email_alternativo.value != '') {window.open('mailto:' + document.F1.email_alternativo.value); }", "if (document.F1.email_alternativo.value != '') {window.open('mailto:' + document.F1.email_alternativo.value); }", "email_alternativo_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('email_alternativo')", "nm_mostra_mens('email_alternativo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_alternativo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_alternativo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desviar_correo_a']))
    {
        $this->nm_new_label['desviar_correo_a'] = "Desviar correo a";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desviar_correo_a = $this->desviar_correo_a;
   $sStyleHidden_desviar_correo_a = '';
   if (isset($this->nmgp_cmp_hidden['desviar_correo_a']) && $this->nmgp_cmp_hidden['desviar_correo_a'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desviar_correo_a']);
       $sStyleHidden_desviar_correo_a = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desviar_correo_a = 'display: none;';
   $sStyleReadInp_desviar_correo_a = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desviar_correo_a']) && $this->nmgp_cmp_readonly['desviar_correo_a'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desviar_correo_a']);
       $sStyleReadLab_desviar_correo_a = '';
       $sStyleReadInp_desviar_correo_a = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desviar_correo_a']) && $this->nmgp_cmp_hidden['desviar_correo_a'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desviar_correo_a" value="<?php echo $this->form_encode_input($desviar_correo_a) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_desviar_correo_a_line" id="hidden_field_data_desviar_correo_a" style="<?php echo $sStyleHidden_desviar_correo_a; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desviar_correo_a_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_desviar_correo_a_label" style=""><span id="id_label_desviar_correo_a"><?php echo $this->nm_new_label['desviar_correo_a']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desviar_correo_a"]) &&  $this->nmgp_cmp_readonly["desviar_correo_a"] == "on") { 

 ?>
<input type="hidden" name="desviar_correo_a" value="<?php echo $this->form_encode_input($desviar_correo_a) . "\">" . $desviar_correo_a . ""; ?>
<?php } else { ?>
<span id="id_read_on_desviar_correo_a" class="sc-ui-readonly-desviar_correo_a css_desviar_correo_a_line" style="<?php echo $sStyleReadLab_desviar_correo_a; ?>"><?php echo $this->form_format_readonly("desviar_correo_a", $this->form_encode_input($this->desviar_correo_a)); ?></span><span id="id_read_off_desviar_correo_a" class="css_read_off_desviar_correo_a<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desviar_correo_a; ?>">
 <input class="sc-js-input scFormObjectOdd css_desviar_correo_a_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desviar_correo_a" type=text name="desviar_correo_a" value="<?php echo $this->form_encode_input($desviar_correo_a) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.desviar_correo_a.value != '') {window.open('mailto:' + document.F1.desviar_correo_a.value); }", "if (document.F1.desviar_correo_a.value != '') {window.open('mailto:' + document.F1.desviar_correo_a.value); }", "desviar_correo_a_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('desviar_correo_a')", "nm_mostra_mens('desviar_correo_a')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desviar_correo_a_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desviar_correo_a_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['correo_copia']))
    {
        $this->nm_new_label['correo_copia'] = "Enviar copia a";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $correo_copia = $this->correo_copia;
   $sStyleHidden_correo_copia = '';
   if (isset($this->nmgp_cmp_hidden['correo_copia']) && $this->nmgp_cmp_hidden['correo_copia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['correo_copia']);
       $sStyleHidden_correo_copia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_correo_copia = 'display: none;';
   $sStyleReadInp_correo_copia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['correo_copia']) && $this->nmgp_cmp_readonly['correo_copia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['correo_copia']);
       $sStyleReadLab_correo_copia = '';
       $sStyleReadInp_correo_copia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['correo_copia']) && $this->nmgp_cmp_hidden['correo_copia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_copia" value="<?php echo $this->form_encode_input($correo_copia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_correo_copia_line" id="hidden_field_data_correo_copia" style="<?php echo $sStyleHidden_correo_copia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_copia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_copia_label" style=""><span id="id_label_correo_copia"><?php echo $this->nm_new_label['correo_copia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_copia"]) &&  $this->nmgp_cmp_readonly["correo_copia"] == "on") { 

 ?>
<input type="hidden" name="correo_copia" value="<?php echo $this->form_encode_input($correo_copia) . "\">" . $correo_copia . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_copia" class="sc-ui-readonly-correo_copia css_correo_copia_line" style="<?php echo $sStyleReadLab_correo_copia; ?>"><?php echo $this->form_format_readonly("correo_copia", $this->form_encode_input($this->correo_copia)); ?></span><span id="id_read_off_correo_copia" class="css_read_off_correo_copia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_copia; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_copia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo_copia" type=text name="correo_copia" value="<?php echo $this->form_encode_input($correo_copia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.correo_copia.value != '') {window.open('mailto:' + document.F1.correo_copia.value); }", "if (document.F1.correo_copia.value != '') {window.open('mailto:' + document.F1.correo_copia.value); }", "correo_copia_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('correo_copia')", "nm_mostra_mens('correo_copia')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_copia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_copia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['informacion_adicional']))
    {
        $this->nm_new_label['informacion_adicional'] = "Información Adicional";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $informacion_adicional = $this->informacion_adicional;
   $sStyleHidden_informacion_adicional = '';
   if (isset($this->nmgp_cmp_hidden['informacion_adicional']) && $this->nmgp_cmp_hidden['informacion_adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['informacion_adicional']);
       $sStyleHidden_informacion_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_informacion_adicional = 'display: none;';
   $sStyleReadInp_informacion_adicional = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['informacion_adicional']) && $this->nmgp_cmp_readonly['informacion_adicional'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['informacion_adicional']);
       $sStyleReadLab_informacion_adicional = '';
       $sStyleReadInp_informacion_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['informacion_adicional']) && $this->nmgp_cmp_hidden['informacion_adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="informacion_adicional" value="<?php echo $this->form_encode_input($informacion_adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_informacion_adicional_line" id="hidden_field_data_informacion_adicional" style="<?php echo $sStyleHidden_informacion_adicional; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_informacion_adicional_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_informacion_adicional_label" style=""><span id="id_label_informacion_adicional"><?php echo $this->nm_new_label['informacion_adicional']; ?></span></span><br>
<?php
$informacion_adicional_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($informacion_adicional));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["informacion_adicional"]) &&  $this->nmgp_cmp_readonly["informacion_adicional"] == "on") { 

 ?>
<input type="hidden" name="informacion_adicional" value="<?php echo $this->form_encode_input($informacion_adicional) . "\">" . $informacion_adicional_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_informacion_adicional" class="sc-ui-readonly-informacion_adicional css_informacion_adicional_line" style="<?php echo $sStyleReadLab_informacion_adicional; ?>"><?php echo $this->form_format_readonly("informacion_adicional", $this->form_encode_input($informacion_adicional_val)); ?></span><span id="id_read_off_informacion_adicional" class="css_read_off_informacion_adicional<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_informacion_adicional; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_informacion_adicional_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="informacion_adicional" id="id_sc_field_informacion_adicional" rows="10" cols="150"
 alt="{datatype: 'text', maxLength: 1000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $informacion_adicional; ?>
</textarea>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('informacion_adicional')", "nm_mostra_mens('informacion_adicional')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_informacion_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_informacion_adicional_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tomar_municipio_tns']))
   {
       $this->nm_new_label['tomar_municipio_tns'] = "Tomar el municipio de TNS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tomar_municipio_tns = $this->tomar_municipio_tns;
   $sStyleHidden_tomar_municipio_tns = '';
   if (isset($this->nmgp_cmp_hidden['tomar_municipio_tns']) && $this->nmgp_cmp_hidden['tomar_municipio_tns'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tomar_municipio_tns']);
       $sStyleHidden_tomar_municipio_tns = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tomar_municipio_tns = 'display: none;';
   $sStyleReadInp_tomar_municipio_tns = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tomar_municipio_tns']) && $this->nmgp_cmp_readonly['tomar_municipio_tns'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tomar_municipio_tns']);
       $sStyleReadLab_tomar_municipio_tns = '';
       $sStyleReadInp_tomar_municipio_tns = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tomar_municipio_tns']) && $this->nmgp_cmp_hidden['tomar_municipio_tns'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tomar_municipio_tns" value="<?php echo $this->form_encode_input($this->tomar_municipio_tns) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->tomar_municipio_tns_1 = explode(";", trim($this->tomar_municipio_tns));
  } 
  else
  {
      if (empty($this->tomar_municipio_tns))
      {
          $this->tomar_municipio_tns_1= array(); 
          $this->tomar_municipio_tns= "NO";
      } 
      else
      {
          $this->tomar_municipio_tns_1= $this->tomar_municipio_tns; 
          $this->tomar_municipio_tns= ""; 
          foreach ($this->tomar_municipio_tns_1 as $cada_tomar_municipio_tns)
          {
             if (!empty($tomar_municipio_tns))
             {
                 $this->tomar_municipio_tns.= ";"; 
             } 
             $this->tomar_municipio_tns.= $cada_tomar_municipio_tns; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_tomar_municipio_tns_line" id="hidden_field_data_tomar_municipio_tns" style="<?php echo $sStyleHidden_tomar_municipio_tns; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tomar_municipio_tns_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tomar_municipio_tns_label" style=""><span id="id_label_tomar_municipio_tns"><?php echo $this->nm_new_label['tomar_municipio_tns']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tomar_municipio_tns"]) &&  $this->nmgp_cmp_readonly["tomar_municipio_tns"] == "on") { 

$tomar_municipio_tns_look = "";
 if ($this->tomar_municipio_tns == "SI") { $tomar_municipio_tns_look .= "SI" ;} 
 if (empty($tomar_municipio_tns_look)) { $tomar_municipio_tns_look = $this->tomar_municipio_tns; }
?>
<input type="hidden" name="tomar_municipio_tns" value="<?php echo $this->form_encode_input($tomar_municipio_tns) . "\">" . $tomar_municipio_tns_look . ""; ?>
<?php } else { ?>

<?php

$tomar_municipio_tns_look = "";
 if ($this->tomar_municipio_tns == "SI") { $tomar_municipio_tns_look .= "SI" ;} 
 if (empty($tomar_municipio_tns_look)) { $tomar_municipio_tns_look = $this->tomar_municipio_tns; }
?>
<span id="id_read_on_tomar_municipio_tns" class="css_tomar_municipio_tns_line" style="<?php echo $sStyleReadLab_tomar_municipio_tns; ?>"><?php echo $this->form_format_readonly("tomar_municipio_tns", $this->form_encode_input($tomar_municipio_tns_look)); ?></span><span id="id_read_off_tomar_municipio_tns" class="css_read_off_tomar_municipio_tns css_tomar_municipio_tns_line" style="<?php echo $sStyleReadInp_tomar_municipio_tns; ?>"><?php echo "<div id=\"idAjaxCheckbox_tomar_municipio_tns\" style=\"display: inline-block\" class=\"css_tomar_municipio_tns_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_tomar_municipio_tns_line"><?php $tempOptionId = "id-opt-tomar_municipio_tns" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-tomar_municipio_tns sc-ui-checkbox-tomar_municipio_tns" name="tomar_municipio_tns[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_tomar_municipio_tns'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->tomar_municipio_tns_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('tomar_municipio_tns')", "nm_mostra_mens('tomar_municipio_tns')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tomar_municipio_tns_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tomar_municipio_tns_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['validar_codcliente_tns']))
   {
       $this->nm_new_label['validar_codcliente_tns'] = "Validar Cliente en TNS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $validar_codcliente_tns = $this->validar_codcliente_tns;
   $sStyleHidden_validar_codcliente_tns = '';
   if (isset($this->nmgp_cmp_hidden['validar_codcliente_tns']) && $this->nmgp_cmp_hidden['validar_codcliente_tns'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['validar_codcliente_tns']);
       $sStyleHidden_validar_codcliente_tns = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_validar_codcliente_tns = 'display: none;';
   $sStyleReadInp_validar_codcliente_tns = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['validar_codcliente_tns']) && $this->nmgp_cmp_readonly['validar_codcliente_tns'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['validar_codcliente_tns']);
       $sStyleReadLab_validar_codcliente_tns = '';
       $sStyleReadInp_validar_codcliente_tns = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['validar_codcliente_tns']) && $this->nmgp_cmp_hidden['validar_codcliente_tns'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="validar_codcliente_tns" value="<?php echo $this->form_encode_input($this->validar_codcliente_tns) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->validar_codcliente_tns_1 = explode(";", trim($this->validar_codcliente_tns));
  } 
  else
  {
      if (empty($this->validar_codcliente_tns))
      {
          $this->validar_codcliente_tns_1= array(); 
          $this->validar_codcliente_tns= "NO";
      } 
      else
      {
          $this->validar_codcliente_tns_1= $this->validar_codcliente_tns; 
          $this->validar_codcliente_tns= ""; 
          foreach ($this->validar_codcliente_tns_1 as $cada_validar_codcliente_tns)
          {
             if (!empty($validar_codcliente_tns))
             {
                 $this->validar_codcliente_tns.= ";"; 
             } 
             $this->validar_codcliente_tns.= $cada_validar_codcliente_tns; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_validar_codcliente_tns_line" id="hidden_field_data_validar_codcliente_tns" style="<?php echo $sStyleHidden_validar_codcliente_tns; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_validar_codcliente_tns_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_validar_codcliente_tns_label" style=""><span id="id_label_validar_codcliente_tns"><?php echo $this->nm_new_label['validar_codcliente_tns']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["validar_codcliente_tns"]) &&  $this->nmgp_cmp_readonly["validar_codcliente_tns"] == "on") { 

$validar_codcliente_tns_look = "";
 if ($this->validar_codcliente_tns == "SI") { $validar_codcliente_tns_look .= "SI" ;} 
 if (empty($validar_codcliente_tns_look)) { $validar_codcliente_tns_look = $this->validar_codcliente_tns; }
?>
<input type="hidden" name="validar_codcliente_tns" value="<?php echo $this->form_encode_input($validar_codcliente_tns) . "\">" . $validar_codcliente_tns_look . ""; ?>
<?php } else { ?>

<?php

$validar_codcliente_tns_look = "";
 if ($this->validar_codcliente_tns == "SI") { $validar_codcliente_tns_look .= "SI" ;} 
 if (empty($validar_codcliente_tns_look)) { $validar_codcliente_tns_look = $this->validar_codcliente_tns; }
?>
<span id="id_read_on_validar_codcliente_tns" class="css_validar_codcliente_tns_line" style="<?php echo $sStyleReadLab_validar_codcliente_tns; ?>"><?php echo $this->form_format_readonly("validar_codcliente_tns", $this->form_encode_input($validar_codcliente_tns_look)); ?></span><span id="id_read_off_validar_codcliente_tns" class="css_read_off_validar_codcliente_tns css_validar_codcliente_tns_line" style="<?php echo $sStyleReadInp_validar_codcliente_tns; ?>"><?php echo "<div id=\"idAjaxCheckbox_validar_codcliente_tns\" style=\"display: inline-block\" class=\"css_validar_codcliente_tns_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_validar_codcliente_tns_line"><?php $tempOptionId = "id-opt-validar_codcliente_tns" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-validar_codcliente_tns sc-ui-checkbox-validar_codcliente_tns" name="validar_codcliente_tns[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_validar_codcliente_tns'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->validar_codcliente_tns_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('validar_codcliente_tns')", "nm_mostra_mens('validar_codcliente_tns')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_validar_codcliente_tns_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_validar_codcliente_tns_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['desactivar_xml_enlista']))
   {
       $this->nm_new_label['desactivar_xml_enlista'] = "Desactivar XML en lista";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desactivar_xml_enlista = $this->desactivar_xml_enlista;
   $sStyleHidden_desactivar_xml_enlista = '';
   if (isset($this->nmgp_cmp_hidden['desactivar_xml_enlista']) && $this->nmgp_cmp_hidden['desactivar_xml_enlista'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desactivar_xml_enlista']);
       $sStyleHidden_desactivar_xml_enlista = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desactivar_xml_enlista = 'display: none;';
   $sStyleReadInp_desactivar_xml_enlista = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desactivar_xml_enlista']) && $this->nmgp_cmp_readonly['desactivar_xml_enlista'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desactivar_xml_enlista']);
       $sStyleReadLab_desactivar_xml_enlista = '';
       $sStyleReadInp_desactivar_xml_enlista = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desactivar_xml_enlista']) && $this->nmgp_cmp_hidden['desactivar_xml_enlista'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="desactivar_xml_enlista" value="<?php echo $this->form_encode_input($this->desactivar_xml_enlista) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->desactivar_xml_enlista_1 = explode(";", trim($this->desactivar_xml_enlista));
  } 
  else
  {
      if (empty($this->desactivar_xml_enlista))
      {
          $this->desactivar_xml_enlista_1= array(); 
          $this->desactivar_xml_enlista= "NO";
      } 
      else
      {
          $this->desactivar_xml_enlista_1= $this->desactivar_xml_enlista; 
          $this->desactivar_xml_enlista= ""; 
          foreach ($this->desactivar_xml_enlista_1 as $cada_desactivar_xml_enlista)
          {
             if (!empty($desactivar_xml_enlista))
             {
                 $this->desactivar_xml_enlista.= ";"; 
             } 
             $this->desactivar_xml_enlista.= $cada_desactivar_xml_enlista; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_desactivar_xml_enlista_line" id="hidden_field_data_desactivar_xml_enlista" style="<?php echo $sStyleHidden_desactivar_xml_enlista; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desactivar_xml_enlista_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_desactivar_xml_enlista_label" style=""><span id="id_label_desactivar_xml_enlista"><?php echo $this->nm_new_label['desactivar_xml_enlista']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desactivar_xml_enlista"]) &&  $this->nmgp_cmp_readonly["desactivar_xml_enlista"] == "on") { 

$desactivar_xml_enlista_look = "";
 if ($this->desactivar_xml_enlista == "SI") { $desactivar_xml_enlista_look .= "SI" ;} 
 if (empty($desactivar_xml_enlista_look)) { $desactivar_xml_enlista_look = $this->desactivar_xml_enlista; }
?>
<input type="hidden" name="desactivar_xml_enlista" value="<?php echo $this->form_encode_input($desactivar_xml_enlista) . "\">" . $desactivar_xml_enlista_look . ""; ?>
<?php } else { ?>

<?php

$desactivar_xml_enlista_look = "";
 if ($this->desactivar_xml_enlista == "SI") { $desactivar_xml_enlista_look .= "SI" ;} 
 if (empty($desactivar_xml_enlista_look)) { $desactivar_xml_enlista_look = $this->desactivar_xml_enlista; }
?>
<span id="id_read_on_desactivar_xml_enlista" class="css_desactivar_xml_enlista_line" style="<?php echo $sStyleReadLab_desactivar_xml_enlista; ?>"><?php echo $this->form_format_readonly("desactivar_xml_enlista", $this->form_encode_input($desactivar_xml_enlista_look)); ?></span><span id="id_read_off_desactivar_xml_enlista" class="css_read_off_desactivar_xml_enlista css_desactivar_xml_enlista_line" style="<?php echo $sStyleReadInp_desactivar_xml_enlista; ?>"><?php echo "<div id=\"idAjaxCheckbox_desactivar_xml_enlista\" style=\"display: inline-block\" class=\"css_desactivar_xml_enlista_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_desactivar_xml_enlista_line"><?php $tempOptionId = "id-opt-desactivar_xml_enlista" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-desactivar_xml_enlista sc-ui-checkbox-desactivar_xml_enlista" name="desactivar_xml_enlista[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_desactivar_xml_enlista'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->desactivar_xml_enlista_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('desactivar_xml_enlista')", "nm_mostra_mens('desactivar_xml_enlista')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desactivar_xml_enlista_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desactivar_xml_enlista_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['validar_correo_enlinea']))
   {
       $this->nm_new_label['validar_correo_enlinea'] = "Validar Correo En Línea";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $validar_correo_enlinea = $this->validar_correo_enlinea;
   $sStyleHidden_validar_correo_enlinea = '';
   if (isset($this->nmgp_cmp_hidden['validar_correo_enlinea']) && $this->nmgp_cmp_hidden['validar_correo_enlinea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['validar_correo_enlinea']);
       $sStyleHidden_validar_correo_enlinea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_validar_correo_enlinea = 'display: none;';
   $sStyleReadInp_validar_correo_enlinea = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['validar_correo_enlinea']) && $this->nmgp_cmp_readonly['validar_correo_enlinea'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['validar_correo_enlinea']);
       $sStyleReadLab_validar_correo_enlinea = '';
       $sStyleReadInp_validar_correo_enlinea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['validar_correo_enlinea']) && $this->nmgp_cmp_hidden['validar_correo_enlinea'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="validar_correo_enlinea" value="<?php echo $this->form_encode_input($this->validar_correo_enlinea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->validar_correo_enlinea_1 = explode(";", trim($this->validar_correo_enlinea));
  } 
  else
  {
      if (empty($this->validar_correo_enlinea))
      {
          $this->validar_correo_enlinea_1= array(); 
          $this->validar_correo_enlinea= "NO";
      } 
      else
      {
          $this->validar_correo_enlinea_1= $this->validar_correo_enlinea; 
          $this->validar_correo_enlinea= ""; 
          foreach ($this->validar_correo_enlinea_1 as $cada_validar_correo_enlinea)
          {
             if (!empty($validar_correo_enlinea))
             {
                 $this->validar_correo_enlinea.= ";"; 
             } 
             $this->validar_correo_enlinea.= $cada_validar_correo_enlinea; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_validar_correo_enlinea_line" id="hidden_field_data_validar_correo_enlinea" style="<?php echo $sStyleHidden_validar_correo_enlinea; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_validar_correo_enlinea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_validar_correo_enlinea_label" style=""><span id="id_label_validar_correo_enlinea"><?php echo $this->nm_new_label['validar_correo_enlinea']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["validar_correo_enlinea"]) &&  $this->nmgp_cmp_readonly["validar_correo_enlinea"] == "on") { 

$validar_correo_enlinea_look = "";
 if ($this->validar_correo_enlinea == "SI") { $validar_correo_enlinea_look .= "SI" ;} 
 if (empty($validar_correo_enlinea_look)) { $validar_correo_enlinea_look = $this->validar_correo_enlinea; }
?>
<input type="hidden" name="validar_correo_enlinea" value="<?php echo $this->form_encode_input($validar_correo_enlinea) . "\">" . $validar_correo_enlinea_look . ""; ?>
<?php } else { ?>

<?php

$validar_correo_enlinea_look = "";
 if ($this->validar_correo_enlinea == "SI") { $validar_correo_enlinea_look .= "SI" ;} 
 if (empty($validar_correo_enlinea_look)) { $validar_correo_enlinea_look = $this->validar_correo_enlinea; }
?>
<span id="id_read_on_validar_correo_enlinea" class="css_validar_correo_enlinea_line" style="<?php echo $sStyleReadLab_validar_correo_enlinea; ?>"><?php echo $this->form_format_readonly("validar_correo_enlinea", $this->form_encode_input($validar_correo_enlinea_look)); ?></span><span id="id_read_off_validar_correo_enlinea" class="css_read_off_validar_correo_enlinea css_validar_correo_enlinea_line" style="<?php echo $sStyleReadInp_validar_correo_enlinea; ?>"><?php echo "<div id=\"idAjaxCheckbox_validar_correo_enlinea\" style=\"display: inline-block\" class=\"css_validar_correo_enlinea_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_validar_correo_enlinea_line"><?php $tempOptionId = "id-opt-validar_correo_enlinea" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-validar_correo_enlinea sc-ui-checkbox-validar_correo_enlinea" name="validar_correo_enlinea[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['Lookup_validar_correo_enlinea'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->validar_correo_enlinea_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_validar_correo_enlinea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_validar_correo_enlinea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_bouncer']))
    {
        $this->nm_new_label['url_bouncer'] = "URL Bouncer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_bouncer = $this->url_bouncer;
   $sStyleHidden_url_bouncer = '';
   if (isset($this->nmgp_cmp_hidden['url_bouncer']) && $this->nmgp_cmp_hidden['url_bouncer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_bouncer']);
       $sStyleHidden_url_bouncer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_bouncer = 'display: none;';
   $sStyleReadInp_url_bouncer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_bouncer']) && $this->nmgp_cmp_readonly['url_bouncer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_bouncer']);
       $sStyleReadLab_url_bouncer = '';
       $sStyleReadInp_url_bouncer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_bouncer']) && $this->nmgp_cmp_hidden['url_bouncer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_bouncer" value="<?php echo $this->form_encode_input($url_bouncer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_bouncer_line" id="hidden_field_data_url_bouncer" style="<?php echo $sStyleHidden_url_bouncer; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_bouncer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_bouncer_label" style=""><span id="id_label_url_bouncer"><?php echo $this->nm_new_label['url_bouncer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_bouncer"]) &&  $this->nmgp_cmp_readonly["url_bouncer"] == "on") { 

 ?>
<input type="hidden" name="url_bouncer" value="<?php echo $this->form_encode_input($url_bouncer) . "\">" . $url_bouncer . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_bouncer" class="sc-ui-readonly-url_bouncer css_url_bouncer_line" style="<?php echo $sStyleReadLab_url_bouncer; ?>"><?php echo $this->form_format_readonly("url_bouncer", $this->form_encode_input($this->url_bouncer)); ?></span><span id="id_read_off_url_bouncer" class="css_read_off_url_bouncer<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_bouncer; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_bouncer_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_bouncer" type=text name="url_bouncer" value="<?php echo $this->form_encode_input($url_bouncer) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.url_bouncer.value), '_blank')", "window.open(nm_link_url(document.F1.url_bouncer.value), '_blank')", "url_bouncer_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('url_bouncer')", "nm_mostra_mens('url_bouncer')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_bouncer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_bouncer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['apikey_bouncer']))
    {
        $this->nm_new_label['apikey_bouncer'] = "Apikey Bouncer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $apikey_bouncer = $this->apikey_bouncer;
   $sStyleHidden_apikey_bouncer = '';
   if (isset($this->nmgp_cmp_hidden['apikey_bouncer']) && $this->nmgp_cmp_hidden['apikey_bouncer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['apikey_bouncer']);
       $sStyleHidden_apikey_bouncer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_apikey_bouncer = 'display: none;';
   $sStyleReadInp_apikey_bouncer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['apikey_bouncer']) && $this->nmgp_cmp_readonly['apikey_bouncer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['apikey_bouncer']);
       $sStyleReadLab_apikey_bouncer = '';
       $sStyleReadInp_apikey_bouncer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['apikey_bouncer']) && $this->nmgp_cmp_hidden['apikey_bouncer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="apikey_bouncer" value="<?php echo $this->form_encode_input($apikey_bouncer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_apikey_bouncer_line" id="hidden_field_data_apikey_bouncer" style="<?php echo $sStyleHidden_apikey_bouncer; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_apikey_bouncer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_apikey_bouncer_label" style=""><span id="id_label_apikey_bouncer"><?php echo $this->nm_new_label['apikey_bouncer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apikey_bouncer"]) &&  $this->nmgp_cmp_readonly["apikey_bouncer"] == "on") { 

 ?>
<input type="hidden" name="apikey_bouncer" value="<?php echo $this->form_encode_input($apikey_bouncer) . "\">" . $apikey_bouncer . ""; ?>
<?php } else { ?>
<span id="id_read_on_apikey_bouncer" class="sc-ui-readonly-apikey_bouncer css_apikey_bouncer_line" style="<?php echo $sStyleReadLab_apikey_bouncer; ?>"><?php echo $this->form_format_readonly("apikey_bouncer", $this->form_encode_input($this->apikey_bouncer)); ?></span><span id="id_read_off_apikey_bouncer" class="css_read_off_apikey_bouncer<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_apikey_bouncer; ?>">
 <input class="sc-js-input scFormObjectOdd css_apikey_bouncer_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_apikey_bouncer" type=text name="apikey_bouncer" value="<?php echo $this->form_encode_input($apikey_bouncer) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('apikey_bouncer')", "nm_mostra_mens('apikey_bouncer')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apikey_bouncer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apikey_bouncer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tiempo_bouncer']))
    {
        $this->nm_new_label['tiempo_bouncer'] = "Tiempo Bouncer";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tiempo_bouncer = $this->tiempo_bouncer;
   $sStyleHidden_tiempo_bouncer = '';
   if (isset($this->nmgp_cmp_hidden['tiempo_bouncer']) && $this->nmgp_cmp_hidden['tiempo_bouncer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tiempo_bouncer']);
       $sStyleHidden_tiempo_bouncer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tiempo_bouncer = 'display: none;';
   $sStyleReadInp_tiempo_bouncer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tiempo_bouncer']) && $this->nmgp_cmp_readonly['tiempo_bouncer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tiempo_bouncer']);
       $sStyleReadLab_tiempo_bouncer = '';
       $sStyleReadInp_tiempo_bouncer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tiempo_bouncer']) && $this->nmgp_cmp_hidden['tiempo_bouncer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tiempo_bouncer" value="<?php echo $this->form_encode_input($tiempo_bouncer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tiempo_bouncer_line" id="hidden_field_data_tiempo_bouncer" style="<?php echo $sStyleHidden_tiempo_bouncer; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tiempo_bouncer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tiempo_bouncer_label" style=""><span id="id_label_tiempo_bouncer"><?php echo $this->nm_new_label['tiempo_bouncer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tiempo_bouncer"]) &&  $this->nmgp_cmp_readonly["tiempo_bouncer"] == "on") { 

 ?>
<input type="hidden" name="tiempo_bouncer" value="<?php echo $this->form_encode_input($tiempo_bouncer) . "\">" . $tiempo_bouncer . ""; ?>
<?php } else { ?>
<span id="id_read_on_tiempo_bouncer" class="sc-ui-readonly-tiempo_bouncer css_tiempo_bouncer_line" style="<?php echo $sStyleReadLab_tiempo_bouncer; ?>"><?php echo $this->form_format_readonly("tiempo_bouncer", $this->form_encode_input($this->tiempo_bouncer)); ?></span><span id="id_read_off_tiempo_bouncer" class="css_read_off_tiempo_bouncer<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tiempo_bouncer; ?>">
 <input class="sc-js-input scFormObjectOdd css_tiempo_bouncer_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tiempo_bouncer" type=text name="tiempo_bouncer" value="<?php echo $this->form_encode_input($tiempo_bouncer) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tiempo_bouncer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tiempo_bouncer']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tiempo_bouncer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tiempo_bouncer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tiempo_bouncer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_validar_licencia']))
    {
        $this->nm_new_label['url_validar_licencia'] = "Url Validar Licencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_validar_licencia = $this->url_validar_licencia;
   if (!isset($this->nmgp_cmp_hidden['url_validar_licencia']))
   {
       $this->nmgp_cmp_hidden['url_validar_licencia'] = 'off';
   }
   $sStyleHidden_url_validar_licencia = '';
   if (isset($this->nmgp_cmp_hidden['url_validar_licencia']) && $this->nmgp_cmp_hidden['url_validar_licencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_validar_licencia']);
       $sStyleHidden_url_validar_licencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_validar_licencia = 'display: none;';
   $sStyleReadInp_url_validar_licencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_validar_licencia']) && $this->nmgp_cmp_readonly['url_validar_licencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_validar_licencia']);
       $sStyleReadLab_url_validar_licencia = '';
       $sStyleReadInp_url_validar_licencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_validar_licencia']) && $this->nmgp_cmp_hidden['url_validar_licencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_validar_licencia" value="<?php echo $this->form_encode_input($url_validar_licencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_validar_licencia_line" id="hidden_field_data_url_validar_licencia" style="<?php echo $sStyleHidden_url_validar_licencia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_validar_licencia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_validar_licencia_label" style=""><span id="id_label_url_validar_licencia"><?php echo $this->nm_new_label['url_validar_licencia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_validar_licencia"]) &&  $this->nmgp_cmp_readonly["url_validar_licencia"] == "on") { 

 ?>
<input type="hidden" name="url_validar_licencia" value="<?php echo $this->form_encode_input($url_validar_licencia) . "\">" . $url_validar_licencia . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_validar_licencia" class="sc-ui-readonly-url_validar_licencia css_url_validar_licencia_line" style="<?php echo $sStyleReadLab_url_validar_licencia; ?>"><?php echo $this->form_format_readonly("url_validar_licencia", $this->form_encode_input($this->url_validar_licencia)); ?></span><span id="id_read_off_url_validar_licencia" class="css_read_off_url_validar_licencia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_validar_licencia; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_validar_licencia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_validar_licencia" type=text name="url_validar_licencia" value="<?php echo $this->form_encode_input($url_validar_licencia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_validar_licencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_validar_licencia_text"></span></td></tr></table></td></tr></table> </TD>
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
 $NM_pag_atual = "form_cloud_empresas_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_cloud_empresas_form" . $this->nmgp_ancora;
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cloud_empresas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cloud_empresas");
 parent.scAjaxDetailHeight("form_cloud_empresas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cloud_empresas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cloud_empresas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['sc_modal'])
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
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-4").length && $("#sc_b_del_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('excluir');
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
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['buttonStatus'] = $this->nmgp_botoes;
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
