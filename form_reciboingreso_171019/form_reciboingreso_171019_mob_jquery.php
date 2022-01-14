
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
  scEventControl_data["fecharecibo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nufac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["monto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["son" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldofac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcheque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numtarjeta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombreobanco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_base" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valcobrar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porc_rete" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rete" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["por_ica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_ica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["por_retiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_retiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asentado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_concepto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["concepto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relleno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obser" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detallepagos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idrecibo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nurecibo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nurecibo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecharecibo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecharecibo" + iSeqRow]["change"]) {
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
  if (scEventControl_data["numcheque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcheque" + iSeqRow]["change"]) {
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
  if (scEventControl_data["banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["change"]) {
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
  if (scEventControl_data["valcobrar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valcobrar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porc_rete" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porc_rete" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rete" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rete" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["por_ica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["por_ica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_ica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_ica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["por_retiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["por_retiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_retiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_retiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_concepto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_concepto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["concepto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["concepto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relleno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relleno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obser" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obser" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detallepagos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detallepagos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idrecibo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idrecibo" + iSeqRow]["change"]) {
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
  if ("banco_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("porc_rete" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("por_ica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_concepto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("descu" + iSeq == fieldName) {
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
  if ("id_concepto" + iSeq == fieldName) {
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
  if ("por_ica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("por_retiva" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("porc_rete" + iSeq == fieldName) {
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
  if ("rete" + iSeq == fieldName) {
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
  if ("val_retiva" + iSeq == fieldName) {
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
  $('#id_sc_field_idrecibo' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_idrecibo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_idrecibo_onfocus(this, iSeqRow) });
  $('#id_sc_field_nurecibo' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_nurecibo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_nurecibo_onfocus(this, iSeqRow) });
  $('#id_sc_field_nufac' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_nufac_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_171019_nufac_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_171019_nufac_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_reciboingreso_171019_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_reciboingreso_171019_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecharecibo' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_fecharecibo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_reciboingreso_171019_fecharecibo_onfocus(this, iSeqRow) });
  $('#id_sc_field_monto' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_monto_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_171019_monto_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_171019_monto_onfocus(this, iSeqRow) });
  $('#id_sc_field_son' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_son_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_reciboingreso_171019_son_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldofac' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_saldofac_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_saldofac_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcheque' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_numcheque_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_171019_numcheque_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_banco_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_171019_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_numtarjeta' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_numtarjeta_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_171019_numtarjeta_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombreobanco' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_nombreobanco_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_reciboingreso_171019_nombreobanco_onfocus(this, iSeqRow) });
  $('#id_sc_field_obser' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_obser_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_171019_obser_onfocus(this, iSeqRow) });
  $('#id_sc_field_concepto' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_concepto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_concepto_onfocus(this, iSeqRow) });
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_resolucion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_reciboingreso_171019_resolucion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_171019_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rete' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_rete_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_reciboingreso_171019_rete_onchange(this, iSeqRow) })
                                  .bind('click', function() { sc_form_reciboingreso_171019_rete_onclick(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_reciboingreso_171019_rete_onfocus(this, iSeqRow) });
  $('#id_sc_field_descu' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_descu_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_reciboingreso_171019_descu_onchange(this, iSeqRow) })
                                   .bind('click', function() { sc_form_reciboingreso_171019_descu_onclick(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_reciboingreso_171019_descu_onfocus(this, iSeqRow) });
  $('#id_sc_field_asentado' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_asentado_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_reciboingreso_171019_asentado_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_asentado_onfocus(this, iSeqRow) });
  $('#id_sc_field_porc_rete' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_porc_rete_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_reciboingreso_171019_porc_rete_onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_reciboingreso_171019_porc_rete_onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_171019_porc_rete_onfocus(this, iSeqRow) });
  $('#id_sc_field_val_ica' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_val_ica_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_reciboingreso_171019_val_ica_onchange(this, iSeqRow) })
                                     .bind('click', function() { sc_form_reciboingreso_171019_val_ica_onclick(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_reciboingreso_171019_val_ica_onfocus(this, iSeqRow) });
  $('#id_sc_field_por_ica' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_por_ica_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_reciboingreso_171019_por_ica_onchange(this, iSeqRow) })
                                     .bind('click', function() { sc_form_reciboingreso_171019_por_ica_onclick(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_reciboingreso_171019_por_ica_onfocus(this, iSeqRow) });
  $('#id_sc_field_por_retiva' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_por_retiva_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_reciboingreso_171019_por_retiva_onchange(this, iSeqRow) })
                                        .bind('click', function() { sc_form_reciboingreso_171019_por_retiva_onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_171019_por_retiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_val_retiva' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_val_retiva_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_reciboingreso_171019_val_retiva_onchange(this, iSeqRow) })
                                        .bind('click', function() { sc_form_reciboingreso_171019_val_retiva_onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_171019_val_retiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_id' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_banco_id_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_reciboingreso_171019_banco_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_concepto' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_id_concepto_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_reciboingreso_171019_id_concepto_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_reciboingreso_171019_id_concepto_onfocus(this, iSeqRow) });
  $('#id_sc_field_detallepagos' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_detallepagos_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_reciboingreso_171019_detallepagos_onfocus(this, iSeqRow) });
  $('#id_sc_field_valcobrar' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_valcobrar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_171019_valcobrar_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_base' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_valor_base_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_reciboingreso_171019_valor_base_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_iva' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_valor_iva_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_reciboingreso_171019_valor_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_relleno' + iSeqRow).bind('blur', function() { sc_form_reciboingreso_171019_relleno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_reciboingreso_171019_relleno_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_reciboingreso_171019_idrecibo_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_idrecibo();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_idrecibo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_nurecibo_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_nurecibo();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_nurecibo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_nufac_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_nufac();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_nufac_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_nufac_onchange();
}

function sc_form_reciboingreso_171019_nufac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_cliente_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_cliente_onchange();
}

function sc_form_reciboingreso_171019_cliente_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_fecharecibo_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_fecharecibo();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_fecharecibo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_monto_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_monto();
  scCssBlur(oThis);
  do_ajax_form_reciboingreso_171019_mob_event_monto_onblur();
}

function sc_form_reciboingreso_171019_monto_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_monto_onchange();
}

function sc_form_reciboingreso_171019_monto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_son_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_son();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_son_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_saldofac_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_saldofac();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_saldofac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_numcheque_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_numcheque();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_numcheque_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_banco_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_banco();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_numtarjeta_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_numtarjeta();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_numtarjeta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_nombreobanco_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_nombreobanco();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_nombreobanco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_obser_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_obser();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_obser_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_concepto_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_concepto();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_concepto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_resolucion_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_resolucion_onchange();
}

function sc_form_reciboingreso_171019_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_rete_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_rete();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_rete_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_rete_onchange();
}

function sc_form_reciboingreso_171019_rete_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_rete_onclick();
}

function sc_form_reciboingreso_171019_rete_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_descu_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_descu();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_descu_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_descu_onchange();
}

function sc_form_reciboingreso_171019_descu_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_descu_onclick();
}

function sc_form_reciboingreso_171019_descu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_asentado_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_asentado();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_asentado_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_asentado_onchange();
}

function sc_form_reciboingreso_171019_asentado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_porc_rete_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_porc_rete();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_porc_rete_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_porc_rete_onchange();
}

function sc_form_reciboingreso_171019_porc_rete_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_porc_rete_onclick();
}

function sc_form_reciboingreso_171019_porc_rete_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_val_ica_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_val_ica();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_val_ica_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_val_ica_onchange();
}

function sc_form_reciboingreso_171019_val_ica_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_val_ica_onclick();
}

function sc_form_reciboingreso_171019_val_ica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_por_ica_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_por_ica();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_por_ica_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_por_ica_onchange();
}

function sc_form_reciboingreso_171019_por_ica_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_por_ica_onclick();
}

function sc_form_reciboingreso_171019_por_ica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_por_retiva_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_por_retiva();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_por_retiva_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_por_retiva_onchange();
}

function sc_form_reciboingreso_171019_por_retiva_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_por_retiva_onclick();
}

function sc_form_reciboingreso_171019_por_retiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_val_retiva_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_val_retiva();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_val_retiva_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_val_retiva_onchange();
}

function sc_form_reciboingreso_171019_val_retiva_onclick(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_val_retiva_onclick();
}

function sc_form_reciboingreso_171019_val_retiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_banco_id_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_banco_id();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_banco_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_id_concepto_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_id_concepto();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_id_concepto_onchange(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_event_id_concepto_onchange();
}

function sc_form_reciboingreso_171019_id_concepto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_detallepagos_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_detallepagos();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_detallepagos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_valcobrar_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_valcobrar();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_valcobrar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_valor_base_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_valor_base();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_valor_base_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_valor_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_valor_iva();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_valor_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_reciboingreso_171019_relleno_onblur(oThis, iSeqRow) {
  do_ajax_form_reciboingreso_171019_mob_validate_relleno();
  scCssBlur(oThis);
}

function sc_form_reciboingreso_171019_relleno_onfocus(oThis, iSeqRow) {
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
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nurecibo", "", status);
	displayChange_field("fecharecibo", "", status);
	displayChange_field("cliente", "", status);
	displayChange_field("resolucion", "", status);
	displayChange_field("nufac", "", status);
	displayChange_field("monto", "", status);
	displayChange_field("son", "", status);
	displayChange_field("saldofac", "", status);
	displayChange_field("numcheque", "", status);
	displayChange_field("numtarjeta", "", status);
	displayChange_field("nombreobanco", "", status);
	displayChange_field("banco", "", status);
	displayChange_field("valor_base", "", status);
	displayChange_field("valor_iva", "", status);
	displayChange_field("valcobrar", "", status);
	displayChange_field("banco_id", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("porc_rete", "", status);
	displayChange_field("rete", "", status);
	displayChange_field("por_ica", "", status);
	displayChange_field("val_ica", "", status);
	displayChange_field("por_retiva", "", status);
	displayChange_field("val_retiva", "", status);
	displayChange_field("descu", "", status);
	displayChange_field("asentado", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("id_concepto", "", status);
	displayChange_field("concepto", "", status);
	displayChange_field("relleno", "", status);
	displayChange_field("obser", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detallepagos", "", status);
	displayChange_field("idrecibo", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nurecibo(row, status);
	displayChange_field_fecharecibo(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_resolucion(row, status);
	displayChange_field_nufac(row, status);
	displayChange_field_monto(row, status);
	displayChange_field_son(row, status);
	displayChange_field_saldofac(row, status);
	displayChange_field_numcheque(row, status);
	displayChange_field_numtarjeta(row, status);
	displayChange_field_nombreobanco(row, status);
	displayChange_field_banco(row, status);
	displayChange_field_valor_base(row, status);
	displayChange_field_valor_iva(row, status);
	displayChange_field_valcobrar(row, status);
	displayChange_field_banco_id(row, status);
	displayChange_field_porc_rete(row, status);
	displayChange_field_rete(row, status);
	displayChange_field_por_ica(row, status);
	displayChange_field_val_ica(row, status);
	displayChange_field_por_retiva(row, status);
	displayChange_field_val_retiva(row, status);
	displayChange_field_descu(row, status);
	displayChange_field_asentado(row, status);
	displayChange_field_id_concepto(row, status);
	displayChange_field_concepto(row, status);
	displayChange_field_relleno(row, status);
	displayChange_field_obser(row, status);
	displayChange_field_detallepagos(row, status);
	displayChange_field_idrecibo(row, status);
}

function displayChange_field(field, row, status) {
	if ("nurecibo" == field) {
		displayChange_field_nurecibo(row, status);
	}
	if ("fecharecibo" == field) {
		displayChange_field_fecharecibo(row, status);
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
	if ("monto" == field) {
		displayChange_field_monto(row, status);
	}
	if ("son" == field) {
		displayChange_field_son(row, status);
	}
	if ("saldofac" == field) {
		displayChange_field_saldofac(row, status);
	}
	if ("numcheque" == field) {
		displayChange_field_numcheque(row, status);
	}
	if ("numtarjeta" == field) {
		displayChange_field_numtarjeta(row, status);
	}
	if ("nombreobanco" == field) {
		displayChange_field_nombreobanco(row, status);
	}
	if ("banco" == field) {
		displayChange_field_banco(row, status);
	}
	if ("valor_base" == field) {
		displayChange_field_valor_base(row, status);
	}
	if ("valor_iva" == field) {
		displayChange_field_valor_iva(row, status);
	}
	if ("valcobrar" == field) {
		displayChange_field_valcobrar(row, status);
	}
	if ("banco_id" == field) {
		displayChange_field_banco_id(row, status);
	}
	if ("porc_rete" == field) {
		displayChange_field_porc_rete(row, status);
	}
	if ("rete" == field) {
		displayChange_field_rete(row, status);
	}
	if ("por_ica" == field) {
		displayChange_field_por_ica(row, status);
	}
	if ("val_ica" == field) {
		displayChange_field_val_ica(row, status);
	}
	if ("por_retiva" == field) {
		displayChange_field_por_retiva(row, status);
	}
	if ("val_retiva" == field) {
		displayChange_field_val_retiva(row, status);
	}
	if ("descu" == field) {
		displayChange_field_descu(row, status);
	}
	if ("asentado" == field) {
		displayChange_field_asentado(row, status);
	}
	if ("id_concepto" == field) {
		displayChange_field_id_concepto(row, status);
	}
	if ("concepto" == field) {
		displayChange_field_concepto(row, status);
	}
	if ("relleno" == field) {
		displayChange_field_relleno(row, status);
	}
	if ("obser" == field) {
		displayChange_field_obser(row, status);
	}
	if ("detallepagos" == field) {
		displayChange_field_detallepagos(row, status);
	}
	if ("idrecibo" == field) {
		displayChange_field_idrecibo(row, status);
	}
}

function displayChange_field_nurecibo(row, status) {
}

function displayChange_field_fecharecibo(row, status) {
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

function displayChange_field_monto(row, status) {
}

function displayChange_field_son(row, status) {
}

function displayChange_field_saldofac(row, status) {
}

function displayChange_field_numcheque(row, status) {
}

function displayChange_field_numtarjeta(row, status) {
}

function displayChange_field_nombreobanco(row, status) {
}

function displayChange_field_banco(row, status) {
}

function displayChange_field_valor_base(row, status) {
}

function displayChange_field_valor_iva(row, status) {
}

function displayChange_field_valcobrar(row, status) {
}

function displayChange_field_banco_id(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_banco_id__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_banco_id" + row).select2("destroy");
		}
		scJQSelect2Add(row, "banco_id");
	}
}

function displayChange_field_porc_rete(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_porc_rete__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_porc_rete" + row).select2("destroy");
		}
		scJQSelect2Add(row, "porc_rete");
	}
}

function displayChange_field_rete(row, status) {
}

function displayChange_field_por_ica(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_por_ica__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_por_ica" + row).select2("destroy");
		}
		scJQSelect2Add(row, "por_ica");
	}
}

function displayChange_field_val_ica(row, status) {
}

function displayChange_field_por_retiva(row, status) {
}

function displayChange_field_val_retiva(row, status) {
}

function displayChange_field_descu(row, status) {
}

function displayChange_field_asentado(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_asentado__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_asentado" + row).select2("destroy");
		}
		scJQSelect2Add(row, "asentado");
	}
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

function displayChange_field_concepto(row, status) {
}

function displayChange_field_relleno(row, status) {
}

function displayChange_field_obser(row, status) {
}

function displayChange_field_detallepagos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detallepagos_rc_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detallepagos_rc_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_idrecibo(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_resolucion("all", "on");
	displayChange_field_nufac("all", "on");
	displayChange_field_banco_id("all", "on");
	displayChange_field_porc_rete("all", "on");
	displayChange_field_por_ica("all", "on");
	displayChange_field_asentado("all", "on");
	displayChange_field_id_concepto("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_reciboingreso_171019_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecharecibo" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecharecibo" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_reciboingreso_171019_mob_validate_fecharecibo(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecharecibo']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_reciboingreso_171019_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "banco_id" == specificField) {
    scJQSelect2Add_banco_id(seqRow);
  }
  if (null == specificField || "porc_rete" == specificField) {
    scJQSelect2Add_porc_rete(seqRow);
  }
  if (null == specificField || "por_ica" == specificField) {
    scJQSelect2Add_por_ica(seqRow);
  }
  if (null == specificField || "asentado" == specificField) {
    scJQSelect2Add_asentado(seqRow);
  }
  if (null == specificField || "id_concepto" == specificField) {
    scJQSelect2Add_id_concepto(seqRow);
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

function scJQSelect2Add_banco_id(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_banco_id_obj" : "#id_sc_field_banco_id" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_banco_id_obj',
      dropdownCssClass: 'css_banco_id_obj',
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

function scJQSelect2Add_porc_rete(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_porc_rete_obj" : "#id_sc_field_porc_rete" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_porc_rete_obj',
      dropdownCssClass: 'css_porc_rete_obj',
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

function scJQSelect2Add_por_ica(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_por_ica_obj" : "#id_sc_field_por_ica" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_por_ica_obj',
      dropdownCssClass: 'css_por_ica_obj',
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

function scJQSelect2Add_asentado(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_asentado_obj" : "#id_sc_field_asentado" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_asentado_obj',
      dropdownCssClass: 'css_asentado_obj',
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
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_resolucion) { displayChange_field_resolucion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nufac) { displayChange_field_nufac(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_banco_id) { displayChange_field_banco_id(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_porc_rete) { displayChange_field_porc_rete(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_por_ica) { displayChange_field_por_ica(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asentado) { displayChange_field_asentado(iLine, "on"); } }, 150);
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

