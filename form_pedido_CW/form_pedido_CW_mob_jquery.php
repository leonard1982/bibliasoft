
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
  scEventControl_data["idpedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_ped" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numpedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["facturado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechavenc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asentada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dircliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupodis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numfacven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoriva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detallepedidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_ped" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_ped" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numpedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numpedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["facturado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["facturado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechavenc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
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
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
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
  if (scEventControl_data["numfacven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numfacven" + iSeqRow]["change"]) {
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
  if (scEventControl_data["detallepedidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detallepedidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["autocomp"]) {
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
  if ("prefijo_ped" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("facturado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asentada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("dircliente" + iSeq == fieldName) {
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
  if ("idcli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("prefijo_ped" + iSeq == fieldName) {
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
  $('#id_sc_field_idpedido' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_idpedido_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_idpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_numfacven' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_numfacven_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pedido_CW_numfacven_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedido_CW_numfacven_onfocus(this, iSeqRow) });
  $('#id_sc_field_credito' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_credito_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_pedido_CW_credito_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pedido_CW_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaven' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_fechaven_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pedido_CW_fechaven_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_fechaven_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechavenc' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_fechavenc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pedido_CW_fechavenc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedido_CW_fechavenc_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_idcli_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_pedido_CW_idcli_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pedido_CW_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_subtotal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_subtotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoriva' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_valoriva_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_valoriva_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pedido_CW_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_facturado' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_facturado_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedido_CW_facturado_onfocus(this, iSeqRow) });
  $('#id_sc_field_asentada' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_asentada_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pedido_CW_asentada_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_asentada_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_pedido_CW_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_saldo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pedido_CW_saldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_adicional_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedido_CW_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_vendedor_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pedido_CW_vendedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_dircliente' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_dircliente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_pedido_CW_dircliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_numpedido' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_numpedido_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedido_CW_numpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_ped' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_prefijo_ped_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_pedido_CW_prefijo_ped_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_pedido_CW_prefijo_ped_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_cupo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_pedido_CW_cupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupodis' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_cupodis_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pedido_CW_cupodis_onfocus(this, iSeqRow) });
  $('#id_sc_field_detallepedidos' + iSeqRow).bind('blur', function() { sc_form_pedido_CW_detallepedidos_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_pedido_CW_detallepedidos_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_pedido_CW_idpedido_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_idpedido();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_idpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_numfacven_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_numfacven();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_numfacven_onchange(oThis, iSeqRow) {
  lookup_numfacven();
}

function sc_form_pedido_CW_numfacven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_credito_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_credito();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_credito_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_credito_onchange();
}

function sc_form_pedido_CW_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_fechaven_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_fechaven();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_fechaven_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_fechaven_onchange();
}

function sc_form_pedido_CW_fechaven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_fechavenc_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_fechavenc();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_fechavenc_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_fechavenc_onchange();
}

function sc_form_pedido_CW_fechavenc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_idcli_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_idcli_onchange();
}

function sc_form_pedido_CW_idcli_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_pedido_CW_subtotal_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_subtotal();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_subtotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_valoriva_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_valoriva();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_valoriva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_total_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_total();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_facturado_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_facturado();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_facturado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_asentada_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_asentada();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_asentada_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_asentada_onchange();
}

function sc_form_pedido_CW_asentada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_saldo_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_saldo();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_saldo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_vendedor_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_vendedor();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_vendedor_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_pedido_CW_dircliente_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_dircliente();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_dircliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_numpedido_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_numpedido();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_numpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_prefijo_ped_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_prefijo_ped();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_prefijo_ped_onchange(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_event_prefijo_ped_onchange();
}

function sc_form_pedido_CW_prefijo_ped_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_cupo_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_cupo();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_cupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_cupodis_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_cupodis();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_cupodis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedido_CW_detallepedidos_onblur(oThis, iSeqRow) {
  do_ajax_form_pedido_CW_mob_validate_detallepedidos();
  scCssBlur(oThis);
}

function sc_form_pedido_CW_detallepedidos_onfocus(oThis, iSeqRow) {
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
	displayChange_field("idpedido", "", status);
	displayChange_field("prefijo_ped", "", status);
	displayChange_field("numpedido", "", status);
	displayChange_field("facturado", "", status);
	displayChange_field("fechaven", "", status);
	displayChange_field("fechavenc", "", status);
	displayChange_field("credito", "", status);
	displayChange_field("asentada", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("idcli", "", status);
	displayChange_field("dircliente", "", status);
	displayChange_field("vendedor", "", status);
	displayChange_field("observaciones", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("cupodis", "", status);
	displayChange_field("cupo", "", status);
	displayChange_field("numfacven", "", status);
	displayChange_field("subtotal", "", status);
	displayChange_field("valoriva", "", status);
	displayChange_field("total", "", status);
	displayChange_field("adicional", "", status);
	displayChange_field("saldo", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detallepedidos", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpedido(row, status);
	displayChange_field_prefijo_ped(row, status);
	displayChange_field_numpedido(row, status);
	displayChange_field_facturado(row, status);
	displayChange_field_fechaven(row, status);
	displayChange_field_fechavenc(row, status);
	displayChange_field_credito(row, status);
	displayChange_field_asentada(row, status);
	displayChange_field_idcli(row, status);
	displayChange_field_dircliente(row, status);
	displayChange_field_vendedor(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_cupodis(row, status);
	displayChange_field_cupo(row, status);
	displayChange_field_numfacven(row, status);
	displayChange_field_subtotal(row, status);
	displayChange_field_valoriva(row, status);
	displayChange_field_total(row, status);
	displayChange_field_adicional(row, status);
	displayChange_field_saldo(row, status);
	displayChange_field_detallepedidos(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpedido" == field) {
		displayChange_field_idpedido(row, status);
	}
	if ("prefijo_ped" == field) {
		displayChange_field_prefijo_ped(row, status);
	}
	if ("numpedido" == field) {
		displayChange_field_numpedido(row, status);
	}
	if ("facturado" == field) {
		displayChange_field_facturado(row, status);
	}
	if ("fechaven" == field) {
		displayChange_field_fechaven(row, status);
	}
	if ("fechavenc" == field) {
		displayChange_field_fechavenc(row, status);
	}
	if ("credito" == field) {
		displayChange_field_credito(row, status);
	}
	if ("asentada" == field) {
		displayChange_field_asentada(row, status);
	}
	if ("idcli" == field) {
		displayChange_field_idcli(row, status);
	}
	if ("dircliente" == field) {
		displayChange_field_dircliente(row, status);
	}
	if ("vendedor" == field) {
		displayChange_field_vendedor(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("cupodis" == field) {
		displayChange_field_cupodis(row, status);
	}
	if ("cupo" == field) {
		displayChange_field_cupo(row, status);
	}
	if ("numfacven" == field) {
		displayChange_field_numfacven(row, status);
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
	if ("detallepedidos" == field) {
		displayChange_field_detallepedidos(row, status);
	}
}

function displayChange_field_idpedido(row, status) {
}

function displayChange_field_prefijo_ped(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_prefijo_ped__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_prefijo_ped" + row).select2("destroy");
		}
		scJQSelect2Add(row, "prefijo_ped");
	}
}

function displayChange_field_numpedido(row, status) {
}

function displayChange_field_facturado(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_facturado__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_facturado" + row).select2("destroy");
		}
		scJQSelect2Add(row, "facturado");
	}
}

function displayChange_field_fechaven(row, status) {
}

function displayChange_field_fechavenc(row, status) {
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

function displayChange_field_idcli(row, status) {
}

function displayChange_field_dircliente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_dircliente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_dircliente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "dircliente");
	}
}

function displayChange_field_vendedor(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_cupodis(row, status) {
}

function displayChange_field_cupo(row, status) {
}

function displayChange_field_numfacven(row, status) {
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

function displayChange_field_detallepedidos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detallepedido_CW_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detallepedido_CW_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_prefijo_ped("all", "on");
	displayChange_field_facturado("all", "on");
	displayChange_field_credito("all", "on");
	displayChange_field_asentada("all", "on");
	displayChange_field_dircliente("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_pedido_CW_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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
      do_ajax_form_pedido_CW_mob_validate_fechaven(iSeqRow);
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
  $("#id_sc_field_fechavenc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechavenc" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_pedido_CW_mob_validate_fechavenc(iSeqRow);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_pedido_CW_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "prefijo_ped" == specificField) {
    scJQSelect2Add_prefijo_ped(seqRow);
  }
  if (null == specificField || "facturado" == specificField) {
    scJQSelect2Add_facturado(seqRow);
  }
  if (null == specificField || "credito" == specificField) {
    scJQSelect2Add_credito(seqRow);
  }
  if (null == specificField || "asentada" == specificField) {
    scJQSelect2Add_asentada(seqRow);
  }
  if (null == specificField || "dircliente" == specificField) {
    scJQSelect2Add_dircliente(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_prefijo_ped(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_prefijo_ped_obj" : "#id_sc_field_prefijo_ped" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_prefijo_ped_obj',
      dropdownCssClass: 'css_prefijo_ped_obj',
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

function scJQSelect2Add_facturado(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_facturado_obj" : "#id_sc_field_facturado" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_facturado_obj',
      dropdownCssClass: 'css_facturado_obj',
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

function scJQSelect2Add_dircliente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_dircliente_obj" : "#id_sc_field_dircliente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_dircliente_obj',
      dropdownCssClass: 'css_dircliente_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_prefijo_ped) { displayChange_field_prefijo_ped(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_facturado) { displayChange_field_facturado(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_credito) { displayChange_field_credito(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asentada) { displayChange_field_asentada(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_dircliente) { displayChange_field_dircliente(iLine, "on"); } }, 150);
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
