
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
  scEventControl_data["numero_contrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_contrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_inicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["motivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_corte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zona" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["barrio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mensualidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precinto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_ultimopago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_limitepago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldoanterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpagado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldoactual" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_ultimafactura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mesultimafactura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_cli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_crea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_edita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_ter_cont" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_contrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grid_casos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numero_contrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_contrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_contrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_contrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["motivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["motivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_corte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_corte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["barrio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["barrio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mensualidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mensualidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precinto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precinto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_ultimopago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_ultimopago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_limitepago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_limitepago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldoanterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldoanterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpagado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpagado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldoactual" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldoactual" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_ultimafactura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_ultimafactura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mesultimafactura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mesultimafactura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_factura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_cli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_cli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_crea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_crea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_edita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_edita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_ter_cont" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_ter_cont" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_contrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_contrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grid_casos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grid_casos" + iSeqRow]["change"]) {
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
  if ("activo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("estado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("estrato" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("motivo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("zona" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("barrio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mesultimafactura" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("zona" + iSeq == fieldName) {
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
  $('#id_sc_field_id_ter_cont' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_id_ter_cont_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_terceros_contratos_id_ter_cont_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_contrato' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_numero_contrato_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_terceros_contratos_numero_contrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_terceros_contratos_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_terceros_contratos_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_contrato' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_contrato_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_terceros_contratos_fecha_contrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_inicio' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_inicio_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_terceros_contratos_fecha_inicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_corte' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_corte_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_terceros_contratos_fecha_corte_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_crea' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_usuario_crea_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_terceros_contratos_usuario_crea_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_edita' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_usuario_edita_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_terceros_contratos_usuario_edita_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_estado_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_terceros_contratos_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_terceros_contratos_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_zona' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_zona_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_terceros_contratos_zona_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_terceros_contratos_zona_onfocus(this, iSeqRow) });
  $('#id_sc_field_barrio' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_barrio_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_terceros_contratos_barrio_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_terceros_contratos_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_terceros_contratos_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_motivo' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_motivo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_terceros_contratos_motivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_limitepago' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_limitepago_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_terceros_contratos_fecha_limitepago_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_ultimopago' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_ultimopago_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_terceros_contratos_fecha_ultimopago_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpagado' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_valorpagado_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_terceros_contratos_valorpagado_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoanterior' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_saldoanterior_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_terceros_contratos_saldoanterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoactual' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_saldoactual_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_terceros_contratos_saldoactual_onfocus(this, iSeqRow) });
  $('#id_sc_field_mesultimafactura' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_mesultimafactura_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_terceros_contratos_mesultimafactura_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_terceros_contratos_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_ultimafactura' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_valor_ultimafactura_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_terceros_contratos_valor_ultimafactura_onfocus(this, iSeqRow) });
  $('#id_sc_field_mensualidad' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_mensualidad_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_terceros_contratos_mensualidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_precinto' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_precinto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_terceros_contratos_precinto_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_correo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_terceros_contratos_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_factura' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_fecha_factura_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_terceros_contratos_fecha_factura_onfocus(this, iSeqRow) });
  $('#id_sc_field_estrato' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_estrato_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_terceros_contratos_estrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_cli' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_codigo_cli_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_terceros_contratos_codigo_cli_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_contrato' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_detalle_contrato_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_terceros_contratos_detalle_contrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_grid_casos' + iSeqRow).bind('blur', function() { sc_form_terceros_contratos_grid_casos_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_terceros_contratos_grid_casos_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_terceros_contratos_id_ter_cont_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_id_ter_cont();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_id_ter_cont_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_numero_contrato_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_numero_contrato();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_numero_contrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_cliente_onchange(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_event_cliente_onchange();
}

function sc_form_terceros_contratos_cliente_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_contrato_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_contrato();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_contrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_inicio_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_inicio();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_inicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_corte_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_corte();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_corte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_usuario_crea_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_usuario_crea();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_usuario_crea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_usuario_edita_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_usuario_edita();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_usuario_edita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_estado();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_activo();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_zona_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_zona();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_zona_onchange(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_event_zona_onchange();
}

function sc_form_terceros_contratos_zona_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_barrio_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_barrio();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_barrio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_motivo_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_motivo();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_motivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_limitepago_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_limitepago();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_limitepago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_ultimopago_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_ultimopago();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_ultimopago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_valorpagado_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_valorpagado();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_valorpagado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_saldoanterior_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_saldoanterior();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_saldoanterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_saldoactual_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_saldoactual();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_saldoactual_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_mesultimafactura_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_mesultimafactura();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_mesultimafactura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_valor_ultimafactura_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_valor_ultimafactura();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_valor_ultimafactura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_mensualidad_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_mensualidad();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_mensualidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_precinto_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_precinto();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_precinto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_correo();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_fecha_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_fecha_factura();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_fecha_factura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_estrato_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_estrato();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_estrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_codigo_cli_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_codigo_cli();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_codigo_cli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_detalle_contrato_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_detalle_contrato();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_detalle_contrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_terceros_contratos_grid_casos_onblur(oThis, iSeqRow) {
  do_ajax_form_terceros_contratos_mob_validate_grid_casos();
  scCssBlur(oThis);
}

function sc_form_terceros_contratos_grid_casos_onfocus(oThis, iSeqRow) {
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
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("numero_contrato", "", status);
	displayChange_field("fecha_contrato", "", status);
	displayChange_field("fecha_inicio", "", status);
	displayChange_field("activo", "", status);
	displayChange_field("estado", "", status);
	displayChange_field("estrato", "", status);
	displayChange_field("motivo", "", status);
	displayChange_field("fecha_corte", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("cliente", "", status);
	displayChange_field("telefono", "", status);
	displayChange_field("zona", "", status);
	displayChange_field("barrio", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("mensualidad", "", status);
	displayChange_field("precinto", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("direccion", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("fecha_ultimopago", "", status);
	displayChange_field("fecha_limitepago", "", status);
	displayChange_field("saldoanterior", "", status);
	displayChange_field("valorpagado", "", status);
	displayChange_field("saldoactual", "", status);
	displayChange_field("valor_ultimafactura", "", status);
	displayChange_field("mesultimafactura", "", status);
	displayChange_field("fecha_factura", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("codigo_cli", "", status);
	displayChange_field("observaciones", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("usuario_crea", "", status);
	displayChange_field("usuario_edita", "", status);
	displayChange_field("id_ter_cont", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("detalle_contrato", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("grid_casos", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_numero_contrato(row, status);
	displayChange_field_fecha_contrato(row, status);
	displayChange_field_fecha_inicio(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_estrato(row, status);
	displayChange_field_motivo(row, status);
	displayChange_field_fecha_corte(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_telefono(row, status);
	displayChange_field_zona(row, status);
	displayChange_field_barrio(row, status);
	displayChange_field_mensualidad(row, status);
	displayChange_field_precinto(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_fecha_ultimopago(row, status);
	displayChange_field_fecha_limitepago(row, status);
	displayChange_field_saldoanterior(row, status);
	displayChange_field_valorpagado(row, status);
	displayChange_field_saldoactual(row, status);
	displayChange_field_valor_ultimafactura(row, status);
	displayChange_field_mesultimafactura(row, status);
	displayChange_field_fecha_factura(row, status);
	displayChange_field_codigo_cli(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_usuario_crea(row, status);
	displayChange_field_usuario_edita(row, status);
	displayChange_field_id_ter_cont(row, status);
	displayChange_field_detalle_contrato(row, status);
	displayChange_field_grid_casos(row, status);
}

function displayChange_field(field, row, status) {
	if ("numero_contrato" == field) {
		displayChange_field_numero_contrato(row, status);
	}
	if ("fecha_contrato" == field) {
		displayChange_field_fecha_contrato(row, status);
	}
	if ("fecha_inicio" == field) {
		displayChange_field_fecha_inicio(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("estrato" == field) {
		displayChange_field_estrato(row, status);
	}
	if ("motivo" == field) {
		displayChange_field_motivo(row, status);
	}
	if ("fecha_corte" == field) {
		displayChange_field_fecha_corte(row, status);
	}
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("telefono" == field) {
		displayChange_field_telefono(row, status);
	}
	if ("zona" == field) {
		displayChange_field_zona(row, status);
	}
	if ("barrio" == field) {
		displayChange_field_barrio(row, status);
	}
	if ("mensualidad" == field) {
		displayChange_field_mensualidad(row, status);
	}
	if ("precinto" == field) {
		displayChange_field_precinto(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("fecha_ultimopago" == field) {
		displayChange_field_fecha_ultimopago(row, status);
	}
	if ("fecha_limitepago" == field) {
		displayChange_field_fecha_limitepago(row, status);
	}
	if ("saldoanterior" == field) {
		displayChange_field_saldoanterior(row, status);
	}
	if ("valorpagado" == field) {
		displayChange_field_valorpagado(row, status);
	}
	if ("saldoactual" == field) {
		displayChange_field_saldoactual(row, status);
	}
	if ("valor_ultimafactura" == field) {
		displayChange_field_valor_ultimafactura(row, status);
	}
	if ("mesultimafactura" == field) {
		displayChange_field_mesultimafactura(row, status);
	}
	if ("fecha_factura" == field) {
		displayChange_field_fecha_factura(row, status);
	}
	if ("codigo_cli" == field) {
		displayChange_field_codigo_cli(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("usuario_crea" == field) {
		displayChange_field_usuario_crea(row, status);
	}
	if ("usuario_edita" == field) {
		displayChange_field_usuario_edita(row, status);
	}
	if ("id_ter_cont" == field) {
		displayChange_field_id_ter_cont(row, status);
	}
	if ("detalle_contrato" == field) {
		displayChange_field_detalle_contrato(row, status);
	}
	if ("grid_casos" == field) {
		displayChange_field_grid_casos(row, status);
	}
}

function displayChange_field_numero_contrato(row, status) {
}

function displayChange_field_fecha_contrato(row, status) {
}

function displayChange_field_fecha_inicio(row, status) {
}

function displayChange_field_activo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_activo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_activo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "activo");
	}
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

function displayChange_field_estrato(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_estrato__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_estrato" + row).select2("destroy");
		}
		scJQSelect2Add(row, "estrato");
	}
}

function displayChange_field_motivo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_motivo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_motivo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "motivo");
	}
}

function displayChange_field_fecha_corte(row, status) {
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_telefono(row, status) {
}

function displayChange_field_zona(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_zona__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_zona" + row).select2("destroy");
		}
		scJQSelect2Add(row, "zona");
	}
}

function displayChange_field_barrio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_barrio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_barrio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "barrio");
	}
}

function displayChange_field_mensualidad(row, status) {
}

function displayChange_field_precinto(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_fecha_ultimopago(row, status) {
}

function displayChange_field_fecha_limitepago(row, status) {
}

function displayChange_field_saldoanterior(row, status) {
}

function displayChange_field_valorpagado(row, status) {
}

function displayChange_field_saldoactual(row, status) {
}

function displayChange_field_valor_ultimafactura(row, status) {
}

function displayChange_field_mesultimafactura(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_mesultimafactura__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_mesultimafactura" + row).select2("destroy");
		}
		scJQSelect2Add(row, "mesultimafactura");
	}
}

function displayChange_field_fecha_factura(row, status) {
}

function displayChange_field_codigo_cli(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_usuario_crea(row, status) {
}

function displayChange_field_usuario_edita(row, status) {
}

function displayChange_field_id_ter_cont(row, status) {
}

function displayChange_field_detalle_contrato(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_terceros_contratos_detalle_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_terceros_contratos_detalle_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_grid_casos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_casos_vistacontrato")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_casos_vistacontrato")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_activo("all", "on");
	displayChange_field_estado("all", "on");
	displayChange_field_estrato("all", "on");
	displayChange_field_motivo("all", "on");
	displayChange_field_zona("all", "on");
	displayChange_field_barrio("all", "on");
	displayChange_field_mesultimafactura("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_terceros_contratos_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(35);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_contrato" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_contrato" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_terceros_contratos_mob_validate_fecha_contrato(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_contrato']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_inicio" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_inicio" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_terceros_contratos_mob_validate_fecha_inicio(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_inicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
      do_ajax_form_terceros_contratos_mob_validate_creado(iSeqRow);
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
      do_ajax_form_terceros_contratos_mob_validate_editado(iSeqRow);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_terceros_contratos_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "activo" == specificField) {
    scJQSelect2Add_activo(seqRow);
  }
  if (null == specificField || "estado" == specificField) {
    scJQSelect2Add_estado(seqRow);
  }
  if (null == specificField || "estrato" == specificField) {
    scJQSelect2Add_estrato(seqRow);
  }
  if (null == specificField || "motivo" == specificField) {
    scJQSelect2Add_motivo(seqRow);
  }
  if (null == specificField || "zona" == specificField) {
    scJQSelect2Add_zona(seqRow);
  }
  if (null == specificField || "barrio" == specificField) {
    scJQSelect2Add_barrio(seqRow);
  }
  if (null == specificField || "mesultimafactura" == specificField) {
    scJQSelect2Add_mesultimafactura(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_activo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_activo_obj" : "#id_sc_field_activo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_activo_obj',
      dropdownCssClass: 'css_activo_obj',
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

function scJQSelect2Add_estrato(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_estrato_obj" : "#id_sc_field_estrato" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_estrato_obj',
      dropdownCssClass: 'css_estrato_obj',
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

function scJQSelect2Add_motivo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_motivo_obj" : "#id_sc_field_motivo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_motivo_obj',
      dropdownCssClass: 'css_motivo_obj',
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

function scJQSelect2Add_zona(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_zona_obj" : "#id_sc_field_zona" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_zona_obj',
      dropdownCssClass: 'css_zona_obj',
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

function scJQSelect2Add_barrio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_barrio_obj" : "#id_sc_field_barrio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_barrio_obj',
      dropdownCssClass: 'css_barrio_obj',
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

function scJQSelect2Add_mesultimafactura(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_mesultimafactura_obj" : "#id_sc_field_mesultimafactura" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_mesultimafactura_obj',
      dropdownCssClass: 'css_mesultimafactura_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_activo) { displayChange_field_activo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_estado) { displayChange_field_estado(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_estrato) { displayChange_field_estrato(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_motivo) { displayChange_field_motivo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_zona) { displayChange_field_zona(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_barrio) { displayChange_field_barrio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_mesultimafactura) { displayChange_field_mesultimafactura(iLine, "on"); } }, 150);
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
