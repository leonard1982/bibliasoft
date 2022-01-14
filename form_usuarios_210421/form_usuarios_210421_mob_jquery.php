
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'idusuarios':
      case 'usuario':
      case 'password':
      case 'nombre':
      case 'correo':
      case 'telefono':
      case 'tercero':
      case 'resolucion':
      case 'grupo':
      case 'activo':
      case 'grupocomanda':
      case 'banco_movil':
        sc_exib_ocult_pag('form_usuarios_210421_mob_form0');
        break;
      case 'acceso_inventario':
      case 'acceso_gerencial':
      case 'acceso_restaurante':
        sc_exib_ocult_pag('form_usuarios_210421_mob_form1');
        break;
      case 'nombre_pc':
      case 'nombre_impre':
        sc_exib_ocult_pag('form_usuarios_210421_mob_form2');
        break;
      case 'ubicacion':
      case 'n_equipo':
      case 'serial':
        sc_exib_ocult_pag('form_usuarios_210421_mob_form3');
        break;
    }
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
  scEventControl_data["idusuarios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grupocomanda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acceso_inventario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acceso_gerencial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acceso_restaurante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_pc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_impre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ubicacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["n_equipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idusuarios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idusuarios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupocomanda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupocomanda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco_movil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acceso_inventario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acceso_inventario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acceso_gerencial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acceso_gerencial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acceso_restaurante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acceso_restaurante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubicacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["n_equipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["n_equipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tercero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("resolucion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupocomanda" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("banco_movil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tercero" + iSeq == fieldName) {
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
  $('#id_sc_field_idusuarios' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_idusuarios_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_usuarios_210421_idusuarios_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_usuario_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_usuarios_210421_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_password_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_usuarios_210421_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_usuarios_210421_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_correo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_usuarios_210421_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_usuarios_210421_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_tercero' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_tercero_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_usuarios_210421_tercero_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_usuarios_210421_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_resolucion_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_usuarios_210421_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupo' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_grupo_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_usuarios_210421_grupo_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_usuarios_210421_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_usuarios_210421_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupocomanda' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_grupocomanda_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_usuarios_210421_grupocomanda_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_pc' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_nombre_pc_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_usuarios_210421_nombre_pc_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_impre' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_nombre_impre_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_usuarios_210421_nombre_impre_onfocus(this, iSeqRow) });
  $('#id_sc_field_acceso_inventario' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_acceso_inventario_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_usuarios_210421_acceso_inventario_onfocus(this, iSeqRow) });
  $('#id_sc_field_acceso_gerencial' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_acceso_gerencial_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_usuarios_210421_acceso_gerencial_onfocus(this, iSeqRow) });
  $('#id_sc_field_acceso_restaurante' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_acceso_restaurante_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_usuarios_210421_acceso_restaurante_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_movil' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_banco_movil_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_usuarios_210421_banco_movil_onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_ubicacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_usuarios_210421_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_n_equipo' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_n_equipo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_usuarios_210421_n_equipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_serial' + iSeqRow).bind('blur', function() { sc_form_usuarios_210421_serial_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_usuarios_210421_serial_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-activo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-acceso_inventario' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-acceso_gerencial' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-acceso_restaurante' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_usuarios_210421_idusuarios_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_idusuarios();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_idusuarios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_password_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_password();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_correo();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_tercero();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_tercero_onchange(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_event_tercero_onchange();
}

function sc_form_usuarios_210421_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_grupo();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_grupo_onchange(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_event_grupo_onchange();
}

function sc_form_usuarios_210421_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_activo();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_grupocomanda_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_grupocomanda();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_grupocomanda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_nombre_pc_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_nombre_pc();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_nombre_pc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_nombre_impre_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_nombre_impre();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_nombre_impre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_acceso_inventario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_acceso_inventario();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_acceso_inventario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_acceso_gerencial_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_acceso_gerencial();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_acceso_gerencial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_acceso_restaurante_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_acceso_restaurante();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_acceso_restaurante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_banco_movil_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_banco_movil();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_banco_movil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_ubicacion();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_ubicacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_n_equipo_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_n_equipo();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_n_equipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_210421_serial_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_210421_mob_validate_serial();
  scCssBlur(oThis);
}

function sc_form_usuarios_210421_serial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
	if ("2" == page) {
		displayChange_page_2(status);
	}
	if ("3" == page) {
		displayChange_page_3(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
}

function displayChange_page_1(status) {
	displayChange_block("1", status);
}

function displayChange_page_2(status) {
	displayChange_block("2", status);
}

function displayChange_page_3(status) {
	displayChange_block("3", status);
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
	displayChange_field("idusuarios", "", status);
	displayChange_field("usuario", "", status);
	displayChange_field("password", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("telefono", "", status);
	displayChange_field("tercero", "", status);
	displayChange_field("resolucion", "", status);
	displayChange_field("grupo", "", status);
	displayChange_field("activo", "", status);
	displayChange_field("grupocomanda", "", status);
	displayChange_field("banco_movil", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("acceso_inventario", "", status);
	displayChange_field("acceso_gerencial", "", status);
	displayChange_field("acceso_restaurante", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("nombre_pc", "", status);
	displayChange_field("nombre_impre", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("ubicacion", "", status);
	displayChange_field("n_equipo", "", status);
	displayChange_field("serial", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idusuarios(row, status);
	displayChange_field_usuario(row, status);
	displayChange_field_password(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_telefono(row, status);
	displayChange_field_tercero(row, status);
	displayChange_field_resolucion(row, status);
	displayChange_field_grupo(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_grupocomanda(row, status);
	displayChange_field_banco_movil(row, status);
	displayChange_field_acceso_inventario(row, status);
	displayChange_field_acceso_gerencial(row, status);
	displayChange_field_acceso_restaurante(row, status);
	displayChange_field_nombre_pc(row, status);
	displayChange_field_nombre_impre(row, status);
	displayChange_field_ubicacion(row, status);
	displayChange_field_n_equipo(row, status);
	displayChange_field_serial(row, status);
}

function displayChange_field(field, row, status) {
	if ("idusuarios" == field) {
		displayChange_field_idusuarios(row, status);
	}
	if ("usuario" == field) {
		displayChange_field_usuario(row, status);
	}
	if ("password" == field) {
		displayChange_field_password(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("telefono" == field) {
		displayChange_field_telefono(row, status);
	}
	if ("tercero" == field) {
		displayChange_field_tercero(row, status);
	}
	if ("resolucion" == field) {
		displayChange_field_resolucion(row, status);
	}
	if ("grupo" == field) {
		displayChange_field_grupo(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("grupocomanda" == field) {
		displayChange_field_grupocomanda(row, status);
	}
	if ("banco_movil" == field) {
		displayChange_field_banco_movil(row, status);
	}
	if ("acceso_inventario" == field) {
		displayChange_field_acceso_inventario(row, status);
	}
	if ("acceso_gerencial" == field) {
		displayChange_field_acceso_gerencial(row, status);
	}
	if ("acceso_restaurante" == field) {
		displayChange_field_acceso_restaurante(row, status);
	}
	if ("nombre_pc" == field) {
		displayChange_field_nombre_pc(row, status);
	}
	if ("nombre_impre" == field) {
		displayChange_field_nombre_impre(row, status);
	}
	if ("ubicacion" == field) {
		displayChange_field_ubicacion(row, status);
	}
	if ("n_equipo" == field) {
		displayChange_field_n_equipo(row, status);
	}
	if ("serial" == field) {
		displayChange_field_serial(row, status);
	}
}

function displayChange_field_idusuarios(row, status) {
}

function displayChange_field_usuario(row, status) {
}

function displayChange_field_password(row, status) {
}

function displayChange_field_nombre(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_telefono(row, status) {
}

function displayChange_field_tercero(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tercero__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tercero" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tercero");
	}
}

function displayChange_field_resolucion(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_resolucion__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_resolucion" + row).select2("destroy");
		}
		scJQSelect2Add(row, "resolucion");
	}
}

function displayChange_field_grupo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_grupo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_grupo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "grupo");
	}
}

function displayChange_field_activo(row, status) {
}

function displayChange_field_grupocomanda(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_grupocomanda__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_grupocomanda" + row).select2("destroy");
		}
		scJQSelect2Add(row, "grupocomanda");
	}
}

function displayChange_field_banco_movil(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_banco_movil__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_banco_movil" + row).select2("destroy");
		}
		scJQSelect2Add(row, "banco_movil");
	}
}

function displayChange_field_acceso_inventario(row, status) {
}

function displayChange_field_acceso_gerencial(row, status) {
}

function displayChange_field_acceso_restaurante(row, status) {
}

function displayChange_field_nombre_pc(row, status) {
}

function displayChange_field_nombre_impre(row, status) {
}

function displayChange_field_ubicacion(row, status) {
}

function displayChange_field_n_equipo(row, status) {
}

function displayChange_field_serial(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_tercero("all", "on");
	displayChange_field_resolucion("all", "on");
	displayChange_field_grupo("all", "on");
	displayChange_field_grupocomanda("all", "on");
	displayChange_field_banco_movil("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_usuarios_210421_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_creacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_creacion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['creacion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_usuarios_210421_mob_validate_creacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_ultima_actualizacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_actualizacion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ultima_actualizacion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultima_actualizacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_usuarios_210421_mob_validate_ultima_actualizacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultima_actualizacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_usuarios_210421_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tercero" == specificField) {
    scJQSelect2Add_tercero(seqRow);
  }
  if (null == specificField || "resolucion" == specificField) {
    scJQSelect2Add_resolucion(seqRow);
  }
  if (null == specificField || "grupo" == specificField) {
    scJQSelect2Add_grupo(seqRow);
  }
  if (null == specificField || "grupocomanda" == specificField) {
    scJQSelect2Add_grupocomanda(seqRow);
  }
  if (null == specificField || "banco_movil" == specificField) {
    scJQSelect2Add_banco_movil(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tercero(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tercero_obj" : "#id_sc_field_tercero" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tercero_obj',
      dropdownCssClass: 'css_tercero_obj',
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

function scJQSelect2Add_resolucion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_resolucion_obj" : "#id_sc_field_resolucion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_resolucion_obj',
      dropdownCssClass: 'css_resolucion_obj',
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

function scJQSelect2Add_grupo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_grupo_obj" : "#id_sc_field_grupo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_grupo_obj',
      dropdownCssClass: 'css_grupo_obj',
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

function scJQSelect2Add_grupocomanda(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_grupocomanda_obj" : "#id_sc_field_grupocomanda" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_grupocomanda_obj',
      dropdownCssClass: 'css_grupocomanda_obj',
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

function scJQSelect2Add_banco_movil(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_banco_movil_obj" : "#id_sc_field_banco_movil" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_banco_movil_obj',
      dropdownCssClass: 'css_banco_movil_obj',
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
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_tercero) { displayChange_field_tercero(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_resolucion) { displayChange_field_resolucion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_grupo) { displayChange_field_grupo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_grupocomanda) { displayChange_field_grupocomanda(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_banco_movil) { displayChange_field_banco_movil(iLine, "on"); } }, 150);
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

