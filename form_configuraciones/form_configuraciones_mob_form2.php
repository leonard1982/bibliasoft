<div id="form_configuraciones_mob_form2" style='<?php echo ($this->tabCssClass["form_configuraciones_mob_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['control_diasmora']))
   {
       $this->nm_new_label['control_diasmora'] = "CONTROL CARTERA CON DÍAS DE MORA?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control_diasmora = $this->control_diasmora;
   $sStyleHidden_control_diasmora = '';
   if (isset($this->nmgp_cmp_hidden['control_diasmora']) && $this->nmgp_cmp_hidden['control_diasmora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control_diasmora']);
       $sStyleHidden_control_diasmora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control_diasmora = 'display: none;';
   $sStyleReadInp_control_diasmora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control_diasmora']) && $this->nmgp_cmp_readonly['control_diasmora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control_diasmora']);
       $sStyleReadLab_control_diasmora = '';
       $sStyleReadInp_control_diasmora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control_diasmora']) && $this->nmgp_cmp_hidden['control_diasmora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="control_diasmora" value="<?php echo $this->form_encode_input($this->control_diasmora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->control_diasmora_1 = explode(";", trim($this->control_diasmora));
  } 
  else
  {
      if (empty($this->control_diasmora))
      {
          $this->control_diasmora_1= array(); 
          $this->control_diasmora= "NO";
      } 
      else
      {
          $this->control_diasmora_1= $this->control_diasmora; 
          $this->control_diasmora= ""; 
          foreach ($this->control_diasmora_1 as $cada_control_diasmora)
          {
             if (!empty($control_diasmora))
             {
                 $this->control_diasmora.= ";"; 
             } 
             $this->control_diasmora.= $cada_control_diasmora; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_control_diasmora_line" id="hidden_field_data_control_diasmora" style="<?php echo $sStyleHidden_control_diasmora; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_control_diasmora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_control_diasmora_label" style=""><span id="id_label_control_diasmora"><?php echo $this->nm_new_label['control_diasmora']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control_diasmora"]) &&  $this->nmgp_cmp_readonly["control_diasmora"] == "on") { 

$control_diasmora_look = "";
 if ($this->control_diasmora == "SI") { $control_diasmora_look .= "" ;} 
 if (empty($control_diasmora_look)) { $control_diasmora_look = $this->control_diasmora; }
?>
<input type="hidden" name="control_diasmora" value="<?php echo $this->form_encode_input($control_diasmora) . "\">" . $control_diasmora_look . ""; ?>
<?php } else { ?>

<?php

$control_diasmora_look = "";
 if ($this->control_diasmora == "SI") { $control_diasmora_look .= "" ;} 
 if (empty($control_diasmora_look)) { $control_diasmora_look = $this->control_diasmora; }
?>
<span id="id_read_on_control_diasmora" class="css_control_diasmora_line" style="<?php echo $sStyleReadLab_control_diasmora; ?>"><?php echo $this->form_format_readonly("control_diasmora", $this->form_encode_input($control_diasmora_look)); ?></span><span id="id_read_off_control_diasmora" class="css_read_off_control_diasmora css_control_diasmora_line" style="<?php echo $sStyleReadInp_control_diasmora; ?>"><?php echo "<div id=\"idAjaxCheckbox_control_diasmora\" style=\"display: inline-block\" class=\"css_control_diasmora_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_control_diasmora_line"><?php $tempOptionId = "id-opt-control_diasmora" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-control_diasmora sc-ui-checkbox-control_diasmora" name="control_diasmora[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_control_diasmora'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->control_diasmora_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_diasmora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_diasmora_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['control_costo']))
   {
       $this->nm_new_label['control_costo'] = "CONTROLAR VENTAS CON VALOR DEL COSTO?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control_costo = $this->control_costo;
   $sStyleHidden_control_costo = '';
   if (isset($this->nmgp_cmp_hidden['control_costo']) && $this->nmgp_cmp_hidden['control_costo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control_costo']);
       $sStyleHidden_control_costo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control_costo = 'display: none;';
   $sStyleReadInp_control_costo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control_costo']) && $this->nmgp_cmp_readonly['control_costo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control_costo']);
       $sStyleReadLab_control_costo = '';
       $sStyleReadInp_control_costo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control_costo']) && $this->nmgp_cmp_hidden['control_costo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="control_costo" value="<?php echo $this->form_encode_input($this->control_costo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->control_costo_1 = explode(";", trim($this->control_costo));
  } 
  else
  {
      if (empty($this->control_costo))
      {
          $this->control_costo_1= array(); 
          $this->control_costo= "NO";
      } 
      else
      {
          $this->control_costo_1= $this->control_costo; 
          $this->control_costo= ""; 
          foreach ($this->control_costo_1 as $cada_control_costo)
          {
             if (!empty($control_costo))
             {
                 $this->control_costo.= ";"; 
             } 
             $this->control_costo.= $cada_control_costo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_control_costo_line" id="hidden_field_data_control_costo" style="<?php echo $sStyleHidden_control_costo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_control_costo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_control_costo_label" style=""><span id="id_label_control_costo"><?php echo $this->nm_new_label['control_costo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control_costo"]) &&  $this->nmgp_cmp_readonly["control_costo"] == "on") { 

$control_costo_look = "";
 if ($this->control_costo == "SI") { $control_costo_look .= "" ;} 
 if (empty($control_costo_look)) { $control_costo_look = $this->control_costo; }
?>
<input type="hidden" name="control_costo" value="<?php echo $this->form_encode_input($control_costo) . "\">" . $control_costo_look . ""; ?>
<?php } else { ?>

<?php

$control_costo_look = "";
 if ($this->control_costo == "SI") { $control_costo_look .= "" ;} 
 if (empty($control_costo_look)) { $control_costo_look = $this->control_costo; }
?>
<span id="id_read_on_control_costo" class="css_control_costo_line" style="<?php echo $sStyleReadLab_control_costo; ?>"><?php echo $this->form_format_readonly("control_costo", $this->form_encode_input($control_costo_look)); ?></span><span id="id_read_off_control_costo" class="css_read_off_control_costo css_control_costo_line" style="<?php echo $sStyleReadInp_control_costo; ?>"><?php echo "<div id=\"idAjaxCheckbox_control_costo\" style=\"display: inline-block\" class=\"css_control_costo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_control_costo_line"><?php $tempOptionId = "id-opt-control_costo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-control_costo sc-ui-checkbox-control_costo" name="control_costo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_control_costo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->control_costo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_costo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_costo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modificainvpedido']))
   {
       $this->nm_new_label['modificainvpedido'] = "MODIFICAR INVENTARIO DESDE PEDIDO?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modificainvpedido = $this->modificainvpedido;
   $sStyleHidden_modificainvpedido = '';
   if (isset($this->nmgp_cmp_hidden['modificainvpedido']) && $this->nmgp_cmp_hidden['modificainvpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modificainvpedido']);
       $sStyleHidden_modificainvpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modificainvpedido = 'display: none;';
   $sStyleReadInp_modificainvpedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modificainvpedido']) && $this->nmgp_cmp_readonly['modificainvpedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modificainvpedido']);
       $sStyleReadLab_modificainvpedido = '';
       $sStyleReadInp_modificainvpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modificainvpedido']) && $this->nmgp_cmp_hidden['modificainvpedido'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modificainvpedido" value="<?php echo $this->form_encode_input($this->modificainvpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->modificainvpedido_1 = explode(";", trim($this->modificainvpedido));
  } 
  else
  {
      if (empty($this->modificainvpedido))
      {
          $this->modificainvpedido_1= array(); 
          $this->modificainvpedido= "NO";
      } 
      else
      {
          $this->modificainvpedido_1= $this->modificainvpedido; 
          $this->modificainvpedido= ""; 
          foreach ($this->modificainvpedido_1 as $cada_modificainvpedido)
          {
             if (!empty($modificainvpedido))
             {
                 $this->modificainvpedido.= ";"; 
             } 
             $this->modificainvpedido.= $cada_modificainvpedido; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_modificainvpedido_line" id="hidden_field_data_modificainvpedido" style="<?php echo $sStyleHidden_modificainvpedido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modificainvpedido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modificainvpedido_label" style=""><span id="id_label_modificainvpedido"><?php echo $this->nm_new_label['modificainvpedido']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modificainvpedido"]) &&  $this->nmgp_cmp_readonly["modificainvpedido"] == "on") { 

$modificainvpedido_look = "";
 if ($this->modificainvpedido == "SI") { $modificainvpedido_look .= "" ;} 
 if (empty($modificainvpedido_look)) { $modificainvpedido_look = $this->modificainvpedido; }
?>
<input type="hidden" name="modificainvpedido" value="<?php echo $this->form_encode_input($modificainvpedido) . "\">" . $modificainvpedido_look . ""; ?>
<?php } else { ?>

<?php

$modificainvpedido_look = "";
 if ($this->modificainvpedido == "SI") { $modificainvpedido_look .= "" ;} 
 if (empty($modificainvpedido_look)) { $modificainvpedido_look = $this->modificainvpedido; }
?>
<span id="id_read_on_modificainvpedido" class="css_modificainvpedido_line" style="<?php echo $sStyleReadLab_modificainvpedido; ?>"><?php echo $this->form_format_readonly("modificainvpedido", $this->form_encode_input($modificainvpedido_look)); ?></span><span id="id_read_off_modificainvpedido" class="css_read_off_modificainvpedido css_modificainvpedido_line" style="<?php echo $sStyleReadInp_modificainvpedido; ?>"><?php echo "<div id=\"idAjaxCheckbox_modificainvpedido\" style=\"display: inline-block\" class=\"css_modificainvpedido_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_modificainvpedido_line"><?php $tempOptionId = "id-opt-modificainvpedido" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-modificainvpedido sc-ui-checkbox-modificainvpedido" name="modificainvpedido[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_modificainvpedido'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->modificainvpedido_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modificainvpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modificainvpedido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipodoc_pordefecto_pos']))
   {
       $this->nm_new_label['tipodoc_pordefecto_pos'] = "DOCUMENTO POR DEFECTO EN POS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodoc_pordefecto_pos = $this->tipodoc_pordefecto_pos;
   $sStyleHidden_tipodoc_pordefecto_pos = '';
   if (isset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_hidden['tipodoc_pordefecto_pos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']);
       $sStyleHidden_tipodoc_pordefecto_pos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodoc_pordefecto_pos = 'display: none;';
   $sStyleReadInp_tipodoc_pordefecto_pos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_readonly['tipodoc_pordefecto_pos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodoc_pordefecto_pos']);
       $sStyleReadLab_tipodoc_pordefecto_pos = '';
       $sStyleReadInp_tipodoc_pordefecto_pos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_hidden['tipodoc_pordefecto_pos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipodoc_pordefecto_pos" value="<?php echo $this->form_encode_input($this->tipodoc_pordefecto_pos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipodoc_pordefecto_pos_line" id="hidden_field_data_tipodoc_pordefecto_pos" style="<?php echo $sStyleHidden_tipodoc_pordefecto_pos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodoc_pordefecto_pos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipodoc_pordefecto_pos_label" style=""><span id="id_label_tipodoc_pordefecto_pos"><?php echo $this->nm_new_label['tipodoc_pordefecto_pos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipodoc_pordefecto_pos"]) &&  $this->nmgp_cmp_readonly["tipodoc_pordefecto_pos"] == "on") { 

$tipodoc_pordefecto_pos_look = "";
 if ($this->tipodoc_pordefecto_pos == "FV") { $tipodoc_pordefecto_pos_look .= "FACTURA" ;} 
 if ($this->tipodoc_pordefecto_pos == "RS") { $tipodoc_pordefecto_pos_look .= "REMISIÓN" ;} 
 if (empty($tipodoc_pordefecto_pos_look)) { $tipodoc_pordefecto_pos_look = $this->tipodoc_pordefecto_pos; }
?>
<input type="hidden" name="tipodoc_pordefecto_pos" value="<?php echo $this->form_encode_input($tipodoc_pordefecto_pos) . "\">" . $tipodoc_pordefecto_pos_look . ""; ?>
<?php } else { ?>
<?php

$tipodoc_pordefecto_pos_look = "";
 if ($this->tipodoc_pordefecto_pos == "FV") { $tipodoc_pordefecto_pos_look .= "FACTURA" ;} 
 if ($this->tipodoc_pordefecto_pos == "RS") { $tipodoc_pordefecto_pos_look .= "REMISIÓN" ;} 
 if (empty($tipodoc_pordefecto_pos_look)) { $tipodoc_pordefecto_pos_look = $this->tipodoc_pordefecto_pos; }
?>
<span id="id_read_on_tipodoc_pordefecto_pos" class="css_tipodoc_pordefecto_pos_line"  style="<?php echo $sStyleReadLab_tipodoc_pordefecto_pos; ?>"><?php echo $this->form_format_readonly("tipodoc_pordefecto_pos", $this->form_encode_input($tipodoc_pordefecto_pos_look)); ?></span><span id="id_read_off_tipodoc_pordefecto_pos" class="css_read_off_tipodoc_pordefecto_pos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipodoc_pordefecto_pos; ?>">
 <span id="idAjaxSelect_tipodoc_pordefecto_pos" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipodoc_pordefecto_pos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodoc_pordefecto_pos" name="tipodoc_pordefecto_pos" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="FV" <?php  if ($this->tipodoc_pordefecto_pos == "FV") { echo " selected" ;} ?><?php  if (empty($this->tipodoc_pordefecto_pos)) { echo " selected" ;} ?>>FACTURA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_tipodoc_pordefecto_pos'][] = 'FV'; ?>
 <option  value="RS" <?php  if ($this->tipodoc_pordefecto_pos == "RS") { echo " selected" ;} ?>>REMISIÓN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_tipodoc_pordefecto_pos'][] = 'RS'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('tipodoc_pordefecto_pos')", "nm_mostra_mens('tipodoc_pordefecto_pos')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodoc_pordefecto_pos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodoc_pordefecto_pos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_xml_fe']))
   {
       $this->nm_new_label['ver_xml_fe'] = "Ver JSON FE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_xml_fe = $this->ver_xml_fe;
   $sStyleHidden_ver_xml_fe = '';
   if (isset($this->nmgp_cmp_hidden['ver_xml_fe']) && $this->nmgp_cmp_hidden['ver_xml_fe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_xml_fe']);
       $sStyleHidden_ver_xml_fe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_xml_fe = 'display: none;';
   $sStyleReadInp_ver_xml_fe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_xml_fe']) && $this->nmgp_cmp_readonly['ver_xml_fe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_xml_fe']);
       $sStyleReadLab_ver_xml_fe = '';
       $sStyleReadInp_ver_xml_fe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_xml_fe']) && $this->nmgp_cmp_hidden['ver_xml_fe'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_xml_fe" value="<?php echo $this->form_encode_input($this->ver_xml_fe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_xml_fe_1 = explode(";", trim($this->ver_xml_fe));
  } 
  else
  {
      if (empty($this->ver_xml_fe))
      {
          $this->ver_xml_fe_1= array(); 
          $this->ver_xml_fe= "NO";
      } 
      else
      {
          $this->ver_xml_fe_1= $this->ver_xml_fe; 
          $this->ver_xml_fe= ""; 
          foreach ($this->ver_xml_fe_1 as $cada_ver_xml_fe)
          {
             if (!empty($ver_xml_fe))
             {
                 $this->ver_xml_fe.= ";"; 
             } 
             $this->ver_xml_fe.= $cada_ver_xml_fe; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_xml_fe_line" id="hidden_field_data_ver_xml_fe" style="<?php echo $sStyleHidden_ver_xml_fe; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_xml_fe_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_xml_fe_label" style=""><span id="id_label_ver_xml_fe"><?php echo $this->nm_new_label['ver_xml_fe']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_xml_fe"]) &&  $this->nmgp_cmp_readonly["ver_xml_fe"] == "on") { 

$ver_xml_fe_look = "";
 if ($this->ver_xml_fe == "SI") { $ver_xml_fe_look .= "SI" ;} 
 if (empty($ver_xml_fe_look)) { $ver_xml_fe_look = $this->ver_xml_fe; }
?>
<input type="hidden" name="ver_xml_fe" value="<?php echo $this->form_encode_input($ver_xml_fe) . "\">" . $ver_xml_fe_look . ""; ?>
<?php } else { ?>

<?php

$ver_xml_fe_look = "";
 if ($this->ver_xml_fe == "SI") { $ver_xml_fe_look .= "SI" ;} 
 if (empty($ver_xml_fe_look)) { $ver_xml_fe_look = $this->ver_xml_fe; }
?>
<span id="id_read_on_ver_xml_fe" class="css_ver_xml_fe_line" style="<?php echo $sStyleReadLab_ver_xml_fe; ?>"><?php echo $this->form_format_readonly("ver_xml_fe", $this->form_encode_input($ver_xml_fe_look)); ?></span><span id="id_read_off_ver_xml_fe" class="css_read_off_ver_xml_fe css_ver_xml_fe_line" style="<?php echo $sStyleReadInp_ver_xml_fe; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_xml_fe\" style=\"display: inline-block\" class=\"css_ver_xml_fe_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_xml_fe_line"><?php $tempOptionId = "id-opt-ver_xml_fe" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_xml_fe sc-ui-checkbox-ver_xml_fe" name="ver_xml_fe[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_xml_fe'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_xml_fe_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_xml_fe')", "nm_mostra_mens('ver_xml_fe')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_xml_fe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_xml_fe_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['noborrar_tmp_enpos']))
   {
       $this->nm_new_label['noborrar_tmp_enpos'] = "NO BORRAR TEMPORALES EN VENTA RÁPIDA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noborrar_tmp_enpos = $this->noborrar_tmp_enpos;
   $sStyleHidden_noborrar_tmp_enpos = '';
   if (isset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']) && $this->nmgp_cmp_hidden['noborrar_tmp_enpos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']);
       $sStyleHidden_noborrar_tmp_enpos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noborrar_tmp_enpos = 'display: none;';
   $sStyleReadInp_noborrar_tmp_enpos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noborrar_tmp_enpos']) && $this->nmgp_cmp_readonly['noborrar_tmp_enpos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noborrar_tmp_enpos']);
       $sStyleReadLab_noborrar_tmp_enpos = '';
       $sStyleReadInp_noborrar_tmp_enpos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']) && $this->nmgp_cmp_hidden['noborrar_tmp_enpos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="noborrar_tmp_enpos" value="<?php echo $this->form_encode_input($this->noborrar_tmp_enpos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->noborrar_tmp_enpos_1 = explode(";", trim($this->noborrar_tmp_enpos));
  } 
  else
  {
      if (empty($this->noborrar_tmp_enpos))
      {
          $this->noborrar_tmp_enpos_1= array(); 
          $this->noborrar_tmp_enpos= "NO";
      } 
      else
      {
          $this->noborrar_tmp_enpos_1= $this->noborrar_tmp_enpos; 
          $this->noborrar_tmp_enpos= ""; 
          foreach ($this->noborrar_tmp_enpos_1 as $cada_noborrar_tmp_enpos)
          {
             if (!empty($noborrar_tmp_enpos))
             {
                 $this->noborrar_tmp_enpos.= ";"; 
             } 
             $this->noborrar_tmp_enpos.= $cada_noborrar_tmp_enpos; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_noborrar_tmp_enpos_line" id="hidden_field_data_noborrar_tmp_enpos" style="<?php echo $sStyleHidden_noborrar_tmp_enpos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noborrar_tmp_enpos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noborrar_tmp_enpos_label" style=""><span id="id_label_noborrar_tmp_enpos"><?php echo $this->nm_new_label['noborrar_tmp_enpos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noborrar_tmp_enpos"]) &&  $this->nmgp_cmp_readonly["noborrar_tmp_enpos"] == "on") { 

$noborrar_tmp_enpos_look = "";
 if ($this->noborrar_tmp_enpos == "SI") { $noborrar_tmp_enpos_look .= "SI" ;} 
 if (empty($noborrar_tmp_enpos_look)) { $noborrar_tmp_enpos_look = $this->noborrar_tmp_enpos; }
?>
<input type="hidden" name="noborrar_tmp_enpos" value="<?php echo $this->form_encode_input($noborrar_tmp_enpos) . "\">" . $noborrar_tmp_enpos_look . ""; ?>
<?php } else { ?>

<?php

$noborrar_tmp_enpos_look = "";
 if ($this->noborrar_tmp_enpos == "SI") { $noborrar_tmp_enpos_look .= "SI" ;} 
 if (empty($noborrar_tmp_enpos_look)) { $noborrar_tmp_enpos_look = $this->noborrar_tmp_enpos; }
?>
<span id="id_read_on_noborrar_tmp_enpos" class="css_noborrar_tmp_enpos_line" style="<?php echo $sStyleReadLab_noborrar_tmp_enpos; ?>"><?php echo $this->form_format_readonly("noborrar_tmp_enpos", $this->form_encode_input($noborrar_tmp_enpos_look)); ?></span><span id="id_read_off_noborrar_tmp_enpos" class="css_read_off_noborrar_tmp_enpos css_noborrar_tmp_enpos_line" style="<?php echo $sStyleReadInp_noborrar_tmp_enpos; ?>"><?php echo "<div id=\"idAjaxCheckbox_noborrar_tmp_enpos\" style=\"display: inline-block\" class=\"css_noborrar_tmp_enpos_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_noborrar_tmp_enpos_line"><?php $tempOptionId = "id-opt-noborrar_tmp_enpos" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-noborrar_tmp_enpos sc-ui-checkbox-noborrar_tmp_enpos" name="noborrar_tmp_enpos[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_noborrar_tmp_enpos'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->noborrar_tmp_enpos_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('noborrar_tmp_enpos')", "nm_mostra_mens('noborrar_tmp_enpos')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_noborrar_tmp_enpos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noborrar_tmp_enpos_text"></span></td></tr></table></td></tr></table> </TD>
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
       $this->nm_new_label['validar_correo_enlinea'] = "Validar Correo en Línea";
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
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_validar_correo_enlinea'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->validar_correo_enlinea_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('validar_correo_enlinea')", "nm_mostra_mens('validar_correo_enlinea')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_validar_correo_enlinea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_validar_correo_enlinea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['apertura_caja']))
   {
       $this->nm_new_label['apertura_caja'] = "MANEJAR APERTURA Y CIERRE DE CAJA?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $apertura_caja = $this->apertura_caja;
   $sStyleHidden_apertura_caja = '';
   if (isset($this->nmgp_cmp_hidden['apertura_caja']) && $this->nmgp_cmp_hidden['apertura_caja'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['apertura_caja']);
       $sStyleHidden_apertura_caja = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_apertura_caja = 'display: none;';
   $sStyleReadInp_apertura_caja = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['apertura_caja']) && $this->nmgp_cmp_readonly['apertura_caja'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['apertura_caja']);
       $sStyleReadLab_apertura_caja = '';
       $sStyleReadInp_apertura_caja = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['apertura_caja']) && $this->nmgp_cmp_hidden['apertura_caja'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="apertura_caja" value="<?php echo $this->form_encode_input($this->apertura_caja) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->apertura_caja_1 = explode(";", trim($this->apertura_caja));
  } 
  else
  {
      if (empty($this->apertura_caja))
      {
          $this->apertura_caja_1= array(); 
          $this->apertura_caja= "NO";
      } 
      else
      {
          $this->apertura_caja_1= $this->apertura_caja; 
          $this->apertura_caja= ""; 
          foreach ($this->apertura_caja_1 as $cada_apertura_caja)
          {
             if (!empty($apertura_caja))
             {
                 $this->apertura_caja.= ";"; 
             } 
             $this->apertura_caja.= $cada_apertura_caja; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_apertura_caja_line" id="hidden_field_data_apertura_caja" style="<?php echo $sStyleHidden_apertura_caja; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_apertura_caja_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_apertura_caja_label" style=""><span id="id_label_apertura_caja"><?php echo $this->nm_new_label['apertura_caja']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apertura_caja"]) &&  $this->nmgp_cmp_readonly["apertura_caja"] == "on") { 

$apertura_caja_look = "";
 if ($this->apertura_caja == "SI") { $apertura_caja_look .= "" ;} 
 if (empty($apertura_caja_look)) { $apertura_caja_look = $this->apertura_caja; }
?>
<input type="hidden" name="apertura_caja" value="<?php echo $this->form_encode_input($apertura_caja) . "\">" . $apertura_caja_look . ""; ?>
<?php } else { ?>

<?php

$apertura_caja_look = "";
 if ($this->apertura_caja == "SI") { $apertura_caja_look .= "" ;} 
 if (empty($apertura_caja_look)) { $apertura_caja_look = $this->apertura_caja; }
?>
<span id="id_read_on_apertura_caja" class="css_apertura_caja_line" style="<?php echo $sStyleReadLab_apertura_caja; ?>"><?php echo $this->form_format_readonly("apertura_caja", $this->form_encode_input($apertura_caja_look)); ?></span><span id="id_read_off_apertura_caja" class="css_read_off_apertura_caja css_apertura_caja_line" style="<?php echo $sStyleReadInp_apertura_caja; ?>"><?php echo "<div id=\"idAjaxCheckbox_apertura_caja\" style=\"display: inline-block\" class=\"css_apertura_caja_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_apertura_caja_line"><?php $tempOptionId = "id-opt-apertura_caja" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-apertura_caja sc-ui-checkbox-apertura_caja" name="apertura_caja[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_apertura_caja'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->apertura_caja_1))  { echo " checked" ;} ?> onClick="do_ajax_form_configuraciones_mob_event_apertura_caja_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apertura_caja_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apertura_caja_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['activar_console_log']))
   {
       $this->nm_new_label['activar_console_log'] = "ACTIVAR CONSOLE LOG?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $activar_console_log = $this->activar_console_log;
   $sStyleHidden_activar_console_log = '';
   if (isset($this->nmgp_cmp_hidden['activar_console_log']) && $this->nmgp_cmp_hidden['activar_console_log'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['activar_console_log']);
       $sStyleHidden_activar_console_log = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_activar_console_log = 'display: none;';
   $sStyleReadInp_activar_console_log = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['activar_console_log']) && $this->nmgp_cmp_readonly['activar_console_log'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['activar_console_log']);
       $sStyleReadLab_activar_console_log = '';
       $sStyleReadInp_activar_console_log = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['activar_console_log']) && $this->nmgp_cmp_hidden['activar_console_log'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activar_console_log" value="<?php echo $this->form_encode_input($this->activar_console_log) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->activar_console_log_1 = explode(";", trim($this->activar_console_log));
  } 
  else
  {
      if (empty($this->activar_console_log))
      {
          $this->activar_console_log_1= array(); 
          $this->activar_console_log= "NO";
      } 
      else
      {
          $this->activar_console_log_1= $this->activar_console_log; 
          $this->activar_console_log= ""; 
          foreach ($this->activar_console_log_1 as $cada_activar_console_log)
          {
             if (!empty($activar_console_log))
             {
                 $this->activar_console_log.= ";"; 
             } 
             $this->activar_console_log.= $cada_activar_console_log; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_activar_console_log_line" id="hidden_field_data_activar_console_log" style="<?php echo $sStyleHidden_activar_console_log; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activar_console_log_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_activar_console_log_label" style=""><span id="id_label_activar_console_log"><?php echo $this->nm_new_label['activar_console_log']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activar_console_log"]) &&  $this->nmgp_cmp_readonly["activar_console_log"] == "on") { 

$activar_console_log_look = "";
 if ($this->activar_console_log == "SI") { $activar_console_log_look .= "" ;} 
 if (empty($activar_console_log_look)) { $activar_console_log_look = $this->activar_console_log; }
?>
<input type="hidden" name="activar_console_log" value="<?php echo $this->form_encode_input($activar_console_log) . "\">" . $activar_console_log_look . ""; ?>
<?php } else { ?>

<?php

$activar_console_log_look = "";
 if ($this->activar_console_log == "SI") { $activar_console_log_look .= "" ;} 
 if (empty($activar_console_log_look)) { $activar_console_log_look = $this->activar_console_log; }
?>
<span id="id_read_on_activar_console_log" class="css_activar_console_log_line" style="<?php echo $sStyleReadLab_activar_console_log; ?>"><?php echo $this->form_format_readonly("activar_console_log", $this->form_encode_input($activar_console_log_look)); ?></span><span id="id_read_off_activar_console_log" class="css_read_off_activar_console_log css_activar_console_log_line" style="<?php echo $sStyleReadInp_activar_console_log; ?>"><?php echo "<div id=\"idAjaxCheckbox_activar_console_log\" style=\"display: inline-block\" class=\"css_activar_console_log_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_activar_console_log_line"><?php $tempOptionId = "id-opt-activar_console_log" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-activar_console_log sc-ui-checkbox-activar_console_log" name="activar_console_log[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_activar_console_log'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->activar_console_log_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('activar_console_log')", "nm_mostra_mens('activar_console_log')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activar_console_log_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activar_console_log_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['codproducto_en_facventa']))
   {
       $this->nm_new_label['codproducto_en_facventa'] = "MOSTRAR CODPRODUCTO EN POS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codproducto_en_facventa = $this->codproducto_en_facventa;
   $sStyleHidden_codproducto_en_facventa = '';
   if (isset($this->nmgp_cmp_hidden['codproducto_en_facventa']) && $this->nmgp_cmp_hidden['codproducto_en_facventa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codproducto_en_facventa']);
       $sStyleHidden_codproducto_en_facventa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codproducto_en_facventa = 'display: none;';
   $sStyleReadInp_codproducto_en_facventa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codproducto_en_facventa']) && $this->nmgp_cmp_readonly['codproducto_en_facventa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codproducto_en_facventa']);
       $sStyleReadLab_codproducto_en_facventa = '';
       $sStyleReadInp_codproducto_en_facventa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codproducto_en_facventa']) && $this->nmgp_cmp_hidden['codproducto_en_facventa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codproducto_en_facventa" value="<?php echo $this->form_encode_input($this->codproducto_en_facventa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->codproducto_en_facventa_1 = explode(";", trim($this->codproducto_en_facventa));
  } 
  else
  {
      if (empty($this->codproducto_en_facventa))
      {
          $this->codproducto_en_facventa_1= array(); 
          $this->codproducto_en_facventa= "NO";
      } 
      else
      {
          $this->codproducto_en_facventa_1= $this->codproducto_en_facventa; 
          $this->codproducto_en_facventa= ""; 
          foreach ($this->codproducto_en_facventa_1 as $cada_codproducto_en_facventa)
          {
             if (!empty($codproducto_en_facventa))
             {
                 $this->codproducto_en_facventa.= ";"; 
             } 
             $this->codproducto_en_facventa.= $cada_codproducto_en_facventa; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_codproducto_en_facventa_line" id="hidden_field_data_codproducto_en_facventa" style="<?php echo $sStyleHidden_codproducto_en_facventa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codproducto_en_facventa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codproducto_en_facventa_label" style=""><span id="id_label_codproducto_en_facventa"><?php echo $this->nm_new_label['codproducto_en_facventa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codproducto_en_facventa"]) &&  $this->nmgp_cmp_readonly["codproducto_en_facventa"] == "on") { 

$codproducto_en_facventa_look = "";
 if ($this->codproducto_en_facventa == "SI") { $codproducto_en_facventa_look .= "" ;} 
 if (empty($codproducto_en_facventa_look)) { $codproducto_en_facventa_look = $this->codproducto_en_facventa; }
?>
<input type="hidden" name="codproducto_en_facventa" value="<?php echo $this->form_encode_input($codproducto_en_facventa) . "\">" . $codproducto_en_facventa_look . ""; ?>
<?php } else { ?>

<?php

$codproducto_en_facventa_look = "";
 if ($this->codproducto_en_facventa == "SI") { $codproducto_en_facventa_look .= "" ;} 
 if (empty($codproducto_en_facventa_look)) { $codproducto_en_facventa_look = $this->codproducto_en_facventa; }
?>
<span id="id_read_on_codproducto_en_facventa" class="css_codproducto_en_facventa_line" style="<?php echo $sStyleReadLab_codproducto_en_facventa; ?>"><?php echo $this->form_format_readonly("codproducto_en_facventa", $this->form_encode_input($codproducto_en_facventa_look)); ?></span><span id="id_read_off_codproducto_en_facventa" class="css_read_off_codproducto_en_facventa css_codproducto_en_facventa_line" style="<?php echo $sStyleReadInp_codproducto_en_facventa; ?>"><?php echo "<div id=\"idAjaxCheckbox_codproducto_en_facventa\" style=\"display: inline-block\" class=\"css_codproducto_en_facventa_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_codproducto_en_facventa_line"><?php $tempOptionId = "id-opt-codproducto_en_facventa" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-codproducto_en_facventa sc-ui-checkbox-codproducto_en_facventa" name="codproducto_en_facventa[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_codproducto_en_facventa'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->codproducto_en_facventa_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('codproducto_en_facventa')", "nm_mostra_mens('codproducto_en_facventa')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codproducto_en_facventa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codproducto_en_facventa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_propina_sugerida']))
    {
        $this->nm_new_label['valor_propina_sugerida'] = "PORCENTAJE PROPINA SUGERIDA (Restaurantes)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_propina_sugerida = $this->valor_propina_sugerida;
   $sStyleHidden_valor_propina_sugerida = '';
   if (isset($this->nmgp_cmp_hidden['valor_propina_sugerida']) && $this->nmgp_cmp_hidden['valor_propina_sugerida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_propina_sugerida']);
       $sStyleHidden_valor_propina_sugerida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_propina_sugerida = 'display: none;';
   $sStyleReadInp_valor_propina_sugerida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_propina_sugerida']) && $this->nmgp_cmp_readonly['valor_propina_sugerida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_propina_sugerida']);
       $sStyleReadLab_valor_propina_sugerida = '';
       $sStyleReadInp_valor_propina_sugerida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_propina_sugerida']) && $this->nmgp_cmp_hidden['valor_propina_sugerida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_propina_sugerida_line" id="hidden_field_data_valor_propina_sugerida" style="<?php echo $sStyleHidden_valor_propina_sugerida; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_propina_sugerida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_propina_sugerida_label" style=""><span id="id_label_valor_propina_sugerida"><?php echo $this->nm_new_label['valor_propina_sugerida']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_propina_sugerida"]) &&  $this->nmgp_cmp_readonly["valor_propina_sugerida"] == "on") { 

 ?>
<input type="hidden" name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) . "\">" . $valor_propina_sugerida . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_propina_sugerida" class="sc-ui-readonly-valor_propina_sugerida css_valor_propina_sugerida_line" style="<?php echo $sStyleReadLab_valor_propina_sugerida; ?>"><?php echo $this->form_format_readonly("valor_propina_sugerida", $this->form_encode_input($this->valor_propina_sugerida)); ?></span><span id="id_read_off_valor_propina_sugerida" class="css_read_off_valor_propina_sugerida<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_propina_sugerida; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_propina_sugerida_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_propina_sugerida" type=text name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_propina_sugerida']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_propina_sugerida']['format_pos'] || 3 == $this->field_config['valor_propina_sugerida']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 15, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_propina_sugerida']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_propina_sugerida']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_propina_sugerida']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_propina_sugerida']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('valor_propina_sugerida')", "nm_mostra_mens('valor_propina_sugerida')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_propina_sugerida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_propina_sugerida_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['columna_imprimir_ticket']))
   {
       $this->nm_new_label['columna_imprimir_ticket'] = "Columna Imprimir Ticket";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columna_imprimir_ticket = $this->columna_imprimir_ticket;
   $sStyleHidden_columna_imprimir_ticket = '';
   if (isset($this->nmgp_cmp_hidden['columna_imprimir_ticket']) && $this->nmgp_cmp_hidden['columna_imprimir_ticket'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columna_imprimir_ticket']);
       $sStyleHidden_columna_imprimir_ticket = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columna_imprimir_ticket = 'display: none;';
   $sStyleReadInp_columna_imprimir_ticket = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columna_imprimir_ticket']) && $this->nmgp_cmp_readonly['columna_imprimir_ticket'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columna_imprimir_ticket']);
       $sStyleReadLab_columna_imprimir_ticket = '';
       $sStyleReadInp_columna_imprimir_ticket = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columna_imprimir_ticket']) && $this->nmgp_cmp_hidden['columna_imprimir_ticket'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="columna_imprimir_ticket" value="<?php echo $this->form_encode_input($this->columna_imprimir_ticket) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->columna_imprimir_ticket_1 = explode(";", trim($this->columna_imprimir_ticket));
  } 
  else
  {
      if (empty($this->columna_imprimir_ticket))
      {
          $this->columna_imprimir_ticket_1= array(); 
          $this->columna_imprimir_ticket= "NO";
      } 
      else
      {
          $this->columna_imprimir_ticket_1= $this->columna_imprimir_ticket; 
          $this->columna_imprimir_ticket= ""; 
          foreach ($this->columna_imprimir_ticket_1 as $cada_columna_imprimir_ticket)
          {
             if (!empty($columna_imprimir_ticket))
             {
                 $this->columna_imprimir_ticket.= ";"; 
             } 
             $this->columna_imprimir_ticket.= $cada_columna_imprimir_ticket; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_columna_imprimir_ticket_line" id="hidden_field_data_columna_imprimir_ticket" style="<?php echo $sStyleHidden_columna_imprimir_ticket; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columna_imprimir_ticket_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_columna_imprimir_ticket_label" style=""><span id="id_label_columna_imprimir_ticket"><?php echo $this->nm_new_label['columna_imprimir_ticket']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columna_imprimir_ticket"]) &&  $this->nmgp_cmp_readonly["columna_imprimir_ticket"] == "on") { 

$columna_imprimir_ticket_look = "";
 if ($this->columna_imprimir_ticket == "SI") { $columna_imprimir_ticket_look .= "SI" ;} 
 if (empty($columna_imprimir_ticket_look)) { $columna_imprimir_ticket_look = $this->columna_imprimir_ticket; }
?>
<input type="hidden" name="columna_imprimir_ticket" value="<?php echo $this->form_encode_input($columna_imprimir_ticket) . "\">" . $columna_imprimir_ticket_look . ""; ?>
<?php } else { ?>

<?php

$columna_imprimir_ticket_look = "";
 if ($this->columna_imprimir_ticket == "SI") { $columna_imprimir_ticket_look .= "SI" ;} 
 if (empty($columna_imprimir_ticket_look)) { $columna_imprimir_ticket_look = $this->columna_imprimir_ticket; }
?>
<span id="id_read_on_columna_imprimir_ticket" class="css_columna_imprimir_ticket_line" style="<?php echo $sStyleReadLab_columna_imprimir_ticket; ?>"><?php echo $this->form_format_readonly("columna_imprimir_ticket", $this->form_encode_input($columna_imprimir_ticket_look)); ?></span><span id="id_read_off_columna_imprimir_ticket" class="css_read_off_columna_imprimir_ticket css_columna_imprimir_ticket_line" style="<?php echo $sStyleReadInp_columna_imprimir_ticket; ?>"><?php echo "<div id=\"idAjaxCheckbox_columna_imprimir_ticket\" style=\"display: inline-block\" class=\"css_columna_imprimir_ticket_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_columna_imprimir_ticket_line"><?php $tempOptionId = "id-opt-columna_imprimir_ticket" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-columna_imprimir_ticket sc-ui-checkbox-columna_imprimir_ticket" name="columna_imprimir_ticket[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_columna_imprimir_ticket'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->columna_imprimir_ticket_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columna_imprimir_ticket_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columna_imprimir_ticket_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['columna_imprimir_a4']))
   {
       $this->nm_new_label['columna_imprimir_a4'] = "Columna Imprimir A4";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columna_imprimir_a4 = $this->columna_imprimir_a4;
   $sStyleHidden_columna_imprimir_a4 = '';
   if (isset($this->nmgp_cmp_hidden['columna_imprimir_a4']) && $this->nmgp_cmp_hidden['columna_imprimir_a4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columna_imprimir_a4']);
       $sStyleHidden_columna_imprimir_a4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columna_imprimir_a4 = 'display: none;';
   $sStyleReadInp_columna_imprimir_a4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columna_imprimir_a4']) && $this->nmgp_cmp_readonly['columna_imprimir_a4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columna_imprimir_a4']);
       $sStyleReadLab_columna_imprimir_a4 = '';
       $sStyleReadInp_columna_imprimir_a4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columna_imprimir_a4']) && $this->nmgp_cmp_hidden['columna_imprimir_a4'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="columna_imprimir_a4" value="<?php echo $this->form_encode_input($this->columna_imprimir_a4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->columna_imprimir_a4_1 = explode(";", trim($this->columna_imprimir_a4));
  } 
  else
  {
      if (empty($this->columna_imprimir_a4))
      {
          $this->columna_imprimir_a4_1= array(); 
          $this->columna_imprimir_a4= "NO";
      } 
      else
      {
          $this->columna_imprimir_a4_1= $this->columna_imprimir_a4; 
          $this->columna_imprimir_a4= ""; 
          foreach ($this->columna_imprimir_a4_1 as $cada_columna_imprimir_a4)
          {
             if (!empty($columna_imprimir_a4))
             {
                 $this->columna_imprimir_a4.= ";"; 
             } 
             $this->columna_imprimir_a4.= $cada_columna_imprimir_a4; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_columna_imprimir_a4_line" id="hidden_field_data_columna_imprimir_a4" style="<?php echo $sStyleHidden_columna_imprimir_a4; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columna_imprimir_a4_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_columna_imprimir_a4_label" style=""><span id="id_label_columna_imprimir_a4"><?php echo $this->nm_new_label['columna_imprimir_a4']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columna_imprimir_a4"]) &&  $this->nmgp_cmp_readonly["columna_imprimir_a4"] == "on") { 

$columna_imprimir_a4_look = "";
 if ($this->columna_imprimir_a4 == "SI") { $columna_imprimir_a4_look .= "SI" ;} 
 if (empty($columna_imprimir_a4_look)) { $columna_imprimir_a4_look = $this->columna_imprimir_a4; }
?>
<input type="hidden" name="columna_imprimir_a4" value="<?php echo $this->form_encode_input($columna_imprimir_a4) . "\">" . $columna_imprimir_a4_look . ""; ?>
<?php } else { ?>

<?php

$columna_imprimir_a4_look = "";
 if ($this->columna_imprimir_a4 == "SI") { $columna_imprimir_a4_look .= "SI" ;} 
 if (empty($columna_imprimir_a4_look)) { $columna_imprimir_a4_look = $this->columna_imprimir_a4; }
?>
<span id="id_read_on_columna_imprimir_a4" class="css_columna_imprimir_a4_line" style="<?php echo $sStyleReadLab_columna_imprimir_a4; ?>"><?php echo $this->form_format_readonly("columna_imprimir_a4", $this->form_encode_input($columna_imprimir_a4_look)); ?></span><span id="id_read_off_columna_imprimir_a4" class="css_read_off_columna_imprimir_a4 css_columna_imprimir_a4_line" style="<?php echo $sStyleReadInp_columna_imprimir_a4; ?>"><?php echo "<div id=\"idAjaxCheckbox_columna_imprimir_a4\" style=\"display: inline-block\" class=\"css_columna_imprimir_a4_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_columna_imprimir_a4_line"><?php $tempOptionId = "id-opt-columna_imprimir_a4" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-columna_imprimir_a4 sc-ui-checkbox-columna_imprimir_a4" name="columna_imprimir_a4[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_columna_imprimir_a4'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->columna_imprimir_a4_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columna_imprimir_a4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columna_imprimir_a4_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['columna_whatsapp']))
   {
       $this->nm_new_label['columna_whatsapp'] = "Columna Whatsapp";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columna_whatsapp = $this->columna_whatsapp;
   $sStyleHidden_columna_whatsapp = '';
   if (isset($this->nmgp_cmp_hidden['columna_whatsapp']) && $this->nmgp_cmp_hidden['columna_whatsapp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columna_whatsapp']);
       $sStyleHidden_columna_whatsapp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columna_whatsapp = 'display: none;';
   $sStyleReadInp_columna_whatsapp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columna_whatsapp']) && $this->nmgp_cmp_readonly['columna_whatsapp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columna_whatsapp']);
       $sStyleReadLab_columna_whatsapp = '';
       $sStyleReadInp_columna_whatsapp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columna_whatsapp']) && $this->nmgp_cmp_hidden['columna_whatsapp'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="columna_whatsapp" value="<?php echo $this->form_encode_input($this->columna_whatsapp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->columna_whatsapp_1 = explode(";", trim($this->columna_whatsapp));
  } 
  else
  {
      if (empty($this->columna_whatsapp))
      {
          $this->columna_whatsapp_1= array(); 
          $this->columna_whatsapp= "NO";
      } 
      else
      {
          $this->columna_whatsapp_1= $this->columna_whatsapp; 
          $this->columna_whatsapp= ""; 
          foreach ($this->columna_whatsapp_1 as $cada_columna_whatsapp)
          {
             if (!empty($columna_whatsapp))
             {
                 $this->columna_whatsapp.= ";"; 
             } 
             $this->columna_whatsapp.= $cada_columna_whatsapp; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_columna_whatsapp_line" id="hidden_field_data_columna_whatsapp" style="<?php echo $sStyleHidden_columna_whatsapp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columna_whatsapp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_columna_whatsapp_label" style=""><span id="id_label_columna_whatsapp"><?php echo $this->nm_new_label['columna_whatsapp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columna_whatsapp"]) &&  $this->nmgp_cmp_readonly["columna_whatsapp"] == "on") { 

$columna_whatsapp_look = "";
 if ($this->columna_whatsapp == "SI") { $columna_whatsapp_look .= "SI" ;} 
 if (empty($columna_whatsapp_look)) { $columna_whatsapp_look = $this->columna_whatsapp; }
?>
<input type="hidden" name="columna_whatsapp" value="<?php echo $this->form_encode_input($columna_whatsapp) . "\">" . $columna_whatsapp_look . ""; ?>
<?php } else { ?>

<?php

$columna_whatsapp_look = "";
 if ($this->columna_whatsapp == "SI") { $columna_whatsapp_look .= "SI" ;} 
 if (empty($columna_whatsapp_look)) { $columna_whatsapp_look = $this->columna_whatsapp; }
?>
<span id="id_read_on_columna_whatsapp" class="css_columna_whatsapp_line" style="<?php echo $sStyleReadLab_columna_whatsapp; ?>"><?php echo $this->form_format_readonly("columna_whatsapp", $this->form_encode_input($columna_whatsapp_look)); ?></span><span id="id_read_off_columna_whatsapp" class="css_read_off_columna_whatsapp css_columna_whatsapp_line" style="<?php echo $sStyleReadInp_columna_whatsapp; ?>"><?php echo "<div id=\"idAjaxCheckbox_columna_whatsapp\" style=\"display: inline-block\" class=\"css_columna_whatsapp_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_columna_whatsapp_line"><?php $tempOptionId = "id-opt-columna_whatsapp" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-columna_whatsapp sc-ui-checkbox-columna_whatsapp" name="columna_whatsapp[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_columna_whatsapp'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->columna_whatsapp_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columna_whatsapp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columna_whatsapp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['columna_npedido']))
   {
       $this->nm_new_label['columna_npedido'] = "Columna No Pedido";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columna_npedido = $this->columna_npedido;
   $sStyleHidden_columna_npedido = '';
   if (isset($this->nmgp_cmp_hidden['columna_npedido']) && $this->nmgp_cmp_hidden['columna_npedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columna_npedido']);
       $sStyleHidden_columna_npedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columna_npedido = 'display: none;';
   $sStyleReadInp_columna_npedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columna_npedido']) && $this->nmgp_cmp_readonly['columna_npedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columna_npedido']);
       $sStyleReadLab_columna_npedido = '';
       $sStyleReadInp_columna_npedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columna_npedido']) && $this->nmgp_cmp_hidden['columna_npedido'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="columna_npedido" value="<?php echo $this->form_encode_input($this->columna_npedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->columna_npedido_1 = explode(";", trim($this->columna_npedido));
  } 
  else
  {
      if (empty($this->columna_npedido))
      {
          $this->columna_npedido_1= array(); 
          $this->columna_npedido= "NO";
      } 
      else
      {
          $this->columna_npedido_1= $this->columna_npedido; 
          $this->columna_npedido= ""; 
          foreach ($this->columna_npedido_1 as $cada_columna_npedido)
          {
             if (!empty($columna_npedido))
             {
                 $this->columna_npedido.= ";"; 
             } 
             $this->columna_npedido.= $cada_columna_npedido; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_columna_npedido_line" id="hidden_field_data_columna_npedido" style="<?php echo $sStyleHidden_columna_npedido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columna_npedido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_columna_npedido_label" style=""><span id="id_label_columna_npedido"><?php echo $this->nm_new_label['columna_npedido']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columna_npedido"]) &&  $this->nmgp_cmp_readonly["columna_npedido"] == "on") { 

$columna_npedido_look = "";
 if ($this->columna_npedido == "SI") { $columna_npedido_look .= "SI" ;} 
 if (empty($columna_npedido_look)) { $columna_npedido_look = $this->columna_npedido; }
?>
<input type="hidden" name="columna_npedido" value="<?php echo $this->form_encode_input($columna_npedido) . "\">" . $columna_npedido_look . ""; ?>
<?php } else { ?>

<?php

$columna_npedido_look = "";
 if ($this->columna_npedido == "SI") { $columna_npedido_look .= "SI" ;} 
 if (empty($columna_npedido_look)) { $columna_npedido_look = $this->columna_npedido; }
?>
<span id="id_read_on_columna_npedido" class="css_columna_npedido_line" style="<?php echo $sStyleReadLab_columna_npedido; ?>"><?php echo $this->form_format_readonly("columna_npedido", $this->form_encode_input($columna_npedido_look)); ?></span><span id="id_read_off_columna_npedido" class="css_read_off_columna_npedido css_columna_npedido_line" style="<?php echo $sStyleReadInp_columna_npedido; ?>"><?php echo "<div id=\"idAjaxCheckbox_columna_npedido\" style=\"display: inline-block\" class=\"css_columna_npedido_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_columna_npedido_line"><?php $tempOptionId = "id-opt-columna_npedido" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-columna_npedido sc-ui-checkbox-columna_npedido" name="columna_npedido[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_columna_npedido'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->columna_npedido_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columna_npedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columna_npedido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['columna_reg_pdf_propio']))
   {
       $this->nm_new_label['columna_reg_pdf_propio'] = "Columna Regenerar PDF";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columna_reg_pdf_propio = $this->columna_reg_pdf_propio;
   $sStyleHidden_columna_reg_pdf_propio = '';
   if (isset($this->nmgp_cmp_hidden['columna_reg_pdf_propio']) && $this->nmgp_cmp_hidden['columna_reg_pdf_propio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columna_reg_pdf_propio']);
       $sStyleHidden_columna_reg_pdf_propio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columna_reg_pdf_propio = 'display: none;';
   $sStyleReadInp_columna_reg_pdf_propio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columna_reg_pdf_propio']) && $this->nmgp_cmp_readonly['columna_reg_pdf_propio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columna_reg_pdf_propio']);
       $sStyleReadLab_columna_reg_pdf_propio = '';
       $sStyleReadInp_columna_reg_pdf_propio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columna_reg_pdf_propio']) && $this->nmgp_cmp_hidden['columna_reg_pdf_propio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="columna_reg_pdf_propio" value="<?php echo $this->form_encode_input($this->columna_reg_pdf_propio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->columna_reg_pdf_propio_1 = explode(";", trim($this->columna_reg_pdf_propio));
  } 
  else
  {
      if (empty($this->columna_reg_pdf_propio))
      {
          $this->columna_reg_pdf_propio_1= array(); 
          $this->columna_reg_pdf_propio= "NO";
      } 
      else
      {
          $this->columna_reg_pdf_propio_1= $this->columna_reg_pdf_propio; 
          $this->columna_reg_pdf_propio= ""; 
          foreach ($this->columna_reg_pdf_propio_1 as $cada_columna_reg_pdf_propio)
          {
             if (!empty($columna_reg_pdf_propio))
             {
                 $this->columna_reg_pdf_propio.= ";"; 
             } 
             $this->columna_reg_pdf_propio.= $cada_columna_reg_pdf_propio; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_columna_reg_pdf_propio_line" id="hidden_field_data_columna_reg_pdf_propio" style="<?php echo $sStyleHidden_columna_reg_pdf_propio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columna_reg_pdf_propio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_columna_reg_pdf_propio_label" style=""><span id="id_label_columna_reg_pdf_propio"><?php echo $this->nm_new_label['columna_reg_pdf_propio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columna_reg_pdf_propio"]) &&  $this->nmgp_cmp_readonly["columna_reg_pdf_propio"] == "on") { 

$columna_reg_pdf_propio_look = "";
 if ($this->columna_reg_pdf_propio == "SI") { $columna_reg_pdf_propio_look .= "SI" ;} 
 if (empty($columna_reg_pdf_propio_look)) { $columna_reg_pdf_propio_look = $this->columna_reg_pdf_propio; }
?>
<input type="hidden" name="columna_reg_pdf_propio" value="<?php echo $this->form_encode_input($columna_reg_pdf_propio) . "\">" . $columna_reg_pdf_propio_look . ""; ?>
<?php } else { ?>

<?php

$columna_reg_pdf_propio_look = "";
 if ($this->columna_reg_pdf_propio == "SI") { $columna_reg_pdf_propio_look .= "SI" ;} 
 if (empty($columna_reg_pdf_propio_look)) { $columna_reg_pdf_propio_look = $this->columna_reg_pdf_propio; }
?>
<span id="id_read_on_columna_reg_pdf_propio" class="css_columna_reg_pdf_propio_line" style="<?php echo $sStyleReadLab_columna_reg_pdf_propio; ?>"><?php echo $this->form_format_readonly("columna_reg_pdf_propio", $this->form_encode_input($columna_reg_pdf_propio_look)); ?></span><span id="id_read_off_columna_reg_pdf_propio" class="css_read_off_columna_reg_pdf_propio css_columna_reg_pdf_propio_line" style="<?php echo $sStyleReadInp_columna_reg_pdf_propio; ?>"><?php echo "<div id=\"idAjaxCheckbox_columna_reg_pdf_propio\" style=\"display: inline-block\" class=\"css_columna_reg_pdf_propio_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_columna_reg_pdf_propio_line"><?php $tempOptionId = "id-opt-columna_reg_pdf_propio" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-columna_reg_pdf_propio sc-ui-checkbox-columna_reg_pdf_propio" name="columna_reg_pdf_propio[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_columna_reg_pdf_propio'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->columna_reg_pdf_propio_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('columna_reg_pdf_propio')", "nm_mostra_mens('columna_reg_pdf_propio')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columna_reg_pdf_propio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columna_reg_pdf_propio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
