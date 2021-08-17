
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
  scEventControl_data["autocompletar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codbarra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["presentacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mensaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tasaiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lote" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vencimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idfaccom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tasadesc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["devuelto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["autocompletar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autocompletar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codbarra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codbarra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["presentacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["presentacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vencimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vencimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfaccom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfaccom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autocompletar" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idbod" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idpro" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("autocompletar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cantidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idpro" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sabor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("valorunit" + iSeq == fieldName) {
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
  $('#id_sc_field_idfaccom' + iSeqRow).bind('blur', function() { sc_detallecompra2_idfaccom_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_idfaccom_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro' + iSeqRow).bind('blur', function() { sc_detallecompra2_idpro_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_detallecompra2_idpro_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra2_idpro_onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod' + iSeqRow).bind('blur', function() { sc_detallecompra2_idbod_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra2_idbod_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_detallecompra2_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_detallecompra2_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit' + iSeqRow).bind('blur', function() { sc_detallecompra2_valorunit_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_detallecompra2_valorunit_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_detallecompra2_valorunit_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar' + iSeqRow).bind('blur', function() { sc_detallecompra2_valorpar_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_valorpar_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_detallecompra2_iva_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_detallecompra2_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_detallecompra2_descuento_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_detallecompra2_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasaiva' + iSeqRow).bind('blur', function() { sc_detallecompra2_tasaiva_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_detallecompra2_tasaiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasadesc' + iSeqRow).bind('blur', function() { sc_detallecompra2_tasadesc_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_tasadesc_onfocus(this, iSeqRow) });
  $('#id_sc_field_devuelto' + iSeqRow).bind('blur', function() { sc_detallecompra2_devuelto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_devuelto_onfocus(this, iSeqRow) });
  $('#id_sc_field_colores' + iSeqRow).bind('blur', function() { sc_detallecompra2_colores_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_detallecompra2_colores_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_detallecompra2_colores_onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas' + iSeqRow).bind('blur', function() { sc_detallecompra2_tallas_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_detallecompra2_tallas_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_detallecompra2_tallas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor' + iSeqRow).bind('blur', function() { sc_detallecompra2_sabor_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_detallecompra2_sabor_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra2_sabor_onfocus(this, iSeqRow) });
  $('#id_sc_field_vencimiento' + iSeqRow).bind('blur', function() { sc_detallecompra2_vencimiento_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_detallecompra2_vencimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_lote' + iSeqRow).bind('blur', function() { sc_detallecompra2_lote_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_detallecompra2_lote_onfocus(this, iSeqRow) });
  $('#id_sc_field_presentacion' + iSeqRow).bind('blur', function() { sc_detallecompra2_presentacion_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_detallecompra2_presentacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_autocompletar' + iSeqRow).bind('blur', function() { sc_detallecompra2_autocompletar_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_detallecompra2_autocompletar_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_detallecompra2_autocompletar_onfocus(this, iSeqRow) });
  $('#id_sc_field_codbarra' + iSeqRow).bind('blur', function() { sc_detallecompra2_codbarra_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra2_codbarra_onfocus(this, iSeqRow) });
  $('#id_sc_field_mensaje' + iSeqRow).bind('blur', function() { sc_detallecompra2_mensaje_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_detallecompra2_mensaje_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_detallecompra2_idfaccom_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_idfaccom();
  scCssBlur(oThis);
}

function sc_detallecompra2_idfaccom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_idpro_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_idpro();
  scCssBlur(oThis);
}

function sc_detallecompra2_idpro_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_idpro_onchange();
}

function sc_detallecompra2_idpro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_idbod_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_idbod();
  scCssBlur(oThis);
}

function sc_detallecompra2_idbod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_cantidad();
  scCssBlur(oThis);
}

function sc_detallecompra2_cantidad_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_cantidad_onchange();
}

function sc_detallecompra2_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_detallecompra2_mob_event_cantidad_onfocus();
}

function sc_detallecompra2_valorunit_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_valorunit();
  scCssBlur(oThis);
}

function sc_detallecompra2_valorunit_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_valorunit_onchange();
}

function sc_detallecompra2_valorunit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_valorpar_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_valorpar();
  scCssBlur(oThis);
}

function sc_detallecompra2_valorpar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_iva_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_iva();
  scCssBlur(oThis);
}

function sc_detallecompra2_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_descuento_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_descuento();
  scCssBlur(oThis);
}

function sc_detallecompra2_descuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_tasaiva_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_tasaiva();
  scCssBlur(oThis);
}

function sc_detallecompra2_tasaiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_tasadesc_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_tasadesc();
  scCssBlur(oThis);
}

function sc_detallecompra2_tasadesc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_devuelto_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_devuelto();
  scCssBlur(oThis);
}

function sc_detallecompra2_devuelto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_colores_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_colores();
  scCssBlur(oThis);
}

function sc_detallecompra2_colores_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_colores_onchange();
}

function sc_detallecompra2_colores_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_tallas_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_tallas();
  scCssBlur(oThis);
}

function sc_detallecompra2_tallas_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_tallas_onchange();
}

function sc_detallecompra2_tallas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_sabor_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_sabor();
  scCssBlur(oThis);
}

function sc_detallecompra2_sabor_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_sabor_onchange();
}

function sc_detallecompra2_sabor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_vencimiento_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_vencimiento();
  scCssBlur(oThis);
}

function sc_detallecompra2_vencimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_lote_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_lote();
  scCssBlur(oThis);
}

function sc_detallecompra2_lote_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_presentacion_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_presentacion();
  scCssBlur(oThis);
}

function sc_detallecompra2_presentacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_autocompletar_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_autocompletar();
  scCssBlur(oThis);
}

function sc_detallecompra2_autocompletar_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_event_autocompletar_onchange();
}

function sc_detallecompra2_autocompletar_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_detallecompra2_codbarra_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_codbarra();
  scCssBlur(oThis);
}

function sc_detallecompra2_codbarra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra2_mensaje_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra2_mob_validate_mensaje();
  scCssBlur(oThis);
}

function sc_detallecompra2_mensaje_onfocus(oThis, iSeqRow) {
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
	if ("5" == block) {
		displayChange_block_5(status);
	}
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("autocompletar", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("codbarra", "", status);
	displayChange_field("presentacion", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("mensaje", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("colores", "", status);
	displayChange_field("tallas", "", status);
	displayChange_field("sabor", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("cantidad", "", status);
	displayChange_field("idbod", "", status);
	displayChange_field("valorunit", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("valorpar", "", status);
	displayChange_field("iva", "", status);
	displayChange_field("tasaiva", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("lote", "", status);
	displayChange_field("vencimiento", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("idfaccom", "", status);
	displayChange_field("descuento", "", status);
	displayChange_field("tasadesc", "", status);
	displayChange_field("devuelto", "", status);
	displayChange_field("idpro", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_autocompletar(row, status);
	displayChange_field_codbarra(row, status);
	displayChange_field_presentacion(row, status);
	displayChange_field_mensaje(row, status);
	displayChange_field_colores(row, status);
	displayChange_field_tallas(row, status);
	displayChange_field_sabor(row, status);
	displayChange_field_cantidad(row, status);
	displayChange_field_idbod(row, status);
	displayChange_field_valorunit(row, status);
	displayChange_field_valorpar(row, status);
	displayChange_field_iva(row, status);
	displayChange_field_tasaiva(row, status);
	displayChange_field_lote(row, status);
	displayChange_field_vencimiento(row, status);
	displayChange_field_idfaccom(row, status);
	displayChange_field_descuento(row, status);
	displayChange_field_tasadesc(row, status);
	displayChange_field_devuelto(row, status);
	displayChange_field_idpro(row, status);
}

function displayChange_field(field, row, status) {
	if ("autocompletar" == field) {
		displayChange_field_autocompletar(row, status);
	}
	if ("codbarra" == field) {
		displayChange_field_codbarra(row, status);
	}
	if ("presentacion" == field) {
		displayChange_field_presentacion(row, status);
	}
	if ("mensaje" == field) {
		displayChange_field_mensaje(row, status);
	}
	if ("colores" == field) {
		displayChange_field_colores(row, status);
	}
	if ("tallas" == field) {
		displayChange_field_tallas(row, status);
	}
	if ("sabor" == field) {
		displayChange_field_sabor(row, status);
	}
	if ("cantidad" == field) {
		displayChange_field_cantidad(row, status);
	}
	if ("idbod" == field) {
		displayChange_field_idbod(row, status);
	}
	if ("valorunit" == field) {
		displayChange_field_valorunit(row, status);
	}
	if ("valorpar" == field) {
		displayChange_field_valorpar(row, status);
	}
	if ("iva" == field) {
		displayChange_field_iva(row, status);
	}
	if ("tasaiva" == field) {
		displayChange_field_tasaiva(row, status);
	}
	if ("lote" == field) {
		displayChange_field_lote(row, status);
	}
	if ("vencimiento" == field) {
		displayChange_field_vencimiento(row, status);
	}
	if ("idfaccom" == field) {
		displayChange_field_idfaccom(row, status);
	}
	if ("descuento" == field) {
		displayChange_field_descuento(row, status);
	}
	if ("tasadesc" == field) {
		displayChange_field_tasadesc(row, status);
	}
	if ("devuelto" == field) {
		displayChange_field_devuelto(row, status);
	}
	if ("idpro" == field) {
		displayChange_field_idpro(row, status);
	}
}

function displayChange_field_autocompletar(row, status) {
}

function displayChange_field_codbarra(row, status) {
}

function displayChange_field_presentacion(row, status) {
}

function displayChange_field_mensaje(row, status) {
}

function displayChange_field_colores(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_colores__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_colores" + row).select2("destroy");
		}
		scJQSelect2Add(row, "colores");
	}
}

function displayChange_field_tallas(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tallas__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tallas" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tallas");
	}
}

function displayChange_field_sabor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sabor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sabor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sabor");
	}
}

function displayChange_field_cantidad(row, status) {
}

function displayChange_field_idbod(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idbod__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idbod" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idbod");
	}
}

function displayChange_field_valorunit(row, status) {
}

function displayChange_field_valorpar(row, status) {
}

function displayChange_field_iva(row, status) {
}

function displayChange_field_tasaiva(row, status) {
}

function displayChange_field_lote(row, status) {
}

function displayChange_field_vencimiento(row, status) {
}

function displayChange_field_idfaccom(row, status) {
}

function displayChange_field_descuento(row, status) {
}

function displayChange_field_tasadesc(row, status) {
}

function displayChange_field_devuelto(row, status) {
}

function displayChange_field_idpro(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idpro__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idpro" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idpro");
	}
}

function scRecreateSelect2() {
	displayChange_field_colores("all", "on");
	displayChange_field_tallas("all", "on");
	displayChange_field_sabor("all", "on");
	displayChange_field_idbod("all", "on");
	displayChange_field_idpro("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_detallecompra2_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_vencimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_vencimiento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_detallecompra2_mob_validate_vencimiento(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['vencimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'detallecompra2_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "colores" == specificField) {
    scJQSelect2Add_colores(seqRow);
  }
  if (null == specificField || "tallas" == specificField) {
    scJQSelect2Add_tallas(seqRow);
  }
  if (null == specificField || "sabor" == specificField) {
    scJQSelect2Add_sabor(seqRow);
  }
  if (null == specificField || "idbod" == specificField) {
    scJQSelect2Add_idbod(seqRow);
  }
  if (null == specificField || "idpro" == specificField) {
    scJQSelect2Add_idpro(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_colores(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_colores_obj" : "#id_sc_field_colores" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_colores_obj',
      dropdownCssClass: 'css_colores_obj',
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

function scJQSelect2Add_tallas(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tallas_obj" : "#id_sc_field_tallas" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tallas_obj',
      dropdownCssClass: 'css_tallas_obj',
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

function scJQSelect2Add_sabor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sabor_obj" : "#id_sc_field_sabor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sabor_obj',
      dropdownCssClass: 'css_sabor_obj',
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

function scJQSelect2Add_idbod(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idbod_obj" : "#id_sc_field_idbod" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idbod_obj',
      dropdownCssClass: 'css_idbod_obj',
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

function scJQSelect2Add_idpro(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idpro_obj" : "#id_sc_field_idpro" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idpro_obj',
      dropdownCssClass: 'css_idpro_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_colores) { displayChange_field_colores(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas) { displayChange_field_tallas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor) { displayChange_field_sabor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idbod) { displayChange_field_idbod(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idpro) { displayChange_field_idpro(iLine, "on"); } }, 150);
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
