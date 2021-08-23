<div id="form_cloud_webservicefe_form2" style='<?php echo ($this->tabCssClass["form_cloud_webservicefe_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idwebservicefe']))
   {
       $this->nmgp_cmp_hidden['idwebservicefe'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_empresa']))
   {
       $this->nmgp_cmp_hidden['id_empresa'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->apl['100perc_classes']['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idwebservicefe']))
           {
               $this->nmgp_cmp_readonly['idwebservicefe'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Datos Proveedor Anterior</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['proveedor_anterior']))
   {
       $this->nm_new_label['proveedor_anterior'] = "Proveedor Anterior";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proveedor_anterior = $this->proveedor_anterior;
   $sStyleHidden_proveedor_anterior = '';
   if (isset($this->nmgp_cmp_hidden['proveedor_anterior']) && $this->nmgp_cmp_hidden['proveedor_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proveedor_anterior']);
       $sStyleHidden_proveedor_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proveedor_anterior = 'display: none;';
   $sStyleReadInp_proveedor_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proveedor_anterior']) && $this->nmgp_cmp_readonly['proveedor_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proveedor_anterior']);
       $sStyleReadLab_proveedor_anterior = '';
       $sStyleReadInp_proveedor_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proveedor_anterior']) && $this->nmgp_cmp_hidden['proveedor_anterior'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proveedor_anterior" value="<?php echo $this->form_encode_input($this->proveedor_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proveedor_anterior_line" id="hidden_field_data_proveedor_anterior" style="<?php echo $sStyleHidden_proveedor_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proveedor_anterior_label" style=""><span id="id_label_proveedor_anterior"><?php echo $this->nm_new_label['proveedor_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor_anterior"]) &&  $this->nmgp_cmp_readonly["proveedor_anterior"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'] = array(); 
    }

   $old_value_idwebservicefe = $this->idwebservicefe;
   $old_value_id_empresa = $this->id_empresa;
   $this->nm_tira_formatacao();


   $unformatted_value_idwebservicefe = $this->idwebservicefe;
   $unformatted_value_id_empresa = $this->id_empresa;

   $nm_comando = "SELECT id_proveedores, proveedor  FROM cloud_webservice_proveedores  ORDER BY proveedor";

   $this->idwebservicefe = $old_value_idwebservicefe;
   $this->id_empresa = $old_value_id_empresa;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'][] = $rs->fields[0];
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
   $proveedor_anterior_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->proveedor_anterior_1))
          {
              foreach ($this->proveedor_anterior_1 as $tmp_proveedor_anterior)
              {
                  if (trim($tmp_proveedor_anterior) === trim($cadaselect[1])) { $proveedor_anterior_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->proveedor_anterior) === trim($cadaselect[1])) { $proveedor_anterior_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="proveedor_anterior" value="<?php echo $this->form_encode_input($proveedor_anterior) . "\">" . $proveedor_anterior_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_proveedor_anterior();
   $x = 0 ; 
   $proveedor_anterior_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->proveedor_anterior_1))
          {
              foreach ($this->proveedor_anterior_1 as $tmp_proveedor_anterior)
              {
                  if (trim($tmp_proveedor_anterior) === trim($cadaselect[1])) { $proveedor_anterior_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->proveedor_anterior) === trim($cadaselect[1])) { $proveedor_anterior_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($proveedor_anterior_look))
          {
              $proveedor_anterior_look = $this->proveedor_anterior;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_proveedor_anterior\" class=\"css_proveedor_anterior_line\" style=\"" .  $sStyleReadLab_proveedor_anterior . "\">" . $this->form_format_readonly("proveedor_anterior", $this->form_encode_input($proveedor_anterior_look)) . "</span><span id=\"id_read_off_proveedor_anterior\" class=\"css_read_off_proveedor_anterior" . $this->apl['100perc_classes']['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_proveedor_anterior . "\">";
   echo " <span id=\"idAjaxSelect_proveedor_anterior\" class=\"" . $this->apl['100perc_classes']['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_proveedor_anterior_obj" . $this->apl['100perc_classes']['input'] . "\" style=\"\" id=\"id_sc_field_proveedor_anterior\" name=\"proveedor_anterior\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['Lookup_proveedor_anterior'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->proveedor_anterior) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->proveedor_anterior)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proveedor_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proveedor_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token_anterior']))
    {
        $this->nm_new_label['token_anterior'] = "Token Anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token_anterior = $this->token_anterior;
   $sStyleHidden_token_anterior = '';
   if (isset($this->nmgp_cmp_hidden['token_anterior']) && $this->nmgp_cmp_hidden['token_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token_anterior']);
       $sStyleHidden_token_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token_anterior = 'display: none;';
   $sStyleReadInp_token_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token_anterior']) && $this->nmgp_cmp_readonly['token_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token_anterior']);
       $sStyleReadLab_token_anterior = '';
       $sStyleReadInp_token_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token_anterior']) && $this->nmgp_cmp_hidden['token_anterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_token_anterior_line" id="hidden_field_data_token_anterior" style="<?php echo $sStyleHidden_token_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_token_anterior_label" style=""><span id="id_label_token_anterior"><?php echo $this->nm_new_label['token_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token_anterior"]) &&  $this->nmgp_cmp_readonly["token_anterior"] == "on") { 

 ?>
<input type="hidden" name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) . "\">" . $token_anterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_token_anterior" class="sc-ui-readonly-token_anterior css_token_anterior_line" style="<?php echo $sStyleReadLab_token_anterior; ?>"><?php echo $this->form_format_readonly("token_anterior", $this->form_encode_input($this->token_anterior)); ?></span><span id="id_read_off_token_anterior" class="css_read_off_token_anterior<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token_anterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_anterior_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_token_anterior" type=text name="token_anterior" value="<?php echo $this->form_encode_input($token_anterior) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['passwor_anterior']))
    {
        $this->nm_new_label['passwor_anterior'] = "Passwor Anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $passwor_anterior = $this->passwor_anterior;
   $sStyleHidden_passwor_anterior = '';
   if (isset($this->nmgp_cmp_hidden['passwor_anterior']) && $this->nmgp_cmp_hidden['passwor_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['passwor_anterior']);
       $sStyleHidden_passwor_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_passwor_anterior = 'display: none;';
   $sStyleReadInp_passwor_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['passwor_anterior']) && $this->nmgp_cmp_readonly['passwor_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['passwor_anterior']);
       $sStyleReadLab_passwor_anterior = '';
       $sStyleReadInp_passwor_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['passwor_anterior']) && $this->nmgp_cmp_hidden['passwor_anterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="passwor_anterior" value="<?php echo $this->form_encode_input($passwor_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_passwor_anterior_line" id="hidden_field_data_passwor_anterior" style="<?php echo $sStyleHidden_passwor_anterior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_passwor_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_passwor_anterior_label" style=""><span id="id_label_passwor_anterior"><?php echo $this->nm_new_label['passwor_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["passwor_anterior"]) &&  $this->nmgp_cmp_readonly["passwor_anterior"] == "on") { 

 ?>
<input type="hidden" name="passwor_anterior" value="<?php echo $this->form_encode_input($passwor_anterior) . "\">" . $passwor_anterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_passwor_anterior" class="sc-ui-readonly-passwor_anterior css_passwor_anterior_line" style="<?php echo $sStyleReadLab_passwor_anterior; ?>"><?php echo $this->form_format_readonly("passwor_anterior", $this->form_encode_input($this->passwor_anterior)); ?></span><span id="id_read_off_passwor_anterior" class="css_read_off_passwor_anterior<?php echo $this->apl['100perc_classes']['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_passwor_anterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_passwor_anterior_obj<?php echo $this->apl['100perc_classes']['input'] ?>" style="" id="id_sc_field_passwor_anterior" type=text name="passwor_anterior" value="<?php echo $this->form_encode_input($passwor_anterior) ?>"
 <?php if ($this->apl['100perc_classes']['keep_field_size']) { echo "size=100"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_passwor_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_passwor_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
 $NM_pag_atual = "form_cloud_webservicefe_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_cloud_webservicefe_form" . $this->nmgp_ancora;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cloud_webservicefe");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cloud_webservicefe");
 parent.scAjaxDetailHeight("form_cloud_webservicefe", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cloud_webservicefe", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cloud_webservicefe", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_webservicefe']['buttonStatus'] = $this->nmgp_botoes;
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
