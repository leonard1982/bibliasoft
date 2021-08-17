<div id="form_configuraciones_mob_form4" style='<?php echo ($this->tabCssClass["form_configuraciones_mob_form4"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_pedidos']))
   {
       $this->nm_new_label['nube_pedidos'] = "Pedidos en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_pedidos = $this->nube_pedidos;
   $sStyleHidden_nube_pedidos = '';
   if (isset($this->nmgp_cmp_hidden['nube_pedidos']) && $this->nmgp_cmp_hidden['nube_pedidos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_pedidos']);
       $sStyleHidden_nube_pedidos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_pedidos = 'display: none;';
   $sStyleReadInp_nube_pedidos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_pedidos']) && $this->nmgp_cmp_readonly['nube_pedidos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_pedidos']);
       $sStyleReadLab_nube_pedidos = '';
       $sStyleReadInp_nube_pedidos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_pedidos']) && $this->nmgp_cmp_hidden['nube_pedidos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_pedidos" value="<?php echo $this->form_encode_input($this->nube_pedidos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_pedidos_1 = explode(";", trim($this->nube_pedidos));
  } 
  else
  {
      if (empty($this->nube_pedidos))
      {
          $this->nube_pedidos_1= array(); 
          $this->nube_pedidos= "NO";
      } 
      else
      {
          $this->nube_pedidos_1= $this->nube_pedidos; 
          $this->nube_pedidos= ""; 
          foreach ($this->nube_pedidos_1 as $cada_nube_pedidos)
          {
             if (!empty($nube_pedidos))
             {
                 $this->nube_pedidos.= ";"; 
             } 
             $this->nube_pedidos.= $cada_nube_pedidos; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_pedidos_line" id="hidden_field_data_nube_pedidos" style="<?php echo $sStyleHidden_nube_pedidos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_pedidos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_pedidos_label" style=""><span id="id_label_nube_pedidos"><?php echo $this->nm_new_label['nube_pedidos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_pedidos"]) &&  $this->nmgp_cmp_readonly["nube_pedidos"] == "on") { 

$nube_pedidos_look = "";
 if ($this->nube_pedidos == "SI") { $nube_pedidos_look .= "" ;} 
 if (empty($nube_pedidos_look)) { $nube_pedidos_look = $this->nube_pedidos; }
?>
<input type="hidden" name="nube_pedidos" value="<?php echo $this->form_encode_input($nube_pedidos) . "\">" . $nube_pedidos_look . ""; ?>
<?php } else { ?>

<?php

$nube_pedidos_look = "";
 if ($this->nube_pedidos == "SI") { $nube_pedidos_look .= "" ;} 
 if (empty($nube_pedidos_look)) { $nube_pedidos_look = $this->nube_pedidos; }
?>
<span id="id_read_on_nube_pedidos" class="css_nube_pedidos_line" style="<?php echo $sStyleReadLab_nube_pedidos; ?>"><?php echo $this->form_format_readonly("nube_pedidos", $this->form_encode_input($nube_pedidos_look)); ?></span><span id="id_read_off_nube_pedidos" class="css_read_off_nube_pedidos css_nube_pedidos_line" style="<?php echo $sStyleReadInp_nube_pedidos; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_pedidos\" style=\"display: inline-block\" class=\"css_nube_pedidos_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_pedidos_line"><?php $tempOptionId = "id-opt-nube_pedidos" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_pedidos sc-ui-checkbox-nube_pedidos" name="nube_pedidos[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_pedidos'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_pedidos_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_pedidos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_pedidos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_inventario']))
   {
       $this->nm_new_label['nube_inventario'] = "Inventario en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_inventario = $this->nube_inventario;
   $sStyleHidden_nube_inventario = '';
   if (isset($this->nmgp_cmp_hidden['nube_inventario']) && $this->nmgp_cmp_hidden['nube_inventario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_inventario']);
       $sStyleHidden_nube_inventario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_inventario = 'display: none;';
   $sStyleReadInp_nube_inventario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_inventario']) && $this->nmgp_cmp_readonly['nube_inventario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_inventario']);
       $sStyleReadLab_nube_inventario = '';
       $sStyleReadInp_nube_inventario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_inventario']) && $this->nmgp_cmp_hidden['nube_inventario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_inventario" value="<?php echo $this->form_encode_input($this->nube_inventario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_inventario_1 = explode(";", trim($this->nube_inventario));
  } 
  else
  {
      if (empty($this->nube_inventario))
      {
          $this->nube_inventario_1= array(); 
          $this->nube_inventario= "NO";
      } 
      else
      {
          $this->nube_inventario_1= $this->nube_inventario; 
          $this->nube_inventario= ""; 
          foreach ($this->nube_inventario_1 as $cada_nube_inventario)
          {
             if (!empty($nube_inventario))
             {
                 $this->nube_inventario.= ";"; 
             } 
             $this->nube_inventario.= $cada_nube_inventario; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_inventario_line" id="hidden_field_data_nube_inventario" style="<?php echo $sStyleHidden_nube_inventario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_inventario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_inventario_label" style=""><span id="id_label_nube_inventario"><?php echo $this->nm_new_label['nube_inventario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_inventario"]) &&  $this->nmgp_cmp_readonly["nube_inventario"] == "on") { 

$nube_inventario_look = "";
 if ($this->nube_inventario == "SI") { $nube_inventario_look .= "" ;} 
 if (empty($nube_inventario_look)) { $nube_inventario_look = $this->nube_inventario; }
?>
<input type="hidden" name="nube_inventario" value="<?php echo $this->form_encode_input($nube_inventario) . "\">" . $nube_inventario_look . ""; ?>
<?php } else { ?>

<?php

$nube_inventario_look = "";
 if ($this->nube_inventario == "SI") { $nube_inventario_look .= "" ;} 
 if (empty($nube_inventario_look)) { $nube_inventario_look = $this->nube_inventario; }
?>
<span id="id_read_on_nube_inventario" class="css_nube_inventario_line" style="<?php echo $sStyleReadLab_nube_inventario; ?>"><?php echo $this->form_format_readonly("nube_inventario", $this->form_encode_input($nube_inventario_look)); ?></span><span id="id_read_off_nube_inventario" class="css_read_off_nube_inventario css_nube_inventario_line" style="<?php echo $sStyleReadInp_nube_inventario; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_inventario\" style=\"display: inline-block\" class=\"css_nube_inventario_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_inventario_line"><?php $tempOptionId = "id-opt-nube_inventario" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_inventario sc-ui-checkbox-nube_inventario" name="nube_inventario[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_inventario'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_inventario_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_inventario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_inventario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_cartera']))
   {
       $this->nm_new_label['nube_cartera'] = "Cartera en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_cartera = $this->nube_cartera;
   $sStyleHidden_nube_cartera = '';
   if (isset($this->nmgp_cmp_hidden['nube_cartera']) && $this->nmgp_cmp_hidden['nube_cartera'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_cartera']);
       $sStyleHidden_nube_cartera = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_cartera = 'display: none;';
   $sStyleReadInp_nube_cartera = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_cartera']) && $this->nmgp_cmp_readonly['nube_cartera'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_cartera']);
       $sStyleReadLab_nube_cartera = '';
       $sStyleReadInp_nube_cartera = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_cartera']) && $this->nmgp_cmp_hidden['nube_cartera'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_cartera" value="<?php echo $this->form_encode_input($this->nube_cartera) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_cartera_1 = explode(";", trim($this->nube_cartera));
  } 
  else
  {
      if (empty($this->nube_cartera))
      {
          $this->nube_cartera_1= array(); 
          $this->nube_cartera= "NO";
      } 
      else
      {
          $this->nube_cartera_1= $this->nube_cartera; 
          $this->nube_cartera= ""; 
          foreach ($this->nube_cartera_1 as $cada_nube_cartera)
          {
             if (!empty($nube_cartera))
             {
                 $this->nube_cartera.= ";"; 
             } 
             $this->nube_cartera.= $cada_nube_cartera; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_cartera_line" id="hidden_field_data_nube_cartera" style="<?php echo $sStyleHidden_nube_cartera; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_cartera_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_cartera_label" style=""><span id="id_label_nube_cartera"><?php echo $this->nm_new_label['nube_cartera']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_cartera"]) &&  $this->nmgp_cmp_readonly["nube_cartera"] == "on") { 

$nube_cartera_look = "";
 if ($this->nube_cartera == "SI") { $nube_cartera_look .= "" ;} 
 if (empty($nube_cartera_look)) { $nube_cartera_look = $this->nube_cartera; }
?>
<input type="hidden" name="nube_cartera" value="<?php echo $this->form_encode_input($nube_cartera) . "\">" . $nube_cartera_look . ""; ?>
<?php } else { ?>

<?php

$nube_cartera_look = "";
 if ($this->nube_cartera == "SI") { $nube_cartera_look .= "" ;} 
 if (empty($nube_cartera_look)) { $nube_cartera_look = $this->nube_cartera; }
?>
<span id="id_read_on_nube_cartera" class="css_nube_cartera_line" style="<?php echo $sStyleReadLab_nube_cartera; ?>"><?php echo $this->form_format_readonly("nube_cartera", $this->form_encode_input($nube_cartera_look)); ?></span><span id="id_read_off_nube_cartera" class="css_read_off_nube_cartera css_nube_cartera_line" style="<?php echo $sStyleReadInp_nube_cartera; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_cartera\" style=\"display: inline-block\" class=\"css_nube_cartera_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_cartera_line"><?php $tempOptionId = "id-opt-nube_cartera" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_cartera sc-ui-checkbox-nube_cartera" name="nube_cartera[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_cartera'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_cartera_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_cartera_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_cartera_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_tesoreria']))
   {
       $this->nm_new_label['nube_tesoreria'] = "Tesorería en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_tesoreria = $this->nube_tesoreria;
   $sStyleHidden_nube_tesoreria = '';
   if (isset($this->nmgp_cmp_hidden['nube_tesoreria']) && $this->nmgp_cmp_hidden['nube_tesoreria'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_tesoreria']);
       $sStyleHidden_nube_tesoreria = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_tesoreria = 'display: none;';
   $sStyleReadInp_nube_tesoreria = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_tesoreria']) && $this->nmgp_cmp_readonly['nube_tesoreria'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_tesoreria']);
       $sStyleReadLab_nube_tesoreria = '';
       $sStyleReadInp_nube_tesoreria = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_tesoreria']) && $this->nmgp_cmp_hidden['nube_tesoreria'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_tesoreria" value="<?php echo $this->form_encode_input($this->nube_tesoreria) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_tesoreria_1 = explode(";", trim($this->nube_tesoreria));
  } 
  else
  {
      if (empty($this->nube_tesoreria))
      {
          $this->nube_tesoreria_1= array(); 
          $this->nube_tesoreria= "NO";
      } 
      else
      {
          $this->nube_tesoreria_1= $this->nube_tesoreria; 
          $this->nube_tesoreria= ""; 
          foreach ($this->nube_tesoreria_1 as $cada_nube_tesoreria)
          {
             if (!empty($nube_tesoreria))
             {
                 $this->nube_tesoreria.= ";"; 
             } 
             $this->nube_tesoreria.= $cada_nube_tesoreria; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_tesoreria_line" id="hidden_field_data_nube_tesoreria" style="<?php echo $sStyleHidden_nube_tesoreria; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_tesoreria_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_tesoreria_label" style=""><span id="id_label_nube_tesoreria"><?php echo $this->nm_new_label['nube_tesoreria']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_tesoreria"]) &&  $this->nmgp_cmp_readonly["nube_tesoreria"] == "on") { 

$nube_tesoreria_look = "";
 if ($this->nube_tesoreria == "SI") { $nube_tesoreria_look .= "" ;} 
 if (empty($nube_tesoreria_look)) { $nube_tesoreria_look = $this->nube_tesoreria; }
?>
<input type="hidden" name="nube_tesoreria" value="<?php echo $this->form_encode_input($nube_tesoreria) . "\">" . $nube_tesoreria_look . ""; ?>
<?php } else { ?>

<?php

$nube_tesoreria_look = "";
 if ($this->nube_tesoreria == "SI") { $nube_tesoreria_look .= "" ;} 
 if (empty($nube_tesoreria_look)) { $nube_tesoreria_look = $this->nube_tesoreria; }
?>
<span id="id_read_on_nube_tesoreria" class="css_nube_tesoreria_line" style="<?php echo $sStyleReadLab_nube_tesoreria; ?>"><?php echo $this->form_format_readonly("nube_tesoreria", $this->form_encode_input($nube_tesoreria_look)); ?></span><span id="id_read_off_nube_tesoreria" class="css_read_off_nube_tesoreria css_nube_tesoreria_line" style="<?php echo $sStyleReadInp_nube_tesoreria; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_tesoreria\" style=\"display: inline-block\" class=\"css_nube_tesoreria_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_tesoreria_line"><?php $tempOptionId = "id-opt-nube_tesoreria" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_tesoreria sc-ui-checkbox-nube_tesoreria" name="nube_tesoreria[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_tesoreria'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_tesoreria_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_tesoreria_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_tesoreria_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_agenda']))
   {
       $this->nm_new_label['nube_agenda'] = "Agenda en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_agenda = $this->nube_agenda;
   $sStyleHidden_nube_agenda = '';
   if (isset($this->nmgp_cmp_hidden['nube_agenda']) && $this->nmgp_cmp_hidden['nube_agenda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_agenda']);
       $sStyleHidden_nube_agenda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_agenda = 'display: none;';
   $sStyleReadInp_nube_agenda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_agenda']) && $this->nmgp_cmp_readonly['nube_agenda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_agenda']);
       $sStyleReadLab_nube_agenda = '';
       $sStyleReadInp_nube_agenda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_agenda']) && $this->nmgp_cmp_hidden['nube_agenda'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_agenda" value="<?php echo $this->form_encode_input($this->nube_agenda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_agenda_1 = explode(";", trim($this->nube_agenda));
  } 
  else
  {
      if (empty($this->nube_agenda))
      {
          $this->nube_agenda_1= array(); 
          $this->nube_agenda= "NO";
      } 
      else
      {
          $this->nube_agenda_1= $this->nube_agenda; 
          $this->nube_agenda= ""; 
          foreach ($this->nube_agenda_1 as $cada_nube_agenda)
          {
             if (!empty($nube_agenda))
             {
                 $this->nube_agenda.= ";"; 
             } 
             $this->nube_agenda.= $cada_nube_agenda; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_agenda_line" id="hidden_field_data_nube_agenda" style="<?php echo $sStyleHidden_nube_agenda; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_agenda_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_agenda_label" style=""><span id="id_label_nube_agenda"><?php echo $this->nm_new_label['nube_agenda']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_agenda"]) &&  $this->nmgp_cmp_readonly["nube_agenda"] == "on") { 

$nube_agenda_look = "";
 if ($this->nube_agenda == "SI") { $nube_agenda_look .= "" ;} 
 if (empty($nube_agenda_look)) { $nube_agenda_look = $this->nube_agenda; }
?>
<input type="hidden" name="nube_agenda" value="<?php echo $this->form_encode_input($nube_agenda) . "\">" . $nube_agenda_look . ""; ?>
<?php } else { ?>

<?php

$nube_agenda_look = "";
 if ($this->nube_agenda == "SI") { $nube_agenda_look .= "" ;} 
 if (empty($nube_agenda_look)) { $nube_agenda_look = $this->nube_agenda; }
?>
<span id="id_read_on_nube_agenda" class="css_nube_agenda_line" style="<?php echo $sStyleReadLab_nube_agenda; ?>"><?php echo $this->form_format_readonly("nube_agenda", $this->form_encode_input($nube_agenda_look)); ?></span><span id="id_read_off_nube_agenda" class="css_read_off_nube_agenda css_nube_agenda_line" style="<?php echo $sStyleReadInp_nube_agenda; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_agenda\" style=\"display: inline-block\" class=\"css_nube_agenda_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_agenda_line"><?php $tempOptionId = "id-opt-nube_agenda" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_agenda sc-ui-checkbox-nube_agenda" name="nube_agenda[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_agenda'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_agenda_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_agenda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_agenda_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nube_compras']))
   {
       $this->nm_new_label['nube_compras'] = "Compras en la Nube";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_compras = $this->nube_compras;
   $sStyleHidden_nube_compras = '';
   if (isset($this->nmgp_cmp_hidden['nube_compras']) && $this->nmgp_cmp_hidden['nube_compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_compras']);
       $sStyleHidden_nube_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_compras = 'display: none;';
   $sStyleReadInp_nube_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_compras']) && $this->nmgp_cmp_readonly['nube_compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_compras']);
       $sStyleReadLab_nube_compras = '';
       $sStyleReadInp_nube_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_compras']) && $this->nmgp_cmp_hidden['nube_compras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nube_compras" value="<?php echo $this->form_encode_input($this->nube_compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->nube_compras_1 = explode(";", trim($this->nube_compras));
  } 
  else
  {
      if (empty($this->nube_compras))
      {
          $this->nube_compras_1= array(); 
          $this->nube_compras= "NO";
      } 
      else
      {
          $this->nube_compras_1= $this->nube_compras; 
          $this->nube_compras= ""; 
          foreach ($this->nube_compras_1 as $cada_nube_compras)
          {
             if (!empty($nube_compras))
             {
                 $this->nube_compras.= ";"; 
             } 
             $this->nube_compras.= $cada_nube_compras; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_nube_compras_line" id="hidden_field_data_nube_compras" style="<?php echo $sStyleHidden_nube_compras; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_compras_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_compras_label" style=""><span id="id_label_nube_compras"><?php echo $this->nm_new_label['nube_compras']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_compras"]) &&  $this->nmgp_cmp_readonly["nube_compras"] == "on") { 

$nube_compras_look = "";
 if ($this->nube_compras == "SI") { $nube_compras_look .= "" ;} 
 if (empty($nube_compras_look)) { $nube_compras_look = $this->nube_compras; }
?>
<input type="hidden" name="nube_compras" value="<?php echo $this->form_encode_input($nube_compras) . "\">" . $nube_compras_look . ""; ?>
<?php } else { ?>

<?php

$nube_compras_look = "";
 if ($this->nube_compras == "SI") { $nube_compras_look .= "" ;} 
 if (empty($nube_compras_look)) { $nube_compras_look = $this->nube_compras; }
?>
<span id="id_read_on_nube_compras" class="css_nube_compras_line" style="<?php echo $sStyleReadLab_nube_compras; ?>"><?php echo $this->form_format_readonly("nube_compras", $this->form_encode_input($nube_compras_look)); ?></span><span id="id_read_off_nube_compras" class="css_read_off_nube_compras css_nube_compras_line" style="<?php echo $sStyleReadInp_nube_compras; ?>"><?php echo "<div id=\"idAjaxCheckbox_nube_compras\" style=\"display: inline-block\" class=\"css_nube_compras_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_nube_compras_line"><?php $tempOptionId = "id-opt-nube_compras" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-nube_compras sc-ui-checkbox-nube_compras" name="nube_compras[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_nube_compras'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->nube_compras_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_compras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_compras_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nube_codigo']))
    {
        $this->nm_new_label['nube_codigo'] = "Código Empresa Nube";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nube_codigo = $this->nube_codigo;
   $sStyleHidden_nube_codigo = '';
   if (isset($this->nmgp_cmp_hidden['nube_codigo']) && $this->nmgp_cmp_hidden['nube_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nube_codigo']);
       $sStyleHidden_nube_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nube_codigo = 'display: none;';
   $sStyleReadInp_nube_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nube_codigo']) && $this->nmgp_cmp_readonly['nube_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nube_codigo']);
       $sStyleReadLab_nube_codigo = '';
       $sStyleReadInp_nube_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nube_codigo']) && $this->nmgp_cmp_hidden['nube_codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nube_codigo" value="<?php echo $this->form_encode_input($nube_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nube_codigo_line" id="hidden_field_data_nube_codigo" style="<?php echo $sStyleHidden_nube_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nube_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nube_codigo_label" style=""><span id="id_label_nube_codigo"><?php echo $this->nm_new_label['nube_codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nube_codigo"]) &&  $this->nmgp_cmp_readonly["nube_codigo"] == "on") { 

 ?>
<input type="hidden" name="nube_codigo" value="<?php echo $this->form_encode_input($nube_codigo) . "\">" . $nube_codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_nube_codigo" class="sc-ui-readonly-nube_codigo css_nube_codigo_line" style="<?php echo $sStyleReadLab_nube_codigo; ?>"><?php echo $this->form_format_readonly("nube_codigo", $this->form_encode_input($this->nube_codigo)); ?></span><span id="id_read_off_nube_codigo" class="css_read_off_nube_codigo" style="white-space: nowrap;<?php echo $sStyleReadInp_nube_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_nube_codigo_obj" style="" id="id_sc_field_nube_codigo" type=text name="nube_codigo" value="<?php echo $this->form_encode_input($nube_codigo) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('nube_codigo')", "nm_mostra_mens('nube_codigo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nube_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nube_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token']))
    {
        $this->nm_new_label['token'] = "Token";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token = $this->token;
   $sStyleHidden_token = '';
   if (isset($this->nmgp_cmp_hidden['token']) && $this->nmgp_cmp_hidden['token'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token']);
       $sStyleHidden_token = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token = 'display: none;';
   $sStyleReadInp_token = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token']) && $this->nmgp_cmp_readonly['token'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token']);
       $sStyleReadLab_token = '';
       $sStyleReadInp_token = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token']) && $this->nmgp_cmp_hidden['token'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token" value="<?php echo $this->form_encode_input($token) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_line" id="hidden_field_data_token" style="<?php echo $sStyleHidden_token; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_label" style=""><span id="id_label_token"><?php echo $this->nm_new_label['token']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token"]) &&  $this->nmgp_cmp_readonly["token"] == "on") { 

 ?>
<input type="hidden" name="token" value="<?php echo $this->form_encode_input($token) . "\">" . $token . ""; ?>
<?php } else { ?>
<span id="id_read_on_token" class="sc-ui-readonly-token css_token_line" style="<?php echo $sStyleReadLab_token; ?>"><?php echo $this->form_format_readonly("token", $this->form_encode_input($this->token)); ?></span><span id="id_read_off_token" class="css_read_off_token" style="white-space: nowrap;<?php echo $sStyleReadInp_token; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_obj" style="" id="id_sc_field_token" type=text name="token" value="<?php echo $this->form_encode_input($token) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password']))
    {
        $this->nm_new_label['password'] = "Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password = $this->password;
   $sStyleHidden_password = '';
   if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password']);
       $sStyleHidden_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password = 'display: none;';
   $sStyleReadInp_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password']) && $this->nmgp_cmp_readonly['password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password']);
       $sStyleReadLab_password = '';
       $sStyleReadInp_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_line" id="hidden_field_data_password" style="<?php echo $sStyleHidden_password; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_label" style=""><span id="id_label_password"><?php echo $this->nm_new_label['password']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password"]) &&  $this->nmgp_cmp_readonly["password"] == "on") { 

 ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">" . $password . ""; ?>
<?php } else { ?>
<span id="id_read_on_password" class="sc-ui-readonly-password css_password_line" style="<?php echo $sStyleReadLab_password; ?>"><?php echo $this->form_format_readonly("password", $this->form_encode_input($this->password)); ?></span><span id="id_read_off_password" class="css_read_off_password" style="white-space: nowrap;<?php echo $sStyleReadInp_password; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_obj" style="" id="id_sc_field_password" type=text name="password" value="<?php echo $this->form_encode_input($password) ?>"
 size=30 maxlength=66 alt="{datatype: 'mask', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '************************************', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['probarnube']))
    {
        $this->nm_new_label['probarnube'] = "Probar Conexión a la Nube";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $probarnube = $this->probarnube;
   $sStyleHidden_probarnube = '';
   if (isset($this->nmgp_cmp_hidden['probarnube']) && $this->nmgp_cmp_hidden['probarnube'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['probarnube']);
       $sStyleHidden_probarnube = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_probarnube = 'display: none;';
   $sStyleReadInp_probarnube = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['probarnube']) && $this->nmgp_cmp_readonly['probarnube'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['probarnube']);
       $sStyleReadLab_probarnube = '';
       $sStyleReadInp_probarnube = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['probarnube']) && $this->nmgp_cmp_hidden['probarnube'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="probarnube" value="<?php echo $this->form_encode_input($probarnube) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_probarnube_line" id="hidden_field_data_probarnube" style="<?php echo $sStyleHidden_probarnube; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_probarnube_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_probarnube_label" style=""><span id="id_label_probarnube"><?php echo $this->nm_new_label['probarnube']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__client_network_32.png"))
          { 
              $probarnube = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__client_network_32.png";
                  $probarnube = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__client_network_32.png\"/>" ; 
              }
              else {
                  $probarnube = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__client_network_32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_probarnube"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_blank_probar_conexion_nube . "', '$this->nm_location', '', '', '_blank', '0', '0', 'blank_probar_conexion_nube')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $probarnube ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["probarnube"]) &&  $this->nmgp_cmp_readonly["probarnube"] == "on") { 

 ?>
<input type="hidden" name="probarnube" value="<?php echo $this->form_encode_input($probarnube) . "\">" . $probarnube . ""; ?>
<?php } else { ?>
<span id="id_read_on_probarnube" class="sc-ui-readonly-probarnube css_probarnube_line" style="<?php echo $sStyleReadLab_probarnube; ?>"><?php echo $this->form_format_readonly("probarnube", $this->form_encode_input($this->probarnube)); ?></span><span id="id_read_off_probarnube" class="css_read_off_probarnube" style="white-space: nowrap;<?php echo $sStyleReadInp_probarnube; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_probarnube_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_probarnube_text"></span></td></tr></table></td></tr></table> </TD>
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
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
 $NM_pag_atual = "form_configuraciones_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_configuraciones_mob_form" . $this->nmgp_ancora;
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_configuraciones_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_configuraciones_mob");
 parent.scAjaxDetailHeight("form_configuraciones_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_configuraciones_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_configuraciones_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['sc_modal'])
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
	function scBtnFn_activar() {
		if ($("#sc_activar_top").length && $("#sc_activar_top").is(":visible")) {
			sc_btn_activar()
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-3").length && $("#sc_b_new_t.sc-unique-btn-3").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-4").length && $("#sc_b_ins_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-6").length && $("#sc_b_del_t.sc-unique-btn-6").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-7").length && $("#sys_separator.sc-unique-btn-7").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-8").length && $("#sc_b_clone_t.sc-unique-btn-8").is(":visible")) {
			nm_move ('clone');
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
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
			nm_move ('final');
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['buttonStatus'] = $this->nmgp_botoes;
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
