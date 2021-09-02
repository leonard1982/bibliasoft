<div id="form_configuraciones_mob_form1" style='<?php echo ($this->tabCssClass["form_configuraciones_mob_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['essociedad']))
   {
       $this->nm_new_label['essociedad'] = "Responsable autoretención (Antiguo CREE):";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $essociedad = $this->essociedad;
   $sStyleHidden_essociedad = '';
   if (isset($this->nmgp_cmp_hidden['essociedad']) && $this->nmgp_cmp_hidden['essociedad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['essociedad']);
       $sStyleHidden_essociedad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_essociedad = 'display: none;';
   $sStyleReadInp_essociedad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['essociedad']) && $this->nmgp_cmp_readonly['essociedad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['essociedad']);
       $sStyleReadLab_essociedad = '';
       $sStyleReadInp_essociedad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['essociedad']) && $this->nmgp_cmp_hidden['essociedad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="essociedad" value="<?php echo $this->form_encode_input($this->essociedad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->essociedad_1 = explode(";", trim($this->essociedad));
  } 
  else
  {
      if (empty($this->essociedad))
      {
          $this->essociedad_1= array(); 
          $this->essociedad= "NO";
      } 
      else
      {
          $this->essociedad_1= $this->essociedad; 
          $this->essociedad= ""; 
          foreach ($this->essociedad_1 as $cada_essociedad)
          {
             if (!empty($essociedad))
             {
                 $this->essociedad.= ";"; 
             } 
             $this->essociedad.= $cada_essociedad; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_essociedad_line" id="hidden_field_data_essociedad" style="<?php echo $sStyleHidden_essociedad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_essociedad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_essociedad_label" style=""><span id="id_label_essociedad"><?php echo $this->nm_new_label['essociedad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["essociedad"]) &&  $this->nmgp_cmp_readonly["essociedad"] == "on") { 

$essociedad_look = "";
 if ($this->essociedad == "SI") { $essociedad_look .= "" ;} 
 if (empty($essociedad_look)) { $essociedad_look = $this->essociedad; }
?>
<input type="hidden" name="essociedad" value="<?php echo $this->form_encode_input($essociedad) . "\">" . $essociedad_look . ""; ?>
<?php } else { ?>

<?php

$essociedad_look = "";
 if ($this->essociedad == "SI") { $essociedad_look .= "" ;} 
 if (empty($essociedad_look)) { $essociedad_look = $this->essociedad; }
?>
<span id="id_read_on_essociedad" class="css_essociedad_line" style="<?php echo $sStyleReadLab_essociedad; ?>"><?php echo $this->form_format_readonly("essociedad", $this->form_encode_input($essociedad_look)); ?></span><span id="id_read_off_essociedad" class="css_read_off_essociedad css_essociedad_line" style="<?php echo $sStyleReadInp_essociedad; ?>"><?php echo "<div id=\"idAjaxCheckbox_essociedad\" style=\"display: inline-block\" class=\"css_essociedad_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_essociedad_line"><?php $tempOptionId = "id-opt-essociedad" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-essociedad sc-ui-checkbox-essociedad" name="essociedad[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_essociedad'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->essociedad_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_essociedad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_essociedad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['grancontr']))
   {
       $this->nm_new_label['grancontr'] = "Auto retenedor en la fuente:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grancontr = $this->grancontr;
   $sStyleHidden_grancontr = '';
   if (isset($this->nmgp_cmp_hidden['grancontr']) && $this->nmgp_cmp_hidden['grancontr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grancontr']);
       $sStyleHidden_grancontr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grancontr = 'display: none;';
   $sStyleReadInp_grancontr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grancontr']) && $this->nmgp_cmp_readonly['grancontr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grancontr']);
       $sStyleReadLab_grancontr = '';
       $sStyleReadInp_grancontr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grancontr']) && $this->nmgp_cmp_hidden['grancontr'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grancontr" value="<?php echo $this->form_encode_input($this->grancontr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->grancontr_1 = explode(";", trim($this->grancontr));
  } 
  else
  {
      if (empty($this->grancontr))
      {
          $this->grancontr_1= array(); 
          $this->grancontr= "NO";
      } 
      else
      {
          $this->grancontr_1= $this->grancontr; 
          $this->grancontr= ""; 
          foreach ($this->grancontr_1 as $cada_grancontr)
          {
             if (!empty($grancontr))
             {
                 $this->grancontr.= ";"; 
             } 
             $this->grancontr.= $cada_grancontr; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_grancontr_line" id="hidden_field_data_grancontr" style="<?php echo $sStyleHidden_grancontr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grancontr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_grancontr_label" style=""><span id="id_label_grancontr"><?php echo $this->nm_new_label['grancontr']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grancontr"]) &&  $this->nmgp_cmp_readonly["grancontr"] == "on") { 

$grancontr_look = "";
 if ($this->grancontr == "SI") { $grancontr_look .= "" ;} 
 if (empty($grancontr_look)) { $grancontr_look = $this->grancontr; }
?>
<input type="hidden" name="grancontr" value="<?php echo $this->form_encode_input($grancontr) . "\">" . $grancontr_look . ""; ?>
<?php } else { ?>

<?php

$grancontr_look = "";
 if ($this->grancontr == "SI") { $grancontr_look .= "" ;} 
 if (empty($grancontr_look)) { $grancontr_look = $this->grancontr; }
?>
<span id="id_read_on_grancontr" class="css_grancontr_line" style="<?php echo $sStyleReadLab_grancontr; ?>"><?php echo $this->form_format_readonly("grancontr", $this->form_encode_input($grancontr_look)); ?></span><span id="id_read_off_grancontr" class="css_read_off_grancontr css_grancontr_line" style="<?php echo $sStyleReadInp_grancontr; ?>"><?php echo "<div id=\"idAjaxCheckbox_grancontr\" style=\"display: inline-block\" class=\"css_grancontr_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_grancontr_line"><?php $tempOptionId = "id-opt-grancontr" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-grancontr sc-ui-checkbox-grancontr" name="grancontr[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_mob']['Lookup_grancontr'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->grancontr_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grancontr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grancontr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idconfiguraciones']))
    {
        $this->nm_new_label['idconfiguraciones'] = "Idconfiguraciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idconfiguraciones = $this->idconfiguraciones;
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
   $sStyleHidden_idconfiguraciones = '';
   if (isset($this->nmgp_cmp_hidden['idconfiguraciones']) && $this->nmgp_cmp_hidden['idconfiguraciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idconfiguraciones']);
       $sStyleHidden_idconfiguraciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idconfiguraciones = 'display: none;';
   $sStyleReadInp_idconfiguraciones = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idconfiguraciones"]) &&  $this->nmgp_cmp_readonly["idconfiguraciones"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idconfiguraciones']);
       $sStyleReadLab_idconfiguraciones = '';
       $sStyleReadInp_idconfiguraciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idconfiguraciones']) && $this->nmgp_cmp_hidden['idconfiguraciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idconfiguraciones" value="<?php echo $this->form_encode_input($idconfiguraciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idconfiguraciones_line" id="hidden_field_data_idconfiguraciones" style="<?php echo $sStyleHidden_idconfiguraciones; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idconfiguraciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idconfiguraciones_label" style=""><span id="id_label_idconfiguraciones"><?php echo $this->nm_new_label['idconfiguraciones']; ?></span></span><br><span id="id_read_on_idconfiguraciones" class="css_idconfiguraciones_line" style="<?php echo $sStyleReadLab_idconfiguraciones; ?>"><?php echo $this->form_format_readonly("idconfiguraciones", $this->form_encode_input($this->idconfiguraciones)); ?></span><span id="id_read_off_idconfiguraciones" class="css_read_off_idconfiguraciones" style="<?php echo $sStyleReadInp_idconfiguraciones; ?>"><input type="hidden" name="idconfiguraciones" value="<?php echo $this->form_encode_input($idconfiguraciones) . "\">"?><span id="id_ajax_label_idconfiguraciones"><?php echo nl2br($idconfiguraciones); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idconfiguraciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idconfiguraciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
