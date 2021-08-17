
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
  scEventControl_data["idpro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stock_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidadmayor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costop_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddet_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["colores_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["colores_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tallas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tallas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sabor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sabor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stock_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stock_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costop_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costop_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["iddet_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddet_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["autocomp"]) {
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
  if ("colores_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idbod_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unidadmayor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("numproducc_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cantidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("colores_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idbod_" + iSeq == fieldName) {
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
  if ("sabor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tallas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("unidadmayor_" + iSeq == fieldName) {
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
  $('#id_sc_field_iddet_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_iddet__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detalleprod_iddet__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detalleprod_iddet__onfocus(this, iSeqRow) });
  $('#id_sc_field_numproducc_' + iSeqRow).bind('change', function() { sc_form_detalleprod_numproducc__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_idpro__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detalleprod_idpro__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detalleprod_idpro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadmayor_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_unidadmayor__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_detalleprod_unidadmayor__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_detalleprod_unidadmayor__onfocus(this, iSeqRow) });
  $('#id_sc_field_factor_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_factor__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detalleprod_factor__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detalleprod_factor__onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_idbod__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detalleprod_idbod__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detalleprod_idbod__onfocus(this, iSeqRow) });
  $('#id_sc_field_costop_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_costop__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detalleprod_costop__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detalleprod_costop__onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detalleprod_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detalleprod_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_valorunit__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detalleprod_valorunit__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detalleprod_valorunit__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_valorpar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detalleprod_valorpar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detalleprod_valorpar__onfocus(this, iSeqRow) });
  $('#id_sc_field_iva_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_iva__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detalleprod_iva__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detalleprod_iva__onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento_' + iSeqRow).bind('change', function() { sc_form_detalleprod_descuento__onchange(this, iSeqRow) });
  $('#id_sc_field_adicional_' + iSeqRow).bind('change', function() { sc_form_detalleprod_adicional__onchange(this, iSeqRow) });
  $('#id_sc_field_adicional1_' + iSeqRow).bind('change', function() { sc_form_detalleprod_adicional1__onchange(this, iSeqRow) });
  $('#id_sc_field_devuelto_' + iSeqRow).bind('change', function() { sc_form_detalleprod_devuelto__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_colores__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detalleprod_colores__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detalleprod_colores__onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_tallas__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detalleprod_tallas__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detalleprod_tallas__onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_sabor__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detalleprod_sabor__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detalleprod_sabor__onfocus(this, iSeqRow) });
  $('#id_sc_field_stock_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_stock__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detalleprod_stock__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detalleprod_stock__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_' + iSeqRow).bind('blur', function() { sc_form_detalleprod_unidad__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detalleprod_unidad__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detalleprod_unidad__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detalleprod_iddet__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_iddet_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_iddet__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_iddet__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_numproducc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detalleprod_idpro__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_idpro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_idpro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_idpro__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_idpro__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_unidadmayor__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_unidadmayor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_unidadmayor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_unidadmayor__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_unidadmayor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_factor__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_factor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_factor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_factor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_idbod__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_idbod_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_idbod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_idbod__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_idbod__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_costop__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_costop_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_costop__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_costop__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_detalleprod_event_cantidad__onblur(iSeqRow);
}

function sc_form_detalleprod_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_cantidad__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
  do_ajax_form_detalleprod_event_cantidad__onfocus(iSeqRow);
}

function sc_form_detalleprod_valorunit__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_valorunit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_valorunit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_valorunit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_valorpar__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_valorpar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_valorpar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_valorpar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_iva__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_iva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_iva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_iva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_descuento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detalleprod_adicional__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detalleprod_adicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detalleprod_devuelto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detalleprod_colores__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_colores_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_colores__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_colores__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_tallas__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_tallas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_tallas__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_tallas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_sabor__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_sabor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_sabor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detalleprod_event_sabor__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_sabor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_stock__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_stock_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_stock__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_stock__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalleprod_unidad__onblur(oThis, iSeqRow) {
  do_ajax_form_detalleprod_validate_unidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalleprod_unidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detalleprod_unidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpro_", "", status);
	displayChange_field("colores_", "", status);
	displayChange_field("tallas_", "", status);
	displayChange_field("sabor_", "", status);
	displayChange_field("idbod_", "", status);
	displayChange_field("stock_", "", status);
	displayChange_field("unidad_", "", status);
	displayChange_field("unidadmayor_", "", status);
	displayChange_field("factor_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("costop_", "", status);
	displayChange_field("valorunit_", "", status);
	displayChange_field("valorpar_", "", status);
	displayChange_field("iva_", "", status);
	displayChange_field("iddet_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpro_(row, status);
	displayChange_field_colores_(row, status);
	displayChange_field_tallas_(row, status);
	displayChange_field_sabor_(row, status);
	displayChange_field_idbod_(row, status);
	displayChange_field_stock_(row, status);
	displayChange_field_unidad_(row, status);
	displayChange_field_unidadmayor_(row, status);
	displayChange_field_factor_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_costop_(row, status);
	displayChange_field_valorunit_(row, status);
	displayChange_field_valorpar_(row, status);
	displayChange_field_iva_(row, status);
	displayChange_field_iddet_(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpro_" == field) {
		displayChange_field_idpro_(row, status);
	}
	if ("colores_" == field) {
		displayChange_field_colores_(row, status);
	}
	if ("tallas_" == field) {
		displayChange_field_tallas_(row, status);
	}
	if ("sabor_" == field) {
		displayChange_field_sabor_(row, status);
	}
	if ("idbod_" == field) {
		displayChange_field_idbod_(row, status);
	}
	if ("stock_" == field) {
		displayChange_field_stock_(row, status);
	}
	if ("unidad_" == field) {
		displayChange_field_unidad_(row, status);
	}
	if ("unidadmayor_" == field) {
		displayChange_field_unidadmayor_(row, status);
	}
	if ("factor_" == field) {
		displayChange_field_factor_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("costop_" == field) {
		displayChange_field_costop_(row, status);
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
	if ("iddet_" == field) {
		displayChange_field_iddet_(row, status);
	}
}

function displayChange_field_idpro_(row, status) {
}

function displayChange_field_colores_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_colores___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_colores_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "colores_");
	}
}

function displayChange_field_tallas_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tallas___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tallas_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tallas_");
	}
}

function displayChange_field_sabor_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sabor___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sabor_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sabor_");
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

function displayChange_field_stock_(row, status) {
}

function displayChange_field_unidad_(row, status) {
}

function displayChange_field_unidadmayor_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unidadmayor___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unidadmayor_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unidadmayor_");
	}
}

function displayChange_field_factor_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_costop_(row, status) {
}

function displayChange_field_valorunit_(row, status) {
}

function displayChange_field_valorpar_(row, status) {
}

function displayChange_field_iva_(row, status) {
}

function displayChange_field_iddet_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_colores_("all", "on");
	displayChange_field_tallas_("all", "on");
	displayChange_field_sabor_("all", "on");
	displayChange_field_idbod_("all", "on");
	displayChange_field_unidadmayor_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detalleprod_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_detalleprod')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "colores_" == specificField) {
    scJQSelect2Add_colores_(seqRow);
  }
  if (null == specificField || "tallas_" == specificField) {
    scJQSelect2Add_tallas_(seqRow);
  }
  if (null == specificField || "sabor_" == specificField) {
    scJQSelect2Add_sabor_(seqRow);
  }
  if (null == specificField || "idbod_" == specificField) {
    scJQSelect2Add_idbod_(seqRow);
  }
  if (null == specificField || "unidadmayor_" == specificField) {
    scJQSelect2Add_unidadmayor_(seqRow);
  }
  if (null == specificField || "numproducc_" == specificField) {
    scJQSelect2Add_numproducc_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_colores_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_colores__obj" : "#id_sc_field_colores_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_colores__obj',
      dropdownCssClass: 'css_colores__obj',
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

function scJQSelect2Add_tallas_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tallas__obj" : "#id_sc_field_tallas_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tallas__obj',
      dropdownCssClass: 'css_tallas__obj',
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

function scJQSelect2Add_sabor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sabor__obj" : "#id_sc_field_sabor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sabor__obj',
      dropdownCssClass: 'css_sabor__obj',
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

function scJQSelect2Add_unidadmayor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unidadmayor__obj" : "#id_sc_field_unidadmayor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unidadmayor__obj',
      dropdownCssClass: 'css_unidadmayor__obj',
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

function scJQSelect2Add_numproducc_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_numproducc__obj" : "#id_sc_field_numproducc_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_numproducc__obj',
      dropdownCssClass: 'css_numproducc__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_colores_) { displayChange_field_colores_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas_) { displayChange_field_tallas_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor_) { displayChange_field_sabor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idbod_) { displayChange_field_idbod_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_unidadmayor_) { displayChange_field_unidadmayor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_numproducc_) { displayChange_field_numproducc_(iLine, "on"); } }, 150);
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

