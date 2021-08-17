
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
  scEventControl_data["idpro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tasaiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tasadesc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["devuelto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cantidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_iddet' + iSeqRow).bind('change', function() { sc_form_devcom_iddet_onchange(this, iSeqRow) });
  $('#id_sc_field_idfaccom' + iSeqRow).bind('change', function() { sc_form_devcom_idfaccom_onchange(this, iSeqRow) });
  $('#id_sc_field_idpro' + iSeqRow).bind('blur', function() { sc_form_devcom_idpro_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devcom_idpro_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devcom_idpro_onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod' + iSeqRow).bind('blur', function() { sc_form_devcom_idbod_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devcom_idbod_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devcom_idbod_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_form_devcom_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devcom_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devcom_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit' + iSeqRow).bind('blur', function() { sc_form_devcom_valorunit_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devcom_valorunit_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devcom_valorunit_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar' + iSeqRow).bind('blur', function() { sc_form_devcom_valorpar_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devcom_valorpar_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devcom_valorpar_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_form_devcom_iva_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_devcom_iva_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_devcom_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_form_devcom_descuento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_devcom_descuento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_devcom_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasaiva' + iSeqRow).bind('blur', function() { sc_form_devcom_tasaiva_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_devcom_tasaiva_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_devcom_tasaiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasadesc' + iSeqRow).bind('blur', function() { sc_form_devcom_tasadesc_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devcom_tasadesc_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devcom_tasadesc_onfocus(this, iSeqRow) });
  $('#id_sc_field_devuelto' + iSeqRow).bind('blur', function() { sc_form_devcom_devuelto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_devcom_devuelto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_devcom_devuelto_onfocus(this, iSeqRow) });
  $('#id_sc_field_colores' + iSeqRow).bind('blur', function() { sc_form_devcom_colores_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_devcom_colores_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_devcom_colores_onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas' + iSeqRow).bind('blur', function() { sc_form_devcom_tallas_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_devcom_tallas_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_devcom_tallas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor' + iSeqRow).bind('blur', function() { sc_form_devcom_sabor_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_devcom_sabor_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_devcom_sabor_onfocus(this, iSeqRow) });
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_devcom_id_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_form_devcom_id_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_form_devcom_id_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_devcom_iddet_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_idfaccom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_idpro_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_idpro();
  scCssBlur(oThis);
}

function sc_form_devcom_idpro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_idpro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_devcom_idbod_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_idbod();
  scCssBlur(oThis);
}

function sc_form_devcom_idbod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_idbod_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_devcom_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_cantidad();
  scCssBlur(oThis);
  do_ajax_form_devcom_event_cantidad_onblur();
}

function sc_form_devcom_cantidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_devcom_event_cantidad_onchange();
}

function sc_form_devcom_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_valorunit_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_valorunit();
  scCssBlur(oThis);
}

function sc_form_devcom_valorunit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_valorunit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_valorpar_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_valorpar();
  scCssBlur(oThis);
}

function sc_form_devcom_valorpar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_valorpar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_iva();
  scCssBlur(oThis);
}

function sc_form_devcom_iva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_descuento_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_descuento();
  scCssBlur(oThis);
}

function sc_form_devcom_descuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_descuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_tasaiva_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_tasaiva();
  scCssBlur(oThis);
}

function sc_form_devcom_tasaiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_tasaiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_tasadesc_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_tasadesc();
  scCssBlur(oThis);
}

function sc_form_devcom_tasadesc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_tasadesc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_devuelto_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_devuelto();
  scCssBlur(oThis);
}

function sc_form_devcom_devuelto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_devuelto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_colores_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_colores();
  scCssBlur(oThis);
}

function sc_form_devcom_colores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_colores_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_tallas_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_tallas();
  scCssBlur(oThis);
}

function sc_form_devcom_tallas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_tallas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_sabor_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_sabor();
  scCssBlur(oThis);
}

function sc_form_devcom_sabor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_sabor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_devcom_id_onblur(oThis, iSeqRow) {
  do_ajax_form_devcom_validate_id();
  scCssBlur(oThis);
}

function sc_form_devcom_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_devcom_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpro", "", status);
	displayChange_field("colores", "", status);
	displayChange_field("tallas", "", status);
	displayChange_field("sabor", "", status);
	displayChange_field("cantidad", "", status);
	displayChange_field("idbod", "", status);
	displayChange_field("valorunit", "", status);
	displayChange_field("valorpar", "", status);
	displayChange_field("iva", "", status);
	displayChange_field("descuento", "", status);
	displayChange_field("tasaiva", "", status);
	displayChange_field("tasadesc", "", status);
	displayChange_field("devuelto", "", status);
	displayChange_field("id", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpro(row, status);
	displayChange_field_colores(row, status);
	displayChange_field_tallas(row, status);
	displayChange_field_sabor(row, status);
	displayChange_field_cantidad(row, status);
	displayChange_field_idbod(row, status);
	displayChange_field_valorunit(row, status);
	displayChange_field_valorpar(row, status);
	displayChange_field_iva(row, status);
	displayChange_field_descuento(row, status);
	displayChange_field_tasaiva(row, status);
	displayChange_field_tasadesc(row, status);
	displayChange_field_devuelto(row, status);
	displayChange_field_id(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpro" == field) {
		displayChange_field_idpro(row, status);
	}
	if ("colores" == field) {
		displayChange_field_colores(row, status);
	}
	if ("tallas" == field) {
		displayChange_field_tallas(row, status);
	}
	if ("sabor" == field) {
		displayChange_field_sabor(row, status);
	}
	if ("cantidad" == field) {
		displayChange_field_cantidad(row, status);
	}
	if ("idbod" == field) {
		displayChange_field_idbod(row, status);
	}
	if ("valorunit" == field) {
		displayChange_field_valorunit(row, status);
	}
	if ("valorpar" == field) {
		displayChange_field_valorpar(row, status);
	}
	if ("iva" == field) {
		displayChange_field_iva(row, status);
	}
	if ("descuento" == field) {
		displayChange_field_descuento(row, status);
	}
	if ("tasaiva" == field) {
		displayChange_field_tasaiva(row, status);
	}
	if ("tasadesc" == field) {
		displayChange_field_tasadesc(row, status);
	}
	if ("devuelto" == field) {
		displayChange_field_devuelto(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
}

function displayChange_field_idpro(row, status) {
}

function displayChange_field_colores(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_colores__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_colores" + row).select2("destroy");
		}
		scJQSelect2Add(row, "colores");
	}
}

function displayChange_field_tallas(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tallas__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tallas" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tallas");
	}
}

function displayChange_field_sabor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sabor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sabor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sabor");
	}
}

function displayChange_field_cantidad(row, status) {
}

function displayChange_field_idbod(row, status) {
}

function displayChange_field_valorunit(row, status) {
}

function displayChange_field_valorpar(row, status) {
}

function displayChange_field_iva(row, status) {
}

function displayChange_field_descuento(row, status) {
}

function displayChange_field_tasaiva(row, status) {
}

function displayChange_field_tasadesc(row, status) {
}

function displayChange_field_devuelto(row, status) {
}

function displayChange_field_id(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_colores("all", "on");
	displayChange_field_tallas("all", "on");
	displayChange_field_sabor("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_devcom_form" + pageNo).hide();
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_devcom')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "colores" == specificField) {
    scJQSelect2Add_colores(seqRow);
  }
  if (null == specificField || "tallas" == specificField) {
    scJQSelect2Add_tallas(seqRow);
  }
  if (null == specificField || "sabor" == specificField) {
    scJQSelect2Add_sabor(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_colores(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_colores_obj" : "#id_sc_field_colores" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_colores_obj',
      dropdownCssClass: 'css_colores_obj',
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

function scJQSelect2Add_tallas(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tallas_obj" : "#id_sc_field_tallas" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tallas_obj',
      dropdownCssClass: 'css_tallas_obj',
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

function scJQSelect2Add_sabor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sabor_obj" : "#id_sc_field_sabor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sabor_obj',
      dropdownCssClass: 'css_sabor_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_colores) { displayChange_field_colores(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas) { displayChange_field_tallas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor) { displayChange_field_sabor(iLine, "on"); } }, 150);
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

