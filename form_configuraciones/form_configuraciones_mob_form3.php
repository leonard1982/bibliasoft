<div id="form_configuraciones_mob_form3" style='<?php echo ($this->tabCssClass["form_configuraciones_mob_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
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
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_grupo']))
   {
       $this->nm_new_label['ver_grupo'] = "Ver Grupo/Familia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_grupo = $this->ver_grupo;
   $sStyleHidden_ver_grupo = '';
   if (isset($this->nmgp_cmp_hidden['ver_grupo']) && $this->nmgp_cmp_hidden['ver_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_grupo']);
       $sStyleHidden_ver_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_grupo = 'display: none;';
   $sStyleReadInp_ver_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_grupo']) && $this->nmgp_cmp_readonly['ver_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_grupo']);
       $sStyleReadLab_ver_grupo = '';
       $sStyleReadInp_ver_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_grupo']) && $this->nmgp_cmp_hidden['ver_grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_grupo" value="<?php echo $this->form_encode_input($this->ver_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_grupo_1 = explode(";", trim($this->ver_grupo));
  } 
  else
  {
      if (empty($this->ver_grupo))
      {
          $this->ver_grupo_1= array(); 
          $this->ver_grupo= "NO";
      } 
      else
      {
          $this->ver_grupo_1= $this->ver_grupo; 
          $this->ver_grupo= ""; 
          foreach ($this->ver_grupo_1 as $cada_ver_grupo)
          {
             if (!empty($ver_grupo))
             {
                 $this->ver_grupo.= ";"; 
             } 
             $this->ver_grupo.= $cada_ver_grupo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_grupo_line" id="hidden_field_data_ver_grupo" style="<?php echo $sStyleHidden_ver_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_grupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_grupo_label" style=""><span id="id_label_ver_grupo"><?php echo $this->nm_new_label['ver_grupo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_grupo"]) &&  $this->nmgp_cmp_readonly["ver_grupo"] == "on") { 

$ver_grupo_look = "";
 if ($this->ver_grupo == "SI") { $ver_grupo_look .= "SI" ;} 
 if (empty($ver_grupo_look)) { $ver_grupo_look = $this->ver_grupo; }
?>
<input type="hidden" name="ver_grupo" value="<?php echo $this->form_encode_input($ver_grupo) . "\">" . $ver_grupo_look . ""; ?>
<?php } else { ?>

<?php

$ver_grupo_look = "";
 if ($this->ver_grupo == "SI") { $ver_grupo_look .= "SI" ;} 
 if (empty($ver_grupo_look)) { $ver_grupo_look = $this->ver_grupo; }
?>
<span id="id_read_on_ver_grupo" class="css_ver_grupo_line" style="<?php echo $sStyleReadLab_ver_grupo; ?>"><?php echo $this->form_format_readonly("ver_grupo", $this->form_encode_input($ver_grupo_look)); ?></span><span id="id_read_off_ver_grupo" class="css_read_off_ver_grupo css_ver_grupo_line" style="<?php echo $sStyleReadInp_ver_grupo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_grupo\" style=\"display: inline-block\" class=\"css_ver_grupo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_grupo_line"><?php $tempOptionId = "id-opt-ver_grupo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_grupo sc-ui-checkbox-ver_grupo" name="ver_grupo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_grupo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_grupo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_grupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_codigo']))
   {
       $this->nm_new_label['ver_codigo'] = "Ver Código";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_codigo = $this->ver_codigo;
   $sStyleHidden_ver_codigo = '';
   if (isset($this->nmgp_cmp_hidden['ver_codigo']) && $this->nmgp_cmp_hidden['ver_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_codigo']);
       $sStyleHidden_ver_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_codigo = 'display: none;';
   $sStyleReadInp_ver_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_codigo']) && $this->nmgp_cmp_readonly['ver_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_codigo']);
       $sStyleReadLab_ver_codigo = '';
       $sStyleReadInp_ver_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_codigo']) && $this->nmgp_cmp_hidden['ver_codigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_codigo" value="<?php echo $this->form_encode_input($this->ver_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_codigo_1 = explode(";", trim($this->ver_codigo));
  } 
  else
  {
      if (empty($this->ver_codigo))
      {
          $this->ver_codigo_1= array(); 
          $this->ver_codigo= "NO";
      } 
      else
      {
          $this->ver_codigo_1= $this->ver_codigo; 
          $this->ver_codigo= ""; 
          foreach ($this->ver_codigo_1 as $cada_ver_codigo)
          {
             if (!empty($ver_codigo))
             {
                 $this->ver_codigo.= ";"; 
             } 
             $this->ver_codigo.= $cada_ver_codigo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_codigo_line" id="hidden_field_data_ver_codigo" style="<?php echo $sStyleHidden_ver_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_codigo_label" style=""><span id="id_label_ver_codigo"><?php echo $this->nm_new_label['ver_codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_codigo"]) &&  $this->nmgp_cmp_readonly["ver_codigo"] == "on") { 

$ver_codigo_look = "";
 if ($this->ver_codigo == "SI") { $ver_codigo_look .= "SI" ;} 
 if (empty($ver_codigo_look)) { $ver_codigo_look = $this->ver_codigo; }
?>
<input type="hidden" name="ver_codigo" value="<?php echo $this->form_encode_input($ver_codigo) . "\">" . $ver_codigo_look . ""; ?>
<?php } else { ?>

<?php

$ver_codigo_look = "";
 if ($this->ver_codigo == "SI") { $ver_codigo_look .= "SI" ;} 
 if (empty($ver_codigo_look)) { $ver_codigo_look = $this->ver_codigo; }
?>
<span id="id_read_on_ver_codigo" class="css_ver_codigo_line" style="<?php echo $sStyleReadLab_ver_codigo; ?>"><?php echo $this->form_format_readonly("ver_codigo", $this->form_encode_input($ver_codigo_look)); ?></span><span id="id_read_off_ver_codigo" class="css_read_off_ver_codigo css_ver_codigo_line" style="<?php echo $sStyleReadInp_ver_codigo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_codigo\" style=\"display: inline-block\" class=\"css_ver_codigo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_codigo_line"><?php $tempOptionId = "id-opt-ver_codigo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_codigo sc-ui-checkbox-ver_codigo" name="ver_codigo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_codigo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_codigo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_imagen']))
   {
       $this->nm_new_label['ver_imagen'] = "Ver Imagen";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_imagen = $this->ver_imagen;
   $sStyleHidden_ver_imagen = '';
   if (isset($this->nmgp_cmp_hidden['ver_imagen']) && $this->nmgp_cmp_hidden['ver_imagen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_imagen']);
       $sStyleHidden_ver_imagen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_imagen = 'display: none;';
   $sStyleReadInp_ver_imagen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_imagen']) && $this->nmgp_cmp_readonly['ver_imagen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_imagen']);
       $sStyleReadLab_ver_imagen = '';
       $sStyleReadInp_ver_imagen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_imagen']) && $this->nmgp_cmp_hidden['ver_imagen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_imagen" value="<?php echo $this->form_encode_input($this->ver_imagen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_imagen_1 = explode(";", trim($this->ver_imagen));
  } 
  else
  {
      if (empty($this->ver_imagen))
      {
          $this->ver_imagen_1= array(); 
          $this->ver_imagen= "NO";
      } 
      else
      {
          $this->ver_imagen_1= $this->ver_imagen; 
          $this->ver_imagen= ""; 
          foreach ($this->ver_imagen_1 as $cada_ver_imagen)
          {
             if (!empty($ver_imagen))
             {
                 $this->ver_imagen.= ";"; 
             } 
             $this->ver_imagen.= $cada_ver_imagen; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_imagen_line" id="hidden_field_data_ver_imagen" style="<?php echo $sStyleHidden_ver_imagen; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_imagen_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_imagen_label" style=""><span id="id_label_ver_imagen"><?php echo $this->nm_new_label['ver_imagen']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_imagen"]) &&  $this->nmgp_cmp_readonly["ver_imagen"] == "on") { 

$ver_imagen_look = "";
 if ($this->ver_imagen == "SI") { $ver_imagen_look .= "SI" ;} 
 if (empty($ver_imagen_look)) { $ver_imagen_look = $this->ver_imagen; }
?>
<input type="hidden" name="ver_imagen" value="<?php echo $this->form_encode_input($ver_imagen) . "\">" . $ver_imagen_look . ""; ?>
<?php } else { ?>

<?php

$ver_imagen_look = "";
 if ($this->ver_imagen == "SI") { $ver_imagen_look .= "SI" ;} 
 if (empty($ver_imagen_look)) { $ver_imagen_look = $this->ver_imagen; }
?>
<span id="id_read_on_ver_imagen" class="css_ver_imagen_line" style="<?php echo $sStyleReadLab_ver_imagen; ?>"><?php echo $this->form_format_readonly("ver_imagen", $this->form_encode_input($ver_imagen_look)); ?></span><span id="id_read_off_ver_imagen" class="css_read_off_ver_imagen css_ver_imagen_line" style="<?php echo $sStyleReadInp_ver_imagen; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_imagen\" style=\"display: inline-block\" class=\"css_ver_imagen_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_imagen_line"><?php $tempOptionId = "id-opt-ver_imagen" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_imagen sc-ui-checkbox-ver_imagen" name="ver_imagen[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_imagen'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_imagen_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_imagen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_imagen_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_existencia']))
   {
       $this->nm_new_label['ver_existencia'] = "Ver Existencia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_existencia = $this->ver_existencia;
   $sStyleHidden_ver_existencia = '';
   if (isset($this->nmgp_cmp_hidden['ver_existencia']) && $this->nmgp_cmp_hidden['ver_existencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_existencia']);
       $sStyleHidden_ver_existencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_existencia = 'display: none;';
   $sStyleReadInp_ver_existencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_existencia']) && $this->nmgp_cmp_readonly['ver_existencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_existencia']);
       $sStyleReadLab_ver_existencia = '';
       $sStyleReadInp_ver_existencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_existencia']) && $this->nmgp_cmp_hidden['ver_existencia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_existencia" value="<?php echo $this->form_encode_input($this->ver_existencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_existencia_1 = explode(";", trim($this->ver_existencia));
  } 
  else
  {
      if (empty($this->ver_existencia))
      {
          $this->ver_existencia_1= array(); 
          $this->ver_existencia= "NO";
      } 
      else
      {
          $this->ver_existencia_1= $this->ver_existencia; 
          $this->ver_existencia= ""; 
          foreach ($this->ver_existencia_1 as $cada_ver_existencia)
          {
             if (!empty($ver_existencia))
             {
                 $this->ver_existencia.= ";"; 
             } 
             $this->ver_existencia.= $cada_ver_existencia; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_existencia_line" id="hidden_field_data_ver_existencia" style="<?php echo $sStyleHidden_ver_existencia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_existencia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_existencia_label" style=""><span id="id_label_ver_existencia"><?php echo $this->nm_new_label['ver_existencia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_existencia"]) &&  $this->nmgp_cmp_readonly["ver_existencia"] == "on") { 

$ver_existencia_look = "";
 if ($this->ver_existencia == "SI") { $ver_existencia_look .= "SI" ;} 
 if (empty($ver_existencia_look)) { $ver_existencia_look = $this->ver_existencia; }
?>
<input type="hidden" name="ver_existencia" value="<?php echo $this->form_encode_input($ver_existencia) . "\">" . $ver_existencia_look . ""; ?>
<?php } else { ?>

<?php

$ver_existencia_look = "";
 if ($this->ver_existencia == "SI") { $ver_existencia_look .= "SI" ;} 
 if (empty($ver_existencia_look)) { $ver_existencia_look = $this->ver_existencia; }
?>
<span id="id_read_on_ver_existencia" class="css_ver_existencia_line" style="<?php echo $sStyleReadLab_ver_existencia; ?>"><?php echo $this->form_format_readonly("ver_existencia", $this->form_encode_input($ver_existencia_look)); ?></span><span id="id_read_off_ver_existencia" class="css_read_off_ver_existencia css_ver_existencia_line" style="<?php echo $sStyleReadInp_ver_existencia; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_existencia\" style=\"display: inline-block\" class=\"css_ver_existencia_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_existencia_line"><?php $tempOptionId = "id-opt-ver_existencia" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_existencia sc-ui-checkbox-ver_existencia" name="ver_existencia[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_existencia'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_existencia_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_existencia')", "nm_mostra_mens('ver_existencia')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_existencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_existencia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_unidad']))
   {
       $this->nm_new_label['ver_unidad'] = "Ver Unidad";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_unidad = $this->ver_unidad;
   $sStyleHidden_ver_unidad = '';
   if (isset($this->nmgp_cmp_hidden['ver_unidad']) && $this->nmgp_cmp_hidden['ver_unidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_unidad']);
       $sStyleHidden_ver_unidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_unidad = 'display: none;';
   $sStyleReadInp_ver_unidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_unidad']) && $this->nmgp_cmp_readonly['ver_unidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_unidad']);
       $sStyleReadLab_ver_unidad = '';
       $sStyleReadInp_ver_unidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_unidad']) && $this->nmgp_cmp_hidden['ver_unidad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_unidad" value="<?php echo $this->form_encode_input($this->ver_unidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_unidad_1 = explode(";", trim($this->ver_unidad));
  } 
  else
  {
      if (empty($this->ver_unidad))
      {
          $this->ver_unidad_1= array(); 
          $this->ver_unidad= "NO";
      } 
      else
      {
          $this->ver_unidad_1= $this->ver_unidad; 
          $this->ver_unidad= ""; 
          foreach ($this->ver_unidad_1 as $cada_ver_unidad)
          {
             if (!empty($ver_unidad))
             {
                 $this->ver_unidad.= ";"; 
             } 
             $this->ver_unidad.= $cada_ver_unidad; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_unidad_line" id="hidden_field_data_ver_unidad" style="<?php echo $sStyleHidden_ver_unidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_unidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_unidad_label" style=""><span id="id_label_ver_unidad"><?php echo $this->nm_new_label['ver_unidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_unidad"]) &&  $this->nmgp_cmp_readonly["ver_unidad"] == "on") { 

$ver_unidad_look = "";
 if ($this->ver_unidad == "SI") { $ver_unidad_look .= "SI" ;} 
 if (empty($ver_unidad_look)) { $ver_unidad_look = $this->ver_unidad; }
?>
<input type="hidden" name="ver_unidad" value="<?php echo $this->form_encode_input($ver_unidad) . "\">" . $ver_unidad_look . ""; ?>
<?php } else { ?>

<?php

$ver_unidad_look = "";
 if ($this->ver_unidad == "SI") { $ver_unidad_look .= "SI" ;} 
 if (empty($ver_unidad_look)) { $ver_unidad_look = $this->ver_unidad; }
?>
<span id="id_read_on_ver_unidad" class="css_ver_unidad_line" style="<?php echo $sStyleReadLab_ver_unidad; ?>"><?php echo $this->form_format_readonly("ver_unidad", $this->form_encode_input($ver_unidad_look)); ?></span><span id="id_read_off_ver_unidad" class="css_read_off_ver_unidad css_ver_unidad_line" style="<?php echo $sStyleReadInp_ver_unidad; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_unidad\" style=\"display: inline-block\" class=\"css_ver_unidad_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_unidad_line"><?php $tempOptionId = "id-opt-ver_unidad" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_unidad sc-ui-checkbox-ver_unidad" name="ver_unidad[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_unidad'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_unidad_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_unidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_unidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_precio']))
   {
       $this->nm_new_label['ver_precio'] = "Ver Precio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_precio = $this->ver_precio;
   $sStyleHidden_ver_precio = '';
   if (isset($this->nmgp_cmp_hidden['ver_precio']) && $this->nmgp_cmp_hidden['ver_precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_precio']);
       $sStyleHidden_ver_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_precio = 'display: none;';
   $sStyleReadInp_ver_precio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_precio']) && $this->nmgp_cmp_readonly['ver_precio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_precio']);
       $sStyleReadLab_ver_precio = '';
       $sStyleReadInp_ver_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_precio']) && $this->nmgp_cmp_hidden['ver_precio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_precio" value="<?php echo $this->form_encode_input($this->ver_precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_precio_1 = explode(";", trim($this->ver_precio));
  } 
  else
  {
      if (empty($this->ver_precio))
      {
          $this->ver_precio_1= array(); 
          $this->ver_precio= "NO";
      } 
      else
      {
          $this->ver_precio_1= $this->ver_precio; 
          $this->ver_precio= ""; 
          foreach ($this->ver_precio_1 as $cada_ver_precio)
          {
             if (!empty($ver_precio))
             {
                 $this->ver_precio.= ";"; 
             } 
             $this->ver_precio.= $cada_ver_precio; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_precio_line" id="hidden_field_data_ver_precio" style="<?php echo $sStyleHidden_ver_precio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_precio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_precio_label" style=""><span id="id_label_ver_precio"><?php echo $this->nm_new_label['ver_precio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_precio"]) &&  $this->nmgp_cmp_readonly["ver_precio"] == "on") { 

$ver_precio_look = "";
 if ($this->ver_precio == "SI") { $ver_precio_look .= "SI" ;} 
 if (empty($ver_precio_look)) { $ver_precio_look = $this->ver_precio; }
?>
<input type="hidden" name="ver_precio" value="<?php echo $this->form_encode_input($ver_precio) . "\">" . $ver_precio_look . ""; ?>
<?php } else { ?>

<?php

$ver_precio_look = "";
 if ($this->ver_precio == "SI") { $ver_precio_look .= "SI" ;} 
 if (empty($ver_precio_look)) { $ver_precio_look = $this->ver_precio; }
?>
<span id="id_read_on_ver_precio" class="css_ver_precio_line" style="<?php echo $sStyleReadLab_ver_precio; ?>"><?php echo $this->form_format_readonly("ver_precio", $this->form_encode_input($ver_precio_look)); ?></span><span id="id_read_off_ver_precio" class="css_read_off_ver_precio css_ver_precio_line" style="<?php echo $sStyleReadInp_ver_precio; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_precio\" style=\"display: inline-block\" class=\"css_ver_precio_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_precio_line"><?php $tempOptionId = "id-opt-ver_precio" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_precio sc-ui-checkbox-ver_precio" name="ver_precio[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_precio'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_precio_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_precio')", "nm_mostra_mens('ver_precio')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_precio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_precio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_impuesto']))
   {
       $this->nm_new_label['ver_impuesto'] = "Ver Impuesto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_impuesto = $this->ver_impuesto;
   $sStyleHidden_ver_impuesto = '';
   if (isset($this->nmgp_cmp_hidden['ver_impuesto']) && $this->nmgp_cmp_hidden['ver_impuesto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_impuesto']);
       $sStyleHidden_ver_impuesto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_impuesto = 'display: none;';
   $sStyleReadInp_ver_impuesto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_impuesto']) && $this->nmgp_cmp_readonly['ver_impuesto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_impuesto']);
       $sStyleReadLab_ver_impuesto = '';
       $sStyleReadInp_ver_impuesto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_impuesto']) && $this->nmgp_cmp_hidden['ver_impuesto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_impuesto" value="<?php echo $this->form_encode_input($this->ver_impuesto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_impuesto_1 = explode(";", trim($this->ver_impuesto));
  } 
  else
  {
      if (empty($this->ver_impuesto))
      {
          $this->ver_impuesto_1= array(); 
          $this->ver_impuesto= "NO";
      } 
      else
      {
          $this->ver_impuesto_1= $this->ver_impuesto; 
          $this->ver_impuesto= ""; 
          foreach ($this->ver_impuesto_1 as $cada_ver_impuesto)
          {
             if (!empty($ver_impuesto))
             {
                 $this->ver_impuesto.= ";"; 
             } 
             $this->ver_impuesto.= $cada_ver_impuesto; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_impuesto_line" id="hidden_field_data_ver_impuesto" style="<?php echo $sStyleHidden_ver_impuesto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_impuesto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_impuesto_label" style=""><span id="id_label_ver_impuesto"><?php echo $this->nm_new_label['ver_impuesto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_impuesto"]) &&  $this->nmgp_cmp_readonly["ver_impuesto"] == "on") { 

$ver_impuesto_look = "";
 if ($this->ver_impuesto == "SI") { $ver_impuesto_look .= "SI" ;} 
 if (empty($ver_impuesto_look)) { $ver_impuesto_look = $this->ver_impuesto; }
?>
<input type="hidden" name="ver_impuesto" value="<?php echo $this->form_encode_input($ver_impuesto) . "\">" . $ver_impuesto_look . ""; ?>
<?php } else { ?>

<?php

$ver_impuesto_look = "";
 if ($this->ver_impuesto == "SI") { $ver_impuesto_look .= "SI" ;} 
 if (empty($ver_impuesto_look)) { $ver_impuesto_look = $this->ver_impuesto; }
?>
<span id="id_read_on_ver_impuesto" class="css_ver_impuesto_line" style="<?php echo $sStyleReadLab_ver_impuesto; ?>"><?php echo $this->form_format_readonly("ver_impuesto", $this->form_encode_input($ver_impuesto_look)); ?></span><span id="id_read_off_ver_impuesto" class="css_read_off_ver_impuesto css_ver_impuesto_line" style="<?php echo $sStyleReadInp_ver_impuesto; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_impuesto\" style=\"display: inline-block\" class=\"css_ver_impuesto_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_impuesto_line"><?php $tempOptionId = "id-opt-ver_impuesto" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_impuesto sc-ui-checkbox-ver_impuesto" name="ver_impuesto[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_impuesto'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_impuesto_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_impuesto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_impuesto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_stock']))
   {
       $this->nm_new_label['ver_stock'] = "Ver Stock";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_stock = $this->ver_stock;
   $sStyleHidden_ver_stock = '';
   if (isset($this->nmgp_cmp_hidden['ver_stock']) && $this->nmgp_cmp_hidden['ver_stock'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_stock']);
       $sStyleHidden_ver_stock = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_stock = 'display: none;';
   $sStyleReadInp_ver_stock = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_stock']) && $this->nmgp_cmp_readonly['ver_stock'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_stock']);
       $sStyleReadLab_ver_stock = '';
       $sStyleReadInp_ver_stock = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_stock']) && $this->nmgp_cmp_hidden['ver_stock'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_stock" value="<?php echo $this->form_encode_input($this->ver_stock) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_stock_1 = explode(";", trim($this->ver_stock));
  } 
  else
  {
      if (empty($this->ver_stock))
      {
          $this->ver_stock_1= array(); 
          $this->ver_stock= "NO";
      } 
      else
      {
          $this->ver_stock_1= $this->ver_stock; 
          $this->ver_stock= ""; 
          foreach ($this->ver_stock_1 as $cada_ver_stock)
          {
             if (!empty($ver_stock))
             {
                 $this->ver_stock.= ";"; 
             } 
             $this->ver_stock.= $cada_ver_stock; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_stock_line" id="hidden_field_data_ver_stock" style="<?php echo $sStyleHidden_ver_stock; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_stock_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_stock_label" style=""><span id="id_label_ver_stock"><?php echo $this->nm_new_label['ver_stock']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_stock"]) &&  $this->nmgp_cmp_readonly["ver_stock"] == "on") { 

$ver_stock_look = "";
 if ($this->ver_stock == "SI") { $ver_stock_look .= "SI" ;} 
 if (empty($ver_stock_look)) { $ver_stock_look = $this->ver_stock; }
?>
<input type="hidden" name="ver_stock" value="<?php echo $this->form_encode_input($ver_stock) . "\">" . $ver_stock_look . ""; ?>
<?php } else { ?>

<?php

$ver_stock_look = "";
 if ($this->ver_stock == "SI") { $ver_stock_look .= "SI" ;} 
 if (empty($ver_stock_look)) { $ver_stock_look = $this->ver_stock; }
?>
<span id="id_read_on_ver_stock" class="css_ver_stock_line" style="<?php echo $sStyleReadLab_ver_stock; ?>"><?php echo $this->form_format_readonly("ver_stock", $this->form_encode_input($ver_stock_look)); ?></span><span id="id_read_off_ver_stock" class="css_read_off_ver_stock css_ver_stock_line" style="<?php echo $sStyleReadInp_ver_stock; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_stock\" style=\"display: inline-block\" class=\"css_ver_stock_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_stock_line"><?php $tempOptionId = "id-opt-ver_stock" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_stock sc-ui-checkbox-ver_stock" name="ver_stock[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_stock'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_stock_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_stock')", "nm_mostra_mens('ver_stock')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_stock_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_stock_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_ubicacion']))
   {
       $this->nm_new_label['ver_ubicacion'] = "Ver Ubicación";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_ubicacion = $this->ver_ubicacion;
   $sStyleHidden_ver_ubicacion = '';
   if (isset($this->nmgp_cmp_hidden['ver_ubicacion']) && $this->nmgp_cmp_hidden['ver_ubicacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_ubicacion']);
       $sStyleHidden_ver_ubicacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_ubicacion = 'display: none;';
   $sStyleReadInp_ver_ubicacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_ubicacion']) && $this->nmgp_cmp_readonly['ver_ubicacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_ubicacion']);
       $sStyleReadLab_ver_ubicacion = '';
       $sStyleReadInp_ver_ubicacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_ubicacion']) && $this->nmgp_cmp_hidden['ver_ubicacion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_ubicacion" value="<?php echo $this->form_encode_input($this->ver_ubicacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_ubicacion_1 = explode(";", trim($this->ver_ubicacion));
  } 
  else
  {
      if (empty($this->ver_ubicacion))
      {
          $this->ver_ubicacion_1= array(); 
          $this->ver_ubicacion= "NO";
      } 
      else
      {
          $this->ver_ubicacion_1= $this->ver_ubicacion; 
          $this->ver_ubicacion= ""; 
          foreach ($this->ver_ubicacion_1 as $cada_ver_ubicacion)
          {
             if (!empty($ver_ubicacion))
             {
                 $this->ver_ubicacion.= ";"; 
             } 
             $this->ver_ubicacion.= $cada_ver_ubicacion; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_ubicacion_line" id="hidden_field_data_ver_ubicacion" style="<?php echo $sStyleHidden_ver_ubicacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_ubicacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_ubicacion_label" style=""><span id="id_label_ver_ubicacion"><?php echo $this->nm_new_label['ver_ubicacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_ubicacion"]) &&  $this->nmgp_cmp_readonly["ver_ubicacion"] == "on") { 

$ver_ubicacion_look = "";
 if ($this->ver_ubicacion == "SI") { $ver_ubicacion_look .= "SI" ;} 
 if (empty($ver_ubicacion_look)) { $ver_ubicacion_look = $this->ver_ubicacion; }
?>
<input type="hidden" name="ver_ubicacion" value="<?php echo $this->form_encode_input($ver_ubicacion) . "\">" . $ver_ubicacion_look . ""; ?>
<?php } else { ?>

<?php

$ver_ubicacion_look = "";
 if ($this->ver_ubicacion == "SI") { $ver_ubicacion_look .= "SI" ;} 
 if (empty($ver_ubicacion_look)) { $ver_ubicacion_look = $this->ver_ubicacion; }
?>
<span id="id_read_on_ver_ubicacion" class="css_ver_ubicacion_line" style="<?php echo $sStyleReadLab_ver_ubicacion; ?>"><?php echo $this->form_format_readonly("ver_ubicacion", $this->form_encode_input($ver_ubicacion_look)); ?></span><span id="id_read_off_ver_ubicacion" class="css_read_off_ver_ubicacion css_ver_ubicacion_line" style="<?php echo $sStyleReadInp_ver_ubicacion; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_ubicacion\" style=\"display: inline-block\" class=\"css_ver_ubicacion_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_ubicacion_line"><?php $tempOptionId = "id-opt-ver_ubicacion" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_ubicacion sc-ui-checkbox-ver_ubicacion" name="ver_ubicacion[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_ubicacion'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_ubicacion_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_ubicacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_ubicacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_costo']))
   {
       $this->nm_new_label['ver_costo'] = "Ver Costo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_costo = $this->ver_costo;
   $sStyleHidden_ver_costo = '';
   if (isset($this->nmgp_cmp_hidden['ver_costo']) && $this->nmgp_cmp_hidden['ver_costo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_costo']);
       $sStyleHidden_ver_costo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_costo = 'display: none;';
   $sStyleReadInp_ver_costo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_costo']) && $this->nmgp_cmp_readonly['ver_costo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_costo']);
       $sStyleReadLab_ver_costo = '';
       $sStyleReadInp_ver_costo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_costo']) && $this->nmgp_cmp_hidden['ver_costo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_costo" value="<?php echo $this->form_encode_input($this->ver_costo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_costo_1 = explode(";", trim($this->ver_costo));
  } 
  else
  {
      if (empty($this->ver_costo))
      {
          $this->ver_costo_1= array(); 
          $this->ver_costo= "NO";
      } 
      else
      {
          $this->ver_costo_1= $this->ver_costo; 
          $this->ver_costo= ""; 
          foreach ($this->ver_costo_1 as $cada_ver_costo)
          {
             if (!empty($ver_costo))
             {
                 $this->ver_costo.= ";"; 
             } 
             $this->ver_costo.= $cada_ver_costo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_costo_line" id="hidden_field_data_ver_costo" style="<?php echo $sStyleHidden_ver_costo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_costo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_costo_label" style=""><span id="id_label_ver_costo"><?php echo $this->nm_new_label['ver_costo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_costo"]) &&  $this->nmgp_cmp_readonly["ver_costo"] == "on") { 

$ver_costo_look = "";
 if ($this->ver_costo == "SI") { $ver_costo_look .= "SI" ;} 
 if (empty($ver_costo_look)) { $ver_costo_look = $this->ver_costo; }
?>
<input type="hidden" name="ver_costo" value="<?php echo $this->form_encode_input($ver_costo) . "\">" . $ver_costo_look . ""; ?>
<?php } else { ?>

<?php

$ver_costo_look = "";
 if ($this->ver_costo == "SI") { $ver_costo_look .= "SI" ;} 
 if (empty($ver_costo_look)) { $ver_costo_look = $this->ver_costo; }
?>
<span id="id_read_on_ver_costo" class="css_ver_costo_line" style="<?php echo $sStyleReadLab_ver_costo; ?>"><?php echo $this->form_format_readonly("ver_costo", $this->form_encode_input($ver_costo_look)); ?></span><span id="id_read_off_ver_costo" class="css_read_off_ver_costo css_ver_costo_line" style="<?php echo $sStyleReadInp_ver_costo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_costo\" style=\"display: inline-block\" class=\"css_ver_costo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_costo_line"><?php $tempOptionId = "id-opt-ver_costo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_costo sc-ui-checkbox-ver_costo" name="ver_costo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_costo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_costo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_costo')", "nm_mostra_mens('ver_costo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_costo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_costo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_proveedor']))
   {
       $this->nm_new_label['ver_proveedor'] = "Ver Proveedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_proveedor = $this->ver_proveedor;
   $sStyleHidden_ver_proveedor = '';
   if (isset($this->nmgp_cmp_hidden['ver_proveedor']) && $this->nmgp_cmp_hidden['ver_proveedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_proveedor']);
       $sStyleHidden_ver_proveedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_proveedor = 'display: none;';
   $sStyleReadInp_ver_proveedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_proveedor']) && $this->nmgp_cmp_readonly['ver_proveedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_proveedor']);
       $sStyleReadLab_ver_proveedor = '';
       $sStyleReadInp_ver_proveedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_proveedor']) && $this->nmgp_cmp_hidden['ver_proveedor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_proveedor" value="<?php echo $this->form_encode_input($this->ver_proveedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_proveedor_1 = explode(";", trim($this->ver_proveedor));
  } 
  else
  {
      if (empty($this->ver_proveedor))
      {
          $this->ver_proveedor_1= array(); 
          $this->ver_proveedor= "NO";
      } 
      else
      {
          $this->ver_proveedor_1= $this->ver_proveedor; 
          $this->ver_proveedor= ""; 
          foreach ($this->ver_proveedor_1 as $cada_ver_proveedor)
          {
             if (!empty($ver_proveedor))
             {
                 $this->ver_proveedor.= ";"; 
             } 
             $this->ver_proveedor.= $cada_ver_proveedor; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_proveedor_line" id="hidden_field_data_ver_proveedor" style="<?php echo $sStyleHidden_ver_proveedor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_proveedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_proveedor_label" style=""><span id="id_label_ver_proveedor"><?php echo $this->nm_new_label['ver_proveedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_proveedor"]) &&  $this->nmgp_cmp_readonly["ver_proveedor"] == "on") { 

$ver_proveedor_look = "";
 if ($this->ver_proveedor == "SI") { $ver_proveedor_look .= "SI" ;} 
 if (empty($ver_proveedor_look)) { $ver_proveedor_look = $this->ver_proveedor; }
?>
<input type="hidden" name="ver_proveedor" value="<?php echo $this->form_encode_input($ver_proveedor) . "\">" . $ver_proveedor_look . ""; ?>
<?php } else { ?>

<?php

$ver_proveedor_look = "";
 if ($this->ver_proveedor == "SI") { $ver_proveedor_look .= "SI" ;} 
 if (empty($ver_proveedor_look)) { $ver_proveedor_look = $this->ver_proveedor; }
?>
<span id="id_read_on_ver_proveedor" class="css_ver_proveedor_line" style="<?php echo $sStyleReadLab_ver_proveedor; ?>"><?php echo $this->form_format_readonly("ver_proveedor", $this->form_encode_input($ver_proveedor_look)); ?></span><span id="id_read_off_ver_proveedor" class="css_read_off_ver_proveedor css_ver_proveedor_line" style="<?php echo $sStyleReadInp_ver_proveedor; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_proveedor\" style=\"display: inline-block\" class=\"css_ver_proveedor_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_proveedor_line"><?php $tempOptionId = "id-opt-ver_proveedor" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_proveedor sc-ui-checkbox-ver_proveedor" name="ver_proveedor[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_proveedor'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_proveedor_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_proveedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_proveedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_combo']))
   {
       $this->nm_new_label['ver_combo'] = "Ver Combo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_combo = $this->ver_combo;
   $sStyleHidden_ver_combo = '';
   if (isset($this->nmgp_cmp_hidden['ver_combo']) && $this->nmgp_cmp_hidden['ver_combo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_combo']);
       $sStyleHidden_ver_combo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_combo = 'display: none;';
   $sStyleReadInp_ver_combo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_combo']) && $this->nmgp_cmp_readonly['ver_combo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_combo']);
       $sStyleReadLab_ver_combo = '';
       $sStyleReadInp_ver_combo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_combo']) && $this->nmgp_cmp_hidden['ver_combo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_combo" value="<?php echo $this->form_encode_input($this->ver_combo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_combo_1 = explode(";", trim($this->ver_combo));
  } 
  else
  {
      if (empty($this->ver_combo))
      {
          $this->ver_combo_1= array(); 
          $this->ver_combo= "NO";
      } 
      else
      {
          $this->ver_combo_1= $this->ver_combo; 
          $this->ver_combo= ""; 
          foreach ($this->ver_combo_1 as $cada_ver_combo)
          {
             if (!empty($ver_combo))
             {
                 $this->ver_combo.= ";"; 
             } 
             $this->ver_combo.= $cada_ver_combo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_ver_combo_line" id="hidden_field_data_ver_combo" style="<?php echo $sStyleHidden_ver_combo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_combo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ver_combo_label" style=""><span id="id_label_ver_combo"><?php echo $this->nm_new_label['ver_combo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_combo"]) &&  $this->nmgp_cmp_readonly["ver_combo"] == "on") { 

$ver_combo_look = "";
 if ($this->ver_combo == "SI") { $ver_combo_look .= "SI" ;} 
 if (empty($ver_combo_look)) { $ver_combo_look = $this->ver_combo; }
?>
<input type="hidden" name="ver_combo" value="<?php echo $this->form_encode_input($ver_combo) . "\">" . $ver_combo_look . ""; ?>
<?php } else { ?>

<?php

$ver_combo_look = "";
 if ($this->ver_combo == "SI") { $ver_combo_look .= "SI" ;} 
 if (empty($ver_combo_look)) { $ver_combo_look = $this->ver_combo; }
?>
<span id="id_read_on_ver_combo" class="css_ver_combo_line" style="<?php echo $sStyleReadLab_ver_combo; ?>"><?php echo $this->form_format_readonly("ver_combo", $this->form_encode_input($ver_combo_look)); ?></span><span id="id_read_off_ver_combo" class="css_read_off_ver_combo css_ver_combo_line" style="<?php echo $sStyleReadInp_ver_combo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_combo\" style=\"display: inline-block\" class=\"css_ver_combo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_combo_line"><?php $tempOptionId = "id-opt-ver_combo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_combo sc-ui-checkbox-ver_combo" name="ver_combo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_ver_combo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_combo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_combo')", "nm_mostra_mens('ver_combo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_combo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_combo_text"></span></td></tr></table></td></tr></table> </TD>
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
