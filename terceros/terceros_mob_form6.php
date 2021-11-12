<div id="terceros_mob_form6" style='<?php echo ($this->tabCssClass["terceros_mob_form6"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_20"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_20" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['es_restaurante']))
   {
       $this->nm_new_label['es_restaurante'] = "Utilizar en Restaurante";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_restaurante = $this->es_restaurante;
   $sStyleHidden_es_restaurante = '';
   if (isset($this->nmgp_cmp_hidden['es_restaurante']) && $this->nmgp_cmp_hidden['es_restaurante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_restaurante']);
       $sStyleHidden_es_restaurante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_restaurante = 'display: none;';
   $sStyleReadInp_es_restaurante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_restaurante']) && $this->nmgp_cmp_readonly['es_restaurante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_restaurante']);
       $sStyleReadLab_es_restaurante = '';
       $sStyleReadInp_es_restaurante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_restaurante']) && $this->nmgp_cmp_hidden['es_restaurante'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="es_restaurante" value="<?php echo $this->form_encode_input($this->es_restaurante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->es_restaurante_1 = explode(";", trim($this->es_restaurante));
  } 
  else
  {
      if (empty($this->es_restaurante))
      {
          $this->es_restaurante_1= array(); 
          $this->es_restaurante= "NO";
      } 
      else
      {
          $this->es_restaurante_1= $this->es_restaurante; 
          $this->es_restaurante= ""; 
          foreach ($this->es_restaurante_1 as $cada_es_restaurante)
          {
             if (!empty($es_restaurante))
             {
                 $this->es_restaurante.= ";"; 
             } 
             $this->es_restaurante.= $cada_es_restaurante; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_es_restaurante_line" id="hidden_field_data_es_restaurante" style="<?php echo $sStyleHidden_es_restaurante; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_restaurante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_es_restaurante_label" style=""><span id="id_label_es_restaurante"><?php echo $this->nm_new_label['es_restaurante']; ?></span><span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('es_restaurante')", "nm_mostra_mens('es_restaurante')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_restaurante"]) &&  $this->nmgp_cmp_readonly["es_restaurante"] == "on") { 

$es_restaurante_look = "";
 if ($this->es_restaurante == "SI") { $es_restaurante_look .= "SI" ;} 
 if (empty($es_restaurante_look)) { $es_restaurante_look = $this->es_restaurante; }
?>
<input type="hidden" name="es_restaurante" value="<?php echo $this->form_encode_input($es_restaurante) . "\">" . $es_restaurante_look . ""; ?>
<?php } else { ?>

<?php

$es_restaurante_look = "";
 if ($this->es_restaurante == "SI") { $es_restaurante_look .= "SI" ;} 
 if (empty($es_restaurante_look)) { $es_restaurante_look = $this->es_restaurante; }
?>
<span id="id_read_on_es_restaurante" class="css_es_restaurante_line" style="<?php echo $sStyleReadLab_es_restaurante; ?>"><?php echo $this->form_format_readonly("es_restaurante", $this->form_encode_input($es_restaurante_look)); ?></span><span id="id_read_off_es_restaurante" class="css_read_off_es_restaurante css_es_restaurante_line" style="<?php echo $sStyleReadInp_es_restaurante; ?>"><?php echo "<div id=\"idAjaxCheckbox_es_restaurante\" style=\"display: inline-block\" class=\"css_es_restaurante_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_es_restaurante_line"><?php $tempOptionId = "id-opt-es_restaurante" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-es_restaurante sc-ui-checkbox-es_restaurante sc-js-input" name="es_restaurante[]" value="SI"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['Lookup_es_restaurante'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->es_restaurante_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_restaurante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_restaurante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcentaje_propina_sugerida']))
    {
        $this->nm_new_label['porcentaje_propina_sugerida'] = "% Propina Sugerida";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida;
   $sStyleHidden_porcentaje_propina_sugerida = '';
   if (isset($this->nmgp_cmp_hidden['porcentaje_propina_sugerida']) && $this->nmgp_cmp_hidden['porcentaje_propina_sugerida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcentaje_propina_sugerida']);
       $sStyleHidden_porcentaje_propina_sugerida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcentaje_propina_sugerida = 'display: none;';
   $sStyleReadInp_porcentaje_propina_sugerida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcentaje_propina_sugerida']) && $this->nmgp_cmp_readonly['porcentaje_propina_sugerida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcentaje_propina_sugerida']);
       $sStyleReadLab_porcentaje_propina_sugerida = '';
       $sStyleReadInp_porcentaje_propina_sugerida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcentaje_propina_sugerida']) && $this->nmgp_cmp_hidden['porcentaje_propina_sugerida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcentaje_propina_sugerida" value="<?php echo $this->form_encode_input($porcentaje_propina_sugerida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_porcentaje_propina_sugerida_line" id="hidden_field_data_porcentaje_propina_sugerida" style="<?php echo $sStyleHidden_porcentaje_propina_sugerida; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcentaje_propina_sugerida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_porcentaje_propina_sugerida_label" style=""><span id="id_label_porcentaje_propina_sugerida"><?php echo $this->nm_new_label['porcentaje_propina_sugerida']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcentaje_propina_sugerida"]) &&  $this->nmgp_cmp_readonly["porcentaje_propina_sugerida"] == "on") { 

 ?>
<input type="hidden" name="porcentaje_propina_sugerida" value="<?php echo $this->form_encode_input($porcentaje_propina_sugerida) . "\">" . $porcentaje_propina_sugerida . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcentaje_propina_sugerida" class="sc-ui-readonly-porcentaje_propina_sugerida css_porcentaje_propina_sugerida_line" style="<?php echo $sStyleReadLab_porcentaje_propina_sugerida; ?>"><?php echo $this->form_format_readonly("porcentaje_propina_sugerida", $this->form_encode_input($this->porcentaje_propina_sugerida)); ?></span><span id="id_read_off_porcentaje_propina_sugerida" class="css_read_off_porcentaje_propina_sugerida<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcentaje_propina_sugerida; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcentaje_propina_sugerida_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcentaje_propina_sugerida" type=text name="porcentaje_propina_sugerida" value="<?php echo $this->form_encode_input($porcentaje_propina_sugerida) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcentaje_propina_sugerida']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcentaje_propina_sugerida']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcentaje_propina_sugerida']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('porcentaje_propina_sugerida')", "nm_mostra_mens('porcentaje_propina_sugerida')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcentaje_propina_sugerida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcentaje_propina_sugerida_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-29';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-30';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-31';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-32';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
 $NM_pag_atual = "terceros_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "terceros_mob_form" . $this->nmgp_ancora;
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("terceros_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("terceros_mob");
 parent.scAjaxDetailHeight("terceros_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("terceros_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("terceros_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['sc_modal'])
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
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-17").length && $("#sc_b_new_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-17").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-18").length && $("#sc_b_ins_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-18").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-19").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-20").length && $("#sc_b_upd_t.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
		if ($("#sc_b_del_t.sc-unique-btn-21").length && $("#sc_b_del_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-6").length && $("#sys_separator.sc-unique-btn-6").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
		if ($("#sys_separator.sc-unique-btn-22").length && $("#sys_separator.sc-unique-btn-22").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-7").length && $("#sc_b_clone_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
			 return;
		}
		if ($("#sc_b_clone_t.sc-unique-btn-23").length && $("#sc_b_clone_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
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
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-25").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-26").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-27").length && $("#sc_b_sai_t.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-27").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-28").length && $("#sc_b_sai_t.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-28").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
		    if ($("#brec_b").hasClass("disabled")) {
		        return;
		    }
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-13").length && $("#sc_b_ini_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_b.sc-unique-btn-29").length && $("#sc_b_ini_b.sc-unique-btn-29").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-29").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-14").length && $("#sc_b_ret_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-30").length && $("#sc_b_ret_b.sc-unique-btn-30").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-30").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-15").length && $("#sc_b_avc_b.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-31").length && $("#sc_b_avc_b.sc-unique-btn-31").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-31").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-16").length && $("#sc_b_fim_b.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-16").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-32").length && $("#sc_b_fim_b.sc-unique-btn-32").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-32").hasClass("disabled")) {
		        return;
		    }
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
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mob']['buttonStatus'] = $this->nmgp_botoes;
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
