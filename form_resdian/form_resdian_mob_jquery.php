
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
  scEventControl_data["resolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rangofac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vigencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fec_vencimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["primerfactura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desde" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ultima_fac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefijo_fe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pref_factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pref_ncr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pref_ndb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_pc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_impre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contador_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_encabezado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["texto_pie_pagina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["resolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rangofac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rangofac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vigencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vigencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fec_vencimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fec_vencimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primerfactura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primerfactura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desde" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desde" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ultima_fac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ultima_fac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefijo_fe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo_fe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pref_factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pref_factura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pref_ncr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pref_ncr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pref_ndb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pref_ndb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contador_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contador_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_encabezado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_encabezado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto_pie_pagina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto_pie_pagina" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prefijo_fe" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("activa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("vigencia" + iSeq == fieldName) {
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
  $('#id_sc_field_resolucion' + iSeqRow).bind('blur', function() { sc_form_resdian_resolucion_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_resdian_resolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_rangofac' + iSeqRow).bind('blur', function() { sc_form_resdian_rangofac_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_resdian_rangofac_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_resdian_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_resdian_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo' + iSeqRow).bind('blur', function() { sc_form_resdian_prefijo_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_resdian_prefijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_primerfactura' + iSeqRow).bind('blur', function() { sc_form_resdian_primerfactura_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_resdian_primerfactura_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_pc' + iSeqRow).bind('blur', function() { sc_form_resdian_nombre_pc_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_resdian_nombre_pc_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_impre' + iSeqRow).bind('blur', function() { sc_form_resdian_nombre_impre_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_resdian_nombre_impre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fec_vencimiento' + iSeqRow).bind('blur', function() { sc_form_resdian_fec_vencimiento_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_resdian_fec_vencimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefijo_fe' + iSeqRow).bind('blur', function() { sc_form_resdian_prefijo_fe_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_resdian_prefijo_fe_onfocus(this, iSeqRow) });
  $('#id_sc_field_pref_factura' + iSeqRow).bind('blur', function() { sc_form_resdian_pref_factura_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_resdian_pref_factura_onfocus(this, iSeqRow) });
  $('#id_sc_field_pref_ncr' + iSeqRow).bind('blur', function() { sc_form_resdian_pref_ncr_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_resdian_pref_ncr_onfocus(this, iSeqRow) });
  $('#id_sc_field_pref_ndb' + iSeqRow).bind('blur', function() { sc_form_resdian_pref_ndb_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_resdian_pref_ndb_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultima_fac' + iSeqRow).bind('blur', function() { sc_form_resdian_ultima_fac_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_resdian_ultima_fac_onfocus(this, iSeqRow) });
  $('#id_sc_field_vigencia' + iSeqRow).bind('blur', function() { sc_form_resdian_vigencia_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_resdian_vigencia_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_resdian_vigencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_resdian_tipo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_resdian_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activa' + iSeqRow).bind('blur', function() { sc_form_resdian_activa_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_resdian_activa_onfocus(this, iSeqRow) });
  $('#id_sc_field_desde' + iSeqRow).bind('blur', function() { sc_form_resdian_desde_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_resdian_desde_onfocus(this, iSeqRow) });
  $('#id_sc_field_contador_pruebas' + iSeqRow).bind('blur', function() { sc_form_resdian_contador_pruebas_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_resdian_contador_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_encabezado' + iSeqRow).bind('blur', function() { sc_form_resdian_texto_encabezado_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_resdian_texto_encabezado_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_pie_pagina' + iSeqRow).bind('blur', function() { sc_form_resdian_texto_pie_pagina_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_resdian_texto_pie_pagina_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-pref_factura' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-pref_ncr' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-pref_ndb' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_resdian_resolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_resolucion();
  scCssBlur(oThis);
}

function sc_form_resdian_resolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_rangofac_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_rangofac();
  scCssBlur(oThis);
}

function sc_form_resdian_rangofac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_resdian_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_prefijo_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_prefijo();
  scCssBlur(oThis);
}

function sc_form_resdian_prefijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_primerfactura_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_primerfactura();
  scCssBlur(oThis);
}

function sc_form_resdian_primerfactura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_nombre_pc_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_nombre_pc();
  scCssBlur(oThis);
}

function sc_form_resdian_nombre_pc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_nombre_impre_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_nombre_impre();
  scCssBlur(oThis);
}

function sc_form_resdian_nombre_impre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_fec_vencimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_fec_vencimiento();
  scCssBlur(oThis);
}

function sc_form_resdian_fec_vencimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_prefijo_fe_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_prefijo_fe();
  scCssBlur(oThis);
}

function sc_form_resdian_prefijo_fe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_pref_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_pref_factura();
  scCssBlur(oThis);
}

function sc_form_resdian_pref_factura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_pref_ncr_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_pref_ncr();
  scCssBlur(oThis);
}

function sc_form_resdian_pref_ncr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_pref_ndb_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_pref_ndb();
  scCssBlur(oThis);
}

function sc_form_resdian_pref_ndb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_ultima_fac_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_ultima_fac();
  scCssBlur(oThis);
}

function sc_form_resdian_ultima_fac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_vigencia_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_vigencia();
  scCssBlur(oThis);
}

function sc_form_resdian_vigencia_onchange(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_event_vigencia_onchange();
}

function sc_form_resdian_vigencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_resdian_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_activa_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_activa();
  scCssBlur(oThis);
}

function sc_form_resdian_activa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_desde_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_desde();
  scCssBlur(oThis);
}

function sc_form_resdian_desde_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_contador_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_contador_pruebas();
  scCssBlur(oThis);
}

function sc_form_resdian_contador_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_texto_encabezado_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_texto_encabezado();
  scCssBlur(oThis);
}

function sc_form_resdian_texto_encabezado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_resdian_texto_pie_pagina_onblur(oThis, iSeqRow) {
  do_ajax_form_resdian_mob_validate_texto_pie_pagina();
  scCssBlur(oThis);
}

function sc_form_resdian_texto_pie_pagina_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("resolucion", "", status);
	displayChange_field("rangofac", "", status);
	displayChange_field("fecha", "", status);
	displayChange_field("vigencia", "", status);
	displayChange_field("fec_vencimiento", "", status);
	displayChange_field("prefijo", "", status);
	displayChange_field("primerfactura", "", status);
	displayChange_field("desde", "", status);
	displayChange_field("ultima_fac", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tipo", "", status);
	displayChange_field("prefijo_fe", "", status);
	displayChange_field("pref_factura", "", status);
	displayChange_field("pref_ncr", "", status);
	displayChange_field("pref_ndb", "", status);
	displayChange_field("activa", "", status);
	displayChange_field("nombre_pc", "", status);
	displayChange_field("nombre_impre", "", status);
	displayChange_field("contador_pruebas", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("texto_encabezado", "", status);
	displayChange_field("texto_pie_pagina", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_resolucion(row, status);
	displayChange_field_rangofac(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_vigencia(row, status);
	displayChange_field_fec_vencimiento(row, status);
	displayChange_field_prefijo(row, status);
	displayChange_field_primerfactura(row, status);
	displayChange_field_desde(row, status);
	displayChange_field_ultima_fac(row, status);
	displayChange_field_tipo(row, status);
	displayChange_field_prefijo_fe(row, status);
	displayChange_field_pref_factura(row, status);
	displayChange_field_pref_ncr(row, status);
	displayChange_field_pref_ndb(row, status);
	displayChange_field_activa(row, status);
	displayChange_field_nombre_pc(row, status);
	displayChange_field_nombre_impre(row, status);
	displayChange_field_contador_pruebas(row, status);
	displayChange_field_texto_encabezado(row, status);
	displayChange_field_texto_pie_pagina(row, status);
}

function displayChange_field(field, row, status) {
	if ("resolucion" == field) {
		displayChange_field_resolucion(row, status);
	}
	if ("rangofac" == field) {
		displayChange_field_rangofac(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("vigencia" == field) {
		displayChange_field_vigencia(row, status);
	}
	if ("fec_vencimiento" == field) {
		displayChange_field_fec_vencimiento(row, status);
	}
	if ("prefijo" == field) {
		displayChange_field_prefijo(row, status);
	}
	if ("primerfactura" == field) {
		displayChange_field_primerfactura(row, status);
	}
	if ("desde" == field) {
		displayChange_field_desde(row, status);
	}
	if ("ultima_fac" == field) {
		displayChange_field_ultima_fac(row, status);
	}
	if ("tipo" == field) {
		displayChange_field_tipo(row, status);
	}
	if ("prefijo_fe" == field) {
		displayChange_field_prefijo_fe(row, status);
	}
	if ("pref_factura" == field) {
		displayChange_field_pref_factura(row, status);
	}
	if ("pref_ncr" == field) {
		displayChange_field_pref_ncr(row, status);
	}
	if ("pref_ndb" == field) {
		displayChange_field_pref_ndb(row, status);
	}
	if ("activa" == field) {
		displayChange_field_activa(row, status);
	}
	if ("nombre_pc" == field) {
		displayChange_field_nombre_pc(row, status);
	}
	if ("nombre_impre" == field) {
		displayChange_field_nombre_impre(row, status);
	}
	if ("contador_pruebas" == field) {
		displayChange_field_contador_pruebas(row, status);
	}
	if ("texto_encabezado" == field) {
		displayChange_field_texto_encabezado(row, status);
	}
	if ("texto_pie_pagina" == field) {
		displayChange_field_texto_pie_pagina(row, status);
	}
}

function displayChange_field_resolucion(row, status) {
}

function displayChange_field_rangofac(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_vigencia(row, status) {
}

function displayChange_field_fec_vencimiento(row, status) {
}

function displayChange_field_prefijo(row, status) {
}

function displayChange_field_primerfactura(row, status) {
}

function displayChange_field_desde(row, status) {
}

function displayChange_field_ultima_fac(row, status) {
}

function displayChange_field_tipo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo");
	}
}

function displayChange_field_prefijo_fe(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_prefijo_fe__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_prefijo_fe" + row).select2("destroy");
		}
		scJQSelect2Add(row, "prefijo_fe");
	}
}

function displayChange_field_pref_factura(row, status) {
}

function displayChange_field_pref_ncr(row, status) {
}

function displayChange_field_pref_ndb(row, status) {
}

function displayChange_field_activa(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_activa__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_activa" + row).select2("destroy");
		}
		scJQSelect2Add(row, "activa");
	}
}

function displayChange_field_nombre_pc(row, status) {
}

function displayChange_field_nombre_impre(row, status) {
}

function displayChange_field_contador_pruebas(row, status) {
}

function displayChange_field_texto_encabezado(row, status) {
}

function displayChange_field_texto_pie_pagina(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_tipo("all", "on");
	displayChange_field_prefijo_fe("all", "on");
	displayChange_field_activa("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_resdian_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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
      setTimeout(function() { do_ajax_form_resdian_mob_validate_fecha(iSeqRow); }, 200);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_resdian_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo" == specificField) {
    scJQSelect2Add_tipo(seqRow);
  }
  if (null == specificField || "prefijo_fe" == specificField) {
    scJQSelect2Add_prefijo_fe(seqRow);
  }
  if (null == specificField || "activa" == specificField) {
    scJQSelect2Add_activa(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_obj" : "#id_sc_field_tipo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_obj',
      dropdownCssClass: 'css_tipo_obj',
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

function scJQSelect2Add_prefijo_fe(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_prefijo_fe_obj" : "#id_sc_field_prefijo_fe" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_prefijo_fe_obj',
      dropdownCssClass: 'css_prefijo_fe_obj',
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

function scJQSelect2Add_activa(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_activa_obj" : "#id_sc_field_activa" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_activa_obj',
      dropdownCssClass: 'css_activa_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo) { displayChange_field_tipo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_prefijo_fe) { displayChange_field_prefijo_fe(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_activa) { displayChange_field_activa(iLine, "on"); } }, 150);
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

