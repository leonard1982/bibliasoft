<div id="terceros170521_mob_form5" style='<?php echo ($this->tabCssClass["terceros170521_mob_form5"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_18"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_18" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
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
    if (!isset($this->nm_new_label['archivos']))
    {
        $this->nm_new_label['archivos'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archivos = $this->archivos;
   $sStyleHidden_archivos = '';
   if (isset($this->nmgp_cmp_hidden['archivos']) && $this->nmgp_cmp_hidden['archivos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archivos']);
       $sStyleHidden_archivos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archivos = 'display: none;';
   $sStyleReadInp_archivos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archivos']) && $this->nmgp_cmp_readonly['archivos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archivos']);
       $sStyleReadLab_archivos = '';
       $sStyleReadInp_archivos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archivos']) && $this->nmgp_cmp_hidden['archivos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivos" value="<?php echo $this->form_encode_input($archivos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archivos_line" id="hidden_field_data_archivos" style="<?php echo $sStyleHidden_archivos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_archivos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_archivos_label" style=""><span id="id_label_archivos"><?php echo $this->nm_new_label['archivos']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Archivos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Archivos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Archivos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero']['embutida_pai']        = "terceros170521_mob";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero']['embutida_form_parms'] = "gcctercero*scin" . $this->nmgp_dados_form['documento'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 if (isset($this->Ini->sc_lig_md5["grid_gestor_archivos_tercero"]) && $this->Ini->sc_lig_md5["grid_gestor_archivos_tercero"] == "S") {
     $Parms_Lig  = "gcctercero*scin" . $this->nmgp_dados_form['documento'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@terceros170521_mob@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "gcctercero*scin" . $this->nmgp_dados_form['documento'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'terceros170521_mob_empty.htm' : $this->Ini->link_grid_gestor_archivos_tercero_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500' . $parms_lig_cons;
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init'] ]['grid_gestor_archivos_tercero'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_Archivos']) && 'nmsc_iframe_liga_grid_gestor_archivos_tercero' != $this->Ini->sc_lig_target['C_@scinf_Archivos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Archivos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['terceros170521_mob']['grid_gestor_archivos_tercero_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Archivos'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_gestor_archivos_tercero"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_grid_gestor_archivos_tercero"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
