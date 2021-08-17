
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
  scEventControl_data["idpro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descrip" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidadmayor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stockubica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddet" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costop" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["autorizarborrado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_comanda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpedid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descrip" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descrip" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stockubica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stockubica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddet" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddet" + iSeqRow]["change"]) {
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
  if (scEventControl_data["adicional1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costop" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costop" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autorizarborrado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autorizarborrado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_comanda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_comanda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpedid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpedid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idbod" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unidadmayor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  if ("idbod" + iSeq == fieldName) {
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
  if ("unidadmayor" + iSeq == fieldName) {
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
  $('#id_sc_field_iddet' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_iddet_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detallepedido_220621_iddet_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detallepedido_220621_iddet_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpedid' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_idpedid_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_220621_idpedid_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_220621_idpedid_onfocus(this, iSeqRow) });
  $('#id_sc_field_numfac' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_numfac_onchange(this, iSeqRow) });
  $('#id_sc_field_remision' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_remision_onchange(this, iSeqRow) });
  $('#id_sc_field_idpro' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_idpro_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detallepedido_220621_idpro_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detallepedido_220621_idpro_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadmayor' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_unidadmayor_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_detallepedido_220621_unidadmayor_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_detallepedido_220621_unidadmayor_onfocus(this, iSeqRow) });
  $('#id_sc_field_factor' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_factor_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_220621_factor_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_220621_factor_onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_idbod_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detallepedido_220621_idbod_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detallepedido_220621_idbod_onfocus(this, iSeqRow) });
  $('#id_sc_field_costop' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_costop_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_220621_costop_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_220621_costop_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_220621_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_220621_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_valorunit_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_220621_valorunit_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_220621_valorunit_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_valorpar_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_220621_valorpar_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_220621_valorpar_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_iva_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detallepedido_220621_iva_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detallepedido_220621_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_descuento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_220621_descuento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_220621_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_adicional_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_220621_adicional_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_220621_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional1' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_adicional1_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_220621_adicional1_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_220621_adicional1_onfocus(this, iSeqRow) });
  $('#id_sc_field_devuelto' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_devuelto_onchange(this, iSeqRow) });
  $('#id_sc_field_colores' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_colores_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_220621_colores_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_220621_colores_onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_tallas_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_220621_tallas_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_220621_tallas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_sabor_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detallepedido_220621_sabor_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detallepedido_220621_sabor_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_comanda' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_estado_comanda_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_detallepedido_220621_estado_comanda_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_detallepedido_220621_estado_comanda_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_comanda' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_usuario_comanda_onchange(this, iSeqRow) });
  $('#id_sc_field_tercero_comanda' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_tercero_comanda_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_hora_inicio_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio_hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_hora_inicio_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_hora_final_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final_hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_hora_final_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_observ' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_observ_onchange(this, iSeqRow) });
  $('#id_sc_field_cerrado' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_cerrado_onchange(this, iSeqRow) });
  $('#id_sc_field_obs' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_obs_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detallepedido_220621_obs_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detallepedido_220621_obs_onfocus(this, iSeqRow) });
  $('#id_sc_field_descr' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_descr_onchange(this, iSeqRow) });
  $('#id_sc_field_codbarra' + iSeqRow).bind('change', function() { sc_form_detallepedido_220621_codbarra_onchange(this, iSeqRow) });
  $('#id_sc_field_stockubica' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_stockubica_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_220621_stockubica_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_220621_stockubica_onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_unidad_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_220621_unidad_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_220621_unidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_descrip' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_descrip_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_220621_descrip_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_220621_descrip_onfocus(this, iSeqRow) });
  $('#id_sc_field_autorizarborrado' + iSeqRow).bind('blur', function() { sc_form_detallepedido_220621_autorizarborrado_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_detallepedido_220621_autorizarborrado_onchange(this, iSeqRow) })
                                              .bind('click', function() { sc_form_detallepedido_220621_autorizarborrado_onclick(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_detallepedido_220621_autorizarborrado_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-autorizarborrado' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_detallepedido_220621_iddet_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_iddet();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_iddet_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_iddet_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_idpedid_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_idpedid();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_idpedid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_idpedid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_numfac_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_remision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_idpro_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_idpro();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_idpro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_idpro_onchange();
}

function sc_form_detallepedido_220621_idpro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_unidadmayor_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_unidadmayor();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_unidadmayor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_unidadmayor_onchange();
}

function sc_form_detallepedido_220621_unidadmayor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_factor_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_factor();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_factor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_factor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_idbod_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_idbod();
  scCssBlur(oThis);
  do_ajax_form_detallepedido_220621_event_idbod_onblur();
}

function sc_form_detallepedido_220621_idbod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_idbod_onchange();
}

function sc_form_detallepedido_220621_idbod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_costop_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_costop();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_costop_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_costop_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_cantidad();
  scCssBlur(oThis);
  do_ajax_form_detallepedido_220621_event_cantidad_onblur();
}

function sc_form_detallepedido_220621_cantidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_cantidad_onchange();
}

function sc_form_detallepedido_220621_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_form_detallepedido_220621_event_cantidad_onfocus();
}

function sc_form_detallepedido_220621_valorunit_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_valorunit();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_valorunit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_valorunit_onchange();
}

function sc_form_detallepedido_220621_valorunit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_valorpar_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_valorpar();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_valorpar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_valorpar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_iva();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_iva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_descuento_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_descuento();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_descuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_descuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_adicional_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_adicional1_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_adicional1();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_adicional1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_adicional1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_devuelto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_colores_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_colores();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_colores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_colores_onchange();
}

function sc_form_detallepedido_220621_colores_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_tallas_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_tallas();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_tallas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_tallas_onchange();
}

function sc_form_detallepedido_220621_tallas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_sabor_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_sabor();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_sabor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_220621_event_sabor_onchange();
}

function sc_form_detallepedido_220621_sabor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_estado_comanda_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_estado_comanda();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_estado_comanda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_estado_comanda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_usuario_comanda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_tercero_comanda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_hora_inicio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_hora_inicio_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_hora_final_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_hora_final_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_observ_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_cerrado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_obs_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_obs();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_obs_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_obs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_descr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_codbarra_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_stockubica_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_stockubica();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_stockubica_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_stockubica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_unidad_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_unidad();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_unidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_unidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_descrip_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_descrip();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_descrip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_descrip_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detallepedido_220621_autorizarborrado_onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_validate_autorizarborrado();
  scCssBlur(oThis);
}

function sc_form_detallepedido_220621_autorizarborrado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_220621_autorizarborrado_onclick(oThis, iSeqRow) {
  do_ajax_form_detallepedido_220621_event_autorizarborrado_onclick();
}

function sc_form_detallepedido_220621_autorizarborrado_onfocus(oThis, iSeqRow) {
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
	displayChange_field("idpro", "", status);
	displayChange_field("descrip", "", status);
	displayChange_field("idbod", "", status);
	displayChange_field("unidad", "", status);
	displayChange_field("cantidad", "", status);
	displayChange_field("valorunit", "", status);
	displayChange_field("adicional", "", status);
	displayChange_field("descuento", "", status);
	displayChange_field("valorpar", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("unidadmayor", "", status);
	displayChange_field("stockubica", "", status);
	displayChange_field("obs", "", status);
	displayChange_field("iddet", "", status);
	displayChange_field("colores", "", status);
	displayChange_field("tallas", "", status);
	displayChange_field("sabor", "", status);
	displayChange_field("adicional1", "", status);
	displayChange_field("factor", "", status);
	displayChange_field("iva", "", status);
	displayChange_field("costop", "", status);
	displayChange_field("autorizarborrado", "", status);
	displayChange_field("estado_comanda", "", status);
	displayChange_field("idpedid", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpro(row, status);
	displayChange_field_descrip(row, status);
	displayChange_field_idbod(row, status);
	displayChange_field_unidad(row, status);
	displayChange_field_cantidad(row, status);
	displayChange_field_valorunit(row, status);
	displayChange_field_adicional(row, status);
	displayChange_field_descuento(row, status);
	displayChange_field_valorpar(row, status);
	displayChange_field_unidadmayor(row, status);
	displayChange_field_stockubica(row, status);
	displayChange_field_obs(row, status);
	displayChange_field_iddet(row, status);
	displayChange_field_colores(row, status);
	displayChange_field_tallas(row, status);
	displayChange_field_sabor(row, status);
	displayChange_field_adicional1(row, status);
	displayChange_field_factor(row, status);
	displayChange_field_iva(row, status);
	displayChange_field_costop(row, status);
	displayChange_field_autorizarborrado(row, status);
	displayChange_field_estado_comanda(row, status);
	displayChange_field_idpedid(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpro" == field) {
		displayChange_field_idpro(row, status);
	}
	if ("descrip" == field) {
		displayChange_field_descrip(row, status);
	}
	if ("idbod" == field) {
		displayChange_field_idbod(row, status);
	}
	if ("unidad" == field) {
		displayChange_field_unidad(row, status);
	}
	if ("cantidad" == field) {
		displayChange_field_cantidad(row, status);
	}
	if ("valorunit" == field) {
		displayChange_field_valorunit(row, status);
	}
	if ("adicional" == field) {
		displayChange_field_adicional(row, status);
	}
	if ("descuento" == field) {
		displayChange_field_descuento(row, status);
	}
	if ("valorpar" == field) {
		displayChange_field_valorpar(row, status);
	}
	if ("unidadmayor" == field) {
		displayChange_field_unidadmayor(row, status);
	}
	if ("stockubica" == field) {
		displayChange_field_stockubica(row, status);
	}
	if ("obs" == field) {
		displayChange_field_obs(row, status);
	}
	if ("iddet" == field) {
		displayChange_field_iddet(row, status);
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
	if ("adicional1" == field) {
		displayChange_field_adicional1(row, status);
	}
	if ("factor" == field) {
		displayChange_field_factor(row, status);
	}
	if ("iva" == field) {
		displayChange_field_iva(row, status);
	}
	if ("costop" == field) {
		displayChange_field_costop(row, status);
	}
	if ("autorizarborrado" == field) {
		displayChange_field_autorizarborrado(row, status);
	}
	if ("estado_comanda" == field) {
		displayChange_field_estado_comanda(row, status);
	}
	if ("idpedid" == field) {
		displayChange_field_idpedid(row, status);
	}
}

function displayChange_field_idpro(row, status) {
}

function displayChange_field_descrip(row, status) {
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

function displayChange_field_unidad(row, status) {
}

function displayChange_field_cantidad(row, status) {
}

function displayChange_field_valorunit(row, status) {
}

function displayChange_field_adicional(row, status) {
}

function displayChange_field_descuento(row, status) {
}

function displayChange_field_valorpar(row, status) {
}

function displayChange_field_unidadmayor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unidadmayor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unidadmayor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unidadmayor");
	}
}

function displayChange_field_stockubica(row, status) {
}

function displayChange_field_obs(row, status) {
}

function displayChange_field_iddet(row, status) {
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

function displayChange_field_adicional1(row, status) {
}

function displayChange_field_factor(row, status) {
}

function displayChange_field_iva(row, status) {
}

function displayChange_field_costop(row, status) {
}

function displayChange_field_autorizarborrado(row, status) {
}

function displayChange_field_estado_comanda(row, status) {
}

function displayChange_field_idpedid(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idbod("all", "on");
	displayChange_field_unidadmayor("all", "on");
	displayChange_field_colores("all", "on");
	displayChange_field_tallas("all", "on");
	displayChange_field_sabor("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detallepedido_220621_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_hora_inicio" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_inicio" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_inicio']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_220621_validate_hora_inicio(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_hora_final" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_final" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_final']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_220621_validate_hora_final(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_detallepedido_220621')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idbod" == specificField) {
    scJQSelect2Add_idbod(seqRow);
  }
  if (null == specificField || "unidadmayor" == specificField) {
    scJQSelect2Add_unidadmayor(seqRow);
  }
  if (null == specificField || "colores" == specificField) {
    scJQSelect2Add_colores(seqRow);
  }
  if (null == specificField || "tallas" == specificField) {
    scJQSelect2Add_tallas(seqRow);
  }
  if (null == specificField || "sabor" == specificField) {
    scJQSelect2Add_sabor(seqRow);
  }
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

function scJQSelect2Add_unidadmayor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unidadmayor_obj" : "#id_sc_field_unidadmayor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unidadmayor_obj',
      dropdownCssClass: 'css_unidadmayor_obj',
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_idbod) { displayChange_field_idbod(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_unidadmayor) { displayChange_field_unidadmayor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_colores) { displayChange_field_colores(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas) { displayChange_field_tallas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor) { displayChange_field_sabor(iLine, "on"); } }, 150);
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

