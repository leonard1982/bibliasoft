
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["codigobar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["escombo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maneja_tcs_lfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idprod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigobar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["escombo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["escombo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maneja_tcs_lfs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maneja_tcs_lfs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idprod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idprod" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idprod' + iSeqRow).bind('blur', function() { sc_form_combos_idprod_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_combos_idprod_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_combos_idprod_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigobar' + iSeqRow).bind('blur', function() { sc_form_combos_codigobar_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_combos_codigobar_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_combos_codigobar_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigoprod' + iSeqRow).bind('change', function() { sc_form_combos_codigoprod_onchange(this, iSeqRow) });
  $('#id_sc_field_nompro' + iSeqRow).bind('blur', function() { sc_form_combos_nompro_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_combos_nompro_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_combos_nompro_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidmaymen' + iSeqRow).bind('change', function() { sc_form_combos_unidmaymen_onchange(this, iSeqRow) });
  $('#id_sc_field_unimay' + iSeqRow).bind('change', function() { sc_form_combos_unimay_onchange(this, iSeqRow) });
  $('#id_sc_field_unimen' + iSeqRow).bind('change', function() { sc_form_combos_unimen_onchange(this, iSeqRow) });
  $('#id_sc_field_costomay' + iSeqRow).bind('change', function() { sc_form_combos_costomay_onchange(this, iSeqRow) });
  $('#id_sc_field_costomen' + iSeqRow).bind('change', function() { sc_form_combos_costomen_onchange(this, iSeqRow) });
  $('#id_sc_field_recmayamen' + iSeqRow).bind('change', function() { sc_form_combos_recmayamen_onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen' + iSeqRow).bind('blur', function() { sc_form_combos_preciomen_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_combos_preciomen_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_combos_preciomen_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen2' + iSeqRow).bind('change', function() { sc_form_combos_preciomen2_onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen3' + iSeqRow).bind('change', function() { sc_form_combos_preciomen3_onchange(this, iSeqRow) });
  $('#id_sc_field_precio2' + iSeqRow).bind('change', function() { sc_form_combos_precio2_onchange(this, iSeqRow) });
  $('#id_sc_field_preciomay' + iSeqRow).bind('change', function() { sc_form_combos_preciomay_onchange(this, iSeqRow) });
  $('#id_sc_field_preciofull' + iSeqRow).bind('change', function() { sc_form_combos_preciofull_onchange(this, iSeqRow) });
  $('#id_sc_field_stockmay' + iSeqRow).bind('change', function() { sc_form_combos_stockmay_onchange(this, iSeqRow) });
  $('#id_sc_field_stockmen' + iSeqRow).bind('change', function() { sc_form_combos_stockmen_onchange(this, iSeqRow) });
  $('#id_sc_field_idgrup' + iSeqRow).bind('change', function() { sc_form_combos_idgrup_onchange(this, iSeqRow) });
  $('#id_sc_field_idpro1' + iSeqRow).bind('change', function() { sc_form_combos_idpro1_onchange(this, iSeqRow) });
  $('#id_sc_field_idpro2' + iSeqRow).bind('change', function() { sc_form_combos_idpro2_onchange(this, iSeqRow) });
  $('#id_sc_field_idiva' + iSeqRow).bind('change', function() { sc_form_combos_idiva_onchange(this, iSeqRow) });
  $('#id_sc_field_otro' + iSeqRow).bind('change', function() { sc_form_combos_otro_onchange(this, iSeqRow) });
  $('#id_sc_field_otro2' + iSeqRow).bind('change', function() { sc_form_combos_otro2_onchange(this, iSeqRow) });
  $('#id_sc_field_colores' + iSeqRow).bind('change', function() { sc_form_combos_colores_onchange(this, iSeqRow) });
  $('#id_sc_field_tallas' + iSeqRow).bind('change', function() { sc_form_combos_tallas_onchange(this, iSeqRow) });
  $('#id_sc_field_sabores' + iSeqRow).bind('change', function() { sc_form_combos_sabores_onchange(this, iSeqRow) });
  $('#id_sc_field_imagenprod' + iSeqRow).bind('change', function() { sc_form_combos_imagenprod_onchange(this, iSeqRow) });
  $('#id_sc_field_imconsumo' + iSeqRow).bind('change', function() { sc_form_combos_imconsumo_onchange(this, iSeqRow) });
  $('#id_sc_field_escombo' + iSeqRow).bind('blur', function() { sc_form_combos_escombo_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_combos_escombo_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_combos_escombo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcombo' + iSeqRow).bind('change', function() { sc_form_combos_idcombo_onchange(this, iSeqRow) });
  $('#id_sc_field_precio_editable' + iSeqRow).bind('change', function() { sc_form_combos_precio_editable_onchange(this, iSeqRow) });
  $('#id_sc_field_cod_cuenta' + iSeqRow).bind('change', function() { sc_form_combos_cod_cuenta_onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_vencimiento' + iSeqRow).bind('change', function() { sc_form_combos_fecha_vencimiento_onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_fab' + iSeqRow).bind('change', function() { sc_form_combos_fecha_fab_onchange(this, iSeqRow) });
  $('#id_sc_field_lote' + iSeqRow).bind('change', function() { sc_form_combos_lote_onchange(this, iSeqRow) });
  $('#id_sc_field_serial_codbarras' + iSeqRow).bind('change', function() { sc_form_combos_serial_codbarras_onchange(this, iSeqRow) });
  $('#id_sc_field_maneja_tcs_lfs' + iSeqRow).bind('blur', function() { sc_form_combos_maneja_tcs_lfs_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_combos_maneja_tcs_lfs_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_combos_maneja_tcs_lfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_combos_detalle_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_combos_detalle_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_combos_detalle_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-escombo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_combos_idprod_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_idprod();
  scCssBlur(oThis);
}

function sc_form_combos_idprod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_idprod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_codigobar_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_codigobar();
  scCssBlur(oThis);
}

function sc_form_combos_codigobar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_codigobar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_codigoprod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_nompro_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_nompro();
  scCssBlur(oThis);
}

function sc_form_combos_nompro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_nompro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_unidmaymen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_unimay_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_unimen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_costomay_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_costomen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_recmayamen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_preciomen_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_preciomen();
  scCssBlur(oThis);
}

function sc_form_combos_preciomen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_preciomen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_preciomen2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_preciomen3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_precio2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_preciomay_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_preciofull_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_stockmay_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_stockmen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_idgrup_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_idpro1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_idpro2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_idiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_otro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_otro2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_colores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_tallas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_sabores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_imagenprod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_imconsumo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_escombo_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_escombo();
  scCssBlur(oThis);
}

function sc_form_combos_escombo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_escombo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_idcombo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_precio_editable_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_cod_cuenta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_fecha_vencimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_fecha_fab_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_lote_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_serial_codbarras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_maneja_tcs_lfs_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_maneja_tcs_lfs();
  scCssBlur(oThis);
}

function sc_form_combos_maneja_tcs_lfs_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_maneja_tcs_lfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_combos_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_combos_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_combos_detalle_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_combos_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigobar", "", status);
	displayChange_field("nompro", "", status);
	displayChange_field("preciomen", "", status);
	displayChange_field("escombo", "", status);
	displayChange_field("maneja_tcs_lfs", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detalle", "", status);
	displayChange_field("idprod", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigobar(row, status);
	displayChange_field_nompro(row, status);
	displayChange_field_preciomen(row, status);
	displayChange_field_escombo(row, status);
	displayChange_field_maneja_tcs_lfs(row, status);
	displayChange_field_detalle(row, status);
	displayChange_field_idprod(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigobar" == field) {
		displayChange_field_codigobar(row, status);
	}
	if ("nompro" == field) {
		displayChange_field_nompro(row, status);
	}
	if ("preciomen" == field) {
		displayChange_field_preciomen(row, status);
	}
	if ("escombo" == field) {
		displayChange_field_escombo(row, status);
	}
	if ("maneja_tcs_lfs" == field) {
		displayChange_field_maneja_tcs_lfs(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
	if ("idprod" == field) {
		displayChange_field_idprod(row, status);
	}
}

function displayChange_field_codigobar(row, status) {
}

function displayChange_field_nompro(row, status) {
}

function displayChange_field_preciomen(row, status) {
}

function displayChange_field_escombo(row, status) {
}

function displayChange_field_maneja_tcs_lfs(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detallecombos")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detallecombos")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_idprod(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_combos_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(19);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_imagenprod" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_combos_ul_save.php",
    dropZone: $("#hidden_field_data_imagenprod" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenprod'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenprod" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenprod" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenprod" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_imagenprod" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenprod" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_imagenprod" + iSeqRow).val("");
      $("#id_sc_field_imagenprod_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenprod_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imagenprod = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenprod) ? "none" : "";
      $("#id_ajax_img_imagenprod" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenprod" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenprod) {
        document.F1.temp_out_imagenprod.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenprod.value = var_ajax_img_imagenprod;
      }
      else if (document.F1.temp_out_imagenprod) {
        document.F1.temp_out_imagenprod.value = var_ajax_img_imagenprod;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenprod" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenprod" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenprod" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenprod" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_combos')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

