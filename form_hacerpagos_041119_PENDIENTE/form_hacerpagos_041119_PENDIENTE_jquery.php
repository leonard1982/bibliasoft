
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
  scEventControl_data["docapagar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldodocumento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["montocan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_base_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_iva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valpagar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_ret_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ret_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_ica_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_ica_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_reteiva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_reteiva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuent_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_concepto_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["docapagar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["docapagar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldodocumento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldodocumento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["montocan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["montocan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_base_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_base_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_iva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_iva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valpagar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valpagar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_ret_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_ret_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ret_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ret_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_ica_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_ica_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_ica_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_ica_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_reteiva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_reteiva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_reteiva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_reteiva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuent_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuent_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_concepto_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_concepto_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("porc_ret_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("porc_ica_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_concepto_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("iddocapagar_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asent_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("banco_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asent_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("client_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("descuent_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_concepto_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("iddocapagar_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_ica_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_ret_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_reteiva_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("ret_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("val_ica_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("val_reteiva_" + iSeq == fieldName) {
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
  $('#id_sc_field_idpago_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_idpago__onchange(this, iSeqRow) });
  $('#id_sc_field_numpago_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_numpago__onchange(this, iSeqRow) });
  $('#id_sc_field_client_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_client__onchange(this, iSeqRow) });
  $('#id_sc_field_fecpago_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_fecpago__onchange(this, iSeqRow) });
  $('#id_sc_field_montocan_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_montocan__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_montocan__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_montocan__onfocus(this, iSeqRow) });
  $('#id_sc_field_ret_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_ret__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_ret__onchange(this, iSeqRow) })
                                  .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_ret__onclick(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_ret__onfocus(this, iSeqRow) });
  $('#id_sc_field_descuent_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_descuent__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_descuent__onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_descuent__onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_descuent__onfocus(this, iSeqRow) });
  $('#id_sc_field_docapagar_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_docapagar__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_docapagar__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_docapagar__onfocus(this, iSeqRow) });
  $('#id_sc_field_iddocapagar_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_iddocapagar__onchange(this, iSeqRow) });
  $('#id_sc_field_saldodocumento_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onfocus(this, iSeqRow) });
  $('#id_sc_field_conc_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_conc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_conc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_conc__onfocus(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_obs__onfocus(this, iSeqRow) });
  $('#id_sc_field_asent_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_asent__onchange(this, iSeqRow) });
  $('#id_sc_field_porc_ret_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onfocus(this, iSeqRow) });
  $('#id_sc_field_val_ica_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_val_ica__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_val_ica__onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_val_ica__onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_val_ica__onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_ica_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_reteiva_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onchange(this, iSeqRow) })
                                           .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onfocus(this, iSeqRow) });
  $('#id_sc_field_val_reteiva_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onchange(this, iSeqRow) })
                                          .bind('click', function() { sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_banco__onchange(this, iSeqRow) });
  $('#id_sc_field_usuario_' + iSeqRow).bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_usuario__onchange(this, iSeqRow) });
  $('#id_sc_field_id_concepto_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_base_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_base__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_base__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_base__onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_iva_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onfocus(this, iSeqRow) });
  $('#id_sc_field_valpagar_' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_041119_PENDIENTE_valpagar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_041119_PENDIENTE_valpagar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_041119_PENDIENTE_valpagar__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hacerpagos_041119_PENDIENTE_idpago__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_numpago__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_client__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_fecpago__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_montocan__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_montocan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_montocan__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_montocan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_ret__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_ret_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_ret__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_ret__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_ret__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_ret__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_ret__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_descuent__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_descuent_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_descuent__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_descuent__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_descuent__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_descuent__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_descuent__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_docapagar__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_docapagar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_docapagar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_docapagar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_iddocapagar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_saldodocumento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_saldodocumento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_conc__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_conc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_conc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_conc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_obs__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_obs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_asent__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_porc_ret_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_ret__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_ret__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ret__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_ica__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_val_ica_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_ica__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_val_ica__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_ica__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_val_ica__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_ica__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_porc_ica_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_ica__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_ica__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_ica__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_porc_reteiva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_reteiva__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_porc_reteiva__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_porc_reteiva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_val_reteiva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_val_reteiva__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_val_reteiva__onclick(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_val_reteiva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_banco__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_usuario__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_id_concepto_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_041119_PENDIENTE_event_id_concepto__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_id_concepto__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_base__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_valor_base_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_base__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_base__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_valor_iva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valor_iva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valpagar__onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_041119_PENDIENTE_validate_valpagar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valpagar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_hacerpagos_041119_PENDIENTE_valpagar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("docapagar_", "", status);
	displayChange_field("saldodocumento_", "", status);
	displayChange_field("montocan_", "", status);
	displayChange_field("valor_base_", "", status);
	displayChange_field("valor_iva_", "", status);
	displayChange_field("valpagar_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("porc_ret_", "", status);
	displayChange_field("ret_", "", status);
	displayChange_field("porc_ica_", "", status);
	displayChange_field("val_ica_", "", status);
	displayChange_field("porc_reteiva_", "", status);
	displayChange_field("val_reteiva_", "", status);
	displayChange_field("descuent_", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("id_concepto_", "", status);
	displayChange_field("conc_", "", status);
	displayChange_field("obs_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_docapagar_(row, status);
	displayChange_field_saldodocumento_(row, status);
	displayChange_field_montocan_(row, status);
	displayChange_field_valor_base_(row, status);
	displayChange_field_valor_iva_(row, status);
	displayChange_field_valpagar_(row, status);
	displayChange_field_porc_ret_(row, status);
	displayChange_field_ret_(row, status);
	displayChange_field_porc_ica_(row, status);
	displayChange_field_val_ica_(row, status);
	displayChange_field_porc_reteiva_(row, status);
	displayChange_field_val_reteiva_(row, status);
	displayChange_field_descuent_(row, status);
	displayChange_field_id_concepto_(row, status);
	displayChange_field_conc_(row, status);
	displayChange_field_obs_(row, status);
}

function displayChange_field(field, row, status) {
	if ("docapagar_" == field) {
		displayChange_field_docapagar_(row, status);
	}
	if ("saldodocumento_" == field) {
		displayChange_field_saldodocumento_(row, status);
	}
	if ("montocan_" == field) {
		displayChange_field_montocan_(row, status);
	}
	if ("valor_base_" == field) {
		displayChange_field_valor_base_(row, status);
	}
	if ("valor_iva_" == field) {
		displayChange_field_valor_iva_(row, status);
	}
	if ("valpagar_" == field) {
		displayChange_field_valpagar_(row, status);
	}
	if ("porc_ret_" == field) {
		displayChange_field_porc_ret_(row, status);
	}
	if ("ret_" == field) {
		displayChange_field_ret_(row, status);
	}
	if ("porc_ica_" == field) {
		displayChange_field_porc_ica_(row, status);
	}
	if ("val_ica_" == field) {
		displayChange_field_val_ica_(row, status);
	}
	if ("porc_reteiva_" == field) {
		displayChange_field_porc_reteiva_(row, status);
	}
	if ("val_reteiva_" == field) {
		displayChange_field_val_reteiva_(row, status);
	}
	if ("descuent_" == field) {
		displayChange_field_descuent_(row, status);
	}
	if ("id_concepto_" == field) {
		displayChange_field_id_concepto_(row, status);
	}
	if ("conc_" == field) {
		displayChange_field_conc_(row, status);
	}
	if ("obs_" == field) {
		displayChange_field_obs_(row, status);
	}
}

function displayChange_field_docapagar_(row, status) {
}

function displayChange_field_saldodocumento_(row, status) {
}

function displayChange_field_montocan_(row, status) {
}

function displayChange_field_valor_base_(row, status) {
}

function displayChange_field_valor_iva_(row, status) {
}

function displayChange_field_valpagar_(row, status) {
}

function displayChange_field_porc_ret_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_porc_ret___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_porc_ret_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "porc_ret_");
	}
}

function displayChange_field_ret_(row, status) {
}

function displayChange_field_porc_ica_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_porc_ica___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_porc_ica_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "porc_ica_");
	}
}

function displayChange_field_val_ica_(row, status) {
}

function displayChange_field_porc_reteiva_(row, status) {
}

function displayChange_field_val_reteiva_(row, status) {
}

function displayChange_field_descuent_(row, status) {
}

function displayChange_field_id_concepto_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_concepto___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_concepto_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_concepto_");
	}
}

function displayChange_field_conc_(row, status) {
}

function displayChange_field_obs_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_porc_ret_("all", "on");
	displayChange_field_porc_ica_("all", "on");
	displayChange_field_id_concepto_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hacerpagos_041119_PENDIENTE_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(40);
		}
	}
}
function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: trigger.offset().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_hacerpagos_041119_PENDIENTE')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
});

function scJQPasswordToggleAdd(seqRow) {
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
  if (null == specificField || "porc_ret_" == specificField) {
    scJQSelect2Add_porc_ret_(seqRow);
  }
  if (null == specificField || "porc_ica_" == specificField) {
    scJQSelect2Add_porc_ica_(seqRow);
  }
  if (null == specificField || "id_concepto_" == specificField) {
    scJQSelect2Add_id_concepto_(seqRow);
  }
  if (null == specificField || "iddocapagar_" == specificField) {
    scJQSelect2Add_iddocapagar_(seqRow);
  }
  if (null == specificField || "asent_" == specificField) {
    scJQSelect2Add_asent_(seqRow);
  }
  if (null == specificField || "banco_" == specificField) {
    scJQSelect2Add_banco_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_porc_ret_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_porc_ret__obj" : "#id_sc_field_porc_ret_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_porc_ret__obj',
      dropdownCssClass: 'css_porc_ret__obj',
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

function scJQSelect2Add_porc_ica_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_porc_ica__obj" : "#id_sc_field_porc_ica_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_porc_ica__obj',
      dropdownCssClass: 'css_porc_ica__obj',
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

function scJQSelect2Add_id_concepto_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_concepto__obj" : "#id_sc_field_id_concepto_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_concepto__obj',
      dropdownCssClass: 'css_id_concepto__obj',
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

function scJQSelect2Add_iddocapagar_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_iddocapagar__obj" : "#id_sc_field_iddocapagar_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_iddocapagar__obj',
      dropdownCssClass: 'css_iddocapagar__obj',
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

function scJQSelect2Add_asent_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_asent__obj" : "#id_sc_field_asent_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_asent__obj',
      dropdownCssClass: 'css_asent__obj',
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

function scJQSelect2Add_banco_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_banco__obj" : "#id_sc_field_banco_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_banco__obj',
      dropdownCssClass: 'css_banco__obj',
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
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_porc_ret_) { displayChange_field_porc_ret_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_porc_ica_) { displayChange_field_porc_ica_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_concepto_) { displayChange_field_id_concepto_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_iddocapagar_) { displayChange_field_iddocapagar_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asent_) { displayChange_field_asent_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_banco_) { displayChange_field_banco_(iLine, "on"); } }, 150);
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

