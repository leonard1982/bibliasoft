
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
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_prefijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_prueba" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inicial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["final" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vigencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consecutivo_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["head_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foot_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_prefijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_prefijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_prueba" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_prueba" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inicial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inicial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["final" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["final" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vigencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vigencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consecutivo_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consecutivo_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["head_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["head_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foot_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foot_note" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_empresa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_prefijo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_resolucion" + iSeq == fieldName) {
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
  $('#id_sc_field_id_prefijo' + iSeqRow).bind('change', function() { sc_form_cloud_prefijos_id_prefijo_onchange(this, iSeqRow) });
  $('#id_sc_field_prefijo' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_prefijo_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_prefijos_prefijo_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_prefijos_prefijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_id_empresa_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_prefijos_id_empresa_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_prefijos_id_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_prefijo' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_cod_prefijo_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_prefijos_cod_prefijo_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_prefijos_cod_prefijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_tipo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cloud_prefijos_tipo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cloud_prefijos_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_prueba' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_prefijo_prueba_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cloud_prefijos_prefijo_prueba_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cloud_prefijos_prefijo_prueba_onfocus(this, iSeqRow) });
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_resolucion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_prefijos_resolucion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_prefijos_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_fecha_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cloud_prefijos_fecha_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cloud_prefijos_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_inicial' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_inicial_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_prefijos_inicial_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_prefijos_inicial_onfocus(this, iSeqRow) });
  $('#id_sc_field_final' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_final_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cloud_prefijos_final_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cloud_prefijos_final_onfocus(this, iSeqRow) });
  $('#id_sc_field_vigencia' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_vigencia_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cloud_prefijos_vigencia_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cloud_prefijos_vigencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_resolucion' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_tipo_resolucion_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_cloud_prefijos_tipo_resolucion_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_cloud_prefijos_tipo_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_activa' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_activa_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_prefijos_activa_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_prefijos_activa_onfocus(this, iSeqRow) });
  $('#id_sc_field_contador' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_contador_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cloud_prefijos_contador_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cloud_prefijos_contador_onfocus(this, iSeqRow) });
  $('#id_sc_field_consecutivo_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_consecutivo_pruebas_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_cloud_prefijos_consecutivo_pruebas_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_cloud_prefijos_consecutivo_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_head_note' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_head_note_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_prefijos_head_note_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_prefijos_head_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_foot_note' + iSeqRow).bind('blur', function() { sc_form_cloud_prefijos_foot_note_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_prefijos_foot_note_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_prefijos_foot_note_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-activa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_cloud_prefijos_id_prefijo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_prefijo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_prefijo();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_prefijo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_prefijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_id_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_id_empresa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_id_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_cod_prefijo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_cod_prefijo();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_cod_prefijo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_cod_prefijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_tipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_prefijo_prueba_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_prefijo_prueba();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_prefijo_prueba_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_prefijo_prueba_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_resolucion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_inicial_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_inicial();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_inicial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_inicial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_final_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_final();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_final_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_final_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_vigencia_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_vigencia();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_vigencia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_vigencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_tipo_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_tipo_resolucion();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_tipo_resolucion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_tipo_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_activa_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_activa();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_activa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_activa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_contador_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_contador();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_contador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_contador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_consecutivo_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_consecutivo_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_consecutivo_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_consecutivo_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_head_note_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_head_note();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_head_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_head_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_prefijos_foot_note_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_prefijos_validate_foot_note();
  scCssBlur(oThis);
}

function sc_form_cloud_prefijos_foot_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_prefijos_foot_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_empresa", "", status);
	displayChange_field("tipo", "", status);
	displayChange_field("cod_prefijo", "", status);
	displayChange_field("prefijo", "", status);
	displayChange_field("prefijo_prueba", "", status);
	displayChange_field("resolucion", "", status);
	displayChange_field("fecha", "", status);
	displayChange_field("inicial", "", status);
	displayChange_field("final", "", status);
	displayChange_field("vigencia", "", status);
	displayChange_field("tipo_resolucion", "", status);
	displayChange_field("activa", "", status);
	displayChange_field("contador", "", status);
	displayChange_field("consecutivo_pruebas", "", status);
	displayChange_field("head_note", "", status);
	displayChange_field("foot_note", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_empresa(row, status);
	displayChange_field_tipo(row, status);
	displayChange_field_cod_prefijo(row, status);
	displayChange_field_prefijo(row, status);
	displayChange_field_prefijo_prueba(row, status);
	displayChange_field_resolucion(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_inicial(row, status);
	displayChange_field_final(row, status);
	displayChange_field_vigencia(row, status);
	displayChange_field_tipo_resolucion(row, status);
	displayChange_field_activa(row, status);
	displayChange_field_contador(row, status);
	displayChange_field_consecutivo_pruebas(row, status);
	displayChange_field_head_note(row, status);
	displayChange_field_foot_note(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_empresa" == field) {
		displayChange_field_id_empresa(row, status);
	}
	if ("tipo" == field) {
		displayChange_field_tipo(row, status);
	}
	if ("cod_prefijo" == field) {
		displayChange_field_cod_prefijo(row, status);
	}
	if ("prefijo" == field) {
		displayChange_field_prefijo(row, status);
	}
	if ("prefijo_prueba" == field) {
		displayChange_field_prefijo_prueba(row, status);
	}
	if ("resolucion" == field) {
		displayChange_field_resolucion(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("inicial" == field) {
		displayChange_field_inicial(row, status);
	}
	if ("final" == field) {
		displayChange_field_final(row, status);
	}
	if ("vigencia" == field) {
		displayChange_field_vigencia(row, status);
	}
	if ("tipo_resolucion" == field) {
		displayChange_field_tipo_resolucion(row, status);
	}
	if ("activa" == field) {
		displayChange_field_activa(row, status);
	}
	if ("contador" == field) {
		displayChange_field_contador(row, status);
	}
	if ("consecutivo_pruebas" == field) {
		displayChange_field_consecutivo_pruebas(row, status);
	}
	if ("head_note" == field) {
		displayChange_field_head_note(row, status);
	}
	if ("foot_note" == field) {
		displayChange_field_foot_note(row, status);
	}
}

function displayChange_field_id_empresa(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_empresa__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_empresa" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_empresa");
	}
}

function displayChange_field_tipo(row, status) {
}

function displayChange_field_cod_prefijo(row, status) {
}

function displayChange_field_prefijo(row, status) {
}

function displayChange_field_prefijo_prueba(row, status) {
}

function displayChange_field_resolucion(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_inicial(row, status) {
}

function displayChange_field_final(row, status) {
}

function displayChange_field_vigencia(row, status) {
}

function displayChange_field_tipo_resolucion(row, status) {
}

function displayChange_field_activa(row, status) {
}

function displayChange_field_contador(row, status) {
}

function displayChange_field_consecutivo_pruebas(row, status) {
}

function displayChange_field_head_note(row, status) {
}

function displayChange_field_foot_note(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_id_empresa("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cloud_prefijos_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cloud_prefijos_validate_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_cloud_prefijos')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "id_empresa" == specificField) {
    scJQSelect2Add_id_empresa(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_empresa(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_empresa_obj" : "#id_sc_field_id_empresa" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_id_empresa_obj',
      dropdownCssClass: 'css_id_empresa_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_id_empresa) { displayChange_field_id_empresa(iLine, "on"); } }, 150);
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

