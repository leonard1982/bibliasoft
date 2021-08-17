
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
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numfacven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asentada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dias_decredito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechavenc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pref_pedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_fac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_fac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_fact" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dircliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mot_nc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mot_nd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nremision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupodis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoriva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idfacven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["retefuente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cree" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["reteica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["reteiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["imconsumo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numfacven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numfacven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dias_decredito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dias_decredito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pref_pedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pref_pedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_fac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_fac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_fac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_fac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_fact" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_fact" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dircliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dircliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vendedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mot_nc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mot_nc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mot_nd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mot_nd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nremision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nremision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupodis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupodis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["change"]) {
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
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfacven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfacven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["retefuente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["retefuente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cree" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cree" + iSeqRow]["change"]) {
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
  if (scEventControl_data["imconsumo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["imconsumo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendedor" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("resolucion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pedido" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prefijo_fac" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("num_fac" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idcli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("direccion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mot_nc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mot_nd" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("retefuente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cree" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("reteica" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("dias_decredito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("fechaven" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("fechavenc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("id_fact" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idcli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("num_fac" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("pedido" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("prefijo_fac" + iSeq == fieldName) {
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
  if ("tipo" + iSeq == fieldName) {
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
  $('#id_sc_field_idfacven' + iSeqRow).bind('blur', function() { sc_form_notas_idfacven_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_idfacven_onfocus(this, iSeqRow) });
  $('#id_sc_field_numfacven' + iSeqRow).bind('blur', function() { sc_form_notas_numfacven_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_numfacven_onfocus(this, iSeqRow) });
  $('#id_sc_field_nremision' + iSeqRow).bind('blur', function() { sc_form_notas_nremision_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_nremision_onfocus(this, iSeqRow) });
  $('#id_sc_field_credito' + iSeqRow).bind('blur', function() { sc_form_notas_credito_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_notas_credito_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaven' + iSeqRow).bind('blur', function() { sc_form_notas_fechaven_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_notas_fechaven_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_fechaven_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechavenc' + iSeqRow).bind('blur', function() { sc_form_notas_fechavenc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_notas_fechavenc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_fechavenc_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_notas_idcli_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_notas_idcli_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_notas_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('blur', function() { sc_form_notas_subtotal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_subtotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoriva' + iSeqRow).bind('blur', function() { sc_form_notas_valoriva_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_valoriva_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_notas_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_notas_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagada' + iSeqRow).bind('blur', function() { sc_form_notas_pagada_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_notas_pagada_onfocus(this, iSeqRow) });
  $('#id_sc_field_asentada' + iSeqRow).bind('blur', function() { sc_form_notas_asentada_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_notas_asentada_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_asentada_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_notas_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_notas_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('blur', function() { sc_form_notas_saldo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_notas_saldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_notas_adicional_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor' + iSeqRow).bind('blur', function() { sc_form_notas_vendedor_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_notas_vendedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_pedido' + iSeqRow).bind('blur', function() { sc_form_notas_pedido_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_notas_pedido_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_notas_pedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_notas_resolucion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_notas_resolucion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_notas_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_dircliente' + iSeqRow).bind('blur', function() { sc_form_notas_dircliente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_notas_dircliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_imconsumo' + iSeqRow).bind('blur', function() { sc_form_notas_imconsumo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_imconsumo_onfocus(this, iSeqRow) });
  $('#id_sc_field_retefuente' + iSeqRow).bind('blur', function() { sc_form_notas_retefuente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_notas_retefuente_onfocus(this, iSeqRow) });
  $('#id_sc_field_reteiva' + iSeqRow).bind('blur', function() { sc_form_notas_reteiva_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_reteiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_reteica' + iSeqRow).bind('blur', function() { sc_form_notas_reteica_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_reteica_onfocus(this, iSeqRow) });
  $('#id_sc_field_cree' + iSeqRow).bind('blur', function() { sc_form_notas_cree_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_notas_cree_onfocus(this, iSeqRow) });
  $('#id_sc_field_dias_decredito' + iSeqRow).bind('blur', function() { sc_form_notas_dias_decredito_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_notas_dias_decredito_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_notas_dias_decredito_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_notas_tipo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_notas_tipo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_notas_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_fact' + iSeqRow).bind('blur', function() { sc_form_notas_id_fact_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_notas_id_fact_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_id_fact_onfocus(this, iSeqRow) });
  $('#id_sc_field_mot_nc' + iSeqRow).bind('blur', function() { sc_form_notas_mot_nc_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_notas_mot_nc_onfocus(this, iSeqRow) });
  $('#id_sc_field_mot_nd' + iSeqRow).bind('blur', function() { sc_form_notas_mot_nd_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_notas_mot_nd_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo' + iSeqRow).bind('blur', function() { sc_form_notas_cupo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_notas_cupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupodis' + iSeqRow).bind('blur', function() { sc_form_notas_cupodis_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_cupodis_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_notas_detalle_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_notas_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_notas_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_fac' + iSeqRow).bind('blur', function() { sc_form_notas_num_fac_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_notas_num_fac_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_notas_num_fac_onfocus(this, iSeqRow) });
  $('#id_sc_field_pref_pedido' + iSeqRow).bind('blur', function() { sc_form_notas_pref_pedido_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_notas_pref_pedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_fac' + iSeqRow).bind('blur', function() { sc_form_notas_prefijo_fac_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_notas_prefijo_fac_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_notas_prefijo_fac_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_notas_idfacven_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_idfacven();
  scCssBlur(oThis);
}

function sc_form_notas_idfacven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_numfacven_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_numfacven();
  scCssBlur(oThis);
}

function sc_form_notas_numfacven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_nremision_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_nremision();
  scCssBlur(oThis);
}

function sc_form_notas_nremision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_credito_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_credito();
  scCssBlur(oThis);
}

function sc_form_notas_credito_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_credito_onchange();
}

function sc_form_notas_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_fechaven_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_fechaven();
  scCssBlur(oThis);
}

function sc_form_notas_fechaven_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_fechaven_onchange();
}

function sc_form_notas_fechaven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_fechavenc_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_fechavenc();
  scCssBlur(oThis);
}

function sc_form_notas_fechavenc_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_fechavenc_onchange();
}

function sc_form_notas_fechavenc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_notas_idcli_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_idcli_onchange();
}

function sc_form_notas_idcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_subtotal_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_subtotal();
  scCssBlur(oThis);
}

function sc_form_notas_subtotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_valoriva_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_valoriva();
  scCssBlur(oThis);
}

function sc_form_notas_valoriva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_total_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_total();
  scCssBlur(oThis);
}

function sc_form_notas_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_pagada_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_pagada();
  scCssBlur(oThis);
}

function sc_form_notas_pagada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_asentada_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_asentada();
  scCssBlur(oThis);
}

function sc_form_notas_asentada_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_asentada_onchange();
}

function sc_form_notas_asentada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_notas_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_saldo_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_saldo();
  scCssBlur(oThis);
}

function sc_form_notas_saldo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_notas_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_vendedor_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_vendedor();
  scCssBlur(oThis);
}

function sc_form_notas_vendedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_notas_pedido_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_pedido();
  scCssBlur(oThis);
}

function sc_form_notas_pedido_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_pedido_onchange();
}

function sc_form_notas_pedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_notas_resolucion_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_resolucion_onchange();
}

function sc_form_notas_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_dircliente_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_dircliente();
  scCssBlur(oThis);
}

function sc_form_notas_dircliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_imconsumo_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_imconsumo();
  scCssBlur(oThis);
}

function sc_form_notas_imconsumo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_retefuente_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_retefuente();
  scCssBlur(oThis);
}

function sc_form_notas_retefuente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_reteiva_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_reteiva();
  scCssBlur(oThis);
}

function sc_form_notas_reteiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_reteica_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_reteica();
  scCssBlur(oThis);
}

function sc_form_notas_reteica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_cree_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_cree();
  scCssBlur(oThis);
}

function sc_form_notas_cree_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_dias_decredito_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_dias_decredito();
  scCssBlur(oThis);
}

function sc_form_notas_dias_decredito_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_dias_decredito_onchange();
}

function sc_form_notas_dias_decredito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_notas_tipo_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_tipo_onchange();
}

function sc_form_notas_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_id_fact_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_id_fact();
  scCssBlur(oThis);
}

function sc_form_notas_id_fact_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_id_fact_onchange();
}

function sc_form_notas_id_fact_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_mot_nc_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_mot_nc();
  scCssBlur(oThis);
}

function sc_form_notas_mot_nc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_mot_nd_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_mot_nd();
  scCssBlur(oThis);
}

function sc_form_notas_mot_nd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_cupo_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_cupo();
  scCssBlur(oThis);
}

function sc_form_notas_cupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_cupodis_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_cupodis();
  scCssBlur(oThis);
}

function sc_form_notas_cupodis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_notas_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_notas_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_num_fac_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_num_fac();
  scCssBlur(oThis);
}

function sc_form_notas_num_fac_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_num_fac_onchange();
}

function sc_form_notas_num_fac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_pref_pedido_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_pref_pedido();
  scCssBlur(oThis);
}

function sc_form_notas_pref_pedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_notas_prefijo_fac_onblur(oThis, iSeqRow) {
  do_ajax_form_notas_mob_validate_prefijo_fac();
  scCssBlur(oThis);
}

function sc_form_notas_prefijo_fac_onchange(oThis, iSeqRow) {
  do_ajax_form_notas_mob_event_prefijo_fac_onchange();
}

function sc_form_notas_prefijo_fac_onfocus(oThis, iSeqRow) {
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
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tipo", "", status);
	displayChange_field("resolucion", "", status);
	displayChange_field("numfacven", "", status);
	displayChange_field("pedido", "", status);
	displayChange_field("fechaven", "", status);
	displayChange_field("asentada", "", status);
	displayChange_field("dias_decredito", "", status);
	displayChange_field("fechavenc", "", status);
	displayChange_field("pagada", "", status);
	displayChange_field("pref_pedido", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("prefijo_fac", "", status);
	displayChange_field("num_fac", "", status);
	displayChange_field("id_fact", "", status);
	displayChange_field("idcli", "", status);
	displayChange_field("direccion", "", status);
	displayChange_field("dircliente", "", status);
	displayChange_field("vendedor", "", status);
	displayChange_field("credito", "", status);
	displayChange_field("mot_nc", "", status);
	displayChange_field("mot_nd", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("nremision", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("cupodis", "", status);
	displayChange_field("cupo", "", status);
	displayChange_field("subtotal", "", status);
	displayChange_field("valoriva", "", status);
	displayChange_field("total", "", status);
	displayChange_field("adicional", "", status);
	displayChange_field("saldo", "", status);
	displayChange_field("idfacven", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("retefuente", "", status);
	displayChange_field("cree", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("reteica", "", status);
	displayChange_field("reteiva", "", status);
	displayChange_field("imconsumo", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("detalle", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tipo(row, status);
	displayChange_field_resolucion(row, status);
	displayChange_field_numfacven(row, status);
	displayChange_field_pedido(row, status);
	displayChange_field_fechaven(row, status);
	displayChange_field_asentada(row, status);
	displayChange_field_dias_decredito(row, status);
	displayChange_field_fechavenc(row, status);
	displayChange_field_pagada(row, status);
	displayChange_field_pref_pedido(row, status);
	displayChange_field_prefijo_fac(row, status);
	displayChange_field_num_fac(row, status);
	displayChange_field_id_fact(row, status);
	displayChange_field_idcli(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_dircliente(row, status);
	displayChange_field_vendedor(row, status);
	displayChange_field_credito(row, status);
	displayChange_field_mot_nc(row, status);
	displayChange_field_mot_nd(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_nremision(row, status);
	displayChange_field_cupodis(row, status);
	displayChange_field_cupo(row, status);
	displayChange_field_subtotal(row, status);
	displayChange_field_valoriva(row, status);
	displayChange_field_total(row, status);
	displayChange_field_adicional(row, status);
	displayChange_field_saldo(row, status);
	displayChange_field_idfacven(row, status);
	displayChange_field_retefuente(row, status);
	displayChange_field_cree(row, status);
	displayChange_field_reteica(row, status);
	displayChange_field_reteiva(row, status);
	displayChange_field_imconsumo(row, status);
	displayChange_field_detalle(row, status);
}

function displayChange_field(field, row, status) {
	if ("tipo" == field) {
		displayChange_field_tipo(row, status);
	}
	if ("resolucion" == field) {
		displayChange_field_resolucion(row, status);
	}
	if ("numfacven" == field) {
		displayChange_field_numfacven(row, status);
	}
	if ("pedido" == field) {
		displayChange_field_pedido(row, status);
	}
	if ("fechaven" == field) {
		displayChange_field_fechaven(row, status);
	}
	if ("asentada" == field) {
		displayChange_field_asentada(row, status);
	}
	if ("dias_decredito" == field) {
		displayChange_field_dias_decredito(row, status);
	}
	if ("fechavenc" == field) {
		displayChange_field_fechavenc(row, status);
	}
	if ("pagada" == field) {
		displayChange_field_pagada(row, status);
	}
	if ("pref_pedido" == field) {
		displayChange_field_pref_pedido(row, status);
	}
	if ("prefijo_fac" == field) {
		displayChange_field_prefijo_fac(row, status);
	}
	if ("num_fac" == field) {
		displayChange_field_num_fac(row, status);
	}
	if ("id_fact" == field) {
		displayChange_field_id_fact(row, status);
	}
	if ("idcli" == field) {
		displayChange_field_idcli(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("dircliente" == field) {
		displayChange_field_dircliente(row, status);
	}
	if ("vendedor" == field) {
		displayChange_field_vendedor(row, status);
	}
	if ("credito" == field) {
		displayChange_field_credito(row, status);
	}
	if ("mot_nc" == field) {
		displayChange_field_mot_nc(row, status);
	}
	if ("mot_nd" == field) {
		displayChange_field_mot_nd(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("nremision" == field) {
		displayChange_field_nremision(row, status);
	}
	if ("cupodis" == field) {
		displayChange_field_cupodis(row, status);
	}
	if ("cupo" == field) {
		displayChange_field_cupo(row, status);
	}
	if ("subtotal" == field) {
		displayChange_field_subtotal(row, status);
	}
	if ("valoriva" == field) {
		displayChange_field_valoriva(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
	if ("adicional" == field) {
		displayChange_field_adicional(row, status);
	}
	if ("saldo" == field) {
		displayChange_field_saldo(row, status);
	}
	if ("idfacven" == field) {
		displayChange_field_idfacven(row, status);
	}
	if ("retefuente" == field) {
		displayChange_field_retefuente(row, status);
	}
	if ("cree" == field) {
		displayChange_field_cree(row, status);
	}
	if ("reteica" == field) {
		displayChange_field_reteica(row, status);
	}
	if ("reteiva" == field) {
		displayChange_field_reteiva(row, status);
	}
	if ("imconsumo" == field) {
		displayChange_field_imconsumo(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
}

function displayChange_field_tipo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo");
	}
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

function displayChange_field_numfacven(row, status) {
}

function displayChange_field_pedido(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_pedido__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_pedido" + row).select2("destroy");
		}
		scJQSelect2Add(row, "pedido");
	}
}

function displayChange_field_fechaven(row, status) {
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

function displayChange_field_dias_decredito(row, status) {
}

function displayChange_field_fechavenc(row, status) {
}

function displayChange_field_pagada(row, status) {
}

function displayChange_field_pref_pedido(row, status) {
}

function displayChange_field_prefijo_fac(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_prefijo_fac__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_prefijo_fac" + row).select2("destroy");
		}
		scJQSelect2Add(row, "prefijo_fac");
	}
}

function displayChange_field_num_fac(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_num_fac__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_num_fac" + row).select2("destroy");
		}
		scJQSelect2Add(row, "num_fac");
	}
}

function displayChange_field_id_fact(row, status) {
}

function displayChange_field_idcli(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idcli__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idcli" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idcli");
	}
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_dircliente(row, status) {
}

function displayChange_field_vendedor(row, status) {
}

function displayChange_field_credito(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_credito__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_credito" + row).select2("destroy");
		}
		scJQSelect2Add(row, "credito");
	}
}

function displayChange_field_mot_nc(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_mot_nc__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_mot_nc" + row).select2("destroy");
		}
		scJQSelect2Add(row, "mot_nc");
	}
}

function displayChange_field_mot_nd(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_mot_nd__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_mot_nd" + row).select2("destroy");
		}
		scJQSelect2Add(row, "mot_nd");
	}
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_nremision(row, status) {
}

function displayChange_field_cupodis(row, status) {
}

function displayChange_field_cupo(row, status) {
}

function displayChange_field_subtotal(row, status) {
}

function displayChange_field_valoriva(row, status) {
}

function displayChange_field_total(row, status) {
}

function displayChange_field_adicional(row, status) {
}

function displayChange_field_saldo(row, status) {
}

function displayChange_field_idfacven(row, status) {
}

function displayChange_field_retefuente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_retefuente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_retefuente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "retefuente");
	}
}

function displayChange_field_cree(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_cree__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_cree" + row).select2("destroy");
		}
		scJQSelect2Add(row, "cree");
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

function displayChange_field_imconsumo(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detalle_notasDC_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detalle_notasDC_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_tipo("all", "on");
	displayChange_field_resolucion("all", "on");
	displayChange_field_pedido("all", "on");
	displayChange_field_asentada("all", "on");
	displayChange_field_prefijo_fac("all", "on");
	displayChange_field_num_fac("all", "on");
	displayChange_field_idcli("all", "on");
	displayChange_field_credito("all", "on");
	displayChange_field_mot_nc("all", "on");
	displayChange_field_mot_nd("all", "on");
	displayChange_field_retefuente("all", "on");
	displayChange_field_cree("all", "on");
	displayChange_field_reteica("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_notas_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechaven" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechaven" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_notas_mob_validate_fechaven(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechaven']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
      do_ajax_form_notas_mob_validate_creado(iSeqRow);
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
      do_ajax_form_notas_mob_validate_editado(iSeqRow);
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
  $("#id_sc_field_fecha_a_tns" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_a_tns" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_a_tns']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_a_tns']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_notas_mob_validate_fecha_a_tns(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_a_tns']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_notas_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo" == specificField) {
    scJQSelect2Add_tipo(seqRow);
  }
  if (null == specificField || "resolucion" == specificField) {
    scJQSelect2Add_resolucion(seqRow);
  }
  if (null == specificField || "pedido" == specificField) {
    scJQSelect2Add_pedido(seqRow);
  }
  if (null == specificField || "asentada" == specificField) {
    scJQSelect2Add_asentada(seqRow);
  }
  if (null == specificField || "prefijo_fac" == specificField) {
    scJQSelect2Add_prefijo_fac(seqRow);
  }
  if (null == specificField || "num_fac" == specificField) {
    scJQSelect2Add_num_fac(seqRow);
  }
  if (null == specificField || "idcli" == specificField) {
    scJQSelect2Add_idcli(seqRow);
  }
  if (null == specificField || "credito" == specificField) {
    scJQSelect2Add_credito(seqRow);
  }
  if (null == specificField || "mot_nc" == specificField) {
    scJQSelect2Add_mot_nc(seqRow);
  }
  if (null == specificField || "mot_nd" == specificField) {
    scJQSelect2Add_mot_nd(seqRow);
  }
  if (null == specificField || "retefuente" == specificField) {
    scJQSelect2Add_retefuente(seqRow);
  }
  if (null == specificField || "cree" == specificField) {
    scJQSelect2Add_cree(seqRow);
  }
  if (null == specificField || "reteica" == specificField) {
    scJQSelect2Add_reteica(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_obj" : "#id_sc_field_tipo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_obj',
      dropdownCssClass: 'css_tipo_obj',
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

function scJQSelect2Add_pedido(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_pedido_obj" : "#id_sc_field_pedido" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_pedido_obj',
      dropdownCssClass: 'css_pedido_obj',
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

function scJQSelect2Add_prefijo_fac(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_prefijo_fac_obj" : "#id_sc_field_prefijo_fac" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_prefijo_fac_obj',
      dropdownCssClass: 'css_prefijo_fac_obj',
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

function scJQSelect2Add_num_fac(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_num_fac_obj" : "#id_sc_field_num_fac" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_num_fac_obj',
      dropdownCssClass: 'css_num_fac_obj',
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

function scJQSelect2Add_idcli(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idcli_obj" : "#id_sc_field_idcli" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idcli_obj',
      dropdownCssClass: 'css_idcli_obj',
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

function scJQSelect2Add_credito(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_credito_obj" : "#id_sc_field_credito" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_credito_obj',
      dropdownCssClass: 'css_credito_obj',
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

function scJQSelect2Add_mot_nc(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_mot_nc_obj" : "#id_sc_field_mot_nc" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_mot_nc_obj',
      dropdownCssClass: 'css_mot_nc_obj',
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

function scJQSelect2Add_mot_nd(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_mot_nd_obj" : "#id_sc_field_mot_nd" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_mot_nd_obj',
      dropdownCssClass: 'css_mot_nd_obj',
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

function scJQSelect2Add_retefuente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_retefuente_obj" : "#id_sc_field_retefuente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_retefuente_obj',
      dropdownCssClass: 'css_retefuente_obj',
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

function scJQSelect2Add_cree(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_cree_obj" : "#id_sc_field_cree" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_cree_obj',
      dropdownCssClass: 'css_cree_obj',
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo) { displayChange_field_tipo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_resolucion) { displayChange_field_resolucion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_pedido) { displayChange_field_pedido(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asentada) { displayChange_field_asentada(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_prefijo_fac) { displayChange_field_prefijo_fac(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_num_fac) { displayChange_field_num_fac(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idcli) { displayChange_field_idcli(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_credito) { displayChange_field_credito(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_mot_nc) { displayChange_field_mot_nc(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_mot_nd) { displayChange_field_mot_nd(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_retefuente) { displayChange_field_retefuente(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_cree) { displayChange_field_cree(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_reteica) { displayChange_field_reteica(iLine, "on"); } }, 150);
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

