
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
  scEventControl_data["idmenu_movil_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aplicacion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["clase_css_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comportamiento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruta_imagen_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enlace_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["titulo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tema_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icono_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_icono_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idmenu_movil_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmenu_movil_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aplicacion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aplicacion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clase_css_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clase_css_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comportamiento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comportamiento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruta_imagen_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruta_imagen_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enlace_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enlace_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["titulo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tema_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tema_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icono_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icono_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_icono_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_icono_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo_" + iSeqRow]["change"]) {
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
  if ("comportamiento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("posicion_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tema_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("icono_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("posicion_icono_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_0_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("comportamiento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("posicion_" + iSeq == fieldName) {
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
  $('#id_sc_field_idmenu_movil_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_idmenu_movil__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_menu_movil_idmenu_movil__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_menu_movil_idmenu_movil__onfocus(this, iSeqRow) });
  $('#id_sc_field_aplicacion_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_aplicacion__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_menu_movil_aplicacion__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_menu_movil_aplicacion__onfocus(this, iSeqRow) });
  $('#id_sc_field_enlace_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_enlace__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_menu_movil_enlace__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_menu_movil_enlace__onfocus(this, iSeqRow) });
  $('#id_sc_field_titulo_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_titulo__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_menu_movil_titulo__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_menu_movil_titulo__onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_posicion__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_menu_movil_posicion__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_menu_movil_posicion__onfocus(this, iSeqRow) });
  $('#id_sc_field_tema_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_tema__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_menu_movil_tema__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_menu_movil_tema__onfocus(this, iSeqRow) });
  $('#id_sc_field_icono_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_icono__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_menu_movil_icono__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_menu_movil_icono__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_sc_field_0__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_menu_movil_sc_field_0__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_menu_movil_sc_field_0__onfocus(this, iSeqRow) });
  $('#id_sc_field_activo_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_activo__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_menu_movil_activo__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_menu_movil_activo__onfocus(this, iSeqRow) });
  $('#id_sc_field_creado_' + iSeqRow).bind('change', function() { sc_form_menu_movil_creado__onchange(this, iSeqRow) });
  $('#id_sc_field_creado__hora' + iSeqRow).bind('change', function() { sc_form_menu_movil_creado__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_actualizado_' + iSeqRow).bind('change', function() { sc_form_menu_movil_actualizado__onchange(this, iSeqRow) });
  $('#id_sc_field_actualizado__hora' + iSeqRow).bind('change', function() { sc_form_menu_movil_actualizado__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_menu_movil_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_menu_movil_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_clase_css_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_clase_css__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_menu_movil_clase_css__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_menu_movil_clase_css__onfocus(this, iSeqRow) });
  $('#id_sc_field_comportamiento_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_comportamiento__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_menu_movil_comportamiento__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_menu_movil_comportamiento__onfocus(this, iSeqRow) });
  $('#id_sc_field_ruta_imagen_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_ruta_imagen__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_menu_movil_ruta_imagen__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_menu_movil_ruta_imagen__onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_icono_' + iSeqRow).bind('blur', function() { sc_form_menu_movil_posicion_icono__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_menu_movil_posicion_icono__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_menu_movil_posicion_icono__onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-activo_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_menu_movil_idmenu_movil__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_idmenu_movil_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_idmenu_movil__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_idmenu_movil__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_aplicacion__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_aplicacion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_aplicacion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_aplicacion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_enlace__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_enlace_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_enlace__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_enlace__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_titulo__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_titulo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_titulo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_titulo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_posicion__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_posicion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_posicion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_menu_movil_event_posicion__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_posicion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_tema__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_tema_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_tema__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_tema__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_icono__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_icono_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_icono__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_icono__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_sc_field_0__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_sc_field_0_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_sc_field_0__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_recarga_form('bloco_0', 0);
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_sc_field_0__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_activo__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_activo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_activo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_activo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_creado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_menu_movil_creado__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_menu_movil_actualizado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_menu_movil_actualizado__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_menu_movil_id__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_id__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_clase_css__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_clase_css_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_clase_css__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_clase_css__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_comportamiento__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_comportamiento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_comportamiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_menu_movil_event_comportamiento__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_comportamiento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_ruta_imagen__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_ruta_imagen_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_ruta_imagen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_ruta_imagen__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_menu_movil_posicion_icono__onblur(oThis, iSeqRow) {
  do_ajax_form_menu_movil_validate_posicion_icono_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_menu_movil_posicion_icono__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_menu_movil_posicion_icono__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idmenu_movil_", "", status);
	displayChange_field("aplicacion_", "", status);
	displayChange_field("id_", "", status);
	displayChange_field("clase_css_", "", status);
	displayChange_field("comportamiento_", "", status);
	displayChange_field("ruta_imagen_", "", status);
	displayChange_field("enlace_", "", status);
	displayChange_field("titulo_", "", status);
	displayChange_field("posicion_", "", status);
	displayChange_field("tema_", "", status);
	displayChange_field("icono_", "", status);
	displayChange_field("posicion_icono_", "", status);
	displayChange_field("sc_field_0_", "", status);
	displayChange_field("activo_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idmenu_movil_(row, status);
	displayChange_field_aplicacion_(row, status);
	displayChange_field_id_(row, status);
	displayChange_field_clase_css_(row, status);
	displayChange_field_comportamiento_(row, status);
	displayChange_field_ruta_imagen_(row, status);
	displayChange_field_enlace_(row, status);
	displayChange_field_titulo_(row, status);
	displayChange_field_posicion_(row, status);
	displayChange_field_tema_(row, status);
	displayChange_field_icono_(row, status);
	displayChange_field_posicion_icono_(row, status);
	displayChange_field_sc_field_0_(row, status);
	displayChange_field_activo_(row, status);
}

function displayChange_field(field, row, status) {
	if ("idmenu_movil_" == field) {
		displayChange_field_idmenu_movil_(row, status);
	}
	if ("aplicacion_" == field) {
		displayChange_field_aplicacion_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("clase_css_" == field) {
		displayChange_field_clase_css_(row, status);
	}
	if ("comportamiento_" == field) {
		displayChange_field_comportamiento_(row, status);
	}
	if ("ruta_imagen_" == field) {
		displayChange_field_ruta_imagen_(row, status);
	}
	if ("enlace_" == field) {
		displayChange_field_enlace_(row, status);
	}
	if ("titulo_" == field) {
		displayChange_field_titulo_(row, status);
	}
	if ("posicion_" == field) {
		displayChange_field_posicion_(row, status);
	}
	if ("tema_" == field) {
		displayChange_field_tema_(row, status);
	}
	if ("icono_" == field) {
		displayChange_field_icono_(row, status);
	}
	if ("posicion_icono_" == field) {
		displayChange_field_posicion_icono_(row, status);
	}
	if ("sc_field_0_" == field) {
		displayChange_field_sc_field_0_(row, status);
	}
	if ("activo_" == field) {
		displayChange_field_activo_(row, status);
	}
}

function displayChange_field_idmenu_movil_(row, status) {
}

function displayChange_field_aplicacion_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_clase_css_(row, status) {
}

function displayChange_field_comportamiento_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_comportamiento___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_comportamiento_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "comportamiento_");
	}
}

function displayChange_field_ruta_imagen_(row, status) {
}

function displayChange_field_enlace_(row, status) {
}

function displayChange_field_titulo_(row, status) {
}

function displayChange_field_posicion_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_posicion___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_posicion_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "posicion_");
	}
}

function displayChange_field_tema_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tema___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tema_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tema_");
	}
}

function displayChange_field_icono_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_icono___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_icono_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "icono_");
	}
}

function displayChange_field_posicion_icono_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_posicion_icono___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_posicion_icono_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "posicion_icono_");
	}
}

function displayChange_field_sc_field_0_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sc_field_0___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sc_field_0_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sc_field_0_");
	}
}

function displayChange_field_activo_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_comportamiento_("all", "on");
	displayChange_field_posicion_("all", "on");
	displayChange_field_tema_("all", "on");
	displayChange_field_icono_("all", "on");
	displayChange_field_posicion_icono_("all", "on");
	displayChange_field_sc_field_0_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_menu_movil_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_creado_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_creado_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['creado_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_menu_movil_validate_creado_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_actualizado_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_actualizado_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['actualizado_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizado_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_menu_movil_validate_actualizado_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizado_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_menu_movil')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "comportamiento_" == specificField) {
    scJQSelect2Add_comportamiento_(seqRow);
  }
  if (null == specificField || "posicion_" == specificField) {
    scJQSelect2Add_posicion_(seqRow);
  }
  if (null == specificField || "tema_" == specificField) {
    scJQSelect2Add_tema_(seqRow);
  }
  if (null == specificField || "icono_" == specificField) {
    scJQSelect2Add_icono_(seqRow);
  }
  if (null == specificField || "posicion_icono_" == specificField) {
    scJQSelect2Add_posicion_icono_(seqRow);
  }
  if (null == specificField || "sc_field_0_" == specificField) {
    scJQSelect2Add_sc_field_0_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_comportamiento_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_comportamiento__obj" : "#id_sc_field_comportamiento_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_comportamiento__obj',
      dropdownCssClass: 'css_comportamiento__obj',
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

function scJQSelect2Add_posicion_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_posicion__obj" : "#id_sc_field_posicion_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_posicion__obj',
      dropdownCssClass: 'css_posicion__obj',
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

function scJQSelect2Add_tema_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tema__obj" : "#id_sc_field_tema_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tema__obj',
      dropdownCssClass: 'css_tema__obj',
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

function scJQSelect2Add_icono_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_icono__obj" : "#id_sc_field_icono_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_icono__obj',
      dropdownCssClass: 'css_icono__obj',
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

function scJQSelect2Add_posicion_icono_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_posicion_icono__obj" : "#id_sc_field_posicion_icono_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_posicion_icono__obj',
      dropdownCssClass: 'css_posicion_icono__obj',
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

function scJQSelect2Add_sc_field_0_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sc_field_0__obj" : "#id_sc_field_sc_field_0_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sc_field_0__obj',
      dropdownCssClass: 'css_sc_field_0__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_comportamiento_) { displayChange_field_comportamiento_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_posicion_) { displayChange_field_posicion_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tema_) { displayChange_field_tema_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_icono_) { displayChange_field_icono_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_posicion_icono_) { displayChange_field_posicion_icono_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sc_field_0_) { displayChange_field_sc_field_0_(iLine, "on"); } }, 150);
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

