<div id="form_productos_mini_form1" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="80%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idprod']))
   {
       $this->nmgp_cmp_hidden['idprod'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unimay']))
   {
       $this->nmgp_cmp_hidden['unimay'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unimen']))
   {
       $this->nmgp_cmp_hidden['unimen'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idpro2']))
   {
       $this->nmgp_cmp_hidden['idpro2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['multiple_escala']))
   {
       $this->nmgp_cmp_hidden['multiple_escala'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['en_base_a']))
   {
       $this->nmgp_cmp_hidden['en_base_a'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['imagen']))
    {
        $this->nm_new_label['imagen'] = "Imagen";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imagen = $this->imagen;
   $sStyleHidden_imagen = '';
   if (isset($this->nmgp_cmp_hidden['imagen']) && $this->nmgp_cmp_hidden['imagen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imagen']);
       $sStyleHidden_imagen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imagen = 'display: none;';
   $sStyleReadInp_imagen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['imagen']) && $this->nmgp_cmp_readonly['imagen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imagen']);
       $sStyleReadLab_imagen = '';
       $sStyleReadInp_imagen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imagen']) && $this->nmgp_cmp_hidden['imagen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imagen" value="<?php echo $this->form_encode_input($imagen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_imagen_label" id="hidden_field_label_imagen" style="<?php echo $sStyleHidden_imagen; ?>"><span id="id_label_imagen"><?php echo $this->nm_new_label['imagen']; ?></span></TD>
    <TD class="scFormDataOdd css_imagen_line" id="hidden_field_data_imagen" style="<?php echo $sStyleHidden_imagen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imagen_line" style="vertical-align: top;padding: 0px">
 <script>var var_ajax_img_imagen = '<?php echo $out1_imagen; ?>';</script><?php if (!empty($out_imagen)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_imagen, '" . $this->nmgp_return_img['imagen'][0] . "', '" . $this->nmgp_return_img['imagen'][1] . "')\"><img id=\"id_ajax_img_imagen\" border=\"0\" src=\"$out_imagen\"></a> &nbsp;" . "<span id=\"txt_ajax_img_imagen\" style=\"display: none\">" . $imagen . "</span>"; if (!empty($imagen)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_imagen\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_imagen\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imagen"]) &&  $this->nmgp_cmp_readonly["imagen"] == "on") { 

 ?>
<img id=\"imagen_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="imagen" value="<?php echo $this->form_encode_input($imagen) . "\">" . $imagen . ""; ?>
<?php } else { ?>
<span id="id_read_off_imagen" style="white-space: nowrap;<?php echo $sStyleReadInp_imagen; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-imagen" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_imagen_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="imagen[]" id="id_sc_field_imagen" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_imagen"<?php if ($this->nmgp_opcao == "novo" || empty($imagen)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="imagen_limpa" value="<?php echo $imagen_limpa . '" '; if ($imagen_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="imagen_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_imagen" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_imagen" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_imagen" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imagen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imagen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idprod']))
           {
               $this->nmgp_cmp_readonly['idprod'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['cod_cuenta']))
   {
       $this->nm_new_label['cod_cuenta'] = "Grupo Contable";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_cuenta = $this->cod_cuenta;
   $sStyleHidden_cod_cuenta = '';
   if (isset($this->nmgp_cmp_hidden['cod_cuenta']) && $this->nmgp_cmp_hidden['cod_cuenta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_cuenta']);
       $sStyleHidden_cod_cuenta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_cuenta = 'display: none;';
   $sStyleReadInp_cod_cuenta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_cuenta']) && $this->nmgp_cmp_readonly['cod_cuenta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_cuenta']);
       $sStyleReadLab_cod_cuenta = '';
       $sStyleReadInp_cod_cuenta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_cuenta']) && $this->nmgp_cmp_hidden['cod_cuenta'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cod_cuenta" value="<?php echo $this->form_encode_input($this->cod_cuenta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cod_cuenta_label" id="hidden_field_label_cod_cuenta" style="<?php echo $sStyleHidden_cod_cuenta; ?>"><span id="id_label_cod_cuenta"><?php echo $this->nm_new_label['cod_cuenta']; ?></span></TD>
    <TD class="scFormDataOdd css_cod_cuenta_line" id="hidden_field_data_cod_cuenta" style="<?php echo $sStyleHidden_cod_cuenta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_cuenta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_cuenta"]) &&  $this->nmgp_cmp_readonly["cod_cuenta"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ',descripcion)  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'][] = $rs->fields[0];
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
   $cod_cuenta_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cod_cuenta_1))
          {
              foreach ($this->cod_cuenta_1 as $tmp_cod_cuenta)
              {
                  if (trim($tmp_cod_cuenta) === trim($cadaselect[1])) { $cod_cuenta_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cod_cuenta) === trim($cadaselect[1])) { $cod_cuenta_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) . "\">" . $cod_cuenta_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ',descripcion)  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion  FROM grupos_contables  ORDER BY codigo, descripcion";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'][] = $rs->fields[0];
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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $cod_cuenta_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cod_cuenta_1))
          {
              foreach ($this->cod_cuenta_1 as $tmp_cod_cuenta)
              {
                  if (trim($tmp_cod_cuenta) === trim($cadaselect[1])) { $cod_cuenta_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cod_cuenta) === trim($cadaselect[1])) { $cod_cuenta_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($cod_cuenta_look))
          {
              $cod_cuenta_look = $this->cod_cuenta;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_cod_cuenta\" class=\"css_cod_cuenta_line\" style=\"" .  $sStyleReadLab_cod_cuenta . "\">" . $this->form_encode_input($cod_cuenta_look) . "</span><span id=\"id_read_off_cod_cuenta\" style=\"" . $sStyleReadInp_cod_cuenta . "\">";
   echo " <span id=\"idAjaxSelect_cod_cuenta\"><select class=\"sc-js-input scFormObjectOdd css_cod_cuenta_obj\" style=\"\" id=\"id_sc_field_cod_cuenta\" name=\"cod_cuenta\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_cod_cuenta'][] = ''; 
   echo "  <option value=\"\">SELECCIONE</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->cod_cuenta) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->cod_cuenta)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_cuenta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idprod']))
    {
        $this->nm_new_label['idprod'] = "Idprod";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idprod = $this->idprod;
   if (!isset($this->nmgp_cmp_hidden['idprod']))
   {
       $this->nmgp_cmp_hidden['idprod'] = 'off';
   }
   $sStyleHidden_idprod = '';
   if (isset($this->nmgp_cmp_hidden['idprod']) && $this->nmgp_cmp_hidden['idprod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idprod']);
       $sStyleHidden_idprod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idprod = 'display: none;';
   $sStyleReadInp_idprod = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idprod"]) &&  $this->nmgp_cmp_readonly["idprod"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idprod']);
       $sStyleReadLab_idprod = '';
       $sStyleReadInp_idprod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idprod']) && $this->nmgp_cmp_hidden['idprod'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idprod" value="<?php echo $this->form_encode_input($idprod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idprod_label" id="hidden_field_label_idprod" style="<?php echo $sStyleHidden_idprod; ?>"><span id="id_label_idprod"><?php echo $this->nm_new_label['idprod']; ?></span></TD>
    <TD class="scFormDataOdd css_idprod_line" id="hidden_field_data_idprod" style="<?php echo $sStyleHidden_idprod; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idprod_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idprod" class="css_idprod_line" style="<?php echo $sStyleReadLab_idprod; ?>"><?php echo $this->form_encode_input($this->idprod); ?></span><span id="id_read_off_idprod" style="<?php echo $sStyleReadInp_idprod; ?>"><input type="hidden" name="idprod" value="<?php echo $this->form_encode_input($idprod) . "\">"?><span id="id_ajax_label_idprod"><?php echo nl2br($idprod); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idprod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idprod_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_marca']))
   {
       $this->nm_new_label['id_marca'] = "Marca";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_marca = $this->id_marca;
   $sStyleHidden_id_marca = '';
   if (isset($this->nmgp_cmp_hidden['id_marca']) && $this->nmgp_cmp_hidden['id_marca'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_marca']);
       $sStyleHidden_id_marca = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_marca = 'display: none;';
   $sStyleReadInp_id_marca = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_marca']) && $this->nmgp_cmp_readonly['id_marca'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_marca']);
       $sStyleReadLab_id_marca = '';
       $sStyleReadInp_id_marca = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_marca']) && $this->nmgp_cmp_hidden['id_marca'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_marca" value="<?php echo $this->form_encode_input($this->id_marca) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_marca_label" id="hidden_field_label_id_marca" style="<?php echo $sStyleHidden_id_marca; ?>"><span id="id_label_id_marca"><?php echo $this->nm_new_label['id_marca']; ?></span></TD>
    <TD class="scFormDataOdd css_id_marca_line" id="hidden_field_data_id_marca" style="<?php echo $sStyleHidden_id_marca; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_marca_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_marca"]) &&  $this->nmgp_cmp_readonly["id_marca"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id_marca, cod_marca + ' - ' + nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_marca, concat(cod_marca,' - ',nombre_marca)  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id_marca, cod_marca&' - '&nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id_marca, cod_marca||' - '||nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   else
   {
       $nm_comando = "SELECT id_marca, cod_marca||' - '||nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'][] = $rs->fields[0];
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
   $id_marca_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_marca_1))
          {
              foreach ($this->id_marca_1 as $tmp_id_marca)
              {
                  if (trim($tmp_id_marca) === trim($cadaselect[1])) { $id_marca_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_marca) === trim($cadaselect[1])) { $id_marca_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_marca" value="<?php echo $this->form_encode_input($id_marca) . "\">" . $id_marca_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id_marca, cod_marca + ' - ' + nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_marca, concat(cod_marca,' - ',nombre_marca)  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id_marca, cod_marca&' - '&nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id_marca, cod_marca||' - '||nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }
   else
   {
       $nm_comando = "SELECT id_marca, cod_marca||' - '||nombre_marca  FROM marca  ORDER BY cod_marca, nombre_marca";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'][] = $rs->fields[0];
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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $id_marca_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_marca_1))
          {
              foreach ($this->id_marca_1 as $tmp_id_marca)
              {
                  if (trim($tmp_id_marca) === trim($cadaselect[1])) { $id_marca_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_marca) === trim($cadaselect[1])) { $id_marca_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_marca_look))
          {
              $id_marca_look = $this->id_marca;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_marca\" class=\"css_id_marca_line\" style=\"" .  $sStyleReadLab_id_marca . "\">" . $this->form_encode_input($id_marca_look) . "</span><span id=\"id_read_off_id_marca\" style=\"" . $sStyleReadInp_id_marca . "\">";
   echo " <span id=\"idAjaxSelect_id_marca\"><select class=\"sc-js-input scFormObjectOdd css_id_marca_obj\" style=\"\" id=\"id_sc_field_id_marca\" name=\"id_marca\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_marca'][] = ''; 
   echo "  <option value=\"\">SELECCIONE</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_marca) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_marca)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   if (isset($this->Ini->sc_lig_md5["form_marca"]) && $this->Ini->sc_lig_md5["form_marca"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_id_marca*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_productos_mini@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_id_marca*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?>&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_marca_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_marca_edit. "', '" . $Md5_Lig . "')", "fldedt_id_marca", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_marca_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_marca_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_linea']))
   {
       $this->nm_new_label['id_linea'] = "Linea";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_linea = $this->id_linea;
   $sStyleHidden_id_linea = '';
   if (isset($this->nmgp_cmp_hidden['id_linea']) && $this->nmgp_cmp_hidden['id_linea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_linea']);
       $sStyleHidden_id_linea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_linea = 'display: none;';
   $sStyleReadInp_id_linea = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_linea']) && $this->nmgp_cmp_readonly['id_linea'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_linea']);
       $sStyleReadLab_id_linea = '';
       $sStyleReadInp_id_linea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_linea']) && $this->nmgp_cmp_hidden['id_linea'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_linea" value="<?php echo $this->form_encode_input($this->id_linea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_linea_label" id="hidden_field_label_id_linea" style="<?php echo $sStyleHidden_id_linea; ?>"><span id="id_label_id_linea"><?php echo $this->nm_new_label['id_linea']; ?></span></TD>
    <TD class="scFormDataOdd css_id_linea_line" id="hidden_field_data_id_linea" style="<?php echo $sStyleHidden_id_linea; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_linea_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_linea"]) &&  $this->nmgp_cmp_readonly["id_linea"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id_linea, cod_linea + ' - ' + nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_linea, concat(cod_linea,' - ',nombre_linea)  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id_linea, cod_linea&' - '&nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id_linea, cod_linea||' - '||nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   else
   {
       $nm_comando = "SELECT id_linea, cod_linea||' - '||nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'][] = $rs->fields[0];
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
   $id_linea_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_linea_1))
          {
              foreach ($this->id_linea_1 as $tmp_id_linea)
              {
                  if (trim($tmp_id_linea) === trim($cadaselect[1])) { $id_linea_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_linea) === trim($cadaselect[1])) { $id_linea_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_linea" value="<?php echo $this->form_encode_input($id_linea) . "\">" . $id_linea_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_por_preciominimo = $this->por_preciominimo;
   $old_value_sugerido_mayor = $this->sugerido_mayor;
   $old_value_sugerido_menor = $this->sugerido_menor;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $old_value_idprod = $this->idprod;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_por_preciominimo = $this->por_preciominimo;
   $unformatted_value_sugerido_mayor = $this->sugerido_mayor;
   $unformatted_value_sugerido_menor = $this->sugerido_menor;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;
   $unformatted_value_idprod = $this->idprod;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT id_linea, cod_linea + ' - ' + nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_linea, concat(cod_linea,' - ',nombre_linea)  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT id_linea, cod_linea&' - '&nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT id_linea, cod_linea||' - '||nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }
   else
   {
       $nm_comando = "SELECT id_linea, cod_linea||' - '||nombre_linea  FROM linea  ORDER BY cod_linea, nombre_linea";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->por_preciominimo = $old_value_por_preciominimo;
   $this->sugerido_mayor = $old_value_sugerido_mayor;
   $this->sugerido_menor = $old_value_sugerido_menor;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;
   $this->idprod = $old_value_idprod;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'][] = $rs->fields[0];
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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $id_linea_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_linea_1))
          {
              foreach ($this->id_linea_1 as $tmp_id_linea)
              {
                  if (trim($tmp_id_linea) === trim($cadaselect[1])) { $id_linea_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_linea) === trim($cadaselect[1])) { $id_linea_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_linea_look))
          {
              $id_linea_look = $this->id_linea;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_linea\" class=\"css_id_linea_line\" style=\"" .  $sStyleReadLab_id_linea . "\">" . $this->form_encode_input($id_linea_look) . "</span><span id=\"id_read_off_id_linea\" style=\"" . $sStyleReadInp_id_linea . "\">";
   echo " <span id=\"idAjaxSelect_id_linea\"><select class=\"sc-js-input scFormObjectOdd css_id_linea_obj\" style=\"\" id=\"id_sc_field_id_linea\" name=\"id_linea\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_id_linea'][] = ''; 
   echo "  <option value=\"\">SELECCIONE</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_linea) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_linea)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   if (isset($this->Ini->sc_lig_md5["form_linea"]) && $this->Ini->sc_lig_md5["form_linea"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_id_linea*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_productos_mini@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_id_linea*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?>&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_linea_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_linea_edit. "', '" . $Md5_Lig . "')", "fldedt_id_linea", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_linea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_linea_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigobar2']))
    {
        $this->nm_new_label['codigobar2'] = "Código barras 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigobar2 = $this->codigobar2;
   $sStyleHidden_codigobar2 = '';
   if (isset($this->nmgp_cmp_hidden['codigobar2']) && $this->nmgp_cmp_hidden['codigobar2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigobar2']);
       $sStyleHidden_codigobar2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigobar2 = 'display: none;';
   $sStyleReadInp_codigobar2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigobar2']) && $this->nmgp_cmp_readonly['codigobar2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigobar2']);
       $sStyleReadLab_codigobar2 = '';
       $sStyleReadInp_codigobar2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigobar2']) && $this->nmgp_cmp_hidden['codigobar2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar2" value="<?php echo $this->form_encode_input($codigobar2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigobar2_label" id="hidden_field_label_codigobar2" style="<?php echo $sStyleHidden_codigobar2; ?>"><span id="id_label_codigobar2"><?php echo $this->nm_new_label['codigobar2']; ?></span></TD>
    <TD class="scFormDataOdd css_codigobar2_line" id="hidden_field_data_codigobar2" style="<?php echo $sStyleHidden_codigobar2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigobar2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigobar2"]) &&  $this->nmgp_cmp_readonly["codigobar2"] == "on") { 

 ?>
<input type="hidden" name="codigobar2" value="<?php echo $this->form_encode_input($codigobar2) . "\">" . $codigobar2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigobar2" class="sc-ui-readonly-codigobar2 css_codigobar2_line" style="<?php echo $sStyleReadLab_codigobar2; ?>"><?php echo $this->form_encode_input($this->codigobar2); ?></span><span id="id_read_off_codigobar2" style="white-space: nowrap;<?php echo $sStyleReadInp_codigobar2; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigobar2_obj" style="" id="id_sc_field_codigobar2" type=text name="codigobar2" value="<?php echo $this->form_encode_input($codigobar2) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigobar3']))
    {
        $this->nm_new_label['codigobar3'] = "Código barras 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigobar3 = $this->codigobar3;
   $sStyleHidden_codigobar3 = '';
   if (isset($this->nmgp_cmp_hidden['codigobar3']) && $this->nmgp_cmp_hidden['codigobar3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigobar3']);
       $sStyleHidden_codigobar3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigobar3 = 'display: none;';
   $sStyleReadInp_codigobar3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigobar3']) && $this->nmgp_cmp_readonly['codigobar3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigobar3']);
       $sStyleReadLab_codigobar3 = '';
       $sStyleReadInp_codigobar3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigobar3']) && $this->nmgp_cmp_hidden['codigobar3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar3" value="<?php echo $this->form_encode_input($codigobar3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigobar3_label" id="hidden_field_label_codigobar3" style="<?php echo $sStyleHidden_codigobar3; ?>"><span id="id_label_codigobar3"><?php echo $this->nm_new_label['codigobar3']; ?></span></TD>
    <TD class="scFormDataOdd css_codigobar3_line" id="hidden_field_data_codigobar3" style="<?php echo $sStyleHidden_codigobar3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigobar3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigobar3"]) &&  $this->nmgp_cmp_readonly["codigobar3"] == "on") { 

 ?>
<input type="hidden" name="codigobar3" value="<?php echo $this->form_encode_input($codigobar3) . "\">" . $codigobar3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigobar3" class="sc-ui-readonly-codigobar3 css_codigobar3_line" style="<?php echo $sStyleReadLab_codigobar3; ?>"><?php echo $this->form_encode_input($this->codigobar3); ?></span><span id="id_read_off_codigobar3" style="white-space: nowrap;<?php echo $sStyleReadInp_codigobar3; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigobar3_obj" style="" id="id_sc_field_codigobar3" type=text name="codigobar3" value="<?php echo $this->form_encode_input($codigobar3) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab'] != "N"))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"><IMG SRC="<?php echo $this->Ini->path_imag_cab ?>/usr__NM__bg__NM__1455739788_Kitchen_Bold_Line_Color_Mix-05_icon-icons.com_53393.png" BORDER="0"/></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"><IMG SRC="<?php echo $this->Ini->path_imag_cab ?>/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png" BORDER="0"/></span>
        </td>
    </tr>
</table><?php
  }
?>
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
 $NM_pag_atual = "form_productos_mini_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_productos_mini_form" . $this->nmgp_ancora;
 }
?>
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.width='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.height='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.display='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.overflow='visible';
</script> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue']);
?>
}
<?php
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
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_productos_mini");
 parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
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
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['sc_modal'])
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
</body> 
</html> 
