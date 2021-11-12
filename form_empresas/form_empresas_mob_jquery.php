
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
  scEventControl_data["idempresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["creada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sinmovimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["copiada_como" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_negocio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["predeterminada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comentario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entorno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codempresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa_nomina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idempresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idempresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["creada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["creada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sinmovimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sinmovimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["copiada_como" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["copiada_como" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_negocio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_negocio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["predeterminada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["predeterminada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comentario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comentario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codempresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codempresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_nomina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_nomina" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("copiada_como" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_negocio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("entorno" + iSeq == fieldName) {
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
  $('#id_sc_field_idempresa' + iSeqRow).bind('blur', function() { sc_form_empresas_idempresa_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_empresas_idempresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_empresas_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresas_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa' + iSeqRow).bind('blur', function() { sc_form_empresas_nombre_empresa_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_empresas_nombre_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_empresas_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_empresas_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_creada' + iSeqRow).bind('blur', function() { sc_form_empresas_creada_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresas_creada_onfocus(this, iSeqRow) });
  $('#id_sc_field_creada_hora' + iSeqRow).bind('blur', function() { sc_form_empresas_creada_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_empresas_creada_onfocus(this, iSeqRow) });
  $('#id_sc_field_copiada_como' + iSeqRow).bind('blur', function() { sc_form_empresas_copiada_como_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_empresas_copiada_como_onfocus(this, iSeqRow) });
  $('#id_sc_field_sinmovimiento' + iSeqRow).bind('blur', function() { sc_form_empresas_sinmovimiento_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_empresas_sinmovimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_negocio' + iSeqRow).bind('blur', function() { sc_form_empresas_tipo_negocio_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_empresas_tipo_negocio_onfocus(this, iSeqRow) });
  $('#id_sc_field_predeterminada' + iSeqRow).bind('blur', function() { sc_form_empresas_predeterminada_onblur(this, iSeqRow) })
                                            .bind('click', function() { sc_form_empresas_predeterminada_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_empresas_predeterminada_onfocus(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('blur', function() { sc_form_empresas_password_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_empresas_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_nit' + iSeqRow).bind('blur', function() { sc_form_empresas_nit_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_empresas_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_empresas_correo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresas_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_comentario' + iSeqRow).bind('blur', function() { sc_form_empresas_comentario_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_empresas_comentario_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_empresas_celular_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresas_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_codempresa' + iSeqRow).bind('blur', function() { sc_form_empresas_codempresa_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_empresas_codempresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomina' + iSeqRow).bind('blur', function() { sc_form_empresas_nomina_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_empresas_nomina_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa_nomina' + iSeqRow).bind('blur', function() { sc_form_empresas_nombre_empresa_nomina_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_empresas_nombre_empresa_nomina_onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno' + iSeqRow).bind('blur', function() { sc_form_empresas_entorno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_empresas_entorno_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-sinmovimiento' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-predeterminada' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nomina' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_empresas_idempresa_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_idempresa();
  scCssBlur(oThis);
}

function sc_form_empresas_idempresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_empresas_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_nombre_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_nombre_empresa();
  scCssBlur(oThis);
}

function sc_form_empresas_nombre_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_empresas_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_creada_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_creada();
  scCssBlur(oThis);
}

function sc_form_empresas_creada_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_creada();
  scCssBlur(oThis);
}

function sc_form_empresas_creada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_creada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_copiada_como_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_copiada_como();
  scCssBlur(oThis);
}

function sc_form_empresas_copiada_como_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_sinmovimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_sinmovimiento();
  scCssBlur(oThis);
}

function sc_form_empresas_sinmovimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_tipo_negocio_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_tipo_negocio();
  scCssBlur(oThis);
}

function sc_form_empresas_tipo_negocio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_predeterminada_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_predeterminada();
  scCssBlur(oThis);
}

function sc_form_empresas_predeterminada_onclick(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_event_predeterminada_onclick();
}

function sc_form_empresas_predeterminada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_password_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_password();
  scCssBlur(oThis);
}

function sc_form_empresas_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_nit_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_nit();
  scCssBlur(oThis);
}

function sc_form_empresas_nit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_correo();
  scCssBlur(oThis);
}

function sc_form_empresas_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_comentario_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_comentario();
  scCssBlur(oThis);
}

function sc_form_empresas_comentario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_celular();
  scCssBlur(oThis);
}

function sc_form_empresas_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_codempresa_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_codempresa();
  scCssBlur(oThis);
}

function sc_form_empresas_codempresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_nomina_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_nomina();
  scCssBlur(oThis);
}

function sc_form_empresas_nomina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_nombre_empresa_nomina_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_nombre_empresa_nomina();
  scCssBlur(oThis);
}

function sc_form_empresas_nombre_empresa_nomina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_empresas_entorno_onblur(oThis, iSeqRow) {
  do_ajax_form_empresas_mob_validate_entorno();
  scCssBlur(oThis);
}

function sc_form_empresas_entorno_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("idempresa", "", status);
	displayChange_field("nit", "", status);
	displayChange_field("nombre", "", status);
	displayChange_field("nombre_empresa", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("creada", "", status);
	displayChange_field("sinmovimiento", "", status);
	displayChange_field("copiada_como", "", status);
	displayChange_field("tipo_negocio", "", status);
	displayChange_field("predeterminada", "", status);
	displayChange_field("password", "", status);
	displayChange_field("celular", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("comentario", "", status);
	displayChange_field("entorno", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nomina", "", status);
	displayChange_field("codempresa", "", status);
	displayChange_field("nombre_empresa_nomina", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idempresa(row, status);
	displayChange_field_nit(row, status);
	displayChange_field_nombre(row, status);
	displayChange_field_nombre_empresa(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_creada(row, status);
	displayChange_field_sinmovimiento(row, status);
	displayChange_field_copiada_como(row, status);
	displayChange_field_tipo_negocio(row, status);
	displayChange_field_predeterminada(row, status);
	displayChange_field_password(row, status);
	displayChange_field_celular(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_comentario(row, status);
	displayChange_field_entorno(row, status);
	displayChange_field_nomina(row, status);
	displayChange_field_codempresa(row, status);
	displayChange_field_nombre_empresa_nomina(row, status);
}

function displayChange_field(field, row, status) {
	if ("idempresa" == field) {
		displayChange_field_idempresa(row, status);
	}
	if ("nit" == field) {
		displayChange_field_nit(row, status);
	}
	if ("nombre" == field) {
		displayChange_field_nombre(row, status);
	}
	if ("nombre_empresa" == field) {
		displayChange_field_nombre_empresa(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("creada" == field) {
		displayChange_field_creada(row, status);
	}
	if ("sinmovimiento" == field) {
		displayChange_field_sinmovimiento(row, status);
	}
	if ("copiada_como" == field) {
		displayChange_field_copiada_como(row, status);
	}
	if ("tipo_negocio" == field) {
		displayChange_field_tipo_negocio(row, status);
	}
	if ("predeterminada" == field) {
		displayChange_field_predeterminada(row, status);
	}
	if ("password" == field) {
		displayChange_field_password(row, status);
	}
	if ("celular" == field) {
		displayChange_field_celular(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("comentario" == field) {
		displayChange_field_comentario(row, status);
	}
	if ("entorno" == field) {
		displayChange_field_entorno(row, status);
	}
	if ("nomina" == field) {
		displayChange_field_nomina(row, status);
	}
	if ("codempresa" == field) {
		displayChange_field_codempresa(row, status);
	}
	if ("nombre_empresa_nomina" == field) {
		displayChange_field_nombre_empresa_nomina(row, status);
	}
}

function displayChange_field_idempresa(row, status) {
}

function displayChange_field_nit(row, status) {
}

function displayChange_field_nombre(row, status) {
}

function displayChange_field_nombre_empresa(row, status) {
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_creada(row, status) {
}

function displayChange_field_sinmovimiento(row, status) {
}

function displayChange_field_copiada_como(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_copiada_como__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_copiada_como" + row).select2("destroy");
		}
		scJQSelect2Add(row, "copiada_como");
	}
}

function displayChange_field_tipo_negocio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_negocio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_negocio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_negocio");
	}
}

function displayChange_field_predeterminada(row, status) {
}

function displayChange_field_password(row, status) {
}

function displayChange_field_celular(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_comentario(row, status) {
}

function displayChange_field_entorno(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_entorno__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_entorno" + row).select2("destroy");
		}
		scJQSelect2Add(row, "entorno");
	}
}

function displayChange_field_nomina(row, status) {
}

function displayChange_field_codempresa(row, status) {
}

function displayChange_field_nombre_empresa_nomina(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_copiada_como("all", "on");
	displayChange_field_tipo_negocio("all", "on");
	displayChange_field_entorno("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_empresas_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_actualizada" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_actualizada" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['actualizada']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizada']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_empresas_mob_validate_actualizada(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['actualizada']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_empresas_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "copiada_como" == specificField) {
    scJQSelect2Add_copiada_como(seqRow);
  }
  if (null == specificField || "tipo_negocio" == specificField) {
    scJQSelect2Add_tipo_negocio(seqRow);
  }
  if (null == specificField || "entorno" == specificField) {
    scJQSelect2Add_entorno(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_copiada_como(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_copiada_como_obj" : "#id_sc_field_copiada_como" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_copiada_como_obj',
      dropdownCssClass: 'css_copiada_como_obj',
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

function scJQSelect2Add_tipo_negocio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_negocio_obj" : "#id_sc_field_tipo_negocio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_negocio_obj',
      dropdownCssClass: 'css_tipo_negocio_obj',
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

function scJQSelect2Add_entorno(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_entorno_obj" : "#id_sc_field_entorno" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_entorno_obj',
      dropdownCssClass: 'css_entorno_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_copiada_como) { displayChange_field_copiada_como(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_negocio) { displayChange_field_tipo_negocio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_entorno) { displayChange_field_entorno(iLine, "on"); } }, 150);
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

