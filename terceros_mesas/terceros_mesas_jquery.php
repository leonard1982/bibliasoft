
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
  scEventControl_data["tipo_documento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dv_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["imagenter_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombres_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["representante_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sexo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regimen_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["departamento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idmuni_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_restaurante_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo_documento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dv_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dv_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombres_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombres_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["representante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["representante_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sexo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sexo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regimen_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regimen_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["departamento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["departamento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmuni_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmuni_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante_" + iSeqRow]["change"]) {
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
  if ("tipo_documento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sexo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("regimen_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("departamento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmuni_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cliente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("credito_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("listaprecios_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("loatiende_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("efec_retencion_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("empleado_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("proveedor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("creditoprov_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("autoretenedor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sucur_cliente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cliente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("credito_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("creditoprov_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cupo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("documento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("proveedor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sucur_cliente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo_" + iSeq == fieldName) {
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
  $('#id_sc_field_idtercero_' + iSeqRow).bind('change', function() { sc_terceros_mesas_idtercero__onchange(this, iSeqRow) });
  $('#id_sc_field_documento_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_documento__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_mesas_documento__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_mesas_documento__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombres_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_nombres__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_mesas_nombres__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_mesas_nombres__onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_direccion__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_mesas_direccion__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_mesas_direccion__onfocus(this, iSeqRow) });
  $('#id_sc_field_tel_cel_' + iSeqRow).bind('change', function() { sc_terceros_mesas_tel_cel__onchange(this, iSeqRow) });
  $('#id_sc_field_nacimiento_' + iSeqRow).bind('change', function() { sc_terceros_mesas_nacimiento__onchange(this, iSeqRow) });
  $('#id_sc_field_sexo_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_sexo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_terceros_mesas_sexo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_terceros_mesas_sexo__onfocus(this, iSeqRow) });
  $('#id_sc_field_urlmail_' + iSeqRow).bind('change', function() { sc_terceros_mesas_urlmail__onchange(this, iSeqRow) });
  $('#id_sc_field_fechault_' + iSeqRow).bind('change', function() { sc_terceros_mesas_fechault__onchange(this, iSeqRow) });
  $('#id_sc_field_saldo_' + iSeqRow).bind('change', function() { sc_terceros_mesas_saldo__onchange(this, iSeqRow) });
  $('#id_sc_field_afiliacion_' + iSeqRow).bind('change', function() { sc_terceros_mesas_afiliacion__onchange(this, iSeqRow) });
  $('#id_sc_field_idmuni_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_idmuni__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_mesas_idmuni__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_mesas_idmuni__onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_observaciones__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_mesas_observaciones__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_mesas_observaciones__onfocus(this, iSeqRow) });
  $('#id_sc_field_credito_' + iSeqRow).bind('change', function() { sc_terceros_mesas_credito__onchange(this, iSeqRow) });
  $('#id_sc_field_cupo_' + iSeqRow).bind('change', function() { sc_terceros_mesas_cupo__onchange(this, iSeqRow) });
  $('#id_sc_field_listaprecios_' + iSeqRow).bind('change', function() { sc_terceros_mesas_listaprecios__onchange(this, iSeqRow) });
  $('#id_sc_field_loatiende_' + iSeqRow).bind('change', function() { sc_terceros_mesas_loatiende__onchange(this, iSeqRow) });
  $('#id_sc_field_con_actual_' + iSeqRow).bind('change', function() { sc_terceros_mesas_con_actual__onchange(this, iSeqRow) });
  $('#id_sc_field_con_actual__hora' + iSeqRow).bind('change', function() { sc_terceros_mesas_con_actual__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_efec_retencion_' + iSeqRow).bind('change', function() { sc_terceros_mesas_efec_retencion__onchange(this, iSeqRow) });
  $('#id_sc_field_regimen_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_regimen__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_mesas_regimen__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_mesas_regimen__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_tipo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_terceros_mesas_tipo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_terceros_mesas_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_cliente__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_mesas_cliente__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_mesas_cliente__onfocus(this, iSeqRow) });
  $('#id_sc_field_empleado_' + iSeqRow).bind('change', function() { sc_terceros_mesas_empleado__onchange(this, iSeqRow) });
  $('#id_sc_field_proveedor_' + iSeqRow).bind('change', function() { sc_terceros_mesas_proveedor__onchange(this, iSeqRow) });
  $('#id_sc_field_contacto_' + iSeqRow).bind('change', function() { sc_terceros_mesas_contacto__onchange(this, iSeqRow) });
  $('#id_sc_field_telefonos_prov_' + iSeqRow).bind('change', function() { sc_terceros_mesas_telefonos_prov__onchange(this, iSeqRow) });
  $('#id_sc_field_email_' + iSeqRow).bind('change', function() { sc_terceros_mesas_email__onchange(this, iSeqRow) });
  $('#id_sc_field_url_' + iSeqRow).bind('change', function() { sc_terceros_mesas_url__onchange(this, iSeqRow) });
  $('#id_sc_field_creditoprov_' + iSeqRow).bind('change', function() { sc_terceros_mesas_creditoprov__onchange(this, iSeqRow) });
  $('#id_sc_field_dias_' + iSeqRow).bind('change', function() { sc_terceros_mesas_dias__onchange(this, iSeqRow) });
  $('#id_sc_field_fechultcomp_' + iSeqRow).bind('change', function() { sc_terceros_mesas_fechultcomp__onchange(this, iSeqRow) });
  $('#id_sc_field_saldoapagar_' + iSeqRow).bind('change', function() { sc_terceros_mesas_saldoapagar__onchange(this, iSeqRow) });
  $('#id_sc_field_autoretenedor_' + iSeqRow).bind('change', function() { sc_terceros_mesas_autoretenedor__onchange(this, iSeqRow) });
  $('#id_sc_field_tipo_documento_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_tipo_documento__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_terceros_mesas_tipo_documento__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_terceros_mesas_tipo_documento__onfocus(this, iSeqRow) });
  $('#id_sc_field_dv_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_dv__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_terceros_mesas_dv__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_terceros_mesas_dv__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre1_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_nombre1__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_mesas_nombre1__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_mesas_nombre1__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre2_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_nombre2__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_mesas_nombre2__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_mesas_nombre2__onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido1_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_apellido1__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_mesas_apellido1__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_mesas_apellido1__onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido2_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_apellido2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_mesas_apellido2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_mesas_apellido2__onfocus(this, iSeqRow) });
  $('#id_sc_field_sucur_cliente_' + iSeqRow).bind('change', function() { sc_terceros_mesas_sucur_cliente__onchange(this, iSeqRow) });
  $('#id_sc_field_representante_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_representante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_mesas_representante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_mesas_representante__onfocus(this, iSeqRow) });
  $('#id_sc_field_imagenter_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_imagenter__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_mesas_imagenter__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_mesas_imagenter__onfocus(this, iSeqRow) });
  $('#id_sc_field_es_restaurante_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_es_restaurante__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_terceros_mesas_es_restaurante__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_terceros_mesas_es_restaurante__onfocus(this, iSeqRow) });
  $('#id_sc_field_cupodis_' + iSeqRow).bind('change', function() { sc_terceros_mesas_cupodis__onchange(this, iSeqRow) });
  $('#id_sc_field_departamento_' + iSeqRow).bind('blur', function() { sc_terceros_mesas_departamento__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_mesas_departamento__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_mesas_departamento__onfocus(this, iSeqRow) });
  $('#id_sc_field_relleno2_' + iSeqRow).bind('change', function() { sc_terceros_mesas_relleno2__onchange(this, iSeqRow) });
  $('#id_sc_field_sucursales_' + iSeqRow).bind('change', function() { sc_terceros_mesas_sucursales__onchange(this, iSeqRow) });
  $('.sc-ui-radio-es_restaurante_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_terceros_mesas_idtercero__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_documento__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_documento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_documento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_mesas_event_documento__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_documento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_nombres__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_nombres_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_nombres__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_nombres__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
  do_ajax_terceros_mesas_event_nombres__onfocus(iSeqRow);
}

function sc_terceros_mesas_direccion__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_direccion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_direccion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_direccion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_tel_cel__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_nacimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_sexo__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_sexo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_sexo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_sexo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_urlmail__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_fechault__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_saldo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_afiliacion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_idmuni__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_idmuni_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_idmuni__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_idmuni__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_observaciones__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_observaciones_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_observaciones__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_observaciones__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_credito__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_cupo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_listaprecios__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_loatiende__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_con_actual__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_con_actual__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_efec_retencion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_regimen__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_regimen_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_regimen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_regimen__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_tipo__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_tipo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_mesas_event_tipo__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_cliente__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_cliente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_cliente__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_mesas_event_cliente__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_cliente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_empleado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_proveedor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_contacto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_telefonos_prov__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_email__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_url__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_creditoprov__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_dias__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_fechultcomp__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_saldoapagar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_autoretenedor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_tipo_documento__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_tipo_documento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_tipo_documento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_tipo_documento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_dv__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_dv_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_dv__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_dv__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_nombre1__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_nombre1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_nombre1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_nombre1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_nombre2__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_nombre2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_nombre2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_nombre2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_apellido1__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_apellido1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_apellido1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_apellido1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_apellido2__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_apellido2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_apellido2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_apellido2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_sucur_cliente__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_representante__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_representante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_representante__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_representante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_imagenter__onblur(oThis, iSeqRow) {
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_imagenter__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_imagenter__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_es_restaurante__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_es_restaurante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_es_restaurante__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_es_restaurante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_cupodis__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_departamento__onblur(oThis, iSeqRow) {
  do_ajax_terceros_mesas_validate_departamento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_terceros_mesas_departamento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_mesas_refresh_departamento_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_terceros_mesas_departamento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_terceros_mesas_relleno2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_mesas_sucursales__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
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
	displayChange_field("tipo_documento_", "", status);
	displayChange_field("documento_", "", status);
	displayChange_field("dv_", "", status);
	displayChange_field("imagenter_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nombre1_", "", status);
	displayChange_field("nombre2_", "", status);
	displayChange_field("apellido1_", "", status);
	displayChange_field("apellido2_", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("nombres_", "", status);
	displayChange_field("representante_", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sexo_", "", status);
	displayChange_field("tipo_", "", status);
	displayChange_field("regimen_", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("direccion_", "", status);
	displayChange_field("departamento_", "", status);
	displayChange_field("idmuni_", "", status);
	displayChange_field("observaciones_", "", status);
	displayChange_field("cliente_", "", status);
	displayChange_field("es_restaurante_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tipo_documento_(row, status);
	displayChange_field_documento_(row, status);
	displayChange_field_dv_(row, status);
	displayChange_field_imagenter_(row, status);
	displayChange_field_nombre1_(row, status);
	displayChange_field_nombre2_(row, status);
	displayChange_field_apellido1_(row, status);
	displayChange_field_apellido2_(row, status);
	displayChange_field_nombres_(row, status);
	displayChange_field_representante_(row, status);
	displayChange_field_sexo_(row, status);
	displayChange_field_tipo_(row, status);
	displayChange_field_regimen_(row, status);
	displayChange_field_direccion_(row, status);
	displayChange_field_departamento_(row, status);
	displayChange_field_idmuni_(row, status);
	displayChange_field_observaciones_(row, status);
	displayChange_field_cliente_(row, status);
	displayChange_field_es_restaurante_(row, status);
}

function displayChange_field(field, row, status) {
	if ("tipo_documento_" == field) {
		displayChange_field_tipo_documento_(row, status);
	}
	if ("documento_" == field) {
		displayChange_field_documento_(row, status);
	}
	if ("dv_" == field) {
		displayChange_field_dv_(row, status);
	}
	if ("imagenter_" == field) {
		displayChange_field_imagenter_(row, status);
	}
	if ("nombre1_" == field) {
		displayChange_field_nombre1_(row, status);
	}
	if ("nombre2_" == field) {
		displayChange_field_nombre2_(row, status);
	}
	if ("apellido1_" == field) {
		displayChange_field_apellido1_(row, status);
	}
	if ("apellido2_" == field) {
		displayChange_field_apellido2_(row, status);
	}
	if ("nombres_" == field) {
		displayChange_field_nombres_(row, status);
	}
	if ("representante_" == field) {
		displayChange_field_representante_(row, status);
	}
	if ("sexo_" == field) {
		displayChange_field_sexo_(row, status);
	}
	if ("tipo_" == field) {
		displayChange_field_tipo_(row, status);
	}
	if ("regimen_" == field) {
		displayChange_field_regimen_(row, status);
	}
	if ("direccion_" == field) {
		displayChange_field_direccion_(row, status);
	}
	if ("departamento_" == field) {
		displayChange_field_departamento_(row, status);
	}
	if ("idmuni_" == field) {
		displayChange_field_idmuni_(row, status);
	}
	if ("observaciones_" == field) {
		displayChange_field_observaciones_(row, status);
	}
	if ("cliente_" == field) {
		displayChange_field_cliente_(row, status);
	}
	if ("es_restaurante_" == field) {
		displayChange_field_es_restaurante_(row, status);
	}
}

function displayChange_field_tipo_documento_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_documento___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_documento_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_documento_");
	}
}

function displayChange_field_documento_(row, status) {
}

function displayChange_field_dv_(row, status) {
}

function displayChange_field_imagenter_(row, status) {
}

function displayChange_field_nombre1_(row, status) {
}

function displayChange_field_nombre2_(row, status) {
}

function displayChange_field_apellido1_(row, status) {
}

function displayChange_field_apellido2_(row, status) {
}

function displayChange_field_nombres_(row, status) {
}

function displayChange_field_representante_(row, status) {
}

function displayChange_field_sexo_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sexo___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sexo_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sexo_");
	}
}

function displayChange_field_tipo_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_");
	}
}

function displayChange_field_regimen_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_regimen___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_regimen_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "regimen_");
	}
}

function displayChange_field_direccion_(row, status) {
}

function displayChange_field_departamento_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_departamento___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_departamento_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "departamento_");
	}
}

function displayChange_field_idmuni_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idmuni___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idmuni_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idmuni_");
	}
}

function displayChange_field_observaciones_(row, status) {
}

function displayChange_field_cliente_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_cliente___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_cliente_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "cliente_");
	}
}

function displayChange_field_es_restaurante_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_tipo_documento_("all", "on");
	displayChange_field_sexo_("all", "on");
	displayChange_field_tipo_("all", "on");
	displayChange_field_regimen_("all", "on");
	displayChange_field_departamento_("all", "on");
	displayChange_field_idmuni_("all", "on");
	displayChange_field_cliente_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_terceros_mesas_form" + pageNo).hide();
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
  $("#id_sc_field_nacimiento_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_nacimiento_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_mesas_validate_nacimiento_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['nacimiento_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechault_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechault_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_mesas_validate_fechault_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechault_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_afiliacion_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_afiliacion_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_mesas_validate_afiliacion_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['afiliacion_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_con_actual_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_con_actual_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['con_actual_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_terceros_mesas_validate_con_actual_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $(".sc-ui-readonly-url_" + iSeqRow).click(function() {
    var linkUrl = $(this).html();
    window.open(linkUrl, "_blank");
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", ""); });
} // scJQLinkReadonlyAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_imagenter_" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_mesas_ul_save.php",
    dropZone: $("#hidden_field_data_imagenter_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenter_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenter_" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenter_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenter_" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter_(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter_(data);
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
        $("#id_img_loader_imagenter_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenter_" + iSeqRow).hide();
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
      $("#id_sc_field_imagenter_" + iSeqRow).val("");
      $("#id_sc_field_imagenter__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenter__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_imagenter_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_imagenter_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenter_) ? "none" : "";
      $("#id_ajax_img_imagenter_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenter_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenter_) {
        document.F1.temp_out_imagenter_.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenter_.value = var_ajax_img_imagenter_;
      }
      else if (document.F1.temp_out_imagenter_) {
        document.F1.temp_out_imagenter_.value = var_ajax_img_imagenter_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenter_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenter_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenter_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenter_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'terceros_mesas')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo_documento_" == specificField) {
    scJQSelect2Add_tipo_documento_(seqRow);
  }
  if (null == specificField || "sexo_" == specificField) {
    scJQSelect2Add_sexo_(seqRow);
  }
  if (null == specificField || "tipo_" == specificField) {
    scJQSelect2Add_tipo_(seqRow);
  }
  if (null == specificField || "regimen_" == specificField) {
    scJQSelect2Add_regimen_(seqRow);
  }
  if (null == specificField || "departamento_" == specificField) {
    scJQSelect2Add_departamento_(seqRow);
  }
  if (null == specificField || "idmuni_" == specificField) {
    scJQSelect2Add_idmuni_(seqRow);
  }
  if (null == specificField || "cliente_" == specificField) {
    scJQSelect2Add_cliente_(seqRow);
  }
  if (null == specificField || "credito_" == specificField) {
    scJQSelect2Add_credito_(seqRow);
  }
  if (null == specificField || "listaprecios_" == specificField) {
    scJQSelect2Add_listaprecios_(seqRow);
  }
  if (null == specificField || "loatiende_" == specificField) {
    scJQSelect2Add_loatiende_(seqRow);
  }
  if (null == specificField || "efec_retencion_" == specificField) {
    scJQSelect2Add_efec_retencion_(seqRow);
  }
  if (null == specificField || "empleado_" == specificField) {
    scJQSelect2Add_empleado_(seqRow);
  }
  if (null == specificField || "proveedor_" == specificField) {
    scJQSelect2Add_proveedor_(seqRow);
  }
  if (null == specificField || "creditoprov_" == specificField) {
    scJQSelect2Add_creditoprov_(seqRow);
  }
  if (null == specificField || "autoretenedor_" == specificField) {
    scJQSelect2Add_autoretenedor_(seqRow);
  }
  if (null == specificField || "sucur_cliente_" == specificField) {
    scJQSelect2Add_sucur_cliente_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo_documento_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_documento__obj" : "#id_sc_field_tipo_documento_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_documento__obj',
      dropdownCssClass: 'css_tipo_documento__obj',
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

function scJQSelect2Add_sexo_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sexo__obj" : "#id_sc_field_sexo_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sexo__obj',
      dropdownCssClass: 'css_sexo__obj',
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

function scJQSelect2Add_tipo_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo__obj" : "#id_sc_field_tipo_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo__obj',
      dropdownCssClass: 'css_tipo__obj',
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

function scJQSelect2Add_regimen_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_regimen__obj" : "#id_sc_field_regimen_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_regimen__obj',
      dropdownCssClass: 'css_regimen__obj',
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

function scJQSelect2Add_departamento_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_departamento__obj" : "#id_sc_field_departamento_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_departamento__obj',
      dropdownCssClass: 'css_departamento__obj',
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

function scJQSelect2Add_idmuni_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idmuni__obj" : "#id_sc_field_idmuni_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idmuni__obj',
      dropdownCssClass: 'css_idmuni__obj',
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

function scJQSelect2Add_cliente_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_cliente__obj" : "#id_sc_field_cliente_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_cliente__obj',
      dropdownCssClass: 'css_cliente__obj',
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

function scJQSelect2Add_credito_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_credito__obj" : "#id_sc_field_credito_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_credito__obj',
      dropdownCssClass: 'css_credito__obj',
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

function scJQSelect2Add_listaprecios_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_listaprecios__obj" : "#id_sc_field_listaprecios_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_listaprecios__obj',
      dropdownCssClass: 'css_listaprecios__obj',
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

function scJQSelect2Add_loatiende_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_loatiende__obj" : "#id_sc_field_loatiende_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_loatiende__obj',
      dropdownCssClass: 'css_loatiende__obj',
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

function scJQSelect2Add_efec_retencion_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_efec_retencion__obj" : "#id_sc_field_efec_retencion_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_efec_retencion__obj',
      dropdownCssClass: 'css_efec_retencion__obj',
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

function scJQSelect2Add_empleado_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_empleado__obj" : "#id_sc_field_empleado_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_empleado__obj',
      dropdownCssClass: 'css_empleado__obj',
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

function scJQSelect2Add_proveedor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_proveedor__obj" : "#id_sc_field_proveedor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_proveedor__obj',
      dropdownCssClass: 'css_proveedor__obj',
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

function scJQSelect2Add_creditoprov_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_creditoprov__obj" : "#id_sc_field_creditoprov_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_creditoprov__obj',
      dropdownCssClass: 'css_creditoprov__obj',
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

function scJQSelect2Add_autoretenedor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_autoretenedor__obj" : "#id_sc_field_autoretenedor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_autoretenedor__obj',
      dropdownCssClass: 'css_autoretenedor__obj',
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

function scJQSelect2Add_sucur_cliente_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sucur_cliente__obj" : "#id_sc_field_sucur_cliente_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sucur_cliente__obj',
      dropdownCssClass: 'css_sucur_cliente__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento_) { displayChange_field_tipo_documento_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sexo_) { displayChange_field_sexo_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_) { displayChange_field_tipo_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_regimen_) { displayChange_field_regimen_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_departamento_) { displayChange_field_departamento_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idmuni_) { displayChange_field_idmuni_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_cliente_) { displayChange_field_cliente_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_credito_) { displayChange_field_credito_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_listaprecios_) { displayChange_field_listaprecios_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_loatiende_) { displayChange_field_loatiende_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_efec_retencion_) { displayChange_field_efec_retencion_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_empleado_) { displayChange_field_empleado_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_proveedor_) { displayChange_field_proveedor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_creditoprov_) { displayChange_field_creditoprov_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_autoretenedor_) { displayChange_field_autoretenedor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sucur_cliente_) { displayChange_field_sucur_cliente_(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_imagenter_(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpg", "jpeg", "gif", "png"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

