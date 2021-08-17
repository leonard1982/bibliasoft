
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
  scEventControl_data["codigo_te" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sucursal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razonsoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_comercial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["naturaleza" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddatos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompais" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nom_depto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["municipio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_postal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruta_logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_trib" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigos_ciiu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciiu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["responsab_trib" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigo_te" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_te" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sucursal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sucursal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razonsoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razonsoc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_comercial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_comercial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["naturaleza" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["naturaleza" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddatos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddatos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompais" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompais" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nom_depto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nom_depto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_trib" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_trib" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigos_ciiu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigos_ciiu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciiu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciiu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["responsab_trib" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["responsab_trib" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("codigo_te" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sucursal" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("naturaleza" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nompais" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nom_depto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("municipio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ciudad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("detalle_trib" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("codigos_ciiu" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nit" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo_documento" + iSeq == fieldName) {
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
  $('#id_sc_field_iddatos' + iSeqRow).bind('blur', function() { sc_form_datosemp_iddatos_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_datosemp_iddatos_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_datosemp_iddatos_onfocus(this, iSeqRow) });
  $('#id_sc_field_razonsoc' + iSeqRow).bind('blur', function() { sc_form_datosemp_razonsoc_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_datosemp_razonsoc_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_datosemp_razonsoc_onfocus(this, iSeqRow) });
  $('#id_sc_field_nit' + iSeqRow).bind('blur', function() { sc_form_datosemp_nit_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_datosemp_nit_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_datosemp_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_dv' + iSeqRow).bind('blur', function() { sc_form_datosemp_dv_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_form_datosemp_dv_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_form_datosemp_dv_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_datosemp_direccion_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datosemp_direccion_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datosemp_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_naturaleza' + iSeqRow).bind('blur', function() { sc_form_datosemp_naturaleza_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_datosemp_naturaleza_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_datosemp_naturaleza_onfocus(this, iSeqRow) });
  $('#id_sc_field_regimen' + iSeqRow).bind('blur', function() { sc_form_datosemp_regimen_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_datosemp_regimen_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_datosemp_regimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_datosemp_telefono_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_datosemp_telefono_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_datosemp_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_datosemp_correo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_datosemp_correo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_datosemp_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_datosemp_logo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_datosemp_logo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_datosemp_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_archivo' + iSeqRow).bind('change', function() { sc_form_datosemp_nombre_archivo_onchange(this, iSeqRow) });
  $('#id_sc_field_tamanio' + iSeqRow).bind('change', function() { sc_form_datosemp_tamanio_onchange(this, iSeqRow) });
  $('#id_sc_field_detalle_trib' + iSeqRow).bind('blur', function() { sc_form_datosemp_detalle_trib_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_datosemp_detalle_trib_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_datosemp_detalle_trib_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigos_ciiu' + iSeqRow).bind('blur', function() { sc_form_datosemp_codigos_ciiu_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_datosemp_codigos_ciiu_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_datosemp_codigos_ciiu_onfocus(this, iSeqRow) });
  $('#id_sc_field_responsab_trib' + iSeqRow).bind('blur', function() { sc_form_datosemp_responsab_trib_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_datosemp_responsab_trib_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_datosemp_responsab_trib_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento' + iSeqRow).bind('blur', function() { sc_form_datosemp_tipo_documento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_datosemp_tipo_documento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_datosemp_tipo_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_comercial' + iSeqRow).bind('blur', function() { sc_form_datosemp_nombre_comercial_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_datosemp_nombre_comercial_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_datosemp_nombre_comercial_onfocus(this, iSeqRow) });
  $('#id_sc_field_nompais' + iSeqRow).bind('blur', function() { sc_form_datosemp_nompais_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_datosemp_nompais_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_datosemp_nompais_onfocus(this, iSeqRow) });
  $('#id_sc_field_nom_depto' + iSeqRow).bind('blur', function() { sc_form_datosemp_nom_depto_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datosemp_nom_depto_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datosemp_nom_depto_onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio' + iSeqRow).bind('blur', function() { sc_form_datosemp_municipio_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datosemp_municipio_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datosemp_municipio_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad' + iSeqRow).bind('blur', function() { sc_form_datosemp_ciudad_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_datosemp_ciudad_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_datosemp_ciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_postal' + iSeqRow).bind('blur', function() { sc_form_datosemp_codigo_postal_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_datosemp_codigo_postal_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_datosemp_codigo_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_sucursal' + iSeqRow).bind('blur', function() { sc_form_datosemp_sucursal_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_datosemp_sucursal_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_datosemp_sucursal_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_te' + iSeqRow).bind('blur', function() { sc_form_datosemp_codigo_te_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datosemp_codigo_te_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datosemp_codigo_te_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruta_logo' + iSeqRow).bind('blur', function() { sc_form_datosemp_ruta_logo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datosemp_ruta_logo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datosemp_ruta_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciiu' + iSeqRow).bind('blur', function() { sc_form_datosemp_ciiu_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_datosemp_ciiu_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_datosemp_ciiu_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_datosemp_iddatos_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_iddatos();
  scCssBlur(oThis);
}

function sc_form_datosemp_iddatos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_iddatos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_razonsoc_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_razonsoc();
  scCssBlur(oThis);
}

function sc_form_datosemp_razonsoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_razonsoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_nit_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_nit();
  scCssBlur(oThis);
}

function sc_form_datosemp_nit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_datosemp_event_nit_onchange();
}

function sc_form_datosemp_nit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_dv_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_dv();
  scCssBlur(oThis);
}

function sc_form_datosemp_dv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_dv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_datosemp_direccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_naturaleza_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_naturaleza();
  scCssBlur(oThis);
}

function sc_form_datosemp_naturaleza_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_naturaleza_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_regimen_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_regimen();
  scCssBlur(oThis);
}

function sc_form_datosemp_regimen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_regimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_datosemp_telefono_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_correo();
  scCssBlur(oThis);
}

function sc_form_datosemp_correo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_datosemp_logo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_logo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_nombre_archivo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_tamanio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_detalle_trib_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_detalle_trib();
  scCssBlur(oThis);
}

function sc_form_datosemp_detalle_trib_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_detalle_trib_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_codigos_ciiu_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_codigos_ciiu();
  scCssBlur(oThis);
}

function sc_form_datosemp_codigos_ciiu_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_codigos_ciiu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_responsab_trib_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_responsab_trib();
  scCssBlur(oThis);
}

function sc_form_datosemp_responsab_trib_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_responsab_trib_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_tipo_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_tipo_documento();
  scCssBlur(oThis);
}

function sc_form_datosemp_tipo_documento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_datosemp_event_tipo_documento_onchange();
}

function sc_form_datosemp_tipo_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_nombre_comercial_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_nombre_comercial();
  scCssBlur(oThis);
}

function sc_form_datosemp_nombre_comercial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_nombre_comercial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_nompais_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_nompais();
  scCssBlur(oThis);
}

function sc_form_datosemp_nompais_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_nompais_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_nom_depto_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_nom_depto();
  scCssBlur(oThis);
}

function sc_form_datosemp_nom_depto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_datosemp_refresh_nom_depto();
}

function sc_form_datosemp_nom_depto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_municipio_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_municipio();
  scCssBlur(oThis);
}

function sc_form_datosemp_municipio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_datosemp_refresh_municipio();
}

function sc_form_datosemp_municipio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_ciudad_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_ciudad();
  scCssBlur(oThis);
}

function sc_form_datosemp_ciudad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_ciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_codigo_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_codigo_postal();
  scCssBlur(oThis);
}

function sc_form_datosemp_codigo_postal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_codigo_postal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_sucursal_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_sucursal();
  scCssBlur(oThis);
}

function sc_form_datosemp_sucursal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_sucursal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_codigo_te_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_codigo_te();
  scCssBlur(oThis);
}

function sc_form_datosemp_codigo_te_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_codigo_te_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datosemp_ruta_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_datosemp_ruta_logo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_ruta_logo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_datosemp_ciiu_onblur(oThis, iSeqRow) {
  do_ajax_form_datosemp_validate_ciiu();
  scCssBlur(oThis);
}

function sc_form_datosemp_ciiu_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_datosemp_ciiu_onfocus(oThis, iSeqRow) {
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
	displayChange_field("codigo_te", "", status);
	displayChange_field("sucursal", "", status);
	displayChange_field("razonsoc", "", status);
	displayChange_field("nombre_comercial", "", status);
	displayChange_field("regimen", "", status);
	displayChange_field("naturaleza", "", status);
	displayChange_field("tipo_documento", "", status);
	displayChange_field("nit", "", status);
	displayChange_field("dv", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("iddatos", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nompais", "", status);
	displayChange_field("nom_depto", "", status);
	displayChange_field("municipio", "", status);
	displayChange_field("ciudad", "", status);
	displayChange_field("direccion", "", status);
	displayChange_field("codigo_postal", "", status);
	displayChange_field("telefono", "", status);
	displayChange_field("logo", "", status);
	displayChange_field("ruta_logo", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("detalle_trib", "", status);
	displayChange_field("codigos_ciiu", "", status);
	displayChange_field("ciiu", "", status);
	displayChange_field("responsab_trib", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigo_te(row, status);
	displayChange_field_sucursal(row, status);
	displayChange_field_razonsoc(row, status);
	displayChange_field_nombre_comercial(row, status);
	displayChange_field_regimen(row, status);
	displayChange_field_naturaleza(row, status);
	displayChange_field_tipo_documento(row, status);
	displayChange_field_nit(row, status);
	displayChange_field_dv(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_iddatos(row, status);
	displayChange_field_nompais(row, status);
	displayChange_field_nom_depto(row, status);
	displayChange_field_municipio(row, status);
	displayChange_field_ciudad(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_codigo_postal(row, status);
	displayChange_field_telefono(row, status);
	displayChange_field_logo(row, status);
	displayChange_field_ruta_logo(row, status);
	displayChange_field_detalle_trib(row, status);
	displayChange_field_codigos_ciiu(row, status);
	displayChange_field_ciiu(row, status);
	displayChange_field_responsab_trib(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigo_te" == field) {
		displayChange_field_codigo_te(row, status);
	}
	if ("sucursal" == field) {
		displayChange_field_sucursal(row, status);
	}
	if ("razonsoc" == field) {
		displayChange_field_razonsoc(row, status);
	}
	if ("nombre_comercial" == field) {
		displayChange_field_nombre_comercial(row, status);
	}
	if ("regimen" == field) {
		displayChange_field_regimen(row, status);
	}
	if ("naturaleza" == field) {
		displayChange_field_naturaleza(row, status);
	}
	if ("tipo_documento" == field) {
		displayChange_field_tipo_documento(row, status);
	}
	if ("nit" == field) {
		displayChange_field_nit(row, status);
	}
	if ("dv" == field) {
		displayChange_field_dv(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("iddatos" == field) {
		displayChange_field_iddatos(row, status);
	}
	if ("nompais" == field) {
		displayChange_field_nompais(row, status);
	}
	if ("nom_depto" == field) {
		displayChange_field_nom_depto(row, status);
	}
	if ("municipio" == field) {
		displayChange_field_municipio(row, status);
	}
	if ("ciudad" == field) {
		displayChange_field_ciudad(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("codigo_postal" == field) {
		displayChange_field_codigo_postal(row, status);
	}
	if ("telefono" == field) {
		displayChange_field_telefono(row, status);
	}
	if ("logo" == field) {
		displayChange_field_logo(row, status);
	}
	if ("ruta_logo" == field) {
		displayChange_field_ruta_logo(row, status);
	}
	if ("detalle_trib" == field) {
		displayChange_field_detalle_trib(row, status);
	}
	if ("codigos_ciiu" == field) {
		displayChange_field_codigos_ciiu(row, status);
	}
	if ("ciiu" == field) {
		displayChange_field_ciiu(row, status);
	}
	if ("responsab_trib" == field) {
		displayChange_field_responsab_trib(row, status);
	}
}

function displayChange_field_codigo_te(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_codigo_te__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_codigo_te" + row).select2("destroy");
		}
		scJQSelect2Add(row, "codigo_te");
	}
}

function displayChange_field_sucursal(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sucursal__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sucursal" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sucursal");
	}
}

function displayChange_field_razonsoc(row, status) {
}

function displayChange_field_nombre_comercial(row, status) {
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

function displayChange_field_naturaleza(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_naturaleza__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_naturaleza" + row).select2("destroy");
		}
		scJQSelect2Add(row, "naturaleza");
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

function displayChange_field_nit(row, status) {
}

function displayChange_field_dv(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_iddatos(row, status) {
}

function displayChange_field_nompais(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_nompais__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_nompais" + row).select2("destroy");
		}
		scJQSelect2Add(row, "nompais");
	}
}

function displayChange_field_nom_depto(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_nom_depto__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_nom_depto" + row).select2("destroy");
		}
		scJQSelect2Add(row, "nom_depto");
	}
}

function displayChange_field_municipio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_municipio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_municipio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "municipio");
	}
}

function displayChange_field_ciudad(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_ciudad__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_ciudad" + row).select2("destroy");
		}
		scJQSelect2Add(row, "ciudad");
	}
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_codigo_postal(row, status) {
}

function displayChange_field_telefono(row, status) {
}

function displayChange_field_logo(row, status) {
}

function displayChange_field_ruta_logo(row, status) {
}

function displayChange_field_detalle_trib(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_detalle_trib__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_detalle_trib" + row).select2("destroy");
		}
		scJQSelect2Add(row, "detalle_trib");
	}
}

function displayChange_field_codigos_ciiu(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_codigos_ciiu__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_codigos_ciiu" + row).select2("destroy");
		}
		scJQSelect2Add(row, "codigos_ciiu");
	}
}

function displayChange_field_ciiu(row, status) {
}

function displayChange_field_responsab_trib(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_codigo_te("all", "on");
	displayChange_field_sucursal("all", "on");
	displayChange_field_regimen("all", "on");
	displayChange_field_naturaleza("all", "on");
	displayChange_field_tipo_documento("all", "on");
	displayChange_field_nompais("all", "on");
	displayChange_field_nom_depto("all", "on");
	displayChange_field_municipio("all", "on");
	displayChange_field_ciudad("all", "on");
	displayChange_field_detalle_trib("all", "on");
	displayChange_field_codigos_ciiu("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_datosemp_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
		}
	}
}
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
  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_datosemp_ul_save.php",
    dropZone: $("#hidden_field_data_logo" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo" + iSeqRow);
        loaderContent = $("#id_img_loader_logo" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_logo(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_logo(data);
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
        $("#id_img_loader_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo" + iSeqRow).hide();
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
      $("#id_sc_field_logo" + iSeqRow).val("");
      $("#id_sc_field_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_logo" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_logo" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_ruta_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_datosemp_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'ruta_logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_ruta_logo" + iSeqRow);
        loaderContent = $("#id_img_loader_ruta_logo" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_ruta_logo" + iSeqRow);
        loader.show();
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
        $("#id_img_loader_ruta_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_ruta_logo" + iSeqRow).hide();
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
      $("#id_sc_field_ruta_logo" + iSeqRow).val("");
      $("#id_sc_field_ruta_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_ruta_logo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_ruta_logo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_ruta_logo) ? "none" : "";
      $("#id_ajax_img_ruta_logo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_ruta_logo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_ruta_logo) {
        document.F1.temp_out_ruta_logo.value = var_ajax_img_thumb;
        document.F1.temp_out1_ruta_logo.value = var_ajax_img_ruta_logo;
      }
      else if (document.F1.temp_out_ruta_logo) {
        document.F1.temp_out_ruta_logo.value = var_ajax_img_ruta_logo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_ruta_logo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_ruta_logo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_ruta_logo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_ruta_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_datosemp')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "codigo_te" == specificField) {
    scJQSelect2Add_codigo_te(seqRow);
  }
  if (null == specificField || "sucursal" == specificField) {
    scJQSelect2Add_sucursal(seqRow);
  }
  if (null == specificField || "regimen" == specificField) {
    scJQSelect2Add_regimen(seqRow);
  }
  if (null == specificField || "naturaleza" == specificField) {
    scJQSelect2Add_naturaleza(seqRow);
  }
  if (null == specificField || "tipo_documento" == specificField) {
    scJQSelect2Add_tipo_documento(seqRow);
  }
  if (null == specificField || "nompais" == specificField) {
    scJQSelect2Add_nompais(seqRow);
  }
  if (null == specificField || "nom_depto" == specificField) {
    scJQSelect2Add_nom_depto(seqRow);
  }
  if (null == specificField || "municipio" == specificField) {
    scJQSelect2Add_municipio(seqRow);
  }
  if (null == specificField || "ciudad" == specificField) {
    scJQSelect2Add_ciudad(seqRow);
  }
  if (null == specificField || "detalle_trib" == specificField) {
    scJQSelect2Add_detalle_trib(seqRow);
  }
  if (null == specificField || "codigos_ciiu" == specificField) {
    scJQSelect2Add_codigos_ciiu(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_codigo_te(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_codigo_te_obj" : "#id_sc_field_codigo_te" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_codigo_te_obj',
      dropdownCssClass: 'css_codigo_te_obj',
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

function scJQSelect2Add_sucursal(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sucursal_obj" : "#id_sc_field_sucursal" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sucursal_obj',
      dropdownCssClass: 'css_sucursal_obj',
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

function scJQSelect2Add_naturaleza(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_naturaleza_obj" : "#id_sc_field_naturaleza" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_naturaleza_obj',
      dropdownCssClass: 'css_naturaleza_obj',
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

function scJQSelect2Add_nompais(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_nompais_obj" : "#id_sc_field_nompais" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_nompais_obj',
      dropdownCssClass: 'css_nompais_obj',
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

function scJQSelect2Add_nom_depto(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_nom_depto_obj" : "#id_sc_field_nom_depto" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_nom_depto_obj',
      dropdownCssClass: 'css_nom_depto_obj',
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

function scJQSelect2Add_municipio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_municipio_obj" : "#id_sc_field_municipio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_municipio_obj',
      dropdownCssClass: 'css_municipio_obj',
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

function scJQSelect2Add_ciudad(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_ciudad_obj" : "#id_sc_field_ciudad" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_ciudad_obj',
      dropdownCssClass: 'css_ciudad_obj',
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

function scJQSelect2Add_detalle_trib(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_detalle_trib_obj" : "#id_sc_field_detalle_trib" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_detalle_trib_obj',
      dropdownCssClass: 'css_detalle_trib_obj',
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

function scJQSelect2Add_codigos_ciiu(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_codigos_ciiu_obj" : "#id_sc_field_codigos_ciiu" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_codigos_ciiu_obj',
      dropdownCssClass: 'css_codigos_ciiu_obj',
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
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_codigo_te) { displayChange_field_codigo_te(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sucursal) { displayChange_field_sucursal(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_regimen) { displayChange_field_regimen(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_naturaleza) { displayChange_field_naturaleza(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento) { displayChange_field_tipo_documento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nompais) { displayChange_field_nompais(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nom_depto) { displayChange_field_nom_depto(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_municipio) { displayChange_field_municipio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_ciudad) { displayChange_field_ciudad(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_detalle_trib) { displayChange_field_detalle_trib(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_codigos_ciiu) { displayChange_field_codigos_ciiu(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_logo(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpg", "jpeg", "gif", "png"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

