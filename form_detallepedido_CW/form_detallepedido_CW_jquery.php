
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
  scEventControl_data["iddet_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpedid_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codbarra_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observ_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["iddet_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddet_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpedid_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpedid_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codbarra_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codbarra_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observ_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observ_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional_" + iSeqRow]["change"]) {
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
  if ("idpro_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idbod_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("adicional_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cantidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("codbarra_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idpro_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("valorunit_" + iSeq == fieldName) {
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
  $('#id_sc_field_iddet_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_iddet__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_CW_iddet__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_CW_iddet__onfocus(this, iSeqRow) });
  $('#id_sc_field_idpedid_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_idpedid__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_CW_idpedid__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_CW_idpedid__onfocus(this, iSeqRow) });
  $('#id_sc_field_numfac_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_numfac__onchange(this, iSeqRow) });
  $('#id_sc_field_remision_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_remision__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_idpro__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_CW_idpro__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_CW_idpro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadmayor_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_unidadmayor__onchange(this, iSeqRow) });
  $('#id_sc_field_factor_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_factor__onchange(this, iSeqRow) });
  $('#id_sc_field_idbod_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_idbod__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_CW_idbod__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_CW_idbod__onfocus(this, iSeqRow) });
  $('#id_sc_field_costop_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_costop__onchange(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_CW_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_CW_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_valorunit__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_CW_valorunit__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_CW_valorunit__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_valorpar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_CW_valorpar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_CW_valorpar__onfocus(this, iSeqRow) });
  $('#id_sc_field_iva_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_iva__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detallepedido_CW_iva__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detallepedido_CW_iva__onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_descuento__onchange(this, iSeqRow) });
  $('#id_sc_field_adicional_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_adicional__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_CW_adicional__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_CW_adicional__onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional1_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_adicional1__onchange(this, iSeqRow) });
  $('#id_sc_field_devuelto_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_devuelto__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_colores__onchange(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_tallas__onchange(this, iSeqRow) });
  $('#id_sc_field_sabor_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_sabor__onchange(this, iSeqRow) });
  $('#id_sc_field_estado_comanda_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_estado_comanda__onchange(this, iSeqRow) });
  $('#id_sc_field_usuario_comanda_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_usuario_comanda__onchange(this, iSeqRow) });
  $('#id_sc_field_tercero_comanda_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_tercero_comanda__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_hora_inicio__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio__hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_hora_inicio__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_hora_final__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final__hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_hora_final__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_observ_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_observ__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_CW_observ__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_CW_observ__onfocus(this, iSeqRow) });
  $('#id_sc_field_cerrado_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_cerrado__onchange(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_obs__onchange(this, iSeqRow) });
  $('#id_sc_field_descr_' + iSeqRow).bind('change', function() { sc_form_detallepedido_CW_descr__onchange(this, iSeqRow) });
  $('#id_sc_field_codbarra_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_CW_codbarra__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_CW_codbarra__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_CW_codbarra__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detallepedido_CW_iddet__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_iddet_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_iddet__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_iddet__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_idpedid__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_idpedid_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_idpedid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_idpedid__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_numfac__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_remision__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_idpro__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_idpro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_idpro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_CW_event_idpro__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_idpro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_unidadmayor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_factor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_idbod__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_idbod_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_idbod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_idbod__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_costop__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_CW_event_cantidad__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_valorunit__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_valorunit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_valorunit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_CW_event_valorunit__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_valorunit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_valorpar__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_valorpar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_valorpar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_valorpar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_iva__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_iva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_iva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_iva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_descuento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_adicional__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_adicional_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_adicional__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_CW_event_adicional__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_adicional__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_adicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_devuelto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_sabor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_estado_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_usuario_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_tercero_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_hora_inicio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_hora_inicio__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_hora_final__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_hora_final__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_observ__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_observ_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_observ__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_observ__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_cerrado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_obs__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_descr__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_CW_codbarra__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_CW_validate_codbarra_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_CW_codbarra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_CW_event_codbarra__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_CW_codbarra__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("iddet_", "", status);
	displayChange_field("idpedid_", "", status);
	displayChange_field("codbarra_", "", status);
	displayChange_field("idpro_", "", status);
	displayChange_field("idbod_", "", status);
	displayChange_field("observ_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("valorunit_", "", status);
	displayChange_field("valorpar_", "", status);
	displayChange_field("iva_", "", status);
	displayChange_field("adicional_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_iddet_(row, status);
	displayChange_field_idpedid_(row, status);
	displayChange_field_codbarra_(row, status);
	displayChange_field_idpro_(row, status);
	displayChange_field_idbod_(row, status);
	displayChange_field_observ_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_valorunit_(row, status);
	displayChange_field_valorpar_(row, status);
	displayChange_field_iva_(row, status);
	displayChange_field_adicional_(row, status);
}

function displayChange_field(field, row, status) {
	if ("iddet_" == field) {
		displayChange_field_iddet_(row, status);
	}
	if ("idpedid_" == field) {
		displayChange_field_idpedid_(row, status);
	}
	if ("codbarra_" == field) {
		displayChange_field_codbarra_(row, status);
	}
	if ("idpro_" == field) {
		displayChange_field_idpro_(row, status);
	}
	if ("idbod_" == field) {
		displayChange_field_idbod_(row, status);
	}
	if ("observ_" == field) {
		displayChange_field_observ_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("valorunit_" == field) {
		displayChange_field_valorunit_(row, status);
	}
	if ("valorpar_" == field) {
		displayChange_field_valorpar_(row, status);
	}
	if ("iva_" == field) {
		displayChange_field_iva_(row, status);
	}
	if ("adicional_" == field) {
		displayChange_field_adicional_(row, status);
	}
}

function displayChange_field_iddet_(row, status) {
}

function displayChange_field_idpedid_(row, status) {
}

function displayChange_field_codbarra_(row, status) {
}

function displayChange_field_idpro_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idpro___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idpro_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idpro_");
	}
}

function displayChange_field_idbod_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idbod___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idbod_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idbod_");
	}
}

function displayChange_field_observ_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_valorunit_(row, status) {
}

function displayChange_field_valorpar_(row, status) {
}

function displayChange_field_iva_(row, status) {
}

function displayChange_field_adicional_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idpro_("all", "on");
	displayChange_field_idbod_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detallepedido_CW_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.offset().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(formHeaders); }
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_hora_inicio_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_inicio_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_inicio_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_CW_validate_hora_inicio_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_hora_final_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_final_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_final_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_CW_validate_hora_final_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_detallepedido_CW')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idpro_" == specificField) {
    scJQSelect2Add_idpro_(seqRow);
  }
  if (null == specificField || "idbod_" == specificField) {
    scJQSelect2Add_idbod_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idpro_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idpro__obj" : "#id_sc_field_idpro_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idpro__obj',
      dropdownCssClass: 'css_idpro__obj',
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

function scJQSelect2Add_idbod_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idbod__obj" : "#id_sc_field_idbod_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idbod__obj',
      dropdownCssClass: 'css_idbod__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_idpro_) { displayChange_field_idpro_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idbod_) { displayChange_field_idbod_(iLine, "on"); } }, 150);
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

