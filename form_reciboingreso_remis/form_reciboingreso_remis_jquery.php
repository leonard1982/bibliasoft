
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
  scEventControl_data["nurecibo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nufac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["concepto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecharecibo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["monto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["son" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldofac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["formapago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcheque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numtarjeta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombreobanco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obser" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nurecibo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nurecibo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nufac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nufac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["concepto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["concepto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecharecibo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecharecibo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["monto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["monto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["son" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["son" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldofac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldofac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcheque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcheque" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numtarjeta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numtarjeta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombreobanco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombreobanco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obser" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obser" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("resolucion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nufac" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("formapago" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("formapago" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("monto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nufac" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("resolucion" + iSeq == fieldName) {
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
  $('#id_sc_field_idrecibo' + iSeqRow).bind('change', function() { sc_form_reciboingreso_remis_idrecibo_onchange(this, iSeqRow) });
  $('#id_sc_field_nurecibo' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_nurecibo_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_reciboingreso_remis_nurecibo_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_remis_nurecibo_onfocus(this, iSeqRow) });
  $('#id_sc_field_nufac' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_nufac_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_remis_nufac_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_remis_nufac_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_reciboingreso_remis_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_reciboingreso_remis_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecharecibo' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_fecharecibo_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_reciboingreso_remis_fecharecibo_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_reciboingreso_remis_fecharecibo_onfocus(this, iSeqRow) });
  $('#id_sc_field_monto' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_monto_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_remis_monto_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_remis_monto_onfocus(this, iSeqRow) });
  $('#id_sc_field_son' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_son_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_reciboingreso_remis_son_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_reciboingreso_remis_son_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldofac' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_saldofac_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_reciboingreso_remis_saldofac_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_remis_saldofac_onfocus(this, iSeqRow) });
  $('#id_sc_field_formapago' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_formapago_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_reciboingreso_remis_formapago_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_remis_formapago_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcheque' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_numcheque_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_reciboingreso_remis_numcheque_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_remis_numcheque_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_banco_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_remis_banco_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_remis_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_numtarjeta' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_numtarjeta_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_reciboingreso_remis_numtarjeta_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_remis_numtarjeta_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombreobanco' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_nombreobanco_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_reciboingreso_remis_nombreobanco_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_reciboingreso_remis_nombreobanco_onfocus(this, iSeqRow) });
  $('#id_sc_field_obser' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_obser_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_remis_obser_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_remis_obser_onfocus(this, iSeqRow) });
  $('#id_sc_field_concepto' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_concepto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_reciboingreso_remis_concepto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_remis_concepto_onfocus(this, iSeqRow) });
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_remis_resolucion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_reciboingreso_remis_resolucion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_remis_resolucion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_reciboingreso_remis_idrecibo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_nurecibo_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_nurecibo();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_nurecibo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_nurecibo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_nufac_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_nufac();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_nufac_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_reciboingreso_remis_event_nufac_onchange();
}

function sc_form_reciboingreso_remis_nufac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_reciboingreso_remis_event_cliente_onchange();
}

function sc_form_reciboingreso_remis_cliente_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_fecharecibo_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_fecharecibo();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_fecharecibo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_fecharecibo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_monto_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_monto();
  scCssBlur(oThis);
  do_ajax_form_reciboingreso_remis_event_monto_onblur();
}

function sc_form_reciboingreso_remis_monto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_reciboingreso_remis_event_monto_onchange();
}

function sc_form_reciboingreso_remis_monto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_son_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_son();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_son_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_son_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_saldofac_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_saldofac();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_saldofac_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_saldofac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_formapago_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_formapago();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_formapago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_reciboingreso_remis_event_formapago_onchange();
}

function sc_form_reciboingreso_remis_formapago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_numcheque_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_numcheque();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_numcheque_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_numcheque_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_banco();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_numtarjeta_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_numtarjeta();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_numtarjeta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_numtarjeta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_nombreobanco_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_nombreobanco();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_nombreobanco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_nombreobanco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_obser_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_obser();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_obser_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_obser_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_concepto_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_concepto();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_concepto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_reciboingreso_remis_concepto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_remis_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_remis_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_remis_resolucion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_reciboingreso_remis_event_resolucion_onchange();
}

function sc_form_reciboingreso_remis_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nurecibo", "", status);
	displayChange_field("cliente", "", status);
	displayChange_field("resolucion", "", status);
	displayChange_field("nufac", "", status);
	displayChange_field("concepto", "", status);
	displayChange_field("fecharecibo", "", status);
	displayChange_field("monto", "", status);
	displayChange_field("son", "", status);
	displayChange_field("saldofac", "", status);
	displayChange_field("formapago", "", status);
	displayChange_field("numcheque", "", status);
	displayChange_field("banco", "", status);
	displayChange_field("numtarjeta", "", status);
	displayChange_field("nombreobanco", "", status);
	displayChange_field("obser", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nurecibo(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_resolucion(row, status);
	displayChange_field_nufac(row, status);
	displayChange_field_concepto(row, status);
	displayChange_field_fecharecibo(row, status);
	displayChange_field_monto(row, status);
	displayChange_field_son(row, status);
	displayChange_field_saldofac(row, status);
	displayChange_field_formapago(row, status);
	displayChange_field_numcheque(row, status);
	displayChange_field_banco(row, status);
	displayChange_field_numtarjeta(row, status);
	displayChange_field_nombreobanco(row, status);
	displayChange_field_obser(row, status);
}

function displayChange_field(field, row, status) {
	if ("nurecibo" == field) {
		displayChange_field_nurecibo(row, status);
	}
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("resolucion" == field) {
		displayChange_field_resolucion(row, status);
	}
	if ("nufac" == field) {
		displayChange_field_nufac(row, status);
	}
	if ("concepto" == field) {
		displayChange_field_concepto(row, status);
	}
	if ("fecharecibo" == field) {
		displayChange_field_fecharecibo(row, status);
	}
	if ("monto" == field) {
		displayChange_field_monto(row, status);
	}
	if ("son" == field) {
		displayChange_field_son(row, status);
	}
	if ("saldofac" == field) {
		displayChange_field_saldofac(row, status);
	}
	if ("formapago" == field) {
		displayChange_field_formapago(row, status);
	}
	if ("numcheque" == field) {
		displayChange_field_numcheque(row, status);
	}
	if ("banco" == field) {
		displayChange_field_banco(row, status);
	}
	if ("numtarjeta" == field) {
		displayChange_field_numtarjeta(row, status);
	}
	if ("nombreobanco" == field) {
		displayChange_field_nombreobanco(row, status);
	}
	if ("obser" == field) {
		displayChange_field_obser(row, status);
	}
}

function displayChange_field_nurecibo(row, status) {
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_resolucion(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_resolucion__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_resolucion" + row).select2("destroy");
		}
		scJQSelect2Add(row, "resolucion");
	}
}

function displayChange_field_nufac(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_nufac__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_nufac" + row).select2("destroy");
		}
		scJQSelect2Add(row, "nufac");
	}
}

function displayChange_field_concepto(row, status) {
}

function displayChange_field_fecharecibo(row, status) {
}

function displayChange_field_monto(row, status) {
}

function displayChange_field_son(row, status) {
}

function displayChange_field_saldofac(row, status) {
}

function displayChange_field_formapago(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_formapago__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_formapago" + row).select2("destroy");
		}
		scJQSelect2Add(row, "formapago");
	}
}

function displayChange_field_numcheque(row, status) {
}

function displayChange_field_banco(row, status) {
}

function displayChange_field_numtarjeta(row, status) {
}

function displayChange_field_nombreobanco(row, status) {
}

function displayChange_field_obser(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_resolucion("all", "on");
	displayChange_field_nufac("all", "on");
	displayChange_field_formapago("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_reciboingreso_remis_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_reciboingreso_remis')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "resolucion" == specificField) {
    scJQSelect2Add_resolucion(seqRow);
  }
  if (null == specificField || "nufac" == specificField) {
    scJQSelect2Add_nufac(seqRow);
  }
  if (null == specificField || "formapago" == specificField) {
    scJQSelect2Add_formapago(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_resolucion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_resolucion_obj" : "#id_sc_field_resolucion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_resolucion_obj',
      dropdownCssClass: 'css_resolucion_obj',
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

function scJQSelect2Add_nufac(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_nufac_obj" : "#id_sc_field_nufac" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_nufac_obj',
      dropdownCssClass: 'css_nufac_obj',
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

function scJQSelect2Add_formapago(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_formapago_obj" : "#id_sc_field_formapago" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_formapago_obj',
      dropdownCssClass: 'css_formapago_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_resolucion) { displayChange_field_resolucion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nufac) { displayChange_field_nufac(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_formapago) { displayChange_field_formapago(iLine, "on"); } }, 150);
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

