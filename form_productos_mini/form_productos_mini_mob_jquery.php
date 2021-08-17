
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
  scEventControl_data["codigobar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigoprod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idgrup" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_producto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["otro2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio_editable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maneja_tcs_lfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stockmen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidmaymen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unimay" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad_ma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["multiple_escala" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["en_base_a" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costomen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costo_prom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["recmayamen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["existencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["u_menor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciofull" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomay" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciomen3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigobar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigoprod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigoprod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idgrup" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idgrup" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_producto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_producto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otro2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otro2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio_editable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio_editable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maneja_tcs_lfs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maneja_tcs_lfs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stockmen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stockmen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidmaymen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidmaymen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unimay" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unimay" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad_ma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad_ma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["multiple_escala" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["multiple_escala" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["en_base_a" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["en_base_a" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costomen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costomen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costo_prom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costo_prom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["recmayamen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["recmayamen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["existencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["existencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["u_menor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["u_menor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciofull" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciofull" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomay" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomay" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomen2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciomen3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciomen3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro1" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idpro2" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["unidad_ma" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idgrup" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_producto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("otro" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("precio_editable" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idiva" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_cuenta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("fecha_vencimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("lote" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("serial_codbarras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_marca" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_linea" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("fecha_vencimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idpro1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("lote" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("otro" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("por_preciominimo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("recmayamen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sabores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("serial_codbarras" + iSeq == fieldName) {
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
  if ("unidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("unidad_ma" + iSeq == fieldName) {
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
  $('#id_sc_field_codigobar' + iSeqRow).bind('blur', function() { sc_form_productos_mini_codigobar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_mini_codigobar_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigoprod' + iSeqRow).bind('blur', function() { sc_form_productos_mini_codigoprod_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_codigoprod_onfocus(this, iSeqRow) });
  $('#id_sc_field_nompro' + iSeqRow).bind('blur', function() { sc_form_productos_mini_nompro_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_nompro_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidmaymen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_unidmaymen_onblur(this, iSeqRow) })
                                        .bind('click', function() { sc_form_productos_mini_unidmaymen_onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_unidmaymen_onfocus(this, iSeqRow) });
  $('#id_sc_field_unimay' + iSeqRow).bind('blur', function() { sc_form_productos_mini_unimay_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_unimay_onfocus(this, iSeqRow) });
  $('#id_sc_field_unimen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_unimen_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_unimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_costomen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_costomen_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_productos_mini_costomen_onfocus(this, iSeqRow) });
  $('#id_sc_field_recmayamen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_recmayamen_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_productos_mini_recmayamen_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_recmayamen_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_preciomen_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_mini_preciomen_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen2' + iSeqRow).bind('blur', function() { sc_form_productos_mini_preciomen2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_preciomen2_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomen3' + iSeqRow).bind('blur', function() { sc_form_productos_mini_preciomen3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_preciomen3_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio2' + iSeqRow).bind('blur', function() { sc_form_productos_mini_precio2_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_mini_precio2_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciomay' + iSeqRow).bind('blur', function() { sc_form_productos_mini_preciomay_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_mini_preciomay_onfocus(this, iSeqRow) });
  $('#id_sc_field_preciofull' + iSeqRow).bind('blur', function() { sc_form_productos_mini_preciofull_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_preciofull_onfocus(this, iSeqRow) });
  $('#id_sc_field_stockmen' + iSeqRow).bind('blur', function() { sc_form_productos_mini_stockmen_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_productos_mini_stockmen_onfocus(this, iSeqRow) });
  $('#id_sc_field_idgrup' + iSeqRow).bind('blur', function() { sc_form_productos_mini_idgrup_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_idgrup_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro1' + iSeqRow).bind('blur', function() { sc_form_productos_mini_idpro1_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_productos_mini_idpro1_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_idpro1_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro2' + iSeqRow).bind('blur', function() { sc_form_productos_mini_idpro2_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_idpro2_onfocus(this, iSeqRow) });
  $('#id_sc_field_idiva' + iSeqRow).bind('blur', function() { sc_form_productos_mini_idiva_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_productos_mini_idiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_otro' + iSeqRow).bind('blur', function() { sc_form_productos_mini_otro_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_productos_mini_otro_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_productos_mini_otro_onfocus(this, iSeqRow) });
  $('#id_sc_field_otro2' + iSeqRow).bind('blur', function() { sc_form_productos_mini_otro2_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_productos_mini_otro2_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio_editable' + iSeqRow).bind('blur', function() { sc_form_productos_mini_precio_editable_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_productos_mini_precio_editable_onfocus(this, iSeqRow) });
  $('#id_sc_field_maneja_tcs_lfs' + iSeqRow).bind('blur', function() { sc_form_productos_mini_maneja_tcs_lfs_onblur(this, iSeqRow) })
                                            .bind('click', function() { sc_form_productos_mini_maneja_tcs_lfs_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_productos_mini_maneja_tcs_lfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_existencia' + iSeqRow).bind('blur', function() { sc_form_productos_mini_existencia_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_existencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_multiple_escala' + iSeqRow).bind('blur', function() { sc_form_productos_mini_multiple_escala_onblur(this, iSeqRow) })
                                             .bind('click', function() { sc_form_productos_mini_multiple_escala_onclick(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_productos_mini_multiple_escala_onfocus(this, iSeqRow) });
  $('#id_sc_field_en_base_a' + iSeqRow).bind('blur', function() { sc_form_productos_mini_en_base_a_onblur(this, iSeqRow) })
                                       .bind('click', function() { sc_form_productos_mini_en_base_a_onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_mini_en_base_a_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_productos_mini_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_mini_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_producto' + iSeqRow).bind('blur', function() { sc_form_productos_mini_tipo_producto_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_productos_mini_tipo_producto_onfocus(this, iSeqRow) });
  $('#id_sc_field_costo_prom' + iSeqRow).bind('blur', function() { sc_form_productos_mini_costo_prom_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_mini_costo_prom_onfocus(this, iSeqRow) });
  $('#id_sc_field_u_menor' + iSeqRow).bind('blur', function() { sc_form_productos_mini_u_menor_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_mini_u_menor_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_' + iSeqRow).bind('blur', function() { sc_form_productos_mini_unidad__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_mini_unidad__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_mini_unidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_ma' + iSeqRow).bind('blur', function() { sc_form_productos_mini_unidad_ma_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_productos_mini_unidad_ma_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_mini_unidad_ma_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-maneja_tcs_lfs' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-unidmaymen' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-multiple_escala' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-en_base_a' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-activo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-control_costo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_productos_mini_codigobar_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_codigobar();
  scCssBlur(oThis);
}

function sc_form_productos_mini_codigobar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_codigoprod_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_codigoprod();
  scCssBlur(oThis);
}

function sc_form_productos_mini_codigoprod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_nompro_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_nompro();
  scCssBlur(oThis);
}

function sc_form_productos_mini_nompro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_unidmaymen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_unidmaymen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_unidmaymen_onclick(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_unidmaymen_onclick();
}

function sc_form_productos_mini_unidmaymen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_unimay_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_unimay();
  scCssBlur(oThis);
}

function sc_form_productos_mini_unimay_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_unimen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_unimen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_unimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_costomen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_costomen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_costomen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_recmayamen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_recmayamen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_recmayamen_onchange(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_recmayamen_onchange();
}

function sc_form_productos_mini_recmayamen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_preciomen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_preciomen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_preciomen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_preciomen2_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_preciomen2();
  scCssBlur(oThis);
}

function sc_form_productos_mini_preciomen2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_preciomen3_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_preciomen3();
  scCssBlur(oThis);
}

function sc_form_productos_mini_preciomen3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_precio2_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_precio2();
  scCssBlur(oThis);
}

function sc_form_productos_mini_precio2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_preciomay_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_preciomay();
  scCssBlur(oThis);
}

function sc_form_productos_mini_preciomay_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_preciofull_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_preciofull();
  scCssBlur(oThis);
}

function sc_form_productos_mini_preciofull_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_stockmen_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_stockmen();
  scCssBlur(oThis);
}

function sc_form_productos_mini_stockmen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_idgrup_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_idgrup();
  scCssBlur(oThis);
}

function sc_form_productos_mini_idgrup_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_idpro1_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_idpro1();
  scCssBlur(oThis);
}

function sc_form_productos_mini_idpro1_onchange(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_idpro1_onchange();
}

function sc_form_productos_mini_idpro1_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_productos_mini_idpro2_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_idpro2();
  scCssBlur(oThis);
}

function sc_form_productos_mini_idpro2_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_productos_mini_idiva_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_idiva();
  scCssBlur(oThis);
}

function sc_form_productos_mini_idiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_otro_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_otro();
  scCssBlur(oThis);
}

function sc_form_productos_mini_otro_onchange(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_otro_onchange();
}

function sc_form_productos_mini_otro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_otro2_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_otro2();
  scCssBlur(oThis);
}

function sc_form_productos_mini_otro2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_precio_editable_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_precio_editable();
  scCssBlur(oThis);
}

function sc_form_productos_mini_precio_editable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_maneja_tcs_lfs_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_maneja_tcs_lfs();
  scCssBlur(oThis);
}

function sc_form_productos_mini_maneja_tcs_lfs_onclick(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_maneja_tcs_lfs_onclick();
}

function sc_form_productos_mini_maneja_tcs_lfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_existencia_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_existencia();
  scCssBlur(oThis);
}

function sc_form_productos_mini_existencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_multiple_escala_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_multiple_escala();
  scCssBlur(oThis);
}

function sc_form_productos_mini_multiple_escala_onclick(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_multiple_escala_onclick();
}

function sc_form_productos_mini_multiple_escala_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_en_base_a_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_en_base_a();
  scCssBlur(oThis);
}

function sc_form_productos_mini_en_base_a_onclick(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_en_base_a_onclick();
}

function sc_form_productos_mini_en_base_a_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_activo();
  scCssBlur(oThis);
}

function sc_form_productos_mini_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_tipo_producto_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_tipo_producto();
  scCssBlur(oThis);
}

function sc_form_productos_mini_tipo_producto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_costo_prom_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_costo_prom();
  scCssBlur(oThis);
}

function sc_form_productos_mini_costo_prom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_u_menor_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_u_menor();
  scCssBlur(oThis);
}

function sc_form_productos_mini_u_menor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_productos_mini_unidad__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_unidad_();
  scCssBlur(oThis);
}

function sc_form_productos_mini_unidad__onchange(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_unidad__onchange();
}

function sc_form_productos_mini_unidad__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_productos_mini_unidad_ma_onblur(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_validate_unidad_ma();
  scCssBlur(oThis);
}

function sc_form_productos_mini_unidad_ma_onchange(oThis, iSeqRow) {
  do_ajax_form_productos_mini_mob_event_unidad_ma_onchange();
}

function sc_form_productos_mini_unidad_ma_onfocus(oThis, iSeqRow) {
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
	displayChange_field("codigobar", "", status);
	displayChange_field("codigoprod", "", status);
	displayChange_field("nompro", "", status);
	displayChange_field("idgrup", "", status);
	displayChange_field("idpro1", "", status);
	displayChange_field("tipo_producto", "", status);
	displayChange_field("idpro2", "", status);
	displayChange_field("otro", "", status);
	displayChange_field("otro2", "", status);
	displayChange_field("precio_editable", "", status);
	displayChange_field("maneja_tcs_lfs", "", status);
	displayChange_field("stockmen", "", status);
	displayChange_field("unidmaymen", "", status);
	displayChange_field("unimay", "", status);
	displayChange_field("unimen", "", status);
	displayChange_field("unidad_ma", "", status);
	displayChange_field("unidad_", "", status);
	displayChange_field("multiple_escala", "", status);
	displayChange_field("en_base_a", "", status);
	displayChange_field("costomen", "", status);
	displayChange_field("costo_prom", "", status);
	displayChange_field("recmayamen", "", status);
	displayChange_field("idiva", "", status);
	displayChange_field("existencia", "", status);
	displayChange_field("u_menor", "", status);
	displayChange_field("activo", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("preciofull", "", status);
	displayChange_field("precio2", "", status);
	displayChange_field("preciomay", "", status);
	displayChange_field("preciomen", "", status);
	displayChange_field("preciomen2", "", status);
	displayChange_field("preciomen3", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigobar(row, status);
	displayChange_field_codigoprod(row, status);
	displayChange_field_nompro(row, status);
	displayChange_field_idgrup(row, status);
	displayChange_field_idpro1(row, status);
	displayChange_field_tipo_producto(row, status);
	displayChange_field_idpro2(row, status);
	displayChange_field_otro(row, status);
	displayChange_field_otro2(row, status);
	displayChange_field_precio_editable(row, status);
	displayChange_field_maneja_tcs_lfs(row, status);
	displayChange_field_stockmen(row, status);
	displayChange_field_unidmaymen(row, status);
	displayChange_field_unimay(row, status);
	displayChange_field_unimen(row, status);
	displayChange_field_unidad_ma(row, status);
	displayChange_field_unidad_(row, status);
	displayChange_field_multiple_escala(row, status);
	displayChange_field_en_base_a(row, status);
	displayChange_field_costomen(row, status);
	displayChange_field_costo_prom(row, status);
	displayChange_field_recmayamen(row, status);
	displayChange_field_idiva(row, status);
	displayChange_field_existencia(row, status);
	displayChange_field_u_menor(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_preciofull(row, status);
	displayChange_field_precio2(row, status);
	displayChange_field_preciomay(row, status);
	displayChange_field_preciomen(row, status);
	displayChange_field_preciomen2(row, status);
	displayChange_field_preciomen3(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigobar" == field) {
		displayChange_field_codigobar(row, status);
	}
	if ("codigoprod" == field) {
		displayChange_field_codigoprod(row, status);
	}
	if ("nompro" == field) {
		displayChange_field_nompro(row, status);
	}
	if ("idgrup" == field) {
		displayChange_field_idgrup(row, status);
	}
	if ("idpro1" == field) {
		displayChange_field_idpro1(row, status);
	}
	if ("tipo_producto" == field) {
		displayChange_field_tipo_producto(row, status);
	}
	if ("idpro2" == field) {
		displayChange_field_idpro2(row, status);
	}
	if ("otro" == field) {
		displayChange_field_otro(row, status);
	}
	if ("otro2" == field) {
		displayChange_field_otro2(row, status);
	}
	if ("precio_editable" == field) {
		displayChange_field_precio_editable(row, status);
	}
	if ("maneja_tcs_lfs" == field) {
		displayChange_field_maneja_tcs_lfs(row, status);
	}
	if ("stockmen" == field) {
		displayChange_field_stockmen(row, status);
	}
	if ("unidmaymen" == field) {
		displayChange_field_unidmaymen(row, status);
	}
	if ("unimay" == field) {
		displayChange_field_unimay(row, status);
	}
	if ("unimen" == field) {
		displayChange_field_unimen(row, status);
	}
	if ("unidad_ma" == field) {
		displayChange_field_unidad_ma(row, status);
	}
	if ("unidad_" == field) {
		displayChange_field_unidad_(row, status);
	}
	if ("multiple_escala" == field) {
		displayChange_field_multiple_escala(row, status);
	}
	if ("en_base_a" == field) {
		displayChange_field_en_base_a(row, status);
	}
	if ("costomen" == field) {
		displayChange_field_costomen(row, status);
	}
	if ("costo_prom" == field) {
		displayChange_field_costo_prom(row, status);
	}
	if ("recmayamen" == field) {
		displayChange_field_recmayamen(row, status);
	}
	if ("idiva" == field) {
		displayChange_field_idiva(row, status);
	}
	if ("existencia" == field) {
		displayChange_field_existencia(row, status);
	}
	if ("u_menor" == field) {
		displayChange_field_u_menor(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("preciofull" == field) {
		displayChange_field_preciofull(row, status);
	}
	if ("precio2" == field) {
		displayChange_field_precio2(row, status);
	}
	if ("preciomay" == field) {
		displayChange_field_preciomay(row, status);
	}
	if ("preciomen" == field) {
		displayChange_field_preciomen(row, status);
	}
	if ("preciomen2" == field) {
		displayChange_field_preciomen2(row, status);
	}
	if ("preciomen3" == field) {
		displayChange_field_preciomen3(row, status);
	}
}

function displayChange_field_codigobar(row, status) {
}

function displayChange_field_codigoprod(row, status) {
}

function displayChange_field_nompro(row, status) {
}

function displayChange_field_idgrup(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idgrup__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idgrup" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idgrup");
	}
}

function displayChange_field_idpro1(row, status) {
}

function displayChange_field_tipo_producto(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_producto__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_producto" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_producto");
	}
}

function displayChange_field_idpro2(row, status) {
}

function displayChange_field_otro(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_otro__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_otro" + row).select2("destroy");
		}
		scJQSelect2Add(row, "otro");
	}
}

function displayChange_field_otro2(row, status) {
}

function displayChange_field_precio_editable(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_precio_editable__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_precio_editable" + row).select2("destroy");
		}
		scJQSelect2Add(row, "precio_editable");
	}
}

function displayChange_field_maneja_tcs_lfs(row, status) {
}

function displayChange_field_stockmen(row, status) {
}

function displayChange_field_unidmaymen(row, status) {
}

function displayChange_field_unimay(row, status) {
}

function displayChange_field_unimen(row, status) {
}

function displayChange_field_unidad_ma(row, status) {
}

function displayChange_field_unidad_(row, status) {
}

function displayChange_field_multiple_escala(row, status) {
}

function displayChange_field_en_base_a(row, status) {
}

function displayChange_field_costomen(row, status) {
}

function displayChange_field_costo_prom(row, status) {
}

function displayChange_field_recmayamen(row, status) {
}

function displayChange_field_idiva(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idiva__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idiva" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idiva");
	}
}

function displayChange_field_existencia(row, status) {
}

function displayChange_field_u_menor(row, status) {
}

function displayChange_field_activo(row, status) {
}

function displayChange_field_preciofull(row, status) {
}

function displayChange_field_precio2(row, status) {
}

function displayChange_field_preciomay(row, status) {
}

function displayChange_field_preciomen(row, status) {
}

function displayChange_field_preciomen2(row, status) {
}

function displayChange_field_preciomen3(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idgrup("all", "on");
	displayChange_field_tipo_producto("all", "on");
	displayChange_field_otro("all", "on");
	displayChange_field_precio_editable("all", "on");
	displayChange_field_idiva("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_productos_mini_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ultima_compra" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_compra" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_productos_mini_mob_validate_ultima_compra(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['ultima_compra']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_ultima_venta" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_venta" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_productos_mini_mob_validate_ultima_venta(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['ultima_venta']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_imagenprod" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_productos_mini_mob_ul_save.php",
    dropZone: $("#hidden_field_data_imagenprod" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenprod'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenprod" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenprod" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenprod" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenprod(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenprod(data);
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
        $("#id_img_loader_imagenprod" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenprod" + iSeqRow).hide();
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
      $("#id_sc_field_imagenprod" + iSeqRow).val("");
      $("#id_sc_field_imagenprod_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenprod_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imagenprod = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenprod) ? "none" : "";
      $("#id_ajax_img_imagenprod" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenprod" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenprod) {
        document.F1.temp_out_imagenprod.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenprod.value = var_ajax_img_imagenprod;
      }
      else if (document.F1.temp_out_imagenprod) {
        document.F1.temp_out_imagenprod.value = var_ajax_img_imagenprod;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenprod" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenprod" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenprod" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenprod" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_imagen" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_productos_mini_mob_ul_save.php",
    dropZone: $("#hidden_field_data_imagen" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagen'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagen" + iSeqRow);
        loaderContent = $("#id_img_loader_imagen" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagen" + iSeqRow);
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
        $("#id_img_loader_imagen" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagen" + iSeqRow).hide();
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
      $("#id_sc_field_imagen" + iSeqRow).val("");
      $("#id_sc_field_imagen_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagen_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imagen = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagen) ? "none" : "";
      $("#id_ajax_img_imagen" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagen" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagen) {
        document.F1.temp_out_imagen.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagen.value = var_ajax_img_imagen;
      }
      else if (document.F1.temp_out_imagen) {
        document.F1.temp_out_imagen.value = var_ajax_img_imagen;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagen" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagen" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagen" + iSeqRow).css("display", "none");
      $("#id_ajax_link_imagen" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_productos_mini_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idgrup" == specificField) {
    scJQSelect2Add_idgrup(seqRow);
  }
  if (null == specificField || "tipo_producto" == specificField) {
    scJQSelect2Add_tipo_producto(seqRow);
  }
  if (null == specificField || "otro" == specificField) {
    scJQSelect2Add_otro(seqRow);
  }
  if (null == specificField || "precio_editable" == specificField) {
    scJQSelect2Add_precio_editable(seqRow);
  }
  if (null == specificField || "idiva" == specificField) {
    scJQSelect2Add_idiva(seqRow);
  }
  if (null == specificField || "colores" == specificField) {
    scJQSelect2Add_colores(seqRow);
  }
  if (null == specificField || "tallas" == specificField) {
    scJQSelect2Add_tallas(seqRow);
  }
  if (null == specificField || "sabores" == specificField) {
    scJQSelect2Add_sabores(seqRow);
  }
  if (null == specificField || "cod_cuenta" == specificField) {
    scJQSelect2Add_cod_cuenta(seqRow);
  }
  if (null == specificField || "fecha_vencimiento" == specificField) {
    scJQSelect2Add_fecha_vencimiento(seqRow);
  }
  if (null == specificField || "lote" == specificField) {
    scJQSelect2Add_lote(seqRow);
  }
  if (null == specificField || "serial_codbarras" == specificField) {
    scJQSelect2Add_serial_codbarras(seqRow);
  }
  if (null == specificField || "id_marca" == specificField) {
    scJQSelect2Add_id_marca(seqRow);
  }
  if (null == specificField || "id_linea" == specificField) {
    scJQSelect2Add_id_linea(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idgrup(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idgrup_obj" : "#id_sc_field_idgrup" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idgrup_obj',
      dropdownCssClass: 'css_idgrup_obj',
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

function scJQSelect2Add_tipo_producto(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_producto_obj" : "#id_sc_field_tipo_producto" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_producto_obj',
      dropdownCssClass: 'css_tipo_producto_obj',
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

function scJQSelect2Add_otro(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_otro_obj" : "#id_sc_field_otro" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_otro_obj',
      dropdownCssClass: 'css_otro_obj',
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

function scJQSelect2Add_precio_editable(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_precio_editable_obj" : "#id_sc_field_precio_editable" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_precio_editable_obj',
      dropdownCssClass: 'css_precio_editable_obj',
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

function scJQSelect2Add_idiva(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idiva_obj" : "#id_sc_field_idiva" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idiva_obj',
      dropdownCssClass: 'css_idiva_obj',
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

function scJQSelect2Add_sabores(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sabores_obj" : "#id_sc_field_sabores" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sabores_obj',
      dropdownCssClass: 'css_sabores_obj',
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

function scJQSelect2Add_cod_cuenta(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_cod_cuenta_obj" : "#id_sc_field_cod_cuenta" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_cod_cuenta_obj',
      dropdownCssClass: 'css_cod_cuenta_obj',
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

function scJQSelect2Add_fecha_vencimiento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_fecha_vencimiento_obj" : "#id_sc_field_fecha_vencimiento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_fecha_vencimiento_obj',
      dropdownCssClass: 'css_fecha_vencimiento_obj',
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

function scJQSelect2Add_lote(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_lote_obj" : "#id_sc_field_lote" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_lote_obj',
      dropdownCssClass: 'css_lote_obj',
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

function scJQSelect2Add_serial_codbarras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_serial_codbarras_obj" : "#id_sc_field_serial_codbarras" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_serial_codbarras_obj',
      dropdownCssClass: 'css_serial_codbarras_obj',
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

function scJQSelect2Add_id_marca(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_marca_obj" : "#id_sc_field_id_marca" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_marca_obj',
      dropdownCssClass: 'css_id_marca_obj',
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

function scJQSelect2Add_id_linea(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_linea_obj" : "#id_sc_field_id_linea" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_linea_obj',
      dropdownCssClass: 'css_id_linea_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_idgrup) { displayChange_field_idgrup(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_producto) { displayChange_field_tipo_producto(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_otro) { displayChange_field_otro(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_precio_editable) { displayChange_field_precio_editable(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idiva) { displayChange_field_idiva(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_colores) { displayChange_field_colores(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas) { displayChange_field_tallas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabores) { displayChange_field_sabores(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_cod_cuenta) { displayChange_field_cod_cuenta(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_fecha_vencimiento) { displayChange_field_fecha_vencimiento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_lote) { displayChange_field_lote(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_serial_codbarras) { displayChange_field_serial_codbarras(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_marca) { displayChange_field_id_marca(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_linea) { displayChange_field_id_linea(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_imagenprod(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpg", "jpeg", "gif", "png"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
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
