
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'numpago':
      case 'titulo':
      case 'cod_cuenta':
      case 'ncuenta_tercero':
      case 'docapagar':
      case 'fecpago':
      case 'client':
      case 'banco':
      case 'asent':
      case 'valor_base':
      case 'valor_iva':
      case 'montocan':
      case 'saldodocumento':
      case 'valpagar':
      case 'porc_ret':
      case 'ret':
      case 'porc_ica':
      case 'val_ica':
      case 'porc_reteiva':
      case 'val_reteiva':
      case 'descuent':
      case 'iddocapagar':
      case 'total_cuenta':
      case 'id_concepto':
      case 'obs':
      case 'conc':
      case 'detallepagos':
      case 'idpago':
        sc_exib_ocult_pag('form_hacerpagos_form0');
        break;
      case 'archivos':
        sc_exib_ocult_pag('form_hacerpagos_form1');
        break;
    }
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
  scEventControl_data["numpago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["titulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_cuenta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ncuenta_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["docapagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecpago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["client" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asent" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_base" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["montocan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldodocumento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valpagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_ret" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ret" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_ica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_ica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_reteiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_reteiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuent" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddocapagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total_cuenta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_concepto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detallepagos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numpago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numpago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ncuenta_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ncuenta_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["docapagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["docapagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecpago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecpago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["client" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["client" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asent" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asent" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_base" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_base" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["montocan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["montocan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldodocumento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldodocumento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valpagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valpagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_ret" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_ret" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ret" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ret" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_ica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_ica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_ica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_ica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_reteiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_reteiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_reteiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_reteiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuent" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuent" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddocapagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddocapagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total_cuenta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total_cuenta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_concepto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_concepto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detallepagos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detallepagos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["archivos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["archivos" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("client" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("banco" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asent" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("porc_ret" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("porc_ica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_concepto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asent" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("client" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("descuent" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("docapagar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_concepto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("iddocapagar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("ncuenta_tercero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_ica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_ret" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_reteiva" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("ret" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("val_ica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("val_reteiva" + iSeq == fieldName) {
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
  $('#id_sc_field_idpago' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_idpago_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_hacerpagos_idpago_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hacerpagos_idpago_onfocus(this, iSeqRow) });
  $('#id_sc_field_numpago' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_numpago_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_hacerpagos_numpago_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_hacerpagos_numpago_onfocus(this, iSeqRow) });
  $('#id_sc_field_client' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_client_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_hacerpagos_client_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hacerpagos_client_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecpago' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_fecpago_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_hacerpagos_fecpago_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_hacerpagos_fecpago_onfocus(this, iSeqRow) });
  $('#id_sc_field_montocan' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_montocan_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_montocan_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_montocan_onfocus(this, iSeqRow) });
  $('#id_sc_field_ret' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_ret_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_hacerpagos_ret_onchange(this, iSeqRow) })
                                 .bind('click', function() { sc_form_hacerpagos_ret_onclick(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_hacerpagos_ret_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuent' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_descuent_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_descuent_onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_hacerpagos_descuent_onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_descuent_onfocus(this, iSeqRow) });
  $('#id_sc_field_docapagar' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_docapagar_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_docapagar_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_docapagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_iddocapagar' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_iddocapagar_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_hacerpagos_iddocapagar_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hacerpagos_iddocapagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldodocumento' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_saldodocumento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_hacerpagos_saldodocumento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_hacerpagos_saldodocumento_onfocus(this, iSeqRow) });
  $('#id_sc_field_conc' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_conc_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_hacerpagos_conc_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hacerpagos_conc_onfocus(this, iSeqRow) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_obs_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_hacerpagos_obs_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_hacerpagos_obs_onfocus(this, iSeqRow) });
  $('#id_sc_field_asent' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_asent_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_hacerpagos_asent_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_hacerpagos_asent_onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_ret' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_porc_ret_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_porc_ret_onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_hacerpagos_porc_ret_onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_porc_ret_onfocus(this, iSeqRow) });
  $('#id_sc_field_val_ica' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_val_ica_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_hacerpagos_val_ica_onchange(this, iSeqRow) })
                                     .bind('click', function() { sc_form_hacerpagos_val_ica_onclick(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_hacerpagos_val_ica_onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_ica' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_porc_ica_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_porc_ica_onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_hacerpagos_porc_ica_onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_porc_ica_onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_reteiva' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_porc_reteiva_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_hacerpagos_porc_reteiva_onchange(this, iSeqRow) })
                                          .bind('click', function() { sc_form_hacerpagos_porc_reteiva_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hacerpagos_porc_reteiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_val_reteiva' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_val_reteiva_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_hacerpagos_val_reteiva_onchange(this, iSeqRow) })
                                         .bind('click', function() { sc_form_hacerpagos_val_reteiva_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hacerpagos_val_reteiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_banco_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_hacerpagos_banco_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_hacerpagos_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('change', function() { sc_form_hacerpagos_usuario_onchange(this, iSeqRow) });
  $('#id_sc_field_id_concepto' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_id_concepto_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_hacerpagos_id_concepto_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hacerpagos_id_concepto_onfocus(this, iSeqRow) });
  $('#id_sc_field_ncuenta_tercero' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_ncuenta_tercero_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_hacerpagos_ncuenta_tercero_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_hacerpagos_ncuenta_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado' + iSeqRow).bind('change', function() { sc_form_hacerpagos_creado_onchange(this, iSeqRow) });
  $('#id_sc_field_creado_hora' + iSeqRow).bind('change', function() { sc_form_hacerpagos_creado_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_actualizado' + iSeqRow).bind('change', function() { sc_form_hacerpagos_actualizado_onchange(this, iSeqRow) });
  $('#id_sc_field_actualizado_hora' + iSeqRow).bind('change', function() { sc_form_hacerpagos_actualizado_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_cod_cuenta' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_cod_cuenta_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_hacerpagos_cod_cuenta_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hacerpagos_cod_cuenta_onfocus(this, iSeqRow) });
  $('#id_sc_field_detallepagos' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_detallepagos_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_hacerpagos_detallepagos_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hacerpagos_detallepagos_onfocus(this, iSeqRow) });
  $('#id_sc_field_titulo' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_titulo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_hacerpagos_titulo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hacerpagos_titulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_total_cuenta' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_total_cuenta_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_hacerpagos_total_cuenta_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hacerpagos_total_cuenta_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_base' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_valor_base_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_hacerpagos_valor_base_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hacerpagos_valor_base_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_iva' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_valor_iva_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_hacerpagos_valor_iva_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hacerpagos_valor_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_valpagar' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_valpagar_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_valpagar_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_valpagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivos' + iSeqRow).bind('blur', function() { sc_form_hacerpagos_archivos_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_hacerpagos_archivos_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hacerpagos_archivos_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hacerpagos_idpago_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_idpago();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_idpago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_idpago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_numpago_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_numpago();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_numpago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_numpago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_client_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_client();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_client_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_client_onchange();
}

function sc_form_hacerpagos_client_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_fecpago_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_fecpago();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_fecpago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_fecpago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_montocan_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_montocan();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_montocan_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_montocan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_ret_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_ret();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_ret_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_ret_onchange();
}

function sc_form_hacerpagos_ret_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_ret_onclick();
}

function sc_form_hacerpagos_ret_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_descuent_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_descuent();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_descuent_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_descuent_onchange();
}

function sc_form_hacerpagos_descuent_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_descuent_onclick();
}

function sc_form_hacerpagos_descuent_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_docapagar_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_docapagar();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_docapagar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  sc_docapagar_onchange();
  do_ajax_form_hacerpagos_event_docapagar_onchange();
}

function sc_form_hacerpagos_docapagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_iddocapagar_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_iddocapagar();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_iddocapagar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_iddocapagar_onchange();
}

function sc_form_hacerpagos_iddocapagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_saldodocumento_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_saldodocumento();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_saldodocumento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_saldodocumento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_conc_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_conc();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_conc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_conc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_obs_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_obs();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_obs_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_obs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_asent_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_asent();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_asent_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  sc_asent_onchange();
  do_ajax_form_hacerpagos_event_asent_onchange();
}

function sc_form_hacerpagos_asent_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_porc_ret_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_porc_ret();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_porc_ret_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_porc_ret_onchange();
}

function sc_form_hacerpagos_porc_ret_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_porc_ret_onclick();
}

function sc_form_hacerpagos_porc_ret_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_val_ica_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_val_ica();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_val_ica_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_val_ica_onchange();
}

function sc_form_hacerpagos_val_ica_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_val_ica_onclick();
}

function sc_form_hacerpagos_val_ica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_porc_ica_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_porc_ica();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_porc_ica_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_porc_ica_onchange();
}

function sc_form_hacerpagos_porc_ica_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_porc_ica_onclick();
}

function sc_form_hacerpagos_porc_ica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_porc_reteiva_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_porc_reteiva();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_porc_reteiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_porc_reteiva_onchange();
}

function sc_form_hacerpagos_porc_reteiva_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_porc_reteiva_onclick();
}

function sc_form_hacerpagos_porc_reteiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_val_reteiva_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_val_reteiva();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_val_reteiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_val_reteiva_onchange();
}

function sc_form_hacerpagos_val_reteiva_onclick(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_event_val_reteiva_onclick();
}

function sc_form_hacerpagos_val_reteiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_banco();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_id_concepto_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_id_concepto();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_id_concepto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_hacerpagos_event_id_concepto_onchange();
}

function sc_form_hacerpagos_id_concepto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_ncuenta_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_ncuenta_tercero();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_ncuenta_tercero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  sc_ncuenta_tercero_onchange();
  do_ajax_form_hacerpagos_event_ncuenta_tercero_onchange();
}

function sc_form_hacerpagos_ncuenta_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_creado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_creado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_actualizado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_actualizado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_cod_cuenta_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_cod_cuenta();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_cod_cuenta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_cod_cuenta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_detallepagos_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_detallepagos();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_detallepagos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_detallepagos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_titulo_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_titulo();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_titulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_titulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_total_cuenta_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_total_cuenta();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_total_cuenta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_total_cuenta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_valor_base_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_valor_base();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_valor_base_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_valor_base_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_valor_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_valor_iva();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_valor_iva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_valor_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_valpagar_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_valpagar();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_valpagar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_valpagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hacerpagos_archivos_onblur(oThis, iSeqRow) {
  do_ajax_form_hacerpagos_validate_archivos();
  scCssBlur(oThis);
}

function sc_form_hacerpagos_archivos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_hacerpagos_archivos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
	displayChange_block("2", status);
	displayChange_block("3", status);
	displayChange_block("4", status);
	displayChange_block("5", status);
	displayChange_block("6", status);
}

function displayChange_page_1(status) {
	displayChange_block("7", status);
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("numpago", "", status);
	displayChange_field("titulo", "", status);
	displayChange_field("cod_cuenta", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("ncuenta_tercero", "", status);
	displayChange_field("docapagar", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("fecpago", "", status);
	displayChange_field("client", "", status);
	displayChange_field("banco", "", status);
	displayChange_field("asent", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("valor_base", "", status);
	displayChange_field("valor_iva", "", status);
	displayChange_field("montocan", "", status);
	displayChange_field("saldodocumento", "", status);
	displayChange_field("valpagar", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("porc_ret", "", status);
	displayChange_field("ret", "", status);
	displayChange_field("porc_ica", "", status);
	displayChange_field("val_ica", "", status);
	displayChange_field("porc_reteiva", "", status);
	displayChange_field("val_reteiva", "", status);
	displayChange_field("descuent", "", status);
	displayChange_field("iddocapagar", "", status);
	displayChange_field("total_cuenta", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("id_concepto", "", status);
	displayChange_field("obs", "", status);
	displayChange_field("conc", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("detallepagos", "", status);
	displayChange_field("idpago", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("archivos", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_numpago(row, status);
	displayChange_field_titulo(row, status);
	displayChange_field_cod_cuenta(row, status);
	displayChange_field_ncuenta_tercero(row, status);
	displayChange_field_docapagar(row, status);
	displayChange_field_fecpago(row, status);
	displayChange_field_client(row, status);
	displayChange_field_banco(row, status);
	displayChange_field_asent(row, status);
	displayChange_field_valor_base(row, status);
	displayChange_field_valor_iva(row, status);
	displayChange_field_montocan(row, status);
	displayChange_field_saldodocumento(row, status);
	displayChange_field_valpagar(row, status);
	displayChange_field_porc_ret(row, status);
	displayChange_field_ret(row, status);
	displayChange_field_porc_ica(row, status);
	displayChange_field_val_ica(row, status);
	displayChange_field_porc_reteiva(row, status);
	displayChange_field_val_reteiva(row, status);
	displayChange_field_descuent(row, status);
	displayChange_field_iddocapagar(row, status);
	displayChange_field_total_cuenta(row, status);
	displayChange_field_id_concepto(row, status);
	displayChange_field_obs(row, status);
	displayChange_field_conc(row, status);
	displayChange_field_detallepagos(row, status);
	displayChange_field_idpago(row, status);
	displayChange_field_archivos(row, status);
}

function displayChange_field(field, row, status) {
	if ("numpago" == field) {
		displayChange_field_numpago(row, status);
	}
	if ("titulo" == field) {
		displayChange_field_titulo(row, status);
	}
	if ("cod_cuenta" == field) {
		displayChange_field_cod_cuenta(row, status);
	}
	if ("ncuenta_tercero" == field) {
		displayChange_field_ncuenta_tercero(row, status);
	}
	if ("docapagar" == field) {
		displayChange_field_docapagar(row, status);
	}
	if ("fecpago" == field) {
		displayChange_field_fecpago(row, status);
	}
	if ("client" == field) {
		displayChange_field_client(row, status);
	}
	if ("banco" == field) {
		displayChange_field_banco(row, status);
	}
	if ("asent" == field) {
		displayChange_field_asent(row, status);
	}
	if ("valor_base" == field) {
		displayChange_field_valor_base(row, status);
	}
	if ("valor_iva" == field) {
		displayChange_field_valor_iva(row, status);
	}
	if ("montocan" == field) {
		displayChange_field_montocan(row, status);
	}
	if ("saldodocumento" == field) {
		displayChange_field_saldodocumento(row, status);
	}
	if ("valpagar" == field) {
		displayChange_field_valpagar(row, status);
	}
	if ("porc_ret" == field) {
		displayChange_field_porc_ret(row, status);
	}
	if ("ret" == field) {
		displayChange_field_ret(row, status);
	}
	if ("porc_ica" == field) {
		displayChange_field_porc_ica(row, status);
	}
	if ("val_ica" == field) {
		displayChange_field_val_ica(row, status);
	}
	if ("porc_reteiva" == field) {
		displayChange_field_porc_reteiva(row, status);
	}
	if ("val_reteiva" == field) {
		displayChange_field_val_reteiva(row, status);
	}
	if ("descuent" == field) {
		displayChange_field_descuent(row, status);
	}
	if ("iddocapagar" == field) {
		displayChange_field_iddocapagar(row, status);
	}
	if ("total_cuenta" == field) {
		displayChange_field_total_cuenta(row, status);
	}
	if ("id_concepto" == field) {
		displayChange_field_id_concepto(row, status);
	}
	if ("obs" == field) {
		displayChange_field_obs(row, status);
	}
	if ("conc" == field) {
		displayChange_field_conc(row, status);
	}
	if ("detallepagos" == field) {
		displayChange_field_detallepagos(row, status);
	}
	if ("idpago" == field) {
		displayChange_field_idpago(row, status);
	}
	if ("archivos" == field) {
		displayChange_field_archivos(row, status);
	}
}

function displayChange_field_numpago(row, status) {
}

function displayChange_field_titulo(row, status) {
}

function displayChange_field_cod_cuenta(row, status) {
}

function displayChange_field_ncuenta_tercero(row, status) {
}

function displayChange_field_docapagar(row, status) {
}

function displayChange_field_fecpago(row, status) {
}

function displayChange_field_client(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_client__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_client" + row).select2("destroy");
		}
		scJQSelect2Add(row, "client");
	}
}

function displayChange_field_banco(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_banco__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_banco" + row).select2("destroy");
		}
		scJQSelect2Add(row, "banco");
	}
}

function displayChange_field_asent(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_asent__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_asent" + row).select2("destroy");
		}
		scJQSelect2Add(row, "asent");
	}
}

function displayChange_field_valor_base(row, status) {
}

function displayChange_field_valor_iva(row, status) {
}

function displayChange_field_montocan(row, status) {
}

function displayChange_field_saldodocumento(row, status) {
}

function displayChange_field_valpagar(row, status) {
}

function displayChange_field_porc_ret(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_porc_ret__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_porc_ret" + row).select2("destroy");
		}
		scJQSelect2Add(row, "porc_ret");
	}
}

function displayChange_field_ret(row, status) {
}

function displayChange_field_porc_ica(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_porc_ica__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_porc_ica" + row).select2("destroy");
		}
		scJQSelect2Add(row, "porc_ica");
	}
}

function displayChange_field_val_ica(row, status) {
}

function displayChange_field_porc_reteiva(row, status) {
}

function displayChange_field_val_reteiva(row, status) {
}

function displayChange_field_descuent(row, status) {
}

function displayChange_field_iddocapagar(row, status) {
}

function displayChange_field_total_cuenta(row, status) {
}

function displayChange_field_id_concepto(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_concepto__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_concepto" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_concepto");
	}
}

function displayChange_field_obs(row, status) {
}

function displayChange_field_conc(row, status) {
}

function displayChange_field_detallepagos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detallepagos_terceros")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detallepagos_terceros")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_idpago(row, status) {
}

function displayChange_field_archivos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_gestor_archivos_ce")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_gestor_archivos_ce")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_client("all", "on");
	displayChange_field_banco("all", "on");
	displayChange_field_asent("all", "on");
	displayChange_field_porc_ret("all", "on");
	displayChange_field_porc_ica("all", "on");
	displayChange_field_id_concepto("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hacerpagos_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecpago" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecpago" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_hacerpagos_validate_fecpago(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecpago']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_creado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_creado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['creado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_hacerpagos_validate_creado(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_actualizado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_actualizado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['actualizado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_hacerpagos_validate_actualizado(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_hacerpagos')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "client" == specificField) {
    scJQSelect2Add_client(seqRow);
  }
  if (null == specificField || "banco" == specificField) {
    scJQSelect2Add_banco(seqRow);
  }
  if (null == specificField || "asent" == specificField) {
    scJQSelect2Add_asent(seqRow);
  }
  if (null == specificField || "porc_ret" == specificField) {
    scJQSelect2Add_porc_ret(seqRow);
  }
  if (null == specificField || "porc_ica" == specificField) {
    scJQSelect2Add_porc_ica(seqRow);
  }
  if (null == specificField || "id_concepto" == specificField) {
    scJQSelect2Add_id_concepto(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_client(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_client_obj" : "#id_sc_field_client" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_client_obj',
      dropdownCssClass: 'css_client_obj',
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

function scJQSelect2Add_banco(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_banco_obj" : "#id_sc_field_banco" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_banco_obj',
      dropdownCssClass: 'css_banco_obj',
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

function scJQSelect2Add_asent(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_asent_obj" : "#id_sc_field_asent" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_asent_obj',
      dropdownCssClass: 'css_asent_obj',
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

function scJQSelect2Add_porc_ret(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_porc_ret_obj" : "#id_sc_field_porc_ret" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_porc_ret_obj',
      dropdownCssClass: 'css_porc_ret_obj',
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

function scJQSelect2Add_porc_ica(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_porc_ica_obj" : "#id_sc_field_porc_ica" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_porc_ica_obj',
      dropdownCssClass: 'css_porc_ica_obj',
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

function scJQSelect2Add_id_concepto(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_concepto_obj" : "#id_sc_field_id_concepto" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_concepto_obj',
      dropdownCssClass: 'css_id_concepto_obj',
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
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_client) { displayChange_field_client(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_banco) { displayChange_field_banco(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asent) { displayChange_field_asent(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_porc_ret) { displayChange_field_porc_ret(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_porc_ica) { displayChange_field_porc_ica(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_concepto) { displayChange_field_id_concepto(iLine, "on"); } }, 150);
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

