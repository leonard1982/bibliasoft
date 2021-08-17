<div id="form_usuarios_210421_mob_form1" style='<?php echo ($this->tabCssClass["form_usuarios_210421_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idusuarios']))
   {
       $this->nmgp_cmp_hidden['idusuarios'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idusuarios']))
           {
               $this->nmgp_cmp_readonly['idusuarios'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Configuración de acceso móvil<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['acceso_inventario']))
   {
       $this->nm_new_label['acceso_inventario'] = "Acceso Inventario";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acceso_inventario = $this->acceso_inventario;
   $sStyleHidden_acceso_inventario = '';
   if (isset($this->nmgp_cmp_hidden['acceso_inventario']) && $this->nmgp_cmp_hidden['acceso_inventario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acceso_inventario']);
       $sStyleHidden_acceso_inventario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acceso_inventario = 'display: none;';
   $sStyleReadInp_acceso_inventario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acceso_inventario']) && $this->nmgp_cmp_readonly['acceso_inventario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acceso_inventario']);
       $sStyleReadLab_acceso_inventario = '';
       $sStyleReadInp_acceso_inventario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acceso_inventario']) && $this->nmgp_cmp_hidden['acceso_inventario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="acceso_inventario" value="<?php echo $this->form_encode_input($this->acceso_inventario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->acceso_inventario_1 = explode(";", trim($this->acceso_inventario));
  } 
  else
  {
      if (empty($this->acceso_inventario))
      {
          $this->acceso_inventario_1= array(); 
          $this->acceso_inventario= "NO";
      } 
      else
      {
          $this->acceso_inventario_1= $this->acceso_inventario; 
          $this->acceso_inventario= ""; 
          foreach ($this->acceso_inventario_1 as $cada_acceso_inventario)
          {
             if (!empty($acceso_inventario))
             {
                 $this->acceso_inventario.= ";"; 
             } 
             $this->acceso_inventario.= $cada_acceso_inventario; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_acceso_inventario_line" id="hidden_field_data_acceso_inventario" style="<?php echo $sStyleHidden_acceso_inventario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acceso_inventario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acceso_inventario_label" style=""><span id="id_label_acceso_inventario"><?php echo $this->nm_new_label['acceso_inventario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acceso_inventario"]) &&  $this->nmgp_cmp_readonly["acceso_inventario"] == "on") { 

$acceso_inventario_look = "";
 if ($this->acceso_inventario == "SI") { $acceso_inventario_look .= "" ;} 
 if (empty($acceso_inventario_look)) { $acceso_inventario_look = $this->acceso_inventario; }
?>
<input type="hidden" name="acceso_inventario" value="<?php echo $this->form_encode_input($acceso_inventario) . "\">" . $acceso_inventario_look . ""; ?>
<?php } else { ?>

<?php

$acceso_inventario_look = "";
 if ($this->acceso_inventario == "SI") { $acceso_inventario_look .= "" ;} 
 if (empty($acceso_inventario_look)) { $acceso_inventario_look = $this->acceso_inventario; }
?>
<span id="id_read_on_acceso_inventario" class="css_acceso_inventario_line" style="<?php echo $sStyleReadLab_acceso_inventario; ?>"><?php echo $this->form_format_readonly("acceso_inventario", $this->form_encode_input($acceso_inventario_look)); ?></span><span id="id_read_off_acceso_inventario" class="css_read_off_acceso_inventario css_acceso_inventario_line" style="<?php echo $sStyleReadInp_acceso_inventario; ?>"><?php echo "<div id=\"idAjaxCheckbox_acceso_inventario\" style=\"display: inline-block\" class=\"css_acceso_inventario_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_acceso_inventario_line"><?php $tempOptionId = "id-opt-acceso_inventario" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-acceso_inventario sc-ui-checkbox-acceso_inventario" name="acceso_inventario[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios_210421_mob']['Lookup_acceso_inventario'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->acceso_inventario_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acceso_inventario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acceso_inventario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['acceso_gerencial']))
   {
       $this->nm_new_label['acceso_gerencial'] = "Acceso Gerencial";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acceso_gerencial = $this->acceso_gerencial;
   $sStyleHidden_acceso_gerencial = '';
   if (isset($this->nmgp_cmp_hidden['acceso_gerencial']) && $this->nmgp_cmp_hidden['acceso_gerencial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acceso_gerencial']);
       $sStyleHidden_acceso_gerencial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acceso_gerencial = 'display: none;';
   $sStyleReadInp_acceso_gerencial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acceso_gerencial']) && $this->nmgp_cmp_readonly['acceso_gerencial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acceso_gerencial']);
       $sStyleReadLab_acceso_gerencial = '';
       $sStyleReadInp_acceso_gerencial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acceso_gerencial']) && $this->nmgp_cmp_hidden['acceso_gerencial'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="acceso_gerencial" value="<?php echo $this->form_encode_input($this->acceso_gerencial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->acceso_gerencial_1 = explode(";", trim($this->acceso_gerencial));
  } 
  else
  {
      if (empty($this->acceso_gerencial))
      {
          $this->acceso_gerencial_1= array(); 
          $this->acceso_gerencial= "NO";
      } 
      else
      {
          $this->acceso_gerencial_1= $this->acceso_gerencial; 
          $this->acceso_gerencial= ""; 
          foreach ($this->acceso_gerencial_1 as $cada_acceso_gerencial)
          {
             if (!empty($acceso_gerencial))
             {
                 $this->acceso_gerencial.= ";"; 
             } 
             $this->acceso_gerencial.= $cada_acceso_gerencial; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_acceso_gerencial_line" id="hidden_field_data_acceso_gerencial" style="<?php echo $sStyleHidden_acceso_gerencial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acceso_gerencial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acceso_gerencial_label" style=""><span id="id_label_acceso_gerencial"><?php echo $this->nm_new_label['acceso_gerencial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acceso_gerencial"]) &&  $this->nmgp_cmp_readonly["acceso_gerencial"] == "on") { 

$acceso_gerencial_look = "";
 if ($this->acceso_gerencial == "SI") { $acceso_gerencial_look .= "" ;} 
 if (empty($acceso_gerencial_look)) { $acceso_gerencial_look = $this->acceso_gerencial; }
?>
<input type="hidden" name="acceso_gerencial" value="<?php echo $this->form_encode_input($acceso_gerencial) . "\">" . $acceso_gerencial_look . ""; ?>
<?php } else { ?>

<?php

$acceso_gerencial_look = "";
 if ($this->acceso_gerencial == "SI") { $acceso_gerencial_look .= "" ;} 
 if (empty($acceso_gerencial_look)) { $acceso_gerencial_look = $this->acceso_gerencial; }
?>
<span id="id_read_on_acceso_gerencial" class="css_acceso_gerencial_line" style="<?php echo $sStyleReadLab_acceso_gerencial; ?>"><?php echo $this->form_format_readonly("acceso_gerencial", $this->form_encode_input($acceso_gerencial_look)); ?></span><span id="id_read_off_acceso_gerencial" class="css_read_off_acceso_gerencial css_acceso_gerencial_line" style="<?php echo $sStyleReadInp_acceso_gerencial; ?>"><?php echo "<div id=\"idAjaxCheckbox_acceso_gerencial\" style=\"display: inline-block\" class=\"css_acceso_gerencial_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_acceso_gerencial_line"><?php $tempOptionId = "id-opt-acceso_gerencial" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-acceso_gerencial sc-ui-checkbox-acceso_gerencial" name="acceso_gerencial[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios_210421_mob']['Lookup_acceso_gerencial'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->acceso_gerencial_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acceso_gerencial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acceso_gerencial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['acceso_restaurante']))
   {
       $this->nm_new_label['acceso_restaurante'] = "Acceso Restaurante";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acceso_restaurante = $this->acceso_restaurante;
   $sStyleHidden_acceso_restaurante = '';
   if (isset($this->nmgp_cmp_hidden['acceso_restaurante']) && $this->nmgp_cmp_hidden['acceso_restaurante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acceso_restaurante']);
       $sStyleHidden_acceso_restaurante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acceso_restaurante = 'display: none;';
   $sStyleReadInp_acceso_restaurante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acceso_restaurante']) && $this->nmgp_cmp_readonly['acceso_restaurante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acceso_restaurante']);
       $sStyleReadLab_acceso_restaurante = '';
       $sStyleReadInp_acceso_restaurante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acceso_restaurante']) && $this->nmgp_cmp_hidden['acceso_restaurante'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="acceso_restaurante" value="<?php echo $this->form_encode_input($this->acceso_restaurante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->acceso_restaurante_1 = explode(";", trim($this->acceso_restaurante));
  } 
  else
  {
      if (empty($this->acceso_restaurante))
      {
          $this->acceso_restaurante_1= array(); 
          $this->acceso_restaurante= "NO";
      } 
      else
      {
          $this->acceso_restaurante_1= $this->acceso_restaurante; 
          $this->acceso_restaurante= ""; 
          foreach ($this->acceso_restaurante_1 as $cada_acceso_restaurante)
          {
             if (!empty($acceso_restaurante))
             {
                 $this->acceso_restaurante.= ";"; 
             } 
             $this->acceso_restaurante.= $cada_acceso_restaurante; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_acceso_restaurante_line" id="hidden_field_data_acceso_restaurante" style="<?php echo $sStyleHidden_acceso_restaurante; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acceso_restaurante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acceso_restaurante_label" style=""><span id="id_label_acceso_restaurante"><?php echo $this->nm_new_label['acceso_restaurante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acceso_restaurante"]) &&  $this->nmgp_cmp_readonly["acceso_restaurante"] == "on") { 

$acceso_restaurante_look = "";
 if ($this->acceso_restaurante == "SI") { $acceso_restaurante_look .= "" ;} 
 if (empty($acceso_restaurante_look)) { $acceso_restaurante_look = $this->acceso_restaurante; }
?>
<input type="hidden" name="acceso_restaurante" value="<?php echo $this->form_encode_input($acceso_restaurante) . "\">" . $acceso_restaurante_look . ""; ?>
<?php } else { ?>

<?php

$acceso_restaurante_look = "";
 if ($this->acceso_restaurante == "SI") { $acceso_restaurante_look .= "" ;} 
 if (empty($acceso_restaurante_look)) { $acceso_restaurante_look = $this->acceso_restaurante; }
?>
<span id="id_read_on_acceso_restaurante" class="css_acceso_restaurante_line" style="<?php echo $sStyleReadLab_acceso_restaurante; ?>"><?php echo $this->form_format_readonly("acceso_restaurante", $this->form_encode_input($acceso_restaurante_look)); ?></span><span id="id_read_off_acceso_restaurante" class="css_read_off_acceso_restaurante css_acceso_restaurante_line" style="<?php echo $sStyleReadInp_acceso_restaurante; ?>"><?php echo "<div id=\"idAjaxCheckbox_acceso_restaurante\" style=\"display: inline-block\" class=\"css_acceso_restaurante_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_acceso_restaurante_line"><?php $tempOptionId = "id-opt-acceso_restaurante" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-acceso_restaurante sc-ui-checkbox-acceso_restaurante" name="acceso_restaurante[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios_210421_mob']['Lookup_acceso_restaurante'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->acceso_restaurante_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acceso_restaurante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acceso_restaurante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
