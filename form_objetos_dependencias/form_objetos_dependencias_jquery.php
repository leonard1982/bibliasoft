
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

  $('#sc-ui-checkbox-ver_-control').click(function() { scJQCheckboxControl('ver_', '__ALL__', this); });

  $('#sc-ui-checkbox-crear_-control').click(function() { scJQCheckboxControl('crear_', '__ALL__', this); });

  $('#sc-ui-checkbox-editar_-control').click(function() { scJQCheckboxControl('editar_', '__ALL__', this); });

  $('#sc-ui-checkbox-eliminar_-control').click(function() { scJQCheckboxControl('eliminar_', '__ALL__', this); });

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
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
  scEventControl_data["objeto_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nombre_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ubicacion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ver_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["crear_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["editar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eliminar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["objeto_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["objeto_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ubicacion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ubicacion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["crear_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["crear_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["editar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["editar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eliminar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eliminar_" + iSeqRow]["change"]) {
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
  if ("objeto_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_objeto_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_objeto__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_objetos_dependencias_objeto__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_objetos_dependencias_objeto__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_tipo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_objetos_dependencias_tipo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_objetos_dependencias_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_nombre__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_objetos_dependencias_nombre__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_objetos_dependencias_nombre__onfocus(this, iSeqRow) });
  $('#id_sc_field_ubicacion_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_ubicacion__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_objetos_dependencias_ubicacion__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_objetos_dependencias_ubicacion__onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_ver__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_objetos_dependencias_ver__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_objetos_dependencias_ver__onfocus(this, iSeqRow) });
  $('#id_sc_field_crear_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_crear__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_objetos_dependencias_crear__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_objetos_dependencias_crear__onfocus(this, iSeqRow) });
  $('#id_sc_field_editar_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_editar__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_objetos_dependencias_editar__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_objetos_dependencias_editar__onfocus(this, iSeqRow) });
  $('#id_sc_field_eliminar_' + iSeqRow).bind('blur', function() { sc_form_objetos_dependencias_eliminar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_objetos_dependencias_eliminar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_objetos_dependencias_eliminar__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_objetos_dependencias_objeto__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_objeto_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_objeto__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_objeto__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_tipo__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_tipo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_nombre__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_nombre_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_nombre__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_nombre__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_ubicacion__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_ubicacion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_ubicacion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_ubicacion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_ver__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_ver_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_ver__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_ver__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_crear__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_crear_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_crear__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_crear__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_editar__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_editar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_editar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_editar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_eliminar__onblur(oThis, iSeqRow) {
  do_ajax_form_objetos_dependencias_validate_eliminar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_objetos_dependencias_eliminar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_objetos_dependencias_eliminar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'ver_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_ver_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'ver_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'crear_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_crear_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'crear_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'editar_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_editar_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'editar_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'eliminar_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_eliminar_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'eliminar_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_ver_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-ver_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-ver_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_ver_

function scJQCheckboxControl_crear_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-crear_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-crear_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_crear_

function scJQCheckboxControl_editar_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-editar_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-editar_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_editar_

function scJQCheckboxControl_eliminar_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-eliminar_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-eliminar_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_eliminar_

