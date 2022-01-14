
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
  scEventControl_data["codigoprod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomay" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciofull" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio_editable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_vencimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lote" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serial_codbarras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigobar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigoprod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigoprod" + iSeqRow]["change"]) {
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
  if (scEventControl_data["preciomen2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomen3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomay" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomay" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciofull" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciofull" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio_editable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio_editable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_vencimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_vencimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serial_codbarras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serial_codbarras" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("fecha_vencimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("lote" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("serial_codbarras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
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
  $('#id_sc_field_codigobar' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_codigobar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_producto_precioscompra_codigobar_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigoprod' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_codigoprod_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_producto_precioscompra_codigoprod_onfocus(this, iSeqRow) });
  $('#id_sc_field_nompro' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_nompro_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_producto_precioscompra_nompro_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_preciomen_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_producto_precioscompra_preciomen_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen2' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_preciomen2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_producto_precioscompra_preciomen2_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen3' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_preciomen3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_producto_precioscompra_preciomen3_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio2' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_precio2_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_producto_precioscompra_precio2_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomay' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_preciomay_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_producto_precioscompra_preciomay_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciofull' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_preciofull_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_producto_precioscompra_preciofull_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio_editable' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_precio_editable_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_producto_precioscompra_precio_editable_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_vencimiento' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_fecha_vencimiento_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_producto_precioscompra_fecha_vencimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_lote' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_lote_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_producto_precioscompra_lote_onfocus(this, iSeqRow) });
  $('#id_sc_field_serial_codbarras' + iSeqRow).bind('blur', function() { sc_form_producto_precioscompra_serial_codbarras_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_producto_precioscompra_serial_codbarras_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_producto_precioscompra_codigobar_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_codigobar();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_codigobar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_codigoprod_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_codigoprod();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_codigoprod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_nompro_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_nompro();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_nompro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_preciomen_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_preciomen();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_preciomen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_preciomen2_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_preciomen2();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_preciomen2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_preciomen3_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_preciomen3();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_preciomen3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_precio2_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_precio2();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_precio2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_preciomay_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_preciomay();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_preciomay_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_preciofull_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_preciofull();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_preciofull_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_precio_editable_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_precio_editable();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_precio_editable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_fecha_vencimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_fecha_vencimiento();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_fecha_vencimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_lote_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_lote();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_lote_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_producto_precioscompra_serial_codbarras_onblur(oThis, iSeqRow) {
  do_ajax_form_producto_precioscompra_mob_validate_serial_codbarras();
  scCssBlur(oThis);
}

function sc_form_producto_precioscompra_serial_codbarras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigobar", "", status);
	displayChange_field("codigoprod", "", status);
	displayChange_field("nompro", "", status);
	displayChange_field("preciomen", "", status);
	displayChange_field("preciomen2", "", status);
	displayChange_field("preciomen3", "", status);
	displayChange_field("precio2", "", status);
	displayChange_field("preciomay", "", status);
	displayChange_field("preciofull", "", status);
	displayChange_field("precio_editable", "", status);
	displayChange_field("fecha_vencimiento", "", status);
	displayChange_field("lote", "", status);
	displayChange_field("serial_codbarras", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigobar(row, status);
	displayChange_field_codigoprod(row, status);
	displayChange_field_nompro(row, status);
	displayChange_field_preciomen(row, status);
	displayChange_field_preciomen2(row, status);
	displayChange_field_preciomen3(row, status);
	displayChange_field_precio2(row, status);
	displayChange_field_preciomay(row, status);
	displayChange_field_preciofull(row, status);
	displayChange_field_precio_editable(row, status);
	displayChange_field_fecha_vencimiento(row, status);
	displayChange_field_lote(row, status);
	displayChange_field_serial_codbarras(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigobar" == field) {
		displayChange_field_codigobar(row, status);
	}
	if ("codigoprod" == field) {
		displayChange_field_codigoprod(row, status);
	}
	if ("nompro" == field) {
		displayChange_field_nompro(row, status);
	}
	if ("preciomen" == field) {
		displayChange_field_preciomen(row, status);
	}
	if ("preciomen2" == field) {
		displayChange_field_preciomen2(row, status);
	}
	if ("preciomen3" == field) {
		displayChange_field_preciomen3(row, status);
	}
	if ("precio2" == field) {
		displayChange_field_precio2(row, status);
	}
	if ("preciomay" == field) {
		displayChange_field_preciomay(row, status);
	}
	if ("preciofull" == field) {
		displayChange_field_preciofull(row, status);
	}
	if ("precio_editable" == field) {
		displayChange_field_precio_editable(row, status);
	}
	if ("fecha_vencimiento" == field) {
		displayChange_field_fecha_vencimiento(row, status);
	}
	if ("lote" == field) {
		displayChange_field_lote(row, status);
	}
	if ("serial_codbarras" == field) {
		displayChange_field_serial_codbarras(row, status);
	}
}

function displayChange_field_codigobar(row, status) {
}

function displayChange_field_codigoprod(row, status) {
}

function displayChange_field_nompro(row, status) {
}

function displayChange_field_preciomen(row, status) {
}

function displayChange_field_preciomen2(row, status) {
}

function displayChange_field_preciomen3(row, status) {
}

function displayChange_field_precio2(row, status) {
}

function displayChange_field_preciomay(row, status) {
}

function displayChange_field_preciofull(row, status) {
}

function displayChange_field_precio_editable(row, status) {
}

function displayChange_field_fecha_vencimiento(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_fecha_vencimiento__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_fecha_vencimiento" + row).select2("destroy");
		}
		scJQSelect2Add(row, "fecha_vencimiento");
	}
}

function displayChange_field_lote(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_lote__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_lote" + row).select2("destroy");
		}
		scJQSelect2Add(row, "lote");
	}
}

function displayChange_field_serial_codbarras(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_serial_codbarras__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_serial_codbarras" + row).select2("destroy");
		}
		scJQSelect2Add(row, "serial_codbarras");
	}
}

function scRecreateSelect2() {
	displayChange_field_fecha_vencimiento("all", "on");
	displayChange_field_lote("all", "on");
	displayChange_field_serial_codbarras("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_producto_precioscompra_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(39);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_imagenprod" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_producto_precioscompra_mob_ul_save.php",
    dropZone: "",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_producto_precioscompra_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "fecha_vencimiento" == specificField) {
    scJQSelect2Add_fecha_vencimiento(seqRow);
  }
  if (null == specificField || "lote" == specificField) {
    scJQSelect2Add_lote(seqRow);
  }
  if (null == specificField || "serial_codbarras" == specificField) {
    scJQSelect2Add_serial_codbarras(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_fecha_vencimiento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_fecha_vencimiento_obj" : "#id_sc_field_fecha_vencimiento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_fecha_vencimiento_obj',
      dropdownCssClass: 'css_fecha_vencimiento_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_lote(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_lote_obj" : "#id_sc_field_lote" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_lote_obj',
      dropdownCssClass: 'css_lote_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_serial_codbarras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_serial_codbarras_obj" : "#id_sc_field_serial_codbarras" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_serial_codbarras_obj',
      dropdownCssClass: 'css_serial_codbarras_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_fecha_vencimiento) { displayChange_field_fecha_vencimiento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_lote) { displayChange_field_lote(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_serial_codbarras) { displayChange_field_serial_codbarras(iLine, "on"); } }, 150);
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

