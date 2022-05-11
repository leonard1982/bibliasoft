
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
  scEventControl_data["trifa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_impuesto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pucaux_compras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_dv_compras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_compras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pucaux_ventas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pucaux_nc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pucaux_nd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_pucaux_exec" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trifa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trifa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_impuesto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_impuesto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_compras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_compras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_dv_compras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_dv_compras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_compras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_compras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_ventas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_ventas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_nc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_nc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_nd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_nd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_exec" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pucaux_exec" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_pucaux_compras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("puc_dv_compras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("puc_compras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_pucaux_ventas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_pucaux_nc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_pucaux_nd" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_pucaux_exec" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("puc" + iSeq == fieldName) {
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
  $('#id_sc_field_idiva' + iSeqRow).bind('change', function() { sc_form_iva_idiva_onchange(this, iSeqRow) });
  $('#id_sc_field_trifa' + iSeqRow).bind('blur', function() { sc_form_iva_trifa_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_iva_trifa_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_iva_trifa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_impuesto' + iSeqRow).bind('blur', function() { sc_form_iva_tipo_impuesto_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_iva_tipo_impuesto_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_iva_tipo_impuesto_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_form_iva_codigo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_iva_codigo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_iva_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc' + iSeqRow).bind('change', function() { sc_form_iva_puc_onchange(this, iSeqRow) });
  $('#id_sc_field_puc_dv_ventas' + iSeqRow).bind('change', function() { sc_form_iva_puc_dv_ventas_onchange(this, iSeqRow) });
  $('#id_sc_field_puc_compras' + iSeqRow).bind('blur', function() { sc_form_iva_puc_compras_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_iva_puc_compras_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_iva_puc_compras_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_dv_compras' + iSeqRow).bind('blur', function() { sc_form_iva_puc_dv_compras_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_iva_puc_dv_compras_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_iva_puc_dv_compras_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pucaux_compras' + iSeqRow).bind('blur', function() { sc_form_iva_id_pucaux_compras_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_iva_id_pucaux_compras_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_iva_id_pucaux_compras_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pucaux_ventas' + iSeqRow).bind('blur', function() { sc_form_iva_id_pucaux_ventas_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_iva_id_pucaux_ventas_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_iva_id_pucaux_ventas_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pucaux_nc' + iSeqRow).bind('blur', function() { sc_form_iva_id_pucaux_nc_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_iva_id_pucaux_nc_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_iva_id_pucaux_nc_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pucaux_nd' + iSeqRow).bind('blur', function() { sc_form_iva_id_pucaux_nd_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_iva_id_pucaux_nd_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_iva_id_pucaux_nd_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pucaux_exec' + iSeqRow).bind('blur', function() { sc_form_iva_id_pucaux_exec_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_iva_id_pucaux_exec_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_iva_id_pucaux_exec_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_iva_idiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_trifa_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_trifa();
  scCssBlur(oThis);
}

function sc_form_iva_trifa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_trifa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_tipo_impuesto_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_tipo_impuesto();
  scCssBlur(oThis);
}

function sc_form_iva_tipo_impuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_tipo_impuesto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_codigo();
  scCssBlur(oThis);
}

function sc_form_iva_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_puc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_puc_dv_ventas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_puc_compras_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_puc_compras();
  scCssBlur(oThis);
}

function sc_form_iva_puc_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_puc_compras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_puc_dv_compras_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_puc_dv_compras();
  scCssBlur(oThis);
}

function sc_form_iva_puc_dv_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_puc_dv_compras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_id_pucaux_compras_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_id_pucaux_compras();
  scCssBlur(oThis);
}

function sc_form_iva_id_pucaux_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_id_pucaux_compras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_id_pucaux_ventas_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_id_pucaux_ventas();
  scCssBlur(oThis);
}

function sc_form_iva_id_pucaux_ventas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_id_pucaux_ventas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_id_pucaux_nc_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_id_pucaux_nc();
  scCssBlur(oThis);
}

function sc_form_iva_id_pucaux_nc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_id_pucaux_nc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_id_pucaux_nd_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_id_pucaux_nd();
  scCssBlur(oThis);
}

function sc_form_iva_id_pucaux_nd_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_id_pucaux_nd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_iva_id_pucaux_exec_onblur(oThis, iSeqRow) {
  do_ajax_form_iva_validate_id_pucaux_exec();
  scCssBlur(oThis);
}

function sc_form_iva_id_pucaux_exec_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_iva_id_pucaux_exec_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("trifa", "", status);
	displayChange_field("tipo_impuesto", "", status);
	displayChange_field("codigo", "", status);
	displayChange_field("id_pucaux_compras", "", status);
	displayChange_field("puc_dv_compras", "", status);
	displayChange_field("puc_compras", "", status);
	displayChange_field("id_pucaux_ventas", "", status);
	displayChange_field("id_pucaux_nc", "", status);
	displayChange_field("id_pucaux_nd", "", status);
	displayChange_field("id_pucaux_exec", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trifa(row, status);
	displayChange_field_tipo_impuesto(row, status);
	displayChange_field_codigo(row, status);
	displayChange_field_id_pucaux_compras(row, status);
	displayChange_field_puc_dv_compras(row, status);
	displayChange_field_puc_compras(row, status);
	displayChange_field_id_pucaux_ventas(row, status);
	displayChange_field_id_pucaux_nc(row, status);
	displayChange_field_id_pucaux_nd(row, status);
	displayChange_field_id_pucaux_exec(row, status);
}

function displayChange_field(field, row, status) {
	if ("trifa" == field) {
		displayChange_field_trifa(row, status);
	}
	if ("tipo_impuesto" == field) {
		displayChange_field_tipo_impuesto(row, status);
	}
	if ("codigo" == field) {
		displayChange_field_codigo(row, status);
	}
	if ("id_pucaux_compras" == field) {
		displayChange_field_id_pucaux_compras(row, status);
	}
	if ("puc_dv_compras" == field) {
		displayChange_field_puc_dv_compras(row, status);
	}
	if ("puc_compras" == field) {
		displayChange_field_puc_compras(row, status);
	}
	if ("id_pucaux_ventas" == field) {
		displayChange_field_id_pucaux_ventas(row, status);
	}
	if ("id_pucaux_nc" == field) {
		displayChange_field_id_pucaux_nc(row, status);
	}
	if ("id_pucaux_nd" == field) {
		displayChange_field_id_pucaux_nd(row, status);
	}
	if ("id_pucaux_exec" == field) {
		displayChange_field_id_pucaux_exec(row, status);
	}
}

function displayChange_field_trifa(row, status) {
}

function displayChange_field_tipo_impuesto(row, status) {
}

function displayChange_field_codigo(row, status) {
}

function displayChange_field_id_pucaux_compras(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pucaux_compras__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pucaux_compras" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pucaux_compras");
	}
}

function displayChange_field_puc_dv_compras(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_puc_dv_compras__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_puc_dv_compras" + row).select2("destroy");
		}
		scJQSelect2Add(row, "puc_dv_compras");
	}
}

function displayChange_field_puc_compras(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_puc_compras__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_puc_compras" + row).select2("destroy");
		}
		scJQSelect2Add(row, "puc_compras");
	}
}

function displayChange_field_id_pucaux_ventas(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pucaux_ventas__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pucaux_ventas" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pucaux_ventas");
	}
}

function displayChange_field_id_pucaux_nc(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pucaux_nc__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pucaux_nc" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pucaux_nc");
	}
}

function displayChange_field_id_pucaux_nd(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pucaux_nd__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pucaux_nd" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pucaux_nd");
	}
}

function displayChange_field_id_pucaux_exec(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_pucaux_exec__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_pucaux_exec" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_pucaux_exec");
	}
}

function scRecreateSelect2() {
	displayChange_field_id_pucaux_compras("all", "on");
	displayChange_field_puc_dv_compras("all", "on");
	displayChange_field_puc_compras("all", "on");
	displayChange_field_id_pucaux_ventas("all", "on");
	displayChange_field_id_pucaux_nc("all", "on");
	displayChange_field_id_pucaux_nd("all", "on");
	displayChange_field_id_pucaux_exec("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_iva_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(16);
		}
	}
}
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_iva')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "id_pucaux_compras" == specificField) {
    scJQSelect2Add_id_pucaux_compras(seqRow);
  }
  if (null == specificField || "puc_dv_compras" == specificField) {
    scJQSelect2Add_puc_dv_compras(seqRow);
  }
  if (null == specificField || "puc_compras" == specificField) {
    scJQSelect2Add_puc_compras(seqRow);
  }
  if (null == specificField || "id_pucaux_ventas" == specificField) {
    scJQSelect2Add_id_pucaux_ventas(seqRow);
  }
  if (null == specificField || "id_pucaux_nc" == specificField) {
    scJQSelect2Add_id_pucaux_nc(seqRow);
  }
  if (null == specificField || "id_pucaux_nd" == specificField) {
    scJQSelect2Add_id_pucaux_nd(seqRow);
  }
  if (null == specificField || "id_pucaux_exec" == specificField) {
    scJQSelect2Add_id_pucaux_exec(seqRow);
  }
  if (null == specificField || "puc" == specificField) {
    scJQSelect2Add_puc(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_pucaux_compras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pucaux_compras_obj" : "#id_sc_field_id_pucaux_compras" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pucaux_compras_obj',
      dropdownCssClass: 'css_id_pucaux_compras_obj',
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

function scJQSelect2Add_puc_dv_compras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_puc_dv_compras_obj" : "#id_sc_field_puc_dv_compras" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_puc_dv_compras_obj',
      dropdownCssClass: 'css_puc_dv_compras_obj',
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

function scJQSelect2Add_puc_compras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_puc_compras_obj" : "#id_sc_field_puc_compras" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_puc_compras_obj',
      dropdownCssClass: 'css_puc_compras_obj',
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

function scJQSelect2Add_id_pucaux_ventas(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pucaux_ventas_obj" : "#id_sc_field_id_pucaux_ventas" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pucaux_ventas_obj',
      dropdownCssClass: 'css_id_pucaux_ventas_obj',
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

function scJQSelect2Add_id_pucaux_nc(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pucaux_nc_obj" : "#id_sc_field_id_pucaux_nc" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pucaux_nc_obj',
      dropdownCssClass: 'css_id_pucaux_nc_obj',
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

function scJQSelect2Add_id_pucaux_nd(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pucaux_nd_obj" : "#id_sc_field_id_pucaux_nd" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pucaux_nd_obj',
      dropdownCssClass: 'css_id_pucaux_nd_obj',
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

function scJQSelect2Add_id_pucaux_exec(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_pucaux_exec_obj" : "#id_sc_field_id_pucaux_exec" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_pucaux_exec_obj',
      dropdownCssClass: 'css_id_pucaux_exec_obj',
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

function scJQSelect2Add_puc(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_puc_obj" : "#id_sc_field_puc" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_puc_obj',
      dropdownCssClass: 'css_puc_obj',
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
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pucaux_compras) { displayChange_field_id_pucaux_compras(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_puc_dv_compras) { displayChange_field_puc_dv_compras(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_puc_compras) { displayChange_field_puc_compras(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pucaux_ventas) { displayChange_field_id_pucaux_ventas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pucaux_nc) { displayChange_field_id_pucaux_nc(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pucaux_nd) { displayChange_field_id_pucaux_nd(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_pucaux_exec) { displayChange_field_id_pucaux_exec(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_puc) { displayChange_field_puc(iLine, "on"); } }, 150);
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

