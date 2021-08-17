
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
  scEventControl_data["fechaven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_ped" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numpedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obspago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asentada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["formapago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["creado_en_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disponible_en_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["change"]) {
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
  if (scEventControl_data["adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obspago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obspago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["creado_en_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["creado_en_movil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disponible_en_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disponible_en_movil" + iSeqRow]["change"]) {
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
  if ("idcli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("formapago" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("adicional2" + iSeq == fieldName) {
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
  $('#id_sc_field_idpedido' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_idpedido_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pagar_pedido_idpedido_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pagar_pedido_idpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_numfacven' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_numfacven_onchange(this, iSeqRow) });
  $('#id_sc_field_nremision' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_nremision_onchange(this, iSeqRow) });
  $('#id_sc_field_credito' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_credito_onchange(this, iSeqRow) });
  $('#id_sc_field_fechaven' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_fechaven_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pagar_pedido_fechaven_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pagar_pedido_fechaven_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechavenc' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_fechavenc_onchange(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_idcli_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_pagar_pedido_idcli_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pagar_pedido_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_subtotal_onchange(this, iSeqRow) });
  $('#id_sc_field_valoriva' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_valoriva_onchange(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_total_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_pagar_pedido_total_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pagar_pedido_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_facturado' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_facturado_onchange(this, iSeqRow) });
  $('#id_sc_field_asentada' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_asentada_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_pagar_pedido_asentada_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_pagar_pedido_asentada_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_observaciones_onchange(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_saldo_onchange(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_adicional_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pagar_pedido_adicional_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pagar_pedido_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_formapago' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_formapago_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pagar_pedido_formapago_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pagar_pedido_formapago_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional2' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_adicional2_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_pagar_pedido_adicional2_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_pagar_pedido_adicional2_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional3' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_adicional3_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_pagar_pedido_adicional3_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_pagar_pedido_adicional3_onfocus(this, iSeqRow) });
  $('#id_sc_field_obspago' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_obspago_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_pagar_pedido_obspago_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pagar_pedido_obspago_onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_vendedor_onchange(this, iSeqRow) });
  $('#id_sc_field_dircliente' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_dircliente_onchange(this, iSeqRow) });
  $('#id_sc_field_numpedido' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_numpedido_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_pagar_pedido_numpedido_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pagar_pedido_numpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_ped' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_prefijo_ped_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_pagar_pedido_prefijo_ped_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_pagar_pedido_prefijo_ped_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_doc' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_tipo_doc_onchange(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_usuario_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadocu' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_fechadocu_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadocu_hora' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_fechadocu_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_origen' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_origen_onchange(this, iSeqRow) });
  $('#id_sc_field_iddocumento' + iSeqRow).bind('change', function() { sc_form_pagar_pedido_iddocumento_onchange(this, iSeqRow) });
  $('#id_sc_field_creado_en_movil' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_creado_en_movil_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_pagar_pedido_creado_en_movil_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_pagar_pedido_creado_en_movil_onfocus(this, iSeqRow) });
  $('#id_sc_field_disponible_en_movil' + iSeqRow).bind('blur', function() { sc_form_pagar_pedido_disponible_en_movil_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_pagar_pedido_disponible_en_movil_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_pagar_pedido_disponible_en_movil_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_pagar_pedido_idpedido_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_idpedido();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_idpedido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_idpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_numfacven_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_nremision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_credito_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_fechaven_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_fechaven();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_fechaven_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_fechaven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_fechavenc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_idcli_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_idcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_subtotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_valoriva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_total_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_total();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_total_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_facturado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_asentada_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_asentada();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_asentada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_asentada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_observaciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_saldo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_adicional_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_formapago_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_formapago();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_formapago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_formapago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_adicional2_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_adicional2();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_adicional2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_pagar_pedido_event_adicional2_onchange();
}

function sc_form_pagar_pedido_adicional2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_adicional3_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_adicional3();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_adicional3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_adicional3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_obspago_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_obspago();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_obspago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_obspago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_vendedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_dircliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_numpedido_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_numpedido();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_numpedido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_numpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_prefijo_ped_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_prefijo_ped();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_prefijo_ped_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_prefijo_ped_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_tipo_doc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_fechadocu_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_fechadocu_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_origen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_iddocumento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_creado_en_movil_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_creado_en_movil();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_creado_en_movil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_creado_en_movil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pagar_pedido_disponible_en_movil_onblur(oThis, iSeqRow) {
  do_ajax_form_pagar_pedido_validate_disponible_en_movil();
  scCssBlur(oThis);
}

function sc_form_pagar_pedido_disponible_en_movil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_pagar_pedido_disponible_en_movil_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("idpedido", "", status);
	displayChange_field("fechaven", "", status);
	displayChange_field("prefijo_ped", "", status);
	displayChange_field("numpedido", "", status);
	displayChange_field("adicional", "", status);
	displayChange_field("total", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("idcli", "", status);
	displayChange_field("obspago", "", status);
	displayChange_field("asentada", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("formapago", "", status);
	displayChange_field("adicional2", "", status);
	displayChange_field("adicional3", "", status);
	displayChange_field("creado_en_movil", "", status);
	displayChange_field("disponible_en_movil", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpedido(row, status);
	displayChange_field_fechaven(row, status);
	displayChange_field_prefijo_ped(row, status);
	displayChange_field_numpedido(row, status);
	displayChange_field_adicional(row, status);
	displayChange_field_total(row, status);
	displayChange_field_idcli(row, status);
	displayChange_field_obspago(row, status);
	displayChange_field_asentada(row, status);
	displayChange_field_formapago(row, status);
	displayChange_field_adicional2(row, status);
	displayChange_field_adicional3(row, status);
	displayChange_field_creado_en_movil(row, status);
	displayChange_field_disponible_en_movil(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpedido" == field) {
		displayChange_field_idpedido(row, status);
	}
	if ("fechaven" == field) {
		displayChange_field_fechaven(row, status);
	}
	if ("prefijo_ped" == field) {
		displayChange_field_prefijo_ped(row, status);
	}
	if ("numpedido" == field) {
		displayChange_field_numpedido(row, status);
	}
	if ("adicional" == field) {
		displayChange_field_adicional(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
	if ("idcli" == field) {
		displayChange_field_idcli(row, status);
	}
	if ("obspago" == field) {
		displayChange_field_obspago(row, status);
	}
	if ("asentada" == field) {
		displayChange_field_asentada(row, status);
	}
	if ("formapago" == field) {
		displayChange_field_formapago(row, status);
	}
	if ("adicional2" == field) {
		displayChange_field_adicional2(row, status);
	}
	if ("adicional3" == field) {
		displayChange_field_adicional3(row, status);
	}
	if ("creado_en_movil" == field) {
		displayChange_field_creado_en_movil(row, status);
	}
	if ("disponible_en_movil" == field) {
		displayChange_field_disponible_en_movil(row, status);
	}
}

function displayChange_field_idpedido(row, status) {
}

function displayChange_field_fechaven(row, status) {
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

function displayChange_field_adicional(row, status) {
}

function displayChange_field_total(row, status) {
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

function displayChange_field_obspago(row, status) {
}

function displayChange_field_asentada(row, status) {
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

function displayChange_field_adicional2(row, status) {
}

function displayChange_field_adicional3(row, status) {
}

function displayChange_field_creado_en_movil(row, status) {
}

function displayChange_field_disponible_en_movil(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_prefijo_ped("all", "on");
	displayChange_field_idcli("all", "on");
	displayChange_field_formapago("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_pagar_pedido_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechavenc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechavenc" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_pagar_pedido_validate_fechavenc(iSeqRow);
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
  $("#id_sc_field_fechadocu" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechadocu" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechadocu']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechadocu']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_pagar_pedido_validate_fechadocu(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechadocu']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_pagar_pedido')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idcli" == specificField) {
    scJQSelect2Add_idcli(seqRow);
  }
  if (null == specificField || "formapago" == specificField) {
    scJQSelect2Add_formapago(seqRow);
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
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_prefijo_ped) { displayChange_field_prefijo_ped(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idcli) { displayChange_field_idcli(iLine, "on"); } }, 150);
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

