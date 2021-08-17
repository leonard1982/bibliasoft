<div id="form_contactos_form1" style='<?php echo ($this->tabCssClass["form_contactos_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_contacto']))
   {
       $this->nmgp_cmp_hidden['id_contacto'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_contacto']))
           {
               $this->nmgp_cmp_readonly['id_contacto'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clientes']))
    {
        $this->nm_new_label['clientes'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clientes = $this->clientes;
   $sStyleHidden_clientes = '';
   if (isset($this->nmgp_cmp_hidden['clientes']) && $this->nmgp_cmp_hidden['clientes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clientes']);
       $sStyleHidden_clientes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clientes = 'display: none;';
   $sStyleReadInp_clientes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clientes']) && $this->nmgp_cmp_readonly['clientes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clientes']);
       $sStyleReadLab_clientes = '';
       $sStyleReadInp_clientes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clientes']) && $this->nmgp_cmp_hidden['clientes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clientes" value="<?php echo $this->form_encode_input($clientes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_clientes_line" id="hidden_field_data_clientes" style="<?php echo $sStyleHidden_clientes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_clientes_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_clientes_label" style=""><span id="id_label_clientes"><?php echo $this->nm_new_label['clientes']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Clientes'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Clientes'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Clientes'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['foreign_key']['contacto'] = $this->nmgp_dados_form['id_contacto'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['where_filter'] = "contacto = " . $this->nmgp_dados_form['id_contacto'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['where_detal']  = "contacto = " . $this->nmgp_dados_form['id_contacto'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contactos']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init'] ]['form_contacto_clientes']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_contactos_empty.htm' : $this->Ini->link_form_contacto_clientes_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=300';
if (isset($this->Ini->sc_lig_target['C_@scinf_Clientes']) && 'nmsc_iframe_liga_form_contacto_clientes' != $this->Ini->sc_lig_target['C_@scinf_Clientes'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Clientes'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['form_contacto_clientes_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Clientes'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_contacto_clientes"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="300" width="534" name="nmsc_iframe_liga_form_contacto_clientes"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clientes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clientes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
