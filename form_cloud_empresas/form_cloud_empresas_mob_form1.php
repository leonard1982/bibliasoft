<div id="form_cloud_empresas_mob_form1" style='<?php echo ($this->tabCssClass["form_cloud_empresas_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_empresa']))
           {
               $this->nmgp_cmp_readonly['id_empresa'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Servidor Producción</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['proveedor']))
   {
       $this->nm_new_label['proveedor'] = "Proveedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proveedor = $this->proveedor;
   $sStyleHidden_proveedor = '';
   if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proveedor']);
       $sStyleHidden_proveedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proveedor = 'display: none;';
   $sStyleReadInp_proveedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proveedor']) && $this->nmgp_cmp_readonly['proveedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proveedor']);
       $sStyleReadLab_proveedor = '';
       $sStyleReadInp_proveedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proveedor" value="<?php echo $this->form_encode_input($this->proveedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proveedor_line" id="hidden_field_data_proveedor" style="<?php echo $sStyleHidden_proveedor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proveedor_label" style=""><span id="id_label_proveedor"><?php echo $this->nm_new_label['proveedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor"]) &&  $this->nmgp_cmp_readonly["proveedor"] == "on") { 

$proveedor_look = "";
 if ($this->proveedor == "HKA") { $proveedor_look .= "THE FACTORY" ;} 
 if ($this->proveedor == "DATAICO") { $proveedor_look .= "DATAICO" ;} 
 if ($this->proveedor == "TECH") { $proveedor_look .= "FACTURA TECH" ;} 
 if ($this->proveedor == "FACILWEB") { $proveedor_look .= "FACILWEB" ;} 
 if (empty($proveedor_look)) { $proveedor_look = $this->proveedor; }
?>
<input type="hidden" name="proveedor" value="<?php echo $this->form_encode_input($proveedor) . "\">" . $proveedor_look . ""; ?>
<?php } else { ?>
<?php

$proveedor_look = "";
 if ($this->proveedor == "HKA") { $proveedor_look .= "THE FACTORY" ;} 
 if ($this->proveedor == "DATAICO") { $proveedor_look .= "DATAICO" ;} 
 if ($this->proveedor == "TECH") { $proveedor_look .= "FACTURA TECH" ;} 
 if ($this->proveedor == "FACILWEB") { $proveedor_look .= "FACILWEB" ;} 
 if (empty($proveedor_look)) { $proveedor_look = $this->proveedor; }
?>
<span id="id_read_on_proveedor" class="css_proveedor_line"  style="<?php echo $sStyleReadLab_proveedor; ?>"><?php echo $this->form_format_readonly("proveedor", $this->form_encode_input($proveedor_look)); ?></span><span id="id_read_off_proveedor" class="css_read_off_proveedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_proveedor; ?>">
 <span id="idAjaxSelect_proveedor" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_proveedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proveedor" name="proveedor" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="HKA" <?php  if ($this->proveedor == "HKA") { echo " selected" ;} ?><?php  if (empty($this->proveedor)) { echo " selected" ;} ?>>THE FACTORY</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'HKA'; ?>
 <option  value="DATAICO" <?php  if ($this->proveedor == "DATAICO") { echo " selected" ;} ?>>DATAICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'DATAICO'; ?>
 <option  value="TECH" <?php  if ($this->proveedor == "TECH") { echo " selected" ;} ?>>FACTURA TECH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'TECH'; ?>
 <option  value="FACILWEB" <?php  if ($this->proveedor == "FACILWEB") { echo " selected" ;} ?>>FACILWEB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'FACILWEB'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proveedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proveedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modo']))
   {
       $this->nm_new_label['modo'] = "Modo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modo = $this->modo;
   $sStyleHidden_modo = '';
   if (isset($this->nmgp_cmp_hidden['modo']) && $this->nmgp_cmp_hidden['modo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modo']);
       $sStyleHidden_modo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modo = 'display: none;';
   $sStyleReadInp_modo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modo']) && $this->nmgp_cmp_readonly['modo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modo']);
       $sStyleReadLab_modo = '';
       $sStyleReadInp_modo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modo']) && $this->nmgp_cmp_hidden['modo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modo" value="<?php echo $this->form_encode_input($this->modo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_modo_line" id="hidden_field_data_modo" style="<?php echo $sStyleHidden_modo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modo_label" style=""><span id="id_label_modo"><?php echo $this->nm_new_label['modo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modo"]) &&  $this->nmgp_cmp_readonly["modo"] == "on") { 

$modo_look = "";
 if ($this->modo == "DESARROLLO") { $modo_look .= "DESARROLLO" ;} 
 if ($this->modo == "PRODUCCION") { $modo_look .= "PRODUCCIÓN" ;} 
 if (empty($modo_look)) { $modo_look = $this->modo; }
?>
<input type="hidden" name="modo" value="<?php echo $this->form_encode_input($modo) . "\">" . $modo_look . ""; ?>
<?php } else { ?>
<?php

$modo_look = "";
 if ($this->modo == "DESARROLLO") { $modo_look .= "DESARROLLO" ;} 
 if ($this->modo == "PRODUCCION") { $modo_look .= "PRODUCCIÓN" ;} 
 if (empty($modo_look)) { $modo_look = $this->modo; }
?>
<span id="id_read_on_modo" class="css_modo_line"  style="<?php echo $sStyleReadLab_modo; ?>"><?php echo $this->form_format_readonly("modo", $this->form_encode_input($modo_look)); ?></span><span id="id_read_off_modo" class="css_read_off_modo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_modo; ?>">
 <span id="idAjaxSelect_modo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_modo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_modo" name="modo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="DESARROLLO" <?php  if ($this->modo == "DESARROLLO") { echo " selected" ;} ?>>DESARROLLO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_modo'][] = 'DESARROLLO'; ?>
 <option  value="PRODUCCION" <?php  if ($this->modo == "PRODUCCION") { echo " selected" ;} ?>>PRODUCCIÓN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_modo'][] = 'PRODUCCION'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modo_text"></span></td></tr></table></td></tr></table> </TD>
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
       $this->nm_new_label['enviar_dian'] = "Enviar  a la DIAN";
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

    <TD class="scFormDataOdd css_enviar_dian_line" id="hidden_field_data_enviar_dian" style="<?php echo $sStyleHidden_enviar_dian; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_dian_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_dian_label" style=""><span id="id_label_enviar_dian"><?php echo $this->nm_new_label['enviar_dian']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_dian"]) &&  $this->nmgp_cmp_readonly["enviar_dian"] == "on") { 

$enviar_dian_look = "";
 if ($this->enviar_dian == "1") { $enviar_dian_look .= "SI" ;} 
 if ($this->enviar_dian == "0") { $enviar_dian_look .= "NO" ;} 
 if (empty($enviar_dian_look)) { $enviar_dian_look = $this->enviar_dian; }
?>
<input type="hidden" name="enviar_dian" value="<?php echo $this->form_encode_input($enviar_dian) . "\">" . $enviar_dian_look . ""; ?>
<?php } else { ?>
<?php

$enviar_dian_look = "";
 if ($this->enviar_dian == "1") { $enviar_dian_look .= "SI" ;} 
 if ($this->enviar_dian == "0") { $enviar_dian_look .= "NO" ;} 
 if (empty($enviar_dian_look)) { $enviar_dian_look = $this->enviar_dian; }
?>
<span id="id_read_on_enviar_dian" class="css_enviar_dian_line"  style="<?php echo $sStyleReadLab_enviar_dian; ?>"><?php echo $this->form_format_readonly("enviar_dian", $this->form_encode_input($enviar_dian_look)); ?></span><span id="id_read_off_enviar_dian" class="css_read_off_enviar_dian<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_enviar_dian; ?>">
 <span id="idAjaxSelect_enviar_dian" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_enviar_dian_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_enviar_dian" name="enviar_dian" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->enviar_dian == "1") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_dian'][] = '1'; ?>
 <option  value="0" <?php  if ($this->enviar_dian == "0") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_dian'][] = '0'; ?>
 </select></span>
</span><?php  }?>
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
       $this->nm_new_label['enviar_cliente'] = "Enviar documento al cliente";
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

    <TD class="scFormDataOdd css_enviar_cliente_line" id="hidden_field_data_enviar_cliente" style="<?php echo $sStyleHidden_enviar_cliente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enviar_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_enviar_cliente_label" style=""><span id="id_label_enviar_cliente"><?php echo $this->nm_new_label['enviar_cliente']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enviar_cliente"]) &&  $this->nmgp_cmp_readonly["enviar_cliente"] == "on") { 

$enviar_cliente_look = "";
 if ($this->enviar_cliente == "1") { $enviar_cliente_look .= "SI" ;} 
 if ($this->enviar_cliente == "0") { $enviar_cliente_look .= "NO" ;} 
 if (empty($enviar_cliente_look)) { $enviar_cliente_look = $this->enviar_cliente; }
?>
<input type="hidden" name="enviar_cliente" value="<?php echo $this->form_encode_input($enviar_cliente) . "\">" . $enviar_cliente_look . ""; ?>
<?php } else { ?>
<?php

$enviar_cliente_look = "";
 if ($this->enviar_cliente == "1") { $enviar_cliente_look .= "SI" ;} 
 if ($this->enviar_cliente == "0") { $enviar_cliente_look .= "NO" ;} 
 if (empty($enviar_cliente_look)) { $enviar_cliente_look = $this->enviar_cliente; }
?>
<span id="id_read_on_enviar_cliente" class="css_enviar_cliente_line"  style="<?php echo $sStyleReadLab_enviar_cliente; ?>"><?php echo $this->form_format_readonly("enviar_cliente", $this->form_encode_input($enviar_cliente_look)); ?></span><span id="id_read_off_enviar_cliente" class="css_read_off_enviar_cliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_enviar_cliente; ?>">
 <span id="idAjaxSelect_enviar_cliente" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_enviar_cliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_enviar_cliente" name="enviar_cliente" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->enviar_cliente == "1") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_cliente'][] = '1'; ?>
 <option  value="0" <?php  if ($this->enviar_cliente == "0") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_cliente'][] = '0'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('enviar_cliente')", "nm_mostra_mens('enviar_cliente')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enviar_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enviar_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor1']))
    {
        $this->nm_new_label['servidor1'] = "Servidor 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor1 = $this->servidor1;
   $sStyleHidden_servidor1 = '';
   if (isset($this->nmgp_cmp_hidden['servidor1']) && $this->nmgp_cmp_hidden['servidor1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor1']);
       $sStyleHidden_servidor1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor1 = 'display: none;';
   $sStyleReadInp_servidor1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor1']) && $this->nmgp_cmp_readonly['servidor1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor1']);
       $sStyleReadLab_servidor1 = '';
       $sStyleReadInp_servidor1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor1']) && $this->nmgp_cmp_hidden['servidor1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor1" value="<?php echo $this->form_encode_input($servidor1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor1_line" id="hidden_field_data_servidor1" style="<?php echo $sStyleHidden_servidor1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor1_label" style=""><span id="id_label_servidor1"><?php echo $this->nm_new_label['servidor1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor1"]) &&  $this->nmgp_cmp_readonly["servidor1"] == "on") { 

 ?>
<input type="hidden" name="servidor1" value="<?php echo $this->form_encode_input($servidor1) . "\">" . $servidor1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor1" class="sc-ui-readonly-servidor1 css_servidor1_line" style="<?php echo $sStyleReadLab_servidor1; ?>"><?php echo $this->form_format_readonly("servidor1", $this->form_encode_input($this->servidor1)); ?></span><span id="id_read_off_servidor1" class="css_read_off_servidor1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor1; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor1" type=text name="servidor1" value="<?php echo $this->form_encode_input($servidor1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor2']))
    {
        $this->nm_new_label['servidor2'] = "Servidor 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor2 = $this->servidor2;
   $sStyleHidden_servidor2 = '';
   if (isset($this->nmgp_cmp_hidden['servidor2']) && $this->nmgp_cmp_hidden['servidor2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor2']);
       $sStyleHidden_servidor2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor2 = 'display: none;';
   $sStyleReadInp_servidor2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor2']) && $this->nmgp_cmp_readonly['servidor2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor2']);
       $sStyleReadLab_servidor2 = '';
       $sStyleReadInp_servidor2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor2']) && $this->nmgp_cmp_hidden['servidor2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor2" value="<?php echo $this->form_encode_input($servidor2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor2_line" id="hidden_field_data_servidor2" style="<?php echo $sStyleHidden_servidor2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor2_label" style=""><span id="id_label_servidor2"><?php echo $this->nm_new_label['servidor2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor2"]) &&  $this->nmgp_cmp_readonly["servidor2"] == "on") { 

 ?>
<input type="hidden" name="servidor2" value="<?php echo $this->form_encode_input($servidor2) . "\">" . $servidor2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor2" class="sc-ui-readonly-servidor2 css_servidor2_line" style="<?php echo $sStyleReadLab_servidor2; ?>"><?php echo $this->form_format_readonly("servidor2", $this->form_encode_input($this->servidor2)); ?></span><span id="id_read_off_servidor2" class="css_read_off_servidor2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor2; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor2" type=text name="servidor2" value="<?php echo $this->form_encode_input($servidor2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor3']))
    {
        $this->nm_new_label['servidor3'] = "Servidor 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor3 = $this->servidor3;
   $sStyleHidden_servidor3 = '';
   if (isset($this->nmgp_cmp_hidden['servidor3']) && $this->nmgp_cmp_hidden['servidor3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor3']);
       $sStyleHidden_servidor3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor3 = 'display: none;';
   $sStyleReadInp_servidor3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor3']) && $this->nmgp_cmp_readonly['servidor3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor3']);
       $sStyleReadLab_servidor3 = '';
       $sStyleReadInp_servidor3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor3']) && $this->nmgp_cmp_hidden['servidor3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor3" value="<?php echo $this->form_encode_input($servidor3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor3_line" id="hidden_field_data_servidor3" style="<?php echo $sStyleHidden_servidor3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor3_label" style=""><span id="id_label_servidor3"><?php echo $this->nm_new_label['servidor3']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor3"]) &&  $this->nmgp_cmp_readonly["servidor3"] == "on") { 

 ?>
<input type="hidden" name="servidor3" value="<?php echo $this->form_encode_input($servidor3) . "\">" . $servidor3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor3" class="sc-ui-readonly-servidor3 css_servidor3_line" style="<?php echo $sStyleReadLab_servidor3; ?>"><?php echo $this->form_format_readonly("servidor3", $this->form_encode_input($this->servidor3)); ?></span><span id="id_read_off_servidor3" class="css_read_off_servidor3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor3; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor3" type=text name="servidor3" value="<?php echo $this->form_encode_input($servidor3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokenempresa']))
    {
        $this->nm_new_label['tokenempresa'] = "Token Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokenempresa = $this->tokenempresa;
   $sStyleHidden_tokenempresa = '';
   if (isset($this->nmgp_cmp_hidden['tokenempresa']) && $this->nmgp_cmp_hidden['tokenempresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokenempresa']);
       $sStyleHidden_tokenempresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokenempresa = 'display: none;';
   $sStyleReadInp_tokenempresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokenempresa']) && $this->nmgp_cmp_readonly['tokenempresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokenempresa']);
       $sStyleReadLab_tokenempresa = '';
       $sStyleReadInp_tokenempresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokenempresa']) && $this->nmgp_cmp_hidden['tokenempresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokenempresa_line" id="hidden_field_data_tokenempresa" style="<?php echo $sStyleHidden_tokenempresa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokenempresa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokenempresa_label" style=""><span id="id_label_tokenempresa"><?php echo $this->nm_new_label['tokenempresa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokenempresa"]) &&  $this->nmgp_cmp_readonly["tokenempresa"] == "on") { 

 ?>
<input type="hidden" name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) . "\">" . $tokenempresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokenempresa" class="sc-ui-readonly-tokenempresa css_tokenempresa_line" style="<?php echo $sStyleReadLab_tokenempresa; ?>"><?php echo $this->form_format_readonly("tokenempresa", $this->form_encode_input($this->tokenempresa)); ?></span><span id="id_read_off_tokenempresa" class="css_read_off_tokenempresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokenempresa; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokenempresa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokenempresa" type=text name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokenempresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokenempresa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokenpassword']))
    {
        $this->nm_new_label['tokenpassword'] = "Token Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokenpassword = $this->tokenpassword;
   $sStyleHidden_tokenpassword = '';
   if (isset($this->nmgp_cmp_hidden['tokenpassword']) && $this->nmgp_cmp_hidden['tokenpassword'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokenpassword']);
       $sStyleHidden_tokenpassword = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokenpassword = 'display: none;';
   $sStyleReadInp_tokenpassword = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokenpassword']) && $this->nmgp_cmp_readonly['tokenpassword'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokenpassword']);
       $sStyleReadLab_tokenpassword = '';
       $sStyleReadInp_tokenpassword = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokenpassword']) && $this->nmgp_cmp_hidden['tokenpassword'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokenpassword_line" id="hidden_field_data_tokenpassword" style="<?php echo $sStyleHidden_tokenpassword; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokenpassword_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokenpassword_label" style=""><span id="id_label_tokenpassword"><?php echo $this->nm_new_label['tokenpassword']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokenpassword"]) &&  $this->nmgp_cmp_readonly["tokenpassword"] == "on") { 

 ?>
<input type="hidden" name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) . "\">" . $tokenpassword . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokenpassword" class="sc-ui-readonly-tokenpassword css_tokenpassword_line" style="<?php echo $sStyleReadLab_tokenpassword; ?>"><?php echo $this->form_format_readonly("tokenpassword", $this->form_encode_input($this->tokenpassword)); ?></span><span id="id_read_off_tokenpassword" class="css_read_off_tokenpassword<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokenpassword; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokenpassword_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokenpassword" type=text name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokenpassword_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokenpassword_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tokenpassword_dumb = ('' == $sStyleHidden_tokenpassword) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tokenpassword_dumb" style="<?php echo $sStyleHidden_tokenpassword_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Servidor Pruebas</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor1_pruebas']))
    {
        $this->nm_new_label['servidor1_pruebas'] = "Servidor 1 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor1_pruebas = $this->servidor1_pruebas;
   $sStyleHidden_servidor1_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor1_pruebas']) && $this->nmgp_cmp_hidden['servidor1_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor1_pruebas']);
       $sStyleHidden_servidor1_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor1_pruebas = 'display: none;';
   $sStyleReadInp_servidor1_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor1_pruebas']) && $this->nmgp_cmp_readonly['servidor1_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor1_pruebas']);
       $sStyleReadLab_servidor1_pruebas = '';
       $sStyleReadInp_servidor1_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor1_pruebas']) && $this->nmgp_cmp_hidden['servidor1_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor1_pruebas_line" id="hidden_field_data_servidor1_pruebas" style="<?php echo $sStyleHidden_servidor1_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor1_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor1_pruebas_label" style=""><span id="id_label_servidor1_pruebas"><?php echo $this->nm_new_label['servidor1_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor1_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor1_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) . "\">" . $servidor1_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor1_pruebas" class="sc-ui-readonly-servidor1_pruebas css_servidor1_pruebas_line" style="<?php echo $sStyleReadLab_servidor1_pruebas; ?>"><?php echo $this->form_format_readonly("servidor1_pruebas", $this->form_encode_input($this->servidor1_pruebas)); ?></span><span id="id_read_off_servidor1_pruebas" class="css_read_off_servidor1_pruebas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor1_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor1_pruebas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor1_pruebas" type=text name="servidor1_pruebas" value="<?php echo $this->form_encode_input($servidor1_pruebas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor1_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor1_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor2_pruebas']))
    {
        $this->nm_new_label['servidor2_pruebas'] = "Servidor 2 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor2_pruebas = $this->servidor2_pruebas;
   $sStyleHidden_servidor2_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor2_pruebas']) && $this->nmgp_cmp_hidden['servidor2_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor2_pruebas']);
       $sStyleHidden_servidor2_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor2_pruebas = 'display: none;';
   $sStyleReadInp_servidor2_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor2_pruebas']) && $this->nmgp_cmp_readonly['servidor2_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor2_pruebas']);
       $sStyleReadLab_servidor2_pruebas = '';
       $sStyleReadInp_servidor2_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor2_pruebas']) && $this->nmgp_cmp_hidden['servidor2_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor2_pruebas_line" id="hidden_field_data_servidor2_pruebas" style="<?php echo $sStyleHidden_servidor2_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor2_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor2_pruebas_label" style=""><span id="id_label_servidor2_pruebas"><?php echo $this->nm_new_label['servidor2_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor2_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor2_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) . "\">" . $servidor2_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor2_pruebas" class="sc-ui-readonly-servidor2_pruebas css_servidor2_pruebas_line" style="<?php echo $sStyleReadLab_servidor2_pruebas; ?>"><?php echo $this->form_format_readonly("servidor2_pruebas", $this->form_encode_input($this->servidor2_pruebas)); ?></span><span id="id_read_off_servidor2_pruebas" class="css_read_off_servidor2_pruebas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor2_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor2_pruebas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor2_pruebas" type=text name="servidor2_pruebas" value="<?php echo $this->form_encode_input($servidor2_pruebas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor2_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor2_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor3_pruebas']))
    {
        $this->nm_new_label['servidor3_pruebas'] = "Servidor 3 Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor3_pruebas = $this->servidor3_pruebas;
   $sStyleHidden_servidor3_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['servidor3_pruebas']) && $this->nmgp_cmp_hidden['servidor3_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor3_pruebas']);
       $sStyleHidden_servidor3_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor3_pruebas = 'display: none;';
   $sStyleReadInp_servidor3_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor3_pruebas']) && $this->nmgp_cmp_readonly['servidor3_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor3_pruebas']);
       $sStyleReadLab_servidor3_pruebas = '';
       $sStyleReadInp_servidor3_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor3_pruebas']) && $this->nmgp_cmp_hidden['servidor3_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor3_pruebas_line" id="hidden_field_data_servidor3_pruebas" style="<?php echo $sStyleHidden_servidor3_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor3_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor3_pruebas_label" style=""><span id="id_label_servidor3_pruebas"><?php echo $this->nm_new_label['servidor3_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor3_pruebas"]) &&  $this->nmgp_cmp_readonly["servidor3_pruebas"] == "on") { 

 ?>
<input type="hidden" name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) . "\">" . $servidor3_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor3_pruebas" class="sc-ui-readonly-servidor3_pruebas css_servidor3_pruebas_line" style="<?php echo $sStyleReadLab_servidor3_pruebas; ?>"><?php echo $this->form_format_readonly("servidor3_pruebas", $this->form_encode_input($this->servidor3_pruebas)); ?></span><span id="id_read_off_servidor3_pruebas" class="css_read_off_servidor3_pruebas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor3_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor3_pruebas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor3_pruebas" type=text name="servidor3_pruebas" value="<?php echo $this->form_encode_input($servidor3_pruebas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor3_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor3_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token_pruebas']))
    {
        $this->nm_new_label['token_pruebas'] = "Token Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token_pruebas = $this->token_pruebas;
   $sStyleHidden_token_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['token_pruebas']) && $this->nmgp_cmp_hidden['token_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token_pruebas']);
       $sStyleHidden_token_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token_pruebas = 'display: none;';
   $sStyleReadInp_token_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token_pruebas']) && $this->nmgp_cmp_readonly['token_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token_pruebas']);
       $sStyleReadLab_token_pruebas = '';
       $sStyleReadInp_token_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token_pruebas']) && $this->nmgp_cmp_hidden['token_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_pruebas_line" id="hidden_field_data_token_pruebas" style="<?php echo $sStyleHidden_token_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_pruebas_label" style=""><span id="id_label_token_pruebas"><?php echo $this->nm_new_label['token_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token_pruebas"]) &&  $this->nmgp_cmp_readonly["token_pruebas"] == "on") { 

 ?>
<input type="hidden" name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) . "\">" . $token_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_token_pruebas" class="sc-ui-readonly-token_pruebas css_token_pruebas_line" style="<?php echo $sStyleReadLab_token_pruebas; ?>"><?php echo $this->form_format_readonly("token_pruebas", $this->form_encode_input($this->token_pruebas)); ?></span><span id="id_read_off_token_pruebas" class="css_read_off_token_pruebas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_pruebas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_token_pruebas" type=text name="token_pruebas" value="<?php echo $this->form_encode_input($token_pruebas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password_pruebas']))
    {
        $this->nm_new_label['password_pruebas'] = "Password Pruebas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password_pruebas = $this->password_pruebas;
   $sStyleHidden_password_pruebas = '';
   if (isset($this->nmgp_cmp_hidden['password_pruebas']) && $this->nmgp_cmp_hidden['password_pruebas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password_pruebas']);
       $sStyleHidden_password_pruebas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password_pruebas = 'display: none;';
   $sStyleReadInp_password_pruebas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password_pruebas']) && $this->nmgp_cmp_readonly['password_pruebas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password_pruebas']);
       $sStyleReadLab_password_pruebas = '';
       $sStyleReadInp_password_pruebas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password_pruebas']) && $this->nmgp_cmp_hidden['password_pruebas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_password_pruebas_line" id="hidden_field_data_password_pruebas" style="<?php echo $sStyleHidden_password_pruebas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_pruebas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_password_pruebas_label" style=""><span id="id_label_password_pruebas"><?php echo $this->nm_new_label['password_pruebas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password_pruebas"]) &&  $this->nmgp_cmp_readonly["password_pruebas"] == "on") { 

 ?>
<input type="hidden" name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) . "\">" . $password_pruebas . ""; ?>
<?php } else { ?>
<span id="id_read_on_password_pruebas" class="sc-ui-readonly-password_pruebas css_password_pruebas_line" style="<?php echo $sStyleReadLab_password_pruebas; ?>"><?php echo $this->form_format_readonly("password_pruebas", $this->form_encode_input($this->password_pruebas)); ?></span><span id="id_read_off_password_pruebas" class="css_read_off_password_pruebas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password_pruebas; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_pruebas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password_pruebas" type=text name="password_pruebas" value="<?php echo $this->form_encode_input($password_pruebas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_pruebas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_pruebas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
