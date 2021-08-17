
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
  scEventControl_data["tipo_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["imagenter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tel_cel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["urlmail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["representante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sexo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["departamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idmuni" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_restaurante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["loatiende" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tel_cel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tel_cel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["urlmail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["urlmail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["representante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["representante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sexo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sexo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["departamento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["departamento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmuni" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmuni" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["loatiende" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["loatiende" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sexo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("departamento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmuni" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("loatiende" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("listaprecios" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("efec_retencion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("empleado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("proveedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("creditoprov" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("autoretenedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sucur_cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("apellido1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("apellido2" + iSeq == fieldName) {
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
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("creditoprov" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombre1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombre2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("proveedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sucur_cliente" + iSeq == fieldName) {
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
  $('#id_sc_field_documento' + iSeqRow).bind('blur', function() { sc_terceros_cliente_documento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_cliente_documento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombres' + iSeqRow).bind('blur', function() { sc_terceros_cliente_nombres_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_nombres_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_terceros_cliente_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tel_cel' + iSeqRow).bind('blur', function() { sc_terceros_cliente_tel_cel_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_tel_cel_onfocus(this, iSeqRow) });
  $('#id_sc_field_sexo' + iSeqRow).bind('blur', function() { sc_terceros_cliente_sexo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_cliente_sexo_onfocus(this, iSeqRow) });
  $('#id_sc_field_urlmail' + iSeqRow).bind('blur', function() { sc_terceros_cliente_urlmail_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_urlmail_onfocus(this, iSeqRow) });
  $('#id_sc_field_idmuni' + iSeqRow).bind('blur', function() { sc_terceros_cliente_idmuni_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_terceros_cliente_idmuni_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_terceros_cliente_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_cliente_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_credito' + iSeqRow).bind('blur', function() { sc_terceros_cliente_credito_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cliente_credito_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo' + iSeqRow).bind('blur', function() { sc_terceros_cliente_cupo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_cliente_cupo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_cliente_cupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_loatiende' + iSeqRow).bind('blur', function() { sc_terceros_cliente_loatiende_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_loatiende_onfocus(this, iSeqRow) });
  $('#id_sc_field_regimen' + iSeqRow).bind('blur', function() { sc_terceros_cliente_regimen_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_regimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_terceros_cliente_tipo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_cliente_tipo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_cliente_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_terceros_cliente_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cliente_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento' + iSeqRow).bind('blur', function() { sc_terceros_cliente_tipo_documento_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_cliente_tipo_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_dv' + iSeqRow).bind('blur', function() { sc_terceros_cliente_dv_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_terceros_cliente_dv_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre1' + iSeqRow).bind('blur', function() { sc_terceros_cliente_nombre1_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cliente_nombre1_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_nombre1_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre2' + iSeqRow).bind('blur', function() { sc_terceros_cliente_nombre2_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cliente_nombre2_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_nombre2_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido1' + iSeqRow).bind('blur', function() { sc_terceros_cliente_apellido1_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_cliente_apellido1_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_apellido1_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido2' + iSeqRow).bind('blur', function() { sc_terceros_cliente_apellido2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_cliente_apellido2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_apellido2_onfocus(this, iSeqRow) });
  $('#id_sc_field_representante' + iSeqRow).bind('blur', function() { sc_terceros_cliente_representante_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_cliente_representante_onfocus(this, iSeqRow) });
  $('#id_sc_field_imagenter' + iSeqRow).bind('blur', function() { sc_terceros_cliente_imagenter_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_cliente_imagenter_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_restaurante' + iSeqRow).bind('blur', function() { sc_terceros_cliente_es_restaurante_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_cliente_es_restaurante_onfocus(this, iSeqRow) });
  $('#id_sc_field_departamento' + iSeqRow).bind('blur', function() { sc_terceros_cliente_departamento_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_terceros_cliente_departamento_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_terceros_cliente_departamento_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-es_restaurante' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_terceros_cliente_documento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_documento();
  scCssBlur(oThis);
}

function sc_terceros_cliente_documento_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_documento_onchange();
}

function sc_terceros_cliente_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_nombres_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_nombres();
  scCssBlur(oThis);
}

function sc_terceros_cliente_nombres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_terceros_cliente_mob_event_nombres_onfocus();
}

function sc_terceros_cliente_direccion_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_direccion();
  scCssBlur(oThis);
}

function sc_terceros_cliente_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_tel_cel_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_tel_cel();
  scCssBlur(oThis);
}

function sc_terceros_cliente_tel_cel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_sexo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_sexo();
  scCssBlur(oThis);
}

function sc_terceros_cliente_sexo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_urlmail_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_urlmail();
  scCssBlur(oThis);
}

function sc_terceros_cliente_urlmail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_idmuni_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_idmuni();
  scCssBlur(oThis);
}

function sc_terceros_cliente_idmuni_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_terceros_cliente_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_credito_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_credito();
  scCssBlur(oThis);
}

function sc_terceros_cliente_credito_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_credito_onchange();
}

function sc_terceros_cliente_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_cupo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_cupo();
  scCssBlur(oThis);
}

function sc_terceros_cliente_cupo_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_cupo_onchange();
}

function sc_terceros_cliente_cupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_loatiende_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_loatiende();
  scCssBlur(oThis);
}

function sc_terceros_cliente_loatiende_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_regimen_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_regimen();
  scCssBlur(oThis);
}

function sc_terceros_cliente_regimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_tipo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_tipo();
  scCssBlur(oThis);
}

function sc_terceros_cliente_tipo_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_tipo_onchange();
}

function sc_terceros_cliente_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_cliente_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_cliente();
  scCssBlur(oThis);
}

function sc_terceros_cliente_cliente_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_cliente_onchange();
}

function sc_terceros_cliente_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_tipo_documento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_tipo_documento();
  scCssBlur(oThis);
}

function sc_terceros_cliente_tipo_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_dv_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_dv();
  scCssBlur(oThis);
}

function sc_terceros_cliente_dv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_nombre1_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_nombre1();
  scCssBlur(oThis);
}

function sc_terceros_cliente_nombre1_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_nombre1_onchange();
}

function sc_terceros_cliente_nombre1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_nombre2_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_nombre2();
  scCssBlur(oThis);
}

function sc_terceros_cliente_nombre2_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_nombre2_onchange();
}

function sc_terceros_cliente_nombre2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_apellido1_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_apellido1();
  scCssBlur(oThis);
}

function sc_terceros_cliente_apellido1_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_apellido1_onchange();
}

function sc_terceros_cliente_apellido1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_apellido2_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_apellido2();
  scCssBlur(oThis);
}

function sc_terceros_cliente_apellido2_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_event_apellido2_onchange();
}

function sc_terceros_cliente_apellido2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_representante_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_representante();
  scCssBlur(oThis);
}

function sc_terceros_cliente_representante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_imagenter_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_terceros_cliente_imagenter_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_cliente_es_restaurante_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_es_restaurante();
  scCssBlur(oThis);
}

function sc_terceros_cliente_es_restaurante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_departamento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_validate_departamento();
  scCssBlur(oThis);
}

function sc_terceros_cliente_departamento_onchange(oThis, iSeqRow) {
  do_ajax_terceros_cliente_mob_refresh_departamento();
}

function sc_terceros_cliente_departamento_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("tipo_documento", "", status);
	displayChange_field("documento", "", status);
	displayChange_field("dv", "", status);
	displayChange_field("imagenter", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nombre1", "", status);
	displayChange_field("nombre2", "", status);
	displayChange_field("apellido1", "", status);
	displayChange_field("apellido2", "", status);
	displayChange_field("tel_cel", "", status);
	displayChange_field("urlmail", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("nombres", "", status);
	displayChange_field("representante", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sexo", "", status);
	displayChange_field("tipo", "", status);
	displayChange_field("regimen", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("direccion", "", status);
	displayChange_field("departamento", "", status);
	displayChange_field("idmuni", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("cliente", "", status);
	displayChange_field("es_restaurante", "", status);
	displayChange_field("credito", "", status);
	displayChange_field("cupo", "", status);
	displayChange_field("loatiende", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tipo_documento(row, status);
	displayChange_field_documento(row, status);
	displayChange_field_dv(row, status);
	displayChange_field_imagenter(row, status);
	displayChange_field_nombre1(row, status);
	displayChange_field_nombre2(row, status);
	displayChange_field_apellido1(row, status);
	displayChange_field_apellido2(row, status);
	displayChange_field_tel_cel(row, status);
	displayChange_field_urlmail(row, status);
	displayChange_field_nombres(row, status);
	displayChange_field_representante(row, status);
	displayChange_field_sexo(row, status);
	displayChange_field_tipo(row, status);
	displayChange_field_regimen(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_departamento(row, status);
	displayChange_field_idmuni(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_es_restaurante(row, status);
	displayChange_field_credito(row, status);
	displayChange_field_cupo(row, status);
	displayChange_field_loatiende(row, status);
}

function displayChange_field(field, row, status) {
	if ("tipo_documento" == field) {
		displayChange_field_tipo_documento(row, status);
	}
	if ("documento" == field) {
		displayChange_field_documento(row, status);
	}
	if ("dv" == field) {
		displayChange_field_dv(row, status);
	}
	if ("imagenter" == field) {
		displayChange_field_imagenter(row, status);
	}
	if ("nombre1" == field) {
		displayChange_field_nombre1(row, status);
	}
	if ("nombre2" == field) {
		displayChange_field_nombre2(row, status);
	}
	if ("apellido1" == field) {
		displayChange_field_apellido1(row, status);
	}
	if ("apellido2" == field) {
		displayChange_field_apellido2(row, status);
	}
	if ("tel_cel" == field) {
		displayChange_field_tel_cel(row, status);
	}
	if ("urlmail" == field) {
		displayChange_field_urlmail(row, status);
	}
	if ("nombres" == field) {
		displayChange_field_nombres(row, status);
	}
	if ("representante" == field) {
		displayChange_field_representante(row, status);
	}
	if ("sexo" == field) {
		displayChange_field_sexo(row, status);
	}
	if ("tipo" == field) {
		displayChange_field_tipo(row, status);
	}
	if ("regimen" == field) {
		displayChange_field_regimen(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("departamento" == field) {
		displayChange_field_departamento(row, status);
	}
	if ("idmuni" == field) {
		displayChange_field_idmuni(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("es_restaurante" == field) {
		displayChange_field_es_restaurante(row, status);
	}
	if ("credito" == field) {
		displayChange_field_credito(row, status);
	}
	if ("cupo" == field) {
		displayChange_field_cupo(row, status);
	}
	if ("loatiende" == field) {
		displayChange_field_loatiende(row, status);
	}
}

function displayChange_field_tipo_documento(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_documento__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_documento" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_documento");
	}
}

function displayChange_field_documento(row, status) {
}

function displayChange_field_dv(row, status) {
}

function displayChange_field_imagenter(row, status) {
}

function displayChange_field_nombre1(row, status) {
}

function displayChange_field_nombre2(row, status) {
}

function displayChange_field_apellido1(row, status) {
}

function displayChange_field_apellido2(row, status) {
}

function displayChange_field_tel_cel(row, status) {
}

function displayChange_field_urlmail(row, status) {
}

function displayChange_field_nombres(row, status) {
}

function displayChange_field_representante(row, status) {
}

function displayChange_field_sexo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sexo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sexo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sexo");
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

function displayChange_field_regimen(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_regimen__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_regimen" + row).select2("destroy");
		}
		scJQSelect2Add(row, "regimen");
	}
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_departamento(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_departamento__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_departamento" + row).select2("destroy");
		}
		scJQSelect2Add(row, "departamento");
	}
}

function displayChange_field_idmuni(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idmuni__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idmuni" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idmuni");
	}
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_cliente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_cliente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_cliente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "cliente");
	}
}

function displayChange_field_es_restaurante(row, status) {
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

function displayChange_field_cupo(row, status) {
}

function displayChange_field_loatiende(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_loatiende__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_loatiende" + row).select2("destroy");
		}
		scJQSelect2Add(row, "loatiende");
	}
}

function scRecreateSelect2() {
	displayChange_field_tipo_documento("all", "on");
	displayChange_field_sexo("all", "on");
	displayChange_field_tipo("all", "on");
	displayChange_field_regimen("all", "on");
	displayChange_field_departamento("all", "on");
	displayChange_field_idmuni("all", "on");
	displayChange_field_cliente("all", "on");
	displayChange_field_credito("all", "on");
	displayChange_field_loatiende("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_terceros_cliente_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_nacimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_nacimiento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_cliente_mob_validate_nacimiento(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-49:c+49',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['nacimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechault" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechault" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_cliente_mob_validate_fechault(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechault']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_afiliacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_afiliacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_cliente_mob_validate_afiliacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['afiliacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_con_actual" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_con_actual" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['con_actual']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_terceros_cliente_mob_validate_con_actual(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQLinkReadonlyAdd(iSeqRow) {
  $(".sc-ui-readonly-url" + iSeqRow).click(function() {
    var linkUrl = $(this).html();
    window.open(linkUrl, "_blank");
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", ""); });
} // scJQLinkReadonlyAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_imagenter" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_cliente_mob_ul_save.php",
    dropZone: $("#hidden_field_data_imagenter" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenter'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenter" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenter" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenter" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter(data);
      if ('ok' != checkUploadSize) {
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_imagenter" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenter" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_imagenter" + iSeqRow).val("");
      $("#id_sc_field_imagenter_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenter_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imagenter = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenter) ? "none" : "";
      $("#id_ajax_img_imagenter" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenter" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenter) {
        document.F1.temp_out_imagenter.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenter.value = var_ajax_img_imagenter;
      }
      else if (document.F1.temp_out_imagenter) {
        document.F1.temp_out_imagenter.value = var_ajax_img_imagenter;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenter" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenter" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenter" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenter" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'terceros_cliente_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo_documento" == specificField) {
    scJQSelect2Add_tipo_documento(seqRow);
  }
  if (null == specificField || "sexo" == specificField) {
    scJQSelect2Add_sexo(seqRow);
  }
  if (null == specificField || "tipo" == specificField) {
    scJQSelect2Add_tipo(seqRow);
  }
  if (null == specificField || "regimen" == specificField) {
    scJQSelect2Add_regimen(seqRow);
  }
  if (null == specificField || "departamento" == specificField) {
    scJQSelect2Add_departamento(seqRow);
  }
  if (null == specificField || "idmuni" == specificField) {
    scJQSelect2Add_idmuni(seqRow);
  }
  if (null == specificField || "cliente" == specificField) {
    scJQSelect2Add_cliente(seqRow);
  }
  if (null == specificField || "credito" == specificField) {
    scJQSelect2Add_credito(seqRow);
  }
  if (null == specificField || "loatiende" == specificField) {
    scJQSelect2Add_loatiende(seqRow);
  }
  if (null == specificField || "listaprecios" == specificField) {
    scJQSelect2Add_listaprecios(seqRow);
  }
  if (null == specificField || "efec_retencion" == specificField) {
    scJQSelect2Add_efec_retencion(seqRow);
  }
  if (null == specificField || "empleado" == specificField) {
    scJQSelect2Add_empleado(seqRow);
  }
  if (null == specificField || "proveedor" == specificField) {
    scJQSelect2Add_proveedor(seqRow);
  }
  if (null == specificField || "creditoprov" == specificField) {
    scJQSelect2Add_creditoprov(seqRow);
  }
  if (null == specificField || "autoretenedor" == specificField) {
    scJQSelect2Add_autoretenedor(seqRow);
  }
  if (null == specificField || "sucur_cliente" == specificField) {
    scJQSelect2Add_sucur_cliente(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo_documento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_documento_obj" : "#id_sc_field_tipo_documento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_documento_obj',
      dropdownCssClass: 'css_tipo_documento_obj',
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

function scJQSelect2Add_sexo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sexo_obj" : "#id_sc_field_sexo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sexo_obj',
      dropdownCssClass: 'css_sexo_obj',
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

function scJQSelect2Add_regimen(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_regimen_obj" : "#id_sc_field_regimen" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_regimen_obj',
      dropdownCssClass: 'css_regimen_obj',
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

function scJQSelect2Add_departamento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_departamento_obj" : "#id_sc_field_departamento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_departamento_obj',
      dropdownCssClass: 'css_departamento_obj',
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

function scJQSelect2Add_idmuni(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idmuni_obj" : "#id_sc_field_idmuni" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idmuni_obj',
      dropdownCssClass: 'css_idmuni_obj',
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

function scJQSelect2Add_cliente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_cliente_obj" : "#id_sc_field_cliente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_cliente_obj',
      dropdownCssClass: 'css_cliente_obj',
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

function scJQSelect2Add_loatiende(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_loatiende_obj" : "#id_sc_field_loatiende" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_loatiende_obj',
      dropdownCssClass: 'css_loatiende_obj',
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

function scJQSelect2Add_listaprecios(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_listaprecios_obj" : "#id_sc_field_listaprecios" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_listaprecios_obj',
      dropdownCssClass: 'css_listaprecios_obj',
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

function scJQSelect2Add_efec_retencion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_efec_retencion_obj" : "#id_sc_field_efec_retencion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_efec_retencion_obj',
      dropdownCssClass: 'css_efec_retencion_obj',
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

function scJQSelect2Add_empleado(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_empleado_obj" : "#id_sc_field_empleado" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_empleado_obj',
      dropdownCssClass: 'css_empleado_obj',
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

function scJQSelect2Add_proveedor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_proveedor_obj" : "#id_sc_field_proveedor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_proveedor_obj',
      dropdownCssClass: 'css_proveedor_obj',
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

function scJQSelect2Add_creditoprov(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_creditoprov_obj" : "#id_sc_field_creditoprov" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_creditoprov_obj',
      dropdownCssClass: 'css_creditoprov_obj',
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

function scJQSelect2Add_autoretenedor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_autoretenedor_obj" : "#id_sc_field_autoretenedor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_autoretenedor_obj',
      dropdownCssClass: 'css_autoretenedor_obj',
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

function scJQSelect2Add_sucur_cliente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sucur_cliente_obj" : "#id_sc_field_sucur_cliente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sucur_cliente_obj',
      dropdownCssClass: 'css_sucur_cliente_obj',
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
  scJQLinkReadonlyAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento) { displayChange_field_tipo_documento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sexo) { displayChange_field_sexo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo) { displayChange_field_tipo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_regimen) { displayChange_field_regimen(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_departamento) { displayChange_field_departamento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idmuni) { displayChange_field_idmuni(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_cliente) { displayChange_field_cliente(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_credito) { displayChange_field_credito(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_loatiende) { displayChange_field_loatiende(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_listaprecios) { displayChange_field_listaprecios(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_efec_retencion) { displayChange_field_efec_retencion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_empleado) { displayChange_field_empleado(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_proveedor) { displayChange_field_proveedor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_creditoprov) { displayChange_field_creditoprov(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_autoretenedor) { displayChange_field_autoretenedor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sucur_cliente) { displayChange_field_sucur_cliente(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_imagenter(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpg", "jpeg", "gif", "png"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
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
