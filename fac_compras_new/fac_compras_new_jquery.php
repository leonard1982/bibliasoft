
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
      case 'es_remision':
      case 'id_pedidocom':
      case 'tipo_com':
      case 'prefijo_com':
      case 'numero_com':
      case 'id_comafec':
      case 'numfacom':
      case 'idprov':
      case 'formapago':
      case 'fechacom':
      case 'fechavenc':
      case 'total':
      case 'saldo':
      case 'pagada':
      case 'anulada':
      case 'asentada':
      case 'subtotal':
      case 'valoriva':
      case 'retencion':
      case 'reteica':
      case 'reteiva':
      case 'banco':
      case 'idfaccom':
      case 'prefijo_delpedido':
      case 'observaciones':
      case 'control':
      case 'usuario':
      case 'cod_cuenta':
      case 'creado':
      case 'editado':
        sc_exib_ocult_pag('fac_compras_new_form0');
        break;
      case 'detalle':
        sc_exib_ocult_pag('fac_compras_new_form1');
        break;
      case 'detallenc':
        sc_exib_ocult_pag('fac_compras_new_form2');
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
  scEventControl_data["es_remision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pedidocom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_com" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_com" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_com" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_comafec" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numfacom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idprov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["formapago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechacom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechavenc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anulada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asentada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoriva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["retencion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["reteica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["reteiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idfaccom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_delpedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["control" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_cuenta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["creado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["editado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detallenc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["es_remision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_remision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pedidocom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pedidocom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_com" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_com" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_com" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_com" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_com" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_com" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_comafec" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_comafec" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numfacom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numfacom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idprov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idprov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechacom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechacom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anulada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anulada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subtotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subtotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoriva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoriva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["retencion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["retencion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["reteica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["reteica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["reteiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["reteiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfaccom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfaccom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_delpedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_delpedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["control" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["control" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["creado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["creado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["editado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["editado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detallenc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detallenc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idprov" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("es_remision" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_pedidocom" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_com" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prefijo_com" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_comafec" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("formapago" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("anulada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("retencion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("reteica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("banco" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_comafec" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_pedidocom" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idprov" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo_com" + iSeq == fieldName) {
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
  $('#id_sc_field_idfaccom' + iSeqRow).bind('blur', function() { sc_fac_compras_new_idfaccom_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_idfaccom_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_idfaccom_onfocus(this, iSeqRow) });
  $('#id_sc_field_numfacom' + iSeqRow).bind('blur', function() { sc_fac_compras_new_numfacom_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_numfacom_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_numfacom_onfocus(this, iSeqRow) });
  $('#id_sc_field_formapago' + iSeqRow).bind('blur', function() { sc_fac_compras_new_formapago_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_fac_compras_new_formapago_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_fac_compras_new_formapago_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechacom' + iSeqRow).bind('blur', function() { sc_fac_compras_new_fechacom_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_fechacom_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_fechacom_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechavenc' + iSeqRow).bind('blur', function() { sc_fac_compras_new_fechavenc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_fac_compras_new_fechavenc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_fac_compras_new_fechavenc_onfocus(this, iSeqRow) });
  $('#id_sc_field_idprov' + iSeqRow).bind('blur', function() { sc_fac_compras_new_idprov_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_fac_compras_new_idprov_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_fac_compras_new_idprov_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('blur', function() { sc_fac_compras_new_subtotal_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_subtotal_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_subtotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoriva' + iSeqRow).bind('blur', function() { sc_fac_compras_new_valoriva_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_valoriva_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_valoriva_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_fac_compras_new_total_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_fac_compras_new_total_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_fac_compras_new_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagada' + iSeqRow).bind('blur', function() { sc_fac_compras_new_pagada_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_fac_compras_new_pagada_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_fac_compras_new_pagada_onfocus(this, iSeqRow) });
  $('#id_sc_field_asentada' + iSeqRow).bind('blur', function() { sc_fac_compras_new_asentada_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_asentada_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_asentada_onfocus(this, iSeqRow) });
  $('#id_sc_field_control' + iSeqRow).bind('blur', function() { sc_fac_compras_new_control_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_control_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_control_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_fac_compras_new_observaciones_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_fac_compras_new_observaciones_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_fac_compras_new_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('blur', function() { sc_fac_compras_new_saldo_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_fac_compras_new_saldo_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_fac_compras_new_saldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_anulada' + iSeqRow).bind('blur', function() { sc_fac_compras_new_anulada_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_anulada_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_anulada_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_remision' + iSeqRow).bind('blur', function() { sc_fac_compras_new_es_remision_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_fac_compras_new_es_remision_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_fac_compras_new_es_remision_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pedidocom' + iSeqRow).bind('blur', function() { sc_fac_compras_new_id_pedidocom_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_fac_compras_new_id_pedidocom_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_fac_compras_new_id_pedidocom_onfocus(this, iSeqRow) });
  $('#id_sc_field_retencion' + iSeqRow).bind('blur', function() { sc_fac_compras_new_retencion_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_fac_compras_new_retencion_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_fac_compras_new_retencion_onfocus(this, iSeqRow) });
  $('#id_sc_field_reteica' + iSeqRow).bind('blur', function() { sc_fac_compras_new_reteica_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_reteica_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_reteica_onfocus(this, iSeqRow) });
  $('#id_sc_field_reteiva' + iSeqRow).bind('blur', function() { sc_fac_compras_new_reteiva_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_reteiva_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_reteiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_fac_compras_new_usuario_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_usuario_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco' + iSeqRow).bind('blur', function() { sc_fac_compras_new_banco_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_fac_compras_new_banco_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_fac_compras_new_banco_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_ndevolucion' + iSeqRow).bind('change', function() { sc_fac_compras_new_num_ndevolucion_onchange(this, iSeqRow) });
  $('#id_sc_field_creado' + iSeqRow).bind('blur', function() { sc_fac_compras_new_creado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_fac_compras_new_creado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_fac_compras_new_creado_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado_hora' + iSeqRow).bind('blur', function() { sc_fac_compras_new_creado_hora_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_fac_compras_new_creado_hora_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_fac_compras_new_creado_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_editado' + iSeqRow).bind('blur', function() { sc_fac_compras_new_editado_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_editado_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_editado_onfocus(this, iSeqRow) });
  $('#id_sc_field_editado_hora' + iSeqRow).bind('blur', function() { sc_fac_compras_new_editado_hora_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_fac_compras_new_editado_hora_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_fac_compras_new_editado_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_cuenta' + iSeqRow).bind('blur', function() { sc_fac_compras_new_cod_cuenta_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_fac_compras_new_cod_cuenta_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_fac_compras_new_cod_cuenta_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_com' + iSeqRow).bind('blur', function() { sc_fac_compras_new_prefijo_com_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_fac_compras_new_prefijo_com_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_fac_compras_new_prefijo_com_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_com' + iSeqRow).bind('blur', function() { sc_fac_compras_new_numero_com_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_fac_compras_new_numero_com_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_fac_compras_new_numero_com_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_com' + iSeqRow).bind('blur', function() { sc_fac_compras_new_tipo_com_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_fac_compras_new_tipo_com_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_fac_compras_new_tipo_com_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_comafec' + iSeqRow).bind('blur', function() { sc_fac_compras_new_id_comafec_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_fac_compras_new_id_comafec_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_fac_compras_new_id_comafec_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_fac_compras_new_detalle_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_fac_compras_new_detalle_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_fac_compras_new_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_hdetalle' + iSeqRow).bind('change', function() { sc_fac_compras_new_hdetalle_onchange(this, iSeqRow) });
  $('#id_sc_field_prefijo_delpedido' + iSeqRow).bind('blur', function() { sc_fac_compras_new_prefijo_delpedido_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_fac_compras_new_prefijo_delpedido_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_fac_compras_new_prefijo_delpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_detallenc' + iSeqRow).bind('blur', function() { sc_fac_compras_new_detallenc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_fac_compras_new_detallenc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_fac_compras_new_detallenc_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_fac_compras_new_idfaccom_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_idfaccom();
  scCssBlur(oThis);
}

function sc_fac_compras_new_idfaccom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_idfaccom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_numfacom_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_numfacom();
  scCssBlur(oThis);
}

function sc_fac_compras_new_numfacom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_numfacom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_formapago_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_formapago();
  scCssBlur(oThis);
}

function sc_fac_compras_new_formapago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_formapago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_fechacom_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_fechacom();
  scCssBlur(oThis);
}

function sc_fac_compras_new_fechacom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_fechacom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_fechavenc_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_fechavenc();
  scCssBlur(oThis);
}

function sc_fac_compras_new_fechavenc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_fechavenc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_idprov_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_idprov();
  scCssBlur(oThis);
}

function sc_fac_compras_new_idprov_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_fac_compras_new_event_idprov_onchange();
}

function sc_fac_compras_new_idprov_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_fac_compras_new_subtotal_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_subtotal();
  scCssBlur(oThis);
}

function sc_fac_compras_new_subtotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_subtotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_valoriva_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_valoriva();
  scCssBlur(oThis);
}

function sc_fac_compras_new_valoriva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_valoriva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_total_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_total();
  scCssBlur(oThis);
}

function sc_fac_compras_new_total_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_pagada_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_pagada();
  scCssBlur(oThis);
}

function sc_fac_compras_new_pagada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_pagada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_asentada_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_asentada();
  scCssBlur(oThis);
}

function sc_fac_compras_new_asentada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_fac_compras_new_event_asentada_onchange();
}

function sc_fac_compras_new_asentada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_control_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_control();
  scCssBlur(oThis);
}

function sc_fac_compras_new_control_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_control_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_observaciones();
  scCssBlur(oThis);
}

function sc_fac_compras_new_observaciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_saldo_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_saldo();
  scCssBlur(oThis);
}

function sc_fac_compras_new_saldo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_saldo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_anulada_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_anulada();
  scCssBlur(oThis);
}

function sc_fac_compras_new_anulada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_anulada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_es_remision_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_es_remision();
  scCssBlur(oThis);
}

function sc_fac_compras_new_es_remision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_es_remision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_id_pedidocom_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_id_pedidocom();
  scCssBlur(oThis);
}

function sc_fac_compras_new_id_pedidocom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_fac_compras_new_event_id_pedidocom_onchange();
}

function sc_fac_compras_new_id_pedidocom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_retencion_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_retencion();
  scCssBlur(oThis);
}

function sc_fac_compras_new_retencion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_retencion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_reteica_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_reteica();
  scCssBlur(oThis);
}

function sc_fac_compras_new_reteica_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_reteica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_reteiva_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_reteiva();
  scCssBlur(oThis);
}

function sc_fac_compras_new_reteiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_reteiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_usuario_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_usuario();
  scCssBlur(oThis);
}

function sc_fac_compras_new_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_banco_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_banco();
  scCssBlur(oThis);
}

function sc_fac_compras_new_banco_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_banco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_num_ndevolucion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_creado_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_creado();
  scCssBlur(oThis);
}

function sc_fac_compras_new_creado_hora_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_creado();
  scCssBlur(oThis);
}

function sc_fac_compras_new_creado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_creado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_creado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_creado_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_editado_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_editado();
  scCssBlur(oThis);
}

function sc_fac_compras_new_editado_hora_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_editado();
  scCssBlur(oThis);
}

function sc_fac_compras_new_editado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_editado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_editado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_editado_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_cod_cuenta_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_cod_cuenta();
  scCssBlur(oThis);
}

function sc_fac_compras_new_cod_cuenta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_cod_cuenta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_prefijo_com_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_prefijo_com();
  scCssBlur(oThis);
}

function sc_fac_compras_new_prefijo_com_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_prefijo_com_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_numero_com_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_numero_com();
  scCssBlur(oThis);
}

function sc_fac_compras_new_numero_com_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_numero_com_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_tipo_com_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_tipo_com();
  scCssBlur(oThis);
}

function sc_fac_compras_new_tipo_com_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_fac_compras_new_event_tipo_com_onchange();
}

function sc_fac_compras_new_tipo_com_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_id_comafec_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_id_comafec();
  scCssBlur(oThis);
}

function sc_fac_compras_new_id_comafec_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_fac_compras_new_event_id_comafec_onchange();
}

function sc_fac_compras_new_id_comafec_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_detalle_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_detalle();
  scCssBlur(oThis);
}

function sc_fac_compras_new_detalle_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_hdetalle_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_prefijo_delpedido_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_prefijo_delpedido();
  scCssBlur(oThis);
}

function sc_fac_compras_new_prefijo_delpedido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_prefijo_delpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_fac_compras_new_detallenc_onblur(oThis, iSeqRow) {
  do_ajax_fac_compras_new_validate_detallenc();
  scCssBlur(oThis);
}

function sc_fac_compras_new_detallenc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_fac_compras_new_detallenc_onfocus(oThis, iSeqRow) {
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
	if ("2" == page) {
		displayChange_page_2(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
	displayChange_block("2", status);
	displayChange_block("3", status);
	displayChange_block("4", status);
}

function displayChange_page_1(status) {
	displayChange_block("5", status);
}

function displayChange_page_2(status) {
	displayChange_block("6", status);
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
}

function displayChange_block_0(status) {
	displayChange_field("es_remision", "", status);
	displayChange_field("id_pedidocom", "", status);
	displayChange_field("tipo_com", "", status);
	displayChange_field("prefijo_com", "", status);
	displayChange_field("numero_com", "", status);
	displayChange_field("id_comafec", "", status);
	displayChange_field("numfacom", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("idprov", "", status);
	displayChange_field("formapago", "", status);
	displayChange_field("fechacom", "", status);
	displayChange_field("fechavenc", "", status);
	displayChange_field("total", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("saldo", "", status);
	displayChange_field("pagada", "", status);
	displayChange_field("anulada", "", status);
	displayChange_field("asentada", "", status);
	displayChange_field("subtotal", "", status);
	displayChange_field("valoriva", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("retencion", "", status);
	displayChange_field("reteica", "", status);
	displayChange_field("reteiva", "", status);
	displayChange_field("banco", "", status);
	displayChange_field("idfaccom", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("prefijo_delpedido", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("control", "", status);
	displayChange_field("usuario", "", status);
	displayChange_field("cod_cuenta", "", status);
	displayChange_field("creado", "", status);
	displayChange_field("editado", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("detalle", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("detallenc", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_es_remision(row, status);
	displayChange_field_id_pedidocom(row, status);
	displayChange_field_tipo_com(row, status);
	displayChange_field_prefijo_com(row, status);
	displayChange_field_numero_com(row, status);
	displayChange_field_id_comafec(row, status);
	displayChange_field_numfacom(row, status);
	displayChange_field_idprov(row, status);
	displayChange_field_formapago(row, status);
	displayChange_field_fechacom(row, status);
	displayChange_field_fechavenc(row, status);
	displayChange_field_total(row, status);
	displayChange_field_saldo(row, status);
	displayChange_field_pagada(row, status);
	displayChange_field_anulada(row, status);
	displayChange_field_asentada(row, status);
	displayChange_field_subtotal(row, status);
	displayChange_field_valoriva(row, status);
	displayChange_field_retencion(row, status);
	displayChange_field_reteica(row, status);
	displayChange_field_reteiva(row, status);
	displayChange_field_banco(row, status);
	displayChange_field_idfaccom(row, status);
	displayChange_field_prefijo_delpedido(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_control(row, status);
	displayChange_field_usuario(row, status);
	displayChange_field_cod_cuenta(row, status);
	displayChange_field_creado(row, status);
	displayChange_field_editado(row, status);
	displayChange_field_detalle(row, status);
	displayChange_field_detallenc(row, status);
}

function displayChange_field(field, row, status) {
	if ("es_remision" == field) {
		displayChange_field_es_remision(row, status);
	}
	if ("id_pedidocom" == field) {
		displayChange_field_id_pedidocom(row, status);
	}
	if ("tipo_com" == field) {
		displayChange_field_tipo_com(row, status);
	}
	if ("prefijo_com" == field) {
		displayChange_field_prefijo_com(row, status);
	}
	if ("numero_com" == field) {
		displayChange_field_numero_com(row, status);
	}
	if ("id_comafec" == field) {
		displayChange_field_id_comafec(row, status);
	}
	if ("numfacom" == field) {
		displayChange_field_numfacom(row, status);
	}
	if ("idprov" == field) {
		displayChange_field_idprov(row, status);
	}
	if ("formapago" == field) {
		displayChange_field_formapago(row, status);
	}
	if ("fechacom" == field) {
		displayChange_field_fechacom(row, status);
	}
	if ("fechavenc" == field) {
		displayChange_field_fechavenc(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
	if ("saldo" == field) {
		displayChange_field_saldo(row, status);
	}
	if ("pagada" == field) {
		displayChange_field_pagada(row, status);
	}
	if ("anulada" == field) {
		displayChange_field_anulada(row, status);
	}
	if ("asentada" == field) {
		displayChange_field_asentada(row, status);
	}
	if ("subtotal" == field) {
		displayChange_field_subtotal(row, status);
	}
	if ("valoriva" == field) {
		displayChange_field_valoriva(row, status);
	}
	if ("retencion" == field) {
		displayChange_field_retencion(row, status);
	}
	if ("reteica" == field) {
		displayChange_field_reteica(row, status);
	}
	if ("reteiva" == field) {
		displayChange_field_reteiva(row, status);
	}
	if ("banco" == field) {
		displayChange_field_banco(row, status);
	}
	if ("idfaccom" == field) {
		displayChange_field_idfaccom(row, status);
	}
	if ("prefijo_delpedido" == field) {
		displayChange_field_prefijo_delpedido(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("control" == field) {
		displayChange_field_control(row, status);
	}
	if ("usuario" == field) {
		displayChange_field_usuario(row, status);
	}
	if ("cod_cuenta" == field) {
		displayChange_field_cod_cuenta(row, status);
	}
	if ("creado" == field) {
		displayChange_field_creado(row, status);
	}
	if ("editado" == field) {
		displayChange_field_editado(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
	if ("detallenc" == field) {
		displayChange_field_detallenc(row, status);
	}
}

function displayChange_field_es_remision(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_es_remision__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_es_remision" + row).select2("destroy");
		}
		scJQSelect2Add(row, "es_remision");
	}
}

function displayChange_field_id_pedidocom(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pedidocom__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pedidocom" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pedidocom");
	}
}

function displayChange_field_tipo_com(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_com__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_com" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_com");
	}
}

function displayChange_field_prefijo_com(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_prefijo_com__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_prefijo_com" + row).select2("destroy");
		}
		scJQSelect2Add(row, "prefijo_com");
	}
}

function displayChange_field_numero_com(row, status) {
}

function displayChange_field_id_comafec(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_comafec__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_comafec" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_comafec");
	}
}

function displayChange_field_numfacom(row, status) {
}

function displayChange_field_idprov(row, status) {
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

function displayChange_field_fechacom(row, status) {
}

function displayChange_field_fechavenc(row, status) {
}

function displayChange_field_total(row, status) {
}

function displayChange_field_saldo(row, status) {
}

function displayChange_field_pagada(row, status) {
}

function displayChange_field_anulada(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_anulada__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_anulada" + row).select2("destroy");
		}
		scJQSelect2Add(row, "anulada");
	}
}

function displayChange_field_asentada(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_asentada__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_asentada" + row).select2("destroy");
		}
		scJQSelect2Add(row, "asentada");
	}
}

function displayChange_field_subtotal(row, status) {
}

function displayChange_field_valoriva(row, status) {
}

function displayChange_field_retencion(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_retencion__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_retencion" + row).select2("destroy");
		}
		scJQSelect2Add(row, "retencion");
	}
}

function displayChange_field_reteica(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_reteica__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_reteica" + row).select2("destroy");
		}
		scJQSelect2Add(row, "reteica");
	}
}

function displayChange_field_reteiva(row, status) {
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

function displayChange_field_idfaccom(row, status) {
}

function displayChange_field_prefijo_delpedido(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_control(row, status) {
}

function displayChange_field_usuario(row, status) {
}

function displayChange_field_cod_cuenta(row, status) {
}

function displayChange_field_creado(row, status) {
}

function displayChange_field_editado(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_detallecompra_new")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_detallecompra_new")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_detallenc(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_detallecompra_new_nc")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_detallecompra_new_nc")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_es_remision("all", "on");
	displayChange_field_id_pedidocom("all", "on");
	displayChange_field_tipo_com("all", "on");
	displayChange_field_prefijo_com("all", "on");
	displayChange_field_id_comafec("all", "on");
	displayChange_field_formapago("all", "on");
	displayChange_field_anulada("all", "on");
	displayChange_field_asentada("all", "on");
	displayChange_field_retencion("all", "on");
	displayChange_field_reteica("all", "on");
	displayChange_field_banco("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_fac_compras_new_form" + pageNo).hide();
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
  $("#id_sc_field_fechacom" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechacom" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_fac_compras_new_validate_fechacom(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechacom']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechavenc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechavenc" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_fac_compras_new_validate_fechavenc(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechavenc']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
      do_ajax_fac_compras_new_validate_creado(iSeqRow);
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
  $("#id_sc_field_editado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_editado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['editado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['editado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_fac_compras_new_validate_editado(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['editado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'fac_compras_new')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "es_remision" == specificField) {
    scJQSelect2Add_es_remision(seqRow);
  }
  if (null == specificField || "id_pedidocom" == specificField) {
    scJQSelect2Add_id_pedidocom(seqRow);
  }
  if (null == specificField || "tipo_com" == specificField) {
    scJQSelect2Add_tipo_com(seqRow);
  }
  if (null == specificField || "prefijo_com" == specificField) {
    scJQSelect2Add_prefijo_com(seqRow);
  }
  if (null == specificField || "id_comafec" == specificField) {
    scJQSelect2Add_id_comafec(seqRow);
  }
  if (null == specificField || "formapago" == specificField) {
    scJQSelect2Add_formapago(seqRow);
  }
  if (null == specificField || "anulada" == specificField) {
    scJQSelect2Add_anulada(seqRow);
  }
  if (null == specificField || "asentada" == specificField) {
    scJQSelect2Add_asentada(seqRow);
  }
  if (null == specificField || "retencion" == specificField) {
    scJQSelect2Add_retencion(seqRow);
  }
  if (null == specificField || "reteica" == specificField) {
    scJQSelect2Add_reteica(seqRow);
  }
  if (null == specificField || "banco" == specificField) {
    scJQSelect2Add_banco(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_es_remision(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_es_remision_obj" : "#id_sc_field_es_remision" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_es_remision_obj',
      dropdownCssClass: 'css_es_remision_obj',
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

function scJQSelect2Add_id_pedidocom(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pedidocom_obj" : "#id_sc_field_id_pedidocom" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pedidocom_obj',
      dropdownCssClass: 'css_id_pedidocom_obj',
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

function scJQSelect2Add_tipo_com(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_com_obj" : "#id_sc_field_tipo_com" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_com_obj',
      dropdownCssClass: 'css_tipo_com_obj',
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

function scJQSelect2Add_prefijo_com(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_prefijo_com_obj" : "#id_sc_field_prefijo_com" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_prefijo_com_obj',
      dropdownCssClass: 'css_prefijo_com_obj',
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

function scJQSelect2Add_id_comafec(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_comafec_obj" : "#id_sc_field_id_comafec" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_comafec_obj',
      dropdownCssClass: 'css_id_comafec_obj',
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

function scJQSelect2Add_anulada(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_anulada_obj" : "#id_sc_field_anulada" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_anulada_obj',
      dropdownCssClass: 'css_anulada_obj',
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

function scJQSelect2Add_asentada(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_asentada_obj" : "#id_sc_field_asentada" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_asentada_obj',
      dropdownCssClass: 'css_asentada_obj',
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

function scJQSelect2Add_retencion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_retencion_obj" : "#id_sc_field_retencion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_retencion_obj',
      dropdownCssClass: 'css_retencion_obj',
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

function scJQSelect2Add_reteica(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_reteica_obj" : "#id_sc_field_reteica" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_reteica_obj',
      dropdownCssClass: 'css_reteica_obj',
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_es_remision) { displayChange_field_es_remision(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pedidocom) { displayChange_field_id_pedidocom(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_com) { displayChange_field_tipo_com(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_prefijo_com) { displayChange_field_prefijo_com(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_comafec) { displayChange_field_id_comafec(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_formapago) { displayChange_field_formapago(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_anulada) { displayChange_field_anulada(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asentada) { displayChange_field_asentada(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_retencion) { displayChange_field_retencion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_reteica) { displayChange_field_reteica(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_banco) { displayChange_field_banco(iLine, "on"); } }, 150);
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

