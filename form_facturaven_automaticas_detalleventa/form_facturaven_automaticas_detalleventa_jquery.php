
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
  scEventControl_data["numfac_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorunit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valorpar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descr_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tbase_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tneto_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numfac_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numfac_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["valorpar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descr_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descr_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tbase_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tbase_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tneto_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tneto_" + iSeqRow]["change"]) {
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
  if ("cantidad_" + iSeq == fieldName) {
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
  $('#id_sc_field_iddet_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_iddet__onchange(this, iSeqRow) });
  $('#id_sc_field_numfac_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_numfac__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_numfac__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_numfac__onfocus(this, iSeqRow) });
  $('#id_sc_field_remision_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_remision__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_idpro__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_idpro__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_idpro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidadmayor_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_unidadmayor__onchange(this, iSeqRow) });
  $('#id_sc_field_factor_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_factor__onchange(this, iSeqRow) });
  $('#id_sc_field_idbod_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_idbod__onchange(this, iSeqRow) });
  $('#id_sc_field_costop_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_costop__onchange(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_valorunit__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_valorunit__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_valorunit__onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_valorpar__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_valorpar__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_valorpar__onfocus(this, iSeqRow) });
  $('#id_sc_field_iva_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_iva__onchange(this, iSeqRow) });
  $('#id_sc_field_descuento_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_descuento__onchange(this, iSeqRow) });
  $('#id_sc_field_adicional_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_adicional__onchange(this, iSeqRow) });
  $('#id_sc_field_adicional1_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_adicional1__onchange(this, iSeqRow) });
  $('#id_sc_field_devuelto_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_devuelto__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_colores__onchange(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_tallas__onchange(this, iSeqRow) });
  $('#id_sc_field_sabor_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_sabor__onchange(this, iSeqRow) });
  $('#id_sc_field_numdevo_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_numdevo__onchange(this, iSeqRow) });
  $('#id_sc_field_iddeta_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_iddeta__onchange(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_obs__onfocus(this, iSeqRow) });
  $('#id_sc_field_descr_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_descr__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_descr__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_descr__onfocus(this, iSeqRow) });
  $('#id_sc_field_vencimiento_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_vencimiento__onchange(this, iSeqRow) });
  $('#id_sc_field_lote_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_lote__onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_fab_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_fecha_fab__onchange(this, iSeqRow) });
  $('#id_sc_field_serial_codbarra_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_serial_codbarra__onchange(this, iSeqRow) });
  $('#id_sc_field_tipo_doc_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_tipo_doc__onchange(this, iSeqRow) });
  $('#id_sc_field_tipo_tran_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_tipo_tran__onchange(this, iSeqRow) });
  $('#id_sc_field_id_nota_' + iSeqRow).bind('change', function() { sc_form_facturaven_automaticas_detalleventa_id_nota__onchange(this, iSeqRow) });
  $('#id_sc_field_tbase_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_tbase__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_tbase__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_tbase__onfocus(this, iSeqRow) });
  $('#id_sc_field_tneto_' + iSeqRow).bind('blur', function() { sc_form_facturaven_automaticas_detalleventa_tneto__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_facturaven_automaticas_detalleventa_tneto__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_facturaven_automaticas_detalleventa_tneto__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_facturaven_automaticas_detalleventa_iddet__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_numfac__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_numfac_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_numfac__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_numfac__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_remision__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_idpro__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_idpro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_idpro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_facturaven_automaticas_detalleventa_event_idpro__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_idpro__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_unidadmayor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_factor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_idbod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_costop__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_facturaven_automaticas_detalleventa_event_cantidad__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorunit__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_valorunit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorunit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_facturaven_automaticas_detalleventa_event_valorunit__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorunit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorpar__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_valorpar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorpar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_valorpar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_iva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_descuento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_adicional__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_adicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_devuelto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_sabor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_numdevo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_iddeta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_obs__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_obs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_descr__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_descr_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_descr__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_descr__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_vencimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_lote__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_fecha_fab__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_serial_codbarra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_tipo_doc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_tipo_tran__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_id_nota__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_facturaven_automaticas_detalleventa_tbase__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_tbase_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_tbase__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_tbase__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_tneto__onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_automaticas_detalleventa_validate_tneto_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_tneto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_facturaven_automaticas_detalleventa_tneto__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("numfac_", "", status);
	displayChange_field("idpro_", "", status);
	displayChange_field("obs_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("valorunit_", "", status);
	displayChange_field("valorpar_", "", status);
	displayChange_field("descr_", "", status);
	displayChange_field("tbase_", "", status);
	displayChange_field("tneto_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_numfac_(row, status);
	displayChange_field_idpro_(row, status);
	displayChange_field_obs_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_valorunit_(row, status);
	displayChange_field_valorpar_(row, status);
	displayChange_field_descr_(row, status);
	displayChange_field_tbase_(row, status);
	displayChange_field_tneto_(row, status);
}

function displayChange_field(field, row, status) {
	if ("numfac_" == field) {
		displayChange_field_numfac_(row, status);
	}
	if ("idpro_" == field) {
		displayChange_field_idpro_(row, status);
	}
	if ("obs_" == field) {
		displayChange_field_obs_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("valorunit_" == field) {
		displayChange_field_valorunit_(row, status);
	}
	if ("valorpar_" == field) {
		displayChange_field_valorpar_(row, status);
	}
	if ("descr_" == field) {
		displayChange_field_descr_(row, status);
	}
	if ("tbase_" == field) {
		displayChange_field_tbase_(row, status);
	}
	if ("tneto_" == field) {
		displayChange_field_tneto_(row, status);
	}
}

function displayChange_field_numfac_(row, status) {
}

function displayChange_field_idpro_(row, status) {
}

function displayChange_field_obs_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_valorunit_(row, status) {
}

function displayChange_field_valorpar_(row, status) {
}

function displayChange_field_descr_(row, status) {
}

function displayChange_field_tbase_(row, status) {
}

function displayChange_field_tneto_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_facturaven_automaticas_detalleventa_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(48);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_vencimiento_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_vencimiento_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_facturaven_automaticas_detalleventa_validate_vencimiento_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['vencimiento_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_fab_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_fab_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_facturaven_automaticas_detalleventa_validate_fecha_fab_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_fab_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_facturaven_automaticas_detalleventa')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
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

