
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
  scEventControl_data["codigobar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idiva_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_cuenta_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigobar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idiva_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idiva_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_cuenta_" + iSeqRow]["change"]) {
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
  if ("idiva_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_cuenta_" + iSeq == fieldName) {
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
  $('#id_sc_field_idprod_' + iSeqRow).bind('change', function() { sc_form_productos_contable_idprod__onchange(this, iSeqRow) });
  $('#id_sc_field_codigobar_' + iSeqRow).bind('blur', function() { sc_form_productos_contable_codigobar__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_productos_contable_codigobar__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_contable_codigobar__onfocus(this, iSeqRow) });
  $('#id_sc_field_codigoprod_' + iSeqRow).bind('change', function() { sc_form_productos_contable_codigoprod__onchange(this, iSeqRow) });
  $('#id_sc_field_nompro_' + iSeqRow).bind('blur', function() { sc_form_productos_contable_nompro__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_contable_nompro__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_contable_nompro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidmaymen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_unidmaymen__onchange(this, iSeqRow) });
  $('#id_sc_field_unimay_' + iSeqRow).bind('change', function() { sc_form_productos_contable_unimay__onchange(this, iSeqRow) });
  $('#id_sc_field_unimen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_unimen__onchange(this, iSeqRow) });
  $('#id_sc_field_costomay_' + iSeqRow).bind('change', function() { sc_form_productos_contable_costomay__onchange(this, iSeqRow) });
  $('#id_sc_field_costomen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_costomen__onchange(this, iSeqRow) });
  $('#id_sc_field_recmayamen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_recmayamen__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_preciomen__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen2_' + iSeqRow).bind('change', function() { sc_form_productos_contable_preciomen2__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen3_' + iSeqRow).bind('change', function() { sc_form_productos_contable_preciomen3__onchange(this, iSeqRow) });
  $('#id_sc_field_precio2_' + iSeqRow).bind('change', function() { sc_form_productos_contable_precio2__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomay_' + iSeqRow).bind('change', function() { sc_form_productos_contable_preciomay__onchange(this, iSeqRow) });
  $('#id_sc_field_preciofull_' + iSeqRow).bind('change', function() { sc_form_productos_contable_preciofull__onchange(this, iSeqRow) });
  $('#id_sc_field_stockmay_' + iSeqRow).bind('change', function() { sc_form_productos_contable_stockmay__onchange(this, iSeqRow) });
  $('#id_sc_field_stockmen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_stockmen__onchange(this, iSeqRow) });
  $('#id_sc_field_idgrup_' + iSeqRow).bind('change', function() { sc_form_productos_contable_idgrup__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro1_' + iSeqRow).bind('change', function() { sc_form_productos_contable_idpro1__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro2_' + iSeqRow).bind('change', function() { sc_form_productos_contable_idpro2__onchange(this, iSeqRow) });
  $('#id_sc_field_idiva_' + iSeqRow).bind('blur', function() { sc_form_productos_contable_idiva__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_productos_contable_idiva__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_productos_contable_idiva__onfocus(this, iSeqRow) });
  $('#id_sc_field_otro_' + iSeqRow).bind('change', function() { sc_form_productos_contable_otro__onchange(this, iSeqRow) });
  $('#id_sc_field_otro2_' + iSeqRow).bind('change', function() { sc_form_productos_contable_otro2__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('change', function() { sc_form_productos_contable_colores__onchange(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('change', function() { sc_form_productos_contable_tallas__onchange(this, iSeqRow) });
  $('#id_sc_field_sabores_' + iSeqRow).bind('change', function() { sc_form_productos_contable_sabores__onchange(this, iSeqRow) });
  $('#id_sc_field_imagenprod_' + iSeqRow).bind('change', function() { sc_form_productos_contable_imagenprod__onchange(this, iSeqRow) });
  $('#id_sc_field_imconsumo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_imconsumo__onchange(this, iSeqRow) });
  $('#id_sc_field_escombo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_escombo__onchange(this, iSeqRow) });
  $('#id_sc_field_idcombo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_idcombo__onchange(this, iSeqRow) });
  $('#id_sc_field_precio_editable_' + iSeqRow).bind('change', function() { sc_form_productos_contable_precio_editable__onchange(this, iSeqRow) });
  $('#id_sc_field_cod_cuenta_' + iSeqRow).bind('blur', function() { sc_form_productos_contable_cod_cuenta__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_productos_contable_cod_cuenta__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_productos_contable_cod_cuenta__onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_vencimiento_' + iSeqRow).bind('change', function() { sc_form_productos_contable_fecha_vencimiento__onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_fab_' + iSeqRow).bind('change', function() { sc_form_productos_contable_fecha_fab__onchange(this, iSeqRow) });
  $('#id_sc_field_lote_' + iSeqRow).bind('change', function() { sc_form_productos_contable_lote__onchange(this, iSeqRow) });
  $('#id_sc_field_serial_codbarras_' + iSeqRow).bind('change', function() { sc_form_productos_contable_serial_codbarras__onchange(this, iSeqRow) });
  $('#id_sc_field_maneja_tcs_lfs_' + iSeqRow).bind('change', function() { sc_form_productos_contable_maneja_tcs_lfs__onchange(this, iSeqRow) });
  $('#id_sc_field_control_costo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_control_costo__onchange(this, iSeqRow) });
  $('#id_sc_field_por_preciominimo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_por_preciominimo__onchange(this, iSeqRow) });
  $('#id_sc_field_id_marca_' + iSeqRow).bind('change', function() { sc_form_productos_contable_id_marca__onchange(this, iSeqRow) });
  $('#id_sc_field_id_linea_' + iSeqRow).bind('change', function() { sc_form_productos_contable_id_linea__onchange(this, iSeqRow) });
  $('#id_sc_field_ultima_compra_' + iSeqRow).bind('change', function() { sc_form_productos_contable_ultima_compra__onchange(this, iSeqRow) });
  $('#id_sc_field_n_ultcompra_' + iSeqRow).bind('change', function() { sc_form_productos_contable_n_ultcompra__onchange(this, iSeqRow) });
  $('#id_sc_field_ultima_venta_' + iSeqRow).bind('change', function() { sc_form_productos_contable_ultima_venta__onchange(this, iSeqRow) });
  $('#id_sc_field_n_ultventa_' + iSeqRow).bind('change', function() { sc_form_productos_contable_n_ultventa__onchange(this, iSeqRow) });
  $('#id_sc_field_codigobar2_' + iSeqRow).bind('change', function() { sc_form_productos_contable_codigobar2__onchange(this, iSeqRow) });
  $('#id_sc_field_codigobar3_' + iSeqRow).bind('change', function() { sc_form_productos_contable_codigobar3__onchange(this, iSeqRow) });
  $('#id_sc_field_nube_' + iSeqRow).bind('change', function() { sc_form_productos_contable_nube__onchange(this, iSeqRow) });
  $('#id_sc_field_existencia_' + iSeqRow).bind('change', function() { sc_form_productos_contable_existencia__onchange(this, iSeqRow) });
  $('#id_sc_field_multiple_escala_' + iSeqRow).bind('change', function() { sc_form_productos_contable_multiple_escala__onchange(this, iSeqRow) });
  $('#id_sc_field_en_base_a_' + iSeqRow).bind('change', function() { sc_form_productos_contable_en_base_a__onchange(this, iSeqRow) });
  $('#id_sc_field_activo_' + iSeqRow).bind('change', function() { sc_form_productos_contable_activo__onchange(this, iSeqRow) });
  $('#id_sc_field_tipo_producto_' + iSeqRow).bind('change', function() { sc_form_productos_contable_tipo_producto__onchange(this, iSeqRow) });
  $('#id_sc_field_costo_prom_' + iSeqRow).bind('change', function() { sc_form_productos_contable_costo_prom__onchange(this, iSeqRow) });
  $('#id_sc_field_imagen_' + iSeqRow).bind('change', function() { sc_form_productos_contable_imagen__onchange(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_productos_contable_idprod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_codigobar__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_contable_validate_codigobar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_contable_codigobar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_contable_codigobar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_contable_codigoprod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_nompro__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_contable_validate_nompro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_contable_nompro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_contable_nompro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_contable_unidmaymen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_unimay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_unimen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_costomay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_costomen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_recmayamen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_preciomen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_preciomen2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_preciomen3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_precio2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_preciomay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_preciofull__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_stockmay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_stockmen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_idgrup__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_idpro1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_idpro2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_idiva__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_contable_validate_idiva_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_contable_idiva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_contable_idiva__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_contable_otro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_otro2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_sabores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_imagenprod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_imconsumo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_escombo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_idcombo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_precio_editable__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_cod_cuenta__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_contable_validate_cod_cuenta_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_contable_cod_cuenta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_contable_cod_cuenta__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_contable_fecha_vencimiento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_fecha_fab__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_lote__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_serial_codbarras__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_maneja_tcs_lfs__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_control_costo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_por_preciominimo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_id_marca__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_id_linea__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_ultima_compra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_n_ultcompra__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_ultima_venta__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_n_ultventa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_codigobar2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_codigobar3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_nube__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_existencia__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_multiple_escala__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_en_base_a__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_activo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_tipo_producto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_costo_prom__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_contable_imagen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigobar_", "", status);
	displayChange_field("nompro_", "", status);
	displayChange_field("idiva_", "", status);
	displayChange_field("cod_cuenta_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigobar_(row, status);
	displayChange_field_nompro_(row, status);
	displayChange_field_idiva_(row, status);
	displayChange_field_cod_cuenta_(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigobar_" == field) {
		displayChange_field_codigobar_(row, status);
	}
	if ("nompro_" == field) {
		displayChange_field_nompro_(row, status);
	}
	if ("idiva_" == field) {
		displayChange_field_idiva_(row, status);
	}
	if ("cod_cuenta_" == field) {
		displayChange_field_cod_cuenta_(row, status);
	}
}

function displayChange_field_codigobar_(row, status) {
}

function displayChange_field_nompro_(row, status) {
}

function displayChange_field_idiva_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idiva___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idiva_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idiva_");
	}
}

function displayChange_field_cod_cuenta_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_cod_cuenta___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_cod_cuenta_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "cod_cuenta_");
	}
}

function scRecreateSelect2() {
	displayChange_field_idiva_("all", "on");
	displayChange_field_cod_cuenta_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_productos_contable_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.offset().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(formHeaders); }
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ultima_compra_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_compra_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_productos_contable_validate_ultima_compra_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['ultima_compra_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_ultima_venta_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_venta_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_productos_contable_validate_ultima_venta_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['ultima_venta_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_imagenprod_" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_productos_contable_ul_save.php",
    dropZone: $("#hidden_field_data_imagenprod_" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenprod_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenprod_" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenprod_" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenprod_" + iSeqRow);
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
        $("#id_img_loader_imagenprod_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenprod_" + iSeqRow).hide();
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
      $("#id_sc_field_imagenprod_" + iSeqRow).val("");
      $("#id_sc_field_imagenprod__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenprod__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_imagenprod_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_imagenprod_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenprod_) ? "none" : "";
      $("#id_ajax_img_imagenprod_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenprod_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenprod_) {
        document.F1.temp_out_imagenprod_.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenprod_.value = var_ajax_img_imagenprod_;
      }
      else if (document.F1.temp_out_imagenprod_) {
        document.F1.temp_out_imagenprod_.value = var_ajax_img_imagenprod_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenprod_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenprod_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenprod_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenprod_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_productos_contable')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idiva_" == specificField) {
    scJQSelect2Add_idiva_(seqRow);
  }
  if (null == specificField || "cod_cuenta_" == specificField) {
    scJQSelect2Add_cod_cuenta_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idiva_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idiva__obj" : "#id_sc_field_idiva_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idiva__obj',
      dropdownCssClass: 'css_idiva__obj',
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

function scJQSelect2Add_cod_cuenta_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_cod_cuenta__obj" : "#id_sc_field_cod_cuenta_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_cod_cuenta__obj',
      dropdownCssClass: 'css_cod_cuenta__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_idiva_) { displayChange_field_idiva_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_cod_cuenta_) { displayChange_field_cod_cuenta_(iLine, "on"); } }, 150);
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

