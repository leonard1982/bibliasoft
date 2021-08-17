
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
  scEventControl_data["idconfprintpos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_doc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_fuente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_tamanio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcentajeopx" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_cabecera" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_pie" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archo_ticket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ticket_pjopx" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["predeterminada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_vista" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["impresion_directa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_impresora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_impresora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idconfprintpos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idconfprintpos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_doc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_doc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_fuente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_fuente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_tamanio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_tamanio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentajeopx" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentajeopx" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["logo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["logo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_cabecera" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_cabecera" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_pie" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_pie" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["archo_ticket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["archo_ticket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ticket_pjopx" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ticket_pjopx" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["predeterminada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["predeterminada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_vista" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_vista" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["impresion_directa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["impresion_directa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_impresora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_impresora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_impresora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_impresora" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_doc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("texto_fuente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("predeterminada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_vista" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_impresora" + iSeq == fieldName) {
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
  $('#id_sc_field_idconfprintpos' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_idconfprintpos_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_configuraciones_print_pos_idconfprintpos_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_configuraciones_print_pos_idconfprintpos_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_tamanio' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_texto_tamanio_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_print_pos_texto_tamanio_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_print_pos_texto_tamanio_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_fuente' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_texto_fuente_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_configuraciones_print_pos_texto_fuente_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_configuraciones_print_pos_texto_fuente_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_logo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_configuraciones_print_pos_logo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_configuraciones_print_pos_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_cabecera' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_texto_cabecera_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_configuraciones_print_pos_texto_cabecera_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_configuraciones_print_pos_texto_cabecera_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_pie' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_texto_pie_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_print_pos_texto_pie_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_print_pos_texto_pie_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentajeopx' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_porcentajeopx_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_print_pos_porcentajeopx_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_print_pos_porcentajeopx_onfocus(this, iSeqRow) });
  $('#id_sc_field_archo_ticket' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_archo_ticket_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_configuraciones_print_pos_archo_ticket_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_configuraciones_print_pos_archo_ticket_onfocus(this, iSeqRow) });
  $('#id_sc_field_ticket_pjopx' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_ticket_pjopx_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_configuraciones_print_pos_ticket_pjopx_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_configuraciones_print_pos_ticket_pjopx_onfocus(this, iSeqRow) });
  $('#id_sc_field_predeterminada' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_predeterminada_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_configuraciones_print_pos_predeterminada_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_configuraciones_print_pos_predeterminada_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_vista' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_tipo_vista_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_print_pos_tipo_vista_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_print_pos_tipo_vista_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_doc' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_tipo_doc_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_configuraciones_print_pos_tipo_doc_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_configuraciones_print_pos_tipo_doc_onfocus(this, iSeqRow) });
  $('#id_sc_field_impresion_directa' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_impresion_directa_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_configuraciones_print_pos_impresion_directa_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_configuraciones_print_pos_impresion_directa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_impresora' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_tipo_impresora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_configuraciones_print_pos_tipo_impresora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_configuraciones_print_pos_tipo_impresora_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_impresora' + iSeqRow).bind('blur', function() { sc_form_configuraciones_print_pos_nombre_impresora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_print_pos_nombre_impresora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_print_pos_nombre_impresora_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-porcentajeopx' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-logo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-ticket_pjopx' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-impresion_directa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_configuraciones_print_pos_idconfprintpos_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_idconfprintpos();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_idconfprintpos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_idconfprintpos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_texto_tamanio_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_texto_tamanio();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_texto_tamanio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_texto_tamanio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_texto_fuente_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_texto_fuente();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_texto_fuente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_texto_fuente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_logo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_logo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_logo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_logo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_texto_cabecera_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_texto_cabecera();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_texto_cabecera_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_texto_cabecera_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_texto_pie_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_texto_pie();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_texto_pie_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_texto_pie_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_porcentajeopx_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_porcentajeopx();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_porcentajeopx_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_porcentajeopx_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_archo_ticket_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_archo_ticket();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_archo_ticket_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_archo_ticket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_ticket_pjopx_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_ticket_pjopx();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_ticket_pjopx_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_ticket_pjopx_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_predeterminada_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_predeterminada();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_predeterminada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_predeterminada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_tipo_vista_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_tipo_vista();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_tipo_vista_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_tipo_vista_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_tipo_doc_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_tipo_doc();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_tipo_doc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_tipo_doc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_impresion_directa_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_impresion_directa();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_impresion_directa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_impresion_directa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_tipo_impresora_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_tipo_impresora();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_tipo_impresora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_tipo_impresora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_print_pos_nombre_impresora_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_print_pos_validate_nombre_impresora();
  scCssBlur(oThis);
}

function sc_form_configuraciones_print_pos_nombre_impresora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_print_pos_nombre_impresora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idconfprintpos", "", status);
	displayChange_field("tipo_doc", "", status);
	displayChange_field("texto_fuente", "", status);
	displayChange_field("texto_tamanio", "", status);
	displayChange_field("porcentajeopx", "", status);
	displayChange_field("logo", "", status);
	displayChange_field("texto_cabecera", "", status);
	displayChange_field("texto_pie", "", status);
	displayChange_field("archo_ticket", "", status);
	displayChange_field("ticket_pjopx", "", status);
	displayChange_field("predeterminada", "", status);
	displayChange_field("tipo_vista", "", status);
	displayChange_field("impresion_directa", "", status);
	displayChange_field("tipo_impresora", "", status);
	displayChange_field("nombre_impresora", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idconfprintpos(row, status);
	displayChange_field_tipo_doc(row, status);
	displayChange_field_texto_fuente(row, status);
	displayChange_field_texto_tamanio(row, status);
	displayChange_field_porcentajeopx(row, status);
	displayChange_field_logo(row, status);
	displayChange_field_texto_cabecera(row, status);
	displayChange_field_texto_pie(row, status);
	displayChange_field_archo_ticket(row, status);
	displayChange_field_ticket_pjopx(row, status);
	displayChange_field_predeterminada(row, status);
	displayChange_field_tipo_vista(row, status);
	displayChange_field_impresion_directa(row, status);
	displayChange_field_tipo_impresora(row, status);
	displayChange_field_nombre_impresora(row, status);
}

function displayChange_field(field, row, status) {
	if ("idconfprintpos" == field) {
		displayChange_field_idconfprintpos(row, status);
	}
	if ("tipo_doc" == field) {
		displayChange_field_tipo_doc(row, status);
	}
	if ("texto_fuente" == field) {
		displayChange_field_texto_fuente(row, status);
	}
	if ("texto_tamanio" == field) {
		displayChange_field_texto_tamanio(row, status);
	}
	if ("porcentajeopx" == field) {
		displayChange_field_porcentajeopx(row, status);
	}
	if ("logo" == field) {
		displayChange_field_logo(row, status);
	}
	if ("texto_cabecera" == field) {
		displayChange_field_texto_cabecera(row, status);
	}
	if ("texto_pie" == field) {
		displayChange_field_texto_pie(row, status);
	}
	if ("archo_ticket" == field) {
		displayChange_field_archo_ticket(row, status);
	}
	if ("ticket_pjopx" == field) {
		displayChange_field_ticket_pjopx(row, status);
	}
	if ("predeterminada" == field) {
		displayChange_field_predeterminada(row, status);
	}
	if ("tipo_vista" == field) {
		displayChange_field_tipo_vista(row, status);
	}
	if ("impresion_directa" == field) {
		displayChange_field_impresion_directa(row, status);
	}
	if ("tipo_impresora" == field) {
		displayChange_field_tipo_impresora(row, status);
	}
	if ("nombre_impresora" == field) {
		displayChange_field_nombre_impresora(row, status);
	}
}

function displayChange_field_idconfprintpos(row, status) {
}

function displayChange_field_tipo_doc(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_doc__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_doc" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_doc");
	}
}

function displayChange_field_texto_fuente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_texto_fuente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_texto_fuente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "texto_fuente");
	}
}

function displayChange_field_texto_tamanio(row, status) {
}

function displayChange_field_porcentajeopx(row, status) {
}

function displayChange_field_logo(row, status) {
}

function displayChange_field_texto_cabecera(row, status) {
}

function displayChange_field_texto_pie(row, status) {
}

function displayChange_field_archo_ticket(row, status) {
}

function displayChange_field_ticket_pjopx(row, status) {
}

function displayChange_field_predeterminada(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_predeterminada__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_predeterminada" + row).select2("destroy");
		}
		scJQSelect2Add(row, "predeterminada");
	}
}

function displayChange_field_tipo_vista(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_vista__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_vista" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_vista");
	}
}

function displayChange_field_impresion_directa(row, status) {
}

function displayChange_field_tipo_impresora(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_impresora__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_impresora" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_impresora");
	}
}

function displayChange_field_nombre_impresora(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_tipo_doc("all", "on");
	displayChange_field_texto_fuente("all", "on");
	displayChange_field_predeterminada("all", "on");
	displayChange_field_tipo_vista("all", "on");
	displayChange_field_tipo_impresora("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_configuraciones_print_pos_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(38);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_texto_tamanio" + iSeqRow).spinner({
    max: 999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_archo_ticket" + iSeqRow).spinner({
    max: 999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['texto_cabecera']) && $this->nmgp_cmp_readonly['texto_cabecera'] == 'on')
{
    unset($this->nmgp_cmp_readonly['texto_cabecera']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "undo,redo,separator,styleselect,separator,bold,italic,separator,alignleft,aligncenter,alignright,alignjustify,separator,bullist,numlist,outdent,indent,separator,link,image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_texto_cabecera" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="texto_cabecera' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['texto_pie']) && $this->nmgp_cmp_readonly['texto_pie'] == 'on')
{
    unset($this->nmgp_cmp_readonly['texto_pie']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "undo,redo,separator,styleselect,separator,bold,italic,separator,alignleft,aligncenter,alignright,alignjustify,separator,bullist,numlist,outdent,indent,separator,link,image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_texto_pie" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="texto_pie' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_configuraciones_print_pos')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo_doc" == specificField) {
    scJQSelect2Add_tipo_doc(seqRow);
  }
  if (null == specificField || "texto_fuente" == specificField) {
    scJQSelect2Add_texto_fuente(seqRow);
  }
  if (null == specificField || "predeterminada" == specificField) {
    scJQSelect2Add_predeterminada(seqRow);
  }
  if (null == specificField || "tipo_vista" == specificField) {
    scJQSelect2Add_tipo_vista(seqRow);
  }
  if (null == specificField || "tipo_impresora" == specificField) {
    scJQSelect2Add_tipo_impresora(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo_doc(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_doc_obj" : "#id_sc_field_tipo_doc" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_doc_obj',
      dropdownCssClass: 'css_tipo_doc_obj',
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

function scJQSelect2Add_texto_fuente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_texto_fuente_obj" : "#id_sc_field_texto_fuente" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_texto_fuente_obj',
      dropdownCssClass: 'css_texto_fuente_obj',
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

function scJQSelect2Add_predeterminada(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_predeterminada_obj" : "#id_sc_field_predeterminada" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_predeterminada_obj',
      dropdownCssClass: 'css_predeterminada_obj',
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

function scJQSelect2Add_tipo_vista(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_vista_obj" : "#id_sc_field_tipo_vista" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_vista_obj',
      dropdownCssClass: 'css_tipo_vista_obj',
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

function scJQSelect2Add_tipo_impresora(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_impresora_obj" : "#id_sc_field_tipo_impresora" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_impresora_obj',
      dropdownCssClass: 'css_tipo_impresora_obj',
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
  scJQSpinAdd(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_doc) { displayChange_field_tipo_doc(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_texto_fuente) { displayChange_field_texto_fuente(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_predeterminada) { displayChange_field_predeterminada(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_vista) { displayChange_field_tipo_vista(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_impresora) { displayChange_field_tipo_impresora(iLine, "on"); } }, 150);
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

