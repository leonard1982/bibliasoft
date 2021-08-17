
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
  scEventControl_data["cod_barras_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fv_lote_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechavenc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lote2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigobar_2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["existencia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comparativo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorparcial_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cod_barras_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_barras_" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["fv_lote_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fv_lote_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechavenc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechavenc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lote2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lote2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigobar_2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar_2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["existencia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["existencia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comparativo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comparativo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorparcial_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorparcial_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_" + iSeqRow]["change"]) {
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
  if ("fv_lote_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmov_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idfaccom_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nufacvta_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cantidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cod_barras_" + iSeq == fieldName) {
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
  if ("costo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("fv_lote_" + iSeq == fieldName) {
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
  $('#id_sc_field_idinv_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_idinv__onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_fecha__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_fecha__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_fecha__onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_inventario_fisico_130521_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_inventario_fisico_130521_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_idpro__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_idpro__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_idpro__onfocus(this, iSeqRow) });
  $('#id_sc_field_costo_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_costo__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_costo__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_costo__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorparcial_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_valorparcial__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_inventario_fisico_130521_valorparcial__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_inventario_fisico_130521_valorparcial__onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_idbod__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_idbod__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_idbod__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_tipo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_inventario_fisico_130521_tipo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_inventario_fisico_130521_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_detalle__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_inventario_fisico_130521_detalle__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_inventario_fisico_130521_detalle__onfocus(this, iSeqRow) });
  $('#id_sc_field_idmov_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_idmov__onchange(this, iSeqRow) });
  $('#id_sc_field_idfaccom_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_idfaccom__onchange(this, iSeqRow) });
  $('#id_sc_field_nufacvta_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_nufacvta__onchange(this, iSeqRow) });
  $('#id_sc_field_remision_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_remision__onchange(this, iSeqRow) });
  $('#id_sc_field_nupro_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_nupro__onchange(this, iSeqRow) });
  $('#id_sc_field_iddetalle_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_iddetalle__onchange(this, iSeqRow) });
  $('#id_sc_field_lote_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_lote__onchange(this, iSeqRow) });
  $('#id_sc_field_fechafab_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_fechafab__onchange(this, iSeqRow) });
  $('#id_sc_field_fechavenc_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_fechavenc__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_inventario_fisico_130521_fechavenc__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_inventario_fisico_130521_fechavenc__onfocus(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_colores__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_inventario_fisico_130521_colores__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_inventario_fisico_130521_colores__onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_tallas__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_inventario_fisico_130521_tallas__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_inventario_fisico_130521_tallas__onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_sabor__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_sabor__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_sabor__onfocus(this, iSeqRow) });
  $('#id_sc_field_numdev_' + iSeqRow).bind('change', function() { sc_form_inventario_fisico_130521_numdev__onchange(this, iSeqRow) });
  $('#id_sc_field_codigobar_2_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_codigobar_2__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_inventario_fisico_130521_codigobar_2__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_inventario_fisico_130521_codigobar_2__onfocus(this, iSeqRow) });
  $('#id_sc_field_lote2_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_lote2__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_fisico_130521_lote2__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_fisico_130521_lote2__onfocus(this, iSeqRow) });
  $('#id_sc_field_existencia_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_existencia__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_inventario_fisico_130521_existencia__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_inventario_fisico_130521_existencia__onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_barras_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_cod_barras__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_inventario_fisico_130521_cod_barras__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_inventario_fisico_130521_cod_barras__onfocus(this, iSeqRow) });
  $('#id_sc_field_comparativo_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_comparativo__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_inventario_fisico_130521_comparativo__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_inventario_fisico_130521_comparativo__onfocus(this, iSeqRow) });
  $('#id_sc_field_fv_lote_' + iSeqRow).bind('blur', function() { sc_form_inventario_fisico_130521_fv_lote__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_inventario_fisico_130521_fv_lote__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_inventario_fisico_130521_fv_lote__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_inventario_fisico_130521_idinv__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_fecha__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_fecha_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_fecha__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_fecha__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_cantidad__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
  do_ajax_form_inventario_fisico_130521_event_cantidad__onfocus(iSeqRow);
}

function sc_form_inventario_fisico_130521_idpro__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_idpro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_idpro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_idpro__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_idpro__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_costo__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_costo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_costo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_costo__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_costo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_valorparcial__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_valorparcial_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_valorparcial__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_valorparcial__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_idbod__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_idbod_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_idbod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_idbod__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_tipo__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_tipo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_detalle__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_detalle_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_detalle__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_detalle__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_idmov__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_idfaccom__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_nufacvta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_remision__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_nupro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_iddetalle__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_lote__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_fechafab__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_fechavenc__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_fechavenc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_fechavenc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_fechavenc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_colores__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_colores_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_colores__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_colores__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_tallas__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_tallas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_tallas__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_tallas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_sabor__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_sabor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_sabor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_sabor__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_sabor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_numdev__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_fisico_130521_codigobar_2__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_codigobar_2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_codigobar_2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_codigobar_2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_lote2__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_lote2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_lote2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_lote2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_existencia__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_existencia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_existencia__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_existencia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_cod_barras__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_cod_barras_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_cod_barras__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_cod_barras__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_cod_barras__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_comparativo__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_comparativo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_comparativo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_comparativo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_fv_lote__onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_fisico_130521_validate_fv_lote_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_inventario_fisico_130521_fv_lote__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_fisico_130521_event_fv_lote__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_inventario_fisico_130521_fv_lote__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("cod_barras_", "", status);
	displayChange_field("idpro_", "", status);
	displayChange_field("colores_", "", status);
	displayChange_field("tallas_", "", status);
	displayChange_field("sabor_", "", status);
	displayChange_field("fv_lote_", "", status);
	displayChange_field("fechavenc_", "", status);
	displayChange_field("lote2_", "", status);
	displayChange_field("codigobar_2_", "", status);
	displayChange_field("existencia_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("comparativo_", "", status);
	displayChange_field("costo_", "", status);
	displayChange_field("valorparcial_", "", status);
	displayChange_field("tipo_", "", status);
	displayChange_field("idbod_", "", status);
	displayChange_field("fecha_", "", status);
	displayChange_field("detalle_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cod_barras_(row, status);
	displayChange_field_idpro_(row, status);
	displayChange_field_colores_(row, status);
	displayChange_field_tallas_(row, status);
	displayChange_field_sabor_(row, status);
	displayChange_field_fv_lote_(row, status);
	displayChange_field_fechavenc_(row, status);
	displayChange_field_lote2_(row, status);
	displayChange_field_codigobar_2_(row, status);
	displayChange_field_existencia_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_comparativo_(row, status);
	displayChange_field_costo_(row, status);
	displayChange_field_valorparcial_(row, status);
	displayChange_field_tipo_(row, status);
	displayChange_field_idbod_(row, status);
	displayChange_field_fecha_(row, status);
	displayChange_field_detalle_(row, status);
}

function displayChange_field(field, row, status) {
	if ("cod_barras_" == field) {
		displayChange_field_cod_barras_(row, status);
	}
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
	if ("fv_lote_" == field) {
		displayChange_field_fv_lote_(row, status);
	}
	if ("fechavenc_" == field) {
		displayChange_field_fechavenc_(row, status);
	}
	if ("lote2_" == field) {
		displayChange_field_lote2_(row, status);
	}
	if ("codigobar_2_" == field) {
		displayChange_field_codigobar_2_(row, status);
	}
	if ("existencia_" == field) {
		displayChange_field_existencia_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("comparativo_" == field) {
		displayChange_field_comparativo_(row, status);
	}
	if ("costo_" == field) {
		displayChange_field_costo_(row, status);
	}
	if ("valorparcial_" == field) {
		displayChange_field_valorparcial_(row, status);
	}
	if ("tipo_" == field) {
		displayChange_field_tipo_(row, status);
	}
	if ("idbod_" == field) {
		displayChange_field_idbod_(row, status);
	}
	if ("fecha_" == field) {
		displayChange_field_fecha_(row, status);
	}
	if ("detalle_" == field) {
		displayChange_field_detalle_(row, status);
	}
}

function displayChange_field_cod_barras_(row, status) {
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

function displayChange_field_fv_lote_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_fv_lote___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_fv_lote_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "fv_lote_");
	}
}

function displayChange_field_fechavenc_(row, status) {
}

function displayChange_field_lote2_(row, status) {
}

function displayChange_field_codigobar_2_(row, status) {
}

function displayChange_field_existencia_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_comparativo_(row, status) {
}

function displayChange_field_costo_(row, status) {
}

function displayChange_field_valorparcial_(row, status) {
}

function displayChange_field_tipo_(row, status) {
}

function displayChange_field_idbod_(row, status) {
}

function displayChange_field_fecha_(row, status) {
}

function displayChange_field_detalle_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_colores_("all", "on");
	displayChange_field_tallas_("all", "on");
	displayChange_field_sabor_("all", "on");
	displayChange_field_fv_lote_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_inventario_fisico_130521_form" + pageNo).hide();
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
  $("#id_sc_field_fechavenc_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechavenc_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_inventario_fisico_130521_validate_fechavenc_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechavenc_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_inventario_fisico_130521_validate_fecha_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechafab_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechafab_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_inventario_fisico_130521_validate_fechafab_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechafab_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_inventario_fisico_130521')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "fv_lote_" == specificField) {
    scJQSelect2Add_fv_lote_(seqRow);
  }
  if (null == specificField || "idmov_" == specificField) {
    scJQSelect2Add_idmov_(seqRow);
  }
  if (null == specificField || "idfaccom_" == specificField) {
    scJQSelect2Add_idfaccom_(seqRow);
  }
  if (null == specificField || "nufacvta_" == specificField) {
    scJQSelect2Add_nufacvta_(seqRow);
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

function scJQSelect2Add_fv_lote_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_fv_lote__obj" : "#id_sc_field_fv_lote_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_fv_lote__obj',
      dropdownCssClass: 'css_fv_lote__obj',
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

function scJQSelect2Add_idmov_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idmov__obj" : "#id_sc_field_idmov_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idmov__obj',
      dropdownCssClass: 'css_idmov__obj',
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

function scJQSelect2Add_idfaccom_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idfaccom__obj" : "#id_sc_field_idfaccom_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idfaccom__obj',
      dropdownCssClass: 'css_idfaccom__obj',
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

function scJQSelect2Add_nufacvta_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_nufacvta__obj" : "#id_sc_field_nufacvta_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_nufacvta__obj',
      dropdownCssClass: 'css_nufacvta__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_colores_) { displayChange_field_colores_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas_) { displayChange_field_tallas_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor_) { displayChange_field_sabor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_fv_lote_) { displayChange_field_fv_lote_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idmov_) { displayChange_field_idmov_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idfaccom_) { displayChange_field_idfaccom_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nufacvta_) { displayChange_field_nufacvta_(iLine, "on"); } }, 150);
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

