
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
  scEventControl_data["numero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cedula_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tercero_nom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notificado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prioridad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_caso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asignado_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_asignacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_asignacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_cierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_cierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fac_num" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_caso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cedula_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cedula_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tercero_nom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tercero_nom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notificado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notificado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prioridad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prioridad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_caso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asignado_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asignado_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_asignacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_asignacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_asignacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_asignacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_cierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_cierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_cierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_cierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fac_num" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fac_num" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_caso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_caso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factura" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("estado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prioridad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_caso" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("medio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asignado_tercero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("codigo_cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("estado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("prioridad" + iSeq == fieldName) {
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
  $('#id_sc_field_id_caso' + iSeqRow).bind('blur', function() { sc_form_casos_id_caso_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_casos_id_caso_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_casos_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_hora' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_casos_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero' + iSeqRow).bind('blur', function() { sc_form_casos_numero_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_casos_numero_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_cliente' + iSeqRow).bind('blur', function() { sc_form_casos_codigo_cliente_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_casos_codigo_cliente_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_casos_codigo_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_casos_estado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_casos_estado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_casos_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_prioridad' + iSeqRow).bind('blur', function() { sc_form_casos_prioridad_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_casos_prioridad_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_casos_prioridad_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_caso' + iSeqRow).bind('blur', function() { sc_form_casos_tipo_caso_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_casos_tipo_caso_onfocus(this, iSeqRow) });
  $('#id_sc_field_medio' + iSeqRow).bind('blur', function() { sc_form_casos_medio_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_casos_medio_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_casos_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_casos_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_asignado_tercero' + iSeqRow).bind('blur', function() { sc_form_casos_asignado_tercero_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_casos_asignado_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_asignacion' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_asignacion_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_casos_fecha_asignacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_asignacion_hora' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_asignacion_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_casos_fecha_asignacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_cierre' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_cierre_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_casos_fecha_cierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_cierre_hora' + iSeqRow).bind('blur', function() { sc_form_casos_fecha_cierre_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_casos_fecha_cierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor' + iSeqRow).bind('blur', function() { sc_form_casos_valor_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_casos_valor_onfocus(this, iSeqRow) });
  $('#id_sc_field_cedula_tercero' + iSeqRow).bind('blur', function() { sc_form_casos_cedula_tercero_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_casos_cedula_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_notificado' + iSeqRow).bind('blur', function() { sc_form_casos_notificado_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_casos_notificado_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora' + iSeqRow).bind('blur', function() { sc_form_casos_hora_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_casos_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_asignacion' + iSeqRow).bind('blur', function() { sc_form_casos_hora_asignacion_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_casos_hora_asignacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_cierre' + iSeqRow).bind('blur', function() { sc_form_casos_hora_cierre_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_casos_hora_cierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_factura' + iSeqRow).bind('blur', function() { sc_form_casos_factura_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_casos_factura_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_casos_detalle_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_casos_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_color1' + iSeqRow).bind('blur', function() { sc_form_casos_color1_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_casos_color1_onfocus(this, iSeqRow) });
  $('#id_sc_field_color2' + iSeqRow).bind('blur', function() { sc_form_casos_color2_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_casos_color2_onfocus(this, iSeqRow) });
  $('#id_sc_field_tercero_nom' + iSeqRow).bind('blur', function() { sc_form_casos_tercero_nom_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_casos_tercero_nom_onfocus(this, iSeqRow) });
  $('#id_sc_field_fac_num' + iSeqRow).bind('blur', function() { sc_form_casos_fac_num_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_casos_fac_num_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_casos_id_caso_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_id_caso();
  scCssBlur(oThis);
}

function sc_form_casos_id_caso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_numero_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_numero();
  scCssBlur(oThis);
}

function sc_form_casos_numero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_codigo_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_codigo_cliente();
  scCssBlur(oThis);
}

function sc_form_casos_codigo_cliente_onchange(oThis, iSeqRow) {
  do_ajax_form_casos_mob_event_codigo_cliente_onchange();
}

function sc_form_casos_codigo_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_estado();
  scCssBlur(oThis);
}

function sc_form_casos_estado_onchange(oThis, iSeqRow) {
  do_ajax_form_casos_mob_event_estado_onchange();
}

function sc_form_casos_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_prioridad_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_prioridad();
  scCssBlur(oThis);
}

function sc_form_casos_prioridad_onchange(oThis, iSeqRow) {
  do_ajax_form_casos_mob_event_prioridad_onchange();
}

function sc_form_casos_prioridad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_tipo_caso_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_tipo_caso();
  scCssBlur(oThis);
}

function sc_form_casos_tipo_caso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_medio_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_medio();
  scCssBlur(oThis);
}

function sc_form_casos_medio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_casos_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_asignado_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_asignado_tercero();
  scCssBlur(oThis);
}

function sc_form_casos_asignado_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_asignacion_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha_asignacion();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_asignacion_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha_asignacion();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_asignacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_asignacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha_cierre();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fecha_cierre();
  scCssBlur(oThis);
}

function sc_form_casos_fecha_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fecha_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_valor_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_valor();
  scCssBlur(oThis);
}

function sc_form_casos_valor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_cedula_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_cedula_tercero();
  scCssBlur(oThis);
}

function sc_form_casos_cedula_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_notificado_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_notificado();
  scCssBlur(oThis);
}

function sc_form_casos_notificado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_hora();
  scCssBlur(oThis);
}

function sc_form_casos_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_hora_asignacion_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_hora_asignacion();
  scCssBlur(oThis);
}

function sc_form_casos_hora_asignacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_hora_cierre_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_hora_cierre();
  scCssBlur(oThis);
}

function sc_form_casos_hora_cierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_factura();
  scCssBlur(oThis);
}

function sc_form_casos_factura_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_casos_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_casos_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_color1_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_color1();
  scCssBlur(oThis);
}

function sc_form_casos_color1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_color2_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_color2();
  scCssBlur(oThis);
}

function sc_form_casos_color2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_tercero_nom_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_tercero_nom();
  scCssBlur(oThis);
}

function sc_form_casos_tercero_nom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_casos_fac_num_onblur(oThis, iSeqRow) {
  do_ajax_form_casos_mob_validate_fac_num();
  scCssBlur(oThis);
}

function sc_form_casos_fac_num_onfocus(oThis, iSeqRow) {
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
	displayChange_field("numero", "", status);
	displayChange_field("fecha", "", status);
	displayChange_field("hora", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("codigo_cliente", "", status);
	displayChange_field("cedula_tercero", "", status);
	displayChange_field("tercero_nom", "", status);
	displayChange_field("notificado", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("estado", "", status);
	displayChange_field("color1", "", status);
	displayChange_field("prioridad", "", status);
	displayChange_field("color2", "", status);
	displayChange_field("tipo_caso", "", status);
	displayChange_field("medio", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("observaciones", "", status);
	displayChange_field("asignado_tercero", "", status);
	displayChange_field("valor", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("fecha_asignacion", "", status);
	displayChange_field("hora_asignacion", "", status);
	displayChange_field("fecha_cierre", "", status);
	displayChange_field("hora_cierre", "", status);
	displayChange_field("factura", "", status);
	displayChange_field("fac_num", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("detalle", "", status);
	displayChange_field("id_caso", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_numero(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_hora(row, status);
	displayChange_field_codigo_cliente(row, status);
	displayChange_field_cedula_tercero(row, status);
	displayChange_field_tercero_nom(row, status);
	displayChange_field_notificado(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_color1(row, status);
	displayChange_field_prioridad(row, status);
	displayChange_field_color2(row, status);
	displayChange_field_tipo_caso(row, status);
	displayChange_field_medio(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_asignado_tercero(row, status);
	displayChange_field_valor(row, status);
	displayChange_field_fecha_asignacion(row, status);
	displayChange_field_hora_asignacion(row, status);
	displayChange_field_fecha_cierre(row, status);
	displayChange_field_hora_cierre(row, status);
	displayChange_field_factura(row, status);
	displayChange_field_fac_num(row, status);
	displayChange_field_detalle(row, status);
	displayChange_field_id_caso(row, status);
}

function displayChange_field(field, row, status) {
	if ("numero" == field) {
		displayChange_field_numero(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("hora" == field) {
		displayChange_field_hora(row, status);
	}
	if ("codigo_cliente" == field) {
		displayChange_field_codigo_cliente(row, status);
	}
	if ("cedula_tercero" == field) {
		displayChange_field_cedula_tercero(row, status);
	}
	if ("tercero_nom" == field) {
		displayChange_field_tercero_nom(row, status);
	}
	if ("notificado" == field) {
		displayChange_field_notificado(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("color1" == field) {
		displayChange_field_color1(row, status);
	}
	if ("prioridad" == field) {
		displayChange_field_prioridad(row, status);
	}
	if ("color2" == field) {
		displayChange_field_color2(row, status);
	}
	if ("tipo_caso" == field) {
		displayChange_field_tipo_caso(row, status);
	}
	if ("medio" == field) {
		displayChange_field_medio(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("asignado_tercero" == field) {
		displayChange_field_asignado_tercero(row, status);
	}
	if ("valor" == field) {
		displayChange_field_valor(row, status);
	}
	if ("fecha_asignacion" == field) {
		displayChange_field_fecha_asignacion(row, status);
	}
	if ("hora_asignacion" == field) {
		displayChange_field_hora_asignacion(row, status);
	}
	if ("fecha_cierre" == field) {
		displayChange_field_fecha_cierre(row, status);
	}
	if ("hora_cierre" == field) {
		displayChange_field_hora_cierre(row, status);
	}
	if ("factura" == field) {
		displayChange_field_factura(row, status);
	}
	if ("fac_num" == field) {
		displayChange_field_fac_num(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
	if ("id_caso" == field) {
		displayChange_field_id_caso(row, status);
	}
}

function displayChange_field_numero(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_hora(row, status) {
}

function displayChange_field_codigo_cliente(row, status) {
}

function displayChange_field_cedula_tercero(row, status) {
}

function displayChange_field_tercero_nom(row, status) {
}

function displayChange_field_notificado(row, status) {
}

function displayChange_field_estado(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_estado__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_estado" + row).select2("destroy");
		}
		scJQSelect2Add(row, "estado");
	}
}

function displayChange_field_color1(row, status) {
}

function displayChange_field_prioridad(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_prioridad__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_prioridad" + row).select2("destroy");
		}
		scJQSelect2Add(row, "prioridad");
	}
}

function displayChange_field_color2(row, status) {
}

function displayChange_field_tipo_caso(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_caso__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_caso" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_caso");
	}
}

function displayChange_field_medio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_medio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_medio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "medio");
	}
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_asignado_tercero(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_asignado_tercero__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_asignado_tercero" + row).select2("destroy");
		}
		scJQSelect2Add(row, "asignado_tercero");
	}
}

function displayChange_field_valor(row, status) {
}

function displayChange_field_fecha_asignacion(row, status) {
}

function displayChange_field_hora_asignacion(row, status) {
}

function displayChange_field_fecha_cierre(row, status) {
}

function displayChange_field_hora_cierre(row, status) {
}

function displayChange_field_factura(row, status) {
}

function displayChange_field_fac_num(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_casos_novedades")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_casos_novedades")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_id_caso(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_estado("all", "on");
	displayChange_field_prioridad("all", "on");
	displayChange_field_tipo_caso("all", "on");
	displayChange_field_medio("all", "on");
	displayChange_field_asignado_tercero("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_casos_mob_form" + pageNo).hide();
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
  $("#id_sc_field_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_casos_mob_validate_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_asignacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_asignacion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_asignacion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_asignacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_casos_mob_validate_fecha_asignacion(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_asignacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_cierre" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_cierre" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_cierre']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_cierre']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_casos_mob_validate_fecha_cierre(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_cierre']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_hora" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora" + iSeqRow] != dateText) {
        $("#id_sc_field_hora" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_asignacion" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_asignacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_asignacion" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_asignacion" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_hora_cierre" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_hora_cierre" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_hora_cierre" + iSeqRow] != dateText) {
        $("#id_sc_field_hora_cierre" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_casos_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "estado" == specificField) {
    scJQSelect2Add_estado(seqRow);
  }
  if (null == specificField || "prioridad" == specificField) {
    scJQSelect2Add_prioridad(seqRow);
  }
  if (null == specificField || "tipo_caso" == specificField) {
    scJQSelect2Add_tipo_caso(seqRow);
  }
  if (null == specificField || "medio" == specificField) {
    scJQSelect2Add_medio(seqRow);
  }
  if (null == specificField || "asignado_tercero" == specificField) {
    scJQSelect2Add_asignado_tercero(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_estado(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_estado_obj" : "#id_sc_field_estado" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_estado_obj',
      dropdownCssClass: 'css_estado_obj',
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

function scJQSelect2Add_prioridad(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_prioridad_obj" : "#id_sc_field_prioridad" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_prioridad_obj',
      dropdownCssClass: 'css_prioridad_obj',
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

function scJQSelect2Add_tipo_caso(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_caso_obj" : "#id_sc_field_tipo_caso" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_caso_obj',
      dropdownCssClass: 'css_tipo_caso_obj',
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

function scJQSelect2Add_medio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_medio_obj" : "#id_sc_field_medio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_medio_obj',
      dropdownCssClass: 'css_medio_obj',
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

function scJQSelect2Add_asignado_tercero(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_asignado_tercero_obj" : "#id_sc_field_asignado_tercero" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_asignado_tercero_obj',
      dropdownCssClass: 'css_asignado_tercero_obj',
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
  scJQTimePickerAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_estado) { displayChange_field_estado(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_prioridad) { displayChange_field_prioridad(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_caso) { displayChange_field_tipo_caso(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_medio) { displayChange_field_medio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_asignado_tercero) { displayChange_field_asignado_tercero(iLine, "on"); } }, 150);
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

