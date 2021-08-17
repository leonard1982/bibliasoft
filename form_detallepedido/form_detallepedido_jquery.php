
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
  scEventControl_data["idpro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descrip_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbod_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unidadmayor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stockubica_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddet_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["colores_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tallas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sabor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adicional1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["factor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costop_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["autorizarborrado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_comanda_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpedid_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descrip_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descrip_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unidadmayor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stockubica_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stockubica_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddet_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddet_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["colores_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["colores_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tallas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tallas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sabor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sabor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["factor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["factor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costop_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costop_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autorizarborrado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autorizarborrado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_comanda_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_comanda_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpedid_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpedid_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["autocomp"]) {
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
  if ("idbod_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unidadmayor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("colores_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cantidad_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("colores_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idbod_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("idpro_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sabor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tallas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("unidadmayor_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("valorunit_" + iSeq == fieldName) {
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
  $('#id_sc_field_iddet_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_iddet__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_iddet__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_iddet__onfocus(this, iSeqRow) });
  $('#id_sc_field_idpedid_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_idpedid__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_idpedid__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_idpedid__onfocus(this, iSeqRow) });
  $('#id_sc_field_numfac_' + iSeqRow).bind('change', function() { sc_form_detallepedido_numfac__onchange(this, iSeqRow) });
  $('#id_sc_field_remision_' + iSeqRow).bind('change', function() { sc_form_detallepedido_remision__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_idpro__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_idpro__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_idpro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadmayor_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_unidadmayor__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_detallepedido_unidadmayor__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_detallepedido_unidadmayor__onfocus(this, iSeqRow) });
  $('#id_sc_field_factor_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_factor__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_factor__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_factor__onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_idbod__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_idbod__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_idbod__onfocus(this, iSeqRow) });
  $('#id_sc_field_costop_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_costop__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_costop__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_costop__onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_valorunit__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_valorunit__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_valorunit__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_valorpar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detallepedido_valorpar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detallepedido_valorpar__onfocus(this, iSeqRow) });
  $('#id_sc_field_iva_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_iva__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detallepedido_iva__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detallepedido_iva__onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_descuento__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_descuento__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_descuento__onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_adicional__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detallepedido_adicional__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detallepedido_adicional__onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional1_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_adicional1__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_detallepedido_adicional1__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_detallepedido_adicional1__onfocus(this, iSeqRow) });
  $('#id_sc_field_devuelto_' + iSeqRow).bind('change', function() { sc_form_detallepedido_devuelto__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_colores__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_colores__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_colores__onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_tallas__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_tallas__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_tallas__onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_sabor__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detallepedido_sabor__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detallepedido_sabor__onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_comanda_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_estado_comanda__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_detallepedido_estado_comanda__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_detallepedido_estado_comanda__onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_comanda_' + iSeqRow).bind('change', function() { sc_form_detallepedido_usuario_comanda__onchange(this, iSeqRow) });
  $('#id_sc_field_tercero_comanda_' + iSeqRow).bind('change', function() { sc_form_detallepedido_tercero_comanda__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio_' + iSeqRow).bind('change', function() { sc_form_detallepedido_hora_inicio__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_inicio__hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_hora_inicio__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final_' + iSeqRow).bind('change', function() { sc_form_detallepedido_hora_final__onchange(this, iSeqRow) });
  $('#id_sc_field_hora_final__hora' + iSeqRow).bind('change', function() { sc_form_detallepedido_hora_final__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_observ_' + iSeqRow).bind('change', function() { sc_form_detallepedido_observ__onchange(this, iSeqRow) });
  $('#id_sc_field_cerrado_' + iSeqRow).bind('change', function() { sc_form_detallepedido_cerrado__onchange(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detallepedido_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detallepedido_obs__onfocus(this, iSeqRow) });
  $('#id_sc_field_descr_' + iSeqRow).bind('change', function() { sc_form_detallepedido_descr__onchange(this, iSeqRow) });
  $('#id_sc_field_codbarra_' + iSeqRow).bind('change', function() { sc_form_detallepedido_codbarra__onchange(this, iSeqRow) });
  $('#id_sc_field_stockubica_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_stockubica__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_detallepedido_stockubica__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_detallepedido_stockubica__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidad_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_unidad__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detallepedido_unidad__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detallepedido_unidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_descrip_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_descrip__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detallepedido_descrip__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detallepedido_descrip__onfocus(this, iSeqRow) });
  $('#id_sc_field_autorizarborrado_' + iSeqRow).bind('blur', function() { sc_form_detallepedido_autorizarborrado__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_detallepedido_autorizarborrado__onchange(this, iSeqRow) })
                                               .bind('click', function() { sc_form_detallepedido_autorizarborrado__onclick(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_detallepedido_autorizarborrado__onfocus(this, iSeqRow) });
  $('.sc-ui-radio-autorizarborrado_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_detallepedido_iddet__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_iddet_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_iddet__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_iddet__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_idpedid__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_idpedid_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_idpedid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_idpedid__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_numfac__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_remision__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_idpro__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_idpro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_idpro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_idpro__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_idpro__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_unidadmayor__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_unidadmayor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_unidadmayor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_unidadmayor__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_unidadmayor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_factor__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_factor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_factor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_factor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_idbod__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_idbod_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_detallepedido_event_idbod__onblur(iSeqRow);
}

function sc_form_detallepedido_idbod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_idbod__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_idbod__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_costop__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_costop_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_costop__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_costop__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_detallepedido_event_cantidad__onblur(iSeqRow);
}

function sc_form_detallepedido_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_cantidad__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
  do_ajax_form_detallepedido_event_cantidad__onfocus(iSeqRow);
}

function sc_form_detallepedido_valorunit__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_valorunit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_valorunit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_valorunit__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_valorunit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_valorpar__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_valorpar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_valorpar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_valorpar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_iva__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_iva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_iva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_iva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_descuento__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_descuento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_descuento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_descuento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_adicional__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_adicional_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_adicional__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_adicional__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_adicional1__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_adicional1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_adicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_adicional1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_devuelto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_colores__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_colores_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_colores__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_colores__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_tallas__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_tallas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_tallas__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_tallas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_sabor__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_sabor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_sabor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_detallepedido_event_sabor__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_sabor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_estado_comanda__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_estado_comanda_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_estado_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_estado_comanda__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_usuario_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_tercero_comanda__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_hora_inicio__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_hora_inicio__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_hora_final__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_hora_final__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_observ__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_cerrado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_obs__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_obs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_descr__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_codbarra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_detallepedido_stockubica__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_stockubica_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_stockubica__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_stockubica__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_unidad__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_unidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_unidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_unidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_descrip__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_descrip_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_descrip__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_descrip__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detallepedido_autorizarborrado__onblur(oThis, iSeqRow) {
  do_ajax_form_detallepedido_validate_autorizarborrado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detallepedido_autorizarborrado__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_detallepedido_autorizarborrado__onclick(oThis, iSeqRow) {
  do_ajax_form_detallepedido_event_autorizarborrado__onclick(iSeqRow);
}

function sc_form_detallepedido_autorizarborrado__onfocus(oThis, iSeqRow) {
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
	displayChange_field("idpro_", "", status);
	displayChange_field("descrip_", "", status);
	displayChange_field("idbod_", "", status);
	displayChange_field("unidad_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("valorunit_", "", status);
	displayChange_field("adicional_", "", status);
	displayChange_field("descuento_", "", status);
	displayChange_field("valorpar_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("unidadmayor_", "", status);
	displayChange_field("stockubica_", "", status);
	displayChange_field("obs_", "", status);
	displayChange_field("iddet_", "", status);
	displayChange_field("colores_", "", status);
	displayChange_field("tallas_", "", status);
	displayChange_field("sabor_", "", status);
	displayChange_field("adicional1_", "", status);
	displayChange_field("factor_", "", status);
	displayChange_field("iva_", "", status);
	displayChange_field("costop_", "", status);
	displayChange_field("autorizarborrado_", "", status);
	displayChange_field("estado_comanda_", "", status);
	displayChange_field("idpedid_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpro_(row, status);
	displayChange_field_descrip_(row, status);
	displayChange_field_idbod_(row, status);
	displayChange_field_unidad_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_valorunit_(row, status);
	displayChange_field_adicional_(row, status);
	displayChange_field_descuento_(row, status);
	displayChange_field_valorpar_(row, status);
	displayChange_field_unidadmayor_(row, status);
	displayChange_field_stockubica_(row, status);
	displayChange_field_obs_(row, status);
	displayChange_field_iddet_(row, status);
	displayChange_field_colores_(row, status);
	displayChange_field_tallas_(row, status);
	displayChange_field_sabor_(row, status);
	displayChange_field_adicional1_(row, status);
	displayChange_field_factor_(row, status);
	displayChange_field_iva_(row, status);
	displayChange_field_costop_(row, status);
	displayChange_field_autorizarborrado_(row, status);
	displayChange_field_estado_comanda_(row, status);
	displayChange_field_idpedid_(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpro_" == field) {
		displayChange_field_idpro_(row, status);
	}
	if ("descrip_" == field) {
		displayChange_field_descrip_(row, status);
	}
	if ("idbod_" == field) {
		displayChange_field_idbod_(row, status);
	}
	if ("unidad_" == field) {
		displayChange_field_unidad_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("valorunit_" == field) {
		displayChange_field_valorunit_(row, status);
	}
	if ("adicional_" == field) {
		displayChange_field_adicional_(row, status);
	}
	if ("descuento_" == field) {
		displayChange_field_descuento_(row, status);
	}
	if ("valorpar_" == field) {
		displayChange_field_valorpar_(row, status);
	}
	if ("unidadmayor_" == field) {
		displayChange_field_unidadmayor_(row, status);
	}
	if ("stockubica_" == field) {
		displayChange_field_stockubica_(row, status);
	}
	if ("obs_" == field) {
		displayChange_field_obs_(row, status);
	}
	if ("iddet_" == field) {
		displayChange_field_iddet_(row, status);
	}
	if ("colores_" == field) {
		displayChange_field_colores_(row, status);
	}
	if ("tallas_" == field) {
		displayChange_field_tallas_(row, status);
	}
	if ("sabor_" == field) {
		displayChange_field_sabor_(row, status);
	}
	if ("adicional1_" == field) {
		displayChange_field_adicional1_(row, status);
	}
	if ("factor_" == field) {
		displayChange_field_factor_(row, status);
	}
	if ("iva_" == field) {
		displayChange_field_iva_(row, status);
	}
	if ("costop_" == field) {
		displayChange_field_costop_(row, status);
	}
	if ("autorizarborrado_" == field) {
		displayChange_field_autorizarborrado_(row, status);
	}
	if ("estado_comanda_" == field) {
		displayChange_field_estado_comanda_(row, status);
	}
	if ("idpedid_" == field) {
		displayChange_field_idpedid_(row, status);
	}
}

function displayChange_field_idpro_(row, status) {
}

function displayChange_field_descrip_(row, status) {
}

function displayChange_field_idbod_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idbod___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idbod_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idbod_");
	}
}

function displayChange_field_unidad_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_valorunit_(row, status) {
}

function displayChange_field_adicional_(row, status) {
}

function displayChange_field_descuento_(row, status) {
}

function displayChange_field_valorpar_(row, status) {
}

function displayChange_field_unidadmayor_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unidadmayor___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unidadmayor_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unidadmayor_");
	}
}

function displayChange_field_stockubica_(row, status) {
}

function displayChange_field_obs_(row, status) {
}

function displayChange_field_iddet_(row, status) {
}

function displayChange_field_colores_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_colores___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_colores_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "colores_");
	}
}

function displayChange_field_tallas_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tallas___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tallas_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tallas_");
	}
}

function displayChange_field_sabor_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sabor___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sabor_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sabor_");
	}
}

function displayChange_field_adicional1_(row, status) {
}

function displayChange_field_factor_(row, status) {
}

function displayChange_field_iva_(row, status) {
}

function displayChange_field_costop_(row, status) {
}

function displayChange_field_autorizarborrado_(row, status) {
}

function displayChange_field_estado_comanda_(row, status) {
}

function displayChange_field_idpedid_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idbod_("all", "on");
	displayChange_field_unidadmayor_("all", "on");
	displayChange_field_colores_("all", "on");
	displayChange_field_tallas_("all", "on");
	displayChange_field_sabor_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detallepedido_form" + pageNo).hide();
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
  $("#id_sc_field_hora_inicio_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_inicio_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_inicio_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_validate_hora_inicio_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_inicio_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_hora_final_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hora_final_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hora_final_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detallepedido_validate_hora_final_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hora_final_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_detallepedido')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idbod_" == specificField) {
    scJQSelect2Add_idbod_(seqRow);
  }
  if (null == specificField || "unidadmayor_" == specificField) {
    scJQSelect2Add_unidadmayor_(seqRow);
  }
  if (null == specificField || "colores_" == specificField) {
    scJQSelect2Add_colores_(seqRow);
  }
  if (null == specificField || "tallas_" == specificField) {
    scJQSelect2Add_tallas_(seqRow);
  }
  if (null == specificField || "sabor_" == specificField) {
    scJQSelect2Add_sabor_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idbod_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idbod__obj" : "#id_sc_field_idbod_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idbod__obj',
      dropdownCssClass: 'css_idbod__obj',
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

function scJQSelect2Add_unidadmayor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unidadmayor__obj" : "#id_sc_field_unidadmayor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unidadmayor__obj',
      dropdownCssClass: 'css_unidadmayor__obj',
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

function scJQSelect2Add_colores_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_colores__obj" : "#id_sc_field_colores_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_colores__obj',
      dropdownCssClass: 'css_colores__obj',
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

function scJQSelect2Add_tallas_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tallas__obj" : "#id_sc_field_tallas_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tallas__obj',
      dropdownCssClass: 'css_tallas__obj',
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

function scJQSelect2Add_sabor_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sabor__obj" : "#id_sc_field_sabor_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sabor__obj',
      dropdownCssClass: 'css_sabor__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_idbod_) { displayChange_field_idbod_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_unidadmayor_) { displayChange_field_unidadmayor_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_colores_) { displayChange_field_colores_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tallas_) { displayChange_field_tallas_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sabor_) { displayChange_field_sabor_(iLine, "on"); } }, 150);
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

