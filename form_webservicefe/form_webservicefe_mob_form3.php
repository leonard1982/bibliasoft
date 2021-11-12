<div id="form_webservicefe_mob_form3" style='<?php echo ($this->tabCssClass["form_webservicefe_mob_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Configuración Adicional Desarrollo Propio</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['envio_credenciales']))
   {
       $this->nm_new_label['envio_credenciales'] = "Envío Credenciales";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $envio_credenciales = $this->envio_credenciales;
   $sStyleHidden_envio_credenciales = '';
   if (isset($this->nmgp_cmp_hidden['envio_credenciales']) && $this->nmgp_cmp_hidden['envio_credenciales'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['envio_credenciales']);
       $sStyleHidden_envio_credenciales = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_envio_credenciales = 'display: none;';
   $sStyleReadInp_envio_credenciales = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['envio_credenciales']) && $this->nmgp_cmp_readonly['envio_credenciales'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['envio_credenciales']);
       $sStyleReadLab_envio_credenciales = '';
       $sStyleReadInp_envio_credenciales = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['envio_credenciales']) && $this->nmgp_cmp_hidden['envio_credenciales'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="envio_credenciales" value="<?php echo $this->form_encode_input($this->envio_credenciales) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->envio_credenciales_1 = explode(";", trim($this->envio_credenciales));
  } 
  else
  {
      if (empty($this->envio_credenciales))
      {
          $this->envio_credenciales_1= array(); 
          $this->envio_credenciales= "NO";
      } 
      else
      {
          $this->envio_credenciales_1= $this->envio_credenciales; 
          $this->envio_credenciales= ""; 
          foreach ($this->envio_credenciales_1 as $cada_envio_credenciales)
          {
             if (!empty($envio_credenciales))
             {
                 $this->envio_credenciales.= ";"; 
             } 
             $this->envio_credenciales.= $cada_envio_credenciales; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_envio_credenciales_line" id="hidden_field_data_envio_credenciales" style="<?php echo $sStyleHidden_envio_credenciales; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_envio_credenciales_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_envio_credenciales_label" style=""><span id="id_label_envio_credenciales"><?php echo $this->nm_new_label['envio_credenciales']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["envio_credenciales"]) &&  $this->nmgp_cmp_readonly["envio_credenciales"] == "on") { 

$envio_credenciales_look = "";
 if ($this->envio_credenciales == "SI") { $envio_credenciales_look .= "SI" ;} 
 if (empty($envio_credenciales_look)) { $envio_credenciales_look = $this->envio_credenciales; }
?>
<input type="hidden" name="envio_credenciales" value="<?php echo $this->form_encode_input($envio_credenciales) . "\">" . $envio_credenciales_look . ""; ?>
<?php } else { ?>

<?php

$envio_credenciales_look = "";
 if ($this->envio_credenciales == "SI") { $envio_credenciales_look .= "SI" ;} 
 if (empty($envio_credenciales_look)) { $envio_credenciales_look = $this->envio_credenciales; }
?>
<span id="id_read_on_envio_credenciales" class="css_envio_credenciales_line" style="<?php echo $sStyleReadLab_envio_credenciales; ?>"><?php echo $this->form_format_readonly("envio_credenciales", $this->form_encode_input($envio_credenciales_look)); ?></span><span id="id_read_off_envio_credenciales" class="css_read_off_envio_credenciales css_envio_credenciales_line" style="<?php echo $sStyleReadInp_envio_credenciales; ?>"><?php echo "<div id=\"idAjaxCheckbox_envio_credenciales\" style=\"display: inline-block\" class=\"css_envio_credenciales_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_envio_credenciales_line"><?php $tempOptionId = "id-opt-envio_credenciales" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-envio_credenciales sc-ui-checkbox-envio_credenciales" name="envio_credenciales[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_envio_credenciales'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->envio_credenciales_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('envio_credenciales')", "nm_mostra_mens('envio_credenciales')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_envio_credenciales_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_envio_credenciales_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['copia_factura_a']))
    {
        $this->nm_new_label['copia_factura_a'] = "Enviar copia de factura electrónica a";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copia_factura_a = $this->copia_factura_a;
   $sStyleHidden_copia_factura_a = '';
   if (isset($this->nmgp_cmp_hidden['copia_factura_a']) && $this->nmgp_cmp_hidden['copia_factura_a'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copia_factura_a']);
       $sStyleHidden_copia_factura_a = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copia_factura_a = 'display: none;';
   $sStyleReadInp_copia_factura_a = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copia_factura_a']) && $this->nmgp_cmp_readonly['copia_factura_a'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copia_factura_a']);
       $sStyleReadLab_copia_factura_a = '';
       $sStyleReadInp_copia_factura_a = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copia_factura_a']) && $this->nmgp_cmp_hidden['copia_factura_a'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="copia_factura_a" value="<?php echo $this->form_encode_input($copia_factura_a) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_copia_factura_a_line" id="hidden_field_data_copia_factura_a" style="<?php echo $sStyleHidden_copia_factura_a; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_copia_factura_a_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_copia_factura_a_label" style=""><span id="id_label_copia_factura_a"><?php echo $this->nm_new_label['copia_factura_a']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["copia_factura_a"]) &&  $this->nmgp_cmp_readonly["copia_factura_a"] == "on") { 

 ?>
<input type="hidden" name="copia_factura_a" value="<?php echo $this->form_encode_input($copia_factura_a) . "\">" . $copia_factura_a . ""; ?>
<?php } else { ?>
<span id="id_read_on_copia_factura_a" class="sc-ui-readonly-copia_factura_a css_copia_factura_a_line" style="<?php echo $sStyleReadLab_copia_factura_a; ?>"><?php echo $this->form_format_readonly("copia_factura_a", $this->form_encode_input($this->copia_factura_a)); ?></span><span id="id_read_off_copia_factura_a" class="css_read_off_copia_factura_a<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_copia_factura_a; ?>">
 <input class="sc-js-input scFormObjectOdd css_copia_factura_a_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_copia_factura_a" type=text name="copia_factura_a" value="<?php echo $this->form_encode_input($copia_factura_a) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'correo@dominio.com', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><img src="../_lib/img/scriptcase__NM__nm_transparent.gif" style="vertical-align: middle; display: none" class="sc-js-ui-statusimg" id="id_sc_status_copia_factura_a" />&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.copia_factura_a.value != '') {window.open('mailto:' + document.F1.copia_factura_a.value); }", "if (document.F1.copia_factura_a.value != '') {window.open('mailto:' + document.F1.copia_factura_a.value); }", "copia_factura_a_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_copia_factura_a_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_copia_factura_a_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['plantillas_correo']))
   {
       $this->nm_new_label['plantillas_correo'] = "Activar el uso de plantillas de correo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $plantillas_correo = $this->plantillas_correo;
   $sStyleHidden_plantillas_correo = '';
   if (isset($this->nmgp_cmp_hidden['plantillas_correo']) && $this->nmgp_cmp_hidden['plantillas_correo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['plantillas_correo']);
       $sStyleHidden_plantillas_correo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_plantillas_correo = 'display: none;';
   $sStyleReadInp_plantillas_correo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['plantillas_correo']) && $this->nmgp_cmp_readonly['plantillas_correo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['plantillas_correo']);
       $sStyleReadLab_plantillas_correo = '';
       $sStyleReadInp_plantillas_correo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['plantillas_correo']) && $this->nmgp_cmp_hidden['plantillas_correo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="plantillas_correo" value="<?php echo $this->form_encode_input($this->plantillas_correo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->plantillas_correo_1 = explode(";", trim($this->plantillas_correo));
  } 
  else
  {
      if (empty($this->plantillas_correo))
      {
          $this->plantillas_correo_1= array(); 
          $this->plantillas_correo= "NO";
      } 
      else
      {
          $this->plantillas_correo_1= $this->plantillas_correo; 
          $this->plantillas_correo= ""; 
          foreach ($this->plantillas_correo_1 as $cada_plantillas_correo)
          {
             if (!empty($plantillas_correo))
             {
                 $this->plantillas_correo.= ";"; 
             } 
             $this->plantillas_correo.= $cada_plantillas_correo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_plantillas_correo_line" id="hidden_field_data_plantillas_correo" style="<?php echo $sStyleHidden_plantillas_correo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_plantillas_correo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_plantillas_correo_label" style=""><span id="id_label_plantillas_correo"><?php echo $this->nm_new_label['plantillas_correo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["plantillas_correo"]) &&  $this->nmgp_cmp_readonly["plantillas_correo"] == "on") { 

$plantillas_correo_look = "";
 if ($this->plantillas_correo == "SI") { $plantillas_correo_look .= "SI" ;} 
 if (empty($plantillas_correo_look)) { $plantillas_correo_look = $this->plantillas_correo; }
?>
<input type="hidden" name="plantillas_correo" value="<?php echo $this->form_encode_input($plantillas_correo) . "\">" . $plantillas_correo_look . ""; ?>
<?php } else { ?>

<?php

$plantillas_correo_look = "";
 if ($this->plantillas_correo == "SI") { $plantillas_correo_look .= "SI" ;} 
 if (empty($plantillas_correo_look)) { $plantillas_correo_look = $this->plantillas_correo; }
?>
<span id="id_read_on_plantillas_correo" class="css_plantillas_correo_line" style="<?php echo $sStyleReadLab_plantillas_correo; ?>"><?php echo $this->form_format_readonly("plantillas_correo", $this->form_encode_input($plantillas_correo_look)); ?></span><span id="id_read_off_plantillas_correo" class="css_read_off_plantillas_correo css_plantillas_correo_line" style="<?php echo $sStyleReadInp_plantillas_correo; ?>"><?php echo "<div id=\"idAjaxCheckbox_plantillas_correo\" style=\"display: inline-block\" class=\"css_plantillas_correo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_plantillas_correo_line"><?php $tempOptionId = "id-opt-plantillas_correo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-plantillas_correo sc-ui-checkbox-plantillas_correo" name="plantillas_correo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantillas_correo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->plantillas_correo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('plantillas_correo')", "nm_mostra_mens('plantillas_correo')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_plantillas_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_plantillas_correo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['plantilla_pordefecto']))
   {
       $this->nm_new_label['plantilla_pordefecto'] = "Plantilla Por Defecto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $plantilla_pordefecto = $this->plantilla_pordefecto;
   $sStyleHidden_plantilla_pordefecto = '';
   if (isset($this->nmgp_cmp_hidden['plantilla_pordefecto']) && $this->nmgp_cmp_hidden['plantilla_pordefecto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['plantilla_pordefecto']);
       $sStyleHidden_plantilla_pordefecto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_plantilla_pordefecto = 'display: none;';
   $sStyleReadInp_plantilla_pordefecto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['plantilla_pordefecto']) && $this->nmgp_cmp_readonly['plantilla_pordefecto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['plantilla_pordefecto']);
       $sStyleReadLab_plantilla_pordefecto = '';
       $sStyleReadInp_plantilla_pordefecto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['plantilla_pordefecto']) && $this->nmgp_cmp_hidden['plantilla_pordefecto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="plantilla_pordefecto" value="<?php echo $this->form_encode_input($this->plantilla_pordefecto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_plantilla_pordefecto_line" id="hidden_field_data_plantilla_pordefecto" style="<?php echo $sStyleHidden_plantilla_pordefecto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_plantilla_pordefecto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_plantilla_pordefecto_label" style=""><span id="id_label_plantilla_pordefecto"><?php echo $this->nm_new_label['plantilla_pordefecto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["plantilla_pordefecto"]) &&  $this->nmgp_cmp_readonly["plantilla_pordefecto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'] = array(); 
    }
   $enviar_dian_val_str = "";
   if (!empty($this->enviar_dian))
   {
       if (is_array($this->enviar_dian))
       {
           $Tmp_array = $this->enviar_dian;
       }
       else
       {
           $Tmp_array = explode(";", $this->enviar_dian);
       }
       $enviar_dian_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enviar_dian_val_str)
          {
             $enviar_dian_val_str .= ", ";
          }
          $enviar_dian_val_str .= $Tmp_val_cmp;
       }
   }
   $enviar_cliente_val_str = "";
   if (!empty($this->enviar_cliente))
   {
       if (is_array($this->enviar_cliente))
       {
           $Tmp_array = $this->enviar_cliente;
       }
       else
       {
           $Tmp_array = explode(";", $this->enviar_cliente);
       }
       $enviar_cliente_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $enviar_cliente_val_str)
          {
             $enviar_cliente_val_str .= ", ";
          }
          $enviar_cliente_val_str .= $Tmp_val_cmp;
       }
   }
   $envio_credenciales_val_str = "''";
   if (!empty($this->envio_credenciales))
   {
       if (is_array($this->envio_credenciales))
       {
           $Tmp_array = $this->envio_credenciales;
       }
       else
       {
           $Tmp_array = explode(";", $this->envio_credenciales);
       }
       $envio_credenciales_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $envio_credenciales_val_str)
          {
             $envio_credenciales_val_str .= ", ";
          }
          $envio_credenciales_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $plantillas_correo_val_str = "''";
   if (!empty($this->plantillas_correo))
   {
       if (is_array($this->plantillas_correo))
       {
           $Tmp_array = $this->plantillas_correo;
       }
       else
       {
           $Tmp_array = explode(";", $this->plantillas_correo);
       }
       $plantillas_correo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $plantillas_correo_val_str)
          {
             $plantillas_correo_val_str .= ", ";
          }
          $plantillas_correo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT id, descripcion  FROM plantillas_correo_propio  ORDER BY descripcion";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'][] = $rs->fields[0];
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
   $plantilla_pordefecto_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->plantilla_pordefecto_1))
          {
              foreach ($this->plantilla_pordefecto_1 as $tmp_plantilla_pordefecto)
              {
                  if (trim($tmp_plantilla_pordefecto) === trim($cadaselect[1])) { $plantilla_pordefecto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->plantilla_pordefecto) === trim($cadaselect[1])) { $plantilla_pordefecto_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="plantilla_pordefecto" value="<?php echo $this->form_encode_input($plantilla_pordefecto) . "\">" . $plantilla_pordefecto_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_plantilla_pordefecto();
   $x = 0 ; 
   $plantilla_pordefecto_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->plantilla_pordefecto_1))
          {
              foreach ($this->plantilla_pordefecto_1 as $tmp_plantilla_pordefecto)
              {
                  if (trim($tmp_plantilla_pordefecto) === trim($cadaselect[1])) { $plantilla_pordefecto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->plantilla_pordefecto) === trim($cadaselect[1])) { $plantilla_pordefecto_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($plantilla_pordefecto_look))
          {
              $plantilla_pordefecto_look = $this->plantilla_pordefecto;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_plantilla_pordefecto\" class=\"css_plantilla_pordefecto_line\" style=\"" .  $sStyleReadLab_plantilla_pordefecto . "\">" . $this->form_format_readonly("plantilla_pordefecto", $this->form_encode_input($plantilla_pordefecto_look)) . "</span><span id=\"id_read_off_plantilla_pordefecto\" class=\"css_read_off_plantilla_pordefecto" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_plantilla_pordefecto . "\">";
   echo " <span id=\"idAjaxSelect_plantilla_pordefecto\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_plantilla_pordefecto_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_plantilla_pordefecto\" name=\"plantilla_pordefecto\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_plantilla_pordefecto'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->plantilla_pordefecto) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->plantilla_pordefecto)) 
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
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('plantilla_pordefecto')", "nm_mostra_mens('plantilla_pordefecto')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_plantilla_pordefecto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_plantilla_pordefecto_text"></span></td></tr></table></td></tr></table> </TD>
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
 $NM_pag_atual = "form_webservicefe_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_webservicefe_mob_form" . $this->nmgp_ancora;
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
  $nm_sc_blocos_da_pag = array(0,1,2,3);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_webservicefe_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_webservicefe_mob");
 parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_webservicefe_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['sc_modal'])
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
		    if ($("#sc_b_upd_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['buttonStatus'] = $this->nmgp_botoes;
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
