<div id="form_usuarios_mob_form2" style='<?php echo ($this->tabCssClass["form_usuarios_mob_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idusuarios']))
   {
       $this->nmgp_cmp_hidden['idusuarios'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idusuarios']))
           {
               $this->nmgp_cmp_readonly['idusuarios'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Impresora<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_pc']))
    {
        $this->nm_new_label['nombre_pc'] = "Nombre Pc de Red";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_pc = $this->nombre_pc;
   $sStyleHidden_nombre_pc = '';
   if (isset($this->nmgp_cmp_hidden['nombre_pc']) && $this->nmgp_cmp_hidden['nombre_pc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_pc']);
       $sStyleHidden_nombre_pc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_pc = 'display: none;';
   $sStyleReadInp_nombre_pc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_pc']) && $this->nmgp_cmp_readonly['nombre_pc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_pc']);
       $sStyleReadLab_nombre_pc = '';
       $sStyleReadInp_nombre_pc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_pc']) && $this->nmgp_cmp_hidden['nombre_pc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_pc_line" id="hidden_field_data_nombre_pc" style="<?php echo $sStyleHidden_nombre_pc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_pc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_pc_label" style=""><span id="id_label_nombre_pc"><?php echo $this->nm_new_label['nombre_pc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_pc"]) &&  $this->nmgp_cmp_readonly["nombre_pc"] == "on") { 

 ?>
<input type="hidden" name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) . "\">" . $nombre_pc . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_pc" class="sc-ui-readonly-nombre_pc css_nombre_pc_line" style="<?php echo $sStyleReadLab_nombre_pc; ?>"><?php echo $this->form_format_readonly("nombre_pc", $this->form_encode_input($this->nombre_pc)); ?></span><span id="id_read_off_nombre_pc" class="css_read_off_nombre_pc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_pc; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_pc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_pc" type=text name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=32"; } ?> maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Coloque el nombre de RED del Computador donde está conectada la Impresora</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Coloque el nombre de RED del Computador donde está conectada la Impresora</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_pc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_pc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_impre']))
    {
        $this->nm_new_label['nombre_impre'] = "Nombre Impresora de Red";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_impre = $this->nombre_impre;
   $sStyleHidden_nombre_impre = '';
   if (isset($this->nmgp_cmp_hidden['nombre_impre']) && $this->nmgp_cmp_hidden['nombre_impre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_impre']);
       $sStyleHidden_nombre_impre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_impre = 'display: none;';
   $sStyleReadInp_nombre_impre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_impre']) && $this->nmgp_cmp_readonly['nombre_impre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_impre']);
       $sStyleReadLab_nombre_impre = '';
       $sStyleReadInp_nombre_impre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_impre']) && $this->nmgp_cmp_hidden['nombre_impre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_impre_line" id="hidden_field_data_nombre_impre" style="<?php echo $sStyleHidden_nombre_impre; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_impre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_impre_label" style=""><span id="id_label_nombre_impre"><?php echo $this->nm_new_label['nombre_impre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_impre"]) &&  $this->nmgp_cmp_readonly["nombre_impre"] == "on") { 

 ?>
<input type="hidden" name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) . "\">" . $nombre_impre . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_impre" class="sc-ui-readonly-nombre_impre css_nombre_impre_line" style="<?php echo $sStyleReadLab_nombre_impre; ?>"><?php echo $this->form_format_readonly("nombre_impre", $this->form_encode_input($this->nombre_impre)); ?></span><span id="id_read_off_nombre_impre" class="css_read_off_nombre_impre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_impre; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_impre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_impre" type=text name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=32"; } ?> maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Coloque el nombre de la Impresora donde se va a imprimir</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Coloque el nombre de la Impresora donde se va a imprimir</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_impre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_impre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
