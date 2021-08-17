
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
  scEventControl_data["usuario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terceros_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terceros_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["productos_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["productos_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grupos_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grupos_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuarios_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuarios_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["compras_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["compras_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventas_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventas_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cartera_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cartera_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["caja_lista_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["caja_frm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inventario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["usuario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terceros_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terceros_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terceros_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terceros_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["productos_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["productos_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["productos_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["productos_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupos_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupos_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupos_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupos_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuarios_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuarios_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuarios_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuarios_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["compras_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["compras_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["compras_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["compras_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventas_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventas_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventas_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventas_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cartera_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cartera_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cartera_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cartera_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["caja_lista_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["caja_lista_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["caja_frm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["caja_frm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inventario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inventario_" + iSeqRow]["change"]) {
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
  if ("usuario_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_idpermisos_' + iSeqRow).bind('change', function() { sc_form_permisos_idpermisos__onchange(this, iSeqRow) });
  $('#id_sc_field_usuario_' + iSeqRow).bind('blur', function() { sc_form_permisos_usuario__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_permisos_usuario__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_permisos_usuario__onfocus(this, iSeqRow) });
  $('#id_sc_field_terceros_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_terceros_lista__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_permisos_terceros_lista__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_permisos_terceros_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_terceros_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_terceros_frm__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_permisos_terceros_frm__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_permisos_terceros_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_productos_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_productos_lista__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_permisos_productos_lista__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_permisos_productos_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_productos_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_productos_frm__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_permisos_productos_frm__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_permisos_productos_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_grupos_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_grupos_lista__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_permisos_grupos_lista__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_permisos_grupos_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_grupos_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_grupos_frm__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_permisos_grupos_frm__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_permisos_grupos_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_usuarios_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_usuarios_lista__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_permisos_usuarios_lista__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_permisos_usuarios_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_usuarios_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_usuarios_frm__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_permisos_usuarios_frm__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_permisos_usuarios_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_compras_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_compras_lista__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_permisos_compras_lista__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_permisos_compras_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_compras_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_compras_frm__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_permisos_compras_frm__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_permisos_compras_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_ventas_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_ventas_lista__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_permisos_ventas_lista__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_permisos_ventas_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_ventas_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_ventas_frm__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_permisos_ventas_frm__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_permisos_ventas_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_cartera_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_cartera_lista__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_permisos_cartera_lista__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_permisos_cartera_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_cartera_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_cartera_frm__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_permisos_cartera_frm__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_permisos_cartera_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_caja_lista_' + iSeqRow).bind('blur', function() { sc_form_permisos_caja_lista__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_permisos_caja_lista__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_permisos_caja_lista__onfocus(this, iSeqRow) });
  $('#id_sc_field_caja_frm_' + iSeqRow).bind('blur', function() { sc_form_permisos_caja_frm__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_permisos_caja_frm__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_permisos_caja_frm__onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_' + iSeqRow).bind('blur', function() { sc_form_permisos_mantenimiento__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_permisos_mantenimiento__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_permisos_mantenimiento__onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa_' + iSeqRow).bind('blur', function() { sc_form_permisos_empresa__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_permisos_empresa__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_permisos_empresa__onfocus(this, iSeqRow) });
  $('#id_sc_field_inventario_' + iSeqRow).bind('blur', function() { sc_form_permisos_inventario__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_permisos_inventario__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_permisos_inventario__onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-terceros_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-terceros_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-productos_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-productos_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-grupos_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-grupos_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-usuarios_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-usuarios_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-compras_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-compras_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ventas_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ventas_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-cartera_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-cartera_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-caja_lista_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-caja_frm_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-mantenimiento_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-empresa_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-inventario_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_permisos_idpermisos__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_permisos_usuario__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_usuario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_usuario__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_usuario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_terceros_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_terceros_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_terceros_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_terceros_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_terceros_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_terceros_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_terceros_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_terceros_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_productos_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_productos_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_productos_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_productos_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_productos_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_productos_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_productos_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_productos_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_grupos_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_grupos_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_grupos_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_grupos_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_grupos_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_grupos_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_grupos_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_grupos_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_usuarios_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_usuarios_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_usuarios_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_usuarios_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_usuarios_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_usuarios_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_usuarios_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_usuarios_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_compras_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_compras_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_compras_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_compras_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_compras_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_compras_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_compras_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_compras_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_ventas_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_ventas_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_ventas_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_ventas_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_ventas_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_ventas_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_ventas_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_ventas_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_cartera_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_cartera_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_cartera_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_cartera_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_cartera_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_cartera_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_cartera_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_cartera_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_caja_lista__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_caja_lista_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_caja_lista__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_caja_lista__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_caja_frm__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_caja_frm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_caja_frm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_caja_frm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_mantenimiento__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_mantenimiento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_mantenimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_mantenimiento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_empresa__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_empresa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_empresa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_empresa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_permisos_inventario__onblur(oThis, iSeqRow) {
  do_ajax_form_permisos_validate_inventario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_permisos_inventario__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_permisos_inventario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("usuario_", "", status);
	displayChange_field("terceros_lista_", "", status);
	displayChange_field("terceros_frm_", "", status);
	displayChange_field("productos_lista_", "", status);
	displayChange_field("productos_frm_", "", status);
	displayChange_field("grupos_lista_", "", status);
	displayChange_field("grupos_frm_", "", status);
	displayChange_field("usuarios_lista_", "", status);
	displayChange_field("usuarios_frm_", "", status);
	displayChange_field("compras_lista_", "", status);
	displayChange_field("compras_frm_", "", status);
	displayChange_field("ventas_lista_", "", status);
	displayChange_field("ventas_frm_", "", status);
	displayChange_field("cartera_lista_", "", status);
	displayChange_field("cartera_frm_", "", status);
	displayChange_field("caja_lista_", "", status);
	displayChange_field("caja_frm_", "", status);
	displayChange_field("mantenimiento_", "", status);
	displayChange_field("empresa_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("inventario_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_usuario_(row, status);
	displayChange_field_terceros_lista_(row, status);
	displayChange_field_terceros_frm_(row, status);
	displayChange_field_productos_lista_(row, status);
	displayChange_field_productos_frm_(row, status);
	displayChange_field_grupos_lista_(row, status);
	displayChange_field_grupos_frm_(row, status);
	displayChange_field_usuarios_lista_(row, status);
	displayChange_field_usuarios_frm_(row, status);
	displayChange_field_compras_lista_(row, status);
	displayChange_field_compras_frm_(row, status);
	displayChange_field_ventas_lista_(row, status);
	displayChange_field_ventas_frm_(row, status);
	displayChange_field_cartera_lista_(row, status);
	displayChange_field_cartera_frm_(row, status);
	displayChange_field_caja_lista_(row, status);
	displayChange_field_caja_frm_(row, status);
	displayChange_field_mantenimiento_(row, status);
	displayChange_field_empresa_(row, status);
	displayChange_field_inventario_(row, status);
}

function displayChange_field(field, row, status) {
	if ("usuario_" == field) {
		displayChange_field_usuario_(row, status);
	}
	if ("terceros_lista_" == field) {
		displayChange_field_terceros_lista_(row, status);
	}
	if ("terceros_frm_" == field) {
		displayChange_field_terceros_frm_(row, status);
	}
	if ("productos_lista_" == field) {
		displayChange_field_productos_lista_(row, status);
	}
	if ("productos_frm_" == field) {
		displayChange_field_productos_frm_(row, status);
	}
	if ("grupos_lista_" == field) {
		displayChange_field_grupos_lista_(row, status);
	}
	if ("grupos_frm_" == field) {
		displayChange_field_grupos_frm_(row, status);
	}
	if ("usuarios_lista_" == field) {
		displayChange_field_usuarios_lista_(row, status);
	}
	if ("usuarios_frm_" == field) {
		displayChange_field_usuarios_frm_(row, status);
	}
	if ("compras_lista_" == field) {
		displayChange_field_compras_lista_(row, status);
	}
	if ("compras_frm_" == field) {
		displayChange_field_compras_frm_(row, status);
	}
	if ("ventas_lista_" == field) {
		displayChange_field_ventas_lista_(row, status);
	}
	if ("ventas_frm_" == field) {
		displayChange_field_ventas_frm_(row, status);
	}
	if ("cartera_lista_" == field) {
		displayChange_field_cartera_lista_(row, status);
	}
	if ("cartera_frm_" == field) {
		displayChange_field_cartera_frm_(row, status);
	}
	if ("caja_lista_" == field) {
		displayChange_field_caja_lista_(row, status);
	}
	if ("caja_frm_" == field) {
		displayChange_field_caja_frm_(row, status);
	}
	if ("mantenimiento_" == field) {
		displayChange_field_mantenimiento_(row, status);
	}
	if ("empresa_" == field) {
		displayChange_field_empresa_(row, status);
	}
	if ("inventario_" == field) {
		displayChange_field_inventario_(row, status);
	}
}

function displayChange_field_usuario_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_usuario___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_usuario_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "usuario_");
	}
}

function displayChange_field_terceros_lista_(row, status) {
}

function displayChange_field_terceros_frm_(row, status) {
}

function displayChange_field_productos_lista_(row, status) {
}

function displayChange_field_productos_frm_(row, status) {
}

function displayChange_field_grupos_lista_(row, status) {
}

function displayChange_field_grupos_frm_(row, status) {
}

function displayChange_field_usuarios_lista_(row, status) {
}

function displayChange_field_usuarios_frm_(row, status) {
}

function displayChange_field_compras_lista_(row, status) {
}

function displayChange_field_compras_frm_(row, status) {
}

function displayChange_field_ventas_lista_(row, status) {
}

function displayChange_field_ventas_frm_(row, status) {
}

function displayChange_field_cartera_lista_(row, status) {
}

function displayChange_field_cartera_frm_(row, status) {
}

function displayChange_field_caja_lista_(row, status) {
}

function displayChange_field_caja_frm_(row, status) {
}

function displayChange_field_mantenimiento_(row, status) {
}

function displayChange_field_empresa_(row, status) {
}

function displayChange_field_inventario_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_usuario_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_permisos_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_permisos')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "usuario_" == specificField) {
    scJQSelect2Add_usuario_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_usuario_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_usuario__obj" : "#id_sc_field_usuario_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_usuario__obj',
      dropdownCssClass: 'css_usuario__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_usuario_) { displayChange_field_usuario_(iLine, "on"); } }, 150);
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

